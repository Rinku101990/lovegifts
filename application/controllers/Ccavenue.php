<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Ccavenue extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('Frontend', 'front');
	}

	//Method to show payment form
	public function index()
	{
		$data['category'] = $this->front->getAllCategoryList();
	
		$ord_id = $this->uri->segment(3);
		$data['orders'] = $this->front->getOrderLists($ord_id);
		
		$this->load->view('includes/header', $data);
		$this->load->view('includes/top_header');
		$this->load->view('includes/navbar');
		$this->load->view('payment_confirm');
		$this->load->view('includes/footer_ck');

	}
	// CALL CCAVENUE REQUEST HANDELER //
	public function ccavRequestHandler()
	{
	   $this->load->view('ccavRequestHandler');
	}
}