<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SPK_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	public function getDataSpk() {
		$query = $this->db->query('select `s`.`id_surat` AS `id_surat`,`s`.`perihal` AS `perihal`,`s`.`no_surat` AS `no_surat`,`s`.`harga` AS `harga`,`s`.`tgl_surat` AS `tgl_surat`,`s`.`tgl_mulai` AS `tgl_mulai`,`s`.`tgl_selesai` AS `tgl_selesai`,`s`.`keterangan` AS `keterangan`,`s`.`id_syarat` AS `id_syarat`,`st`.`persen` AS `persen`,`u`.`username` AS `username` from ((`tbl_spk` `s` join `tbl_syarat_pembayaran` `st`) join `tbl_user` `u`) where ((`s`.`id_syarat` = `st`.`id_syarat`) and (`s`.`id_user` = `u`.`id_user`) and (`s`.`id_syarat` = 1))');

		return $query->result_array();
	}
	public function getDataSpkG() {
		$query = $this->db->query('select `s`.`id_surat` AS `id_surat`,`s`.`perihal` AS `perihal`,`s`.`no_surat` AS `no_surat`,`s`.`harga` AS `harga`,`s`.`tgl_surat` AS `tgl_surat`,`s`.`tgl_mulai` AS `tgl_mulai`,`s`.`tgl_selesai` AS `tgl_selesai`,`s`.`keterangan` AS `keterangan`,`s`.`id_syarat` AS `id_syarat`,`st`.`persen` AS `persen`,`u`.`username` AS `username` from ((`tbl_spk` `s` join `tbl_syarat_pembayaran` `st`) join `tbl_user` `u`) where ((`s`.`id_syarat` = `st`.`id_syarat`) and (`s`.`id_user` = `u`.`id_user`) and (`s`.`id_syarat` = 2))');

		return $query->result_array();
	}
	public function _deleteSPK($id) {
		$this->db->where('id_surat', $id);
        $this->db->delete('tbl_spk');
	}

	public function updateSPK($id_surat)
    {
        $data = array(
            'perihal'  => $this->input->post('perihal'),
            'no_surat'     => $this->input->post('no_surat'),
            'tgl_surat'     => $this->input->post('tgl_surat'),
			'harga'      => $this->input->post('harga'),
			'tgl_mulai'     => $this->input->post('tgl_mulai'),
			'tgl_selesai'     => $this->input->post('tgl_selesai'),
			'keterangan'     => $this->input->post('keterangan'),
			'id_syarat'     => $this->input->post('id_syarat'),
        );
        $this->db->update('tbl_spk', $data, array('id_surat' => $id_surat));
    }
}
?>