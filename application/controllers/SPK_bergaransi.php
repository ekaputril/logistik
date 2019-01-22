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

	public function delete($id)
	{
		$this->SPK_model->_deleteSPK($id);
		echo "<script>alert('Successfully Deleted'); </script>";
		redirect('SPK_bergaransi','refresh');
	}
}
