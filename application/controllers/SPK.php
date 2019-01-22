<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SPK extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('SPK_model');
	}
	
	public function index()
	{
		$data['Spk'] = $this->SPK_model->getDataSpk();
        $this->load->view('home/spk/index',$data);
    }
}
