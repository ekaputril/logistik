<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DataUserModel extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function getDataUser()
    {
        $query = $this->db->get('users');
        if($query->num_rows()>0){
            return $query->result();
        }
    }
 
    public function list($limit, $start, $search)
    {
        
			$this->db->select('*');

			if($search!='null')
			{
				$this->db->like('username',$search);
                $this->db->or_like('email',$search);
                $this->db->or_like('company',$search);
			}

			$query = $this->db->get('users', $limit, $start);
			return ($query->num_rows() > 0) ? $query->result() : false;
    }

    public function getTotal($search)
    {
			$this->db->select('*');

			if($search!='null')
			{
				$this->db->like('username',$search);
				$this->db->or_like('email',$search);
			}

      return $this->db->count_all_results('users');
    }


    public function save()
    {
        $data = array(
            'username'  => $this->input->post('username'),
            'email'     => $this->input->post('email'),
            'company'     => $this->input->post('company'),
            'photo'      => $this->upload->data('file_name')
        );
        $this->db->insert('users',$data);
    } 

    public function getUserbyID($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->get('users');
        return $query->result();
    }

    public function updateUser($id)
    {
        $data = array(
            'username'  => $this->input->post('username'),
            'email'     => $this->input->post('email'),
            'company'     => $this->input->post('company'),
            'photo'      => $this->upload->data('file_name')
        );
         $this->db->where('id', $id);
        $this->db->update('users', $data);
    }

    public function updateno($id)
    {
        $foto = $this->upload->data();
        $data = array(
            'username'  => $this->input->post('username'),
            'email'     => $this->input->post('email'),
            'company'     => $this->input->post('company'),
            'photo'      => $foto['file_name']
        );
        $this->db->update('users', $data, array('id' => $id));
    }

    public function deleteUser($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('users');
    }
}


?>