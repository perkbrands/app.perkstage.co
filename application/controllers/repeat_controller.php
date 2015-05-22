<?php
class Repeat_controller extends CI_Controller {

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
		$this->load->model('repeat_model');
		$data['title'] = 'Perk CMS';	
		$data['listing_data']=$this->repeat_model->repeat_listing();
		$data['listing_audience']=$this->repeat_model->audience_listing();
		$data['allaccount']=$this->repeat_model->get_account();
		$data['allwebsites']=$this->repeat_model->get_website();
		$data['listing_design']=$this->repeat_model->design_listing();
		$data['active_site']=$this->repeat_model->select_active_website();			
		$this->load->view('admin/repeat',$data);			
		
		/*if($this->session->userdata('is_logged_in'))
		{
			//$this->session->userdata('is_logged_in')=$hsjfhsd;
			redirect('admin/dashboard');
        }else{
			
        	$this->load->view('admin/login');	
        }
*/
	}
	
	
	function get_repeats(){
		$this->load->model('repeat_model');
		$data['listing_data']=$this->repeat_model->repeat_listing();
		$data['listing_design']=$this->repeat_model->design_listing();
		$data['listing_audience']=$this->repeat_model->audience_listing();
		
		foreach($data['listing_data'] as $row){
		echo '<li id="repeat_id_'.$row->repeat_id.'" onclick=set_url_repeat("'.$row->repeat_id.'")' ." ";
             	echo ">
                                     
                <div class='pill' style='background-image: url(".base_url().'assets/img/repeats_img/'.$row->repeat_profile_image.")'";
				echo " >&nbsp;</div>                       
                <p class='label'>$row->repeat_title</p>";
                   if($row->repeat_status==1) {
                  	 echo "<div class='status statusGreen'></div>";
                   }
					else
					{
                   	  echo "<div class='status statusRed'></div>";
                     }
                    echo "</li>";
	
		}
	}
	
	function selected_website(){
	 $this->load->model('repeat_model');
	 $data['listing_data']=$this->repeat_model->repeat_listing();
	 $data['listing_audience']=$this->repeat_model->audience_listing();
	 $data['listing_design']=$this->repeat_model->design_listing();
	 $data['allaccount']=$this->repeat_model->get_account();
	 $data['allwebsites']=$this->repeat_model->get_website();
	 $data['id_web']=$this->uri->segment(3);
	 $data['active_site']=$this->repeat_model->select_active_website();			
	 $this->load->view('admin/repeat',$data);	
		
	}

	public function repeat_conroller()
	{
		$this->load->model('repeat_model');
	
			$data['repeat_listing']=$this->repeat_model->repeat_listing();
			$data['listing_data']=$this->repeat_model->repeat_listing();
			$data['allaccount']=$this->repeat_model->get_account();	
			$data['listing_audience']=$this->repeat_model->audience_listing();
			$data['listing_design']=$this->repeat_model->design_listing();
			$data['allwebsites']=$this->repeat_model->get_website();		
			$this->load->view('admin/repeat',$data);			
			
	}


	public function repeat_add()
	{		

		$this->load->model('repeat_model');
		if(isset($_FILES["repeat_image"]["name"]) && $_FILES["repeat_image"]["name"]!='')
		{		
			$file_name= $_FILES["repeat_image"]["name"];
			$this->repeat_model->do_upload($file_name);
		}
		
		$data['query']=$this->repeat_model->add_repeat();
		$data['listing_data']=$this->repeat_model->repeat_listing();
		$data['repeatwebsite']=$this->repeat_model->select_repeat_website();		
		$data['allaccount']=$this->repeat_model->get_account();
		$data['allwebsites']=$this->repeat_model->get_website();
		$data['repeataccount']=$this->repeat_model->select_repeat_account();
		$data['listing_audience']=$this->repeat_model->audience_listing();
		$data['listing_design']=$this->repeat_model->design_listing();
		$edit_idd=$this->input->post('hiddenid');
		$data['updated_id']=$edit_idd;
		if($edit_idd!='' && $edit_idd!='new' && $data['query']!='Title Already Exist'){
		$data['edit_data']='edited';
		$data['query']=$this->repeat_model->selectone_repeat();	
		}
		
		if($data['query']=='Title Already Exist'){
		$data['error']=$data['query'];
		}
		
		if($edit_idd!='new' && $edit_idd!=''){
			$repeat_id = $edit_idd;
		}else{
			$repeat_id=$data['query'][0]->repeat_id;
		}
		
		redirect('repeat_controller/repeat_setting/'.$repeat_id);
		//$this->load->view('admin/repeat',$data);							
	}	
	public function repeat_profile()
	{
		$this->load->model('repeat_model');		
		$data['query']=$this->repeat_model->profile_repeat();
		$data['listing_data']=$this->repeat_model->repeat_listing();
		$data['listing_audience']=$this->repeat_model->audience_listing();
		$data['listing_design']=$this->repeat_model->design_listing();		
		$data['allaccount']=$this->repeat_model->get_account();
		$data['allwebsites']=$this->repeat_model->get_website();			
		$this->load->view('admin/repeat',$data);							
	}	
	public function repeat_delete()
	{
		$this->load->model('repeat_model');		
		$data['query']=$this->repeat_model->delete_repeat();
		$data['listing_data']=$this->repeat_model->repeat_listing();
		$data['listing_audience']=$this->repeat_model->audience_listing();
		$data['listing_design']=$this->repeat_model->design_listing();		
		redirect('repeat_controller');
		//$this->load->view('admin/repeat',$data);						
	}

	public function reapeat_search()
	{
		$this->load->model('repeat_model');		
		$data['search_var'] = $this->input->post('selected_value');
		$data['search_field_value']=$this->input->post('input_value');

		$data['listing_data']=$this->repeat_model->search_repeat();
		$data['listing_audience']=$this->repeat_model->audience_listing();
		$data['listing_design']=$this->repeat_model->design_listing();
		$data['active_site']=$this->repeat_model->select_active_website();		
		$data['allaccount']=$this->repeat_model->get_account();
		if($this->input->post('input_value')!=''){
		$data['search_field_value']=$this->input->post('input_value');
		}			
		$this->load->view('admin/repeat',$data);							
	}
	
	public function repeat_search_ajax()
	{
		$this->load->model('repeat_model');		
		$data['search_var'] = $this->input->post('selected_value');
		$data['search_field_value']=$this->input->post('input_value');
		$data['listing_data']=$this->repeat_model->search_repeat();
		$data['listing_design']=$this->repeat_model->design_listing();
		$data['listing_audience']=$this->repeat_model->audience_listing();
		
		foreach($data['listing_data'] as $row){

		echo '<li id="repeat_id_'.$row->repeat_id.'" onclick=set_url_repeat("'.$row->repeat_id.'")' ." ";
             	echo ">
                                     
                <div class='pill' style='background-image: url(".base_url().'assets/img/repeats_img/'.$row->repeat_profile_image.")'";
				echo " >&nbsp;</div>                       
                <p class='label'>$row->repeat_title</p>";
                   if($row->repeat_status==1) {
                  	 echo "<div class='status statusGreen'></div>";
                   }
					else
					{
                   	  echo "<div class='status statusRed'></div>";
                     }
                    echo "</li>";
	
		}
	
		//$this->load->view('admin/repeat',$data);							
	}
	
	public function all_repeats()
	{
		$this->load->model('repeat_model');		
		//$data['query']=$this->audience->search_audience();
		$data['listing_data']=$this->repeat_model->repeat_all();
		
		$data['allaccount']=$this->repeat_model->get_account();
		$data['active_site']=$this->repeat_model->select_active_website();
		$data['listing_audience']=$this->repeat_model->audience_listing();
		$data['listing_design']=$this->repeat_model->design_listing();
		
		$data['allwebsites']=$this->repeat_model->get_website();			
		$this->load->view('admin/repeat',$data);							
	}
	public function repeat_setting()
	{
		$this->load->model('repeat_model');		
		$data['query']=$this->repeat_model->selectone_repeat();
		$data['listing_data']=$this->repeat_model->repeat_listing();
		$data['editaccount']=$this->repeat_model->selectone_account();
		$data['repeataccount']=$this->repeat_model->select_repeat_account();
		$data['repeatwebsite']=$this->repeat_model->select_repeat_website();
		$data['listing_audience']=$this->repeat_model->audience_listing();		
		$data['allaccount']=$this->repeat_model->get_account();
		$data['allwebsites']=$this->repeat_model->get_website();
		$data['active_site']=$this->repeat_model->select_active_website();
		$data['listing_design']=$this->repeat_model->design_listing();
		$data['one_design']=$this->repeat_model->design_listing_setting();			
		$this->load->view('admin/repeat',$data);						
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
		$file_name= $_FILES["repeat_image"]["name"];
		//$this->people_user_model->do_upload($file_name);
		$config['upload_path'] = './temp_files/';
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
			echo "<img style='margin-left:10px;' width='100' height='100' src='".base_url()."temp_files/".$file_name."'>";
        
		}
				
	}
	
	
	public function manage_repeat()
	{
		$this->load->model('repeat_model');		
		$this->load->library('ckeditor',base_url() . 'assets/ckeditor/');
        $this->ckeditor->basePath = base_url(). 'assets/ckeditor/';
		$this->ckeditor->config['toolbar'] = array(
                array('Bold', 'Italic','Underline','Strike','paragraph','Format','JustifyBlock','JustifyLeft','JustifyCenter','JustifyRight','Indent','NumberedList', 'BulletedList','RemoveFormat','Subscript','Superscript','Undo'));	
		$data['query']=$this->repeat_model->get_content();											
		$this->load->view('admin/repeats_manage',$data);		
		
			
	}	
 
 	public function update(){
	$this->load->model('repeat_model');
	$data['query']=$this->repeat_model->update_content();
	$data['id_edit']=$this->input->post('repeat_id');
	$this->load->library('ckeditor',base_url() . 'assets/ckeditor/');
    $this->ckeditor->basePath = base_url(). 'assets/ckeditor/';
    $this->ckeditor->config['toolbar'] = array(array());
	$data['query']=$this->repeat_model->get_content();
	$this->load->view('admin/repeats_manage',$data);					
	
	
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