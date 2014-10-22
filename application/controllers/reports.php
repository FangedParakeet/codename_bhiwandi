<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {

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
	
	
	function submit($data){
		//date in yyyy-mm-dd format
		$date = $data;
		$next_day = date('Y-m-d', strtotime($date .' +1 day'));
		$criteria1 = array(
			'date >=' => $date,
			'date <' => $next_day
		);
		$todays_report = $this->cModel->search('reports', $criteria1);
		if(count($todays_report) > 0){
			$this->session->set_flashdata('message', 'Report has already been submitted!');
		}
		else {
			$previous_day = date('Y-m-d', strtotime($date .' -1 day'));
			$criteria2 = array(
				'date >=' => $previous_day,
				'date <' => $next_day
			);
			$pending_reports = $this->cModel->search('reports', $criteria2);
			if(count($pending_reports) < 1){
				$this->session->set_flashdata('message', 'Submit your pending reports first!');
			}
			else {
				$uid = $this->uid;
	
				$criteria = array(
					'start_date >=' => $date,
					'end_date <' => $next_day
				);
				$days_activities = $this->cModel->searchForOrderBy('activities', $criteria, 'start_date', 'ASC');
				$total_duration = 0;
				foreach($days_activities as $key => $activity){
					$total_duration += intval($activity['duration']);
				}
				$data = array(
					'user_id' => $uid,
					'date' => $date,
					'duration' => $total_duration
				)
				$this->cModel->insert('reports', $data);
			}
		}

		redirect('home', 'refresh');
		
	}
}