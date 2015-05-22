<?php
class Layout_model extends CI_Model {
	public function __construct()
 	{
  		$this->load->database();
	}
	public function get_design()
	{
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!=''){
			$current_account_id=$this->session->userdata('current_account_id');
		}else{
			$current_account_id=$this->session->userdata('account_id');
		}
	
		$this->db->select('design.*');    
		$this->db->from('design');
		$this->db->where('design.account_id',$current_account_id);
		//$this->db->join('layout_design','design.collection_id = layout_design.collection_id','INNER');
		$res=$this->db->get();
		$res_query=$res->result();
		return $res_query;
		
		/*$query=$this->db->get('design');	
		return $query->result();*/
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
	
	public function delete_layout()
	{
		$delete_id=$this->uri->segment(3);	
		$this->db->where('layout_id', $delete_id);
		$this->db->delete('layout');
		$this->db->where('layout_id', $delete_id);
		$this->db->delete('layout_design');
	}	
	public function select_layout()
	{
		 $edit_id=$this->uri->segment(3); 
		$query = $this->db->get_where('layout', array('layout_id' => $edit_id));		
		return $query->result();
	}
	
	public function layout_listing()
	{
		
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!=''){
			$current_account_id=$this->session->userdata('current_account_id');
		}else{
			$current_account_id=$this->session->userdata('account_id');
		}
		
		$query_account="select * from layout where account_id = '".$current_account_id."'";
		$res=$this->db->query($query_account);
		$res_query=$res->result();
		//$query=$this->db->get('users',12);	
		return $res_query;
		
	}
	public function search_layout()
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
	    $this->db->select('layout.*');    
		$this->db->from('layout');
		$this->db->where('layout.account_id',$current_account_id);
		if($search_filter==2)
	   	{
			
		}
		else if($search_filter==1)
	   	{
			$this->db->where('layout.layout_status', $search_filter);
		}
		else if($search_filter==0)
	   	{
	
			$this->db->where('layout.layout_status', $search_filter);
		}		
		
        if($search_field!=''){
			$this->db->like('layout_title', $search_field);	
		}
		$res=$this->db->get();
		$res_query=$res->result();
	    return $res_query;			
		}		
	}
	public function version_listing()
	{
		$layout_id=$this->uri->segment(3);
		$query = $this->db->get_where('layout_data', array('layout_id' => $layout_id));
		return $query->result();
	}
	
	public function layout_all()
	{
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!=''){
			$current_account_id=$this->session->userdata('current_account_id');
		}else{
			$current_account_id=$this->session->userdata('account_id');
		}
		
		

	    $this->db->select('layout.*');    
		$this->db->where('layout.account_id',$current_account_id);
		$query=$this->db->get('layout');
			
		return $query->result();
		
	}
	public function layout_manage_listing()
	{
		$layout_id=$this->uri->segment(3);
		//$query = $this->db->get_where('layout_data', array('layout_id' => $layout_id));		
		//return $query->result();
	}
	public function source_edit_save()
	{
		$this->input->post('text_source'); 
		$layout_id=$this->input->post('texthidden');
		$edit_idd=$this->input->post('hiddenid'); 
		$edit_idd=$this->input->post('source_id');
		$action=$this->input->post('lst_action');
		if($action=='same')
		{
			$edit_source_data = array(
            'contents'=>$this->input->post('text_source'),
    	   	);
			$this->db->where('layout_data_id',$edit_idd);
			$this->db->update('layout_data',$edit_source_data);
		}
		if($action=='new')
		{
			
			$this->db->select('*');    
			$this->db->from('layout_data');
			$this->db->where('layout_data.layout_id',$layout_id);
			$this->db->where('layout_data.content_type',$this->input->post('source_type'));
			$query = $this->db->get();
			$count_version = $query->num_rows()+1;
			$version = 'version '.$count_version;
			
			$source_data = array(
            'content_type'=>$this->input->post('source_type'),
            'contents'=>$this->input->post('text_source'),
			'version'=>$version,
			'layout_id'=>$layout_id,
    	   	);			
			$this->db->insert('layout_data',$source_data);
		}
		return $layout_id;
	}
	public function layout_save()
	{	//print_r($_POST);exit;
		$edit_idd=$this->input->post('hiddenid');
		$text_hiddenid=$this->input->post('texthidden');
		if(isset($text_hiddenid) && $text_hiddenid!=''){
			
		$edit_idd=$this->input->post('texthidden'); }
		
		$html_source=$this->input->post('lst_html_version');
		$css_source=$this->input->post('lst_css_version');
		$script_source=$this->input->post('lst_script_version');
		//////////for html/////////////////
		if(isset($html_source) && $html_source!='')
		{
			$html_id=explode("_",$html_source);
			$html_version_id=$html_id[0];
			
			$update_default=array(
			'set_default'=>0,
			);
			$this->db->where('layout_id',$edit_idd);
			$this->db->where('content_type','html');
			$this->db->update('layout_data', $update_default);
			
			$design_html_data = array(
				'content_type'=>'html',
				'layout_manage_tag'=>$this->input->post('txt_tag'),
				'layout_manage_note'=>$this->input->post('txt_note'),
				'set_default'=>1,
			);
			$this->db->where('layout_data_id',$html_version_id);
			$this->db->where('layout_id',$edit_idd);
			$this->db->where('content_type','html');
			
			$this->db->update('layout_data', $design_html_data);
			
		}
		
		//////////for css/////////////////
		if(isset($css_source) && $css_source!='')
		{
			$css_id=explode("_",$css_source);
			$css_version_id=$css_id[0];
			
			$update_default=array(
			'set_default'=>0,
			);
			$this->db->where('layout_id',$edit_idd);
			$this->db->where('content_type','css');
			$this->db->update('layout_data', $update_default);
			
			$css_html_data = array(
				'content_type'=>'css',
				'layout_manage_tag'=>$this->input->post('txt_tag'),
				'layout_manage_note'=>$this->input->post('txt_note'),
				'set_default'=>1,
			);
			$this->db->where('layout_data_id',$css_version_id);
			$this->db->where('layout_id',$edit_idd);
			$this->db->where('content_type','css');
			
			$this->db->update('layout_data', $css_html_data);
			
		}
		
		//////////for javascript/////////////////
		if(isset($script_source) && $script_source!='')
		{
			$script_id=explode("_",$script_source);
			$script_version_id=$script_id[0];
			
			$update_default=array(
			'set_default'=>0,
			);
			$this->db->where('layout_id',$edit_idd);
			$this->db->where('content_type','script');
			$this->db->update('layout_data', $update_default);
			
			$script_html_data = array(
				'content_type'=>'javascript',
				'layout_manage_tag'=>$this->input->post('txt_tag'),
				'layout_manage_note'=>$this->input->post('txt_note'),
				'set_default'=>1,
			);
			$this->db->where('layout_data_id',$script_version_id);
			$this->db->where('layout_id',$edit_idd);
			$this->db->where('content_type','javascript');
			
			$this->db->update('layout_data', $script_html_data);
			
		}

		return $edit_idd;
	}	
	

	
	public function layout_add()
	{	 

		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!=''){
			$current_account_id=$this->session->userdata('current_account_id');
		}else{
			$current_account_id=$this->session->userdata('account_id');
		}
		if(isset($_FILES["layout_image"]["name"]) &&$_FILES["layout_image"]["name"]!='')
		{
			$layout_image= $_FILES["layout_image"]["name"];
		}
		$edit_idd=$this->input->post('hiddenid');
		if(isset($_FILES["layout_image"]["name"]) &&$_FILES["layout_image"]["name"]!='')
		{
		$layout_data = array(
            'layout_status'=>$this->input->post('layout_status'),
            'layout_profile_image'=>$layout_image,
            'layout_profile_title'=>$this->input->post('txt_profile_title'),
            'layout_profile_summary'=>$this->input->post('txt_profile_summary'),
            'layout_tag'=>$this->input->post('txt_tag'),
			'account_id'=>$current_account_id,
            'layout_note'=>$this->input->post('txt_note'),
       	);
		}else{
			$layout_data = array(
			'layout_status'=>$this->input->post('layout_status'),
            'layout_profile_title'=>$this->input->post('txt_profile_title'),
            'layout_profile_summary'=>$this->input->post('txt_profile_summary'),
            'layout_tag'=>$this->input->post('txt_tag'),
			'account_id'=>$current_account_id,
            'layout_note'=>$this->input->post('txt_note'),
			);	
		}
		if(isset($edit_idd) && $edit_idd!='' && $edit_idd!='new')
		{
			
			$this->db->select('layout.layout_id');    
			$this->db->from('layout');
			$this->db->where('layout.layout_title',$this->input->post('hidden_layout_title'));
			$this->db->where('layout.account_id',$current_account_id);
			$this->db->where('layout.layout_id !=',$edit_idd);
			
			$res=$this->db->get();
			
			$res_query=$res->result();
			
			if(count($res_query)>0){
					$error="Layout Title Already Exist";
					return $error;
				}else{
			
			$this->db->where('layout_id',$edit_idd);
			$this->db->update('layout', $layout_data);
			 
			 $accounts = $this->input->post('design_select');
			 if($accounts==''){
				$this->db->where('layout_id', $edit_idd);
				$this->db->delete('layout_design'); 
			 }
			 
				if($this->input->post('design_select'))
				{
					$this->db->where('layout_id', $edit_idd);
					$this->db->delete('layout_design');
					
					$account_arr[]=$this->input->post('design_select');
					
					for($i=0; $i<count($account_arr[0]);$i=$i+1)
					{
						$design_data = array(
						'design_id'=>$account_arr[0][$i],
						'layout_id'=>$edit_idd,		 
						);				
						$this->db->insert('layout_design',$design_data);
					}
				}
				}
		}
		else
		{
			if($this->input->post('txt_layout_title'))
			{
				
			$this->db->select('layout.layout_id');    
			$this->db->from('layout');
			$this->db->where('layout.layout_title',$this->input->post('txt_profile_title'));
			$this->db->where('layout.account_id',$current_account_id);
			
			$res=$this->db->get();
			$res_query=$res->result();
			
			if(count($res_query)>0){
					$error="Layout Title Already Exist";
					return $error;
				}
				else
				{
					$this->db->insert('layout',$layout_data);
			 		$layout_fid=$this->db->insert_id();
					if($this->input->post('design_select'))
					{
						$account_arr[]=$this->input->post('design_select');
						for($i=0; $i<count($account_arr[0]);$i++)
						{
						$design_data = array(
						'design_id'=>$account_arr[0][$i],
						'layout_id'=>$layout_fid,		 
						);		
						$this->db->insert('layout_design',$design_data);
						}
					}
				}
			}			
		
			if(isset($layout_fid) && $layout_fid!='') {
			$layout_html_data = array(
				'content_type'=>'html',
				'contents'=>'contents',
				'version'=>'version 1',
				'layout_manage_tag'=>'tag',
				'layout_manage_note'=>'note',
				'layout_id'=>$layout_fid,
			);
			$this->db->insert('layout_data',$layout_html_data);
			$layout_css_data = array(
				'content_type'=>'css',
				'contents'=>'contents',
				'version'=>'version 1',
				'layout_manage_tag'=>'tag',
				'layout_manage_note'=>'note',
				'layout_id'=>$layout_fid,
			);
			$this->db->insert('layout_data',$layout_css_data);
			$layout_script_data = array(
				'content_type'=>'javascript',
				'contents'=>'contents',
				'version'=>'version 1',
				'layout_manage_tag'=>'tag',
				'layout_manage_note'=>'note',
				'layout_id'=>$layout_fid,
			);
			$this->db->insert('layout_data',$layout_script_data);
			}

				$layout_title = array(	
     	      	'layout_title'=>$this->input->post('txt_layout_title'),
				);			 
				if(isset($layout_fid)&& $layout_fid!='')
				{
					$this->db->where('layout_id',$layout_fid);
					$this->db->update('layout', $layout_title);
				}
		
		}
		 if(isset($edit_idd) && $edit_idd !='' )
			{ 
			}
			else
			{
			if(isset($layout_fid) && $layout_fid !='')	
			  $edit_idd=$layout_fid;
			}
		$query = $this->db->get_where('layout', array('layout_id' => $edit_idd));
		return $query->result();
	}	
	function do_upload($file_name)
    {
      	$config['upload_path'] = 'assets/img/layout';
      	$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size']    = '3000';
		/*$config['max_width']  = '1024';
		$config['max_height']  = '768';*/
        $config['remove_spaces']  = TRUE;
        $config['encrypt_name']  = TRUE;
		$config['file_name']  = $file_name;
				
        $this->load->library('upload', $config);
		$this->upload->initialize($config); 				
        if (!$this->upload->do_upload('layout_image'))
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
	

	public function select_design_layout()
	{
		$layout_id=$this->uri->segment(3);
		$query = $this->db->get_where('layout_design', array('layout_id' => $layout_id));		
		return $query->result();
	}	
	public function selectone_layout()
	{
		$edit_id=$this->uri->segment(3); 
		$query = $this->db->get_where('layout', array('layout_id' => $edit_id));		
		return $query->result();
	}	
 }
