<?php
class Account_setting_model extends CI_Model {
	 public function __construct()
 	{
  		$this->load->database();
 	}

	public function profile_owner()
	{
		$agency_id=$this->uri->segment(3);	
		$query = $this->db->get_where('agency', array('agency_id' => $agency_id));
		return $query->result();
	}
	public function all_admin()
	{
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!='')
		{
			$current_account_id=$this->session->userdata('current_account_id');
		}
		else
		{
			$current_account_id=$this->session->userdata('account_id');
		}
		$this->db->select('users.*');    
		$this->db->from('users');
		$this->db->where('agency_accounts_users.role_id',1);
		$this->db->where('agency_accounts_users.account_id',$current_account_id);
		$this->db->join('agency_accounts_users','users.user_id = agency_accounts_users.user_id','INNER');
		$res=$this->db->get();
		$res_query=$res->result();
		return $res_query;
	}	
	public function selected_admin()
	{
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!='')
		{
			$current_account_id=$this->session->userdata('current_account_id');
		}
		else
		{
			$current_account_id=$this->session->userdata('account_id');
		}
		$query = $this->db->get_where('agency_accounts', array('account_id' => $current_account_id));
		return $query->result();
	}	

	function add_owner()
	{	
		$edit_account_idd=$this->input->post('hidden_id');
		$edit_owner_idd=$this->input->post('hiddenownerid');		
		
		$data = array(
	         'agency_owner_person_first_name'=>$this->input->post('owner_first_name'),
        	 'agency_owner_person_last_name'=>$this->input->post('owner_last_name'),
             'agency_owner_person_email_address'=>$this->input->post('owner_email_address'),
             'agency_owner_person_phone'=>$this->input->post('owner_phone'),
             
        );
		
			$account_data = array(
	         'account_owner_id'=>$this->input->post('account_administrator'),
	        );		
			$this->db->where('account_id',$edit_account_idd);
			$this->db->update('agency_accounts', $account_data);
			
			$this->session->set_userdata(array(
                            'owner_user_id'       => $this->input->post('account_administrator')
							));
			
		
		if(isset($edit_account_idd) && $edit_account_idd!='')
		{
			$this->db->where('owner_id',$edit_owner_idd);
			$this->db->where('account_id',$edit_account_idd);
			$this->db->update('owner', $data);
		
		}
		else
		{
		if($this->input->post('owner_first_name'))
			 $this->db->insert('owner', $data);
			 $account_fid=$this->db->insert_id();
			
			$user_data = array(
	         'agency_owner_person_first_name'=>$this->input->post('owner_first_name'),
        	 'agency_owner_person_last_name'=>$this->input->post('owner_last_name'),
             'agency_owner_person_email_address'=>$this->input->post('owner_email_address'),
             'agency_owner_person_phone'=>$this->input->post('owner_phone'),
        );
		if($account_fid!=0)
 		 return $this->db->insert('owner', $user_data);
		
	
		}
		$query = $this->db->get_where('users', array('user_id' =>$this->input->post('account_administrator')));
		
			return $query->result();
	}
	
	
	function owner_delete(){
		
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!='')
		{
			$current_account_id=$this->session->userdata('current_account_id');
		}
		else
		{
			$current_account_id=$this->session->userdata('account_id');
		}
		
		$delete_id=$this->uri->segment(3);	
		$this->db->where('account_id', $current_account_id);
		$this->db->where('user_id', $delete_id);
		$this->db->where('agency_id', $this->session->userdata('agency_id'));
		$this->db->delete('agency_accounts_users');
	}
	
	function add_profile()
	{	
		//echo $this->input->post('profile_timezone'); exit;
		
		 $edit_account_idd=$this->input->post('hidden_id');
		 if($edit_account_idd==''){
		 $edit_account_idd=$this->session->userdata('current_account_id');;
		 }
		 $edit_profile_idd=$this->input->post('hiddenprofileid');
		 		
		$query_get_data = $this->db->get_where('profile', array('account_id' => $this->uri->segment('3')));
		$rs_query= $query_get_data->result();
		if(isset($rs_query) && $rs_query!=''){
		
		$data = array(
             'agency_profile_address_address'=>$this->input->post('profile_address'),
			 'agency_profile_address_city'=>$this->input->post('profile_city'),
             'agency_profile_address_state'=>$this->input->post('profile_state'),
             'agency_profile_address_zip'=>$this->input->post('profile_zip'),
             'agency_profile_address_country'=>$this->input->post('profile_country'),
             'agency_profile_timezone_timezone'=>$this->input->post('profile_timezone'),
			 'agency_profile_phone_phone'=>$this->input->post('profile_phone'),
        	 'agency_profile_phone_alternate_phone'=>$this->input->post('profile_alternate_phone'),
             'agency_profile_email_email'=>$this->input->post('profile_email'),
             'agency_profile_email_alternate_email'=>$this->input->post('profile_alternate_email'),
             'agency_profile_domains_domain'=>$this->input->post('profile_domain'),
             'agency_profile_domains_blog_domain'=>$this->input->post('profile_blog_domain'),
             'agency_profile_domains_alternate_domain'=>$this->input->post('profile_alternate_domain'),
             'agency_profile_social_facebook'=>$this->input->post('profile_facebook'),
			 'agency_profile_social_twitter'=>$this->input->post('profile_twitter'),
        	 'agency_profile_social_googleplus'=>$this->input->post('profile_googleplus'),
             'agency_profile_social_other1'=>$this->input->post('profile_other1'),
             'agency_profile_social_other2'=>$this->input->post('profile_other2'),
             'agency_profile_social_other3'=>$this->input->post('profile_other3'),
             'agency_profile_tags_tags'=>$this->input->post('profile_tags'),
             'agency_profiel_notes_notes'=>$this->input->post('profile_notes')   
        );
		
		if(isset($edit_profile_idd) && $edit_profile_idd!='')
		{
			$this->db->where('profile_id',$edit_profile_idd);
			$this->db->where('account_id',$edit_account_idd);
			$this->db->update('profile', $data);
			
			
			
			if(isset($_FILES["account_image"]["name"]) && $_FILES["account_image"]["name"]!='')
			{ 
				$account_image= $_FILES["account_image"]["name"];
				$data_image=array('account_profile_image'=>$account_image);
				$this->db->where('account_id',$edit_account_idd);
				$this->db->update('agency_accounts', $data_image);
				//echo $this->db->last_query();exit;
			}
			
			
			if(isset($_FILES["image_logo_color"]["name"]) && $_FILES["image_logo_color"]["name"]!='')
			{ 
				$account_image_color= $_FILES["image_logo_color"]["name"];
				$data_image_color=array('agency_profile_logo_color'=>$account_image_color);
				$this->db->where('profile_id',$edit_profile_idd);
				$this->db->update('profile', $data_image_color);
				
			}
			
			if(isset($_FILES["image_logo_reverse"]["name"]) && $_FILES["image_logo_reverse"]["name"]!='')
			{ 
				$account_image_reverse= $_FILES["image_logo_reverse"]["name"];
				$data_image_reverse=array('agency_profile_logo_reverse'=>$account_image_reverse);
				$this->db->where('profile_id',$edit_profile_idd);
				$this->db->update('profile', $data_image_reverse);
			}
			
		}else{
		$this->db->insert('profile', $data);
		$edit_profile_idd=$this->db->insert_id();	
		}
        
		$query = $this->db->get_where('profile', array('profile_id' => $edit_profile_idd));
		return $query->result();
	}
	}
	function add_options()
	{	
		$edit_account_idd=$this->input->post('hidden_id');		
		$edit_option_idd=$this->input->post('hiddenoptionid');
		$data = array(
	         'agency_option_credentials_licence_number'=>$this->input->post('agency_licence_number'),
        	 'agency_option_credentials_awards'=>$this->input->post('agency_awards'),
             'agency_option_servicedetail_hour_operation'=>$this->input->post('agency_hours_operation'),
             'agency_option_servicedetail_service_area'=>$this->input->post('agency_service_area'),
             'agency_option_servicedetail_services_offered'=>$this->input->post('agency_service_offered'),
             'agency_option_servicedetail_brands_offered'=>$this->input->post('agency_brand_offered'),
             'agency_custom_option1'=>$this->input->post('custom_option_1'),
			 'agency_custom_option2'=>$this->input->post('custom_option_2'),
			 'agency_custom_option3'=>$this->input->post('custom_option_3'),
			 'agency_custom_option4'=>$this->input->post('custom_option_4'),
			 'agency_custom_option5'=>$this->input->post('custom_option_5'),
			 'agency_custom_option6'=>$this->input->post('custom_option_6'),
			 'agency_custom_option7'=>$this->input->post('custom_option_7'),
			 'agency_custom_option8'=>$this->input->post('custom_option_8'),
			 'agency_custom_option9'=>$this->input->post('custom_option_9'),
			 'agency_custom_option10'=>$this->input->post('custom_option_10'),
			 'agency_custom_option11'=>$this->input->post('custom_option_11'),
			 'agency_custom_option12'=>$this->input->post('custom_option_12'),
			 'agency_custom_option13'=>$this->input->post('custom_option_13'),
			 'agency_custom_option14'=>$this->input->post('custom_option_14'),
			 'agency_custom_option15'=>$this->input->post('custom_option_15'),
			 'agency_custom_option16'=>$this->input->post('custom_option_16'),
			 'agency_custom_option17'=>$this->input->post('custom_option_17'),
			 'agency_custom_option18'=>$this->input->post('custom_option_18'),
			 'agency_custom_option19'=>$this->input->post('custom_option_19'),
			 'agency_custom_option20'=>$this->input->post('custom_option_20'),
            
             
        );
		if(isset($edit_option_idd) && $edit_option_idd!='')
		{
			$this->db->where('option_id',$edit_option_idd);
			$this->db->where('account_id',$edit_account_idd);
			$this->db->update('options', $data);
			$account_fid=$this->db->insert_id();
		}
		else
		{
		if($this->input->post('agency_licence_number'))
			 $this->db->insert('options', $data);
			 $account_fid=$this->db->insert_id();
			
			$user_data = array(
	         'agency_option_credentials_licence_number'=>$this->input->post('agency_licence_number'),
        	 'agency_option_credentials_awards'=>$this->input->post('agency_awards'),
             'agency_option_servicedetail_hour_operation'=>$this->input->post('agency_hours_operation'),
             'agency_option_servicedetail_service_area'=>$this->input->post('agency_service_area'),
             'agency_option_servicedetail_services_offered'=>$this->input->post('agency_service_offered'),
             'agency_option_servicedetail_brands_offered'=>$this->input->post('agency_brand_offered'),
             'agency_custom_option1'=>$this->input->post('custom_option_1'),
			 'agency_custom_option2'=>$this->input->post('custom_option_2'),
			 'agency_custom_option3'=>$this->input->post('custom_option_3'),
			 'agency_custom_option4'=>$this->input->post('custom_option_4'),
			 'agency_custom_option5'=>$this->input->post('custom_option_5'),
			 'agency_custom_option6'=>$this->input->post('custom_option_6'),
			 'agency_custom_option7'=>$this->input->post('custom_option_7'),
			 'agency_custom_option8'=>$this->input->post('custom_option_8'),
			 'agency_custom_option9'=>$this->input->post('custom_option_9'),
			 'agency_custom_option10'=>$this->input->post('custom_option_10'),
			 'agency_custom_option11'=>$this->input->post('custom_option_11'),
			 'agency_custom_option12'=>$this->input->post('custom_option_12'),
			 'agency_custom_option13'=>$this->input->post('custom_option_13'),
			 'agency_custom_option14'=>$this->input->post('custom_option_14'),
			 'agency_custom_option15'=>$this->input->post('custom_option_15'),
			 'agency_custom_option16'=>$this->input->post('custom_option_16'),
			 'agency_custom_option17'=>$this->input->post('custom_option_17'),
			 'agency_custom_option18'=>$this->input->post('custom_option_18'),
			 'agency_custom_option19'=>$this->input->post('custom_option_19'),
			 'agency_custom_option20'=>$this->input->post('custom_option_20'),		 
        );
		if($account_fid!=0)
 		 return $this->db->insert('options', $user_data);
		
	
		}
		$query = $this->db->get_where('options', array('option_id' =>$edit_option_idd));
			return $query->result();
	}
	
	function options_listing(){
		
		$edit_id=$this->uri->segment(3);
		$query = $this->db->get_where('agency', array('agency_id' => $edit_id));
		return $query->result();
		
	}
	function options_data()
	{
		 $edit_id=$this->uri->segment(3);
		 $text_type=$this->uri->segment(2);
		$query = $this->db->get_where('options', array('account_id' => $edit_id));
		return $query->result();
	}
	function select_image()
	{
		if($this->input->post('hidden_id'))
		{ $edit_id=$this->input->post('hidden_id'); }
		else {$edit_id=$this->uri->segment(3); }
		if($edit_id=='' || $edit_id==0){
		$edit_id=$this->session->userdata('current_account_id');	
		}
		$query = $this->db->get_where('agency_accounts', array('account_id' => $edit_id));
		
		return $query->result();
	}
	
	public function states_list()
	{    
		$query=$this->db->get('list_states');	
		return $query->result();
	}
	public function countries_list()
	{    
		$query=$this->db->get('list_countries');	
		return $query->result();
	}
	
	function select_data()
	{
		$edit_id=$this->uri->segment(3);
		$text_type=$this->uri->segment(2);
		if($text_type=='profile')
		 {  $query = $this->db->get_where('profile', array('account_id' => $edit_id)); }
		if($text_type=='owner')
		{
		///////for owner table///////////////////
		
		
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!='')
		{
			$current_account_id=$this->session->userdata('current_account_id');
		}
		else
		{
			$current_account_id=$this->session->userdata('account_id');
		}
		  
		$this->db->select('agency_accounts.account_owner_id');    
		$this->db->from('agency_accounts');
		$this->db->where('agency_accounts.account_id',$current_account_id);
		$res=$this->db->get();
		$res_query=$res->result();	
		$account_owner_id = $res_query[0]->account_owner_id;	
		//////////for user table///////////////////	
		
		/*$this->db->select('users.user_id');    
		$this->db->from('users');
		$this->db->where('users.user_id',$account_id);
		$res=$this->db->get();
		$res_query=$res->result();	*/
			
		  $user_owner_id = $this->session->userdata('owner_user_id');
		  if($user_owner_id==''){
			$user_owner_id = $this->session->userdata('user_id');  
		  }
				
		$query = $this->db->get_where('users', array('user_id' => $account_owner_id));
		$num_rows= $query->num_rows();
		
		if($num_rows==0){
		$query='empty';	
		}
		
		}
		if($text_type=='options')
		{	
			$query = $this->db->get_where('options', array('account_id' => $edit_id));
		}
		if($query!='empty'){
		return $query->result();
		}else{
		return $query;	
		}
	}	

	function do_upload_color($file_name)
    {
      	$config['upload_path'] = 'assets/img/account_color';
      	$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size']    = '3000';
		/*$config['max_width']  = '1024';
		$config['max_height']  = '768';*/
        $config['remove_spaces']  = TRUE;
        $config['encrypt_name']  = FALSE;
		$config['file_name']  = $file_name;
				
        $this->load->library('upload', $config);
		$this->upload->initialize($config); 				
        if (!$this->upload->do_upload('image_logo_color'))
        {
        	$error = array('error' => $this->upload->display_errors());
     
            $data = array('upload_data' => $this->upload->data());
         }
         else
         {
          	$data = array('upload_data' => $this->upload->data());
         } 
    } 	
	
	function do_upload_reverse($file_name)
    {
      	$config['upload_path'] = 'assets/img/account_reverse';
      	$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size']    = '3000';
		/*$config['max_width']  = '1024';
		$config['max_height']  = '768';*/
        $config['remove_spaces']  = TRUE;
        $config['encrypt_name']  = FALSE;
		$config['file_name']  = $file_name;
				
        $this->load->library('upload', $config);
		$this->upload->initialize($config); 				
        if (!$this->upload->do_upload('image_logo_reverse'))
        {
        	$error = array('error' => $this->upload->display_errors());
            
            $data = array('upload_data' => $this->upload->data());
         }
         else
         {
          	$data = array('upload_data' => $this->upload->data());
         } 
    }
	
	function do_upload_account_image($file_name)
    {
      	$config['upload_path'] = 'assets/img/account';
      	$config['allowed_types'] = 'gif|jpg|jpeg|png';
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
										   'editor_page'       => ''));
	} 	
	
 }
