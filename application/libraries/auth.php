<?php
/**
 * Magic Potion.
 *
 * MOAR INFOZ!!
 *
 * @package	org.mirakulix.magic-potion
 * @subpackage	auth
 * @author	xles <xles@mirakulix.org>
 * @copyright	Copyright (c) xles 2010, http://web.mirakulix.org/
 */
#namespace MagicPotion;

#class authNeededUserException extends Error {}
#class forbiddenUserException extends Error {}

/**#@+
 * User access levels.
 */
define('ACCESS_BANNED',		0);
define('ACCESS_MEMBER',		1);
define('ACCESS_AUTHOR',		2);
define('ACCESS_EDITOR',		3);
define('ACCESS_PUBLISHER',	4);

define('ACCESS_MODERATOR',	5);
define('ACCESS_ADMIN',		6);
define('ACCESS_SUPER_USER',	7);
/**#@-*/

#import('lib.phpass.PasswordHash');

class AuthException extends Exception {
	public function __construct($e = array())
	{
		$msg = '';
		foreach($e as $str) {
			$msg .= $str."\n";
		}
		parent::__construct($msg);
	}
	public function tostring()
	{
		return $this->message;
	}
}

/**
 * Auth class
 */
class Auth {

/**
 * Database object.
 */
	protected $CI;
/**
 * Constructor, connects class to the database upon creation of object.
 */
	public function __construct()
	{
		$this->CI = &get_instance();

		$this->CI->load->database('',true);
		$this->CI->load->language('user');

		$this->CI->load->library('session');
		$this->CI->load->library('PasswordHash',array(8,FALSE));
		$this->CI->load->library('validate');

	}

/**
 * Add user.
 */
	public function add_user($data)
	{
		foreach($data as $var => $val){ 
			$$var = trim($val);
			if($var != 'verify') {
				$vars[$var] = trim($val);
			}
			if(empty($val)) {
				$error[] = $this->CI->lang->line('Empty_fields');
			}
		} 

		if ($this->check_username($username)) { 
			$error[] = $this->CI->lang->line('Username_in_use');
		} 

		if (!$this->validate->email($email)) { 
			$error[] = $this->CI->lang->line('Invalid_e-mail');
		} 

		if ($passwd != $verify) {
			$error[] = $this->CI->lang->line('Password_mismatch');
		}

		if (!isset($error)) {
			$vars['passwd'] = md5($passwd);
			$vars['regdate'] = time();
			
			$this->db->insert($vars);
			return 0;
		} else {
			return $error;
		}
	}
	
/**
 * Remove user.
 * 
 * Returns FALSE on success, SQL server error on failure.
 */
	public function remove_user($id)
	{
		if(!$this->check_access(ACCESS_ADMIN)) {
			return $this->CI->lang->line('Authorization_needed');
		}

		$db = $this->db->delete($id);
		if(is_numeric($db)) {
			return FALSE;
		} else {
			return $db;
		}
	}
	
/**
 * Edit user.
 * 
 * Returns FALSE on success, SQL server error on failure.
 */
	public function edit_user($data,$id = FALSE)
	{
		if($id) {
			if(!$this->is_authorized(ACCESS_ADMIN)) {
				$error[] = $this->CI->lang->line('Not_authorized');
			}
		} else {
			$id = $this->CI->session->userdata('UID');
		}
		$static = array('submit',
				'old_passwd',
				'new_passwd',
				'ver_passwd');
		foreach($data as $var => $val){ 
			if(!empty($val)) {
				$$var = trim($val);
				if(!in_array($var,$static))
					$vars[$var] = trim($val);
			}
		} 
		
		if(isset($old_passwd) || isset($new_passwd) || 
			isset($ver_passwd)) {
			if(empty($old_passwd) || empty($new_passwd) ||
				empty($ver_passwd))
				$error[] = $this->CI->lang->line('Empty_fields');

			if(!$this->check_passwd($old_passwd)) {
				$error[] = $this->CI->lang->line('Wrong_password');
			} else if($new_passwd != $ver_passwd) {
				$error[] = $this->CI->lang->line('Password_mismatch');
			} else {
				$vars['passwd'] = md5($new_passwd);
			}
		}
		
		if(!isset($email) || !isset($email))
			$error[] = $this->CI->lang->line('Empty_fields');

		if (!$this->validate->email($email)) {
			$error[] = $this->CI->lang->line('Invalid_e-mail');
		}

		if (!isset($error)) {
			$db = $this->db->update($vars,$id);
			if(is_numeric($db))
				return FALSE;
			
			return array($db);
		} else {
			return $error;
		}
	}

/**
 * Validate user.
 */
	public function login($user,$passwd,$save = FALSE)
	{
		if(empty($user) || empty($passwd)) {
			$error = array($this->CI->lang->line('Empty_fields'));
			throw new AuthException($error);
		}

		if(!$this->check_username($user))
			$error[] = $this->CI->lang->line('Wrong_username');

		$sql = "SELECT user_id, access, passwd 
			FROM users 
			WHERE username = ? 
			LIMIT 1";
		$q = $this->CI->db->query($sql, $user);
		$r = $q->row_array();

		if($q->num_rows() == 0)
			throw new AuthException($error);

		if($r['access'] == ACCESS_BANNED)
			$this->logout();

		#$this->log->log_var($passwd,'$passwd');
		#$this->log->log_var($db,'$db');
		
		#if($r['passwd'] != $passwd)
		if(!$this->CI->passwordhash->CheckPassword($passwd, $r['passwd']))
			$error[] = $this->CI->lang->line('Wrong_password');
		
		if(isset($error))
			throw new AuthException($error);
			
		$vars = array(
			'lastip' => $_SERVER['REMOTE_ADDR'],
			'lastlogin' => date('Y-m-d H:i:s')
		);
		$this->CI->db->where('user_id', $r['user_id']);
		$this->CI->db->limit(1);
		$this->CI->db->update('users',$vars);
		#var_dump($sql);
		#$login = $this->CI->db->query($sql);
		if($this->CI->db->affected_rows() != 1)
			return $login;
			
		$this->CI->session->set_userdata('UID', $r['user_id']);
		$this->CI->session->set_userdata('USERNAME', $user);
		
		#$this->log->log_var($_COOKIE,'$_COOKIE');
		
		if($save) {
			$expire = time()+3600*24*30;
			setcookie('SID', session_id(), $expire);
		}
		return FALSE;
	}
	
	public function logout()
	{
		#setcookie('SID', '', -3600);
		
		return $this->CI->session->sess_destroy();
	}
	
	
	private function check_username($username)
	{
		$sql = "SELECT COUNT(*) FROM users WHERE username = ?";
		$q = $this->CI->db->query($sql,$username);
		$r = $q->row_array();
		if ($r['COUNT(*)'] > 0) { 
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	public function require_login()
	{
		if(!$this->CI->session->userdata('UID'))
			throw new authNeededUserException();
		else
			return TRUE;
	}
	
	public function is_logged_in()
	{
		if($this->CI->session->userdata('UID'))
			return TRUE;
		else
			return FALSE;
	}
	
	public function require_access($lvl)
	{
		$this->require_login();
		if($this->check_access($lvl)) {
			return TRUE;
		} else {
			throw new forbiddenUserException();
		}
	}


	public function check_access($access = FALSE, $id = FALSE)
	{
		if(!$this->CI->session->userdata('UID'))
			return FALSE;
		
		if(!$id)
			$id = $this->CI->session->userdata('UID');
		
		$cond = 'WHERE user_id = '.$id;
		$level = $this->db->select(array('access'),$cond);
		#$this->log->log_var($level,'$level');
		if($access) {
			if ($level['access'] >= $access) {
				return TRUE;
			} else {
				return FALSE;
			}
		} else {
			return $level['access'];
		}
	}

	public function bcrypt($str)
	{
		$bcrypt = new \PasswordHash(8,FALSE);
		return $bcrypt->HashPassword($str);
	}

	public function check_passwd($passwd)
	{
#		if(!$this->CI->session->userdata('UID'))
#			return FALSE;

		$bcrypt = new PasswordHash(8,FALSE);
		
		$id = $this->CI->session->userdata('UID');
		$this->CI->db->select('passwd');
		$this->CI->db->where('user_id', $id);
		$q = $this->CI->db->get('users');
		$db = $q->row_array();

		if ($bcrypt->CheckPassword($passwd, $db['passwd'])) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

/*
	public function check_passwd($passwd)
	{
		if(!$this->CI->session->userdata('UID'))
			return FALSE;
		$id = $this->CI->session->userdata('UID');
		$db = $this->db->select(array('passwd'),$id);

		if ($db['passwd'] === md5($passwd)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
*/

/**
 * Destructor...
 */
	public function __destruct() 
	{
		/* Hell if I knew... */
	}
}
	
/**
 * EOF /includes/auth.php
 */
