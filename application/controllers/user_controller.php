<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_controller extends CI_Controller {
/***
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('user_model');
		$role['allrole']=$this->user_model->get_role();
		
		$this->load->view('login',$role);	

		//$this->load->view('user_view');
	}

	public function user_select()
	{
		$this->load->model('user_model');
		$Name=$this->user_model->select_user();
		$this->load->view('login',array('Name'=>$Name));
	}

	public function user_add()
	{	
		$this->load->model('user_model');		
		$data['query']=$this->user_model->add_user();
		$role['allrole']=$this->user_model->get_role();
		$data['listing_data']=$this->user_model->user_listing();
		$this->load->view('user_listing',$data);			
	}

	public function user_selectone()
	{
		$this->load->model('user_model');			
		$edit_qry['edit']=$this->user_model->selectone_user();
		$role['allrole']=$this->user_model->get_role();
		$this->load->view('login',array_merge($edit_qry,$role));
						
	}
	public function user_delete()
	{
		$this->load->model('user_model');			
		$this->load->model('user_model');
		$Name=$this->user_model->delete_user();
		$data['listing_data']=$this->user_model->user_listing();
		$this->load->view('user_listing',$data);			
		//$this->load->view('user_listing');		
	}
	public function user_login()
	{
		$this->load->model('user_model');		
		$return_data=$this->user_model->login_user();
		if($return_data=='success')
		{
			$data['listing_data']=$this->user_model->user_listing();
			$this->load->view('user_listing',$data);			

		}
		else
		{
		$role['allrole']=$this->user_model->get_role();
		$this->load->view('admin/login',$role);	
		}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */