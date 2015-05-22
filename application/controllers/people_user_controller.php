<?php
 
class People_user_controller extends CI_Controller {

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
	$this->load->model('people_user_model');
	$data['listing_data']=$this->people_user_model->people_administrator_listing();
	$data['audience_data']=$this->people_user_model->people_audience_listing();
	$data['timezone_data']=$this->people_user_model->people_timezone_listing();
	$this->load->view('admin/people_users_view',$data);	
	}
	public function all_administrator()
	{
		$this->load->model('people_user_model');		
		$data['listing_data']=$this->people_user_model->administrator_all();
		$data['audience_data']=$this->people_user_model->people_audience_listing();
		$data['timezone_data']=$this->people_user_model->people_timezone_listing();
		$data['roles']=1;
		$this->load->view('admin/people_users_view',$data);	
	}
	
	public function all_editor()
	{
		$this->load->model('people_user_model');		
		$data['listing_data']=$this->people_user_model->editor_all();
		$data['audience_data']=$this->people_user_model->people_audience_listing();
		$data['timezone_data']=$this->people_user_model->people_timezone_listing();
		$data['roles']=2;
		$this->load->view('admin/people_users_view',$data);	
	}
	
	public function all_member()
	{
		$this->load->model('people_user_model');		
		$data['listing_data']=$this->people_user_model->member_all();
		$data['audience_data']=$this->people_user_model->people_audience_listing();
		$data['timezone_data']=$this->people_user_model->people_timezone_listing();
		$data['roles']=3;
		$this->load->view('admin/people_users_view',$data);	
	}
	
	public function people_administrator()
	{
	
		$this->load->model('people_user_model');		
		$data['listing_data']=$this->people_user_model->people_administrator_listing();
		$data['timezone_data']=$this->people_user_model->people_timezone_listing();
		
		$data['audience_data']=$this->people_user_model->people_audience_listing();	
		$this->load->view('admin/people_users_view',$data);			
		
	}
	
	public function people_editor()
	{
	
		$this->load->model('people_user_model');		
		$data['listing_data']=$this->people_user_model->people_editor_listing();
		$data['audience_data']=$this->people_user_model->people_audience_listing();
		$data['timezone_data']=$this->people_user_model->people_timezone_listing();		
		$this->load->view('admin/people_users_view',$data);			
		
	}
	public function poeple_search()
	{
		$this->load->model('people_user_model');		
		$data['listing_data']=$this->people_user_model->search_poeple();
		
		$data['audience_data']=$this->people_user_model->people_audience_listing();
		$data['search_var']=$this->input->post('selected_value');
		$data['timezone_data']=$this->people_user_model->people_timezone_listing();
		$role_id=1;
		$search_in=$this->input->post('hidden_val_people');
		if($search_in=='administrator')
		{
			$role_id=1;
		}
		if($search_in=='editor')
		{
			$role_id=2;
		}
		if($search_in=='member')
		{
			$role_id=3;
		}
		if($this->input->post('txt_search')!=''){
		$data['search_field_value']=$this->input->post('txt_search');
		
		}
		$data['roles']=$role_id;
		$this->load->view('admin/people_users_view',$data);
		
	}
	
	public function people_member()
	{
	
		$this->load->model('people_user_model');		
		$data['listing_data']=$this->people_user_model->people_member_listing();
		$data['audience_data']=$this->people_user_model->people_audience_listing();
		$data['timezone_data']=$this->people_user_model->people_timezone_listing();		
		$this->load->view('admin/people_users_view',$data);			
		
	}
	
	public function people_me()
	{
		$this->load->model('people_user_model');		
		$data['listing_data']=$this->people_user_model->people_me_list();	
		$data['audience_data']=$this->people_user_model->people_audience_listing();
		$data['timezone_data']=$this->people_user_model->people_timezone_listing();
		$this->load->view('admin/people_users_view',$data);			
		
	}
	
	

    public function edit_people_administrator(){

	  	$this->load->model('people_user_model');		
		$data['query']=$this->people_user_model->selectone_people_administrator();
		$data['audiencedata']=$this->people_user_model->checked_audience();
		$data['listing_data']=$this->people_user_model->people_administrator_listing();
		$data['audi']=$this->people_user_model->select_audience();
		$data['timezone_data']=$this->people_user_model->people_timezone_listing();
		$data['audience_data']=$this->people_user_model->people_audience_listing();	
		$this->load->view('admin/people_users_view',$data);	
	}
	
	public function edit_people_editor()
	{

	  	$this->load->model('people_user_model');		
		$data['query']=$this->people_user_model->selectone_people_editor();
		$data['audiencedata']=$this->people_user_model->checked_audience();
		$data['listing_data']=$this->people_user_model->people_editor_listing();
		$data['timezone_data']=$this->people_user_model->people_timezone_listing();
		$data['audi']=$this->people_user_model->select_audience();
		$data['audience_data']=$this->people_user_model->people_audience_listing();			
		$this->load->view('admin/people_users_view',$data);	
	}
	
	public function edit_people_member()
	{

	  	$this->load->model('people_user_model');		
		$data['audiencedata']=$this->people_user_model->checked_audience();
		$data['query']=$this->people_user_model->selectone_people_member();
		$data['audi']=$this->people_user_model->select_audience();
		$data['timezone_data']=$this->people_user_model->people_timezone_listing();
		$data['listing_data']=$this->people_user_model->people_member_listing();
		$data['audience_data']=$this->people_user_model->people_audience_listing();			
		$this->load->view('admin/people_users_view',$data);	
	}
	
	public function edit_people_me()
	{

	  	$this->load->model('people_user_model');		
		$data['query']=$this->people_user_model->select_me();
		$data['timezone_data']=$this->people_user_model->people_timezone_listing();
		$data['listing_data']=$this->people_user_model->people_me_list();
		$data['audience_data']=$this->people_user_model->people_audience_listing();	
		$data['audiencedata']=$this->people_user_model->checked_audience();
		$this->load->view('admin/people_users_view',$data);	
	}
	


	public function people_add()
	{
		
		$role_id=$this->input->post('user_role');
		
	  	$this->load->model('people_user_model');
		if(isset($_FILES["poeple_image"]["name"]) && $_FILES["poeple_image"]["name"]!='')
		{
			$file_name= $_FILES["poeple_image"]["name"];
			$this->people_user_model->do_upload($file_name);
		}			
		$data['query']=$this->people_user_model->people_add_administrator();
		$data['updated_id']=$data['query'];
		if($data['query']=='User Already Exist'){
		$data['error']=$data['query'];
		}
		if($this->uri->segment('3')=='anew'){
			$role_id=1;
			}
			if($this->uri->segment('3')=='enew'){
				$role_id=2;
			}
			if($this->uri->segment('3')=='mnew'){
				$role_id=3;
			}
		if($this->input->post('people_values')=='people_me'){
		$data['listing_data']=$this->people_user_model->people_me_list();
		$data['timezone_data']=$this->people_user_model->people_timezone_listing();
		$data['me']='people_me';
		$data['roles']=$role_id;
		}else{
		$data['listing_data']=$this->people_user_model->people_administrator_listing();
		$data['roles']=$role_id;
		}
			
			
			if($this->uri->segment('3')!='anew' || $this->uri->segment('3')!='enew' || $this->uri->segment('3')!='mnew'){
			$role_id=$this->input->post('user_role');
			}
			
		$edit_idd=$this->input->post('hiddenid');
		if($edit_idd!=''){
		if($data['roles']=='1')
		{
		$data['query']=$this->people_user_model->selectone_people_administrator();
		$data['edit_data']='edited';	
		}
		
		if($data['roles']=='2')
		{
		$data['query']=$this->people_user_model->selectone_people_editor();	
		$data['edit_data']='edited';
		}
		
		if($data['roles']=='3')
		{
		$data['query']=$this->people_user_model->selectone_people_member();
		$data['edit_data']='edited';	
		}
		
		
		}
			
		$data['audiencedata']=$this->people_user_model->checked_audience();
		$data['audience_data']=$this->people_user_model->people_audience_listing();		
		
			$this->load->view('admin/people_users_view',$data);
			
		
	
		
								
	}
	
	 public function people_administrator_delete()
	 {
	  $this->load->model('people_user_model');  
	  $data['query']=$this->people_user_model->delete_administrator();
	  $data['audience_data']=$this->people_user_model->people_audience_listing();
	  $data['listing_data']=$this->people_user_model->people_administrator_listing();
	  //$this->load->view('admin/people_users_view',$data);      
	  redirect('people_user_controller/people_administrator');
	 }
	 
	 public function upload_images(){
	$this->load->model('people_user_model');
	$formats = array("jpg", "png", "gif", "bmp", "jpeg", "PNG", "JPG", "JPEG", "GIF", "BMP");
		if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
		$file_name= $_FILES["poeple_image"]["name"];
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
			
			
		 if (!$this->upload->do_upload('poeple_image'))
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
	
}