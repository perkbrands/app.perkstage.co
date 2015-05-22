<?php
class Layout_controller extends CI_Controller {

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
		$this->load->model('layout_model');
		//$data['design_listing']=$this->layout_model->design_listing();
		$data['listing_data']=$this->layout_model->layout_listing();
		$data['alldesign']=$this->layout_model->get_design();
		$this->load->view('admin/layout',$data);
	}
	public function layout()
	{
		$this->load->model('layout_model');
		$data['listing_data']=$this->layout_model->layout_listing();
		$data['allcollection']=$this->layout_model->get_design();
		$data['alldesign']=$this->layout_model->get_design();	
		$this->load->view('admin/layout',$data);					

	}

	public function add_layout()
	{		
		$this->load->model('layout_model');
		if(isset($_FILES["layout_image"]["name"]) && $_FILES["layout_image"]["name"]!='')
		{		
			$file_name= $_FILES["layout_image"]["name"];
			$this->layout_model->do_upload($file_name);
		}
		$data['query']=$this->layout_model->layout_add();
		$data['listing_data']=$this->layout_model->layout_listing();
		$data['designaccount']=$this->layout_model->select_design_layout();
		$data['alldesign']=$this->layout_model->get_design();
		if($data['query']=='Layout Title Already Exist'){
			$data['error']=$data['query'];
			$this->load->view('admin/layout',$data);
			return;
		}
		
		
		$layout_id=$this->uri->segment(3);
		if($layout_id=='' || $layout_id==0){
			$layout_id=$data['query'][0]->layout_id;
		}
		redirect('layout_controller/layout_setting/'.$layout_id);
		//echo '<textarea>';print_r($data['query']);echo '</textarea>';
		//echo '<textarea>';print_r($data['listing_data']);echo '</textarea>';exit;
		//$this->load->view('admin/layout',$data);							
	}
	public function select_source()
	{
		$this->load->model('design');
		$current_id=$this->input->post('option');
		$update_id=explode("_",$current_id);
		
		$query = $this->db->get_where('layout_data', array('layout_data_id'=>$update_id[0]));		
		$result=$query->result();
		$return_data=$result[0]->contents;
		$return_data.='|'.$update_id[0];
		$return_data.='|'.$update_id[1];
		echo $return_data;
	}			
	public function edit_source()
	{		
		$this->load->model('layout_model');
		$data['listing_data']=$this->layout_model->source_edit_save();
		$data['version_data']=$this->layout_model->version_listing();
		$data['query']=$this->layout_model->layout_save();
		$layout_id=$data['listing_data'];
		redirect('layout_controller/manage_layout/'.$layout_id);
		//$this->load->view('admin/layout_manage',$data);							
	}	
	
	public function layout_delete()
	{
		$this->load->model('layout_model');		
		$data['query']=$this->layout_model->delete_layout();
		$data['listing_data']=$this->layout_model->layout_listing();
		redirect('layout_controller');
		
		//$this->load->view('admin/layout',$data);						
	}
	
	public function save_layout()
	{		
		$this->load->model('layout_model');
		$data['version_data']=$this->layout_model->version_listing();
		$data['query']=$this->layout_model->layout_save();
		
		$html = $this->input->post('lst_html_version');
		$css = $this->input->post('lst_css_version');
		$script = $this->input->post('lst_script_version');
		
		$html_exp = explode('_',$html);
		$css_exp = explode('_',$css);
		$script_exp = explode('_',$script);
		
		$data['html_source']='version '.$html_exp[0];
		$data['css_source']='version '.$css_exp[0];
		$data['script_source']='version '.$script_exp[0];
		$layout_id = $data['query'];
		redirect('layout_controller/manage_layout/'.$layout_id);					
	}	

	public function layout_search()
	{
		$this->load->model('layout_model');		
		$data['search_var']=$this->input->post('selected_value');
		$data['listing_data']=$this->layout_model->search_layout();
		$data['alldesign']=$this->layout_model->get_design();
		if($this->input->post('input_value')!=''){
		$data['search_field_value']=$this->input->post('input_value');
		}
		$this->load->view('admin/layout',$data);							
	}
	public function all_layout()
	{
		$this->load->model('layout_model');		
		$data['listing_data']=$this->layout_model->layout_all();
		$data['alldesign']=$this->layout_model->get_design();
		$this->load->view('admin/layout',$data);							
	}
	public function layout_setting()
	{
		$this->load->model('layout_model');		
		$data['alldesign']=$this->layout_model->get_design();
		$data['query']=$this->layout_model->select_layout();
		$data['layoutdesign']=$this->layout_model->select_design_layout();
		$data['listing_data']=$this->layout_model->layout_listing();
		$data['editaccount']=$this->layout_model->selectone_layout();
		$this->load->view('admin/layout',$data);						
	}
	public function manage_layout()
	{
		$this->load->model('layout_model');		
		$data['version_data']=$this->layout_model->version_listing();
		$data['listing_data']=$this->layout_model->layout_manage_listing();
		$data['data_account']=$this->layout_model->select_account_data();
		$data['data_owner']=$this->layout_model->select_owner_data();
		$layout_id = $this->uri->segment(3);
		/////////////////for layout//////////////////////
		
		$this->db->select('layout.layout_title,layout.layout_id');    
		$this->db->from('layout');
		$this->db->where('layout.layout_id',$layout_id);		
		$query=$this->db->get();
		
		$data['title_row'] = $query->result();
		
		////////////////////////////////////////////////
		$html = '';
		$css = '';
		$script = '';
		
		$this->db->select('layout_data.version');    
		$this->db->from('layout_data');
		$this->db->where('layout_data.layout_id',$layout_id);		
		$query=$this->db->get();
		$rowcount = $query->num_rows();		
		if($rowcount>0){
		$rs_row = $query->result();
		$html = $rs_row[0]->version;
		$css = $rs_row[1]->version;
		$script = $rs_row[2]->version;
		}
		$data['html_source']= $html;
		$data['css_source']= $css;
		$data['script_source']= $script;
		$this->load->view('admin/layout_manage',$data);							
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
		$file_name= $_FILES["layout_image"]["name"];
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