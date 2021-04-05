<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/*
	This controller will contain features for Cabrillo
*/

class Cabrillo extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->model('user_model');
		if(!$this->user_model->authorize(2)) { $this->session->set_flashdata('notice', 'You\'re not allowed to do that!'); redirect('dashboard'); }
	}

    public function index()
    {
        header("Content-Type: text/plain");
        $this->load->model('Contesting_model');

        $from = "05/04/2021";
        $to = "05/04/2021";
        $station_id = 1;
        $contest_id = "SARTG-RTTY";

        $qsos = $this->Contesting_model->export_custom($from, $to, $station_id, $contest_id);

        $this->load->library('Cabrilloformat');

        echo $this->cabrilloformat->header($contest_id, "2M0SQL", 100,"2M0SQL", "WWYC", "Peter Goodhall", "Line 1", "Line 2", "Line 3", "test output");
        foreach ($qsos->result() as $row)
        {
            echo $this->cabrilloformat->qso($row);
        }
        echo $this->cabrilloformat->footer();
    }
}
