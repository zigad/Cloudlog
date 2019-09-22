<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logbooks extends CI_Controller {

	/* Controls ADIF Import/Export Functions */

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));

		$this->load->model('user_model');
		if(!$this->user_model->authorize(2)) { $this->session->set_flashdata('notice', 'You\'re not allowed to do that!'); redirect('dashboard'); }
	}

	function index() {

		$this->load->model('User_Logbooks');
		$data['logbooks'] = $this->User_Logbooks->logbooks();

		$data['current_default'] = $this->User_Logbooks->find_default();

		$data['current_active'] = $this->User_Logbooks->find_active();

		// Render Page
		$data['page_title'] = "Logbooks";
		$this->load->view('interface_assets/header', $data);
		$this->load->view('user_logbooks/index');
		$this->load->view('interface_assets/footer');
	}

	function create() {

		$this->load->library('form_validation');

		$this->form_validation->set_rules('logbookName', 'Logbook Name', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$data['page_title'] = "Create Logbook";
			$this->load->view('interface_assets/header', $data);
			$this->load->view('user_logbooks/create');
			$this->load->view('interface_assets/footer');
		}
		else
		{	
			$this->load->model('User_Logbooks');

			$this->User_Logbooks->create();
			
			redirect('logbooks');
		}
	}

	function delete($id) {
		$this->load->model('User_Logbooks');

		$this->User_Logbooks->delete($id);
			
		redirect('logbooks');
	}

	function set_default($current, $new) {
		$this->load->model('User_Logbooks');

		$this->User_Logbooks->set_default($current, $new);
			
		redirect('logbooks');
	}

	function set_active($current, $new) {
		$this->load->model('User_Logbooks');

		$this->User_Logbooks->set_active($current, $new);
			
		redirect('logbooks');
	}
}