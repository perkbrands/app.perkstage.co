<?php
class Audiences extends CI_Model {
	public function __construct()
 	{
  		$this->load->database();
	}	
	public function login_audience()
	{
		$audience_name=$this->input->post('txt_audiencename');
		$audience_pass=$this->input->post('txt_audiencepass');		 	
		$query=$this->db->get('audience');
		foreach($query->result() as $row)
		{
			if($row->audience_profile_title==$audience_name && $row->audience_profile_title==$audience_pass)
			{
				$this->session->set_userdata(array('login_success'=> 'success'));
				return 'success';
			}
		}
	}
	public function get_account()
	{
		
		$current_audience_id=$this->uri->segment(3);
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!=''){
			$current_account_id=$this->session->userdata('current_account_id');
		}else
		{
			$current_account_id=$this->session->userdata('account_id');
		}	

		$query = $this->db->get_where('agency_accounts', array('account_id' =>$current_account_id));
		$query_data=$query->result();
		$share_data= $accep_content=$query_data[0]->account_content_share;
		if($share_data==1)
		{
			$this->db->select('agency_accounts.*');
			$this->db->from('agency_accounts');
			$this->db->where('agency_accounts.account_content_accept',1);
			$res=$this->db->get();
			$res_query=$res->result();
			return $res_query;
		}
		else
		{
			return 'false';
		}
		
		/*if($accep_content==0)
		{
			echo $accep_content;
			//exit;
			$this->db->select('agency_accounts.*');
			$this->db->from('agency_accounts');
			$this->db->where('audience_account.audience_id',$current_audience_id);
			$this->db->where('audience_account.account_id',$current_account_id);
			$this->db->join('audience_account','agency_accounts.account_id = audience_account.account_id','INNER');
			$res=$this->db->get();
			$res_query=$res->result();
			return $res_query;
		}*/
		$current_user_id=$this->session->userdata('user_id');
		$query = $this->db->get_where('users', array('user_id' =>$current_user_id));
		$data= $query->result();
		if($data[0]->is_default==1)
		{
			$query=$this->db->get('agency_accounts');
			return $query->result();
		}
		$this->db->select('agency_accounts.*');
		$this->db->from('agency_accounts');
		$this->db->where('agency_accounts_users.user_id',$current_user_id);
		$this->db->join('agency_accounts_users','agency_accounts.account_id = agency_accounts_users.account_id','INNER');
		$res=$this->db->get();
		$res_query=$res->result();
		return $res_query;

	}
	
	public function get_website()
	{
		$query=$this->db->get('websites');	
		return $query->result();
	}
	
	public function delete_audience()
	{
		$delete_id=$this->uri->segment(3);	
		$this->db->where('audience_id', $delete_id);
		$this->db->delete('audience');
		
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!=''){
			$current_account_id=$this->session->userdata('current_account_id');
		}else{
			$current_account_id=$this->session->userdata('account_id');
		}
		
		$this->db->where('audience_id', $delete_id);
		$this->db->where('account_id', $current_account_id);
		$this->db->delete('audience_account');
		
	}	
	public function select_audience()
	{
		$query=$this->db->get('audience');	
		return $query->result();
	}
	
	public function profile_audience()
	{
		$profile_id=$this->uri->segment(3);
		$query = $this->db->get_where('audience', array('audience_id' => $profile_id));
		return $query->result();
	}
	
	public function audience_listing()
	{
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!=''){
			$current_account_id=$this->session->userdata('current_account_id');
		}else{
			$current_account_id=$this->session->userdata('account_id');
		}    

	    $this->db->select('audience.*');    
		$this->db->from('audience');
		$this->db->where('audience_account.account_id',$current_account_id);
		$this->db->join('audience_account', 'audience.audience_id = audience_account.audience_id','INNER');
		$res=$this->db->get();
		$res_query=$res->result();
		//$query=$this->db->get('users',12);	
		return $res_query;

	}

	public function search_audience()
	{
	  	 $search_field=$this->input->post('input_value');
	   	 $search_filter=$this->input->post('selected_value');
		
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!=''){
			$current_account_id=$this->session->userdata('current_account_id');
		}else{
			$current_account_id=$this->session->userdata('account_id');
		}	
		if($search_filter==0 || $search_filter==1 || $search_filter==2)
	   	{   
			 /////////////////
	    $this->db->select('audience.*');    
		$this->db->from('audience');
		
		if($search_filter==2)
	   	{
		}else{	
		$this->db->where('audience.audience_status', $search_filter);
		}
		$this->db->where('audience_account.account_id', $current_account_id);
		$this->db->join('audience_account', 'audience_account.audience_id = audience.audience_id','INNER');
        if( $search_field!=''){
		$this->db->like('audience.profile_title', $search_field);	
		}
		$res=$this->db->get();
		$res_query=$res->result();
	    return $res_query;			
		}
		 
		
	}
	
	public function audience_all()
	{
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!=''){
			$current_account_id=$this->session->userdata('current_account_id');
		}else{
			$current_account_id=$this->session->userdata('account_id');
		}    
	
	    $this->db->select('audience.*');    
		$this->db->from('audience');
		$this->db->where('audience_account.account_id',$current_account_id);
		$this->db->join('audience_account', 'audience.audience_id = audience_account.audience_id','INNER');
		$res=$this->db->get();
		$res_query=$res->result();
		//$query=$this->db->get('users',12);	
		return $res_query;
	}
	function do_upload($file_name)
    {
      	$config['upload_path'] = 'assets/img/audience';
      	$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']    = '3000';
		/*$config['max_width']  = '1024';
		$config['max_height']  = '768';*/
        $config['remove_spaces']  = TRUE;
        $config['encrypt_name']  = TRUE;
		$config['file_name']  = $file_name;
				
        $this->load->library('upload', $config);
		$this->upload->initialize($config); 				
        if (!$this->upload->do_upload('audience_image'))
        {
        	$error = array('error' => $this->upload->display_errors());
            echo '<pre>'; print_r($error); echo '</pre>';
            $data = array('upload_data' => $this->upload->data());
         }
         else
         {
          	$data = array('upload_data' => $this->upload->data());
         } 
    } 
	public function add_audience()
	{
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!=''){
			$current_account_id=$this->session->userdata('current_account_id');
		}else{
			$current_account_id=$this->session->userdata('account_id');
		}    

		if(isset($_FILES["audience_image"]["name"]) &&$_FILES["audience_image"]["name"]!='')
		{
			$audience_image= $_FILES["audience_image"]["name"];
		}
		
		$edit_idd=$this->input->post('hiddenid');
		if(isset($_FILES["audience_image"]["name"]) &&$_FILES["audience_image"]["name"]!='')
		{
		$audience_data = array(
            'audience_status'=>$this->input->post('audience_status'),
            'audience_profile_image'=>$audience_image,
            'audience_title'=>$this->input->post('txt_title'),
            'audience_profile_summary'=>$this->input->post('txt_profile_summary'),
            'audience_enrollment'=>$this->input->post('lst_enrollment'),
            'audience_tag'=>$this->input->post('txt_tag'),
            'audience_note'=>$this->input->post('txt_note'),
       	);
		}else{
			$audience_data = array(
				'audience_status'=>$this->input->post('audience_status'),
				'audience_profile_title'=>$this->input->post('txt_profile_title'),
				'audience_profile_summary'=>$this->input->post('txt_profile_summary'),
				'audience_enrollment'=>$this->input->post('lst_enrollment'),
				'audience_tag'=>$this->input->post('txt_tag'),
				'audience_note'=>$this->input->post('txt_note'),
			);	
		}
		if(isset($edit_idd) && $edit_idd!='' && $edit_idd!='new')
		{
			
			$this->db->select('audience.audience_profile_title,agency_accounts.agency_id');    
			$this->db->from('audience');
			$this->db->where('audience.audience_profile_title',$this->input->post('txt_profile_title'));
			$this->db->where('audience.audience_id !=',$edit_idd);
			$this->db->where('agency_accounts.agency_id',$this->session->userdata('agency_id'));
			$this->db->group_by('audience_account.account_id');
			$this->db->join('audience_account', 'audience.audience_id = audience_account.audience_id', 'inner');
			$this->db->join('agency_accounts', 'audience_account.account_id = agency_accounts.account_id', 'inner');
			
			$res=$this->db->get();
			$res_query=$res->result();
		    
		
			 	if(count($res_query)>0){
					$error="Title Already Exist";
					return $error;
				}else{
			$this->db->where('audience_id',$edit_idd);
			$this->db->update('audience', $audience_data);
			$select_value = $this->input->post('accounts_select');
				
				if($select_value==''){
				$this->db->where('audience_id', $edit_idd);
				$this->db->delete('audience_account');	
				}
				$hidden_accounts=$this->input->post('hidden_accounts');
				if($hidden_accounts=='no account'){
				$this->db->where('audience_id', $edit_idd);
				$this->db->delete('audience_account');
					$account_data = array(
						'account_id'=>$current_account_id,
						'audience_id'=>$edit_idd,		 
						);				
						$this->db->insert('audience_account',$account_data);
				}
				
				if($this->input->post('accounts_select'))
				{
						$this->db->where('audience_id', $edit_idd);
						$this->db->delete('audience_account');
					$account_arr[]=$this->input->post('accounts_select');
				
					for($i=0; $i<count($account_arr[0]);$i=$i+1)
					{
						$account_data = array(
						'account_id'=>$account_arr[0][$i],
						'audience_id'=>$edit_idd,		 
						);				
						$this->db->insert('audience_account',$account_data);
					}
				}
				$select_website = $this->input->post('website_select');
				if($select_website==''){
					$this->db->where('audience_id', $edit_idd);
					$this->db->delete('audience_website');
				}
				
				if($this->input->post('website_select'))
				{
					$this->db->where('audience_id', $edit_idd);
					$this->db->delete('audience_website');
					$website_arr[]=$this->input->post('website_select');
					for($i=0; $i<count($website_arr[0]);$i=$i+1)
					{
						$website_data = array(
						'website_id'=>$website_arr[0][$i],
						'audience_id'=>$edit_idd,		 
						);				

						$this->db->insert('audience_website',$website_data);
					}
				}
				return $edit_idd;
				}
				
		}
		else
		{ 
			if($this->input->post('txt_profile_title'))
			{
			$this->db->select('audience.audience_profile_title,agency_accounts.agency_id');    
			$this->db->from('audience');
			$this->db->where('audience.audience_profile_title',$this->input->post('txt_profile_title'));
			$this->db->where('agency_accounts.agency_id',$this->session->userdata('agency_id'));
			$this->db->group_by('audience_account.account_id');
			$this->db->join('audience_account', 'audience.audience_id = audience_account.audience_id', 'inner');
			$this->db->join('agency_accounts', 'audience_account.account_id = agency_accounts.account_id', 'inner');
			
			$res=$this->db->get();
			
			$res_query=$res->result();
		
		
			 	if(count($res_query)>0){
					$error="Title Already Exist";
					return $error;
				}else{
				
				$this->db->insert('audience',$audience_data);
			 	$audience_fid=$this->db->insert_id();
				
				$account_title = array(	
				'audience_title'=>$this->input->post('txt_title'),
				);			 
				$this->db->where('audience_id',$audience_fid);
				$this->db->update('audience', $account_title);
				
				if($this->input->post('accounts_select'))
				{
				$account_arr[]=$this->input->post('accounts_select');
				
					for($i=0; $i<count($account_arr[0]);$i++)
					{
						$account_data = array(
						'account_id'=>$account_arr[0][$i],
						'audience_id'=>$audience_fid,		 
						);		
						$this->db->insert('audience_account',$account_data);
					}
				}
				
				$hidden_accounts=$this->input->post('hidden_accounts');
				if($hidden_accounts=='no account'){
				$this->db->where('audience_id', $edit_idd);
				$this->db->delete('audience_account');
					$account_data = array(
						'account_id'=>$current_account_id,
						'audience_id'=>$audience_fid,		 
						);				
						$this->db->insert('audience_account',$account_data);
				}
				
				if($this->input->post('website_select'))
				{
				$website_arr[]=$this->input->post('website_select');
					for($i=0; $i<count($website_arr[0]);$i++)
					{
						$website_data = array(
						'website_id'=>$website_arr[0][$i],
						'audience_id'=>$audience_fid,		 
						);		
						if($this->db->insert('audience_website',$website_data)){
						$error="Audience Successfully Created in Selected Account(s)";
					     return $error;	
						}
					}
				}

			}
		}
		}
	}
		

	public function select_audience_account()
	{
		$audience_id=$this->input->post('hiddenid');
		if($audience_id==''){
			$audience_id=$this->uri->segment(3);	
	     }
		$query = $this->db->get_where('audience_account', array('audience_id' => $audience_id));		
		return $query->result();
	}	
	public function select_audience_website()
	{
		$audience_id=$this->input->post('hiddenid');
		if($audience_id==''){
			$audience_id=$this->uri->segment(3);	
	     }
		$query = $this->db->get_where('audience_website', array('audience_id' => $audience_id));		
		return $query->result();
	}	

	public function selectone_audience()
	{
		$edit_id=$this->uri->segment(3);
		
		
		if($this->input->post('hiddenid')!=''){
			$edit_id=$this->input->post('hiddenid');
		}
		
		
		$query = $this->db->get_where('audience', array('audience_id' => $edit_id));		
		return $query->result();
	}	
	public function selectone_account()
	{
		$edit_id=$this->uri->segment(3);
		$query = $this->db->get_where('audience', array('audience_id' => $edit_id));
		return $query->result();
	}	
	
 }
