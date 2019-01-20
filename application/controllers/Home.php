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
        // $this->load->model('User_model');
        // $total=$this->User_model->getTutorialHome();
        // $config['base_url'] = base_url() . "home/index";
        // $config['total_rows'] = $total;
        // $config['per_page'] = 3;
        // $config['num_links'] = 2;
        // $config['uri_segment'] = 3;
        // $config['first_link'] = 'First';
        // $config['last_link'] = 'Last';
        // $config['next_link'] = 'Next';
        // $config['prev_link'] = 'Prev';
        
        // $this->pagination->initialize($config);
 
        // $this->load->model('m_home');
        // $data['results'] = $this->m_home->getAll($config);
        $data['countSpkG'] = $this->Home_model->_getAllSpkG();
        $data['countSpk'] = $this->Home_model->_getAllSpk();
        $this->load->view('index', $data);
        }

        public function homeAdmin(){
                $session_data=$this->session->userdata('logged_in');
                $data['username']=$session_data['username'];
                $data['role']=$session_data['role'];
                $data['id']=$session_data['id'];
                $data['title'] = 'HomeAdmin';

                $this->load->model('User_model');
                $this->load->model('Admin_model');

                $id = $data['id'];
                $user = $data['username'];
                $data['username'] = $this->User_model->SelectAll($id,$user);
                $data['countMember'] = $this->Admin_model->_getAllMember();
                $data['countTutorial'] = $this->Admin_model->_getAllTutorial();
                $data['kategori'] = $this->Admin_model->_getAllKategori();

                //$this->load->model('user');
                //$id = $data['id'];
                //$user = $data['username'];
                //$data['name'] = $this->user->selectAll($id,$user);  
                $this->load->view('admin/header',$data);
                $this->load->view('admin/sidebar');
                $this->load->view('admin/index',$data);
        }
}
