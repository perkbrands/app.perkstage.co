<?php
class User_model extends CI_Model {
	 public function __construct()
 	{
		//$this->load->library('session');
  		$this->load->database();
 	}
	function login_user()
	{
		$user_name=$this->input->post('txt_username');
		$user_pass=$this->input->post('txt_userpass');		 	
		$query=$this->db->get('users');
		foreach($query->result() as $row)
		{	
			if($row->user_email==$user_name && $row->user_password==$user_pass)
			return 'success';
		}
	}	
	public function select_user()
	{
		$query=$this->db->get('users');	
		return $query->result();
	}
	public function get_role()
	{
		$query=$this->db->get('role');	
		return $query->result();
	}
	
	public function user_listing()
	{
		$query=$this->db->get('users');	
		return $query->result();
	}	
	public function delete_user()
	{
		$delete_id=$this->input->get('del');	
		$this->db->where('user_id', $delete_id);
		return $this->db->delete('users');

	}	
	function add_user()
	{	
		$edit_idd=$this->input->post('hidden_id');
		$data = array(
	         'user_fname'=>$this->input->post('txt_user_fname'),
	         'user_lname'=>$this->input->post('txt_user_lname'),
        	 'user_email'=>$this->input->post('txt_useremail'),
             'user_password'=>$this->input->post('txt_userpass1'),
             'user_role'=>$this->input->post('list_role'),
             'user_status'=>$this->input->post('list_status'),
         );
		if(isset($edit_idd) && $edit_idd!='')
		{
			$this->db->where('user_id',$this->input->post('hidden_id'));
			 return $this->db->update('users', $data);
		}
		else
		{		 
			if($this->input->post('txt_user_fname'))
			 return $this->db->insert('users', $data);
		}
	}
	
	function selectone_user()
	{
	
		$edit_id=$this->input->get('eid');
		$query = $this->db->get_where('users', array('user_id' => $edit_id));
		return $query->result();

	}
	public function edit_user()
	{
	$edit_id=$this->input->get('eid');	
	
		$data = array(
	         'user_fname'=>$this->input->post('txt_user_fname'),
	         'user_lname'=>$this->input->post('txt_user_lname'),
        	 'user_email'=>$this->input->post('txt_useremail'),
             'user_password'=>$this->input->post('txt_userpass1'),
             'user_role'=>$this->input->post('list_role'),
             'user_status'=>$this->input->post('list_status'),
         );
			if($this->input->post('txt_username'))
			 return $this->db->update('users', $data);		

	}	
	
	
 }
