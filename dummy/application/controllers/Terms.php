<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Terms extends CI_Controller {

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
		$this->load->model('Frontend', 'front');
    }

    public function index()
    {
		$data['category'] = $this->front->getAllCategoryList();

        $this->load->view('includes/header',$data);
		$this->load->view('includes/top_header');
		$this->load->view('includes/navbar');
		$this->load->view('terms');
		$this->load->view('includes/footer');
    }
}