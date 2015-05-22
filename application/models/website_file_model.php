<?php
class Website_file_model extends CI_Model {
	public function __construct()
 	{
  		$this->load->database();
	}	
	public function delete_file()
	{
		$delete_id=$this->uri->segment(3);	
		$this->db->where('website_file_id', $delete_id);
		return $this->db->delete('website_files');
	}	
	public function select_file()
	{
		$query=$this->db->get('website_files');	
		return $query->result();
	}
	public function file_listing()
	{
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!='')
		{
			$current_account_id=$this->session->userdata('current_account_id');
		}else
		{
			$current_account_id=$this->session->userdata('account_id');
		}
		
		/*$this->db->select('users.is_default');    
		$this->db->from('users');
		$this->db->where('users.user_id',$this->session->userdata('user_id'));
		$user_data=$this->db->get();
		//echo $this->db->last_query();
		$res_user_data=$user_data->result();
		$default_user = $res_user_data[0]->is_default;*/
		
		$this->db->select('website_files.*');    
		$this->db->from('website_files');
		$this->db->where('website_files.account_id',$current_account_id);

		$res=$this->db->get();
		$res_query=$res->result();
		//$query=$this->db->get('users',12);	
		return $res_query;
	}
	
	public function file_listing_ajax()
	{
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!='')
		{
			$current_account_id=$this->session->userdata('current_account_id');
		}else
		{
			$current_account_id=$this->session->userdata('account_id');
		}
		
		/*$this->db->select('users.is_default');    
		$this->db->from('users');
		$this->db->where('users.user_id',$this->session->userdata('user_id'));
		$user_data=$this->db->get();
		//echo $this->db->last_query();
		$res_user_data=$user_data->result();
		$default_user = $res_user_data[0]->is_default;*/
		
		$this->db->select('website_files.*');    
		$this->db->from('website_files');
		$this->db->where('website_files.file_type','image');
		$this->db->where('website_files.account_id',$current_account_id);

		$res=$this->db->get();
		$res_query=$res->result();
		//$query=$this->db->get('users',12);	
		return $res_query;
	}
	
	
	
	public function video_listing_ajax()
	{
		
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!='')
		{
			$current_account_id=$this->session->userdata('current_account_id');
		}else
		{
			$current_account_id=$this->session->userdata('account_id');
		}
		
		/*$this->db->select('users.is_default');    
		$this->db->from('users');
		$this->db->where('users.user_id',$this->session->userdata('user_id'));
		$user_data=$this->db->get();
		//echo $this->db->last_query();
		$res_user_data=$user_data->result();
		$default_user = $res_user_data[0]->is_default;*/
		
		$this->db->select('website_files.*');    
		$this->db->from('website_files');
		$this->db->where('website_files.file_type','video');
		$this->db->where('website_files.account_id',$current_account_id);

		$res=$this->db->get();
		$res_query=$res->result();
		//$query=$this->db->get('users',12);	
		return $res_query;
	}
	
	public function search_file()
	{
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!=''){
			$current_account_id=$this->session->userdata('current_account_id');
		}else{
			$current_account_id=$this->session->userdata('account_id');
		}

	  	$search_field=$this->input->post('txt_search');
	   	$search_filter=$this->input->post('lst_filter');
		if($search_filter==0 || $search_filter==1 || $search_filter==2 || $search_filter=='image' || $search_filter=='document')
	   	{
			$this->db->select('website_files.*');    
			$this->db->from('website_files');
			$this->db->where('website_files.account_id',$current_account_id);

			if($search_filter==2)
			{				
			}
			if($search_filter=='1'){		
				$this->db->where('website_files.file_status', $search_filter);
			}
			if($search_filter=='0'){
				$this->db->where('website_files.file_status', $search_filter);
			}
			if($search_filter=='website_files')
			{ 
				$this->db->where('file_type', $search_filter);				
			}
			if($search_filter=='document')
			{
				$this->db->where('file_type', $search_filter);				
			}
			if($search_filter=='media')
			{
				$this->db->where('file_type', $search_filter);				
			}
			if( $search_field!=''){
				$this->db->like('file_profile_title', $search_field);	
			}
			$res=$this->db->get();
			//echo $this->db->last_query();
			$res_query=$res->result();
			return $res_query;			
			}
	 	}
	public function file_all()
	{
		$query=$this->db->get('website_files');	
		return $query->result();
	}
	function do_upload($file_name)
    {
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!=''){
			$current_account_id=$this->session->userdata('current_account_id');
		}else{
			$current_account_id=$this->session->userdata('account_id');
		}
		
		$file_path="website_file_submission/submission_".$current_account_id."_files";
		
      	$config['upload_path'] =$file_path;
		
      	$config['allowed_types'] = 'mp4|3gp|wmv|avi|mpe|mpeg|mpg|gif|jpg|png|docx|txt|pdf|application/pdf';
		//$config['max_height']  = '768';
        $config['remove_spaces']  = TRUE;
        $config['encrypt_name']  = FALSE;
		$config['file_name']  = $file_name;
        $this->load->library('upload', $config);
		$this->upload->initialize($config); 				
        if (!$this->upload->do_upload('file_name'))
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
	public function file_add()
	{
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!=''){
			$current_account_id=$this->session->userdata('current_account_id');
		}else{
			$current_account_id=$this->session->userdata('account_id');
		}
		$file_path="website_file_submission/submission_".$current_account_id."_files";
		$temp_path='temp_files';
		$dimention='No';
		if(isset($_FILES["file_name"]["name"]) &&$_FILES["file_name"]["name"]!='')
		{
			$file_name= $_FILES["file_name"]["name"];
			$file_type= $_FILES["file_name"]["type"];
		}
		$edit_idd=$this->input->post('hiddenid');
		if(isset($_FILES["file_name"]["name"]) &&$_FILES["file_name"]["name"]!='')
		{
			if($file_type=='image/jpeg'||$file_type=='image/jpg'||$file_type=='image/png'||$file_type=='image/JPEG'||$file_type=='image/GIF'||$file_type=='image/bmp')
			{
				$dimention_array=getimagesize(base_url().$temp_path.'/'.$file_name);
				$dimention=$dimention_array[3];
				$data_type='image';
			}
			else if($file_type=='text/plain'||$file_type=='application/vnd.openxmlformats-officedocument.wordprocessingml.document'||$file_type=='application/pdf')
			{
				$data_type='document';
			}
			else if($file_type=='video/mp4'||$file_type=='video/3gpp'||$file_type=='video/wmv'||$file_type='video/mpeg'||$file_type='video/x-msvideo')
			{ 
				$data_type='video';
			}
			else
			{
				$data_type='media';				
			}
			$file_size= $_FILES["file_name"]["size"];
			$file_name= $_FILES["file_name"]["name"];
			$file_path=base_url().$file_path.'/'.$file_name;
		
		$file_data = array(
            'file_status'=>$this->input->post('file_status'),
            'file_profile_name'=>$file_name,
            'file_profile_poster_frame'=>$this->input->post('txt_poster_frame'),
            'file_profile_title'=>$this->input->post('txt_profile_title'),
            'file_profile_summary'=>$this->input->post('txt_profile_summary'),
            'file_profile_path'=>$file_path,
            'file_profile_size'=>$file_size,
            'file_profile_dimension'=>$dimention,
            'file_tags'=>$this->input->post('txt_tag'),
            'file_notes'=>$this->input->post('txt_note'),
            'file_type'=>$data_type,
            'account_id'=>$current_account_id,
			
       	);
		}
		else
		{
		$file_data = array(
            'file_status'=>$this->input->post('file_status'),
            'file_profile_poster_frame'=>$this->input->post('txt_poster_frame'),
            'file_profile_title'=>$this->input->post('txt_profile_title'),
            'file_profile_summary'=>$this->input->post('txt_profile_summary'),
            'file_tags'=>$this->input->post('txt_tag'),
            'file_notes'=>$this->input->post('txt_note'),
			);	
		}
		if(isset($edit_idd) && $edit_idd!='' && $edit_idd!='new')
		{
			$this->db->where('website_file_id',$edit_idd);
			$this->db->update('website_files', $file_data);
		}
		else
		{
			if($this->input->post('txt_profile_title'))
			{
				$this->db->insert('website_files',$file_data);
			 	$file_fid=$this->db->insert_id();
				$edit_idd = $file_fid;
			}
		}
	$query = $this->db->get_where('website_files', array('website_file_id' => $edit_idd));
	return $query->result();
	}	

	public function selectone_file()
	{
		$edit_id=$this->uri->segment(3);
		$query = $this->db->get_where('website_files', array('website_file_id' => $edit_id));		
		return $query->result();
	}	
	
 }
