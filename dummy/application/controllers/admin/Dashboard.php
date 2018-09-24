<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_dashboard', 'adDash');
		$this->load->model('AdminProducts', 'adPro');
	}

	public function index()
	{
		// $name = $this->session->userdata('name');
		// if(empty($reference)){
		// 	redirect('welcome/index','refresh');
		// }

		$data['orders'] = $this->adDash->getAllOrders();
		$data['products'] = $this->adDash->getAllProducts();
		$data['users'] = $this->adDash->getAllUsers();
		$data['notification'] = $this->adDash->getAllNotifications();
		$data['recentOrders'] = $this->adPro->getAllOrderList();
		
		$this->load->view('admin/includes/head');
		$this->load->view('admin/includes/header');
		$this->load->view('admin/includes/sidebar');
		$this->load->view('admin/dashboard', $data);
		$this->load->view('admin/includes/foot');
		$this->load->view('admin/includes/footer');
	}
}
