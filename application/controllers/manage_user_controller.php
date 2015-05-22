<?php 
class Manage_user_controller extends CI_Controller {

    /**
    * Check if the user is logged in, if he's not, 
    * send him to the login page
    * @return void
    */	
	public function __costruc()
	{
		$this->load->library('session');		
	}
	function index()
	{
		$this->load->model('manage_user_model');
		$this->load->model('people_user_model');
		$data['listing_data']=$this->people_user_model->people_administrator_listing();
        $data['account_data']=$this->manage_user_model->account_list();
		$data['new_account']=$this->manage_user_model->account_list_new();
		
		$this->load->view('admin/manage_user_roles',$data);
			
	}
	
	function select_account_administrator()
	{
		$user_id=$this->uri->segment(3);
		$this->load->model('manage_user_model');
		$this->load->model('people_user_model');
		$data['listing_data']=$this->people_user_model->people_administrator_listing();
		$data['query']=$this->manage_user_model->people_select_adminitrator();
        $data['main_account_data']=$this->manage_user_model->main_account_list();
		$data['account_data']=$this->manage_user_model->account_list();
		$data['user_title']=$this->manage_user_model->user_title();
		$data['title']=$data['user_title'][0]->user_first_name.' '.$data['user_title'][0]->user_last_name;
		$data['new_account']=$this->manage_user_model->account_list_new();
		$this->load->view('admin/manage_user_roles',$data);
			
	}
	
	function select_account_editor()
	{
		$user_id=$this->uri->segment(3);
		$this->load->model('manage_user_model');
		$this->load->model('people_user_model');
		$data['listing_data']=$this->people_user_model->people_editor_listing();
        $data['main_account_data']=$this->manage_user_model->main_account_list();
		$data['account_data']=$this->manage_user_model->account_list();
		$data['query']=$this->manage_user_model->people_select_adminitrator();
		$data['user_title']=$this->manage_user_model->user_title();
		$data['title']=$data['user_title'][0]->user_first_name.' '.$data['user_title'][0]->user_last_name;
		$data['new_account']=$this->manage_user_model->account_list_new();
		$this->load->view('admin/manage_user_roles',$data);
			
	}
	
	function select_account_member()
	{
		$user_id=$this->uri->segment(3);
		$this->load->model('manage_user_model');
		$this->load->model('people_user_model');
		$data['listing_data']=$this->people_user_model->people_member_listing();
        $data['main_account_data']=$this->manage_user_model->main_account_list();
		$data['account_data']=$this->manage_user_model->account_list();
		$data['query']=$this->manage_user_model->people_select_adminitrator();
		$data['user_title']=$this->manage_user_model->user_title();
		$data['title']=$data['user_title'][0]->user_first_name.' '.$data['user_title'][0]->user_last_name;
		$data['new_account']=$this->manage_user_model->account_list_new();
		$this->load->view('admin/manage_user_roles',$data);
			
	}
	
	function delete_account_role(){
		$this->load->model('manage_user_model');
		$data['delete']=$this->manage_user_model->role_delete_account();
		
		if($data['delete']=='deleted'){
        echo 'success';
		}else{
		echo "problem in Deleteing";	
		}
		
	}
	
	
	function add_account_role(){
		$this->load->model('manage_user_model');
		$data['insert']=$this->manage_user_model->role_add_account();
		if($data['insert']=='inserted'){
        echo 'success';
		}else{
		echo "problem in Deleteing";	
		}
		
	}
	
	function update_account_role(){
		$this->load->model('manage_user_model');
		$data['update']=$this->manage_user_model->role_update_account();
		if($data['update']=='inserted'){
        echo 'success';
		}else{
		echo "problem in Deleteing";	
		}
		
	}
	
	function update_account_user_role(){
		$this->load->model('manage_user_model');
		$this->load->model('people_user_model');
		$data['update']=$this->manage_user_model->user_role_update_account();
		//echo $user_id=$data['update'];
		$user_id = $this->input->post('hidden_user_id');
		redirect('manage_user_controller/select_account_editor/'.$user_id);
		
		
	}
	

}