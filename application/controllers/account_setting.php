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
		$this->load->model('people_user_model');
		$data['image']=$this->account_setting_model->select_image();
		$data['query']=$this->account_setting_model->select_data();
		$data['title']=$this->account_setting_model->account_title();		
		$data['timezone_data']=$this->people_user_model->people_timezone_listing();
		$data['state_data']=$this->account_setting_model->states_list();
		$data['country_data']=$this->account_setting_model->countries_list();
		$this->load->view('admin/profile_view',$data);			
		
	}
	
	public function owner()
	{
	
		$this->load->model('account_setting_model');	
		$this->load->model('people_user_model');	
		$data['image']=$this->account_setting_model->select_image();	
		$data['query']=$this->account_setting_model->select_data();
		$data['title']=$this->account_setting_model->account_title();
		$data['all_admin']=$this->account_setting_model->all_admin();
		$data['selected_admin']=$this->account_setting_model->selected_admin();
		$this->load->view('admin/owner_view',$data);		
		
	}
	
	public function owner_option_delete()
	{
	
		$this->load->model('account_setting_model');	
		$this->load->model('people_user_model');	
		$data['image']=$this->account_setting_model->select_image();	
		//$data['query']=$this->account_setting_model->select_data();
		$data['delete_owner']=$this->account_setting_model->owner_delete();
		$data['title']=$this->account_setting_model->account_title();
		$data['all_admin']=$this->account_setting_model->all_admin();
		$data['selected_admin']=$this->account_setting_model->selected_admin();
		
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!='')
		{
			$current_account_id=$this->session->userdata('current_account_id');
		}
		else
		{
			$current_account_id=$this->session->userdata('account_id');
		}
		
		$url=base_url().'account_setting/owner/'.$current_account_id;
		redirect($url);
		
		//$this->load->view('admin/owner_view',$data);		
		
	}

    public function options()
	{
	
		$this->load->model('account_setting_model');	
		$this->load->model('people_user_model');	
		$data['image']=$this->account_setting_model->select_image();	
		$data['query']=$this->account_setting_model->options_data();
		$data['title']=$this->account_setting_model->account_title();
		$this->load->view('admin/options_view',$data);			
		
	}

	

	public function account_setting_add()
	{
		$this->load->model('account_setting_model');	
		$this->load->model('people_user_model');	
		$data['query']=$this->account_setting_model->add_owner();
		$data['owner_data_data']=$this->owner_model->owner_listing();	
		$this->load->view('admin/accounts',$data);							
	}
	
	public function options_add()
	{
		$data['postback']=$this->input->post('hidden_id');		
		$this->load->model('account_setting_model');
		$this->load->model('people_user_model');		
		$data['image']=$this->account_setting_model->select_image();	
		$data['query']=$this->account_setting_model->add_options();
		$this->load->view('admin/options_view',$data);							
	}
	
	public function owner_save()
	{
		$data['postback']=$this->input->post('hidden_id');		
		$this->load->model('account_setting_model');
		$this->load->model('people_user_model');		
		$data['image']=$this->account_setting_model->select_image();
		$data['query']=$this->account_setting_model->add_owner();
		$data['all_admin']=$this->account_setting_model->all_admin();
		$data['selected_admin']=$this->account_setting_model->selected_admin();
		$this->load->view('admin/owner_view',$data);							
	}
	
	public function profile_save()
	{
		$data['postback']=$this->input->post('hidden_id');		
		$this->load->model('account_setting_model');
		$this->load->model('agency_model');
		if(isset($_FILES["account_image"]["name"]) && $_FILES["account_image"]["name"]!='')
		{		
			$file_name= $_FILES["account_image"]["name"];
			$this->account_setting_model->do_upload_account_image($file_name);
		}
		
		if(isset($_FILES["image_logo_color"]["name"]) && $_FILES["image_logo_color"]["name"]!='')
		{		
			$file_name= $_FILES["image_logo_color"]["name"];
			$this->account_setting_model->do_upload_color($file_name);
		}
		
		if(isset($_FILES["image_logo_reverse"]["name"]) && $_FILES["image_logo_reverse"]["name"]!='')
		{		
			$file_name= $_FILES["image_logo_reverse"]["name"];
			$this->account_setting_model->do_upload_reverse($file_name);
		}
		
		$data['postback']=$this->input->post('hiddenid');		
		$this->load->model('people_user_model');		
		$data['timezone_data']=$this->people_user_model->people_timezone_listing();
		$data['state_data']=$this->account_setting_model->states_list();
		$data['country_data']=$this->account_setting_model->countries_list();	
		$data['query']=$this->account_setting_model->add_profile();
		$data['image']=$this->account_setting_model->select_image();
		
		$account_id=$this->uri->segment(3);
		if($account_id=='' || $account_id==0){
		$account_id=$data['query'][0]->account_id;
		}
		//$this->load->view('admin/profile_view',$data);
		redirect('account_setting/profile/'.$account_id);	
								
	}
	public function activity()
	{
	
		$this->load->view('admin/activity_accounts');			
		
	}
	

}