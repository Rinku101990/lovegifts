<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacts extends CI_Controller {

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
		$this->load->model('Frontend', 'front');
	}

	public function index()
	{
		$data['category'] = $this->front->getAllCategoryList();

		$this->load->view('includes/header', $data);
		$this->load->view('includes/top_header');
		$this->load->view('includes/navbar');
		$this->load->view('contact');
		$this->load->view('includes/footer');
	}

	public function send_query()
	{
		$send_mail = $this->input->post();
		if(!empty($send_mail)){
			// FORM VARIABLE //
			$user_name = $this->input->post('name');
			$user_mobile = $this->input->post('mobile');
			$user_email = $this->input->post('email');
			$user_subject = $this->input->post('subject');
			$user_message = $this->input->post('message');

			// ---------------- SEND MAIL FORM ---------------- //
			$To = 'hello@lovegifts.in';
			$SubjectLine = "Query For LoveGifts.com"; 
			$EmailFrom = $user_email; 
			
			// YOUR EMAIL SUBJECT HERE //, the Content-type header must be set
			$EmailHeader  = 'MIME-Version: 1.0' . "\r\n"; 
			$EmailHeader .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			// EMAIL HEDING TO EMAIL CONTENT HERE //
			$EmailHeader .= 'From: '."LoveGifts.in<no-reply@lovegifts.in>"."\r\n".'Reply-To: '."no-reply@lovegifts.in"."\r\n" . 'X-Mailer: PHP/' . phpversion();
			
			// EMAIL CONNECT WHAT YOU WRITE HERE //
			$EmailBody = "<html><body>Hi lovegifts.in". "<br><br>"; 
			$EmailBody .= "<strong>Name:</strong> "."$user_name". "<br><br>";
			$EmailBody .= "<strong>Email:</strong> ". " $user_email." ."<br><br>";
			$EmailBody .= "<strong>Mobile No:</strong> ". " $user_mobile." ."<br><br>";
			$EmailBody .= "<strong>Subject:</strong> ". " $user_subject." ."<br><br>";
			$EmailBody .= "<strong>Message:</strong> ". " $user_message." ."<br><br>";
			$EmailBody .= "</body></html>";
			
			// SEND EMAIL TO EMAIL ADDRESS  HERE //
			$SendEmailTo = mail($To,$SubjectLine,$EmailBody,$EmailHeader);

			}

			// IF YOUR EMAIL SEND SUCCESSFULLY TO ADMIN
			if($SendEmailTo){
			$info['msg'] = '<span class="text-success" style="font-weight:bold">Query send Successfully.</span>';
			$info['status'] = 'success';
			}else{
			$info['msg'] = '<span class="text-danger" style="font-weight:bold">Message not send successfully.</span>';
			$info['status'] = 'error';
			}
			echo json_encode($info);
	}
}