<?php
 
class Ajax extends CI_Controller {

    /**
    * Check if the user is logged in, if he's not, 
    * send him to the login page
    * @return void
    */	
	public function __costruc()
	{
		$this->load->library('session');
		
	}
	
	public function update_ajax_data(){
		$this->load->model('ajax_model');
		$data['query']=$this->ajax_model->update_ajax_function();
		//echo $data['query'];
		$url=base_url().'agency';
        echo "<script>location.href='$url'</script>";	
	}
	
	public function go_website(){
		echo $_SESSION['id_for_website'] = base64_encode($this->input->post('id_website'));
		//echo $data['query'];
			
	}
	
	public function update_ajax_repeat(){
		$this->load->model('ajax_model');
		$data['query']=$this->ajax_model->update_ajax_repeat();
		$repeat_id=$this->input->post('repeat_id');
		$url=base_url().'repeat_controller/repeat_setting/'.$repeat_id;
        echo "<script>location.href='$url'</script>";	
	}
	public function update_ajax_data_profile(){
		$this->load->model('ajax_model');
		$data['query']=$this->ajax_model->update_ajax_function();
		echo $data['query'];
		
	}
	
	public function update_ajax_audience(){
		$this->load->model('ajax_model');
		$data['query']=$this->ajax_model->update_ajax_audience();
		$url=base_url().'audience/audience';

      echo "<script>location.href='$url'</script>";
	}

	public function update_ajax_file(){
		$this->load->model('ajax_model');
		$file_id=$this->input->post('file_id');
		$data['query']=$this->ajax_model->update_ajax_file();
		$url=base_url().'files/file_setting/'.$file_id;

      echo "<script>location.href='$url'</script>";
	}


	public function update_ajax_file_website(){
		$this->load->model('ajax_model');
		$file_id=$this->input->post('file_id');
		$data['query']=$this->ajax_model->website_update_ajax_file();
		$url=base_url().'website_file_controller/website_file_setting/'.$file_id;

      echo "<script>location.href='$url'</script>";
	}
	
	public function update_ajax_design(){
		$design_id=$this->input->post('design_id');
		$this->load->model('ajax_model');
		$data['query']=$this->ajax_model->update_ajax_design();
		$url=base_url().'designs/design_setting/'.$design_id;

      echo "<script>location.href='$url'</script>";
	}
	
	public function update_ajax_design_manage(){
		$this->load->model('ajax_model');
		$data['query']=$this->ajax_model->update_ajax_design();
		$design_id=$this->input->post('design_id');	
		$url=base_url().'designs/manage_design/'.$design_id;

      echo "<script>location.href='$url'</script>";
	}
	
	public function update_ajax_collection(){
		$collection_id=$this->input->post('collection_id');	
		$this->load->model('ajax_model');
		$data['query']=$this->ajax_model->update_ajax_collections();
		$url=base_url().'collections/collection_setting/'.$collection_id;

      echo "<script>location.href='$url'</script>";
	}
	
	
	public function update_ajax_layout(){
		$layout_id=$this->input->post('layout_id');	
		$this->load->model('ajax_model');
		$data['query']=$this->ajax_model->update_ajax_layout();
		$url=base_url().'layout_controller/layout_setting/'.$layout_id;

      echo "<script>location.href='$url'</script>";
	}
	
	public function update_ajax_layout_manage(){
		$this->load->model('ajax_model');
		$data['query']=$this->ajax_model->update_ajax_layout();
		$url=base_url().'layout_controller/manage_layout/'.$this->input->post('layout_id');

      echo "<script>location.href='$url'</script>";
	}
	
	
	public function update_ajax_page(){
		$this->load->model('ajax_model');
		$data['query']=$this->ajax_model->update_ajax_page();
		$page_id=$this->input->post('page_id');
		$url=base_url().'pages_controller/page_setting/'.$page_id;
		

      echo "<script>location.href='$url'</script>";
	}
	
	
	
	public function update_ajax_people(){
		$val_page=$this->input->post('people_id');
		$page=explode('||',$val_page);
		$this->load->model('ajax_model');
		$data['query']=$this->ajax_model->update_ajax_people();
		if($data['query']=='Text must not empty and should be correct'){
			echo $data['query'];exit;
		}else{
		$url=base_url().'people_user_controller/'.$page[1];
        echo "<script>location.href='$url'</script>";
		}
		
	}
	
	
}