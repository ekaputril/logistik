<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SPK extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('SPK');
	}
	
	public function index()
	{
       $this->load->view('index', $data);
    }
}
