<?php
 
class Agency extends CI_Controller {

    /**
    * Check if the user is logged in, if he's not, 
    * send him to the login page
    * @return void
    */	
	public function __costruct()
	{
		$this->load->library('session');
		$this->load->library('pagination');
		
	}
	function index()
	{
	$this->load->model('agency_model');	
	$this->load->model('account_setting_model');	
	if($this->session->userdata('login_success')=='success')
		{
			//$data['agency_listing']=$this->agency_model->agency_listing();
			$data['country_data']=$this->agency_model->account_country_listing();				
			$data['state_data']=$this->agency_model->people_states_listing();				
			$data['listing_data']=$this->agency_model->agency_listing();
			$data['country_data']=$this->agency_model->account_country_listing();		
		    $data['state_data']=$this->agency_model->people_states_listing();				
		    $data['timezone_data']=$this->agency_model->people_timezone_listing();	
			$this->load->view('admin/accounts',$data);
        }else{
			
        	$this->load->view('admin/login');	
        }
						
	}
	
	public function user_login()
	{
		
		$this->load->model('agency_model');
		$this->load->model('account_setting_model');
		$returndata=$this->agency_model->login_agency();
		if($returndata=='success' || $this->session->userdata('login_success')=='success')
		{
			//////////////////////////////////
			
			$config = array();
			$config["base_url"] = base_url().'/agency/user_login';
			$config["total_rows"] = $this->agency_model->agency_listing_count();
			$config["per_page"] = 5;
			//$config["uri_segment"] = 3;
			$this->pagination->initialize($config);
	 
			//$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			
			//////////////////////////////////
			//$data["agency_listing"] = $this->agency_model->agency_listing($config["per_page"], $page);
			$data["agency_listing"] = $this->agency_model->agency_listing();
			$data['listing_data']=$this->agency_model->agency_listing();
			$data["links"] = $this->pagination->create_links();
			$data['country_data']=$this->agency_model->account_country_listing();				
			$data['state_data']=$this->agency_model->people_states_listing();
			$data['title']=$this->account_setting_model->account_title();				
			$data['timezone_data']=$this->agency_model->people_timezone_listing();
			if($this->session->userdata('role_id')==2 && $this->session->userdata('assigned_roles')=='single'){
		    $data['editor_role']='editor';
			$this->load->view('admin/activity_accounts',$data);
			}else if($this->session->userdata('role_id')==1 && $this->session->userdata('assigned_roles')=='single' && $this->session->userdata('isdefault')==0){
			$data['admin_role']='administrator';	
			$this->load->view('admin/activity_accounts',$data);
			}else{
			$this->load->view('admin/accounts',$data);	
			}
		}
		
		else
		{			
			redirect(base_url());					

		}

	}
	public function agency_add()
	{
	
		$this->load->model('agency_model');	
		if(isset($_FILES["account_image"]["name"]) && $_FILES["account_image"]["name"]!='')
		{		
			$file_name= $_FILES["account_image"]["name"];
			$this->agency_model->do_upload($file_name);
		}
		$data['query']=$this->agency_model->add_agency();
		$data['country_data']=$this->agency_model->account_country_listing();				
		$data['state_data']=$this->agency_model->people_states_listing();				
		$data['timezone_data']=$this->agency_model->people_timezone_listing();		
		
		if($data['query']=='User Already Exist'){
		$data['error']=$data['query'];
		}
		$data['country_data']=$this->agency_model->account_country_listing();				
		$data['state_data']=$this->agency_model->people_states_listing();				
		$data['timezone_data']=$this->agency_model->people_timezone_listing();		
		$data['listing_data']=$this->agency_model->agency_listing();
		$this->load->view('admin/accounts',$data);							
	}	
	public function agency_profile()
	{
		$this->load->model('agency_model');		
		$data['country_data']=$this->agency_model->account_country_listing();				
		$data['state_data']=$this->agency_model->people_states_listing();				
		$data['timezone_data']=$this->agency_model->people_timezone_listing();		
		$data['query']=$this->agency_model->profile_agency();
		$data['listing_data']=$this->agency_model->agency_listing();
		$this->load->view('admin/accounts',$data);							
	}	
	public function agency_search()
	{
		$this->load->model('agency_model');		
		$data['country_data']=$this->agency_model->account_country_listing();				
		$data['state_data']=$this->agency_model->people_states_listing();				
		$data['timezone_data']=$this->agency_model->people_timezone_listing();		
		$data['txt_search']=$this->input->post('input_value');		
		$data['listing_data']=$this->agency_model->search_agency();
		$data['search_status']=$this->input->post('selected_value');	
		$this->load->view('admin/accounts',$data);							
	}
	public function all_agency()
	{
		$this->load->model('agency_model');		
		$data['country_data']=$this->agency_model->account_country_listing();				
		$data['state_data']=$this->agency_model->people_states_listing();				
		$data['timezone_data']=$this->agency_model->people_timezone_listing();		
		//$data['query']=$this->agency_model->search_agency();
		$data['listing_data']=$this->agency_model->agency_all();
		$this->load->view('admin/accounts',$data);							
	}
	public function account_delete()
	{
		$this->load->model('agency_model');		
		$data['country_data']=$this->agency_model->account_country_listing();				
		$data['state_data']=$this->agency_model->people_states_listing();				
		$data['timezone_data']=$this->agency_model->people_timezone_listing();		
		$data['query']=$this->agency_model->delete_agency();
		$data['listing_data']=$this->agency_model->agency_listing();
		$this->load->view('admin/accounts',$data);						
	}
	public function account_setting()
	{
		$this->load->model('agency_model');		
		$data['country_data']=$this->agency_model->account_country_listing();				
		$data['state_data']=$this->agency_model->people_states_listing();				
		$data['timezone_data']=$this->agency_model->people_timezone_listing();		
		$data['query']=$this->agency_model->selectone_agency();
		$data['listing_data']=$this->agency_model->agency_listing();
		$this->load->view('admin/accounts',$data);						
	}
	public function account_profile()
	{	
		$this->load->model('agency_model');		
		$data['country_data']=$this->agency_model->account_country_listing();				
		$data['state_data']=$this->agency_model->people_states_listing();				
		$data['timezone_data']=$this->agency_model->people_timezone_listing();	
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
	
	public function upload_images(){
	$this->load->model('people_user_model');
	$formats = array("jpg", "png", "gif", "bmp", "jpeg", "PNG", "JPG", "JPEG", "GIF", "BMP");
		if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
		$file_name= $_FILES["account_image"]["name"];
		//$this->people_user_model->do_upload($file_name);
		$config['upload_path'] = './temp_files/';
      	$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']    = '3000';
		/*$config['max_width']  = '1024';
		$config['max_height']  = '768';*/
        $config['remove_spaces']  = TRUE;
        $config['encrypt_name']  = FALSE;
		$config['file_name']  = $file_name;
				
        $this->load->library('upload', $config);
		$this->upload->initialize($config);	
			
			
		 if (!$this->upload->do_upload('account_image'))
        {
        	echo 'error';
         }
         else
         {
          	//$data = array('upload_data' => $this->upload->data());
			echo "<img style='margin-left:10px;' width='100' height='100' src='".base_url()."temp_files/".$file_name."'>";
         } 	
		}
				
	}
		public function activity_account()
	{
		$this->load->model('agency_model');
		$data['title']=$this->agency_model->account_title();
		$this->load->view('admin/activity');			
		
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