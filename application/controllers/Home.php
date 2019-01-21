<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
                parent::__construct();
                $this->load->model('Home_model');
	}
	
	public function index()
	{
                $data['countSpkG'] = $this->Home_model->_getAllSpkG();
                $data['countSpk'] = $this->Home_model->_getAllSpk();
                $this->load->view('user/index', $data);
        }

        public function Admin(){
                $session_data=$this->session->userdata('logged_in');
                $data['username']=$session_data['username'];
                $data['role']=$session_data['role'];
                $data['id']=$session_data['id'];
                $data['title'] = 'Admin';

                $this->load->model('User_model');
                $this->load->model('Admin_model');

                $id = $data['id'];
                $user = $data['username'];
                $data['username'] = $this->User_model->SelectAll($id,$user);
                $data['countSpkG'] = $this->Home_model->_getAllSpkG();
                $data['countSpk'] = $this->Home_model->_getAllSpk();
                $this->load->view('admin/index',$data);
        }
}
