<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
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
	
	private $cModel;
	function __construct() {
		parent::__construct();
		$this->cModel = new Common_model();
		if($this->session->userdata('logged_in')){
			redirect('home', 'refresh');
		}
	}
	
	public function index()
	{
		$this->load->view('auth/login');
	}
	
	public function authorize(){
		$user = $_POST['identity'];
		$pass = $_POST['password'];
		
		$login = $this->cModel->searchFor('users', array('username' => $user, 'password' => md5($pass)));
		if( count($login) > 0){
			$user = $login[0];
			$userdata = array(
				'logged_in' => true,
				'uid' => $user['id'],
				'uname' => $user['username'],
				'team' => $user['team'],
				'type' => $user['type'],
				'first_name' => $user['first_name'],
				'last_name' => $user['last_name']
			);
			$this->session->set_userdata($userdata);
			redirect('home', 'refresh');
		}
		else {
			$this->session->set_flashdata('message', 'ACCESS DENIED. SECURITY IS ON ITS WAY TO ESCORT YOU FROM THE BUILDING.');
			redirect('/', 'refresh');
		}
		
	}
	
	public function logout(){
		$this->session->sess_destroy();
		$redirect('/', 'refresh');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */