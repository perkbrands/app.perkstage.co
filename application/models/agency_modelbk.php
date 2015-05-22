<?php
class Agency_model extends CI_Model {
	 public function __construct()
 	{
  		$this->load->database();
 	}
	
	function login_user()
	{ 
		$user_name=$this->input->post('txt_agencyname');
		$user_pass=$this->input->post('txt_agencypass');
		$query = $this->db->get_where('users', array('user_email' => $user_name,'user_password' => base64_encode($user_pass)));
        $rs_query=$query->result();
		
		if($query->num_rows()>0){
		
		
		$this->db->select('users.user_name,users.user_password,agency_accounts_users.agency_id,agency_accounts_users.account_id');    
		$this->db->from('users');
		$this->db->where('users.user_id',$rs_query[0]->user_id);
		$this->db->join('agency_accounts_users', 'users.user_id = agency_accounts_users.user_id');
		$this->db->join('agency_accounts', 'agency_accounts_users.account_id = agency_accounts.account_id');
		$res=$this->db->get();
		$res_query=$res->result();
		//$query = $this->db->get_where('agency_accounts', array('account_id' => $edit_id));
		//return $query->result();

			$this->session->set_userdata(array(
                            'login_success'       => 'success',
							'agency_id'       => $res_query[0]->agency_id,
							'account_id'       => $res_query[0]->account_id
                    ));
			return 'success';
		}
		/*if(user_name==$user_name && user_password==$user_pass)
			$this->session->set_userdata(array(
                            'login_success'       => 'success',
							'agency_id'       => $row->agency_id
                    ));
			return 'success';*/

		/*$where = "user_name='$user_name' AND user_password='$user_pass'";
		$this->db->where($where);*/
		/*$this->db->where('user_name',$user_name);
		$query = $this->db->get('users');*/
		
		/*$this->db->select('users.user_name,users.user_password');    
		$this->db->from('users');
		$this->db->where('agency_accounts.is_default',1);
		$this->db->join('agency_accounts_users', 'users.user_id = agency_accounts_users.user_id');
		$this->db->join('agency_accounts', 'agency_accounts_users.account_id = agency_accounts.account_id');*/
		/*foreach($query->result() as $row)
		{
			$row;	
			if($row->user_name==$agency_name && $row->user_password==$agency_pass)
			$this->session->set_userdata(array(
                            'login_success'       => 'success',
							'agency_id'       => $row->agency_id
                    ));
			return 'success';
		}*/	


	}
	public function delete_agency()
	{
		$delete_id=$this->uri->segment(3);	
		$this->db->where('account_id', $delete_id);
		return $this->db->delete('agency_accounts');
	}	
	public function select_agency()
	{
		$query=$this->db->get('agency_accounts');	
		return $query->result();
	}
	public function profile_account()
	{
		$profile_id=$this->uri->segment(3);	
		$query = $this->db->get_where('agency_accounts', array('account_id' => $profile_id));
		return $query->result();
	}

	
	public function agency_listing()
	{
		$query=$this->db->get('agency_accounts',12);	
		return $query->result();
	}
	function add_agency()
	{	
		
		$edit_idd=$this->input->post('hiddenid');		
		$data = array(
	         'account_contact_email'=>$this->input->post('txt_email'),
        	 'account_content_accept'=>$this->input->post('lst_acceptaccount'),
             'account_profile_address'=>$this->input->post('txt_address'),
             'account_contact_firstname'=>$this->input->post('txt_firstname'),
             'account_content_share'=>$this->input->post('lst_sharecontent'),
             'account_profile_city'=>$this->input->post('txt_city'),
             'account_profile_state'=>$this->input->post('lst_profile_state'),
             'account_contact_lastname'=>$this->input->post('txt_lastname'),
             'account_profile_zip'=>$this->input->post('txt_zip'),
             'account_profile_country'=>$this->input->post('lst_country'),
             'account_contact_phone'=>$this->input->post('txt_contPhone'),
             'account_profile_phone'=>$this->input->post('txt_profPhone'),
             'account_profile_timezone'=>$this->input->post('txt_timezone'),
             'account_contact_notification'=>$this->input->post('lst_notification'),
             'account_status'=>$this->input->post('lst_activeaccount'),
             'account_notes'=>$this->input->post('txt_note'),
        );
		if(isset($edit_idd) && $edit_idd!='')
		{
			$this->db->where('account_id',$this->input->post('hiddenid'));
			 return $this->db->update('agency_accounts', $data);
		}
		else
		{
		if($this->input->post('txt_firstname'))
			 $this->db->insert('agency_accounts', $data);
			 $account_fid=$this->db->insert_id();
			
		/*	$user_data = array(
	         'user_fname'=>'Admin',
	         'user_lname'=>'Admin',
	         'user_email'=>'Admin',
	         'user_password'=>'Admin',
	         'user_role'=>'Admin',
	         'user_status'=>'Default',
	         'account_id'=>$account_fid,			 
        ); */
		//if($account_fid!=0)
 		// return $this->db->insert('users', $user_data);
		
	
		}
	}
	function selectone_agency()
	{
		//$edit_id=$this->input->get('edi');
		$edit_id=$this->uri->segment(3);
		$query = $this->db->get_where('agency_accounts', array('account_id' => $edit_id));
		return $query->result();

	}	
	
	function edit_agency()
	{
		$data = array(
	         'txt_agencyname'=>$this->input->post('txt_agencyname'),
	         'txt_agencylable'=>$this->input->post('txt_agencylable'),
        	 'txt_agencycode'=>$this->input->post('txt_agencycode'),
           	 'txt_agencystatus'=>$this->input->post('txt_agencystatus'),
             'txt_agencypass1'=>$this->input->post('txt_agencypass1'),
         );
			if($this->input->post('txt_username'))
			 return $this->db->update('agency', $data);		
	}
	
 }
