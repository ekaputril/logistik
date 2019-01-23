<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SPK_bergaransi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('SPK_model');
	}
	
	public function index()
	{
		$data['SpkG'] = $this->SPK_model->getDataSpkG();
       	$this->load->view('home/spk_bergaransi/index',$data);
	}
	
	public function create(){
		
		$this->load->view('user/spk_bergaransi/create_spk_bergaransi');
	}

	public function update()
	{
		$this->load->helper('url','form');
		$this->load->library('form_validation');
        
		$this->form_validation->set_rules('perihal', 'Perihal', 'trim|required');
		$this->form_validation->set_rules('no_surat', 'No_surat', 'trim|required');
		$this->form_validation->set_rules('tgl_surat', 'Tgl_Surat', 'trim|required');
		$this->form_validation->set_rules('harga', 'Harga', 'trim|required');
		$this->form_validation->set_rules('id_syarat', 'Syarat', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
		$this->form_validation->set_rules('tgl_mulai', 'Tgl_Mulai', 'trim|required');
		$this->form_validation->set_rules('tgl_selesai', 'Tgl_Selesai', 'trim|required');
		$id_surat = $this->input->post('id_surat');
		
		if ($this->form_validation->run()==FALSE){
		}else{
            $this->SPK_model-->updateSPK($id_surat);
			echo "<script>alert('Successfully Updated'); </script>";
			redirect('SPK_bergaransi/index','refresh');
		}
	}
	public function delete($id_surat)
	{
		$this->SPK_model->_deleteSPK($id_surat);
		echo "<script>alert('Successfully Deleted'); </script>";
		redirect('SPK_bergaransi/index','refresh');
	}
}
