<?php
class Pages_model extends CI_Model {
	public function __construct()
 	{
  		$this->load->database();
	}	

	public function get_account()
	{
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!=''){
			$current_account_id=$this->session->userdata('current_account_id');
		}else{
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
	
	public function delete_page()
	{
		$delete_id=$this->uri->segment(3);	
		$this->db->where('page_id', $delete_id);
		$this->db->delete('pages');
		
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!=''){
			$current_account_id=$this->session->userdata('current_account_id');
		}else{
			$current_account_id=$this->session->userdata('account_id');
		}
		
		$this->db->where('page_id', $delete_id);
		$this->db->where('account_id', $current_account_id);
		$this->db->delete('pages_accounts');
		
		$this->db->where('page_id', $delete_id);
		$this->db->where('account_id', $current_account_id);
		$this->db->delete('pages_websites');
		
	}	
	public function select_page()
	{
		$query=$this->db->get('pages');	
		return $query->result();
	}
	
	public function profile_page()
	{
		
		$page_id=$this->uri->segment(3);
		$query = $this->db->get_where('pages', array('page_id' => $page_id));
		return $query->result();
	}
	
	public function page_listing()
	{
		
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!=''){
			$current_account_id=$this->session->userdata('current_account_id');
		}else{
			$current_account_id=$this->session->userdata('account_id');
		}    
		
		if($this->uri->segment(2)=='selected_website'){
		$query_pages="select DISTINCT * from pages 
		INNER JOIN `pages_websites` ON `pages`.`page_id` = `pages_websites`.`page_id`
		WHERE pages.page_id in ( SELECT page_id from pages_accounts where pages_accounts.account_id='".$current_account_id."' and pages_websites.website_id='".$this->uri->segment(3)."') group by pages.page_id";	
		}else{
		
		$query_pages="select DISTINCT * from pages 
		INNER JOIN `pages_websites` ON `pages`.`page_id` = `pages_websites`.`page_id`
		WHERE pages.page_id in ( SELECT page_id from pages_accounts where pages_accounts.account_id='".$current_account_id."') group by pages.page_id";
		}
		$res=$this->db->query($query_pages);
		
		$res_query=$res->result();	
	   /* $this->db->select('pages.*');    
		$this->db->from('pages');
		$this->db->where('audience_account.account_id',$current_account_id);
		$this->db->join('audience_account', 'pages.audience_id = audience_account.audience_id','INNER');
		$res=$this->db->get();
		$res_query=$res->result();*/
		//$query=$this->db->get('users',12);	
		return $res_query;

	}

	public function search_page()
	{
	  	$search_field=$this->input->post('txt_search');
	   	$search_filter=$this->input->post('selected_value');
		
		if($search_filter==''){
		$search_filter=$this->input->post('lst_filter');
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
	    $this->db->select('pages.*');    
		$this->db->from('pages');
		
		if($search_filter==2)
	   	{
		}else{	
		$this->db->where('pages.page_status', $search_filter);
		}
		$this->db->where('pages_accounts.account_id', $current_account_id);
		$this->db->join('pages_accounts', 'pages.page_id = pages.page_id','INNER');
        if( $search_field!=''){
		$this->db->like('pages.page_profile_title', $search_field);	
		}
		$this->db->distinct();
		$res=$this->db->get();
		//echo $this->db->last_query();
		$res_query=$res->result();
	    return $res_query;			
		}
		 
		
	}
	
	public function page_all()
	{
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!=''){
			$current_account_id=$this->session->userdata('current_account_id');
		}else{
			$current_account_id=$this->session->userdata('account_id');
		}    
	
	    $query_pages="select * from pages 
		INNER JOIN `pages_websites` ON `pages`.`page_id` = `pages_websites`.`page_id`
		WHERE pages.page_id in ( SELECT page_id from pages_accounts where pages_accounts.account_id='".$current_account_id."')";
		
		$this->db->distinct();
		$res=$this->db->query($query_pages);
		
		$res_query=$res->result();	
		return $res_query;
	}
	function do_upload($file_name)
    {
      	$config['upload_path'] = 'assets/img/pages_img';
      	$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']    = '1000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
        $config['remove_spaces']  = TRUE;
        $config['encrypt_name']  = FALSE;
		$config['file_name']  = $file_name;
				
        $this->load->library('upload', $config);
		$this->upload->initialize($config); 				
        if (!$this->upload->do_upload('page_image'))
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
	public function add_page()
	{
		if(isset($_FILES["page_image"]["name"]) &&$_FILES["page_image"]["name"]!='')
		{
			$page_image= $_FILES["page_image"]["name"];
		}
		
		$edit_idd=$this->input->post('hiddenid');
		if(isset($_FILES["page_image"]["name"]) &&$_FILES["page_image"]["name"]!='')
		{
		$page_data = array(
            'page_status'=>$this->input->post('page_status'),
            'page_profile_image'=>$page_image,
            'page_profile_title'=>$this->input->post('txt_profile_title'),
            'page_profile_summary'=>$this->input->post('txt_profile_summary'),
            'page_tag'=>$this->input->post('txt_tag'),
            'page_note'=>$this->input->post('txt_note'),
       	);
		}else{
			$page_data = array(
			'page_status'=>$this->input->post('page_status'),
            'page_profile_title'=>$this->input->post('txt_profile_title'),
            'page_profile_summary'=>$this->input->post('txt_profile_summary'),
            'page_tag'=>$this->input->post('txt_tag'),
            'page_note'=>$this->input->post('txt_note'),
			);	
		}
		if(isset($edit_idd) && $edit_idd!='' && $edit_idd!='new')
		{
			
			$this->db->select('pages.page_profile_title');    
			$this->db->from('pages');
			$this->db->where('pages.page_profile_title',$this->input->post('txt_profile_title'));
			$this->db->where('pages.page_id !=',$edit_idd);
			
			$res=$this->db->get();
			$res_query=$res->result();
		    
		
			 	if(count($res_query)>0){
					$error="Title Already Exist";
					return $error;
				}else{
			$this->db->where('page_id',$edit_idd);
			$this->db->update('pages', $page_data);
			    $select_value = $this->input->post('accounts_select');
				
				if($select_value==''){
				$this->db->where('page_id', $edit_idd);
				$this->db->delete('pages_accounts');	
				}
				
				if($this->input->post('accounts_select'))
				{
						$this->db->where('page_id', $edit_idd);
						$this->db->delete('pages_accounts');
					$account_arr[]=$this->input->post('accounts_select');
				
					for($i=0; $i<count($account_arr[0]);$i=$i+1)
					{
						$account_data = array(
						'account_id'=>$account_arr[0][$i],
						'page_id'=>$edit_idd,		 
						);				

						$this->db->insert('pages_accounts',$account_data);
					}
				}
				
				$select_website = $this->input->post('website_select');
				if($select_website==''){
					$this->db->where('page_id', $edit_idd);
					$this->db->delete('pages_websites');
				}
				
				if($this->input->post('website_select'))
				{
					$this->db->where('page_id', $edit_idd);
					$this->db->delete('pages_websites');
					$website_arr[]=$this->input->post('website_select');
					for($i=0; $i<count($website_arr[0]);$i=$i+1)
					{
						$website_data = array(
						'website_id'=>$website_arr[0][$i],
						'page_id'=>$edit_idd,		 
						);				

						$this->db->insert('pages_websites',$website_data);
					}
				}
				return $edit_idd;
				}
				
		}
		else
		{ 
			if($this->input->post('txt_profile_title'))
			{
			$this->db->select('pages.page_profile_title');    
			$this->db->from('pages');
			$this->db->where('pages.page_profile_title',$this->input->post('txt_profile_title'));
			
			$res=$this->db->get();
			
			$res_query=$res->result();
		
		
			 	if(count($res_query)>0){
					$error="Title Already Exist";
					return $error;
				}else{
				
				$this->db->insert('pages',$page_data);
			 	$page_fid=$this->db->insert_id();
				if($this->input->post('accounts_select'))
				{
				$account_arr[]=$this->input->post('accounts_select');
				
					for($i=0; $i<count($account_arr[0]);$i++)
					{
						$account_data = array(
						'account_id'=>$account_arr[0][$i],
						'page_id'=>$page_fid,		 
						);		
						$this->db->insert('pages_accounts',$account_data);
					}
				}
				if($this->input->post('website_select'))
				{
				$website_arr[]=$this->input->post('website_select');
					for($i=0; $i<count($website_arr[0]);$i++)
					{
						$website_data = array(
						'website_id'=>$website_arr[0][$i],
						'page_id'=>$page_fid,		 
						);		
						if($this->db->insert('pages_websites',$website_data)){
						$error="Websites Successfully Created in Selected Account(s)";
					     return $error;	
						}
					}
				}

			}
		}
		}
	}
		

	public function select_page_account()
	{
		$page_id=$this->input->post('hiddenid');
		if($page_id==''){
			$page_id=$this->uri->segment(3);	
	     }
		$query = $this->db->get_where('pages_accounts', array('page_id' => $page_id));
		
		return $query->result();
	}	
	public function select_page_website()
	{
		$page_id=$this->input->post('hiddenid');
		if($page_id==''){
			$page_id=$this->uri->segment(3);	
	     }
		$query = $this->db->get_where('pages_websites', array('page_id' => $page_id));		
		return $query->result();
	}	

	public function selectone_page()
	{
		$edit_id=$this->uri->segment(3);
		
		
		if($this->input->post('hiddenid')!=''){
			$edit_id=$this->input->post('hiddenid');
		}
		
		
		$query = $this->db->get_where('pages', array('page_id' => $edit_id));		
		return $query->result();
	}	
	public function selectone_account()
	{
		$edit_id=$this->uri->segment(3);
		$query = $this->db->get_where('pages', array('page_id' => $edit_id));
		return $query->result();
	}
	
	public function update_content()
	{
		$edit_id=$this->input->post('page_id');
		$post_data=$this->input->post('editor1');
		$data_post=addslashes($post_data);
		$update_data = array(
			'page_content'=>$data_post,
			);	
		
		$this->db->where('page_id',$edit_id);
		$this->db->update('pages', $update_data);
		return $data_post;
	}
	
	public function get_content()
	{
		$edit_id=$this->uri->segment(3);
		$query = $this->db->get_where('pages', array('page_id' => $edit_id));
		$rs= $query->result();
	
		return $rs[0]->page_content;
	}
	
	public function select_active_website()
	{
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!=''){
			$current_account_id=$this->session->userdata('current_account_id');
		}else{
			$current_account_id=$this->session->userdata('account_id');
		} 
		 
		 
		$query_websites="select * from websites 
		INNER JOIN `websites_accounts` ON `websites`.`id` = `websites_accounts`.`website_id`
		WHERE websites_accounts.account_id='".$current_account_id."'";
		
		$this->db->distinct();
		$res=$this->db->query($query_websites);
		
		$res_query=$res->result();	
		return $res_query;
		
		 
		 
		$query = $this->db->get_where('pages_websites', array('page_id' => $page_id));		
		return $query->result();
	}	
	
 }
