<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {
 
    // function getAll($config){
    //     $this->db->select("`t`.`idTutorial` AS `idTutorial`,`t`.`nama_tutorial` AS `nama_tutorial`,`kt`.`kategori` AS `kategori`,`t`.`photo_hasil` AS `photo_hasil`,`u`.`username` AS `username`");
    //     $this->db->where("((`t`.`kat_id` = `kt`.`idKat`) and (`t`.`idUser` = `u`.`id`))");
    //     $this->db->from("((`tutorial` `t` join `kategori_tutorial` `kt`) join `users` `u`)");
    //     $this->db->limit($config['per_page'], $this->uri->segment(3)); 
    //     $hasilquery = $this->db->get();
        
    //     if ($hasilquery->num_rows() > 0) {
    //         foreach ($hasilquery->result() as $value) {
    //             $data[]=$value;
    //         }
    //         return $data;
    //     }      
    // }
    public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
    public function _getAllSpk() {
		$query = $this->db->get('tbl_spk');

		return $query->result_array();
	}

	public function _getAllSpkG() {
		$query = $this->db->get('tbl_spk_bergaransi');

		return $query->result_array();
	}
}

?>