<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Activities extends CI_Controller {

	private $cModel;
	function __construct() {
		parent::__construct();
		$this->cModel = new Common_model();
		if($this->session->userdata('logged_in')){
			$this->uid = $this->session->userdata('uid');
			$this->uname = $this->session->userdata('uname');
			$this->team = $this->session->userdata('team');
			$this->type = $this->session->userdata('type');
			$this->first_name = $this->session->userdata('first_name');
			$this->last_name = $this->session->userdata('last_name');
		}
		else {
			$this->session->set_flashdata('message', 'WHAT ARE YOU DOING THERE. SECURITY IS ON ITS WAY TO ESCORT YOU FROM THE BUILDING.');
			redirect('welcome', 'refresh');
		}
	}
	
	function add(){
		$today = date('Y-m-d');
		
		$uid = $this->uid;
				
		$start_hours = $this->input->post('start_hours');
		$start_mins = $this->input->post('start_mins');
		$start_date = $today.' '.$start_hours.':'.$start_mins.':00'; // format date to "YYYY-MM-DD HH:MM:SS"
		
		$end_hours = $this->input->post('end_hours');
		$end_mins = $this->input->post('end_mins');
		$end_date = $today.' '.$end_hours.':'.$end_mins.':00';
		
		$hours_diff = (intval($end_hours) - intval($start_hours)) * 60; // difference in hours converted to minutes
		$mins_diff = intval($end_mins) - intval($start_mins);
		$duration = $hours_diff + $mins_diff;
				
		$client = $this->input->post('client');
		$descr = $this->input->post('activity');
		$remarks = $this->input->post('remarks');
		$data = array(
			'start_date' => $start_date,
			'end_date' => $end_date,
			'duration' => $duration,
			'client_id' => $client,
			'user_id' => $uid,
			'description' => $descr,
			'remarks' => $remarks
		);
		
		$this->cModel->insert('activities', $data);
		
		redirect('home', 'refresh');
		
	}





}
