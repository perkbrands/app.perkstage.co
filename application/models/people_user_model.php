<?php
class People_user_model extends CI_Model {
	public function __construct()
 	{
  		$this->load->database();
 	}	

	public function get_administrator_account()
	{
		$query=$this->db->get('agency_accounts');
		return $query->result();
	}
	
	public function profile_administrator()
	{
		
		$profile_id=$this->uri->segment(3);
		$query = $this->db->get_where('audience', array('audience_id' => $profile_id));
		return $query->result();
	}
	public function administrator_all()
	{   
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!=''){
			$current_account_id=$this->session->userdata('current_account_id');
		}else{
			$current_account_id=$this->session->userdata('account_id');
		}
		
		/*$this->db->select('users.is_default');    
		$this->db->from('users');
		$this->db->where('users.user_id',$this->session->userdata('user_id'));
		$user_data=$this->db->get();
		//echo $this->db->last_query();
		$res_user_data=$user_data->result();
		$default_user = $res_user_data[0]->is_default;*/
		
		$this->db->select('users.*');    
		$this->db->from('users');
		$this->db->where('agency_accounts_users.agency_id',$this->session->userdata('agency_id'));
		$this->db->where('agency_accounts_users.account_id',$current_account_id);
		$this->db->where('agency_accounts_users.role_id',1);
		//$this->db->where('agency_accounts_users.account_id',$this->session->userdata('account_id'));
		$this->db->join('agency_accounts_users', 'users.user_id = agency_accounts_users.user_id','INNER');

		$res=$this->db->get();
		$res_query=$res->result();
		//$query=$this->db->get('users',12);	
		return $res_query;
	}
	public function editor_all()
	{
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!=''){
			$current_account_id=$this->session->userdata('current_account_id');
		}else{
			$current_account_id=$this->session->userdata('account_id');
		}
		
		$this->db->select('users.*');    
		$this->db->from('users');
		$this->db->where('agency_accounts_users.agency_id',$this->session->userdata('agency_id'));
		$this->db->where('agency_accounts_users.account_id',$current_account_id);
		$this->db->where('agency_accounts_users.role_id',2);
		//$this->db->where('agency_accounts_users.account_id',$this->session->userdata('account_id'));
		$this->db->join('agency_accounts_users', 'users.user_id = agency_accounts_users.user_id','INNER');

		$res=$this->db->get();
		$res_query=$res->result();
		//$query=$this->db->get('users',12);	
		return $res_query;
	}
	
	public function member_all()
	{
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!=''){
			$current_account_id=$this->session->userdata('current_account_id');
		}else{
			$current_account_id=$this->session->userdata('account_id');
		}
		
		$this->db->select('users.*');    
		$this->db->from('users');
		$this->db->where('agency_accounts_users.agency_id',$this->session->userdata('agency_id'));
		$this->db->where('agency_accounts_users.account_id',$current_account_id);
		$this->db->where('agency_accounts_users.role_id',3);
		//$this->db->where('agency_accounts_users.account_id',$this->session->userdata('account_id'));
		$this->db->join('agency_accounts_users', 'users.user_id = agency_accounts_users.user_id','INNER');

		$res=$this->db->get();
		$res_query=$res->result();
		//$query=$this->db->get('users',12);	
		return $res_query;
	}
		
	public function people_administrator_listing()
	{
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!=''){
			$current_account_id=$this->session->userdata('current_account_id');
		}else{
			$current_account_id=$this->session->userdata('account_id');
		}    
	    $role_id=$this->input->post('user_role');
	    if($role_id==''){
		$role_id=1;	
		}
		
		if($this->uri->segment('3')=='anew'){
			$role_id=1;
		}
		if($this->uri->segment('3')=='enew'){
			$role_id=2;
		}
		if($this->uri->segment('3')=='mnew'){
			$role_id=3;
		}
		$this->db->select('users.*,agency_accounts_users.account_id');    
		$this->db->from('users');
		$this->db->where('agency_accounts_users.agency_id',$this->session->userdata('agency_id'));
		$this->db->where('agency_accounts_users.account_id',$current_account_id);
		$this->db->where('agency_accounts_users.role_id',$role_id);
		//$this->db->where('agency_accounts_users.account_id',$this->session->userdata('account_id'));
		$this->db->join('agency_accounts_users', 'users.user_id = agency_accounts_users.user_id','INNER');

		$res=$this->db->get();
		$res_query=$res->result();
		//$query=$this->db->get('users',12);	
		return $res_query;
	}
	
	
	public function people_audience_listing()
	{  
	    $ac_id=$this->session->userdata('current_account_id');
		if($ac_id!=''){
			$current_account_id=$this->session->userdata('current_account_id');
		}else{
			$current_account_id=$this->session->userdata('account_id');
		}    
	
		$this->db->select('audience.*');    
		$this->db->from('audience');
		$this->db->where('audience.audience_status',1);
		$this->db->where('audience_account.account_id',$current_account_id);
		$this->db->join('audience_account','audience.audience_id = audience_account.audience_id','INNER');
		$res=$this->db->get();
		$res_query=$res->result();
		//$query=$this->db->get('users',12);	
		return $res_query;
		
	}
	
	public function people_timezone_listing()
	{    
		$query=$this->db->get('list_timezones');	
		return $query->result();
	}
	
	
	public function people_editor_listing()
	{
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!=''){
			$current_account_id=$this->session->userdata('current_account_id');
		}else{
			$current_account_id=$this->session->userdata('account_id');
		}    
	    
		
	    $this->db->select('users.*');    
		$this->db->from('users');
		$this->db->where('agency_accounts_users.agency_id',$this->session->userdata('agency_id'));
		$this->db->where('agency_accounts_users.account_id',$current_account_id);
		$this->db->where('agency_accounts_users.role_id',2);
		//$this->db->where('agency_accounts_users.account_id',$this->session->userdata('account_id'));
		$this->db->join('agency_accounts_users', 'users.user_id = agency_accounts_users.user_id','INNER');

		$res=$this->db->get();
		$res_query=$res->result();
		//$query=$this->db->get('users',12);	
		return $res_query;
	}
	
	
	public function people_member_listing()
	{    
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!=''){
			$current_account_id=$this->session->userdata('current_account_id');
		}else{
			$current_account_id=$this->session->userdata('account_id');
		}
	
	    $this->db->select('users.*');    
		$this->db->from('users');
		$this->db->where('agency_accounts_users.agency_id',$this->session->userdata('agency_id'));
		$this->db->where('agency_accounts_users.role_id',3);
		$this->db->where('agency_accounts_users.account_id',$current_account_id);
		//$this->db->where('agency_accounts_users.account_id',$this->session->userdata('account_id'));
		
		$this->db->join('agency_accounts_users', 'users.user_id = agency_accounts_users.user_id','INNER');

		$res=$this->db->get();
		//echo $this->db->last_query();
		$res_query=$res->result();
		//$query=$this->db->get('users',12);	
		return $res_query;
	}
	
	
	public function people_me_list()
	{    
	
	    $this->db->select('users.*');    
		$this->db->from('users');
		$this->db->where('users.user_id',$this->session->userdata('user_id'));
		$this->db->where('agency_accounts_users.agency_id',$this->session->userdata('agency_id'));
		$this->db->where('agency_accounts_users.account_id',$this->session->userdata('account_id'));
		$this->db->join('agency_accounts_users', 'users.user_id = agency_accounts_users.user_id','INNER');

		$res=$this->db->get();
		$res_query=$res->result();
		//$query=$this->db->get('users',12);	
		return $res_query;
	}

	public function search_poeple()
	{
	  	$search_field=$this->input->post('txt_search');
		if(isset($search_field) && $search_field!=''){
			$people_name= explode(' ',$search_field);
			$first_name=$people_name[0];
			$last_name=$people_name[1];
		}
		$search_filter=$this->input->post('selected_value');
		
		$search_in=$this->input->post('hidden_val_people');
		$role_id=1;
		if($search_in=='administrator')
		{
			$role_id=1;
		}
		if($search_in=='editor')
		{
			$role_id=2;
		}
		if($search_in=='member')
		{
			$role_id=3;
		}
        
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!=''){
			$current_account_id=$this->session->userdata('current_account_id');
		}else{
			$current_account_id=$this->session->userdata('account_id');
		}	
		
		if($search_filter==0 || $search_filter==1 || $search_filter==2)
	   	{   
			
			 /////////////////
	    $this->db->select('users.*');    
		$this->db->from('users');
		$this->db->where('agency_accounts_users.role_id',$role_id);
		$this->db->where('agency_accounts_users.account_id',$current_account_id);
		$this->db->where('agency_accounts_users.agency_id',$this->session->userdata('agency_id'));
		
		if($search_filter==2)
	   	{
			
		}
		else if($search_filter==1){
			$this->db->where('users.user_status', $search_filter);
		}
		else if($search_filter==0){
			$this->db->where('users.user_status', $search_filter);
		}
		$this->db->join('agency_accounts_users', 'agency_accounts_users.user_id = users.user_id','INNER');
        if($search_field!=''){
		//$this->db->like('users.user_first_name', $search_field);
		//$this->db->or_like('users.user_last_name', $search_field);	
		
		$this->db->where("(`users`.`user_first_name` LIKE '%$first_name%' OR `users`.`user_last_name` LIKE '%$last_name%')");
		}
		$res=$this->db->get();
		//echo $query=$this->db->last_query();exit;
		
		$res_query=$res->result();
	    return $res_query;			
		}
		else
		{
			
		$this->db->select('users.*');    
		$this->db->from('users');
		$this->db->where('agency_accounts_users.role_id',$role_id);
		$this->db->where('agency_accounts_users.account_id',$current_account_id);
		$this->db->where('agency_accounts_users.agency_id',$this->session->userdata('agency_id'));
		$this->db->like('user_first_name', $search_field);
		$this->db->like('user_last_name', $search_field);
		$this->db->join('agency_accounts_users', 'agency_accounts_users.user_id = users.user_id','INNER');

		$res=$this->db->get();
		$res_query=$res->result();
	    return $res_query;				
		}
	}
	public function checked_audience()
	{
		$user_id=$this->input->post('hiddenid');
		if(isset($user_id) && $user_id!='')
		{  }
		else {$user_id=$this->uri->segment(3);}
		$query = $this->db->get_where('users_audiences', array('user_id' => $user_id));		
		return $query->result();
	}	


	public function people_add_administrator()
	{
		
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!=''){
			$current_account_id=$this->session->userdata('current_account_id');
		}else{
			$current_account_id=$this->session->userdata('account_id');
		}    
		
		//print_r($this->input->post('audience_select'));
		
		if(isset($_FILES["poeple_image"]["name"]) && $_FILES["poeple_image"]["name"]!='')
		{
			$poeple_image= $_FILES["poeple_image"]["name"];
		}
		$user_id=$this->input->post('hiddenid');		
		
		if(isset($_FILES["poeple_image"]["name"]) && $_FILES["poeple_image"]["name"]!='')
		{
		$administrator_user_data = array(
             'user_status'=>$this->input->post('user_status'),
             'user_name'=>$this->input->post('username'),
			 'user_email'=>$this->input->post('username'),
             'user_profile_image'=>$poeple_image,			 
             'user_password'=>base64_encode($this->input->post('password')),
             'user_first_name'=>$this->input->post('first_name'),
             'user_last_name'=>$this->input->post('last_name'),
             'user_profile_timezone'=>$this->input->post('time_zone'),
			 'user_notification_recieve_email_at'=>$this->input->post('recieve_email_at'),
			 'user_notification_recieve_text_at'=>$this->input->post('recieve_text_at'),
			 'user_tags_tags'=>$this->input->post('user_tags'),
			 'user_notes_notes'=>$this->input->post('user_notes'),
        );
		}else{
		$administrator_user_data = array(
             'user_status'=>$this->input->post('user_status'),
             'user_name'=>$this->input->post('username'),
			 'user_email'=>$this->input->post('username'),			 
             'user_password'=>base64_encode($this->input->post('password')),
             'user_first_name'=>$this->input->post('first_name'),
             'user_last_name'=>$this->input->post('last_name'),
             'user_profile_timezone'=>$this->input->post('time_zone'),
			 'user_notification_recieve_email_at'=>$this->input->post('recieve_email_at'),
			 'user_notification_recieve_text_at'=>$this->input->post('recieve_text_at'),
			 'user_tags_tags'=>$this->input->post('user_tags'),
			 'user_notes_notes'=>$this->input->post('user_notes'),
        );	
		}
		if(isset($user_id) && $user_id!='' && $user_id!='new')
		{
		    $this->db->select('users.user_id');    
			$this->db->from('users');
			$this->db->where('users.user_name',$this->input->post('username'));
			$this->db->where('users.user_id !=',$user_id);
			$this->db->where('agency_accounts_users.agency_id',$this->session->userdata('agency_id'));
			$this->db->join('agency_accounts_users', 'users.user_id = agency_accounts_users.user_id', 'inner');
			
			$res=$this->db->get();
			$res_query=$res->result();
		
			/*$query = $this->db->select('users.user_id')
              ->from('users')
              ->where('users.user_name', $this->input->post('username'))
              ->get();
				$row_count=$query->num_rows();*/
			 	if(count($res_query)>0){
					$error="User Already Exist";
					return $error; 
				}else{
			$this->db->where('user_id',$user_id);
			$this->db->update('users', $administrator_user_data);
			
			
			 	if($this->input->post('audience_select'))
				{
						$this->db->where('user_id', $user_id);
						$this->db->delete('users_audiences');
					$audience_arr[]=$this->input->post('audience_select');
					for($i=0; $i<count($audience_arr[0]);$i=$i+1)
					{
						$audience_data = array(
						'audience_id'=>$audience_arr[0][$i],
						'user_id'=>$user_id,		 
						);				
						$this->db->insert('users_audiences',$audience_data);
					}
					
				}	
			$users_accounts_agency = array(	
			'user_id'=>$user_id,
            'agency_id'=>$this->session->userdata('agency_id'),
            'account_id'=>$current_account_id,
            'role_id'=>$this->input->post('user_role'),
			);
			
			$this->db->where('user_id',$user_id); 
			$this->db->where('agency_id',$this->session->userdata('agency_id'));
			$this->db->where('account_id',$current_account_id);
			
			$this->db->update('agency_accounts_users', $users_accounts_agency);
			/*
			$this->db->where('user_id',$user_id);
			$users_audience = array(	
			'user_id'=>$user_id,
            'audience_id'=>$this->input->post('audience_select'),
            
			);
			$this->db->update('users_audiences', $users_audience);
		*/
		return $user_id;
				}
		}
		else
		{
			if($this->input->post('username'))
			{
				
			$this->db->select('users.user_id');    
			$this->db->from('users');
			$this->db->where('users.user_name',$this->input->post('username'));
			$this->db->where('agency_accounts_users.agency_id',$this->session->userdata('agency_id'));
			$this->db->join('agency_accounts_users', 'users.user_id = agency_accounts_users.user_id', 'inner');
			
			$res=$this->db->get();
			$res_query=$res->result();
			 	if(count($res_query)>0){
					$error="User Already Exist";
					return $error; 
				}else{
				$this->db->insert('users',$administrator_user_data);
				$user_id=$this->db->insert_id();
				if($this->input->post('audience_select'))
				{
					$audience_arr[]=$this->input->post('audience_select');
					for($i=0; $i<count($audience_arr[0]);$i=$i+1)
					{
						$audience_data = array(
						'audience_id'=>$audience_arr[0][$i],
						'user_id'=>$user_id,		 
						);				
						$this->db->insert('users_audiences',$audience_data);
					}
				}	
				
			 $users_accounts_agency = array(	
			 'user_id'=>$user_id,
             'agency_id'=>$this->session->userdata('agency_id'),
             'account_id'=>$current_account_id,
             'role_id'=>$this->input->post('user_role'),
			 );
			 
			 $this->db->insert('agency_accounts_users',$users_accounts_agency);
			 
			$users_audience = array(	
			'user_id'=>$user_id,
            'audience_id'=>$this->input->post('audience_select'),
			);
			//$this->db->insert('users_audiences', $users_audience);
				}
			}
		}
		
		$query = $this->db->get_where('users', array('user_id' => $user_id));
		return $query->result();
		
	}
		
 
	
	public function delete_administrator(){
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!=''){
			$current_account_id=$this->session->userdata('current_account_id');
		}else{
			$current_account_id=$this->session->userdata('account_id');
		}
		 $delete_id=$this->uri->segment(3); 
		 $this->db->where('user_id', $delete_id);
		 $this->db->delete('users');
	$this->db->delete('agency_accounts_users', array('user_id' => $delete_id,'agency_id' => $this->session->userdata('agency_id'),'account_id' => $current_account_id));
		 
		
	}
	function do_upload($file_name)
    {
      	$config['upload_path'] = 'assets/img/people';
      	$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']    = '3000';
		/*$config['max_width']  = '1024';
		$config['max_height']  = '768';*/
        $config['remove_spaces']  = TRUE;
        $config['encrypt_name']  = FALSE;
		$config['file_name']  = $file_name;
				
        $this->load->library('upload', $config);
		$this->upload->initialize($config); 				
        if (!$this->upload->do_upload('poeple_image'))
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
	public function selectone_people_administrator()
	{
		$edit_id=$this->uri->segment(3);
		//$account_query = $this->db->get_where('audience_account', array('audience_id' => $edit_id));
		if($this->input->post('hiddenid')!=''){
			$edit_id=$this->input->post('hiddenid');
		}
		
		$query = $this->db->select('users.*, agency_accounts_users.role_id')
              ->from('users')
              ->join('agency_accounts_users', 'users.user_id = agency_accounts_users.user_id', 'left')
              ->where('users.user_id', $edit_id)
			  
              ->get();
		//print_r($query->result());exit;
		return $query->result();
	}
	
	public function selectone_people_editor()
	{
		$edit_id=$this->uri->segment(3);
		//$account_query = $this->db->get_where('audience_account', array('audience_id' => $edit_id));
		if($this->input->post('hiddenid')!=''){
			$edit_id=$this->input->post('hiddenid');
		}
		$query = $this->db->select('users.*, agency_accounts_users.role_id')
              ->from('users')
              ->join('agency_accounts_users', 'users.user_id = agency_accounts_users.user_id', 'left')
              ->where('users.user_id', $edit_id)
			  
              ->get();
		//print_r($query->result());exit;
		return $query->result();
	}
	
	public function selectone_people_member()
	{
		$edit_id=$this->uri->segment(3);
		//$account_query = $this->db->get_where('audience_account', array('audience_id' => $edit_id));
		if($this->input->post('hiddenid')!=''){
			$edit_id=$this->input->post('hiddenid');
		}
		$query = $this->db->select('users.*, agency_accounts_users.role_id')
              ->from('users')
              ->join('agency_accounts_users', 'users.user_id = agency_accounts_users.user_id', 'left')
              ->where('users.user_id', $edit_id)
			  
              ->get();
		//print_r($query->result());exit;
		return $query->result();
	}
	
	public function select_audience()
	{
		$edit_id=$this->uri->segment(3);
		//$account_query = $this->db->get_where('audience_account', array('audience_id' => $edit_id));
		
		$query = $this->db->select('users_audiences.*')
              ->from('users_audiences')
              ->where('users_audiences.user_id', $edit_id)
			  
              ->get();
		//print_r($query->result());exit;
		return $query->result();
	}	
	
	public function select_me()
	{
		$edit_id=$this->uri->segment(3);
		//$account_query = $this->db->get_where('audience_account', array('audience_id' => $edit_id));
		
		$query = $this->db->select('users.*, agency_accounts_users.role_id')
              ->from('users')
              ->join('agency_accounts_users', 'users.user_id = agency_accounts_users.user_id', 'left')
              ->where('users.user_id', $edit_id)
			  
              ->get();
		//print_r($query->result());exit;
		return $query->result();
	}	
	
	
	
 }
