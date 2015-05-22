<?php
class Designs extends CI_Controller {

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
		$this->load->model('design');
		$data['collection_listing']=$this->design->design_listing();
		$data['listing_data']=$this->design->design_listing();
		$data['allcollection']=$this->design->get_collection();
		$data['design_type']=$this->design->design_type();
		$this->load->view('admin/designs',$data);			;
	}
	public function design()
	{
		$this->load->model('design');
		$data['listing_data']=$this->design->design_listing();
		$data['design_type']=$this->design->design_type();
		$data['allcollection']=$this->design->get_collection();	
		$this->load->view('admin/designs',$data);			
	}
	public function add_design()
	{		
		$this->load->model('design');
		if(isset($_FILES["design_image"]["name"]) && $_FILES["design_image"]["name"]!='')
		{		
			$file_name= $_FILES["design_image"]["name"];
			$this->design->do_upload($file_name);
		}
		$data['query']=$this->design->design_add();
		$data['listing_data']=$this->design->design_listing();
		$data['collectionaccount']=$this->design->select_design_collection();
		$data['design_type']=$this->design->design_type();
		$data['allcollection']=$this->design->get_collection();
		$design_id=$data['query'][0]->design_id;
		redirect('designs/design_setting/'.$design_id);
		//$this->load->view('admin/designs',$data);							
	}	
	public function design_delete()
	{
		$this->load->model('design');		
		$data['allcollection']=$this->design->get_collection();	
		$data['query']=$this->design->delete_design();
		$data['listing_data']=$this->design->design_listing();
		$data['design_type']=$this->design->design_type();
		redirect('designs');
		//$this->load->view('admin/designs',$data);						
	}

	public function design_search()
	{
		$this->load->model('design');		
		$data['search_var']=$this->input->post('selected_value');
		$data['listing_data']=$this->design->search_design();
		$data['allcollection']=$this->design->get_collection();
		if($this->input->post('input_value')!=''){
		$data['design_type']=$this->design->design_type();
		$data['search_field_value']=$this->input->post('input_value');
		}
		$this->load->view('admin/designs',$data);							
	}
	public function all_design()
	{
		$this->load->model('design');		
		$data['listing_data']=$this->design->design_all();
		$data['allcollection']=$this->design->get_collection();
		$data['design_type']=$this->design->design_type();
		$this->load->view('admin/designs',$data);							
	}
	public function design_setting()
	{
		$this->load->model('design');		
		$data['allcollection']=$this->design->get_collection();
		$data['design_type']=$this->design->design_type();
		$data['query']=$this->design->select_design();
		$data['collectiondesign']=$this->design->select_design_collection();
		$data['listing_data']=$this->design->design_listing();
		$data['editaccount']=$this->design->selectone_design();
		$data['web_pages_used_design']=$this->design->web_page_using_designs();
		
		$this->load->view('admin/designs',$data);						
	}
	public function manage_design()
	{
		$this->load->model('design');		
		$data['listing_data']=$this->design->design_manage_listing();
		$data['version_data']=$this->design->version_listing();
		$data['data_account']=$this->design->select_account_data();
		$data['data_owner']=$this->design->select_owner_data();
		//echo '<textarea>';print_r($data['data_owner']);echo '</textarea>';exit;
		$data['design_type']=$this->design->design_type();
		$data['query']=$this->design->select_design();
		$html = '';
		$css = '';
		$script = '';
		$html_data_content = '';
		$css_data_content = '';
		$script_data_content = '';
		$design_data_id = '';
		
		$design_id = $this->uri->segment(3);
		
		
		$query_design_data="select * from design_data where design_id='".$design_id."' and set_default = 1";
		$query=$this->db->query($query_design_data);
		$rowcount = $query->num_rows();
		if($rowcount == 0){
		$query_design_data="select * from design_data where design_id='".$design_id."'";
		$query=$this->db->query($query_design_data);	
		$rowcount = $query->num_rows();	
		}
		/*$this->db->select('design_data.version,design_data.contents');    
		$this->db->from('design_data');
		$this->db->where('design_data.design_id',$design_id);		
		$query=$this->db->get();*/
		//echo $this->db->last_query();exit;
			
		if($rowcount>0){
		$rs_row = $query->result();
		//echo '<textarea>';print_r($rs_row);echo '</textarea>';
		
		
		if(isset($rs_row[0]->version)){
			
			if($rs_row[0]->content_type == 'html'){
			$html = $rs_row[0]->version;
			$html_data_content = $rs_row[0]->contents;
			$design_data_id = $rs_row[0]->design_data_id;
			}
			
			if($rs_row[0]->content_type == 'css'){
			$css = $rs_row[0]->version;
			$css_data_content = $rs_row[0]->contents;
			}
			
			if($rs_row[0]->content_type == 'script'){
			$script = $rs_row[0]->version;
			$script_data_content = $rs_row[0]->contents;
			}
		
		}
		if(isset($rs_row[1]->version)){
			if($rs_row[1]->content_type == 'html'){
			$html = $rs_row[1]->version;
			$html_data_content = $rs_row[1]->contents;
			$design_data_id = $rs_row[1]->design_data_id;
			}
			
			if($rs_row[1]->content_type == 'css'){
			$css = $rs_row[1]->version;
			$css_data_content = $rs_row[1]->contents;
			}
			
			if($rs_row[1]->content_type == 'script'){
			$script = $rs_row[1]->version;
			$script_data_content = $rs_row[1]->contents;
			}
		}
		if(isset($rs_row[2]->version)){
			if($rs_row[2]->content_type == 'html'){
			$html = $rs_row[2]->version;
			$html_data_content = $rs_row[2]->contents;
			$design_data_id = $rs_row[2]->design_data_id;
			}
			
			if($rs_row[2]->content_type == 'css'){
			$css = $rs_row[2]->version;
			$css_data_content = $rs_row[2]->contents;
			}
			
			if($rs_row[2]->content_type == 'script'){
			$script = $rs_row[2]->version;
			$script_data_content = $rs_row[2]->contents;
			}
			}
		}
		
		
		/*$query_design_data_all = "select * from design_data where design_id='".$design_id."' order by design_data_id desc";
		$query=$this->db->query($query_design_data_all);
		$rowcount = $query->num_rows();		
		if($rowcount>0){
		$rs_row = $query->result();
		//echo '<textarea>';print_r($rs_row);echo '</textarea>';

			if($rs_row[0]->content_type == 'html'){
			$html = $rs_row[0]->version;
			$html_data_content = $rs_row[0]->contents;
			$design_data_id = $rs_row[0]->design_data_id;
			}
			
			if($rs_row[0]->content_type == 'css'){
			$css = $rs_row[0]->version;
			$css_data_content = $rs_row[0]->contents;
			}
			
			if($rs_row[0]->content_type == 'script'){
			$script = $rs_row[0]->version;
			$script_data_content = $rs_row[0]->contents;
			}
		
			if($rs_row[1]->content_type == 'html'){
			$html = $rs_row[1]->version;
			$html_data_content = $rs_row[1]->contents;
			$design_data_id = $rs_row[1]->design_data_id;
			}
			
			if($rs_row[1]->content_type == 'css'){
			$css = $rs_row[1]->version;
			$css_data_content = $rs_row[1]->contents;
			}
			
			if($rs_row[1]->content_type == 'script'){
			$script = $rs_row[1]->version;
			$script_data_content = $rs_row[1]->contents;
			}
	
			if($rs_row[2]->content_type == 'html'){
			$html = $rs_row[2]->version;
			$html_data_content = $rs_row[2]->contents;
			$design_data_id = $rs_row[2]->design_data_id;
			}
			
			if($rs_row[2]->content_type == 'css'){
			$css = $rs_row[2]->version;
			$css_data_content = $rs_row[2]->contents;
			}
			
			if($rs_row[2]->content_type == 'script'){
			$script = $rs_row[2]->version;
			$script_data_content = $rs_row[2]->contents;
			}
		}*/
		
		$data['html_source']= $html;
		$data['css_source']= $css;
		$data['script_source']= $script;
		
		$data['html_data']= $html_data_content;
		$data['css_data']= $css_data_content;
		$data['script_data']= $script_data_content;
		$data['design_data_id']= $design_data_id;
		
		$this->load->view('admin/design_manage',$data);							
	}	
	public function save_design()
	{	
		$this->load->model('design');
		$data['version_data']=$this->design->version_listing();
		$data['design_type']=$this->design->design_type();
		$data['query']=$this->design->design_save();
		
		$html=$this->input->post('lst_html_version');
		$css=$this->input->post('lst_css_version');
		$script=$this->input->post('lst_script_version');
		
		$html_exp = explode('||',$html);
		$css_exp = explode('||',$css);
		$script_exp = explode('||',$script);
		
		$data['html_source']='version '.$html_exp[0];
		$data['css_source']='version '.$css_exp[0];
		$data['script_source']='version '.$script_exp[0];
		$design_id=$data['query'];
		redirect('designs/manage_design/'.$design_id);
		//$this->load->view('admin/design_manage',$data);							
	}	
	public function save_source()
	{		
		$this->load->model('design');
		$data['version_data']=$this->design->version_listing();
		$data['query']=$this->design->design_save();
		$data['listing_data']=$this->design->design_listing();
		$data['design_type']=$this->design->design_type();
		$this->load->view('admin/design_manage',$data);							
	}
	public function edit_source()
	{		
		$this->load->model('design');
		$data['listing_data']=$this->design->source_edit_save();
		$data['version_data']=$this->design->version_listing();
		$data['query']=$this->design->design_save();
		$data['design_type']=$this->design->design_type();
		$design_id=$data['listing_data'];
		redirect('designs/manage_design/'.$design_id);
		//$this->load->view('admin/design_manage',$data);							
	}	
	public function select_source()
	{		
		$this->load->model('design');
		$data['design_type']=$this->design->design_type();
		
		$current_id=$this->input->post('option');
		$update_id=explode("||",$current_id);
	    
		$return_data='';
		$query = $this->db->get_where('design_data', array('design_data_id' => $update_id[0]));
		
		if($query->num_rows()>0){
		$result=$query->result();
		$return_data=$result[0]->contents;
		$return_data.='<><>'.$update_id[0];
		$return_data.='<><>'.$update_id[1];
		}
		echo $return_data;
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
		$file_name= $_FILES["design_image"]["name"];
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

