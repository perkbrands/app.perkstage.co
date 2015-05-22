<?php
class Ajax_model extends CI_Model {
	 public function __construct()
 	{
  		$this->load->database();
 	}
	
	

	function update_ajax_function()
	{
		$account_id=$this->input->post('account_id');		
	    
		if($this->input->post('value')=='' || $this->input->post('value')=='Title must not empty and must be correct' || $this->input->post('value')=='Title Already Exist'){
			$error="Title must not empty and must be correct";
			echo  $error;exit;
		}else{
		
		
	    $this->db->select('agency_accounts.account_title');    
			$this->db->from('agency_accounts');
			$this->db->where('agency_accounts.account_title',$this->input->post('value'));
			$this->db->where('agency_accounts.account_id !=',$account_id);
			$this->db->where('agency_accounts.agency_id',$this->session->userdata('agency_id'));
			
			$res=$this->db->get();
			$res_query=$res->result();
		
			/*$query = $this->db->select('users.user_id')
              ->from('users')
              ->where('users.user_name', $this->input->post('username'))
              ->get();
				$row_count=$query->num_rows();*/
			 	if(count($res_query)>0){
					$error="Title Already Exist";
					echo $error;exit; 
				}else{
	
					$data = array(
						 'account_title'=>$this->input->post('value'),
					);
					if(isset($account_id) && $account_id!='')
					{
						$this->db->where('account_id',$account_id);
						$this->db->update('agency_accounts', $data);
						return $this->input->post('value');
					}
				}
		}
	}
	
	function update_ajax_audience()
	{
	$audience_id=$this->input->post('audience_id');		
	if($this->input->post('value')=='' || $this->input->post('value')=='Title must not empty and must be correct' || $this->input->post('value')=='Title Already Exist'){
			$error="Title must not empty and must be correct";
			echo  $error;exit;
		}else{
			
		$this->db->select('audience.audience_profile_title,agency_accounts.agency_id');    
			$this->db->from('audience');
			$this->db->where('audience.audience_profile_title',$this->input->post('value'));
			$this->db->where('audience.audience_id !=',$audience_id);
			$this->db->where('agency_accounts.agency_id',$this->session->userdata('agency_id'));
			$this->db->group_by('audience_account.account_id');
			$this->db->join('audience_account', 'audience.audience_id = audience_account.audience_id', 'inner');
			$this->db->join('agency_accounts', 'audience_account.account_id = agency_accounts.account_id', 'inner');
			
			$res=$this->db->get();
			$res_query=$res->result();
		
		
			 	if(count($res_query)>0){
					$error="Title Already Exist";
					echo $error;exit; 
				}else{	
			
		$data = array(
	         'audience_title '=>$this->input->post('value'),
        );
		if(isset($audience_id) && $audience_id!='')
		{
			$this->db->where('audience_id',$audience_id);
			$this->db->update('audience', $data);
			return $this->input->post('value');
		}
		 }
		  }
	}
	function update_ajax_design()
	{
		$design_id=$this->input->post('design_id');		
	
		$data = array(
	         'design_title'=>$this->input->post('value'),
        );
		if(isset($design_id) && $design_id!='')
		{
			$this->db->where('design_id',$design_id);
			$this->db->update('design', $data);
			return $this->input->post('value');
		}
	}

	function update_ajax_repeat()
	{
		$repeat_id=$this->input->post('repeat_id');		
	
		$data = array(
	         'repeat_title'=>$this->input->post('value'),
        );
		if(isset($repeat_id) && $repeat_id!='')
		{
			$this->db->where('repeat_id',$repeat_id);
			$this->db->update('repeats', $data);
			return $this->input->post('value');
		}
	}

	function update_ajax_collections()
	{
		$collection_id=$this->input->post('collection_id');		
		$data = array(
	         'collection_title'=>$this->input->post('value'),
        );
		if(isset($collection_id) && $collection_id!='')
		{
			$this->db->where('collection_id',$collection_id);
			$this->db->update('collections', $data);
			return $this->input->post('value');
		}
	}
	function update_ajax_file()
	{
		$file_id=$this->input->post('file_id');		
		$data = array(
	         'file_title'=>$this->input->post('value'),
        );
		if(isset($file_id) && $file_id!='')
		{
			$this->db->where('file_id',$file_id);
			$this->db->update('files', $data);
			return $this->input->post('value');
		}
	}
	
	function website_update_ajax_file(){
		
		$file_id=$this->input->post('file_id');		
		$data = array(
	         'file_profile_title'=>$this->input->post('value'),
        );
		if(isset($file_id) && $file_id!='')
		{
			$this->db->where('website_file_id',$file_id);
			$this->db->update('website_files', $data);
			return $this->input->post('value');
		}
		
	}
	
	function update_ajax_layout()
	{
		$layout_id=$this->input->post('layout_id');		
	
		$data = array(
	         'layout_title'=>$this->input->post('value'),
        );
		if(isset($layout_id) && $layout_id!='')
		{
			$this->db->where('layout_id',$layout_id);
			$this->db->update('layout', $data);
			return $this->input->post('value');
		}
	}
	
	function update_ajax_page()
	{
		$page_id=$this->input->post('page_id');		
	
		$data = array(
	         'page_name'=>$this->input->post('value'),
        );
		if(isset($page_id) && $page_id!='')
		{
			$this->db->where('page_id',$page_id);
			$this->db->update('pages', $data);
			return $this->input->post('value');
		}
	}
	
	
	function update_ajax_people()
	{
		$val_page=$this->input->post('people_id');
		
		$page=explode('||',$val_page);
		$people_id=$page[0];		
		$name=trim($this->input->post('value'));
		if($name=='' || $name=='Text must not empty and should be correct'){
		return 'Text must not empty and should be correct';	
		}else{
		$add_name=explode(' ',$name);
		
		$last_name='';
		for($i=0;$i<count($add_name);$i++){
			if($i!=0){
			$last_name.=$add_name[$i].' ';
			}
		}
		$data = array(
	         'user_first_name'=>$add_name[0],
			 'user_last_name'=>$last_name,
        );
		if(isset($people_id) && $people_id!='')
		{
			$this->db->where('user_id',$people_id);
			$this->db->update('users', $data);
			
			return $name;
		}
		}
	}
	
	
 }
