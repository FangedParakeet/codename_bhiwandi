<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	
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
	

	function index(){
		$today = date('Y-m-d');
		$tomorrow_date = new DateTime('tomorrow');
		$tomorrow = $tomorrow_date->format('Y-m-d');
	
		$criteria = array(
			'start_date >=' => $today,
			'end_date <' => $tomorrow
		);
		$todays_activities = $this->cModel->searchForOrderBy('activities', $criteria, 'start_date', 'ASC');
		$timeSpent = 0;
		$activities = array();
		foreach($todays_activities as $key => $activity){
			$timeSpent += intval($activity['duration']);
			$client = $this->cModel->getByField('clients', 'id', $activity['client_id']);
			$start = date('g:i a', strtotime($activity['start_date']));
			$end = date("g:i a", strtotime($activity['end_date']));
			$duration = round((intval($activity['duration']) / 60), 1);
			$activities[$key] = array(
				'client' => $client['name'],
				'start' => $start,
				'end' => $end,
				'duration' => $duration,
				'description' => $activity['description'],
				'remarks' => $activity['remarks']
			);
		}
		$hoursSpent = round(($timeSpent / 60), 1);
		
		$team = $this->cModel->getByField('teams', 'id', $this->team);
		$clients = $this->cModel->getAll('clients');
		$client_info = array();
		
		foreach($clients as $key => $client){
			$client_info[$key] = array('id' => $client['id'], 'name' => $client['name']);
		}
		$data = array(
			'uid' => $this->uid,
			'uname' => $this->uname,
			'team' => $team['name'],
			'type' => $this->type,
			'first_name' => $this->first_name,
			'last_name' => $this->last_name,
			'clients' => $client_info,
			'hours' => $hoursSpent,
			'activities' => $activities
		);
		
		$this->load->view('home/index', $data);
	}
	
	public function logout(){
		$this->session->userdata = array();
		$this->session->sess_destroy();
		redirect('welcome', 'refresh');
	}
	



}