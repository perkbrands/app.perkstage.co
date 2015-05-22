<?php
class Website_file_controller extends CI_Controller {
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
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!='')
		{
			$current_account_id=$this->session->userdata('current_account_id');
		}else
		{
			$current_account_id=$this->session->userdata('account_id');
		}
		$file_name="submission_".$current_account_id."_files";
		if(is_dir("website_file_submission/$file_name")){
		}
		else 
		{
			mkdir ("website_file_submission/$file_name");
		}
		$this->load->model('website_file_model');
		$data['file_listing']=$this->website_file_model->file_listing();
		$data['listing_data']=$this->website_file_model->file_listing();
		$this->load->view('admin/website_files',$data);			
	}
	
	public function website_file()
	{
		$this->load->model('website_file_model');
		$data['listing_data']=$this->website_file_model->file_listing();
		$this->load->view('admin/website_files',$data);		
							

	}
	
	function get_images(){
		$this->load->model('website_file_model');
		$data['listing_data']=$this->website_file_model->file_listing_ajax();
		
		
		foreach($data['listing_data'] as $row){
		$id_file = $row->website_file_id;
		$file_path = $row->file_profile_path;
		echo '<li id="images_id_'.$row->website_file_id.'" onclick=set_url_image("'.$id_file.'","'.$file_path.'")' ." ";
             	echo ">
                                     
                <div class='pill' style='background-image: url(".$row->file_profile_path.")'";
				echo " >&nbsp;</div>                       
                <p class='label'>$row->file_profile_title</p>";
                   if($row->file_status==1) {
                  	 echo "<div class='status statusGreen'></div>";
                   }
					else
					{
                   	  echo "<div class='status statusRed'></div>";
                     }
                    echo "</li>";
	
		}
	}
	
	
	function get_videos(){
		$this->load->model('website_file_model');
		$data['listing_data']=$this->website_file_model->video_listing_ajax();
		
		
		foreach($data['listing_data'] as $row){
		$id_file = $row->website_file_id;
		$file_path = $row->file_profile_path;
		$background_image=$row->file_profile_path;
		if($row->file_type=='video'){
		$background_image=base_url().'assets/img/admin/video-icon.png';	
		}
		
		echo '<li id="videos_id_'.$row->website_file_id.'" onclick=set_url_video("'.$id_file.'","'.$file_path.'")' ." ";
             	echo ">
                                    
                <div class='pill' style='background-image: url(".$background_image.")'";
				echo " >&nbsp;</div>                       
                <p class='label'>$row->file_profile_title</p>";
                   if($row->file_status==1) {
                  	 echo "<div class='status statusGreen'></div>";
                   }
					else
					{
                   	  echo "<div class='status statusRed'></div>";
                     }
                    echo "</li>";
	
		}
	}
	
	/*public function website_file_controller()
	{
		$this->load->model('website_file_model');
		$data['listing_data']=$this->website_file_model->file_listing();
		$this->load->view('admin/website_files',$data);			
	}*/
	public function add_file()
	{		
		$this->load->model('website_file_model');
		if(isset($_FILES["file_name"]["name"]) && $_FILES["file_name"]["name"]!='')
		{		
			$file_name= $_FILES["file_name"]["name"]; 
			$this->website_file_model->do_upload($file_name);
		}
		$data['query']=$this->website_file_model->file_add();
		$edit_idd=$this->input->post('hiddenid');
		$data['listing_data']=$this->website_file_model->file_listing();
		
		if($edit_idd=='' || $edit_idd=='new'){
			$website_file_id = $data['query'][0]->website_file_id;
		}else{
			$website_file_id = $edit_idd;
		}
		redirect('website_file_controller/website_file_setting/'.$website_file_id);
		//$this->load->view('admin/website_files',$data);							
	}	
		public function file_delete()
	{
		$this->load->model('website_file_model');		
		$data['query']=$this->website_file_model->delete_file();
		$data['listing_data']=$this->website_file_model->file_listing();
		redirect('website_file_controller');
		//$this->load->view('admin/website_files',$data);						
	}

	public function file_search()
	{
		$this->load->model('website_file_model');		
		$data['search_var']=$this->input->post('lst_filter');
		$data['listing_data']=$this->website_file_model->search_file();
		if($this->input->post('txt_search')!=''){
		$data['search_field_value']=$this->input->post('txt_search');
		}			
		$this->load->view('admin/website_files',$data);							
	}
	
	public function file_search_ajax()
	{
		$this->load->model('website_file_model');		
		//$data['search_var']=$this->input->post('lst_filter');
		$data['listing_data']=$this->website_file_model->search_file();
		foreach($data['listing_data'] as $row){
		$id_file = $row->website_file_id;
		$file_path = $row->file_profile_path;
		echo '<li id="images_id_'.$row->website_file_id.'" onclick=set_url_image("'.$id_file.'","'.$file_path.'")' ." ";
             	echo ">
                                     
                <div class='pill' style='background-image: url(".$row->file_profile_path.")'";
				echo " >&nbsp;</div>                       
                <p class='label'>$row->file_profile_title</p>";
                   if($row->file_status==1) {
                  	 echo "<div class='status statusGreen'></div>";
                   }
					else
					{
                   	  echo "<div class='status statusRed'></div>";
                     }
                    echo "</li>";
	
		}		
					
	}
	
	public function all_file()
	{
		$this->load->model('website_file_model');		
		$data['listing_data']=$this->website_file_model->file_all();
		$this->load->view('admin/website_files',$data);							
	}
	public function website_file_setting()
	{
		$this->load->model('website_file_model');	
		$data['query']=$this->website_file_model->selectone_file();
		$data['listing_data']=$this->website_file_model->file_listing();
		$data['editfile']=$this->website_file_model->selectone_file();
		$this->load->view('admin/website_files',$data);						
	}

    /**
    * encript the password 
    * @return mixed
    */	
    function __encrip_password($password) {
        return md5($password);
    }	

	 public function upload_images(){
	
	$this->load->model('people_user_model');
	$formats = array("mp4","3gp","wmv","jpg", "png", "gif", "bmp", "jpeg", "PNG", "JPG", "JPEG", "GIF", "BMP","docx","txt");
		if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
		$file_name= $_FILES["file_name"]["name"];
		$file_size= $_FILES["file_name"]["size"];
		$file_type= $_FILES["file_name"]["type"]; 
		
		$config['upload_path'] = './temp_files/';
      	$config['allowed_types'] = 'mp4|3gp|wmv|gif|jpg|png|docx|txt|pdf|application/pdf';
		$config['max_size']    = '1000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
        $config['remove_spaces']  = TRUE;
        $config['encrypt_name']  = FALSE;
		$config['file_name']  = $file_name;
        $this->load->library('upload', $config);
		$this->upload->initialize($config);	

		$file_path='temp_files';	
		//$file_path='assets/img/files';	
		 if (!$this->upload->do_upload('file_name'))
        {
        	echo 'error';
        }
        else
        {
		if($file_type=='image/jpeg'||$file_type=='image/jpg'||$file_type=='image/png'||$file_type=='image/JPEG'||$file_type=='image/GIF'||$file_type=='image/bmp')
		{
			$dimention_array=getimagesize(base_url().$file_path.'/'.$file_name);
			$dimention=$dimention_array[3];
		}
		 $file_path=base_url().$file_path.'/'.$file_name; 
		if($file_type=='image/jpeg'||$file_type=='image/jpg'||$file_type=='image/png'||$file_type=='image/JPEG'||$file_type=='image/GIF'||$file_type=='image/bmp')
			{
				$response_array="<img style='margin-left:10px;' width='100' height='100' src='".base_url()."temp_files/".$file_name."'>";
				$response_array.='|'.$file_path;
				$response_array.='|'.$file_size;
				$response_array.='|'.$file_type;
				$response_array.='|'.$dimention;
				print_r($response_array);
			}
			else if($file_type=='text/plain')
			{
				$response_array="<img style='margin-left:10px;' width='100' height='100' src='".base_url()."assets/img/admin/document.png'>";;
				$response_array.='|'.$file_path;
				$response_array.='|'.$file_size;
				print_r($response_array);
			}
			else if($file_type=='application/vnd.openxmlformats-officedocument.wordprocessingml.document')
			{
				$response_array="<img style='margin-left:10px;' width='100' height='100' src='".base_url()."assets/img/admin/document.png'>";;
				$response_array.='|'.$file_path;
				$response_array.='|'.$file_size;
				print_r($response_array);
			}
			else if($file_type=='application/pdf')
			{
				$response_array="<img style='margin-left:10px;' width='100' height='100' src='".base_url()."assets/img/admin/document.png'>";;
				$response_array.='|'.$file_path;
				$response_array.='|'.$file_size;
				print_r($response_array);
			}
		} 	
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