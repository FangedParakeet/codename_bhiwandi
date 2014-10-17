<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	
	private $cModel;
	function __construct() {
		parent::__construct();
		$this->cModel = new Common_model();
		if($this->session->userdata('logged_in')){
			$this->uid = $this->session->userdata('id');
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
		$team = $this->cModel->getByField('teams', 'id', $this->team);
		$data = array(
			'uid' => $this->uid,
			'uname' => $this->uname,
			'team' => $team['name'],
			'type' => $this->type,
			'first_name' => $this->first_name,
			'last_name' => $this->last_name
		);
		$this->load->view('home/index', $data);
	}




}