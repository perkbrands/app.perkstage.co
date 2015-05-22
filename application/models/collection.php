<?php
class Collection extends CI_Model {
	public function __construct()
 	{
  		$this->load->database();
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
	public function delete_collection()
	{
		$delete_id=$this->uri->segment(3);
		$this->db->where('collection_id', $delete_id);
		$this->db->delete('collections');
	}	
	public function collection_title()
	{
		$collection_id=$this->session->userdata('collection_id');
		if(isset($collection_id) && $collection_id!=''){}
		else {
			$collection_id=$this->uri->segment(3);	
		}		$query= $this->db->get_where('collections', array('collection_id'=> $collection_id));
		return $query->result();
	}	
	
	public function select_collection()
	{
		$query=$this->db->get('collections');	
		return $query->result();
	}
	
	public function collection_listing()
	{
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!=''){
			$current_account_id=$this->session->userdata('current_account_id');
		}else{
			$current_account_id=$this->session->userdata('account_id');
		}
		
		$query_account="select * from collections, collection_account where collections.collection_id = collection_account.collection_id 
						and collection_account.account_id='".$current_account_id."' 
		                and collections.collection_id NOT IN ( SELECT distinct  collections.collection_id FROM collections where collections.account_id='".$current_account_id."')";
		$res=$this->db->query($query_account);
		//echo $this->db->last_query();exit;
		$res_query=$res->result();
	
		return $res_query;
		
		/*$query_account="select * from collections where collection_id in (SELECT distinct collection_account.collection_id
		FROM collection_account 
		WHERE `collection_account`.`account_id` = '".$current_account_id."') order by collection_id desc";
		$res=$this->db->query($query_account);
		$res_query=$res->result();
		return $res_query;*/
	}
	public function search_collection()
	{
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!=''){
			$current_account_id=$this->session->userdata('current_account_id');
		}else{
			$current_account_id=$this->session->userdata('account_id');
		}
         $query_like="";
		 $query_where=""; 
	  	 $search_field=$this->input->post('input_value');
	   	 $search_filter=$this->input->post('selected_value');
		if($search_filter==0 || $search_filter==1 || $search_filter==2)
	   	{   
		
		
		
		if($search_filter==2)
	   	{
		$query_where="";		
		}
		else {
		
		$query_where.="And collections.collection_status='".$search_filter."'";	
				
		/*$this->db->where('collection_account.account_id', $current_account_id);
		$this->db->where('collections.collection_status', $search_filter);
		$this->db->join('collection_account', 'collection_account.collection_id = collections.collection_id','INNER');*/
 
		//$this->db->join('agency_accounts_users', 'agency_accounts_users.user_id = users.user_id','INNER');
		}
	
		
        if( $search_field!=''){
		$query_like.="And collections.collection_profile_title like '%".$search_field."%'";	
		//$this->db->like('collections.collection_profile_title', $search_field);	
		}
		
		
		$query_account="select * from collections, collection_account where collections.collection_id = collection_account.collection_id 
						and collection_account.account_id='".$current_account_id."' $query_like $query_where 
		                and collections.collection_id NOT IN ( SELECT distinct  collections.collection_id FROM collections where collections.account_id='".$current_account_id."')";
		
		$res=$this->db->query($query_account);
		//echo $this->db->last_query();
		$res_query=$res->result();
		return $res_query;
		
		/*$res=$this->db->get();
		
		$res_query=$res->result();
	    return $res_query;*/			
		}
		 
		
	}
	
	public function collection_all()
	{
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!=''){
			$current_account_id=$this->session->userdata('current_account_id');
		}else{
			$current_account_id=$this->session->userdata('account_id');
		}
		
		$query_account="select * from collections, collection_account where collections.collection_id = collection_account.collection_id 
						and collection_account.account_id='".$current_account_id."' 
		                and collections.collection_id NOT IN ( SELECT distinct  collections.collection_id FROM collections where collections.account_id='".$current_account_id."')";
		$res=$this->db->query($query_account);
		$res_query=$res->result();
	
		return $res_query;
	}
	function do_upload($file_name)
    {
      	$config['upload_path'] = 'assets/img/collections';
      	$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']    = '3000';
		/*$config['max_width']  = '1024';
		$config['max_height']  = '768';*/
        $config['remove_spaces']  = TRUE;
        $config['encrypt_name']  = FALSE;
		$config['file_name']  = $file_name;
				
        $this->load->library('upload', $config);
		$this->upload->initialize($config); 				
        if (!$this->upload->do_upload('collection_image'))
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
	public function collection_add()
	{
		
		$edit_idd=$this->input->post('hiddenid');
			$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!='')
		{
			$current_account_id=$this->session->userdata('current_account_id');
		}
		else
		{
			$current_account_id=$this->session->userdata('account_id');
		}


		if(isset($_FILES["collection_image"]["name"]) &&$_FILES["collection_image"]["name"]!='')
		{
			$collection_image= $_FILES["collection_image"]["name"];
		}
		
		
		
		
		if(isset($_FILES["collection_image"]["name"]) &&$_FILES["collection_image"]["name"]!='')
		{
		$collection_data = array(
            'collection_status'=>$this->input->post('collection_status'),
            'collection_profile_image'=>$collection_image,
            'collection_profile_title'=>$this->input->post('txt_profile_title'),
            'collection_profile_summary'=>$this->input->post('txt_profile_summary'),
            'collection_tags'=>$this->input->post('txt_tag'),
            'collection_note'=>$this->input->post('txt_note')
       	);
		}else{
			$collection_data = array(
				'collection_status'=>$this->input->post('collection_status'),
				'collection_profile_title'=>$this->input->post('txt_profile_title'),
				'collection_profile_summary'=>$this->input->post('txt_profile_summary'),
				'collection_tags'=>$this->input->post('txt_tag'),
				'collection_note'=>$this->input->post('txt_note')
			);	
		}
		
		
	
		
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
			$query = $this->db->get_where('collections', array('collection_id' => $edit_idd));
			
			return $query->result();
	}	
	public function collection_manage_listing()
	{
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!=''){
			$current_account_id=$this->session->userdata('current_account_id');
		}else{
			$current_account_id=$this->session->userdata('account_id');
		}
		$collection_id=$this->session->userdata('collection_id');
		$this->db->select('*');    
		$this->db->from('design');
		$this->db->where('design.account_id',$current_account_id);
		$this->db->where('design_collection.collection_id',$collection_id);
		$this->db->join('design_collection', 'design.design_id = design_collection.design_id');
		$query = $this->db->get();
		return $query->result();
	}
	public function design_update()
	{
		
		$collection_id=$this->session->userdata('collection_id');
		$design_id=$this->input->post('hidden_id');
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!='')
		{
			$current_account_id=$this->session->userdata('current_account_id');
		}else
		{
			$current_account_id=$this->session->userdata('account_id');
		}
		
		$css_fonts = array(	
     	'design_collection_css'=>$this->input->post('txt_css'),
		);			 
		
		$this->db->where('collection_id',$collection_id);
		$this->db->update('collections', $css_fonts);
		if(isset($collection_id) && $collection_id!='')
		{
			$query = $this->db->get_where('collections', array('collection_id' => $collection_id));
			return $query->result();			
		}
		
		
	}
	public function design_all()
	{
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!='')
		{
			$current_account_id=$this->session->userdata('current_account_id');
		}else
		{
			$current_account_id=$this->session->userdata('account_id');
		}
		$this->db->select('*');
		$this->db->from('design');
		$this->db->where('design.account_id',$current_account_id);
		$query = $this->db->get();
		return $query->result();
	}
	public function search_design()
	{
		$type_id=$this->input->post('option');
		$type_id_array[]=explode(' ',$type_id);
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!='')
		{
			$current_account_id=$this->session->userdata('current_account_id');
		}else
		{
			$current_account_id=$this->session->userdata('account_id');
		}
		if($type_id_array[0][1]=='noinput')
		{
			$input_search='';
		}
		else
		{
			$input_search=$type_id_array[0][1];
		}
		if($type_id_array[0][0]=='2')
		{
			$select_search='';
		}
		else
		{
			$select_search=$type_id_array[0][0];
		}
		$this->db->select('*');    
		$this->db->from('design');
		$this->db->where('design.account_id',$current_account_id);
		$this->db->where('design.design_status',$select_search);
		$this->db->like('design.design_profile_title',$input_search);
		$this->db->where('design.design_type',$type_id_array[0][2]);
		$query = $this->db->get();
		return $query->result();
	}
	public function design_type()
	{
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!='')
		{
			$current_account_id=$this->session->userdata('current_account_id');
		}else
		{
			$current_account_id=$this->session->userdata('account_id');
		}
		$design_type_post=$this->input->post('option');
		$this->db->select('*');    
		$this->db->from('design');
		$this->db->where('design.account_id',$current_account_id);
		$this->db->where('design.design_type',$design_type_post);
		$res=$this->db->get();
		$res_query=$res->result();
		return $res_query;
	} 

	public function design_default_update()
	{
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!='')
		{
			$current_account_id=$this->session->userdata('current_account_id');
		}else
		{
			$current_account_id=$this->session->userdata('account_id');
		}
		$collection_id=$this->session->userdata('collection_id');
		$design_id=$this->input->post('option');
		$design_data=explode(' ',$design_id);
		$design_data[0];		
		$design_data[1];
		$collection_id=$this->session->userdata('collection_id');


		$this->db->select('*');    
		$this->db->from('design');
		$this->db->where('design.account_id',$current_account_id);
		$this->db->where('design.design_type',$design_data[1]);
		$this->db->join('design_collection','design.design_id = design_collection.design_id','INNER');
		$res=$this->db->get();
		$res_query=$res->result();
		foreach($res_query as $row)
		{
			$design_id_array[]=$row->design_id;
		}
		
		$is_dafault_data = array(
				'is_default'=>0,
			);
		$this->db->where_in('design_id',$design_id_array);
		$this->db->where('collection_id',$collection_id);
		$this->db->update('design_collection', $is_dafault_data);

		$is_dafault_data = array(
				'is_default'=>1,
			);
		$this->db->where('design_id',$design_data[0]);
		$this->db->where('collection_id',$collection_id);
		$this->db->update('design_collection', $is_dafault_data);
		return 'success';
		
	}
	public function collection_design_update()
	{
		$design_id=$this->input->post('option');
		$collection_id=$this->session->userdata('collection_id');
		
		$query = $this->db->get_where('design_collection', array('design_id' => $design_id));		
		$is_default= $query->result();
		if($is_default[0]->is_default==1)
		{
			echo 'dsfdsfsdf'; exit;
		}
		$this->db->where('collection_id', $collection_id);
		$this->db->where('design_id', $design_id);
		$this->db->delete('design_collection');
	}

	public function default_page_design()
	{
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!=''){
			$current_account_id=$this->session->userdata('current_account_id');
		}else{
			$current_account_id=$this->session->userdata('account_id');
		}
		$collection_id=$this->session->userdata('collection_id');

		$this->db->select('*');    
		$this->db->from('design');
		$this->db->where('design.account_id',$current_account_id);
		$this->db->where('design_collection.is_default',1);
		$this->db->where('design_collection.collection_id',$collection_id);
		$this->db->where('design.design_type',1);
		$this->db->join('design_collection','design.design_id = design_collection.design_id','INNER');
		$res=$this->db->get();
		$res_query=$res->result();
		return $res_query;
	}
	public function default_post_design()
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
		$collection_id=$this->session->userdata('collection_id');
		$this->db->select('*');    
		$this->db->from('design');
		$this->db->where('design.account_id',$current_account_id);
		$this->db->where('design_collection.is_default',1);
		$this->db->where('design_collection.collection_id',$collection_id);
		$this->db->where('design.design_type',2);
		$this->db->join('design_collection','design.design_id = design_collection.design_id','INNER');
		$res=$this->db->get();
		$res_query=$res->result();
		return $res_query;
	}
	public function default_calendar_design()
	{
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!=''){
			$current_account_id=$this->session->userdata('current_account_id');
		}else{
			$current_account_id=$this->session->userdata('account_id');
		}
		$collection_id=$this->session->userdata('collection_id');
		$this->db->select('*');    
		$this->db->from('design');
		$this->db->where('design.account_id',$current_account_id);
		$this->db->where('design_collection.is_default',1);
		$this->db->where('design_collection.collection_id',$collection_id);
		$this->db->where('design.design_type',4);
		$this->db->join('design_collection','design.design_id = design_collection.design_id','INNER');
		$res=$this->db->get();
		
		$res_query=$res->result();
		return $res_query;
	}

	public function select_page_design()
	{
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!=''){
			$current_account_id=$this->session->userdata('current_account_id');
		}else{
			$current_account_id=$this->session->userdata('account_id');
		}
		$collection_id=$this->session->userdata('collection_id');

		$this->db->select('*');    
		$this->db->from('design');
		$this->db->where('design.account_id',$current_account_id);
		$this->db->where('design_collection.collection_id',$collection_id);
		$this->db->where('design_collection.is_default',0);
		$this->db->where('design.design_type',1);
		$this->db->join('design_collection','design.design_id = design_collection.design_id','INNER');
		$res=$this->db->get();
		$res_query=$res->result();
		return $res_query;
	}
	
	public function select_count_page_design()
	{
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!=''){
			$current_account_id=$this->session->userdata('current_account_id');
		}else{
			$current_account_id=$this->session->userdata('account_id');
		}
		$collection_id=$this->session->userdata('collection_id');
		$collection_id_current=$this->uri->segment(3);
		if($collection_id_current=='')
		{
			$collection_id_current=$collection_id;
		}
		$this->db->select('*');    
		$this->db->from('design');
		$this->db->where('design.account_id',$current_account_id);
		$this->db->where('design_collection.collection_id',$collection_id_current);
		$this->db->where('design.design_type',1);
		$this->db->join('design_collection','design.design_id = design_collection.design_id','INNER');
		$res=$this->db->get();
		
		$count_rows = $res->num_rows();
		
		
		
		//$res_query=$res->result();
		return $count_rows;
	}
	
	public function select_post_design()
	{
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!=''){
			$current_account_id=$this->session->userdata('current_account_id');
		}else{
			$current_account_id=$this->session->userdata('account_id');
		}
		$collection_id=$this->session->userdata('collection_id');
		$this->db->select('*');    
		$this->db->from('design');
		$this->db->where('design.account_id',$current_account_id);
		$this->db->where('design_collection.is_default',0);
		$this->db->where('design_collection.collection_id',$collection_id);
		$this->db->where('design.design_type',2);
		$this->db->join('design_collection','design.design_id = design_collection.design_id','INNER');
		$res=$this->db->get();
		$res_query=$res->result();
		return $res_query;
	}
	public function select_calendar_design()
	{
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!=''){
			$current_account_id=$this->session->userdata('current_account_id');
		}
		else
		{
			$current_account_id=$this->session->userdata('account_id');
		}
		$collection_id=$this->session->userdata('collection_id');
		if($collection_id==''){
			$return_id=$this->input->post('hidden_id');
			$collection_id = $return_id;
		}
		
		
		$this->db->select('*');    
		$this->db->from('design');
		$this->db->where('design.account_id',$current_account_id);
		$this->db->where('design_collection.is_default',0);
		$this->db->where('design_collection.collection_id',$collection_id);
		$this->db->where('design.design_type',4);
		$this->db->join('design_collection','design.design_id = design_collection.design_id','INNER');
		$res=$this->db->get();
		$res_query=$res->result();
		return $res_query;
	}
	public function design_select()
	{
		$design_type=$this->input->post('option'); 
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
		$this->db->from('design');
		$this->db->where('design.account_id',$current_account_id);
		$this->db->where('design.design_type',$design_type);
		$query = $this->db->get();
		$this->db->last_query();
		return $query->result();
	}
	public function design_collection()
	{
		$collection_id=$this->uri->segment(3);
		if($collection_id==''){
		$collection_id=$this->input->post('hidden_id');	
		}
		$query = $this->db->get_where('collections', array('collection_id' => $collection_id));		
		return $query->result();
	}
	public function manage_design()
	{
		$design_id=$this->uri->segment(3);
		$query = $this->db->get_where('design_collection', array('design_id' => $design_id));		
		return $query->result();
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
	public function selectone_collection()
	{
		$edit_id=$this->uri->segment(3);
		$query = $this->db->get_where('collections', array('collection_id' => $edit_id));		
		return $query->result();
	}	
	
	public function select_type_all(){
	
		$this->db->select('*');    
		$this->db->from('design_type');
		$query = $this->db->get();
		return $query->result();
		
	}
	
	public function selectone_onedesign()
	{
		 $collection_id=$this->session->userdata('collection_id');
		 $design_id=$this->input->post('hidden_id');
		  if(isset($design_id) && $design_id !=''){}
		  else {
		  $design_id=$this->uri->segment(3); 
		  }
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!='')
		{
			$current_account_id=$this->session->userdata('current_account_id');
		}else
		{
			$current_account_id=$this->session->userdata('account_id');
		}
		
				
		$this->db->from('design_collection');
		$this->db->where('collection_id',$collection_id);
		$this->db->where('design_id',$design_id);
		$query = $this->db->get();
		return $query->result();

		
	
	}	
	
 }
