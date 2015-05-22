<?php
class Repeat_model extends CI_Model {
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
		 if(isset($current_account_id) && $current_account_id!=''){
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
		}
		else
		{
			return 'false';
		}
	}
	
	public function get_website()
	{
		$query=$this->db->get('websites');	
		return $query->result();
	}
	
	public function delete_repeat()
	{
		$delete_id=$this->uri->segment(3);	
		$this->db->where('repeat_id', $delete_id);
		$this->db->delete('repeats');
		
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!=''){
			$current_account_id=$this->session->userdata('current_account_id');
		}else{
			$current_account_id=$this->session->userdata('account_id');
		}
		
		$this->db->where('repeat_id', $delete_id);
		$this->db->where('account_id', $current_account_id);
		$this->db->delete('repeat_accounts');
		
		/*$this->db->where('repeat_id', $delete_id);
		$this->db->where('account_id', $current_account_id);
		$this->db->delete('repeat_websites');*/
		
	}	
	public function select_repeat()
	{
		$query=$this->db->get('repeats');	
		return $query->result();
	}
	
	public function profile_repeat()
	{
		
		$repeat_id=$this->uri->segment(3);
		$query = $this->db->get_where('repeats', array('repeat_id' => $repeat_id));
		return $query->result();
	}
	
	public function repeat_listing()
	{

		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!=''){
			$current_account_id=$this->session->userdata('current_account_id');
		}else{
			$current_account_id=$this->session->userdata('account_id');
		}    
		
		$query_account="select * from repeats where repeat_id in (SELECT distinct repeat_accounts.repeat_id
		FROM repeat_accounts
		WHERE `repeat_accounts`.`account_id` = '".$current_account_id."') order by repeat_id desc";
		$res=$this->db->query($query_account);
		$res_query=$res->result();
		return $res_query;
		
		/*
		if($this->uri->segment(2)=='selected_website'){
		$query_repeats="select DISTINCT * from repeats 
		INNER JOIN `repeat_websites` ON `repeats`.`repeat_id` = `repeat_websites`.`repeat_id`
		WHERE repeats.repeat_id in ( SELECT repeat_id from repeat_accounts where repeat_accounts.account_id='".$current_account_id."' and repeat_websites.website_id='".$this->uri->segment(3)."') group by repeats.repeat_id";	
		}else{
		
		$query_repeats="select DISTINCT * from repeats 
		INNER JOIN `repeat_websites` ON `repeats`.`repeat_id` = `repeat_websites`.`repeat_id`
		WHERE repeats.repeat_id in ( SELECT repeat_id from repeat_accounts where repeat_accounts.account_id='".$current_account_id."') group by repeats.repeat_id";
		}
		$res=$this->db->query($query_repeats);
		
		$res_query=$res->result();	
		return $res_query; */

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

	public function search_repeat()
	{
	 	 $search_field=$this->input->post('txt_search');
	 	 //$search_field=$this->input->post('input_value');
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
	    $this->db->select('repeats.*');    
		$this->db->from('repeats');
		
		if($search_filter==2)
	   	{
		}
		else
		{	
			$this->db->where('repeats.repeat_status', $search_filter);
		}
		$this->db->where('repeat_accounts.account_id', $current_account_id);
		$this->db->join('repeat_accounts', 'repeats.repeat_id = repeat_accounts.repeat_id','INNER');
        if( $search_field!=''){
			$this->db->like('repeats.repeat_title', $search_field);	
		}
		$this->db->distinct();
		$res=$this->db->get();
		//echo $this->db->last_query();
		$res_query=$res->result();
	    return $res_query;			
		}		
	}	
	public function repeat_all()
	{
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!=''){
			$current_account_id=$this->session->userdata('current_account_id');
		}else{
			$current_account_id=$this->session->userdata('account_id');
		}    
		$query_account="select * from repeats where repeat_id in (SELECT distinct repeat_accounts.repeat_id
		FROM repeat_accounts
		WHERE `repeat_accounts`.`account_id` = '".$current_account_id."') order by repeat_id desc";
		$res=$this->db->query($query_account);
		$res_query=$res->result();
		return $res_query;
	}
	function do_upload($file_name)
    {
      	$config['upload_path'] = 'assets/img/repeats_img';
      	$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']    = '3000';
		/*$config['max_width']  = '1024';
		$config['max_height']  = '768';*/
        $config['remove_spaces']  = TRUE;
        $config['encrypt_name']  = FALSE;
		$config['file_name']  = $file_name;
				
        $this->load->library('upload', $config);
		$this->upload->initialize($config); 				
        if (!$this->upload->do_upload('repeat_image'))
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
	public function add_repeat()
	{
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!=''){
			$current_account_id=$this->session->userdata('current_account_id');
		}else{
			$current_account_id=$this->session->userdata('account_id');
		}    

		if(isset($_FILES["repeat_image"]["name"]) &&$_FILES["repeat_image"]["name"]!='')
		{
			$repeat_image = $_FILES["repeat_image"]["name"];
		}
		
		$edit_idd=$this->input->post('hiddenid');
		
		$start_date = $this->input->post('start_date');
		$start_time = $this->input->post('end_date');
		$end_date = $this->input->post('start_time');
		$end_time = $this->input->post('end_time');
		$design_selected = $this->input->post('design_selected');
		if(isset($_FILES["repeat_image"]["name"]) &&$_FILES["repeat_image"]["name"]!='')
		{
		$repeat_data = array(
            'repeat_status'=>$this->input->post('repeat_status'),
            'repeat_profile_image'=>$repeat_image,
            'repeat_profile_title'=>$this->input->post('txt_profile_title'),
            'repeat_profile_summary'=>$this->input->post('txt_profile_summary'),
            'repeat_design'=>$this->input->post('txt_tag'),
			'repeat_audience'=>$this->input->post('audience_data'),
			'repeat_schedule_start'=>$start_date,
			'start_time'=>$start_time,
			'repeat_schedule_end'=>$end_date,
			'end_time'=>$end_time,
            'repeat_tag'=>$this->input->post('txt_tag'),
            'repeat_note'=>$this->input->post('txt_note'),
       	);
		}else{
			$repeat_data = array(
			'repeat_status'=>$this->input->post('repeat_status'),
            'repeat_profile_title'=>$this->input->post('txt_profile_title'),
            'repeat_profile_summary'=>$this->input->post('txt_profile_summary'),
            'repeat_design'=>$this->input->post('txt_tag'),
			'repeat_audience'=>$this->input->post('audience_data'),
			'repeat_schedule_start'=>$start_date,
			'start_time'=>$start_time,
			'repeat_schedule_end'=>$end_date,
			'end_time'=>$end_time,
            'repeat_tag'=>$this->input->post('txt_tag'),
            'repeat_note'=>$this->input->post('txt_note'),
			);	
		}
		if(isset($edit_idd) && $edit_idd!='' && $edit_idd!='new')
		{
			$this->db->select('repeats.repeat_profile_title');    
			$this->db->from('repeats');
			$this->db->where('repeats.repeat_profile_title',$this->input->post('txt_profile_title'));
			$this->db->where('repeats.repeat_id !=',$edit_idd);
			$res=$this->db->get();
			$res_query=$res->result();

			 	if(count($res_query)>0){
					$error="Title Already Exist";
					return $error;
				}else{
			$this->db->where('repeat_id',$edit_idd);
			$this->db->update('repeats', $repeat_data);
			
			
			
				///////////for updating contents getting data////////////////////////
			
			$query_get_content="select * from repeats where repeat_id='".$edit_idd."'";
			
			$res_content=$this->db->query($query_get_content);
		
			$res_query_content = $res_content->result();	
			
			$available_data = $res_query_content[0]->repeat_content;
			
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
						$content_repeat=$design_res->contents;
						if($content_repeat=='contents'){
							$content_repeat = '';
						}
						
						$source_design .= $content_repeat;
					}
					
					
				}
			
			////////////////////////////////////////////////////////////////////
			//$final_design_data=$source_design.$available_data;
			$final_design_data=$source_design;
			$content_data=array('repeat_content'=>$final_design_data);
			
			$this->db->where('repeat_id',$edit_idd);
			$this->db->update('repeats', $content_data);
			
			
			$design_data = array(
						'design_id'=>$design_selected,		 
						);
				$this->db->where('repeat_id',$edit_idd);
				$this->db->update('repeats_design', $design_data);
			
			    $select_value = $this->input->post('accounts_select');
				if($this->input->post('accounts_select')) {
					if($select_value==''){
					$this->db->where('repeat_id', $edit_idd);
					$this->db->delete('repeat_accounts');
					}
				}
				if($this->input->post('accounts_select'))
				{
						$this->db->where('repeat_id', $edit_idd);
						$this->db->delete('repeat_accounts');
					$account_arr[]=$this->input->post('accounts_select');
				
					for($i=0; $i<count($account_arr[0]);$i=$i+1)
					{
						$account_data = array(
						'account_id'=>$account_arr[0][$i],
						'repeat_id'=>$edit_idd,		 
						);				

						$this->db->insert('repeat_accounts',$account_data);
					}
				}
				
				$account_data = array(
						'account_id'=>$current_account_id,
						'repeat_id'=>$edit_idd,		 
						);				
						$this->db->insert('repeat_accounts',$account_data);
				
				$select_website = $this->input->post('website_select');
				if($select_website==''){
					$this->db->where('repeat_id', $edit_idd);
					$this->db->delete('repeat_websites');
				}
				
				if($this->input->post('website_select'))
				{
					$this->db->where('repeat_id', $edit_idd);
					$this->db->delete('repeat_websites');
					$website_arr[]=$this->input->post('website_select');
					for($i=0; $i<count($website_arr[0]);$i=$i+1)
					{
						$website_data = array(
						'website_id'=>$website_arr[0][$i],
						'repeat_id'=>$edit_idd,		 
						);				

						$this->db->insert('repeat_websites',$website_data);
					}
				}
				return $edit_idd;
				}
				
		}
		else
		{ 
				$query = $this->db->get_where('repeats', array('repeat_profile_title' => $this->input->post('txt_profile_title')));
				$res_query=$query->result();
			 	if(count($res_query)>0){
					$error="Title Already Exist";
					return $error;
				}else
				{
				
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
				
				
				
				
				$this->db->insert('repeats',$repeat_data);
			 	$repeat_fid=$this->db->insert_id();
				
				
				$update_page_content=array('repeat_content'=>$source_design);
				$this->db->where('repeat_id',$repeat_fid);
			    $this->db->update('repeats', $update_page_content);
				
				
				$design_data = array(
						'design_id'=>$design_selected,
						'repeat_id'=>$repeat_fid,
								 
						);		
				$this->db->insert('repeats_design',$design_data);
				
				if($this->input->post('accounts_select'))
				{
				$account_arr[]=$this->input->post('accounts_select');
				
					for($i=0; $i<count($account_arr[0]);$i++)
					{
						$account_data = array(
						'account_id'=>$account_arr[0][$i],
						'repeat_id'=>$repeat_fid,		 
						);		
						$this->db->insert('repeat_accounts',$account_data);
					}
				}
				else
				 { 
					if(isset($current_account_id) && $current_account_id!=''){
						$query = $this->db->get_where('agency_accounts', array('account_id' =>$current_account_id));
						$query_data=$query->result();
						$share_data= $accep_content=$query_data[0]->account_content_share;
					}
				if(isset($share_data) && $share_data==0)
					{
						$account_data = array(
						'account_id'=>$current_account_id,
						'repeat_id'=>$repeat_fid,		 
						);		
						$this->db->insert('repeat_accounts',$account_data);			
					}			
				}
				
				$account_data = array(
						'account_id'=>$current_account_id,
						'repeat_id'=>$repeat_fid,		 
						);				
						$this->db->insert('repeat_accounts',$account_data);
				
				if($this->input->post('website_select'))
				{
				$website_arr[]=$this->input->post('website_select');
					for($i=0; $i<count($website_arr[0]);$i++)
					{
						$website_data = array(
						'website_id'=>$website_arr[0][$i],
						'repeat_id'=>$repeat_fid,		 
						);		
						if($this->db->insert('repeat_websites',$website_data)){
						//$error="Websites Successfully Created in Selected Account(s)";
					     //return $error;	
						}
					}
				}

			}
			
				$repeat_title = array(	
     	      	'repeat_title'=>$this->input->post('txt_repeat_title'),
				);			 
				if(isset($repeat_fid)&& $repeat_fid!='')
				{
					$this->db->where('repeat_id',$repeat_fid);
					$this->db->update('repeats', $repeat_title);
				}
		
		if($edit_idd!='' && $edit_idd!='new'){
		   $id_repeat=$edit_idd;
		}else{
		   $id_repeat=$repeat_fid;
		}
		$query = $this->db->get_where('repeats', array('repeat_id' => $id_repeat));
		
	    return $query->result();
		
		}
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
	
	$repeat_id=$this->uri->segment(3);
		$query_design="select * from design 
		INNER JOIN `repeats_design` ON `design`.`design_id` = `repeats_design`.`design_id`
		WHERE repeats_design.repeat_id='".$repeat_id."'";
		
		
		$res=$this->db->query($query_design);
		
		$res_query=$res->result();	
		return $res_query;
	
		
	}

	public function select_repeat_account()
	{
		$repeat_id=$this->input->post('hiddenid');
		if($repeat_id==''){
			$repeat_id=$this->uri->segment(3);	
	     }
		$query = $this->db->get_where('repeat_accounts', array('repeat_id' => $repeat_id));
		
		return $query->result();
	}	
	public function select_repeat_website()
	{
		$repeat_id=$this->input->post('hiddenid');
		if($repeat_id==''){
			$repeat_id=$this->uri->segment(3);	
	     }
		$query = $this->db->get_where('repeat_websites', array('repeat_id' => $repeat_id));		
		return $query->result();
	}	

	public function selectone_repeat()
	{
		$edit_id=$this->uri->segment(3);
		
		
		if($this->input->post('hiddenid')!=''){
			$edit_id=$this->input->post('hiddenid');
		}
		
		
		$query = $this->db->get_where('repeats', array('repeat_id' => $edit_id));		
		return $query->result();
	}	
	public function selectone_account()
	{
		$edit_id=$this->uri->segment(3);
		$query = $this->db->get_where('repeats', array('repeat_id' => $edit_id));
		return $query->result();
	}
	
	public function update_content()
	{
		$edit_id = $this->input->post('repeat_id');
		$post_data = $this->input->post('editor1');
		$data_post = addslashes($post_data);
		$update_data = array(
			'repeat_content'=>$data_post,
			);	
		
		$this->db->where('repeat_id',$edit_id);
		$this->db->update('repeats', $update_data);
		return $data_post;
	}
	
	public function get_content()
	{
		$edit_id=$this->uri->segment(3);
		if($edit_id!=''){
		$this->session->set_userdata(array('repeat_id'=> $edit_id));
		}
		if($edit_id==''){
			$edit_id=$this->input->post('repeat_id');
		}
		
		if($edit_id==''){
			$edit_id=$this->session->userdata('repeat_id');
		}
		$query = $this->db->get_where('repeats', array('repeat_id' => $edit_id));
		//echo $this->db->last_query();
		$rs= $query->result();
		//print_r($rs);exit;
		return $rs[0]->repeat_content;
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
		
		 
		 
		$query = $this->db->get_where('repeat_websites', array('repeat_id' => $repeat_id));		
		return $query->result();
	}	
	
 }
