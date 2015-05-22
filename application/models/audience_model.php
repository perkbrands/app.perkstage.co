<?php
class Audience_model extends CI_Model {
	 public function __construct()
 	{
  		$this->load->database();
 	}
	
	
	public function delete_audience()
	{
		$delete_id=$this->uri->segment(3);	
		$this->db->where('account_id', $delete_id);
		return $this->db->delete('agency_accounts');
	}	
	public function select_audience()
	{
		$query=$this->db->get('agency_accounts');	
		return $query->result();
	}
	public function profile_audience()
	{
		$profile_id=$this->uri->segment(3);	
		$query = $this->db->get_where('agency_accounts', array('account_id' => $profile_id));
		return $query->result();
	}

	
	public function audience_listing()
	{
		$query=$this->db->get('audience',12);	
		return $query->result();
	}
	function add_audience()
	{	
		$edit_idd=$this->input->post('hiddenid');		
		$data = array(
	        'audience_status'=>$this->input->post('status'),
	         'audience_profile_title'=>$this->input->post('audience_profile_title'),
	         'audience_profile_summary'=>$this->input->post('audience_profile_summary'),
	         'audience_enrollment'=>$this->input->post('enrollment'),
	         'audience_tag'=>$this->input->post('tags'),
	         'audience_note'=>$this->input->post('notes'),	
        );
		if(isset($edit_idd) && $edit_idd!='')
		{
			$this->db->where('audience_id',$this->input->post('hiddenid'));
			 return $this->db->update('audience', $data);
		}
		else
		{
		if($this->input->post('status'))
			 $this->db->insert('audience', $data);
			 $account_fid=$this->db->insert_id();
			
	}
	}
	function selectone_audience()
	{
		//$edit_id=$this->input->get('edi');
		$edit_id=$this->uri->segment(3);
		$query = $this->db->get_where('agency_accounts', array('account_id' => $edit_id));
		return $query->result();

	}	
	
	function edit_audience()
	{
		$data = array(
	         'txt_agencyname'=>$this->input->post('txt_agencyname'),
	         'txt_agencylable'=>$this->input->post('txt_agencylable'),
        	 'txt_agencycode'=>$this->input->post('txt_agencycode'),
           	 'txt_agencystatus'=>$this->input->post('txt_agencystatus'),
             'txt_agencypass1'=>$this->input->post('txt_agencypass1'),
         );
			if($this->input->post('txt_username'))
			 return $this->db->update('agency', $data);		
	}
	
 }
