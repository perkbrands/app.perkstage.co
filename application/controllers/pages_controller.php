<?php
class Pages_controller extends CI_Controller {

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
		$this->load->model('pages_model');
		$data['title'] = 'Perk CMS';	
		//$data['pages_listing']=$this->pages_model->page_listing();
		$data['listing_data']=$this->pages_model->page_listing();
		$data['allaccount']=$this->pages_model->get_account();
		$data['allwebsites']=$this->pages_model->get_website();
		$data['active_site']=$this->pages_model->select_active_website();
		$data['listing_design']=$this->pages_model->design_listing();			
		$this->load->view('admin/pages',$data);			
		
		/*if($this->session->userdata('is_logged_in'))
		{
			//$this->session->userdata('is_logged_in')=$hsjfhsd;
			redirect('admin/dashboard');
        }else{
			
        	$this->load->view('admin/login');	
        }
*/
	}
	function get_pages(){
		$this->load->model('pages_model');
		$data['listing_data']=$this->pages_model->page_listing();
		
		
		foreach($data['listing_data'] as $row){
		echo "<li id='pages_id_".$row->page_id."' onclick='set_url_page(".$row->page_id.")'" .' ';
             	echo ">
                                     
                <div class='pill' style='background-image: url(".base_url()."assets/img/pages_img/$row->page_profile_image)'";
				echo " >&nbsp;</div>                       
                <p class='label'>$row->page_profile_title</p>";
                   if($row->page_status==1) {
                  	 echo "<div class='status statusGreen'></div>";
                   }
					else
					{
                   	  echo "<div class='status statusRed'></div>";
                     }
                    echo "</li>";
					
					/*<li <?php if($row->page_id==$this->uri->segment(3) || (isset($updated_id) && $updated_id==$row->page_id)) {?> class="selected" <?php } ?>>
                                     
                                    <div class="pill" <?php if($row->page_profile_image!=''){ ?>style="background-image: url('<?php echo base_url(); ?>assets/img/pages_img/<?php echo $row->page_profile_image; ?>');"<?php }else{?>style="background-image: url('<?php echo base_url(); ?>assets/img/admin/apple.jpg');"<?php } ?>>&nbsp;</div>
                                    <p class="label"><?php echo $row->page_profile_title;?></p>
                                    <p class="options">
                                    <span id="setting_id"><?php echo "<a  href=".base_url()."pages_controller/page_setting/$row->page_id>Settings</a>";?></span>
                                    </p>
									<?php if($row->page_status==1) {?>
                                   <div class="status statusGreen"></div>
                                   <?php } else
								   { ?>
                                   <div class="status statusRed"></div>
                                  <?php } ?>
										
                                </li>*/
		
					
		}
					
		 		/*echo "<li" .' '; 
				echo "class='add_design'  id='add_design_list'"; echo "value=$row->design_id  onclick='add_design_list()'"; 
             	echo ">
                                     
                <div class='pill' style='background-image: url(".base_url()."assets/img/design/$row->design_profile_image)'";
				echo " >&nbsp;</div>                       
                <p class='label'>$row->design_title</p>
                 <p class='options' id='add_design_id' onclick='message_add($row->design_id)'>
									
					<span class='option'> Add this Design </span> </p>";
                   if($row->design_status==1) {
                  	 echo "<div class='status statusGreen'></div>";
                   }
					else
					{
                   	  echo "<div class='status statusRed'></div>";
                     }
                    echo "</li>";*/
                    
		
		 /*echo $html_page="<li class='selected'>
                                        <div class='pill' style='background-image: url('http://childrensharbor.com/img/story-graycen-bond.jpg');'>&nbsp;</div>
                                        <p class='label'>Children's Harbor</p>
                                        <div class='status statusGreen'></div>
                                    </li>";*/
	}
	function selected_website(){
	 $this->load->model('pages_model');
	
	 $data['listing_data']=$this->pages_model->page_listing();
	 $data['allaccount']=$this->pages_model->get_account();
	 $data['listing_design']=$this->pages_model->design_listing();
	 $data['allwebsites']=$this->pages_model->get_website();
	 $data['id_web']=$this->uri->segment(3);
	 $data['active_site']=$this->pages_model->select_active_website();			
	 $this->load->view('admin/pages',$data);	
		
	}
	/*public function audience_login()
	{
		$this->load->view('templates/admin/header');
		$this->load->model('pages_model');
		$returndata=$this->pages_model->login_audience();
		if($returndata=='success' || $this->session->userdata('login_success')=='success')
		{			
			$data['audience_listing']=$this->pages_model->audience_listing();
			$data['listing_data']=$this->pages_model->audience_listing();
			$data['allaccount']=$this->pages_model->get_account();			
			$this->load->view('admin/audience',$data);			
		}
		else
		{	
		$this->load->view('templates/admin/header');		
			$this->load->view('admin/login');					

		}
	}
*/
	public function pages_conroller()
	{
		$this->load->model('pages_model');
	
			$data['page_listing']=$this->pages_model->page_listing();
			$data['listing_data']=$this->pages_model->page_listing();
			$data['allaccount']=$this->pages_model->get_account();	
			$data['allwebsites']=$this->pages_model->get_website();
			$data['listing_design']=$this->pages_model->design_listing();
			$data['active_site']=$this->pages_model->select_active_website();		
			$this->load->view('admin/pages',$data);			
			
	}


	public function page_add()
	{		

		$this->load->model('pages_model');
		if(isset($_FILES["page_image"]["name"]) && $_FILES["page_image"]["name"]!='')
		{		
			$file_name= $_FILES["page_image"]["name"];
			$this->pages_model->do_upload($file_name);
		}
		
		$data['query']=$this->pages_model->add_page();
		
		$data['listing_data']=$this->pages_model->page_listing();
		$data['pagewebsite']=$this->pages_model->select_page_website();		
		$data['allaccount']=$this->pages_model->get_account();
		$data['allwebsites']=$this->pages_model->get_website();
		$data['pageaccount']=$this->pages_model->select_page_account();
		$data['listing_design']=$this->pages_model->design_listing();
		$edit_idd=$this->input->post('hiddenid');
		
		$data['updated_id']=$edit_idd;
		if($edit_idd!='' && $edit_idd!='new' && $data['query']!='Title Already Exist'){
		$data['edit_data']='edited';
		$data['query']=$this->pages_model->selectone_page();
		
		}
		
		if($data['query']=='Title Already Exist'){
		$data['error']=$data['query'];
		$this->load->view('admin/pages',$data);
		}


		
		if($edit_idd!='new' && $edit_idd!=''){
			$page_id = $edit_idd;
		}else{
			$page_id=$data['query'][0]->page_id;
		}
		
		redirect('pages_controller/page_setting/'.$page_id);							
	}	
	public function page_profile()
	{
		$this->load->model('pages_model');		
		$data['query']=$this->pages_model->profile_page();
		$data['listing_data']=$this->pages_model->page_listing();		
		$data['allaccount']=$this->pages_model->get_account();
		$data['allwebsites']=$this->pages_model->get_website();
		$data['listing_design']=$this->pages_model->design_listing();			
		$this->load->view('admin/pages',$data);							
	}	
	public function page_delete()
	{
		$this->load->model('pages_model');		
		$data['query']=$this->pages_model->delete_page();
		$data['listing_data']=$this->pages_model->page_listing();
		$data['listing_design']=$this->pages_model->design_listing();		
		redirect('pages_controller');
		//$this->load->view('admin/pages',$data);						
	}

	public function select_repeat_content(){
		$this->load->model('pages_model');
		echo $data['getdata']=$this->pages_model->single_repeate_record();
	}

	public function page_search()
	{
		$this->load->model('pages_model');		
		//$data['query']=$this->pages_model->search_audience();
		$data['search_var']=$this->input->post('selected_value');
		if($data['search_var']==''){
		$data['search_var'] = $this->input->post('lst_filter');
		}
		$data['listing_data']=$this->pages_model->search_page();
		$data['active_site']=$this->pages_model->select_active_website();		
		$data['allaccount']=$this->pages_model->get_account();
		$data['listing_design']=$this->pages_model->design_listing();
		if($this->input->post('txt_search')!=''){
		$data['search_field_value']=$this->input->post('txt_search');
		}			
		$this->load->view('admin/pages',$data);							
	}
	
	public function page_ajax_search()
	{
		$this->load->model('pages_model');		
		//$data['query']=$this->pages_model->search_audience();
		$data['search_var']=$this->input->post('selected_value');
		if($data['search_var']==''){
		$data['search_var'] = $this->input->post('txt_search');
		}
		$data['listing_data']=$this->pages_model->search_page();
		
		foreach($data['listing_data'] as $row){
		echo "<li id='pages_id_".$row->page_id."' onclick='set_url_page(".$row->page_id.")'" .' ';
             	echo ">
                                     
                <div class='pill' style='background-image: url(".base_url()."assets/img/pages_img/$row->page_profile_image)'";
				echo " >&nbsp;</div>                       
                <p class='label'>$row->page_profile_title</p>";
                   if($row->page_status==1) {
                  	 echo "<div class='status statusGreen'></div>";
                   }
					else
					{
                   	  echo "<div class='status statusRed'></div>";
                     }
                    echo "</li>";
		}
		
		$data['active_site']=$this->pages_model->select_active_website();		
		$data['allaccount']=$this->pages_model->get_account();
		$data['listing_design']=$this->pages_model->design_listing();
		if($this->input->post('txt_search')!=''){
		$data['search_field_value']=$this->input->post('txt_search');
		}			
		//$this->load->view('admin/pages',$data);							
	}
	
	public function all_pages()
	{
		$this->load->model('pages_model');		
		//$data['query']=$this->audience->search_audience();
		$data['listing_data']=$this->pages_model->page_all();
		
		$data['allaccount']=$this->pages_model->get_account();
		$data['active_site']=$this->pages_model->select_active_website();
		$data['allwebsites']=$this->pages_model->get_website();
		$data['listing_design']=$this->pages_model->design_listing();			
		$this->load->view('admin/pages',$data);							
	}
	
	public function all_pages_ajax()
	{
		$this->load->model('pages_model');		
		//$data['query']=$this->audience->search_audience();
		$data['listing_data']=$this->pages_model->page_all();
		
		foreach($data['listing_data'] as $row){
		echo "<li id='pages_id_".$row->page_id."' onclick='set_url_page(".$row->page_id.")'" .' ';
             	echo ">
                                     
                <div class='pill' style='background-image: url(".base_url()."assets/img/pages_img/$row->page_profile_image)'";
				echo " >&nbsp;</div>                       
                <p class='label'>$row->page_profile_title</p>";
                   if($row->page_status==1) {
                  	 echo "<div class='status statusGreen'></div>";
                   }
					else
					{
                   	  echo "<div class='status statusRed'></div>";
                     }
                    echo "</li>";
		}
		
		$data['allaccount']=$this->pages_model->get_account();
		$data['active_site']=$this->pages_model->select_active_website();
		$data['allwebsites']=$this->pages_model->get_website();
		$data['listing_design']=$this->pages_model->design_listing();			
		
	}
	
	public function page_setting()
	{
		$this->load->model('pages_model');		
		$data['query']=$this->pages_model->selectone_page();
		$data['listing_data']=$this->pages_model->page_listing();
		$data['editaccount']=$this->pages_model->selectone_account();
		$data['pageaccount']=$this->pages_model->select_page_account();
		$data['pagewebsite']=$this->pages_model->select_page_website();		
		$data['allaccount']=$this->pages_model->get_account();
		$data['allwebsites']=$this->pages_model->get_website();
		$data['active_site']=$this->pages_model->select_active_website();
		$data['listing_design']=$this->pages_model->design_listing();
		$data['one_design']=$this->pages_model->design_listing_setting();
		//echo '<pre>';print_r($data['one_design']);
		$this->load->view('admin/pages',$data);						
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
		$file_name= $_FILES["page_image"]["name"];
		//$this->people_user_model->do_upload($file_name);
		$config['upload_path'] = './temp_files/';
      	$config['allowed_types'] = 'gif|jpg|png';
		/*$config['max_size']    = '1000';
		$config['max_width']  = '1024';*/
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
	
	
	public function manage_page()
	{
		$this->load->model('pages_model');		
		$this->load->library('ckeditor',base_url() . 'assets/ckeditor/');
        $this->ckeditor->basePath = base_url(). 'assets/ckeditor/';
		$current_page_id=$this->uri->segment(3);;
		
		$this->db->select('design_data.*');    
		$this->db->from('design_data');
		$this->db->where('pages_design.page_id',$current_page_id);
		$this->db->join('pages_design','pages_design.design_id=design_data.design_id','INNER');
		
		$query = $this->db->get();
		
		$check_rows = $query->num_rows();
		$design_id='';
		if($check_rows > 0){
		$rs=$query->result();
		$design_id = $rs[0]->design_id;
		$data['content_data']='';
		if($data['content_data']!=''){
		$data['content_data']=$rs[0]->contents;
		}
		}
        /*$this->ckeditor->config['toolbar'] = array(
                array( 'Source', '-', 'Bold', 'Italic', 'Underline', '-','Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo','-','NumberedList','BulletedList'                                       );*/
		$this->ckeditor->config['toolbar'] = array(
                array('Bold', 'Italic','Underline','Strike','paragraph','Format','JustifyBlock','JustifyLeft','JustifyCenter','JustifyRight','Indent','NumberedList', 'BulletedList','RemoveFormat','Subscript','Superscript','Undo'));	
				
		//$this->ckeditor->config['toolbar'] = array(array());
		$data['query']=$this->pages_model->get_content();
		$data['active_site']=$this->pages_model->select_active_website();
		/*if(empty($data['query'])){
		
			$query_design="select * from design_data where design_id='".$design_id."'";
			echo $query_design;exit;
		$res=$this->db->query($query_design);
	    $this->db->last_query();exit;
		$res_query=$res->result();	
		
		echo '<textarea>';print_r($res_query);echo '</textarea>';	
		}*/
		$this->load->view('admin/pages_manage',$data);							
	}	
 
 	public function update(){
	//$edit_id=$this->input->post('page_id');
	$this->load->model('pages_model');
	$data['query']=$this->pages_model->update_content();
	$data['id_edit']=$this->input->post('page_id');
	$this->load->library('ckeditor',base_url() . 'assets/ckeditor/');
    $this->ckeditor->basePath = base_url(). 'assets/ckeditor/';
    $this->ckeditor->config['toolbar'] = array(array());
	$data['query']=$this->pages_model->get_content();
	redirect('pages_controller/manage_page/'.$data['id_edit']);
	//$this->load->view('admin/pages_manage',$data);					
	
	
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