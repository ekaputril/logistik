<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

    public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
    public function _getAllSpk() {
        $this->db->select('*');
        $this->db->from('tbl_spk');
        $this->db->where('id_syarat',1);
		$query = $this->db->get('');
		return $query->result_array();
	}

	public function _getAllSpkG() {
        $this->db->select('*');
        $this->db->from('tbl_spk');
        $this->db->where('id_syarat',2);
		$query = $this->db->get('');
		return $query->result_array();
	}
}

?>