<?php
class Contesting_model extends CI_Model {
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();

    }

    /*
     * This function gets the QSOs to fill the "Contest Logbook" under the contesting form.
     */
    function getSessionQsos($qso) {
        $CI =& get_instance();
        $CI->load->model('Stations');
        $station_id = $CI->Stations->find_active();

        $qsoarray = explode(',', $qso);

        $contestid = $qsoarray[2];
        $date = DateTime::createFromFormat('d-m-Y H:i:s', $qsoarray[0]);
        $date = $date->format('Y-m-d H:i:s');

        $sql = "SELECT date_format(col_time_on, '%d-%m-%Y %H:%i:%s') as col_time_on, col_call, col_band, col_mode, col_submode, col_rst_sent, col_rst_rcvd, col_srx, col_srx_string, col_stx, col_stx_string FROM " .
            $this->config->item('table_name') .
            " WHERE station_id = " . $station_id .
            " AND COL_TIME_ON >= '" . $date . "'" .
            " AND COL_CONTEST_ID = '" . $contestid . "'" .
            " ORDER BY COL_PRIMARY_KEY ASC";

        $data = $this->db->query($sql);
        header('Content-Type: application/json');
        echo json_encode($data->result());
    }

    function getActivecontests() {

		$sql = "SELECT name, adifname FROM contest WHERE active = 1 ORDER BY name ASC";

		$data = $this->db->query($sql);

		return($data->result_array());
	}

	function getAllContests() {

		$sql = "SELECT id, name, adifname, active FROM contest ORDER BY name ASC";

		$data = $this->db->query($sql);

		return($data->result_array());
	}

	function delete($id) {
		// Clean ID
		$clean_id = $this->security->xss_clean($id);

		// Delete Contest
		$this->db->delete('contest', array('id' => $clean_id));
	}

	function activate($id) {
		// Clean ID
		$clean_id = $this->security->xss_clean($id);

		$data = array(
			'active' => '1',
		);

		$this->db->where('id', $clean_id);

		$this->db->update('contest', $data);

		return true;
	}

	function deactivate($id) {
		// Clean ID
		$clean_id = $this->security->xss_clean($id);

		$data = array(
			'active' => '0',
		);

		$this->db->where('id', $clean_id);

		$this->db->update('contest', $data);

		return true;
	}

	function add() {
		$data = array(
			'name' => xss_clean($this->input->post('name', true)),
			'adifname' => xss_clean($this->input->post('adifname', true)),
		);

		$this->db->insert('contest', $data);
	}

	function contest($id) {
		// Clean ID
		$clean_id = $this->security->xss_clean($id);

		$sql = "SELECT id, name, adifname, active FROM contest where id =" . $clean_id;

		$data = $this->db->query($sql);

		return ($data->row());
	}

	function edit($id) {
		$data = array(
			'name' => xss_clean($this->input->post('name', true)),
			'adifname' => xss_clean($this->input->post('adifname', true)),
			'active' =>  xss_clean($this->input->post('active', true)),
		);

		$this->db->where('id', $id);
		$this->db->update('contest', $data);
	}

	function export_custom($from, $to, $station_id, $contest_id) {
        $this->db->select(''.$this->config->item('table_name').'.*, station_profile.*');
        $this->db->from($this->config->item('table_name'));
        $this->db->where($this->config->item('table_name').'.station_id', $station_id);

        // If date is set, we format the date and add it to the where-statement
        if ($from != 0) {
            $from = DateTime::createFromFormat('d/m/Y', $from);
            $from = $from->format('Y-m-d');
            $this->db->where("date(".$this->config->item('table_name').".COL_TIME_ON) >= '".$from."'");
        }
        if ($to != 0) {
            $to = DateTime::createFromFormat('d/m/Y', $to);
            $to = $to->format('Y-m-d');
            $this->db->where("date(".$this->config->item('table_name').".COL_TIME_ON) <= '".$to."'");
        }

		$this->db->where($this->config->item('table_name').'.COL_CONTEST_ID', $contest_id);

        $this->db->order_by($this->config->item('table_name').".COL_TIME_ON", "ASC");

        $this->db->join('station_profile', 'station_profile.station_id = '.$this->config->item('table_name').'.station_id');

        return $this->db->get();
    }

}
