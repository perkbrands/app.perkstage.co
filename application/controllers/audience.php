<?php
class Audience extends CI_Controller {

    /**
    * Check if the user is logged in, if he's not, 
    * send him to the login page
    * @return void
    */	
	//audience_delete
	public function __costruc()
	{
		$this->load->library('session');	
	}
	function index()
	{
		$this->load->model('audiences');
		$data['title'] = 'Perk CMS';	
		$data['audience_listing']=$this->audiences->audience_listing();
		$data['listing_data']=$this->audiences->audience_listing();
		$data['allaccount']=$this->audiences->get_account();
		$data['allwebsites']=$this->audiences->get_website();			
		$this->load->view('admin/audience',$data);			
		
		/*if($this->session->userdata('is_logged_in'))
		{
			//$this->session->userdata('is_logged_in')=$hsjfhsd;
			redirect('admin/dashboard');
        }else{
			
        	$this->load->view('admin/login');	
        }
*/
	}
	/*public function audience_login()
	{
		$this->load->view('templates/admin/header');
		$this->load->model('audiences');
		$returndata=$this->audiences->login_audience();
		if($returndata=='success' || $this->session->userdata('login_success')=='success')
		{			
			$data['audience_listing']=$this->audiences->audience_listing();
			$data['listing_data']=$this->audiences->audience_listing();
			$data['allaccount']=$this->audiences->get_account();			
			$this->load->view('admin/audience',$data);			
		}
		else
		{	
		$this->load->view('templates/admin/header');		
			$this->load->view('admin/login');					

		}
	}
*/
	public function audiences()
	{
		$this->load->model('audiences');
		$returndata=$this->audiences->login_audience();
			$data['audience_listing']=$this->audiences->audience_listing();
			$data['listing_data']=$this->audiences->audience_listing();
			$data['allaccount']=$this->audiences->get_account();	
			$data['allwebsites']=$this->audiences->get_website();		
			$this->load->view('admin/audience',$data);			
				
			$this->load->view('admin/login');					

	}

	public function audience_add()
	{		

		$this->load->model('audiences');
		if(isset($_FILES["audience_image"]["name"]) && $_FILES["audience_image"]["name"]!='')
		{		
			$file_name= $_FILES["audience_image"]["name"];
			$this->audiences->do_upload($file_name);
		}
		
		$data['query']=$this->audiences->add_audience();
		$data['listing_data']=$this->audiences->audience_listing();
		$data['audiencewebsite']=$this->audiences->select_audience_website();		
		$data['allaccount']=$this->audiences->get_account();
		$data['allwebsites']=$this->audiences->get_website();
		$data['audienceaccount']=$this->audiences->select_audience_account();
		$edit_idd=$this->input->post('hiddenid');
		$data['updated_id']=$edit_idd;
		if($edit_idd!='' && $data['query']!='Title Already Exist'){
		$data['edit_data']='edited';
		$data['query']=$this->audiences->selectone_audience();	
		}
		
		if($data['query']=='Title Already Exist'){
		$data['error']=$data['query'];
		}
		$this->load->view('admin/audience',$data);							
	}	
	public function audience_profile()
	{
		$this->load->model('audiences');		
		$data['query']=$this->audiences->profile_audience();
		$data['listing_data']=$this->audiences->audience_listing();		
		$data['allaccount']=$this->audiences->get_account();
		$data['allwebsites']=$this->audiences->get_website();			
		$this->load->view('admin/audience',$data);							
	}	
	public function audience_delete()
	{
		$this->load->model('audiences');		
		$data['query']=$this->audiences->delete_audience();
		$data['listing_data']=$this->audiences->audience_listing();		
		$this->load->view('admin/audience',$data);						
	}

	public function audience_search()
	{
		$this->load->model('audiences');		
		//$data['query']=$this->audiences->search_audience();
		$data['search_var']=$this->input->post('selected_value');
		$data['listing_data']=$this->audiences->search_audience();		
		$data['allaccount']=$this->audiences->get_account();
		if($this->input->post('input_value')!=''){
		$data['search_field_value']=$this->input->post('input_value');
		}			
		$this->load->view('admin/audience',$data);							
	}
	public function all_audience()
	{
		$this->load->model('audiences');		
		//$data['query']=$this->audience->search_audience();
		$data['listing_data']=$this->audiences->audience_all();
		
		$data['allaccount']=$this->audiences->get_account();
		$data['allwebsites']=$this->audiences->get_website();			
		$this->load->view('admin/audience',$data);							
	}
	public function audience_setting()
	{
		$this->load->model('audiences');		
		$data['query']=$this->audiences->selectone_audience();
		$data['listing_data']=$this->audiences->audience_listing();
		$data['editaccount']=$this->audiences->selectone_account();
		$data['audienceaccount']=$this->audiences->select_audience_account();
		$data['audiencewebsite']=$this->audiences->select_audience_website();		
		$data['allaccount']=$this->audiences->get_account();
		$data['allwebsites']=$this->audiences->get_website();			
		$this->load->view('admin/audience',$data);						
	}

    /**
    * encript the password 
    * @return mixed
    */	
    function __encrip_password($password) {
        return md5($password);
    }	

	public function upload_images(){
	$this->load->model('agency_model');
	$formats = array("jpg", "png", "gif", "bmp", "jpeg", "PNG", "JPG", "JPEG", "GIF", "BMP");
		if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
		$file_name= $_FILES["audience_image"]["name"];
		//$this->people_user_model->do_upload($file_name);
		$config['upload_path'] = './files/';
      	$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']    = '1000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
        $config['remove_spaces']  = TRUE;
        $config['encrypt_name']  = FALSE;
		$config['file_name']  = $file_name;
				
        $this->load->library('upload', $config);
		$this->upload->initialize($config);	
			
			
		
          	//$data = array('upload_data' => $this->upload->data());
			echo "<img style='margin-left:10px;' width='100' height='100' src='".base_url()."files/".$file_name."'>";
        
		}
				
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