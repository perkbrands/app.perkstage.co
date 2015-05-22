<?php
class Manage_user_model extends CI_Model {
	 public function __construct()
 	{
  		$this->load->database();
 	}

	public function main_account_list()
	{    
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!=''){
			$current_account_id=$this->session->userdata('current_account_id');
		}else{
			$current_account_id=$this->session->userdata('account_id');
		}
	
        $user_id=$this->uri->segment(3);	  
		$this->db->select('users.*,agency_accounts_users.account_id,agency_accounts.account_title,agency_accounts_users.role_id');    
		$this->db->from('users');
		$this->db->where('agency_accounts_users.agency_id',$this->session->userdata('agency_id'));
		$this->db->where('agency_accounts_users.user_id',$user_id);
		$this->db->join('agency_accounts_users', 'users.user_id = agency_accounts_users.user_id','INNER');
		$this->db->join('agency_accounts', 'agency_accounts.account_id = agency_accounts_users.account_id','INNER');

		$res=$this->db->get();
		$res_query=$res->result();
		return $res_query;
	}
	public function account_list()
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
		else
		{
			return 'false';
		}

	 /*  if($this->session->userdata('isdefault')=='1')
		{
			$this->db->select('agency_accounts.*');    
			$this->db->from('agency_accounts');
			$this->db->where('agency_accounts.agency_id',$this->session->userdata('agency_id'));
			$res=$this->db->get();
			$res_query=$res->result();
		}
		else
		{
        	$user_id=$this->uri->segment(3);	  
			$this->db->select('users.*,agency_accounts_users.account_id,agency_accounts.account_title,agency_accounts_users.role_id,agency_accounts_users.user_id');    
			$this->db->from('users');
			$this->db->where('agency_accounts_users.agency_id',$this->session->userdata('agency_id'));
			$this->db->where('agency_accounts_users.user_id',$user_id);
			//$this->db->where('agency_accounts_users.account_id',$this->session->userdata('account_id'));
			$this->db->join('agency_accounts_users', 'users.user_id = agency_accounts_users.user_id','INNER');
			$this->db->join('agency_accounts', 'agency_accounts.account_id = agency_accounts_users.account_id','INNER');
			$res=$this->db->get();
			$res_query=$res->result();
			//$query=$this->db->get('users',12);
		}
		return $res_query; 
		*/
	}
	public function user_title(){
		$user_id=$this->uri->segment(3);	  
		$this->db->select('users.user_first_name,users.user_last_name');    
		$this->db->from('users');
		$this->db->where('users.user_id',$user_id);
		//$this->db->where('agency_accounts_users.account_id',$this->session->userdata('account_id'));
		$res=$this->db->get();
		$res_query=$res->result();
		//$query=$this->db->get('users',12);

		return $res_query;
	}

	public function people_select_adminitrator(){
		$user_id=$this->uri->segment(3);	  
		$this->db->select('users.*');    
		$this->db->from('users');
		$this->db->where('users.user_id',$user_id);
		//$this->db->where('agency_accounts_users.account_id',$this->session->userdata('account_id'));
		$res=$this->db->get();
		$res_query=$res->result();
		//$query=$this->db->get('users',12);

		return $res_query;
	}
	
	public function role_delete_account(){
	
	$account_id = $_POST['account_id'];
	$user_id = $_POST['user_id'];
	$role_id = $_POST['role_id'];
	
	$this->db->where('account_id', $account_id);
	$this->db->where('user_id', $user_id);
	$this->db->where('role_id', $role_id);
    if($this->db->delete('agency_accounts_users')){
	return 'deleted';
	}else{
	return 'problem';	
	}
		
	}
	
	public function role_add_account(){
	
	$account_id = $_POST['account_id'];
	$user_id = $_POST['user_id'];
	$role_id = $_POST['role_id'];
	
	$array_add=array('account_id'=>$account_id,
					 'user_id'=>$user_id,
					 'agency_id'=>$this->session->userdata('agency_id'),
					 'role_id'=>$role_id);

    if($this->db->insert('agency_accounts_users',$array_add)){
	return 'inserted';
	}else{
	return 'problem';	
	}
		
	}
	
	
	public function role_update_account(){
	
	$account_id = $_POST['account_id'];
	$user_id = $_POST['user_id'];
	$role_id = $_POST['role_id'];
	
	$array_add=array('account_id'=>$account_id,
					 'user_id'=>$user_id,
					 'role_id'=>$role_id);

    $this->db->where('user_id',$user_id);
	$this->db->where('account_id',$account_id);
    if($this->db->update('agency_accounts_users',$array_add)){
	return 'inserted';
	}else{
	return 'problem';	
	}
		
	}
	
	
	public function user_role_update_account(){
	
	$user_id = $this->input->post('hidden_user_id');
	
	$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!='')
		{
			$current_account_id=$this->session->userdata('current_account_id');
		}
		else
		{
			$current_account_id=$this->session->userdata('account_id');
		}
	$account_id=$current_account_id;
	$cnt=0;
	foreach($_POST as $array_posted){
		if($cnt!=0){
		$role_id=$array_posted['user_role_'.$cnt];
		$array_add=array('account_id'=>$account_id,
					 'user_id'=>$user_id,
					 'role_id'=>$role_id);

    $this->db->where('user_id',$user_id);
	$this->db->where('account_id',$account_id);
    $this->db->update('agency_accounts_users',$array_add);
		}
		$cnt++;
		
	}
	}
	
	
	public function account_list_new(){
		$user_id=$this->uri->segment(3);
		if($this->session->userdata('isdefault')=='1')
		{
			///////////////////////////////////////
			
		$query_select="SELECT * 
						FROM agency_accounts
						where 
						
						agency_id = ".$this->session->userdata('agency_id')." and agency_accounts.account_id not in 
						(
						
						SELECT  account_id
						FROM agency_accounts_users
						where  user_id = ".$user_id."
						
						)";
			
                  
			///////////////////////////////////////////
			/*$this->db->select('agency_accounts.*');    
			$this->db->from('agency_accounts');
			$this->db->where('agency_accounts.agency_id',$this->session->userdata('agency_id'));
			$this->db->where('agency_accounts_users.user_id !=',$user_id);
			$this->db->group_by('agency_accounts_users.account_id');
			$this->db->join('agency_accounts_users', 'agency_accounts.account_id = agency_accounts_users.account_id','INNER');			
			$res=$this->db->get();
			$res_query=$res->result();*/
			$res=$this->db->query($query_select);
			$res_query=$res->result();
		}
		else
		{
        	////////////////////////////////////////////////
			
		$query_select="SELECT * 
						FROM agency_accounts, agency_accounts_users
						where 
						agency_accounts.account_id = agency_accounts_users.account_id
						and agency_accounts_users.user_id= ".$this->session->userdata('user_id')." and agency_accounts.account_id not in 
						(
						
						SELECT  account_id
						FROM agency_accounts_users
						where  user_id = ".$user_id."
						
						)";
			
			
			//////////////////////////////////////////////////	  
			/*$this->db->select('agency_accounts.*');    
			$this->db->from('agency_accounts');
			$this->db->where('agency_accounts.agency_id',$this->session->userdata('agency_id'));
			$this->db->where('agency_accounts_users.user_id !=',$user_id);
			$this->db->join('agency_accounts_users', 'agency_accounts.account_id = agency_accounts_users.account_id','INNER');			
			$res=$this->db->get();
			$res_query=$res->result();*/
			
			$res=$this->db->query($query_select);
			$this->db->last_query();
			$res_query=$res->result();
		}
		return $res_query;
		
	}
	
 }
