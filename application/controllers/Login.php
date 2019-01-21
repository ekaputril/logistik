<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Login extends CI_Controller {
    
        public function index()
        {
            $data['title'] = 'Login';
            $this->load->view('home/login', $data);
        }

        public function logout()
        {
            $this->load->library('session');
            $this->session->unset_userdata('logged_in');
            $this->session->sess_destroy();
            redirect('Login','refresh');
        }

        public function cekDb($password)
        {
            $this->load->model('User_model');
            $username = $this->input->post('username'); 
            $result = $this->User_model->login($username,$password);
            if($result){
                $session_array = array();
                foreach ($result as $key) {
                    $session_array = array(
                        'id_user'=>$key->id,
                        'username'=>$key->username,
                        'nama' => $key->nama,
                        'nip' => $key->nip,
                        'role'=>$key->role
                    );
                    $this->session->set_userdata('logged_in',$session_array);
                }
                return true;
            }else{
                $this->form_validation->set_message('cekDb',"login failed");
                return false;
            }
        }

        public function cekLogin()
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('username', 'username', 'trim|required');
            $this->form_validation->set_rules('password', 'password', 'trim|required|callback_cekDb');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('home/login');
            } else {
                $session_data = $this->session->userdata('logged_in');
                $data['username'] = $session_data['username'];
                $data['role'] = $session_data['role'];
                if ($data['role']=='Admin') {
                    redirect('Home/Admin/');
                }else{
                    redirect('Home/User');
                }
            }
        }
    }
    
    /* End of file Controllername.php */
    
?>