<?php
class Design extends CI_Model {
	public function __construct()
 	{
  		$this->load->database();
	}
	public function get_collection()
	{
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!=''){
			$current_account_id=$this->session->userdata('current_account_id');
		}else{
			$current_account_id=$this->session->userdata('account_id');
		}
	
		$this->db->select('collections.*');    
		$this->db->from('collections');
		$this->db->where('collection_account.account_id',$current_account_id);
		$this->db->join('collection_account','collections.collection_id = collection_account.collection_id','INNER');
		$res=$this->db->get();
		$res_query=$res->result();
		return $res_query;
	}
	public function delete_design()
	{
		$delete_id=$this->uri->segment(3);	
		$this->db->where('design_id', $delete_id);
		$this->db->delete('design');
		$this->db->where('design_id', $delete_id);
		$this->db->delete('design_collection');

	}
	
	public function select_account_data(){
		
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!=''){
			$current_account_id=$this->session->userdata('current_account_id');
		}else{
			$current_account_id=$this->session->userdata('account_id');
		}
		
		$query_get_data = $this->db->get_where('profile', array('account_id' => $current_account_id));
		$rs_query= $query_get_data->result();
		return $rs_query;
		
	}
		
	public function select_owner_data(){
		
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!=''){
			$current_account_id=$this->session->userdata('current_account_id');
		}else{
			$current_account_id=$this->session->userdata('account_id');
		}
		
		$query_get_data = $this->db->get_where('options', array('account_id' => $current_account_id));
		$rs_query= $query_get_data->result();
		return $rs_query;
		
	}	
		
	public function select_design()
	{
		 $edit_id=$this->uri->segment(3); 
		$query = $this->db->get_where('design', array('design_id' => $edit_id));		
		return $query->result();
	}
	public function design_type()
	{
		$query = $this->db->get('design_type');		
		return $query->result();
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
		$this->db->where('design.account_id',$current_account_id);
		$query = $this->db->get();
		
		return $query->result();
		
		/*$query_account="select * from design where design.account_id='".$current_account_id."' 
						and design.design_id NOT IN ( SELECT distinct design.design_id FROM design where design.account_id='".$current_account_id."')";
		$res=$this->db->query($query_account);
		echo $this->db->last_query();
		$res_query=$res->result();
	
		return $res_query;*/
		
		
		

		

		/*$query_account="select * from design where design_id in ( SELECT distinct  design.design_id
		FROM design 
		INNER JOIN `design_collection` ON `design`.`design_id` = `design_collection`.`design_id`
		INNER JOIN `collection_account` ON `design_collection`.`collection_id` = `collection_account`.`collection_id`
		WHERE `collection_account`.`account_id` = '".$current_account_id."' and `design`.`account_id`='".$current_account_id."') order by design_id desc";
		$res=$this->db->query($query_account);
		
		$res_query=$res->result();
		return $res_query; */
		
	}
	public function search_design()
	{
		
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!=''){
			$current_account_id=$this->session->userdata('current_account_id');
		}else{
			$current_account_id=$this->session->userdata('account_id');
		}
		
	  	$search_field=$this->input->post('input_value');
	   	$search_filter=$this->input->post('selected_value');
		if($search_filter==0 || $search_filter==1 || $search_filter==2)
	   	{		
			$this->db->select('design.*');    
			$this->db->from('design');
			$this->db->where('design.account_id',$current_account_id);
		if($search_filter==2)
	   	{
			
		}else if($search_filter==1){
			$this->db->where('design.design_status', $search_filter);
		}
		else if($search_filter==0){
			$this->db->where('design.design_status', $search_filter);
		}
		//$this->db->join('agency_accounts_users', 'agency_accounts_users.user_id = users.user_id','INNER');
		
        if( $search_field!=''){
		$this->db->like('design.design_profile_title', $search_field);	
		}
		$res=$this->db->get();
		$res_query=$res->result();
	    return $res_query;			
		}		
	}
	
	public function design_all()
	{
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!=''){
			$current_account_id=$this->session->userdata('current_account_id');
		}else{
			$current_account_id=$this->session->userdata('account_id');
		}
		$this->db->select('*');    
		$this->db->from('design');
		$this->db->where('design.account_id',$current_account_id);
		$query = $this->db->get();
		return $query->result();
	}
	function do_upload($file_name)
    {
      	$config['upload_path'] = 'assets/img/design';
      	$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']    = '3000';
		/*$config['max_width']  = '1024';
		$config['max_height']  = '768';*/
        $config['remove_spaces']  = TRUE;
        $config['encrypt_name']  = TRUE;
		$config['file_name']  = $file_name;
				
        $this->load->library('upload', $config);
		$this->upload->initialize($config); 				
        if (!$this->upload->do_upload('design_image'))
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
	
	public function design_save()
	{	 
		$edit_idd=$this->input->post('hiddenid');
		
		$text_hiddenid=$this->input->post('texthidden');
		$data_id=$this->input->post('source_id');
		if(isset($text_hiddenid) && $text_hiddenid!=''){
			
		$edit_idd=$this->input->post('texthidden'); }
		
		$html_source=$this->input->post('lst_html_version');
		$css_source=$this->input->post('lst_css_version');
		$script_source=$this->input->post('lst_script_version');
		//////////for html/////////////////
		if(isset($html_source) && $html_source!='')
		{
			$html_id=explode("||",$html_source);
			$html_version_id=$html_id[0];
			
			$update_default=array(
			'set_default'=>0,
			);
			$this->db->where('design_id',$edit_idd);
			$this->db->where('content_type','html');
			$this->db->update('design_data', $update_default);
			
			$design_html_data = array(
				'content_type'=>'html',
				'design_manage_tag'=>$this->input->post('txt_tag'),
				'design_manage_note'=>$this->input->post('txt_note'),
				'set_default'=>1,
			);
			$this->db->where('design_data_id',$html_version_id);
			$this->db->where('design_id',$edit_idd);
			$this->db->where('content_type','html');
			
			$this->db->update('design_data', $design_html_data);
		}
		
		//////////for css/////////////////
		if(isset($css_source) && $css_source!='')
		{
			$css_id=explode("||",$css_source);
			$css_version_id=$css_id[0];
			
			$update_default=array(
			'set_default'=>0,
			);
			$this->db->where('design_id',$edit_idd);
			$this->db->where('content_type','css');
			$this->db->update('design_data', $update_default);
			
			$css_html_data = array(
				'content_type'=>'css',
				'design_manage_tag'=>$this->input->post('txt_tag'),
				'design_manage_note'=>$this->input->post('txt_note'),
				'set_default'=>1,
			);
			$this->db->where('design_data_id',$css_version_id);
			$this->db->where('design_id',$edit_idd);
			$this->db->where('content_type','css');
			
			$this->db->update('design_data', $css_html_data);
			
		}
		
		//////////for javascript/////////////////
		if(isset($script_source) && $script_source!='')
		{
			$script_id=explode("||",$script_source);
			$script_version_id=$script_id[0];
			
			$update_default=array(
			'set_default'=>0,
			);
			$this->db->where('design_id',$edit_idd);
			$this->db->where('content_type','script');
			$this->db->update('design_data', $update_default);
			
			$script_html_data = array(
				'content_type'=>'javascript',
				'design_manage_tag'=>$this->input->post('txt_tag'),
				'design_manage_note'=>$this->input->post('txt_note'),
				'set_default'=>1,
			);
			$this->db->where('design_data_id',$script_version_id);
			$this->db->where('design_id',$edit_idd);
			$this->db->where('content_type','javascript');
			
			$this->db->update('design_data', $script_html_data);
			
		}
		return $edit_idd;
	}	
	
	public function version_listing()
	{	
		$design_id=$this->uri->segment(3);
		$query = $this->db->get_where('design_data', array('design_id' => $design_id));	
		//echo $this->db->last_query();
		//$query = $this->db->get('design_data');		
		return $query->result();
	}
	public function design_manage_listing()
	{
		$design_id=$this->uri->segment(3);
		$query = $this->db->get_where('design_data', array('design_id' => $design_id));	
		
		return $query->result();
	}
	public function source_edit_save()
	{
		
		$design_idd=$this->input->post('texthidden');
		$edit_idd=$this->input->post('source_id');
		$action=$this->input->post('lst_action');
		//echo '<textarea>';print_r($_POST);echo '</textarea>';
		if($action=='same')
		{
			$edit_source_data = array(
            'contents'=>$this->input->post('text_source'),
    	   	);
			$this->db->where('design_data_id',$edit_idd);
			$this->db->where('content_type',$this->input->post('source_type'));
			$this->db->update('design_data',$edit_source_data);
		//echo $this->db->last_query();
		}
		if($action=='new')
		{
			
			$this->db->select('*');    
			$this->db->from('design_data');
			$this->db->where('design_data.design_id',$design_idd);
			$this->db->where('design_data.content_type',$this->input->post('source_type'));
			$query = $this->db->get();
			
			$count_version = $query->num_rows()+1;
			$version = 'version '.$count_version;
		
			$source_data = array(
            'content_type'=>$this->input->post('source_type'),
            'contents'=>$this->input->post('text_source'),
			'version'=>$version,
			'design_id'=>$design_idd,
    	   	);		
			$this->db->insert('design_data',$source_data);
			
		}
		return $design_idd;
	
	}
	public function design_add()
	{	 
		$edit_idd=$this->input->post('hiddenid');			
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!=''){
			$current_account_id=$this->session->userdata('current_account_id');
		}else{
			$current_account_id=$this->session->userdata('account_id');
		}
		if(isset($_FILES["design_image"]["name"]) &&$_FILES["design_image"]["name"]!='')
		{
			$design_image= $_FILES["design_image"]["name"];
		}
		$edit_idd=$this->input->post('hiddenid');
		if(isset($_FILES["design_image"]["name"]) &&$_FILES["design_image"]["name"]!='')
		{			
			
		$design_data = array(
            'design_status'=>$this->input->post('design_status'),
            'design_profile_image'=>$design_image,
            'design_profile_title'=>$this->input->post('txt_profile_title'),
            'design_profile_summary'=>$this->input->post('txt_profile_summary'),
            'design_type'=>$this->input->post('lst_page_type'),
            'design_tag'=>$this->input->post('txt_tag'),
            'design_note'=>$this->input->post('txt_note'),
            'account_id'=>$current_account_id,
       	);
		}else{
			$design_data = array(
			'design_status'=>$this->input->post('design_status'),
            'design_profile_title'=>$this->input->post('txt_profile_title'),
            'design_profile_summary'=>$this->input->post('txt_profile_summary'),
            'design_type'=>$this->input->post('lst_page_type'),
            'design_tag'=>$this->input->post('txt_tag'),
            'design_note'=>$this->input->post('txt_note'),
            'account_id'=>$current_account_id,
			);
		}
		if(isset($edit_idd) && $edit_idd!='' && $edit_idd!='new')
		{
			$this->db->where('design_id',$edit_idd);
			$this->db->update('design', $design_data);
			$collection_selected=$this->input->post('collection_select');
			/* if($collection_selected=='')
			 {
				$this->db->where('design_id', $edit_idd);
				$this->db->delete('design_collection');				 
			 }
				if($this->input->post('collection_select'))
				{
					$this->db->where('design_id', $edit_idd);
					$this->db->delete('design_collection');
					
					$account_arr[]=$this->input->post('collection_select');
					for($i=0; $i<count($account_arr[0]);$i=$i+1)
					{
						$collection_data = array(
						'collection_id'=>$account_arr[0][$i],
						'design_id'=>$edit_idd,		 
						);				
						$this->db->insert('design_collection',$collection_data);
					}
				}*/
		}
		else
		{
			if($this->input->post('txt_design_title'))
			{
				$this->db->insert('design',$design_data);
			 	$design_fid=$this->db->insert_id();
				/*if($this->input->post('collection_select'))
				{
				$account_arr[]=$this->input->post('collection_select');
					for($i=0; $i<count($account_arr[0]);$i++)
					{
						$collection_data = array(
						'collection_id'=>$account_arr[0][$i],
						'design_id'=>$design_fid,		 
						);		
						$this->db->insert('design_collection',$collection_data);
					}
				}*/
			}
			if(isset($design_fid) && $design_fid!='') {
			$design_manage_data = array(
				'content_type'=>'html',
				'contents'=>'contents',
				'version'=>'version 1',
				'design_manage_tag'=>'tag',
				'design_manage_note'=>'note',
				'design_id'=>$design_fid,
			);
			$this->db->insert('design_data',$design_manage_data);
			$design_manage_data = array(
				'content_type'=>'css',
				'contents'=>'contents',
				'version'=>'version 1',
				'design_manage_tag'=>'tag',
				'design_manage_note'=>'note',
				'design_id'=>$design_fid,
			);
			$this->db->insert('design_data',$design_manage_data);
			$design_manage_data = array(
				'content_type'=>'javascript',
				'contents'=>'contents',
				'version'=>'version 1',
				'design_manage_tag'=>'tag',
				'design_manage_note'=>'note',
				'design_id'=>$design_fid,
			);
			$this->db->insert('design_data',$design_manage_data);
			}
				$design_title = array(	
     	      	'design_title'=>$this->input->post('txt_design_title'),
				);			 
				if(isset($design_fid)&& $design_fid!='')
				{
					$this->db->where('design_id',$design_fid);
					$this->db->update('design', $design_title);
				}
		
		}
		//echo $edit_idd;
		//echo $design_fid; exit;
		 if($edit_idd !='new' && $edit_idd !='')
			  { 
			  }
			  else
			  {
				if(isset($design_fid) && $design_fid !='')	
			 	$edit_idd=$design_fid;
			  }
			$query = $this->db->get_where('design', array('design_id' => $edit_idd));
			return $query->result();

	}	

	public function select_design_collection()
	{
		$design_id=$this->uri->segment(3);
		$query = $this->db->get_where('design_collection', array('design_id' => $design_id));		
		return $query->result();
	}	
	public function selectone_design()
	{
		$edit_id=$this->uri->segment(3); 
		$query = $this->db->get_where('design', array('design_id' => $edit_id));		
		return $query->result();
	}	
	public function web_page_using_designs(){
		$design_id = $this->uri->segment(3);
		$rowcount=0;
		$this->db->select('pages_design.design_id');    
		$this->db->from('pages_design');
		$this->db->where('pages_design.design_id',$design_id);	
		$query=$this->db->get();
		$rowcount = $query->num_rows();
		return $rowcount;
	}
	
 }
