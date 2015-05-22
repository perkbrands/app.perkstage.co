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
	function add_owner()
	{	
		 $edit_idd=$this->input->post('hiddenid');		
		
		$data = array(
	         'agency_owner_person_first_name'=>$this->input->post('owner_first_name'),
        	 'agency_owner_person_last_name'=>$this->input->post('owner_last_name'),
             'agency_owner_person_email_address'=>$this->input->post('owner_email_address'),
             'agency_owner_person_phone'=>$this->input->post('owner_phone'),
             'agency_owner_notification_email'=>$this->input->post('owner_recieve_email'),
             'agency_owner_text_email'=>$this->input->post('owner_recieve_text'),
             'agency_owner_tags'=>$this->input->post('owner_tags'),
             'agency_owner_notes'=>$this->input->post('owner_notes'),
             
        );
		if(isset($edit_idd) && $edit_idd!='')
		{
			$this->db->where('owner_id',$this->input->post('hiddenid'));
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
             'agency_owner_notification_email'=>$this->input->post('owner_recieve_email'),
             'agency_owner_text_email'=>$this->input->post('owner_recieve_text'),
             'agency_owner_tags'=>$this->input->post('owner_tags'),
             'agency_owner_notes'=>$this->input->post('owner_notes')		 
        );
		if($account_fid!=0)
 		 return $this->db->insert('owner', $user_data);
		
	
		}
		$query = $this->db->get_where('owner', array('owner_id' =>$edit_idd));
			return $query->result();
	}
	
	function add_profile()
	{	
			
		 $edit_idd=$this->input->post('hiddenid');		
		$query_get_data = $this->db->get_where(' profile', array('account_id' => $this->uri->segment('3')));
		$rs_query= $query_get_data->result();
		if(isset($rs_query) && $rs_query!=''){
		
		$data = array(
	         'agency_profile_label'=>$this->input->post('profile_label'),
        	 'agency_profile_logo_color'=>$this->input->post('profile_logo_color'),
             'agency_profile_logo_reverse'=>$this->input->post('profile_logo_reverse'),
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
		
		if(isset($edit_idd) && $edit_idd!='')
		{
			$this->db->where('profile_id',$this->input->post('hiddenid'));
			$this->db->update('profile', $data);
		}else{
		$this->db->insert('profile', $data);
		$edit_idd=$this->db->insert_id();	
		}
        
		$query = $this->db->get_where('profile', array('profile_id' => $edit_idd));
		return $query->result();
	}
	}
	function add_options()
	{	
		$edit_idd=$this->input->post('hiddenid');		
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
		if(isset($edit_idd) && $edit_idd!='')
		{
			$this->db->where('option_id',$this->input->post('hiddenid'));
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
		$query = $this->db->get_where('options', array('option_id' =>$edit_idd));
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
		if($this->input->post('hiddenid'))
		{ $edit_id=$this->input->post('hiddenid'); }
		else {$edit_id=$this->uri->segment(3); }
		$query = $this->db->get_where('agency_accounts', array('account_id' => $edit_id));
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
		$query = $this->db->get_where('owner', array('account_id' => $edit_id));}
		if($text_type=='options')
		{	
			$query = $this->db->get_where('options', array('account_id' => $edit_id));
		}
		return $query->result();
	}	

	
 }
