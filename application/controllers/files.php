<?php
class Files extends CI_Controller {
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
		}
		else
		{
			$current_account_id=$this->session->userdata('account_id');
		}
		$file_name="submission_".$current_account_id."_files";
		if(is_dir("submission/$file_name")){
		}
		else 
		{
			mkdir ("submission/$file_name");
		}
		$this->load->model('file_model');
		$data['file_listing']=$this->file_model->file_listing();
		$data['listing_data']=$this->file_model->file_listing();
		$this->load->view('admin/files',$data);			
	}
	public function file()
	{
		$this->load->model('file_model');
		$data['listing_data']=$this->file_model->file_listing();
		$this->load->view('admin/files',$data);			
							

	}
	public function add_file()
	{		
		$this->load->model('file_model');
		if(isset($_FILES["file_name"]["name"]) && $_FILES["file_name"]["name"]!='')
		{		
			$file_name= $_FILES["file_name"]["name"]; 
			$this->file_model->do_upload($file_name);
		}
		$data['query']=$this->file_model->file_add();
		$data['listing_data']=$this->file_model->file_listing();
		
		$file_id=$this->uri->segment(3);
		if($file_id=='' || $file_id==0){
			$file_id=$data['query'][0]->file_id;
		}
		redirect('files/file_setting/'.$file_id);
		//$this->load->view('admin/files',$data);							
		
	}	
		public function file_delete()
	{
		$this->load->model('file_model');		
		$data['query']=$this->file_model->delete_file();
		$data['listing_data']=$this->file_model->file_listing();
		redirect('files');
		//$this->load->view('admin/files',$data);						
	}

	public function file_search()
	{
		$this->load->model('file_model');		
		$data['search_var']=$this->input->post('lst_filter');
		$data['listing_data']=$this->file_model->search_file();
		if($this->input->post('txt_search')!=''){
		$data['search_field_value']=$this->input->post('txt_search');
		}			
		$this->load->view('admin/files',$data);							
	}
	public function all_file()
	{
		$this->load->model('file_model');		
		$data['listing_data']=$this->file_model->file_all();
		$this->load->view('admin/files',$data);							
	}
	public function file_setting()
	{
		$this->load->model('file_model');	
		$data['query']=$this->file_model->selectone_file();
		$data['listing_data']=$this->file_model->file_listing();
		$data['editfile']=$this->file_model->selectone_file();
		$this->load->view('admin/files',$data);						
	}

    /**
    * encript the password 
    * @return mixed
    */	
    function __encrip_password($password) {
        return md5($password);
    }	

	 public function upload_images(){
	
	//echo $file_type= $_FILES["file_name"]["type"]; exit;
	
	$this->load->model('people_user_model');
	$formats = array("jpg", "png", "gif", "bmp", "jpeg", "PNG", "JPG", "JPEG", "GIF", "BMP","docx","txt","mp4","WebM","Ogg");
		if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
		$file_name= $_FILES["file_name"]["name"];
		$file_size= $_FILES["file_name"]["size"];
		$file_type= $_FILES["file_name"]["type"]; 
		
		$config['upload_path'] = './temp_files/';
      	$config['allowed_types'] ="*";// 'gif|jpg|png|docx|txt|pdf|application/pdf|video/mp4|mp4|Ogg|WebM';
		$config['max_size']    = '100000';
		$config['max_width']  = '10244';
		$config['max_height']  = '7684';
        $config['remove_spaces']  = TRUE;
        $config['encrypt_name']  = FALSE;
		$config['file_name']  = $file_name;
        $this->load->library('upload', $config);
		$this->upload->initialize($config);	

		$file_path='temp_files';
			$ac_id=$this->session->userdata('current_account_id');
			if($ac_id!='')
			{
				$current_account_id=$this->session->userdata('current_account_id');
			}else
			{
				$current_account_id=$this->session->userdata('account_id');
			}
			$file_save_path=base_url()."submission/submission_".$current_account_id."_files".$file_name;
			
		//$file_path='assets/img/files';	
		 if (!$this->upload->do_upload('file_name'))
        {
        	echo 'error';
        }
        else
        {
		if($file_type=='image/jpeg'||$file_type=='image/jpg'||$file_type=='image/png'||$file_type=='image/PNG'||$file_type=='image/JPEG'||$file_type=='image/GIF'||$file_type=='image/gif'||$file_type=='image/bmp')
		{
			$dimention_array=getimagesize(base_url().$file_path.'/'.$file_name);
			$dimention=$dimention_array[3];
		}
	
	
		if($file_type=='image/jpeg'||$file_type=='image/jpg'||$file_type=='image/png'||$file_type=='image/PNG'||$file_type=='image/JPEG'||$file_type=='image/GIF'||$file_type=='image/gif'||$file_type=='image/bmp')
			{
				$response_array="<img style='margin-left:10px;' width='100' height='100' src='".base_url()."temp_files/".$file_name."'>";
				$response_array.='|'.$file_save_path;
				$response_array.='|'.$file_size;
				$response_array.='|'.$file_type;
				$response_array.='|'.$dimention;
				$response_array.='|'.$file_save_path;
				print_r($response_array);
			}
			else if($file_type=='text/plain')
			{
				$response_array="<img style='margin-left:10px;' width='100' height='100' src='".base_url()."assets/img/admin/document.png'>";;
				$response_array.='|'.$file_save_path;
				$response_array.='|'.$file_size;
				print_r($response_array);
			}
			else if($file_type=='application/vnd.openxmlformats-officedocument.wordprocessingml.document')
			{
				$response_array="<img style='margin-left:10px;' width='100' height='100' src='".base_url()."assets/img/admin/document.png'>";;
				$response_array.='|'.$file_save_path;
				$response_array.='|'.$file_size;
				print_r($response_array);
			}
			else if($file_type=='application/pdf')
			{
				$response_array="<img style='margin-left:10px;' width='100' height='100' src='".base_url()."assets/img/admin/document.png'>";;
				$response_array.='|'.$file_save_path;
				$response_array.='|'.$file_size;
				print_r($response_array);
			}
			else if($file_type=='video/mp4'||$file_type=='video/WebM'||$file_type=='video/Ogg')
			{
				
				$response_array="<img style='margin-left:10px;' width='100' height='100' src='".base_url()."assets/img/admin/media.png'>";;
				$response_array.='|'.$file_save_path;
				$response_array.='|'.$file_size;
				$response_array.='|'.' ';
				$response_array.='|'.' ';
				$response_array.='|'.'video';
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