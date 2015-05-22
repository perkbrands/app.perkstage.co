<?php
class Connection_controller extends CI_Controller {

    /**
    * Check if the user is logged in, if he's not, 
    * send him to the login page
    * @return void
    */	
	public function show($id) 
	{
		$this->load->model('Connection_model');
		$news = $this->Connection_model->get_news($id);
		$data['title'] = $news['title'];
		$data['body'] = $news['body'];
		$this->load->view('admin/connection_view', $data);
	}
	public function show2($id) 
	{
		$this->load->model('Connection_model');
		$news = $this->Connection_model->get_news($id);
		$data['title'] = $news['title'];
		$data['body'] = $news['body'];
		$this->load->view('admin/connection_view', $data);
	}
	
	function index()
	{
		$this->load->model('Connection_model');
		$data['connection_listing']=$this->Connection_model->connection_listing();
		$data['listing_data']=$this->Connection_model->connection_listing();
		/*$data['allaccount']=$this->Connection_model->get_account();
		$data['allwebsites']=$this->Connection_model->get_website();*/			
		$this->load->view('admin/connection_view',$data);			
	}
	public function collection()
	{
		$this->load->model('Connection_model');
		$data['listing_data']=$this->Connection_model->connection_listing();
		$data['allaccount']=$this->Connection_model->get_account();	
		$data['allwebsites']=$this->Connection_model->get_website();		
		$this->load->view('admin/collections',$data);			
					
	}
	public function add_connection()
	{		
		$this->load->model('Connection_model');
		if(isset($_FILES["connection_profile_image"]["name"]) && $_FILES["connection_profile_image"]["name"]!='')
		{		
			$file_name= $_FILES["connection_profile_image"]["name"];
			$this->Connection_model->do_upload($file_name);
		}
		$ac_id=$this->session->userdata('current_account_id');
		if($ac_id!='')
		{
			$current_account_id=$this->session->userdata('current_account_id');
		}
		else
		{
			$current_account_id=$this->session->userdata('account_id');
		}
		//$current_account_id;
		
		//$data['query']=$this->Connection_model->connection_add();
		$this->Connection_model->connection_add();
		//$data['query']=
		$data['listing_data']=$this->Connection_model->connection_listing();
		/*$data['collectionaccount']=$this->Connection_model->select_collection_account();
		$data['collectionwebsite']=$this->Connection_model->select_colletion_website();
		$data['allaccount']=$this->Connection_model->get_account();
		$data['allwebsites']=$this->Connection_model->get_website();
		if($data['query']=='Title Must Not Empty'){
			$data['error']=$data['query'];
		}
		$collection_id=$data['query'][0]->collection_id;
		*/
		$this->load->view('admin/connection_view',$data);								
	}	
	public function update_collection_design()
	{
		$this->load->model('Connection_model');	
		$data['return_id']=$this->input->post('hidden_id');
		$data['all_design']=$this->Connection_model->design_all();
		$data['design_collection']=$this->Connection_model->collection_design_update();
		$data['listing_data']=$this->Connection_model->collection_manage_listing();
		$data['query']=$this->Connection_model->design_update();
		$data['page_design']=$this->Connection_model->select_page_design();
		$data['post_design']=$this->Connection_model->select_post_design();
		$data['calendar_design']=$this->Connection_model->select_calendar_design();
		$this->load->view('admin/collection_manage',$data);							
	}
	public function update_default_design()
	{
		$this->load->model('Connection_model');	
		$data['return_id']=$this->input->post('hidden_id');
		$data['all_design']=$this->Connection_model->design_all();
		$data['default']=$this->Connection_model->design_default_update();
		$data['page_design']=$this->Connection_model->select_page_design();
		$data['post_design']=$this->Connection_model->select_post_design();
		$data['calendar_design']=$this->Connection_model->select_calendar_design();
	//	$this->load->view('admin/collection_manage',$data);							
	}

	public function update_design()
	{
		$this->load->model('Connection_model');	
		$data['return_id']=$this->input->post('hidden_id');
		$data['all_design']=$this->Connection_model->design_all();
		$data['collection_title']=$this->Connection_model->collection_title();
		$data['default_page_design']=$this->Connection_model->default_page_design();
		$data['listing_data']=$this->Connection_model->collection_manage_listing();
		$data['page_design']=$this->Connection_model->select_page_design();
		$data['post_design']=$this->Connection_model->select_post_design();
		$data['calendar_design']=$this->Connection_model->select_calendar_design();
		$data['query']=$this->Connection_model->design_update();
		$this->load->view('admin/collection_manage',$data);							
	}	
	public function design_search()
	{
		$this->load->model('Connection_model');	
		$current_id=$this->session->userdata('collection_id');
		$return_id=$this->session->userdata('collection_id');
		$data['search_design']=$this->Connection_model->search_design();
		$data['design_data']=$this->Connection_model->design_select();
		$json_data=$data['design_data'];
		$data['all_design_data']=$this->Connection_model->design_all();
		$data['design_type']=$this->Connection_model->design_type();
		$all_design=$data['search_design'];
		$data['list']=$this->Connection_model->collection_manage_listing();
		$listing_data=$data['list'];
		$postback=array();
		if(isset($listing_data) && $listing_data!='')
		  {
			  if(!empty($listing_data)){
				$array_length=count($listing_data); 
					for($i=0;$i<$array_length; $i=$i+1)
					{
						$postback[]=$listing_data[$i]->design_id; 
					}
			  }
		  }
		
		 if(!empty($all_design)){ foreach($all_design as $row){
			
                if(isset($postback)) if(!in_array($row->design_id,$postback)) {
					
		 		echo "<li" .' '; 
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
                    echo "</li>";
                    } } } 
						
		
	}	


	public function select_design()
	{
		$jsons= array();
		$current_id=$this->session->userdata('collection_id');	
		$return_id=$this->session->userdata('collection_id');	
		
		$this->load->model('Connection_model');	
		$data['design_data']=$this->Connection_model->design_select();
		$json_data=$data['design_data'];
		
		$data['all_design_data']=$this->Connection_model->design_all();
		$data['design_type']=$this->Connection_model->design_type();
		$all_design = $data['design_data'];
		$data['list'] = $this->Connection_model->collection_manage_listing();
		$listing_data = $data['list'];
		//echo '<pre>';print_r($listing_data);echo '</pre>';
		 $postback = array();
		 if(isset($listing_data) && $listing_data!='')
		  {
			  if(!empty($listing_data)){
				$array_length = count($listing_data); 
					for($i=0;$i<$array_length; $i=$i+1)
					{
						$postback[]=$listing_data[$i]->design_id; 
					}
			  }
		  }		
		 if(!empty($all_design)){ foreach($all_design as $row){
			
                if(isset($postback)) if(!in_array($row->design_id,$postback)) {
					
		 		echo "<li" .' '; 
				echo "class='add_design'  id='add_design_list'"; echo "value=$row->design_id  onclick='add_design_list()'"; 
             	echo ">";
                     
					  if($row->design_profile_image==''){
					$image_design = base_url()."assets/img/admin/noimage.jpg";
				}else{
					$image_design = base_url()."assets/img/design/".$row->design_profile_image;	
				}
					                 
                echo "<div class='pill' style='background-image: url(".$image_design.")'";
				echo " >&nbsp;</div>                       
                <p class='label'>$row->design_title</p>
                 <p class='options' id='add_design_id' onclick='message_add($row->design_id)'>";
					//if(isset($postback)) if(!in_array($row->design_id,$postback)) {
								
					echo "<span class='option'> Add this Design </span> </p>";
					//}
				   if($row->design_status==1) {
                  	 echo "<div class='status statusGreen'></div>";
                   }
					else
					{
                   	  echo "<div class='status statusRed'></div>";
                     }
                    echo "</li>";
                    } 
					} } 
						
	}	
	public function collection_manage()
	{
		$this->load->model('Connection_model');
		$collection_id=$this->session->userdata('collection_id');
		$collection_id=$this->uri->segment(3);	
		
		$this->session->set_userdata(array(
             				'collection_id'=> $collection_id
                    ));		
		$data['all_design_data']=$this->Connection_model->design_all();
		$all_design=$data['all_design_data'];
	
		$data['collection_title']=$this->Connection_model->collection_title();
		$data['listing_data']=$this->Connection_model->collection_manage_listing();
		$data['page_design']=$this->Connection_model->select_page_design();
		$data['post_design']=$this->Connection_model->select_post_design();
		$data['query']=$this->Connection_model->design_collection();
		$data['calendar_design']=$this->Connection_model->select_calendar_design();
		$data['default_page_design']=$this->Connection_model->default_page_design();
		$data['default_post_design']=$this->Connection_model->default_post_design();
		$data['default_calendar_design']=$this->Connection_model->default_calendar_design();
		$data['design_all_types']=$this->Connection_model->select_type_all();
		$this->load->view('admin/collection_manage',$data);			
						
	}	
	public function add_design()
	{
		$this->load->helper('url');
		$this->load->model('Connection_model');		
		$design_collection=$this->input->post('option');	
		
		$collection_data=explode(',',$design_collection);
		$add_design = array(
			'collection_id'=>$collection_data[0],
			'design_id'=>$collection_data[1],		 
			);
		$this->db->insert('design_collection',$add_design);
		echo "succsses".','."$collection_data[0]";
	}
	public function design_manage()
	{		
		$this->load->model('Connection_model');		
		$data['all_design']=$this->Connection_model->design_all();
		$data['query']=$this->Connection_model->selectone_onedesign();
		$data['listing_data']=$this->Connection_model->collection_manage_listing();
		$this->load->view('admin/collection_manage',$data);							
	}
	public function collection_profile()
	{
		$this->load->model('Connection_model');		
		$data['query']=$this->Connection_model->profile_collection();
		$data['listing_data']=$this->Connection_model->collection_listing();
		$data['allaccount']=$this->Connection_model->get_account();
		$data['allwebsites']=$this->Connection_model->get_website();			
		$this->load->view('admin/collections',$data);							
	}	
	public function connection_delete()
	{
		$this->load->model('Connection_model');			
		$data['query']=$this->Connection_model->delete_connection();
		$data['listing_data']=$this->Connection_model->connection_listing();
		redirect('connection_controller');
		//$this->load->view('admin/collections',$data);						
	}

	public function connection_search()
	{
		$this->load->model('Connection_model');		
		$data['listing_data']=$this->Connection_model->search_collection();
		$this->load->view('admin/connection_view',$data);							
	}
	public function all_connection()
	{
		$this->load->model('Connection_model');		
		$data['listing_data']=$this->Connection_model->connection_listing();//collection_all
		//$data['allaccount']=$this->Connection_model->get_account();
		//$data['allwebsites']=$this->Connection_model->get_website();			
		$this->load->view('admin/connection_view',$data);							
	}
	public function connection_setting()
	{
		$this->load->model('Connection_model');	
		$data['query']=$this->Connection_model->selectone_connection();
		//$data['designcollection']=$this->Connection_model->design_collection();
		$data['listing_data']=$this->Connection_model->connection_listing();
		//$data['collectionaccount']=$this->Connection_model->select_collection_account();
		//$data['collectionwebsite']=$this->Connection_model->select_colletion_website();
		//$data['allaccount']=$this->Connection_model->get_account();
		//$data['allwebsites']=$this->Connection_model->get_website();
	//	$data['count_designs']=$this->Connection_model->select_count_page_design();
				
		$this->load->view('admin/connection_view',$data);						
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
		$file_name= $_FILES["collection_image"]["name"];
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

	/*public function __costruc()
	{
		$this->load->library('session');		
	}
	function index()
	{
		$this->load->model('Connection_model');
		$data['collection_listing']=$this->Connection_model->collection_listing();
		$data['listing_data']=$this->Connection_model->collection_listing();
		$data['allaccount']=$this->Connection_model->get_account();
		$data['allwebsites']=$this->Connection_model->get_website();			
		$this->load->view('admin/collections',$data);			
	}
	public function Connection_model()
	{
		$this->load->model('Connection_model');
		$data['listing_data']=$this->Connection_model->collection_listing();
		$data['allaccount']=$this->Connection_model->get_account();	
		$data['allwebsites']=$this->Connection_model->get_website();		
		$this->load->view('admin/collections',$data);			
					
	}
	public function add_collection()
	{		
		$this->load->model('Connection_model');
		if(isset($_FILES["collection_image"]["name"]) && $_FILES["collection_image"]["name"]!='')
		{		
			$file_name= $_FILES["collection_image"]["name"];
			$this->Connection_model->do_upload($file_name);
		}
		
		$data['query']=$this->Connection_model->collection_add();
		
		$data['listing_data']=$this->Connection_model->collection_listing();
		$data['collectionaccount']=$this->Connection_model->select_collection_account();
		$data['collectionwebsite']=$this->Connection_model->select_colletion_website();
		$data['allaccount']=$this->Connection_model->get_account();
		$data['allwebsites']=$this->Connection_model->get_website();
		if($data['query']=='Title Must Not Empty'){
			$data['error']=$data['query'];
		}
		$collection_id=$data['query'][0]->collection_id;
		
		redirect('collections/collection_setting/'.$collection_id);						
	}	
	public function update_collection_design()
	{
		$this->load->model('Connection_model');	
		$data['return_id']=$this->input->post('hidden_id');
		$data['all_design']=$this->Connection_model->design_all();
		$data['design_collection']=$this->Connection_model->collection_design_update();
		$data['listing_data']=$this->Connection_model->collection_manage_listing();
		$data['query']=$this->Connection_model->design_update();
		$data['page_design']=$this->Connection_model->select_page_design();
		$data['post_design']=$this->Connection_model->select_post_design();
		$data['calendar_design']=$this->Connection_model->select_calendar_design();
		$this->load->view('admin/collection_manage',$data);							
	}
	public function update_default_design()
	{
		$this->load->model('Connection_model');	
		$data['return_id']=$this->input->post('hidden_id');
		$data['all_design']=$this->Connection_model->design_all();
		$data['default']=$this->Connection_model->design_default_update();
		$data['page_design']=$this->Connection_model->select_page_design();
		$data['post_design']=$this->Connection_model->select_post_design();
		$data['calendar_design']=$this->Connection_model->select_calendar_design();
	//	$this->load->view('admin/collection_manage',$data);							
	}

	public function update_design()
	{
		$this->load->model('Connection_model');	
		$data['return_id']=$this->input->post('hidden_id');
		$data['all_design']=$this->Connection_model->design_all();
		$data['collection_title']=$this->Connection_model->collection_title();
		$data['default_page_design']=$this->Connection_model->default_page_design();
		$data['listing_data']=$this->Connection_model->collection_manage_listing();
		$data['page_design']=$this->Connection_model->select_page_design();
		$data['post_design']=$this->Connection_model->select_post_design();
		$data['calendar_design']=$this->Connection_model->select_calendar_design();
		$data['query']=$this->Connection_model->design_update();
		$this->load->view('admin/collection_manage',$data);							
	}	
	public function design_search()
	{
		$this->load->model('Connection_model');	
		$current_id=$this->session->userdata('collection_id');
		$return_id=$this->session->userdata('collection_id');
		$data['search_design']=$this->Connection_model->search_design();
		$data['design_data']=$this->Connection_model->design_select();
		$json_data=$data['design_data'];
		$data['all_design_data']=$this->Connection_model->design_all();
		$data['design_type']=$this->Connection_model->design_type();
		$all_design=$data['search_design'];
		$data['list']=$this->Connection_model->collection_manage_listing();
		$listing_data=$data['list'];
		$postback=array();
		if(isset($listing_data) && $listing_data!='')
		  {
			  if(!empty($listing_data)){
				$array_length=count($listing_data); 
					for($i=0;$i<$array_length; $i=$i+1)
					{
						$postback[]=$listing_data[$i]->design_id; 
					}
			  }
		  }
		
		 if(!empty($all_design)){ foreach($all_design as $row){
			
                if(isset($postback)) if(!in_array($row->design_id,$postback)) {
					
		 		echo "<li" .' '; 
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
                    echo "</li>";
                    } } } 
						
		
	}	


	public function select_design()
	{
		$jsons= array();
		$current_id=$this->session->userdata('collection_id');	
		$return_id=$this->session->userdata('collection_id');	
		
		$this->load->model('Connection_model');	
		$data['design_data']=$this->Connection_model->design_select();
		$json_data=$data['design_data'];
		
		$data['all_design_data']=$this->Connection_model->design_all();
		$data['design_type']=$this->Connection_model->design_type();
		$all_design = $data['design_data'];
		$data['list'] = $this->Connection_model->collection_manage_listing();
		$listing_data = $data['list'];
		//echo '<pre>';print_r($listing_data);echo '</pre>';
		 $postback = array();
		 if(isset($listing_data) && $listing_data!='')
		  {
			  if(!empty($listing_data)){
				$array_length = count($listing_data); 
					for($i=0;$i<$array_length; $i=$i+1)
					{
						$postback[]=$listing_data[$i]->design_id; 
					}
			  }
		  }		
		 if(!empty($all_design)){ foreach($all_design as $row){
			
                if(isset($postback)) if(!in_array($row->design_id,$postback)) {
					
		 		echo "<li" .' '; 
				echo "class='add_design'  id='add_design_list'"; echo "value=$row->design_id  onclick='add_design_list()'"; 
             	echo ">";
                     
					  if($row->design_profile_image==''){
					$image_design = base_url()."assets/img/admin/noimage.jpg";
				}else{
					$image_design = base_url()."assets/img/design/".$row->design_profile_image;	
				}
					                 
                echo "<div class='pill' style='background-image: url(".$image_design.")'";
				echo " >&nbsp;</div>                       
                <p class='label'>$row->design_title</p>
                 <p class='options' id='add_design_id' onclick='message_add($row->design_id)'>";
					//if(isset($postback)) if(!in_array($row->design_id,$postback)) {
								
					echo "<span class='option'> Add this Design </span> </p>";
					//}
				   if($row->design_status==1) {
                  	 echo "<div class='status statusGreen'></div>";
                   }
					else
					{
                   	  echo "<div class='status statusRed'></div>";
                     }
                    echo "</li>";
                    } 
					} } 
						
	}	
	public function collection_manage()
	{
		$this->load->model('Connection_model');
		$collection_id=$this->session->userdata('collection_id');
		$collection_id=$this->uri->segment(3);	
		
		$this->session->set_userdata(array(
             				'collection_id'=> $collection_id
                    ));		
		$data['all_design_data']=$this->Connection_model->design_all();
		$all_design=$data['all_design_data'];
	
		$data['collection_title']=$this->Connection_model->collection_title();
		$data['listing_data']=$this->Connection_model->collection_manage_listing();
		$data['page_design']=$this->Connection_model->select_page_design();
		$data['post_design']=$this->Connection_model->select_post_design();
		$data['query']=$this->Connection_model->design_collection();
		$data['calendar_design']=$this->Connection_model->select_calendar_design();
		$data['default_page_design']=$this->Connection_model->default_page_design();
		$data['default_post_design']=$this->Connection_model->default_post_design();
		$data['default_calendar_design']=$this->Connection_model->default_calendar_design();
		$data['design_all_types']=$this->Connection_model->select_type_all();
		$this->load->view('admin/collection_manage',$data);			
						
	}	
	public function add_design()
	{
		$this->load->helper('url');
		$this->load->model('Connection_model');		
		$design_collection=$this->input->post('option');	
		
		$collection_data=explode(',',$design_collection);
		$add_design = array(
			'collection_id'=>$collection_data[0],
			'design_id'=>$collection_data[1],		 
			);
		$this->db->insert('design_collection',$add_design);
		echo "succsses".','."$collection_data[0]";
	}
	public function design_manage()
	{		
		$this->load->model('Connection_model');		
		$data['all_design']=$this->Connection_model->design_all();
		$data['query']=$this->Connection_model->selectone_onedesign();
		$data['listing_data']=$this->Connection_model->collection_manage_listing();
		$this->load->view('admin/collection_manage',$data);							
	}
	public function collection_profile()
	{
		$this->load->model('Connection_model');		
		$data['query']=$this->Connection_model->profile_collection();
		$data['listing_data']=$this->Connection_model->collection_listing();
		$data['allaccount']=$this->Connection_model->get_account();
		$data['allwebsites']=$this->Connection_model->get_website();			
		$this->load->view('admin/collections',$data);							
	}	
	public function collection_delete()
	{
		$this->load->model('Connection_model');		
		$data['query']=$this->Connection_model->delete_collection();
		$data['listing_data']=$this->Connection_model->collection_listing();
		redirect('collections');
		//$this->load->view('admin/collections',$data);						
	}

	public function collection_search()
	{
		$this->load->model('Connection_model');		
		$data['search_var']=$this->input->post('selected_value');
		$data['listing_data']=$this->Connection_model->search_collection();
		$data['allaccount']=$this->Connection_model->get_account();
		if($this->input->post('input_value')!=''){
		$data['search_field_value']=$this->input->post('input_value');
		}			
		$this->load->view('admin/collections',$data);							
	}
	public function all_collection()
	{
		$this->load->model('Connection_model');		
		$data['listing_data']=$this->Connection_model->collection_all();
		$data['allaccount']=$this->Connection_model->get_account();
		$data['allwebsites']=$this->Connection_model->get_website();			
		$this->load->view('admin/collections',$data);							
	}
	public function collection_setting()
	{
		$this->load->model('Connection_model');	
		$data['query']=$this->Connection_model->selectone_collection();
		$data['designcollection']=$this->Connection_model->design_collection();
		$data['listing_data']=$this->Connection_model->collection_listing();
		$data['collectionaccount']=$this->Connection_model->select_collection_account();
		$data['collectionwebsite']=$this->Connection_model->select_colletion_website();
		$data['allaccount']=$this->Connection_model->get_account();
		$data['allwebsites']=$this->Connection_model->get_website();
		$data['count_designs']=$this->Connection_model->select_count_page_design();
				
		$this->load->view('admin/collections',$data);						
	}

    /**
    * encript the password 
    * @return mixed
    //	
    function __encrip_password($password) {
        return md5($password);
    }	

	public function upload_images(){
	$this->load->model('agency_model');
	$formats = array("jpg", "png", "gif", "bmp", "jpeg", "PNG", "JPG", "JPEG", "GIF", "BMP");
		if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
		$file_name= $_FILES["collection_image"]["name"];
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
    //

    /**
    * The method just loads the signup view
    * @return void
    //
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
    //		
	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
*/
}