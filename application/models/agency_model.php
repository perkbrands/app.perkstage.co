<?php
class Agency_model extends CI_Model {
	 public function __construct()
 	{
  		$this->load->database();
		
 	}

	function login_agency()
	{ 
		$user_name=$this->input->post('txt_agencyname');
		$user_pass=$this->input->post('txt_agencypass');
		$query = $this->db->get_where('users', array('user_email' => $user_name,'user_password' => base64_encode($user_pass)));
        $rs_query=$query->result();
		
		if($query->num_rows()>0){
		
		
		$this->db->select('users.user_name,users.is_default,users.user_first_name,user_last_name,agency_accounts_users.agency_id,agency_accounts_users.account_id');    
		$this->db->from('users');
		$this->db->where('users.user_id',$rs_query[0]->user_id);
		$this->db->join('agency_accounts_users', 'users.user_id = agency_accounts_users.user_id');
		$this->db->join('agency_accounts', 'agency_accounts_users.account_id = agency_accounts.account_id');
		$res=$this->db->get();
		//echo $this->db->last_query();
		$res_query=$res->result();
		//echo '<pre>';print_r($res_query);
		//$query = $this->db->get_where('agency_accounts', array('account_id' => $edit_id));
		//return $query->result();
       	$this->db->select('agency_accounts_users.role_id');    
		$this->db->from('agency_accounts_users');
		$this->db->where('agency_accounts_users.user_id',$rs_query[0]->user_id);
		$this->db->where('agency_accounts_users.agency_id',$res_query[0]->agency_id);
		$this->db->order_by('agency_accounts_users.role_id','DESC');
		$res_roles=$this->db->get();
		//echo $this->db->last_query();
		$res_query_roles=$res_roles->result();
		$editors_array=array();
		$admin_array=array();
		foreach($res_query_roles as $roles){
		$array_roles[]=$roles->role_id.',';
		if($roles->role_id==2){
		$editors_array[]=$roles->role_id.',';
		}
		if($roles->role_id==1){
		$admin_array[]=$roles->role_id.',';
		}
		
		}
		
		$both_status='';
		if(count($editors_array)>0 && count($admin_array)>0){
			$both_status='both';
		}
		
		//$roles_arr=join(',', array_filter($array_roles));
	     $roleid = min($array_roles);
		 $roles_assigned='single';
	     $user_role_id=rtrim($roleid,',');
		 
			$count_roles_array = count($array_roles);
			if($count_roles_array>1){
				if($user_role_id==1){
					if(in_array(2,$array_roles) || in_array(3,$array_roles)){
					$roles_assigned='multiple';
					
					}
					$count_admin = count($admin_array);
					if($count_admin>1){
					$roles_assigned='multiple';	
					}
				}
			    
				
				if($user_role_id==2){
					$count_editor = count($editors_array);
					if($count_editor>1){
					$roles_assigned='multiple';	
					}
					/*if(in_array(3,$array_roles)){
					$roles_assigned='multiple';	
					}*/
				}
				
				
				
			}
		
	        $name_user=$res_query[0]->user_first_name.' '.$res_query[0]->user_last_name;
			$this->session->set_userdata(array(
                            'login_success'       => 'success',
							'agency_id'       => $res_query[0]->agency_id,
							'account_id'       => $res_query[0]->account_id,
							'user_id'          => $rs_query[0]->user_id,
							'user_title'          => $name_user,
							'role_id'          => $user_role_id,
							'isdefault'        => $rs_query[0]->is_default,
							'assigned_roles'        => $roles_assigned,
							'status_both'        => $both_status
                    ));
			return 'success';
		}
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
		
		if($this->session->userdata('isdefault')==1){
		//$query=$this->db->get_where('agency_accounts',array('agency_id' => $this->session->userdata('agency_id')));	
			
		$this->db->select('agency_accounts.*');
		$this->db->from('agency_accounts');
		$this->db->where('agency_accounts.agency_id',$this->session->userdata('agency_id'));
		//$this->db->limit($limit, $offset);
		$query=$this->db->get();
		
		}else{
		////////////////////
		
		$this->db->select('agency_accounts.*,agency_accounts_users.role_id');    
		$this->db->from('agency_accounts');
		$this->db->where('agency_accounts.agency_id',$this->session->userdata('agency_id'));
		$this->db->where('users.user_id',$this->session->userdata('user_id'));
		$this->db->join('agency_accounts_users', 'agency_accounts.account_id = agency_accounts_users.account_id');
		$this->db->join('users', 'agency_accounts_users.user_id = users.user_id');
		//$this->db->limit($limit, $offset);
		
		$query=$this->db->get();
		
		
		///////////////////	
		}
		return $query->result();
		
	}
	
	public function agency_listing_count()
	{ 
		
		if($this->session->userdata('isdefault')==1){
		$query=$this->db->get_where('agency_accounts',array('agency_id' => $this->session->userdata('agency_id')));		
		}else{
		////////////////////
		
		$this->db->select('agency_accounts.*,agency_accounts_users.role_id');    
		$this->db->from('agency_accounts');
		$this->db->where('agency_accounts.agency_id',$this->session->userdata('agency_id'));
		$this->db->where('users.user_id',$this->session->userdata('user_id'));
		$this->db->join('agency_accounts_users', 'agency_accounts.account_id = agency_accounts_users.account_id');
		$this->db->join('users', 'agency_accounts_users.user_id = users.user_id');
		$query=$this->db->get();
		
		
		///////////////////	
		}
		return $query->num_rows();
		
	}
	
	
	public function people_states_listing()
	{    
		$query=$this->db->get('list_states');	
		return $query->result();
	}
	public function account_country_listing()
	{    
	    $this->db->select('*');
		$this->db->order_by("sort_by","asc");
		$query=$this->db->get('list_countries');	
		return $query->result();
	}

	
	public function people_timezone_listing()
	{    
		$query=$this->db->get('list_timezones');	
		return $query->result();
	}

	public function search_agency()
	{
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!=''){
			$current_account_id=$this->session->userdata('current_account_id');
		}else{
			$current_account_id=$this->session->userdata('account_id');
		}
		
		if($this->session->userdata('isdefault')==1){
		$this->db->select('agency_accounts.*');    
		$this->db->from('agency_accounts');
		$this->db->where('agency_accounts.agency_id',$this->session->userdata('agency_id'));	
		}else{
		$this->db->select('agency_accounts.*,agency_accounts_users.role_id');    
		$this->db->from('agency_accounts');
		$this->db->where('agency_accounts.agency_id',$this->session->userdata('agency_id'));
		$this->db->where('users.user_id',$this->session->userdata('user_id'));
		$this->db->join('agency_accounts_users', 'agency_accounts.account_id = agency_accounts_users.account_id');
		$this->db->join('users', 'agency_accounts_users.user_id = users.user_id');
		}
		
	  	$search_field=$this->input->post('input_value');
	   	$search_filter=$this->input->post('selected_value');
		if($search_filter!='2')
		{
			$this->db->where('account_status', $search_filter);
		}
		if($search_field!='')
		{
			$this->db->like('account_title', $search_field);
		}
		$query=$this->db->get(); 
		return $query->result();
	}
	public function agency_all()
	{
		$query=$this->db->get('agency_accounts');	
		return $query->result();
	}

	public function filter_agency()
	{
		$filter_agency=$this->input->post('option');
		$query = $this->db->get_where('agency_accounts', array('account_profile_address' => $filter_agency));
		return $query->result();
	}


	function add_agency()
	{
	$this->input->post('lst_country');
		if(isset($_FILES["account_image"]["name"]) && $_FILES["account_image"]["name"]!='')
		{
			$account_image= $_FILES["account_image"]["name"];
		}
		
		$session_arr=($this->session->userdata('user_details'));
		
		$edit_idd=$this->input->post('hiddenid');		
		if(isset($_FILES["account_image"]["name"]) && $_FILES["account_image"]["name"]!='')
		{
			 $data = array(
	         'account_contact_email'=>$this->input->post('txt_email'),
        	 'account_content_accept'=>$this->input->post('lst_acceptaccount'),
             'account_profile_address'=>$this->input->post('txt_address'),
             'account_profile_image'=>$account_image,
             'account_contact_firstname'=>$this->input->post('txt_firstname'),
             'account_content_share'=>$this->input->post('lst_sharecontent'),
             'account_profile_city'=>$this->input->post('txt_city'),
             'account_profile_state'=>$this->input->post('lst_profile_state'),
             'account_contact_lastname'=>$this->input->post('txt_lastname'),
             'account_profile_zip'=>$this->input->post('txt_zip'),
             'account_profile_country'=>$this->input->post('lst_country'),
             'account_contact_phone'=>$this->input->post('txt_contPhone'),
             'account_profile_phone'=>$this->input->post('txt_profPhone'),
             'account_profile_timezone'=>$this->input->post('lst_timezone'),
             'account_contact_notification'=>$this->input->post('lst_notification'),
             'account_status'=>$this->input->post('lst_activeaccount'),
             'account_notes'=>$this->input->post('txt_note'),
             'agency_id'=>$this->session->userdata('agency_id'),
        );
	
		}else{
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
             'account_profile_timezone'=>$this->input->post('lst_timezone'),
             'account_contact_notification'=>$this->input->post('lst_notification'),
             'account_status'=>$this->input->post('lst_activeaccount'),
             'account_notes'=>$this->input->post('txt_note'),
             'agency_id'=>$this->session->userdata('agency_id'),
        );
		}
		if(isset($edit_idd) && $edit_idd!='')
		{
			
			
			
			$this->db->select('agency_accounts.account_id');    
		$this->db->from('agency_accounts');
		$this->db->where('agency_accounts.agency_id',$this->session->userdata('agency_id'));
		$this->db->where('agency_accounts.account_contact_email',$this->input->post('txt_email'));
		$this->db->where('agency_accounts.agency_id',$this->session->userdata('agency_id'));
		//$this->db->where('agency_accounts_users.account_id',$this->session->userdata('account_id'));

		$res=$this->db->get();
		$res_query=$res->result();
		
		//$query=$this->db->get('users',12);	
		
				
			 	if((count($res_query)>1 && count($res_query)!=1)){
					$error="User Already Exist";
					return $error; 
				}else{
			$this->db->where('account_id',$edit_idd);
			 $this->db->update('agency_accounts', $data);
			
			$query = $this->db->get_where('agency_accounts', array('account_id' => $edit_idd));
			return $query->result();
				}

		}
		else
		{
		$this->db->select('agency_accounts.account_id');    
		$this->db->from('agency_accounts');
		$this->db->where('agency_accounts.agency_id',$this->session->userdata('agency_id'));
		$this->db->where('agency_accounts.account_title',$this->input->post('account_title'));
		//$this->db->where('agency_accounts_users.account_id',$this->session->userdata('account_id'));

		$res_title=$this->db->get();
		$res_query_title=$res_title->result();
	
		$this->db->select('agency_accounts.account_id');    
		$this->db->from('agency_accounts');
		$this->db->where('agency_accounts.agency_id',$this->session->userdata('agency_id'));
		$this->db->where('agency_accounts.account_contact_email',$this->input->post('txt_email'));
		$this->db->where('agency_accounts.agency_id',$this->session->userdata('agency_id'));

		$res=$this->db->get();
		$res_query=$res->result();
		
		//$query=$this->db->get('users',12);	
		
				
			 	if((count($res_query)>0 || count($res_query_title)>0)){
					$error="User Already Exist";
					return $error; 
				}else{
					
			 	$this->db->insert('agency_accounts', $data);
				$account_id=$this->db->insert_id();				
              
				$account_fid=$this->db->insert_id();
				$query=$this->db->get_where('agency',array('agency_id' => $this->session->userdata('agency_id')));		
				$agency_data['agency']=$query->result();

				/*$profile_data = array(
				 'account_id'=>$account_fid,
				 'agency_profile_label'=>$agency_data['agency'][0]->agency_profile_label,
				 'agency_profile_logo_color'=>$agency_data['agency'][0]->agency_profile_logo_color,
				 'agency_profile_logo_reverse'=>$agency_data['agency'][0]->agency_profile_logo_reverse,
				 'agency_profile_address_address'=>$agency_data['agency'][0]->agency_profile_address_address,
				 'agency_profile_address_city'=>$agency_data['agency'][0]->agency_profile_address_city,
				 'agency_profile_address_state'=>$agency_data['agency'][0]->agency_profile_address_state,
				 'agency_profile_address_zip'=>$agency_data['agency'][0]->agency_profile_address_zip,
				 'agency_profile_address_country'=>$agency_data['agency'][0]->agency_profile_address_country,
				 'agency_profile_timezone_timezone'=>$agency_data['agency'][0]->agency_profile_timezone_timezone,
				 'agency_profile_phone_phone'=>$agency_data['agency'][0]->agency_profile_phone_phone,
				 'agency_profile_phone_alternate_phone'=>$agency_data['agency'][0]->agency_profile_phone_alternate_phone,
				 'agency_profile_email_email'=>$agency_data['agency'][0]->agency_profile_email_email,
				 'agency_profile_email_alternate_email'=>$agency_data['agency'][0]->agency_profile_email_alternate_email,
				 'agency_profile_domains_domain'=>$agency_data['agency'][0]->agency_profile_domains_domain,
				 'agency_profile_domains_blog_domain'=>$agency_data['agency'][0]->agency_profile_domains_blog_domain,
				 'agency_profile_domains_alternate_domain'=>$agency_data['agency'][0]->agency_profile_domains_alternate_domain,
				 'agency_profile_social_facebook'=>$agency_data['agency'][0]->agency_profile_social_facebook,
				 'agency_profile_social_twitter'=>$agency_data['agency'][0]->agency_profile_social_twitter,
				 'agency_profile_social_googleplus'=>$agency_data['agency'][0]->agency_profile_social_googleplus,
				 'agency_profile_social_other1'=>$agency_data['agency'][0]->agency_profile_social_other1,
				 'agency_profile_social_other2'=>$agency_data['agency'][0]->agency_profile_social_other2,
				 'agency_profile_social_other3'=>$agency_data['agency'][0]->agency_profile_social_other3,
				 'agency_profile_tags_tags'=>$agency_data['agency'][0]->agency_profile_tags_tags,
				 'agency_profiel_notes_notes'=>$agency_data['agency'][0]->agency_profiel_notes_notes,
			);

				$owner_data = array(
				'account_id'=>$account_fid,
				 'agency_owner_person_first_name'=>$agency_data['agency'][0]->agency_owner_person_first_name,
				 'agency_owner_person_last_name'=>$agency_data['agency'][0]->agency_owner_person_last_name,
				 'agency_owner_person_email_address'=>$agency_data['agency'][0]->agency_owner_person_email_address,
				 'agency_owner_person_phone'=>$agency_data['agency'][0]->agency_owner_person_phone,
				 'agency_owner_notification_email'=>$agency_data['agency'][0]->agency_owner_notification_email,
				 'agency_owner_text_email'=>$agency_data['agency'][0]->agency_owner_text_email,
				 'agency_owner_tags'=>$agency_data['agency'][0]->agency_owner_tags,
				 'agency_owner_notes'=>$agency_data['agency'][0]->agency_owner_notes,);
				$option_data = array(
				 'account_id'=>$account_fid,
				 'agency_option_credentials_licence_number'=>$agency_data['agency'][0]->agency_option_credentials_licence_number,
				 'agency_option_credentials_awards'=>$agency_data['agency'][0]->agency_option_credentials_awards,
				 'agency_option_servicedetail_hour_operation'=>$agency_data['agency'][0]->agency_option_servicedetail_hour_operation,
				 'agency_option_servicedetail_service_area'=>$agency_data['agency'][0]->agency_option_servicedetail_service_area,
				 'agency_option_servicedetail_services_offered'=>$agency_data['agency'][0]->agency_option_servicedetail_services_offered,
				 'agency_option_servicedetail_brands_offered'=>$agency_data['agency'][0]->agency_option_servicedetail_brands_offered,
				 'agency_custom_option1'=>$agency_data['agency'][0]->agency_custom_option1,
				 'agency_custom_option2'=>$agency_data['agency'][0]->agency_custom_option2,
				 'agency_custom_option3'=>$agency_data['agency'][0]->agency_custom_option3,
				 'agency_custom_option4'=>$agency_data['agency'][0]->agency_custom_option4,
				 'agency_custom_option5'=>$agency_data['agency'][0]->agency_custom_option5,
				 'agency_custom_option6'=>$agency_data['agency'][0]->agency_custom_option6,
				 'agency_custom_option7'=>$agency_data['agency'][0]->agency_custom_option7,
				 'agency_custom_option9'=>$agency_data['agency'][0]->agency_custom_option9,
				 'agency_custom_option10'=>$agency_data['agency'][0]->agency_custom_option10,
				 'agency_custom_option11'=>$agency_data['agency'][0]->agency_custom_option11,
				 'agency_custom_option12'=>$agency_data['agency'][0]->agency_custom_option12,
				 'agency_custom_option13'=>$agency_data['agency'][0]->agency_custom_option13,
				 'agency_custom_option14'=>$agency_data['agency'][0]->agency_custom_option14,
				 'agency_custom_option15'=>$agency_data['agency'][0]->agency_custom_option15,
				 'agency_custom_option16'=>$agency_data['agency'][0]->agency_custom_option16,
				 'agency_custom_option17'=>$agency_data['agency'][0]->agency_custom_option17,
				 'agency_custom_option18'=>$agency_data['agency'][0]->agency_custom_option18,
				 'agency_custom_option19'=>$agency_data['agency'][0]->agency_custom_option19,
				 'agency_custom_option20'=>$agency_data['agency'][0]->agency_custom_option20,
				);*/
				
				
				
				$profile_data = array(
				 'account_id'=>$account_fid,
			);

				$owner_data = array(
				'account_id'=>$account_fid,
				);
				$option_data = array(
				 'account_id'=>$account_fid,
	
				);
				
			 
			 	$this->db->insert('profile', $profile_data);
			 	$this->db->insert('owner', $owner_data);
			 	$this->db->insert('options', $option_data);
				



				//$account_id= $this->db->insert_id();
				$account_title = array(	
				'account_title'=>$this->input->post('account_title'),
				);			 
				$this->db->where('account_id',$account_id);
				$this->db->update('agency_accounts', $account_title);
				$query = $this->db->get_where('agency_accounts', array('account_id' => $account_id));
				return $query->result();

			
			}
		}
	}
	function profile_agency()
	{
		$edit_idd=$this->input->post('hidden_id');		
		$data = array(
             'account_profile_address'=>$this->input->post('txt_address'),
             'account_profile_city'=>$this->input->post('txt_city'),
             'account_profile_state'=>$this->input->post('lst_profile_state'),
             'account_profile_zip'=>$this->input->post('txt_zip'),
             'account_profile_country'=>$this->input->post('lst_country'),
             'account_profile_phone'=>$this->input->post('txt_profPhone'),
             'account_profile_timezone'=>$this->input->post('txt_timezone'),
        	);
			if($this->input->post('txt_address'))
			{
				$this->db->where('account_id',$this->input->post('hidden_id'));
				return $this->db->update('agency_accounts', $data);
			}
	}
	function do_upload($file_name)
    {
      	$config['upload_path'] = 'assets/img/account';
      	$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']    = '3000';
		/*$config['max_width']  = '1024';
		$config['max_height']  = '768';*/
        $config['remove_spaces']  = TRUE;
        $config['encrypt_name']  = FALSE;
		$config['file_name']  = $file_name;
				
        $this->load->library('upload', $config);
		$this->upload->initialize($config); 				
        if (!$this->upload->do_upload('account_image'))
        {
        	$error = array('error' => $this->upload->display_errors());
            
            $data = array('upload_data' => $this->upload->data());
         }
         else
         {
          	$data = array('upload_data' => $this->upload->data());
         } 
    } 	
	function selectone_agency()
	{					
		$edit_id=$this->uri->segment(3);
		$query = $this->db->get_where('agency_accounts', array('account_id' => $edit_id));
		return $query->result();

	}	
	
	function account_title(){
	$account_id=$this->uri->segment(3);
	if(isset($account_id) && $account_id !=0){
	$account_id = $this->uri->segment(3);
	}else{
	$account_id = $this->session->userdata('account_id');	
	}
	
	$this->db->select('agency_accounts.account_title,agency_accounts.account_id');    
		$this->db->from('agency_accounts');
		$this->db->where('agency_accounts.account_id',$account_id);
		$res=$this->db->get();
		//echo $this->db->last_query();
		$res_query=$res->result();
	    $this->session->set_userdata(array('account_title'       => $res_query[0]->account_title,
										   'current_account_id'       => $res_query[0]->account_id,
										   'editor_page'       => 'editor'));
	} 	
	
	/*function edit_agency()
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
	*/
 }
