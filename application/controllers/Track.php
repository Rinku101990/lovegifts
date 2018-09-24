<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Track extends CI_Controller {

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
		$this->load->model('Admin_orders','adTrack');
		$this->load->model('Frontend', 'front'); 
	}

	public function index()
	{
		$data['category'] = $this->front->getAllCategoryList();

		$this->load->view('includes/header', $data);
		$this->load->view('includes/top_header');
		$this->load->view('includes/navbar');
		$this->load->view('trackorder');
		$this->load->view('includes/footer');
	}
	
	public function status()
	{
		$orders_no = $this->input->post('order_no');
		$mobile_no = $this->input->post('mobile_no');
		$data['orderStatus'] = $this->adTrack->getOrderStatuslist($orders_no, $mobile_no);
		$data['category'] = $this->front->getAllCategoryList();

		$this->load->view('includes/header', $data);
		$this->load->view('includes/top_header');
		$this->load->view('includes/navbar');
		$this->load->view('order_status');
		$this->load->view('includes/footer');
	}
	
	// VERIFYING ORDER NO //
	public function verifying_order()
	{
		$ordno = $this->input->post('order_no');
		$mobno = $this->input->post('mobile_no');
		$result = $this->adTrack->verifying($ordno, $mobno);
		if($result){
			echo "verified";
		}else{
			echo "wrong";
		}
	}
	
	// VERIFYING ORDER NO FOR MAIL //
	public function verifying_order_for_mail()
	{
		$ordno = $this->input->post('order_no');
		$mobno = $this->input->post('mobile_no');
		$result = $this->adTrack->verifying_for_mail($ordno, $mobno);
		if($result){
			echo "success";
		}else{
			echo "bad";
		}
	}
}
