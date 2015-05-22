<?php
class User_account_model extends CI_Model {
	 public function __construct()
 	{
  		$this->load->database();
 	}	
	public function select_user()
	{
		$query=$this->db->get('agency_account');	
		return $query->result();
	}
	public function agency_account_listing()
	{
		$query=$this->db->get('agency_account');	
		return $query->result();
	}	
	function add_user_account()
	{
		$data = array(
	         'agency_account_lable'=>$this->input->post('txt_lable'),
	         'acc_cont_email'=>$this->input->post('txt_email'),
        	 'accept_content'=>$this->input->post('lst_acceptaccount'),
             'address'=>$this->input->post('txt_address'),
             'acc_cont_firstname'=>$this->input->post('txt_firstname'),
             'share_content'=>$this->input->post('lst_sharecontent'),
             'agency_account_city'=>$this->input->post('txt_city'),
             'agency_account_state'=>$this->input->post('txt_state'),
             'acc_cont_lastname'=>$this->input->post('txt_lastname'),
             'agency_account_zip'=>$this->input->post('txt_zip'),
             'agency_account_country'=>$this->input->post('lst_country'),
             'acc_cont_phone'=>$this->input->post('txt_contPhone'),
             'agency_account_phone'=>$this->input->post('txt_profPhone'),
             'timezone'=>$this->input->post('lst_timezone'),
             'receive_text'=>$this->input->post('lst_recText'),
             'active_account'=>$this->input->post('lst_activeaccount'),
        );
			if($this->input->post('txt_lable'))
			 return $this->db->insert('agency_account', $data);
	}
	function edit_user()
	{		
			 $data = array(	
		     'user_fname'=>$this->input->post('txt_lable'),
	         'user_lname'=>$this->input->post('txt_email'),
        	 'user_email'=>$this->input->post('lst_acceptaccount'),
             'user_password'=>$this->input->post('txt_address'),
             'user_role'=>$this->input->post('txt_firstname'),
             'user_status'=>$this->input->post('lst_sharecontent'),
             'user_status'=>$this->input->post('txt_city'),
             'user_status'=>$this->input->post('txt_state'),
             'user_status'=>$this->input->post('txt_lastname'),
             'user_status'=>$this->input->post('txt_zip'),
             'user_status'=>$this->input->post('lst_country'),
             'user_status'=>$this->input->post('txt_contPhone'),
             'user_status'=>$this->input->post('txt_profPhone'),
             'user_status'=>$this->input->post('lst_timezone'),
             'user_status'=>$this->input->post('lst_recText'),
        );
			if($this->input->post('txt_lable'))
			 return $this->db->update('agency_account', $data);		
	}
	
 }
