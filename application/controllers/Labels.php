<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Labels extends CI_Controller {
 	/*
	|--------------------------------------------------------------------------
	| Controller: Labels
	|--------------------------------------------------------------------------
	| 
	| This Controller handles all things Labels, creating, editing and printing
	|
	|
	*/

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));

		$this->load->model('user_model');
		if(!$this->user_model->authorize(2)) { $this->session->set_flashdata('notice', 'You\'re not allowed to do that!'); redirect('dashboard'); }
	}


	/*
	|--------------------------------------------------------------------------
	| Function: index
	|--------------------------------------------------------------------------
	| 
	| Nothing fancy just shows the main display of how many labels are waiting 
	| to be printed per station profile.
	|
	*/
	public function index()
	{
		$data['page_title'] = "QSL Card Labels";

		$this->load->view('interface_assets/header', $data);
		$this->load->view('labels/index');
		$this->load->view('interface_assets/footer');
	
	}

	/*
	|--------------------------------------------------------------------------
	| Function: create
	|--------------------------------------------------------------------------
	| 
	| Shows the form used to create a label type.
	|
	*/
	public function create()
	{
		
		$data['page_title'] = "Create Label Type";

		$this->load->library('form_validation');

		$this->form_validation->set_rules('station_profile_name', 'Station Profile Name', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('interface_assets/header', $data);
			$this->load->view('labels/create');
			$this->load->view('interface_assets/footer');
		}
		else
		{	
			//$this->stations->add();
			
			redirect('labels');
		}
	
	}

}