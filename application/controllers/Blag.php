<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blag extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->language('blag');
		$this->load->helper('language');
		$this->load->helper('url');
		$this->load->model('blag_model','model');
		$this->load->library('auth');
	}
	public function index()
	{
		$this->load->view('head');
		$this->load->view('blag/page');
		$this->load->view('foot');
	}

	public function page()
	{
		$this->load->view('head');
		$this->load->view('blag/page');
		$this->load->view('foot');
	}

	public function edit()
	{
		$this->load->view('head');
		$this->load->view('blag/edit');
		$this->load->view('foot');
	}

	public function compose()
	{
		$this->load->view('head');
		$this->load->view('blag/compose');
		$this->load->view('foot');
	}

	public function post()
	{
		$data = $this->model->get_post(1);
		var_dump($this->auth->login('xles','meracles'));
		var_dump($this->auth->is_logged_in());
		$this->load->view('head');
		$this->load->view('blag/post', $data);
		$this->load->view('foot');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */