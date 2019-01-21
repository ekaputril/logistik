<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct()
	{
                parent::__construct();
                $this->load->model('Transaksi_model');
	}
	
	public function index()
	{
                $data['countSpkG'] = $this->Transaksi_model->_getAllSpkG();
                $data['countSpk'] = $this->Transaksi_model->_getAllSpk();
                $this->load->view('home/transaksi', $data);
        }

        public function User(){
                if($this->session->has_userdata('logged_in')) {
                        $session_data = $this->session->userdata('logged_in');
            
                        if($session_data['role'] != 'User') {
                            redirect('home');
                        }
                    } else {
                        redirect('Login');
                    }
                $session_data=$this->session->userdata('logged_in');
                $data['username']=$session_data['username'];
                $data['role']=$session_data['role'];
                $data['id_user']=$session_data['id_user'];
                $data['title'] = 'Admin';

                $this->load->model('User_model');

                $id_user = $data['id_user'];
                $user = $data['username'];
                $data['username'] = $this->User_model->SelectAll($id_user,$user);
                $data['countSpkG'] = $this->Transaksi_model->_getAllSpkG();
                $data['countSpk'] = $this->Transaksi_model->_getAllSpk();
                $this->load->view('user/index',$data);
        }

        public function Admin(){
                if($this->session->has_userdata('logged_in')) {
                        $session_data = $this->session->userdata('logged_in');
            
                        if($session_data['role'] != 'Admin') {
                            redirect('home');
                        }
                    } else {
                        redirect('Login');
                    }
                $session_data=$this->session->userdata('logged_in');
                $data['username']=$session_data['username'];
                $data['role']=$session_data['role'];
                $data['id_user']=$session_data['id_user'];
                $data['title'] = 'Admin';
                $this->load->model('User_model');
                $id_user = $data['id_user'];
                $user = $data['username'];
                $data['username'] = $this->User_model->SelectAll($id_user,$user);
                $data['countSpkG'] = $this->Transaksi_model->_getAllSpkG();
                $data['countSpk'] = $this->Transaksi_model->_getAllSpk();
                $this->load->view('admin/index',$data);
        }
}
