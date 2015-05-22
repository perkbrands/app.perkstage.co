<?php
 
class Account_setting extends CI_Controller {

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
	
	$data['title'] = 'Perk CMS';	
	if($this->session->userdata('is_logged_in')){
			//$this->session->userdata('is_logged_in')=$hsjfhsd;
			redirect('admin/dashboard');
        }else{
			
        	$this->load->view('admin/login');	
        }
	}
	
	public function profile()
	{
	
		$this->load->model('account_setting_model');		
		$data['image']=$this->account_setting_model->select_image();	
		$data['query']=$this->account_setting_model->select_data();	
		$this->load->view('templates/admin/header');
		$this->load->view('admin/profile_view',$data);			
		
	}
	
	public function owner()
	{
	
		$this->load->model('account_setting_model');		
		$data['image']=$this->account_setting_model->select_image();	
		$data['query']=$this->account_setting_model->select_data();
		$this->load->view('templates/admin/header');
		$this->load->view('admin/owner_view',$data);		
		
	}

    public function options()
	{
	
		$this->load->model('account_setting_model');		
		$data['image']=$this->account_setting_model->select_image();	
		$data['query']=$this->account_setting_model->options_data();	
		$this->load->view('templates/admin/header');
		$this->load->view('admin/options_view',$data);			
		
	}

	

	public function account_setting_add()
	{
		$this->load->model('account_setting_model');		
		$data['query']=$this->account_setting_model->add_owner();
		$data['owner_data_data']=$this->owner_model->owner_listing();	
		$this->load->view('admin/accounts',$data);							
	}
	
	public function options_add()
	{
		$data['postback']=$edit_idd=$this->input->post('hiddenid');		
		$this->load->model('account_setting_model');		
		$data['image']=$this->account_setting_model->select_image();	
		$data['query']=$this->account_setting_model->add_options();
		$this->load->view('templates/admin/header',$data);
		$this->load->view('admin/options_view',$data);							
	}
	
	public function owner_save()
	{
		$data['postback']=$edit_idd=$this->input->post('hiddenid');		
		$this->load->model('account_setting_model');		
		$data['image']=$this->account_setting_model->select_image();	
		$data['query']=$this->account_setting_model->add_owner();
		$this->load->view('templates/admin/header',$data);
		$this->load->view('admin/owner_view',$data);							
	}
	
	public function profile_save()
	{
		$data['postback']=$edit_idd=$this->input->post('hiddenid');		
		$this->load->model('account_setting_model');		
		$data['image']=$this->account_setting_model->select_image();	
		$data['query']=$this->account_setting_model->add_profile();
		$this->load->view('templates/admin/header',$data);
		$this->load->view('admin/profile_view',$data);	
								
	}
	
}