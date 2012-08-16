<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->language('user');
		$this->load->model('user_model','model');
	}

	public function index()
	{

	}

	public function login()
	{
		$this->load->view('head');
		$this->load->view('user/login');
		$this->load->view('foot');
	}

	public function logout()
	{

	}

	public function logged_in()
	{

	}

	public function logged_out()
	{

	}

	public function profile()
	{

	}

	public function register()
	{

	}

	public function settings()
	{

	}
}


