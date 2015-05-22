<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agency_controller extends CI_Controller {
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
		$this->load->view('login');
	}

	public function agency_select()
	{
		$this->load->model('agency_model');
		$Name=$this->agency_model->select_agency();
		$this->load->view('agency_view',array('Name'=>$Name));
	}

	public function agency_add()
	{
		$this->load->model('agency_model');		
		$data['query']=$this->agency_model->add_agency();
		$data['listing_data']=$this->agency_model->agency_listing();
		$this->load->view('agency_listing',$data);			
	}
	public function agency_delete()
	{
		$this->load->model('agency_model');			
		$Name=$this->agency_model->delete_agency();
		$data['listing_data']=$this->agency_model->agency_listing();
		$this->load->view('agency_listing',$data);			
	}	
	
	public function agency_edit()
	{	
		$this->load->model('agency_model');			
		$edit_qry['edit']=$this->agency_model->selectone_user();
		$this->load->view('agency_view',$edit_qry);		
	}
	public function agency_login()
	{
		$this->load->model('agency_model');		
		$returndata=$this->agency_model->login_agency();
		if($returndata=='success')
		{
			$data['listing_data']=$this->agency_model->agency_listing();
			$this->load->view('agency_listing',$data);			

		}
		else
		{
			$this->load->view('agency_view');					
		}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */