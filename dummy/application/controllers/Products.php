<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

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

	public function details()
	{

		$product_slug = $this->uri->segment(3);
		$pro_id = $this->front->getProductId($product_slug);
		$proid = $pro_id->pro_id;
		//print_r($proid);die;
		$data['productView'] = $this->front->productsDetail($proid);
		$data['picture'] = $this->front->home_products_pictures();
		$data['sizePrice'] = $this->front->productSizePrices($proid);
		$data['selectedPrice'] = $this->front->getSelectedProductPrice($proid);
		$data['meta_info'] = $this->front->getProductsMetaInfo($proid);
		$data['category'] = $this->front->getAllCategoryList();
		$data['extra_field'] = $this->front->getAllExtraField($proid);

		$this->load->view('includes/header', $data);
		$this->load->view('includes/top_header');
		$this->load->view('includes/navbar');
		$this->load->view('details');
		$this->load->view('includes/footer');
	}

	public function getPriceListByProductId()
	{
		$proSizePrice = $this->input->post('pro_size_id');
		$result['price'] = $this->front->getPriceListById($proSizePrice);
		echo json_encode($result);
	}

	public function check_product_available()
	{
		$cod = $this->input->post('cod');
		//$proid = $this->input->post('proid');
		$result['status'] = $this->front->checkAvailability($cod);
		if($result > 0){
			echo json_encode($result);
			// echo "<div style='color:#155724;margin-top:5px'>
			// 	  	<p><b>Cash On Delivery Available.</b></p>
			// 	  </div>";
		}else{
			echo "<div style='color:#721c24;margin-top:5px;margin-left:8px'>
				  	<p><b>Cash On Delivery Not Available.</b></p>
				  </div>";
		}
	}

	public function checkout()
	{
		$pro_id = $this->uri->segment(3);
		$data['productView'] = $this->front->productsTempCheckoutDetail($pro_id);
		$data['picture'] = $this->front->home_products_pictures();
		//print_r($data);die;
		$this->load->view('includes/header', $data);
		$this->load->view('includes/top_header');
		$this->load->view('includes/navbar');
		$this->load->view('checkout');
		$this->load->view('includes/footer');
	}

}
