<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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

	public function __construct() {
    	parent::__construct();
    	$this->load->model('login_model', 'auth'); 
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function login()
	{
		$this->form_validation->set_rules('username', ' Reference ID', 'required', array('is_unique' => 'Reference ID already exist.'));
		$this->form_validation->set_rules('userpass', 'Password', 'required');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

		if($this->input->post('username') !='' && $this->input->post('userpass') !=''){
			if($this->form_validation->run() == FALSE) {   } else {
				$username = $this->input->post('username');
				$userpass = md5($this->input->post('userpass'));
				$result = $this->auth->verification($username, $userpass);
				//print_r($result);die;
				if($result){
					echo "done";
				}else{
					echo "<div class='alert alert-danger'>
							 Invalid Email ID And Password.
						  </div>";
				}
			}
		}else{
			echo "<div class='alert alert-danger'>
						Fields are blank.
				  </div>";
		}
	}
	
	// USERS LOGOUT FUNCTION HERE //
	public function logout()
	{
		// Removing session data
		$userdata = array(
			'id' => '',
			'email' => '',
            'name' => ''
        );
		$this->session->set_userdata($userdata);
		redirect('welcome','refresh');
	}


}
