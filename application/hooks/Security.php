<?php

class Security {

	function performSecurityCheck() {
		
		//Load the CI Instance
		$CI =& get_instance();
		
		$CI->load->helper('user');
		
		$user = getLoggedinUser();
		
		$class = $CI->router->class;
		$action = $CI->router->method;
		
		
		
		if($class == 'manage') {

			if($user->user_level != 'Super Administrator') {
				if( 
					$action == "categories" || 
					$action == "sub_categories" ||
					$action == "affiliates" ||
					$action == "affiliate_codes" ||
					$action == "banner_adds" ||
					$action == "inactive_adds"		
				) {				
					show_error("Security Exception! - You are not authorized to view this page.", 301);
				}
			}
		}
		
		if($class == 'retailer') {
			$url = $CI->input->server('REQUEST_URI');
			if(stripos($url, '/api/retailer') !== false) {
				return;
			}
			if($user->user_level == 'Manager') {
				if($action == "users" || $action == 'blast') {
					show_error("Security Exception! - You are not authorized to perform any action on this page.", 301);
				}
			}
			if($user->user_level == 'Administrator') {
				if($action == "blast") {
					show_error("Security Exception! - You are not authorized to perform any action on this page.", 301);
				}
			}
		}
	}
		
}