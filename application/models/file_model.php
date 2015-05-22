<?php
class File_model extends CI_Model {
	public function __construct()
 	{
  		$this->load->database();
	}	
	public function delete_file()
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
		$file_path="submission/submission_".$current_account_id."_files/";
		$delete_id=$this->uri->segment(3);
		$query = $this->db->get_where('files', array('file_id' => $delete_id));
		$uery_data=$query->result();
		$file_name= $uery_data[0]->file_profile_name;
		$path=$file_path.$file_name;
		if(file_exists($path))
		{			
			unlink($path);
		}
		$this->db->where('file_id', $delete_id);
		$this->db->delete('files');
	}	
	public function select_file()
	{
		$query=$this->db->get('files');	
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
		$this->db->select('files.*');    
		$this->db->from('files');
		$this->db->where('files.account_id',$current_account_id);

		$res=$this->db->get();
		$res_query=$res->result();
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
			$this->db->select('files.*');    
			$this->db->from('files');
			$this->db->where('files.account_id',$current_account_id);

			if($search_filter==2)
			{				
			}
			if($search_filter=='1'){		
				$this->db->where('files.file_status', $search_filter);
			}
			if($search_filter=='0'){
				$this->db->where('files.file_status', $search_filter);
			}
			if($search_filter=='image')
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
				$this->db->like('file_title', $search_field);	
			}
			$res=$this->db->get();
			$res_query=$res->result();
			return $res_query;			
			}
	 	}
	public function file_all()
	{
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!='')
		{
			$current_account_id=$this->session->userdata('current_account_id');
		}else
		{
			$current_account_id=$this->session->userdata('account_id');
		}
		$this->db->select('files.*');    
		$this->db->from('files');
		$this->db->where('files.account_id',$current_account_id);

		$res=$this->db->get();
		$res_query=$res->result();
		return $res_query;

	}
	function do_upload($file_name)
    {
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!='')
		{
			$current_account_id=$this->session->userdata('current_account_id');
		}else
		{
			$current_account_id=$this->session->userdata('account_id');
		} 
		if(isset($file_name) && $file_name!='')
		{
			$file_name= str_replace(" ","_",$file_name);
		}

		$file_path="submission/submission_".$current_account_id."_files";
      	$config['upload_path'] =$file_path;
      	$config['allowed_types'] ="*";// 'gif|jpg|png|docx|txt|pdf|mp4|Ogg|WebM|mp4|3gp|flv|video/mp4|application/pdf';
		$config['max_height']  = '100000';
		$config['max_size']  = '100000';
        $config['remove_spaces']  = TRUE;
        $config['encrypt_name']  = TRUE;
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
		if($ac_id!='')
		{
			$current_account_id=$this->session->userdata('current_account_id');
		}else
		{
			$current_account_id=$this->session->userdata('account_id');
		}
		$file_path="submission/submission_".$current_account_id."_files";
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
			if($file_type=='image/jpeg'||$file_type=='image/jpg'||$file_type=='image/png'||$file_type=='image/PNG'||$file_type=='image/JPEG'||$file_type=='image/GIF'||$file_type=='image/gif'||$file_type=='image/bmp')
			{
				$data_type='image';
				$dimention_array=getimagesize(base_url().$temp_path.'/'.$file_name);
				$dimention=$dimention_array[3];

			}
			else if($file_type=='text/plain'||$file_type=='application/vnd.openxmlformats-officedocument.wordprocessingml.document'||$file_type=='application/pdf')
			{
				$data_type='document';
			}
			else
			{
				$data_type='media';				
			}
			$file_size= $_FILES["file_name"]["size"];
			$file_name= $_FILES["file_name"]["name"];
			if(isset($file_name) && $file_name!='')
			{
				$file_name= str_replace(" ","_",$file_name);
			}

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
            'account_id'=>$current_account_id,);
		}
		if(isset($edit_idd) && $edit_idd!='' && $edit_idd!='new')
		{
			$this->db->where('file_id',$edit_idd);
			$this->db->update('files', $file_data);
		}
		else
		{
			if($this->input->post('txt_file_title'))
			{
				$this->db->insert('files',$file_data);
			 	$file_fid=$this->db->insert_id();
				$file_title = array(	
     	      	'file_title'=>$this->input->post('txt_file_title'),
				);			 
				if(isset($file_fid)&& $file_fid!='')
				{
					$this->db->where('file_id',$file_fid);
					$this->db->update('files', $file_title);
				}

			}
		}
				if(isset($file_fid) && $file_fid !='')	
				 $edit_idd=$file_fid;

	$query = $this->db->get_where('files', array('file_id' => $edit_idd));
	return $query->result();
	}	

	public function selectone_file()
	{
		$edit_id=$this->uri->segment(3);
		$query = $this->db->get_where('files', array('file_id' => $edit_id));		
		return $query->result();
	}	
	
 }
