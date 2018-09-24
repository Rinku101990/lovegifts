<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

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

	public function saveCustomerCheckoutParam()
	{
		//$data = $this->input->post();
		//print_r($data);

		$data['pro_id'] = $this->input->post('product_id');
		$data['cate_id'] = $this->input->post('pro_category');
		$data['pro_title_slug'] = $this->input->post('product_slug');
		$data['size_id'] = $this->input->post('product_size');
		$data['pin_code'] = $this->input->post('product_cod');
		$data['temp_ckout_created'] = date('Y-m-d H:i:s');

		//print_r($data);die;
		$temp_id = $this->front->saveCustomerCheckoutInfo($data);
		$slug_title = $this->front->getProductsSlug($temp_id);
		$result = $slug_title->pro_title_slug;
		//print_r($result);
		if($result){
			//echo "done";
			echo $result;
		}else{
			echo "fail";
		}
	}

	public function express()
	{
		$pro_slug = $this->uri->segment(3);
		$product_id = $this->front->getTempProductIdBySlug($pro_slug);
		//print_r($product_id);
		$proid = $product_id->temp_ckout_id;

		$data['productView'] = $this->front->productsTempCheckoutDetail($proid);
		$data['picture'] = $this->front->home_products_pictures();
		$data['meta_info'] = $this->front->getProductsMetaInfo($proid);
		$data['category'] = $this->front->getAllCategoryList();
		$data['temp_id'] = $this->front->getLastInsertedTempCustomerId();
		//print_r($data);die;
		$this->load->view('includes/header', $data);
		$this->load->view('includes/top_header');
		$this->load->view('includes/navbar');
		$this->load->view('checkout');
		$this->load->view('includes/footer_ck');
	}

	public function tempCustomerInfo()
	{
		// $data = $this->input->post();
		// print_r($data);
		
		if(($this->input->post('tmp_hidden_custo_id'))!=''){

			$id = $this->input->post('tmp_hidden_custo_id');
			$tmpCustomerArray = array(
				'tmp_custo_fname' => $this->input->post('fname'),
				'tmp_custo_add1' => $this->input->post('add1'),
				'tmp_custo_add2' => $this->input->post('add2'),
				'tmp_custo_landmark' => $this->input->post('landmark'),
				'tmp_custo_pincode' => $this->input->post('pincode'),
				'tmp_custo_city' => $this->input->post('city'),
				'tmp_custo_state' => $this->input->post('state'),
				'tmp_custo_cmob' => $this->input->post('cmob'),
				'tmp_custo_wmob' => $this->input->post('wmob'),
				'tmp_custo_email' => $this->input->post('email'),
				'tmp_custo_message' => $this->input->post('messagetxt')
			);
			$result = $this->front->updateTempCustomerInformation($id, $tmpCustomerArray);
			if($result){
				echo $result;
			}else{
				echo "fail";
			}
		}else{
			
			$tmpCustomerArray = array(
				'tmp_custo_fname' => $this->input->post('fname'),
				'tmp_custo_add1' => $this->input->post('add1'),
				'tmp_custo_add2' => $this->input->post('add2'),
				'tmp_custo_landmark' => $this->input->post('landmark'),
				'tmp_custo_pincode' => $this->input->post('pincode'),
				'tmp_custo_city' => $this->input->post('city'),
				'tmp_custo_state' => $this->input->post('state'),
				'tmp_custo_cmob' => $this->input->post('cmob'),
				'tmp_custo_wmob' => $this->input->post('wmob'),
				'tmp_custo_email' => $this->input->post('email'),
				'tmp_custo_message' => $this->input->post('messagetxt'),
				'pro_id' => $this->input->post('product'),
				'temp_pro_id' => $this->input->post('temp_pro_id'),
				'tmp_custo_size' => $this->input->post('product_size'),
				'tmp_custo_price' => $this->input->post('price'),
				'tmp_custo_qty' => $this->input->post('qty'),
				'tmp_custo_amount' => $this->input->post('offerAmount'),
				'tmp_cust_total_amount' => $this->input->post('totalPrice'),
				'tmp_custo_status' => 'tmp',
				'tmp_custo_created' => date('Y-m-d H:i:s')
			);
			$result = $this->front->saveTempCustomerInformation($tmpCustomerArray);
			if($result){
				echo $result;
			}else{
				echo "fail";
			}
		}
	}

}
