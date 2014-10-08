<?php
if ( ! function_exists('register_new_user'))
{
	function register_new_user($post_array)
	{
		$CI =& get_instance();
		$CI->load->library('ion_auth');
		$username = $post_array['username'];
		$email = $post_array['email'];
		$password = $post_array['password'];
		$other_info = array();
		$other_info['first_name'] = $post_array['first_name'];
		$other_info['last_name'] = $post_array['last_name'];
		$other_info['user_type'] = $post_array['user_type'];

		if($CI->ion_auth->register($username, $password, $email, $other_info)) {
			$success_message = '<p>Your data has been successfully stored into the database.';
			$success_message .= " <a href='".base_url() . "admin/users'>Go back to list</a>";
			$success_message .= '</p>';
			echo "<textarea>".json_encode(array('success' => true , 'insert_primary_key' => $insert_result, 'success_message' => $success_message))."</textarea>";
				
		} else {
			//echo '<textarea>"success":false,"error_message":' . $CI->ion_auth->errors() . "</textarea>";
			echo json_encode(array('success' => false ,'error_message' => $CI->ion_auth->errors()));
		}
	}
}

if ( ! function_exists('getLoggedinUserId'))
{
	function getLoggedinUserId() {
		$CI =& get_instance();
		$CI->load->library('ion_auth');
		$loggedInUser = $CI->ion_auth->user()->row();
		return $loggedInUser->id;
	}
}

if ( ! function_exists('getLoggedinUser'))
{
	function getLoggedinUser() {
		$CI =& get_instance();
		$CI->load->library('session');
		$usertype = $CI->session->userdata('user_type');
		if(isset($usertype) && $usertype == 'EndUser') {
			$userid = $CI->session->userdata('user_id');
			$user = $CI->common_model->getByField('users', 'id', $userid);
			return $user;
		} else if($usertype == 'Licensee') {
			$userid = $CI->session->userdata('user_id');
			$user = $CI->common_model->getByField('crm_licensee', 'id', $userid);
			return $user;
		} else {
			$CI->load->library('ion_auth');
			$loggedInUser = $CI->ion_auth->user()->row();
		}
		return $loggedInUser;
	}
}

function unset_password($POST_ARRAY) {
	
	//if it is an edit state and if confirm password field is left blank .., ... just remove the password also
	if($POST_ARRAY['confirm_passwd'] == '') {
		unset($POST_ARRAY['password']);
		unset($POST_ARRAY['new_password']);
	} else {
		//Generated encrypted password
		if(array_key_exists('new_password', $POST_ARRAY)) {
			$pass = $POST_ARRAY['new_password'];
		} else {
			$pass = $POST_ARRAY['password'];	
		}
		$ci =& get_instance();
		$salt = $ci->config->item('auth_salt', 'ion_auth');
		$POST_ARRAY['password'] = sha1($salt . $pass);
		unset($POST_ARRAY['new_password']);
	}
	//Unset the confirm password
	unset($POST_ARRAY['confirm_passwd']);
	
	//Return the array with encrypted password
	return $POST_ARRAY;
}

function set_user_levels_i($post_array, $primary_key) {
	$ci =& get_instance();
	$groups = array ('Super Administrator'=>1, 'Administrator'=>2, 'Manager'=>3);
	$user_levels = $post_array['user_level'];
	if(is_string($user_levels))
		$user_levels = array($user_levels);
	
	//Delete the old entries of the user in its relevant group tables
	$ci->common_model->delete('retailer_groups', array('user_id'=>$primary_key));
	$ci->common_model->delete('manager', array('raid'=>$primary_key));
	$ci->common_model->delete('admin', array('raid'=>$primary_key));
	$ci->common_model->delete('super_admin', array('raid'=>$primary_key));
	foreach($user_levels as $level) {
		$data = array(
				'user_id' => $primary_key,
				'group_id' => $groups[$level]
		);
		$ci->common_model->insert('retailer_groups', $data);
		//Make the legacy entry for time being
		$data = array('raid'=>$primary_key);
		if($level == 'Manager') {
			$ci->common_model->insert('manager', $data);
		} elseif ($level == 'Administrator') {
			$ci->common_model->insert('admin', $data);
		} elseif ($level == 'Super Administrator') {
			$ci->common_model->insert('super_admin', $data);
		}
	}
	
	//Associate the retailer with the user account
	$data = array();
	$data['raid'] = $primary_key;
	$data['rid'] = $ci->session->userdata('current_rid');
	$data['priority'] = 0;
	$ci->common_model->insert('ra_access', $data);
	$ci->session->unset_userdata('current_rid');
}

function set_user_levels_u($post_array, $primary_key) {
	$ci =& get_instance();
	$groups = array ('Super Administrator'=>1, 'Administrator'=>2, 'Manager'=>3);
	$user_levels = $post_array['user_level'];
	if(is_string($user_levels))
		$user_levels = array($user_levels);

	//Delete the old entries of the user in its relevant group tables
	$ci->common_model->delete('retailer_groups', array('user_id'=>$primary_key));
	$ci->common_model->delete('manager', array('raid'=>$primary_key));
	$ci->common_model->delete('admin', array('raid'=>$primary_key));
	$ci->common_model->delete('super_admin', array('raid'=>$primary_key));
	foreach($user_levels as $level) {
		$data = array(
				'user_id' => $primary_key,
				'group_id' => $groups[$level]
		);
		$ci->common_model->insert('retailer_groups', $data);
		//Make the legacy entry for time being
		$data = array('raid'=>$primary_key);
		if($level == 'Manager') {
			$ci->common_model->insert('manager', $data);
		} elseif ($level == 'Administrator') {
			$ci->common_model->insert('admin', $data);
		} elseif ($level == 'Super Administrator') {
			$ci->common_model->insert('super_admin', $data);
		}
	}
}

if ( ! function_exists('generate_password'))
{
	function generate_password($length = 6){
		$chars =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'.
	    			'0123456789';

		$str = '';
		$max = strlen($chars) - 1;

		for ($i=0; $i < $length; $i++)
		$str .= $chars[mt_rand(0, $max)];

		return $str;
	}
}

if ( ! function_exists('sendUserPass'))
{

	function sendUserPass($row, $passwd) {
		$CI =& get_instance();
		$CI->load->library('email');
		//$config['protocol'] = 'smtp';
		//$config['smtp_host'] = 'mail.myinfoboard.net';
		//$config['smtp_user'] = 'myrehab@myinfoboard.net';
		//$config['smtp_pass'] = 'myr3h@bXX';
		//$config['mailtype'] = 'html';
		$config = Array(
		    'protocol' => 'smtp',
		    'smtp_host' => 'p3plcpnl0245.prod.phx3.secureserver.net',
		    'smtp_port' => 465,
		    'smtp_crypto' => 'ssl',
		    'smtp_user' => 'app@theleoapp.com',
		    'smtp_pass' => 'Darpan1985',
		    'mailtype'  => 'html', 
		    'charset'   => 'iso-8859-1'
		); 
		$CI->email->initialize($config);
		$CI->email->from('app@theleoapp.com', 'MyLeo App');
		$CI->email->to($row['email']);
		$CI->email->subject('Welcome to myleo. Your access to the system.');

		$message = "<html>
				<body>
					Hi, " . $row['name'] . "
					Now you can login to the mobile app / website using the following credentials.
					<table>
						<tr>
							<td>Your username:</td>
							<td>" . $row['email'] . "</td>
						</tr>
						<tr>
							<td>Your Password:</td>
							<td>" . $passwd . "</td>
						</tr>
					</table>
				</body>
				</html>";
		$CI->email->message($message);
		$CI->email->send();
	}
}
?>