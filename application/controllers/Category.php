<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

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

	public function lists($categoty_slug_name)
	{		
		$categoty_slug_name = $this->uri->segment(3);
		$data['cate'] = $this->front->get_related_category_id($categoty_slug_name);
		$cateid = $data['cate']->cate_id;
		
		$data['catelist'] = $this->front->get_all_category_list_by_id($cateid);
		// $data['products'] = $this->front->home_products_list();
		$data['picture'] = $this->front->home_products_pictures();
		$data['price'] = $this->front->getDefaultPrice();
		$data['category'] = $this->front->getAllCategoryList();
		// $data['banners'] = $this->front->getAllActiveBanners();
		// echo "<pre>";
		// print_r($data);
		
		$this->load->view('includes/header', $data);
		$this->load->view('includes/top_header');
		$this->load->view('includes/navbar');
		$this->load->view('category');
		$this->load->view('includes/footer');
	}
	
}
