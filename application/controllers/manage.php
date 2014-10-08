<?php

class Manage extends CI_Controller {

	private $cModel;
	function __construct() {
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->library('session');
		$this->load->library('Grocery_crud');
		$this->cModel = new Common_model();
	}
	
	function index()
	{
		if (!$this->ion_auth->logged_in()) {
			redirect('auth/login', 'refresh');
		}
		redirect('manage/contacts');
	}	
	
	function contacts() {
		try{
			$crud = new Grocery_crud();
			$crud->set_table('contact_us');
			$crud->set_subject('Store Locator Contact');

			$crud->display_as('cdate', 'Created On');

			$crud->unset_add();
			$crud->unset_edit();
			$crud->unset_delete();
			$crud->unset_jquery();			
			
			$crud->order_by('contact_id', 'desc');
			
			$output = $crud->render();
			$this->load->view('crud.php',$output);
				
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	function nostores($state=false, $city=false) {
		try{

			if($state == 'add' || $state == 'edit' || $state == 'search' || $state == 'export' ||  $state == 'print' ||  is_numeric($state)) {
				$state = false;
			}

			if($city == 'add' || $city == 'edit' || $city == 'search' || $city == 'export' || $city == 'print' ||  is_numeric($city)) {
				$city = false;
			}

			$crud = new Grocery_crud();
			$crud->set_table('store_details');
			$crud->set_subject('Store Location');

			if($crud->getState() == 'list')
				$crud->columns('product_type', 'store_name', 'state', 'city', 'area', 'phone');

			$crud->display_as('cdate', 'Created On');
			$crud->unset_fields('cdate');

			$crud->field_type('product_type', 'select', array('Zenfone', 'AIO', 'Desktops', 'Notebooks & Ultrabooks', 'Smart Phones', 'Tablets and Mobiles'));

			if(!is_bool($state)) {
				$crud->where('state', $state);
			}

			if(!is_bool($city)) {
				$crud->where('city', $city);
			}

			$crud->unset_jquery();
			
			$output = $crud->render();
			$this->load->view('crud.php',$output);
				
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	
}