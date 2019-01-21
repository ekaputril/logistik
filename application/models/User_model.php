<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	
	public function login($username,$password){
    	$this->db->select('*');
    	$this->db->from('tbl_user');
    	$this->db->where('username',$username);
		$this->db->where('password',MD5($password));
		$query =$this->db->get();
		if($query->num_rows()==1){
            return $query->result();
        }else{
            return false;
        }
	}

	public function getTutorialHome(){
		return $this->db->query("select `t`.`idTutorial` AS `idTutorial`,`t`.`nama_tutorial` AS `nama_tutorial`,`kt`.`kategori` AS `kategori`,`t`.`photo_hasil` AS `photo_hasil`,`u`.`username` AS `username` from ((`tutorial` `t` join `kategori_tutorial` `kt`) join `users` `u`) where ((`t`.`kat_id` = `kt`.`idKat`) and (`t`.`idUser` = `u`.`id`))")->num_rows();
	}

	public function getTutorialMember($username){
		$this->db->select("`t`.`idTutorial` AS `idTutorial`,`t`.`nama_tutorial` AS `nama_tutorial`,`kt`.`kategori` AS `kategori`,`t`.`photo_hasil` AS `photo_hasil`,`u`.`username` AS `username`");
        $this->db->where("((`t`.`kat_id` = `kt`.`idKat`) and (`t`.`idUser` = `u`.`id`)) and `u`.`username` = '$username'");
        $this->db->from("((`tutorial` `t` join `kategori_tutorial` `kt`) join `users` `u`)"); 
		$query = $this->db->get();
		return $query;
	}
	public function insertUser()
	{
		$password = $this->input->post('password');
        $pass = md5($password);
        $role = 'User';
        $photo = 'default.png';
		$object = array('username' => $this->input->post('username'),
						'nama' => $this->input->post('nama'), 
						'password' => $pass,
						'role' => $role,
						'photo' => $photo);
		$insert = $this->db->insert('tbl_user',$object);
		if (!$insert && $this->db->_error_number()==1062) {
			echo "<script>alert('Username is already used'); </script>";
		}
	}

	public function register($username){
        $this->db->select('username');
        $this->db->from('tbl_user');
        $this->db->where('username', $username);
        $query = $this->db->get();
        if($query->num_rows()==1){
            return $query->result();
        }else{
            return false;
        }
    }
	
	public function selectAll($id_user){
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('id_user', $id_user);
        $query = $this->db->get();
        if($query->num_rows()==1){
            return $query->result();
        }else{
            return false;
        }                        
	}
	
	public function getDataUser()
	{
		$query = $this->db->get('tbl_user');
		return $query->result();
		
	}

	public function getUser($id)
	{
		$this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('role', 'users');
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
	}

	public function updateNoPass($id)
	{
		$object = array('username' => $this->input->post('username'),
						'email' => $this->input->post('email'));
		$this->db->where('id',$id);
		$this->db->update('tbl_user', $object);
	}
	
	public function updatePass($id)
    {   
        $password = $this->input->post('password');
        $pass = md5($password);

                $object = array(
                'password' => $pass
            );
            $this->db->where('id', $id);
            $this->db->update('tbl_user', $object);

	}
	
	public function updatePic($id)
    {   
                $object = array(
                'photo' => $this->upload->data('file_name')
            );
            $this->db->where('id', $id);
            $this->db->update('tbl_user', $object);

	}

	public function list($limit, $start, $search)
    {
		// $this->db->limit($limit, $start);
		$this->db->select('*');
		$this->db->join('tbl_spk','tbl_spk.id_user=tbl_user.id_user');
		if($search !='null')
		{
			$this->db->like('username',$search);
			$this->db->or_like('no',$search);
			$this->db->or_like('namaTutorial',$search);
		}
        $query = $this->db->get('tbl_user', $limit, $start);
        return ($query->num_rows() > 0) ? $query->result() : false;
    }

	public function getTotal($search='')
    {
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->join('tbl_spk','tbl_spk.id_user=tbl_user.id_user');
		if($search !='null')
		{
			$this->db->like('username',$search);
			$this->db->or_like('no',$search);
			$this->db->or_like('perihal',$search);
		}
        $query = $this->db->get('tbl_user', $search);
		return $this->db->count_all('tbl_user');
	}
}
?>