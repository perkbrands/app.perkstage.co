<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_account_controller extends CI_Controller {
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
		$this->load->view('user_account_view');
	}
	public function user_select()
	{
		$this->load->model('user_account_model');
		$Name=$this->user_account_model->select_user();
		$this->load->view('user_account_view',array('Name'=>$Name));
	}
	public function user_account_add()
	{	
		$this->load->model('user_account_model');		
		$data['query']=$this->user_account_model->add_user_account();
		$this->load->view('user_account_view');		
	}

	public function user_edit()
	{
		$this->load->model('user_account_model');			
		$Name=$this->user_account_model->edit_user();
		$this->load->view('user_account_view');		
	}
	public function user_login()
	{
		$this->load->model('user_account_model');		
		$return_data=$this->user_account_model->login_user();
		if($return_data=='success')
		{
			$data['listing_data']=$this->user_account_model->user_listing();
			$this->load->view('user_listing',$data);			

		}
		else
		{
		$role['allrole']=$this->user_account_model->get_role();
		$this->load->view('user_account_view',$role);	
		}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */