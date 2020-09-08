<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Labels extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));

		$this->load->model('user_model');
		if(!$this->user_model->authorize(2)) { $this->session->set_flashdata('notice', 'You\'re not allowed to do that!'); redirect('dashboard'); }
	}

	public function index()
	{
		$this->load->model('user_model');
		if(!$this->user_model->authorize(99)) { $this->session->set_flashdata('notice', 'You\'re not allowed to do that!'); redirect('dashboard'); }
	
		$data['page_title'] = "Export requested QSLs for printing";

		$this->load->view('interface_assets/header', $data);
		$this->load->view('qslprint/index');
		$this->load->view('interface_assets/footer');
	
	}

}