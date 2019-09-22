<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/*
	This controller will contain features for managing incoming QSL cards
*/

class User_Logbooks extends CI_Model {

        public function logbooks() {
			$this->db->select('logbooks.id, logbooks.logbook_name, logbooks.active_logbook, logbooks.default_logbook, count('.$this->config->item('table_name').'.logbook_id) as qso_total');
        	$this->db->from('logbooks');
        	$this->db->join($this->config->item('table_name'),'logbooks.id = '.$this->config->item('table_name').'.logbook_id','left');
       		$this->db->group_by('logbooks.id');
        	return $this->db->get();

        }

        public function create() {
			$data = array(
				'logbook_name' => $this->input->post('logbookName')
			);

			$this->db->insert('logbooks', $data); 
        }

        public function update($id) {

        }

        public function delete($id) {
			$this->db->delete('logbooks', array('id' => $id)); 
        }

        public function set_default($current, $new) {
        	// Deselect current default

			$current_default = array(
				'default_logbook' => null,
			);

			$this->db->where('id', $current);
			$this->db->update('logbooks', $current_default);

			 // Deselect current default
			$newdefault = array(
			        'default_logbook' => 1,
			);

			$this->db->where('id', $new);
			$this->db->update('logbooks', $newdefault);
        }

        public function set_active($current, $new) {
        	// Deselect current default

			$current_default = array(
				'active_logbook' => null,
			);

			$this->db->where('id', $current);
			$this->db->update('logbooks', $current_default);

			 // Deselect current default
			$newdefault = array(
			        'active_logbook' => 1,
			);

			$this->db->where('id', $new);
			$this->db->update('logbooks', $newdefault);
        }

        public function assign_qsos($id) {
        	// Deselect current default

			$data = array(
				'logbook_id' => $id,
			);

			$this->db->where('logbook_id', null);
			$this->db->update($this->config->item('table_name'), $data);
        }

        public function find_default () {
        	$this->db->where('default_logbook', 1);
        	$query = $this->db->get('logbooks');

        	if($query->num_rows() >= 1) {
        		foreach ($query->result() as $row)
				{
				        return $row->id;
				}

        	} else {
        		return "0";
        	}
        }

        public function log_exists() {
        	$query = $this->db->get('logbooks');

        	if($query->num_rows() >= 1) {
        		return 1;
        	} else {
        		return 0;
        	}        	
        }

        public function find_active () {
        	$this->db->where('active_logbook', 1);
        	$query = $this->db->get('logbooks');

        	if($query->num_rows() >= 1) {
        		foreach ($query->result() as $row)
				{
				        return $row->id;
				}

        	} else {
        		return "0";
        	}
        }
}