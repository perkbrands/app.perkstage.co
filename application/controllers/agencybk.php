<?php
 
class Agency extends CI_Controller {

    /**
    * Check if the user is logged in, if he's not, 
    * send him to the login page
    * @return void
    */	
	public function __costruc()
	{
		$this->load->library('session');
		$this->load->view('templates/admin/header');		
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
	
	public function agency_view()
	{
	
		$this->load->model('agency_model');

		$data['agency_listing']=$this->agency_model->agency_listing();
		$data['listing_data']=$this->agency_model->agency_listing();
		$this->load->view('admin/accounts',$data);			
		
	}
	
	public function user_login()
	{
	
		$this->load->model('agency_model');
		$returndata=$this->agency_model->login_user();
		if($returndata=='success' || $this->session->userdata('login_success')=='success')
		{
			
			$data['agency_listing']=$this->agency_model->agency_listing();
			$data['listing_data']=$this->agency_model->agency_listing();
			$this->load->view('admin/accounts',$data);			
		}
		else
		{			
			$this->load->view('admin/login');					
		}
	}
	public function agency_add()
	{
		$this->load->model('agency_model');		
		$data['query']=$this->agency_model->add_agency();
		$data['listing_data']=$this->agency_model->agency_listing();	
		$this->load->view('admin/accounts',$data);							
	}
	
	public function agency_search()
	{
		$this->load->model('agency_model');		
		//$data['query']=$this->agency_model->search_agency();
		$data['listing_data']=$this->agency_model->search_agency();		
		$this->load->view('admin/accounts',$data);							
	}

	public function all_agency()
	{
		$this->load->model('agency_model');		
		//$data['query']=$this->agency_model->search_agency();
		$data['listing_data']=$this->agency_model->agency_all();
		$this->load->view('admin/accounts',$data);							
	}
	/*public function agency_filter()
	{
		//echo'fffffffff';	
		$filter_agency=$this->input->post('option');
		$this->load->model('agency_model');		
		$data['listing_data']=$this->agency_model->filter_agency();
		//$this->load->view('templates/admin/header');		
		$this->load->view('admin/accounts',$data);							
	}
	*/	
	public function account_delete()
	{
		$this->load->model('agency_model');		
		$data['query']=$this->agency_model->delete_agency();
		$data['listing_data']=$this->agency_model->agency_listing();	
		$this->load->view('admin/accounts',$data);						
	}
	public function account_setting()
	{
		$this->load->model('agency_model');		
		$data['query']=$this->agency_model->selectone_agency();
		$data['listing_data']=$this->agency_model->agency_listing();	
		$this->load->view('admin/accounts',$data);						
	}
	public function account_profile()
	{	
		$this->load->model('agency_model');		
		$data['profile']=$this->agency_model->profile_account();
		$data['listing_data']=$this->agency_model->agency_listing();	
		$this->load->view('admin/accounts',$data);
								
	}

    /**
    * encript the password 
    * @return mixed
    */	
    function __encrip_password($password) {
        return md5($password);
    }	

    /**
    * check the username and the password with the database
    * @return void
    */

    /**
    * The method just loads the signup view
    * @return void
    */
	function signup()
	{
		$this->load->view('admin/create_account');	
	}
	

    /**
    * Create new user and store it in the database
    * @return void
    */	
	
	/**
    * Destroy the session, and logout the user.
    * @return void
    */		
	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}

}