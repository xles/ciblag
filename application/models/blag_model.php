<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Blag_model extends CI_Model {

	function __construct()
	{
	// Call the Model constructor
		parent::__construct();
		$this->load->database();
	}

	public function get_post($id)
	{
		$sql = "SELECT title, text, author, pubdate, category_id
			FROM   posts 
			WHERE  post_id = ?";
		$q = $this->db->query($sql, $id);
		$r = $q->row_array();

		$d['title']    = $r['title'];
		$d['body']     = $r['text'];
#		$d['avatar']   = $r['title'];
		$d['author']   = $this->get_user($r['author']);
		$d['date_iso'] = date('c', $r['pubdate']);
		$d['date']     = date('r', $r['pubdate']);
		$d['category'] = $this->get_category($r['category_id']);
		
		$d['tags']     = $this->get_tags($id);
#		$d['tags.tag'] = $r['title'];
		return $d;
	}
	public function list_posts()
	{
		$this->pagination->display_pages = FALSE;
		$this->pagination->full_tag_open = '<ul class="pager">';
		$this->pagination->prev_link     = '&larr; '.lang('Newer');
		$this->pagination->next_link     = lang('Older').' &rarr;';
		$this->pagination->total_rows    = 50;
		$this->pagination->per_page      = 10;
		$this->pagination->cur_page      = 1;
		$this->pagination->base_url      = base_url().'blag/page/';		
	}

	public function get_user($id)
	{
		$sql = "SELECT username, email 
			FROM   users 
			WHERE  user_id = ?";
		$q = $this->db->query($sql,$id);
		$r = $q->row_array();

		$username = $r['username'];
		$url = site_url('user/profile/'.$id);
//		$avatar = 'gravatar'
		$avatar = 'http://gravatar.com/avatar/'.md5($r['email']);
//		$gravatarurl = $email.'?s=500';

		return array(	'username' => $username, 
				'url'      => $url,
				'avatar'   => $avatar
			);
	}

	public function get_category($id)
	{
		$sql = "SELECT title, alias 
			FROM   categories 
			WHERE  category_id = ?";
		$q = $this->db->query($sql,$id);
		$r = $q->row_array();
		$title = $r['title'];
		$url = site_url('blag/category/'.$r['alias']);

		return array(	'title' => $title, 
				'url'   => $url 
			);
	}

	public function get_tags($post_id)
	{
		$sql = "SELECT tag_id 
			FROM   post_tags 
			WHERE  post_id = ?";
		$q = $this->db->query($sql, $post_id);
		$r = $q->result_array();
		$d = array();
		foreach ($r as $row) {
			$sql = "SELECT value, alias 
				FROM   tags 
				WHERE  tag_id = ?";
			$q = $this->db->query($sql, $row['tag_id']);
			$r = $q->row_array();
			$d[] = array ( 
				'title' => $r['value'],
				'url'   => site_url('blag/tag/'.$r['alias'])
			);
				
		}
		return $d;
	}
}
/*
{title}
{body}
{avatar}
{username}
{date_iso}{date}
{category}
{tags.tag}
*/
