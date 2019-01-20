<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SPK_bergaransi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('SPK_bergaransi');
	}
	
	public function index()
	{
       $this->load->view('index', $data);
    }
}
