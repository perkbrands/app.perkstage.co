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
		if($query->num_rows()>0){
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
		}
		$current_user_id=$this->session->userdata('user_id');
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
		
		/*$this->db->where('page_id', $delete_id);
		$this->db->where('account_id', $current_account_id);
		$this->db->delete('pages_websites');*/
		
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
		WHERE pages.page_id in ( SELECT page_id from pages_accounts where pages_websites.website_id='".$this->uri->segment(3)."' AND pages_accounts.account_id='".$current_account_id."') group by pages.page_id";	
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
			 
		//////////////////////////////	 
		$and ='';	 	 
			 
		////////////////////////////////	 
	    //$this->db->select('pages.*');    
		//$this->db->from('pages');
		
		if($search_filter==2)
	   	{
		}else{
		$and .='AND pages.page_status="'.$search_filter.'"';		
		//$this->db->where('pages.page_status', $search_filter);
		}
		//$this->db->where('pages_accounts.account_id', $current_account_id);
		//$this->db->join('pages_accounts', 'pages.page_id = pages_accounts.page_id','INNER');
        if($search_field!=''){
		$and .='AND pages.page_profile_title like "%'.$search_field.'%"';
		//$this->db->like('pages.page_profile_title', $search_field);	
		}
		//$this->db->distinct();
		$query_pages="select * from pages 
		INNER JOIN `pages_websites` ON `pages`.`page_id` = `pages_websites`.`page_id`
		WHERE pages.page_id in ( SELECT page_id from pages_accounts where pages_accounts.account_id='".$current_account_id."') $and group by pages.page_id";
		$res=$this->db->query($query_pages);

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
	
	    $query_pages="select DISTINCT * from pages 
		INNER JOIN `pages_websites` ON `pages`.`page_id` = `pages_websites`.`page_id`
		WHERE pages.page_id in ( SELECT page_id from pages_accounts where pages_accounts.account_id='".$current_account_id."') group by pages.page_id";	
		
		//$this->db->distinct();
		$res=$this->db->query($query_pages);
		
		$res_query=$res->result();	
		return $res_query;
	}
	function do_upload($file_name)
    {
      	$config['upload_path'] = 'assets/img/pages_img';
      	$config['allowed_types'] = 'gif|GIF|jpg|JPG|png|PNG';
		$config['max_size']    = '3000';
		/*$config['max_width']  = '1024';
		$config['max_height']  = '768';*/
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
		
		$ac_id=$this->session->userdata('current_account_id');
	
		if($ac_id!=''){
			$current_account_id=$this->session->userdata('current_account_id');
		}else{
			$current_account_id=$this->session->userdata('account_id');
		}
		if(isset($_FILES["page_image"]["name"]) &&$_FILES["page_image"]["name"]!='')
		{
			$page_image= $_FILES["page_image"]["name"];
		}
		
		$edit_idd=$this->input->post('hiddenid');
		$design_selected = $this->input->post('design_selected');
		if(isset($_FILES["page_image"]["name"]) &&$_FILES["page_image"]["name"]!='')
		{
		$page_data = array(
            'page_status'=>$this->input->post('page_status'),
            'page_profile_image'=>$page_image,
            'page_profile_title'=>$this->input->post('txt_profile_title'),
            'page_profile_summary'=>$this->input->post('txt_profile_summary'),
            'page_tag'=>$this->input->post('txt_tag'),
			'page_type'=>$this->input->post('page_type'),
            'page_note'=>$this->input->post('txt_note'),
       	);
		}else{
			$page_data = array(
			'page_status'=>$this->input->post('page_status'),
            'page_profile_title'=>$this->input->post('txt_profile_title'),
            'page_profile_summary'=>$this->input->post('txt_profile_summary'),
            'page_tag'=>$this->input->post('txt_tag'),
			'page_type'=>$this->input->post('page_type'),
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
			
			///////////for updating contents getting data////////////////////////
			
			$query_get_content="select * from pages where page_id='".$edit_idd."'";
			
			$res_content=$this->db->query($query_get_content);
		
			$res_query_content = $res_content->result();	
			
			$available_data = $res_query_content[0]->page_content;
			
			/////////////////////////////////////////////////////////////////////
			
			//////////////////selected design record////////////////////////////
			
			$source_design='<link rel="stylesheet" type="text/css" href="http://dev.tanaej.com/perk/assets/ckeditor_layout_css/css/reset.css" />
							<link rel="stylesheet" type="text/css" href="http://dev.tanaej.com/perk/assets/ckeditor_layout_css/css/responsive.gs.16col.css" />
							<link rel="stylesheet" type="text/css" href="http://dev.tanaej.com/perk/assets/ckeditor_layout_css/css/style.css" />
							<script type="text/javascript" src="http://dev.tanaej.com/perk/assets/ckeditor_layout_css/scripts/respond.min.js"></script>';
				if($design_selected != ''){
					$select_design_data="select * from design_data where design_id='".$design_selected."'";
					$res=$this->db->query($select_design_data);
					$res_query=$res->result();
					
					foreach($res_query as $design_res){
						$content_page=$design_res->contents;
						if($content_page=='contents'){
							$content_page = '';
						}
						
						$source_design .= $content_page;
					}
					
					
				}
			
			////////////////////////////////////////////////////////////////////
			$final_design_data=$source_design.$available_data;
			
			$content_data=array('page_content'=>$final_design_data);
			
			$this->db->where('page_id',$edit_idd);
			$this->db->update('pages', $content_data);
			
			$select_value = $this->input->post('accounts_select');
				
			$design_data = array(
						'design_id'=>$design_selected,		 
						);
				$this->db->where('page_id',$edit_idd);
				$this->db->update('pages_design', $design_data);				
				
				
				
				if($this->input->post('accounts_select')){
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
				
				$account_data = array(
						'account_id'=>$current_account_id,
						'page_id'=>$edit_idd,		 
						);				
						$this->db->insert('pages_accounts',$account_data);
				
				$select_website = $this->input->post('website_select');
				if($select_website==''){
					$this->db->where('page_id', $edit_idd);
					$this->db->delete('pages_websites');
				}
				$web=$this->input->post('website_select');
				
				
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
				if(empty($web)){
					    $website_data = array(
						'website_id'=>$this->input->post('website_selected'),
						'page_id'=>$edit_idd,		 
						);				

						$this->db->insert('pages_websites',$website_data);
				}
				return $edit_idd;
				}
				
		}
		else
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
				
				$source_design='<link rel="stylesheet" type="text/css" href="http://dev.tanaej.com/perk/assets/ckeditor_layout_css/css/reset.css" />
								<link rel="stylesheet" type="text/css" href="http://dev.tanaej.com/perk/assets/ckeditor_layout_css/css/responsive.gs.16col.css" />
								<link rel="stylesheet" type="text/css" href="http://dev.tanaej.com/perk/assets/ckeditor_layout_css/css/style.css" />
								<script type="text/javascript" src="http://dev.tanaej.com/perk/assets/ckeditor_layout_css/scripts/respond.min.js"></script>';
				if($design_selected != ''){
					$select_design_data="select * from design_data where design_id='".$design_selected."'";
					$res=$this->db->query($select_design_data);
					$res_query=$res->result();
					
					foreach($res_query as $design_res){
						$content_page=$design_res->contents;
						if($content_page=='contents'){
							$content_page = '';
						}
						$source_design .= $content_page;
					}
					
					
				}
				
				$this->db->insert('pages',$page_data);
			 	$page_fid=$this->db->insert_id();
				
				$page_name = array(	
     	      	'page_name'=>$this->input->post('txt_page_name'),
				);			 
				if(isset($page_fid)&& $page_fid!='')
				{
					$this->db->where('page_id',$page_fid);
					$this->db->update('pages', $page_name);
				}
				
				$update_page_content=array('page_content'=>$source_design);
				$this->db->where('page_id',$page_fid);
			    $this->db->update('pages', $update_page_content);
				
				$design_data = array(
						'design_id'=>$design_selected,
						'page_id'=>$page_fid,
								 
						);		
				$this->db->insert('pages_design',$design_data);
				
				
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
				$account_data = array(
						'account_id'=>$current_account_id,
						'page_id'=>$page_fid,		 
						);				
						$this->db->insert('pages_accounts',$account_data);
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
						//$error="Websites Successfully Created in Selected Account(s)";
					     //return $error;	
						}
					}
				}
				
				$web = $this->input->post('website_select');
				if(empty($web)){
					    $website_data = array(
						'website_id'=>$this->input->post('website_selected'),
						'page_id'=>$page_fid,		 
						);				

						$this->db->insert('pages_websites',$website_data);
				}

			}
		
		}
		$id_page='';
		if($edit_idd!='' && $edit_idd!='new'){
		   $id_page=$edit_idd;
		}else{
		   $id_page=$page_fid;
		}
		$query = $this->db->get_where('pages', array('page_id' => $id_page));
		
	    return $query->result();
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
	
	public function single_repeate_record(){
		$repeat_id=$this->input->post('id_repeat');
		$query = $this->db->get_where('repeats', array('repeat_id' => $repeat_id));
		//echo $this->db->last_query();
		$rs= $query->result();
	
		return stripslashes($rs[0]->repeat_content).'||'.$repeat_id;
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
		if($edit_id!=''){
		$this->session->set_userdata(array('page_id'=> $edit_id));
		}
		if($edit_id==''){
			$edit_id=$this->input->post('page_id');
		}
		
		if($edit_id==''){
			$edit_id=$this->session->userdata('page_id');
		}
		
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
		
		 
		 
		
	}	
	
	public function design_listing()
	{
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!=''){
			$current_account_id=$this->session->userdata('current_account_id');
		}else{
			$current_account_id=$this->session->userdata('account_id');
		}
		$this->db->select('*');    
		$this->db->from('design');
		$this->db->order_by('design.design_id','desc');
		$this->db->where('design.account_id',$current_account_id);
		$query = $this->db->get();
		return $query->result();
		
	}
	
	public function design_listing_setting(){
	
	$page_id=$this->uri->segment(3);
		$query_design="select * from design 
		INNER JOIN `pages_design` ON `design`.`design_id` = `pages_design`.`design_id`
		WHERE pages_design.page_id='".$page_id."'";
		
		
		$res=$this->db->query($query_design);
		//echo $this->db->last_query();
		$res_query=$res->result();	
		return $res_query;
	
		
	}
	
	
 }
