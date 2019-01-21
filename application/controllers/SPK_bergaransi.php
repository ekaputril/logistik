<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SPK_bergaransi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('SPK_bergaransi_model');
	}
	
	public function index()
	{
		$data['countSpkG'] = $this->Home_model->_getAllSpkG();
		$data['countSpk'] = $this->Home_model->_getAllSpk();
       	$this->load->view('user/spk_bergaransi/index',$data);
	}
	
	public function create(){
		
		$this->load->view('user/spk_bergaransi/create_spk_bergaransi');
	}
}
