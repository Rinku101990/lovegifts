<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Payumoney class this is a sample code to integrate payumoney in codeigniter 3
*/
class Ccavenue extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('string', 'url'));
		$this->load->library('session');
		$this->load->model('Frontend', 'front');
	}

	//Method to show payment form
	public function index()
	{
		$ord_id = $this->uri->segment(3);

		$data['orders'] = $this->front->getOrderLists($ord_id);
		$this->load->view('ccavRequestHandler', $data);

	}
}