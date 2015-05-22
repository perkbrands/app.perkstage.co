<?php
class Connection_model extends CI_Model {
	
	public function __construct()	
	{
		$this->load->database(); 
	}
	public function get_news($id) 
	{
		if($id != FALSE) 
		{
			$query = $this->db->get_where('news', array('id' => $id));
			return $query->row_array();
		}
		else 
		{
			return FALSE;
		}
	
	}
	
	public function connection_listing()
	{
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!=''){
			$current_account_id=$this->session->userdata('current_account_id');
		}else{
			$current_account_id=$this->session->userdata('account_id');
		}
		
		//$query_account=" select * from connections ";
		//$res=$this->db->query($query_account);
		//echo $this->db->last_query();exit;
		//$res_query=$res->result();
	
		//return $res_query;
		
		$this->db->select('connections.*');    
		$this->db->from('connections');
		$this->db->where('connections.account_id',$current_account_id);
		//$this->db->join('account_id', 'audience.audience_id = audience_account.audience_id','INNER');
		$res=$this->db->get();
		$res_query=$res->result();
		//$query=$this->db->get('users',12);	
		//print_r($res_query);
		return $res_query;
		
		
		
		/*$query_account="select * from collections where collection_id in (SELECT distinct collection_account.collection_id
		FROM collection_account 
		WHERE `collection_account`.`account_id` = '".$current_account_id."') order by collection_id desc";
		$res=$this->db->query($query_account);
		$res_query=$res->result();
		return $res_query;*/
	}
	public function get_account_title()
	{
		$query=$this->db->get('websites');	
		return $query->result();
	}
	
	public function get_account()
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
		if(isset($current_account_id) && $current_account_id!=''){
		$query = $this->db->get_where('agency_accounts', array('account_id' =>$current_account_id));
		$query_data=$query->result();
		
		$accep_content_accept=$query_data[0]->account_content_accept;
		}
		if(isset($accep_content_accept) && $accep_content_accept==1)
		{
			$this->db->select('agency_accounts.*');
			$this->db->from('agency_accounts');
			$this->db->where('agency_accounts.account_content_accept',1);
			$this->db->where('agency_accounts.agency_id',$this->session->userdata('agency_id'));
			$res=$this->db->get();
			$res_query=$res->result();
			return $res_query;
			
			
			
		}
		else
		{
		   return 'false';
		}
		/*$this->db->select('agency_accounts.*');    
		$this->db->from('agency_accounts');
		$this->db->where('agency_accounts_users.user_id',$current_user_id);
		$this->db->join('agency_accounts_users','agency_accounts.account_id = agency_accounts_users.account_id','INNER');
		$res=$this->db->get();
		$res_query=$res->result();
		return $res_query;*/
	}
	
	public function get_website()
	{
		$query=$this->db->get('websites');	
		return $query->result();
	}
	public function delete_connection()
	{
		$delete_id=$this->uri->segment(3);
		$this->db->where('connection_id', $delete_id);
		$this->db->delete('connections');
	}	
	
	public function select_collection()
	{
		$query=$this->db->get('collections');	
		return $query->result();
	}
	
	
	function do_upload($file_name)
    {
      	$config['upload_path'] = 'assets/img/connections';
      	$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']    = '3000';
		/*$config['max_width']  = '1024';
		$config['max_height']  = '768';*/
        $config['remove_spaces']  = TRUE;
        $config['encrypt_name']  = FALSE;
		$config['file_name']  = $file_name;
				
        $this->load->library('upload', $config);
		$this->upload->initialize($config); 				
        if (!$this->upload->do_upload('connection_profile_image'))
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
	public function connection_add()
	{ 
		$edit_idd=$this->input->post('hiddenid');
		/*$edit_idd=$this->input->post('hiddenid');
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!='')
		{
			$current_account_id=$this->session->userdata('current_account_id');
		}
		else
		{
			$current_account_id=$this->session->userdata('account_id');
		}
		*/
		if(isset($_FILES["connection_profile_image"]["name"]) &&$_FILES["connection_profile_image"]["name"]!='')
		{
			$connection_profile_image= $_FILES["connection_profile_image"]["name"];
		}
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!='')
		{
			$current_account_id=$this->session->userdata('current_account_id');
		}
		else
		{
			$current_account_id=$this->session->userdata('account_id');
		}
		$this->db->select('*');    
		$this->db->from('agency_accounts');
		$this->db->where('agency_accounts.account_id',$current_account_id);

		$query = $this->db->get();
		$temp= $query->result();
		
		//echo $temp[0]['account_title'];
		foreach($temp as $row){ 
		$account_title=$row -> account_title;
		}
		
		if(isset($_FILES["connection_profile_image"]["name"]) && $_FILES["connection_profile_image"]["name"]!='')
		{
		$collection_data = array(
            'connection_status'=>$this->input->post('connection_status'),
            'connection_profile_image'=>$_FILES["connection_profile_image"]["name"],
            'connection_connect_to'=>$this->input->post('connection_connect_to'),
            'connection_domain'=>$this->input->post('connection_domain'),
            'connection_api_key'=>$this->input->post('connection_api_key'),
            'connection_note'=>$this->input->post('connection_note'),
			  'account_id'=>$current_account_id, 
			  'account_name'=> $account_title
       	);
		}else{
			$collection_data = array(
			'connection_status'=>$this->input->post('connection_status'),
            'connection_connect_to'=>$this->input->post('connection_connect_to'),
            'connection_domain'=>$this->input->post('connection_domain'),
            'connection_api_key'=>$this->input->post('connection_api_key'),
            'connection_note'=>$this->input->post('connection_note'),
			 'account_id'=>$current_account_id,
			 'account_name'=> $account_title
			);	
		}
		if($edit_idd=='')
		{
			$this->db->insert('connections',$collection_data);  
		}
		// return $collection_fid;
		if($edit_idd!=''  && $edit_idd!='new')
		{
			$this->db->where('connection_id',$edit_idd);
			$this->db->update('connections', $collection_data);
		}
		
		return $collection_fid=$this->db->insert_id();
		/*
		if($edit_idd!='' && $edit_idd!='new')
		{
			$this->db->where('collection_id',$edit_idd);
			$this->db->update('collections', $collection_data);
			//echo $this->db->last_query();exit;
				if($this->input->post('accounts_select'))
				{
					$this->db->where('collection_id', $edit_idd);
					$this->db->delete('collection_account');
					$account_arr[]=$this->input->post('accounts_select');
					if(count($account_arr[0])>0){
					for($i=0; $i<count($account_arr[0]);$i=$i+1)
					{
						$account_data = array(
						'account_id'=>$account_arr[0][$i],
						'collection_id'=>$edit_idd,		 
						);				
						$this->db->insert('collection_account',$account_data);
						
					}
					}
						$account_data = array(
						'account_id'=>$current_account_id,
						'collection_id'=>$edit_idd,		 
						);				
						$this->db->insert('collection_account',$account_data);
						
						$main_table_account_data = array(
						'account_id'=>$current_account_id, 
						);
						$this->db->where('collection_id',$edit_idd);
						$this->db->update('collections', $main_table_account_data);
						
					
				}
				
				if($this->input->post('website_select'))
				{
					$this->db->where('collection_id', $edit_idd);
					$this->db->delete('collection_website');
					$website_arr[]=$this->input->post('website_select');
					for($i=0; $i<count($website_arr[0]);$i=$i+1)
					{
						$website_data = array(
						'website_id'=>$website_arr[0][$i],
						'collection_id'=>$edit_idd,		 
						);				

						$this->db->insert('collection_website',$website_data);
					}
				}
		}
		else
		{ 
			//$this->db->insert('collections',$collection_data);
			//$collection_fid=$this->db->insert_id();
			/*
			if($this->input->post('txt_collection_title'))
			{
				$this->db->insert('collections',$collection_data);
			 	$collection_fid=$this->db->insert_id();
				$account_data = array(
						'account_id'=>$current_account_id,
						'collection_id'=>$collection_fid,		 
						);				
						$this->db->insert('collection_account',$account_data);
				if($this->input->post('accounts_select'))
				{
				$account_arr[]=$this->input->post('accounts_select');
				if(count($account_arr)>0){
					for($i=0; $i<count($account_arr[0]);$i++)
					{
						$account_data = array(
						'account_id'=>$account_arr[0][$i],
						'collection_id'=>$collection_fid,		 
						);		
						$this->db->insert('collection_account',$account_data);
					}
				}
						
						
						$main_table_account_data = array(
						'account_id'=>$current_account_id, 
						);
						$this->db->where('collection_id',$collection_fid);
						$this->db->update('collections', $main_table_account_data);
							
					
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
						'collection_id'=>$collection_fid,		 
						);		
						$this->db->insert('collection_account',$account_data);			
					}			
				}
				if($this->input->post('website_select'))
				{
				$website_arr[]=$this->input->post('website_select');
					for($i=0; $i<count($website_arr[0]);$i++)
					{
						$website_data = array(
						'website_id'=>$website_arr[0][$i],
						'collection_id'=>$collection_fid,		 
						);		
						$this->db->insert('collection_website',$website_data);
					}
				}
			}
				$collection_title = array(	
     	      	'collection_title'=>$this->input->post('txt_collection_title'),
				);			 
				if(isset($collection_fid)&& $collection_fid!='')
				{
					$this->db->where('collection_id',$collection_fid);
					$this->db->update('collections', $collection_title);
				}
			
		}
		if(isset($edit_idd) && $edit_idd !='' && $edit_idd !='new' )
		{ 
			
		}
		else
		{
			if(isset($collection_fid) && $collection_fid !='' )	
			$edit_idd=$collection_fid;
		}
			$query = $this->db->get_where('connections', array('connection_id' => $edit_idd));
			
			return $query->result();*/
	}	
	
	public function select_collection_account()
	{
		$collection_id=$this->uri->segment(3);
		$query = $this->db->get_where('collection_account', array('collection_id' => $collection_id));		
		return $query->result();
	}	
	public function select_colletion_website()
	{
		$collection_id=$this->uri->segment(3);
		$query = $this->db->get_where('collection_website', array('collection_id' => $collection_id));		
		return $query->result();
	}	
	public function selectone_connection()
	{
		$edit_id=$this->uri->segment(3);
		$query = $this->db->get_where('connections', array('connection_id' => $edit_id));		
		return $query->result();
	}	
	
	public function select_type_all(){
	
		$this->db->select('*');    
		$this->db->from('design_type');
		$query = $this->db->get();
		return $query->result();
		
	}
	
		
 }
