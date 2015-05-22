<?php
class Layout_model extends CI_Model {
	public function __construct()
 	{
  		$this->load->database();
	}
	public function get_design()
	{
		$query=$this->db->get('design');	
		return $query->result();
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
		if($search_filter==0 || $search_filter==1 || $search_filter==2)
	   	{   
			 /////////////////
	    $this->db->select('layout.*');    
		$this->db->from('layout');
		
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
			$this->db->like('layout_profile_title', $search_field);	
		}
		$res=$this->db->get();
		$res_query=$res->result();
	    return $res_query;			
		}		
	}
	public function version_listing()
	{
		$query = $this->db->get('layout_version');		
		return $query->result();
	}
	
	public function layout_all()
	{
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
		$edit_idd=$this->input->post('hiddenid'); 
		$edit_idd=$this->input->post('source_id');
		$action=$this->input->post('lst_action');
		if($action=='same')
		{
			$edit_source_data = array(
            'layout_source'=>$this->input->post('text_source'),
    	   	);
			$this->db->where('layout_version_id',$edit_idd);
			$this->db->update('layout_version',$edit_source_data);
		}
		if($action=='new')
		{
			$source_data = array(
            'layout_source_type'=>$this->input->post('source_type'),
            'layout_source'=>$this->input->post('text_source'),
    	   	);			
			$this->db->insert('layout_version',$source_data);
		}
	}
	public function layout_save()
	{	 
		$edit_idd=$this->input->post('hiddenid');
		$text_hiddenid=$this->input->post('texthidden');
		if(isset($text_hiddenid) && $text_hiddenid!=''){
			
		$edit_idd=$this->input->post('texthidden'); }
		
		$html_source=$this->input->post('lst_html_version');
		$css_source=$this->input->post('lst_css_version');
		$script_source=$this->input->post('lst_script_version');
		if(isset($html_source) && $html_source!='')
		{
			$html_id=explode("_",$html_source);
			$html_version_id=$html_id[0];
			$data_curr = $this->db->get_where('layout_version', array('layout_version_id' => $html_version_id));	
			$database_array=$data_curr->result();
			$html_source=$database_array[0]->layout_source; 
			$html_version='version '.$html_version_id;
			$design_html_data = array(
				'content_type'=>'html',
				'contents'=>$html_source,
				'version'=>$html_version,
				'layout_manage_tag'=>$this->input->post('txt_tag'),
				'layout_manage_note'=>$this->input->post('txt_note'),
			);
			$this->db->where('layout_id',$edit_idd);
			$this->db->where('content_type','html');
			$this->db->update('layout_data', $design_html_data);
		}

	if(isset($css_source) && $css_source!='')
		{		
			$css_id=explode("_",$css_source);
			$css_version_id=$css_id[0];
			$data_curr = $this->db->get_where('layout_version', array('layout_version_id' => $css_version_id));	
			$database_array=$data_curr->result();
			$css_source=$database_array[0]->layout_source;
			$css_version='version '.$css_version_id;
					
			$layout_css_data = array(
				'content_type'=>'css',
				'contents'=>$css_source,
				'version'=>$css_version,
				'layout_manage_tag'=>$this->input->post('txt_tag'),
				'layout_manage_note'=>$this->input->post('txt_note'),
			);

			$this->db->where('layout_id',$edit_idd);
			$this->db->where('content_type','css');
			$this->db->update('layout_data', $layout_css_data);
		}
	if(isset($script_source) && $script_source!='')
		{		
			$script_id=explode("_",$script_source);
			$script_version_id=$script_id[0];
			$data_curr = $this->db->get_where('layout_version', array('layout_version_id' => $script_version_id));	
			$database_array=$data_curr->result();
			$script_source=$database_array[0]->layout_source;
			$script_version='version '.$script_version_id;
	
			$layout_script_data = array(
				'content_type'=>'javascript',
				'contents'=>$script_source,
				'version'=>$script_version,
				'layout_manage_tag'=>$this->input->post('txt_tag'),
				'layout_manage_note'=>$this->input->post('txt_note'),
			);
			$this->db->where('layout_id',$edit_idd);
			$this->db->where('content_type','javascript');
			$this->db->update('layout_data', $layout_script_data);
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
			$this->db->where('layout.layout_profile_title',$this->input->post('txt_profile_title'));
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
			if($this->input->post('txt_profile_title'))
			{
				
			$this->db->select('layout.layout_id');    
			$this->db->from('layout');
			$this->db->where('layout.layout_profile_title',$this->input->post('txt_profile_title'));
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
				'version'=>'version 3',
				'layout_manage_tag'=>'tag',
				'layout_manage_note'=>'note',
				'layout_id'=>$layout_fid,
			);
			$this->db->insert('layout_data',$layout_html_data);
			$layout_css_data = array(
				'content_type'=>'css',
				'contents'=>'contents',
				'version'=>'version 2',
				'layout_manage_tag'=>'tag',
				'layout_manage_note'=>'note',
				'layout_id'=>$layout_fid,
			);
			$this->db->insert('layout_data',$layout_css_data);
			$layout_script_data = array(
				'content_type'=>'javascript',
				'contents'=>'contents',
				'version'=>'version1',
				'layout_manage_tag'=>'tag',
				'layout_manage_note'=>'note',
				'layout_id'=>$layout_fid,
			);
			$this->db->insert('layout_data',$layout_script_data);
			}
		
		}
		$query = $this->db->get_where('layout', array('layout_id' => $edit_idd));
		return $query->result();
	}	
	function do_upload($file_name)
    {
      	$config['upload_path'] = 'assets/img/layout';
      	$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']    = '1000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
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
