<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {

	public function __construct() {

    	parent::__construct();
    	$this->load->model('Frontend', 'front'); 
	}

	public function fillStateCity(){

		$pincode = $this->input->post('cod');
		$result['stateCity'] = $this->front->setStateCityInfo($pincode);
		//print_r($result);die;
		echo json_encode($result);
	}

	public function saveOrders(){

		$customerData = $this->input->post();
		
		//print_r($orderno);die;
		if(!empty($customerData)){
			$customerProfile = array(
				'user_name' => $this->input->post('fname'),
				'user_address1' => $this->input->post('add1'),
				'user_address2' => $this->input->post('add2'),
				'user_nearby_landmark' => $this->input->post('landmark'),
				'user_pincode' => $this->input->post('pincode'),
				'user_city' => $this->input->post('city'),
				'user_state' => $this->input->post('state'),
				'user_mobile_no' => $this->input->post('cmob'),
				'user_whatsapp_no' => $this->input->post('wmob'),
				'user_email' => $this->input->post('email'),
				'user_created' => date('Y-m-d H:i:s')
			);
			$user_id = $this->front->saveCustomerProfile($customerProfile);
			
			//$orderReferenceID = $this->front->getOrderID(); // GET ORDERS REFERENCE ID //

			// GET ORDERS REFERENCE ID //
			$year = date('y');
			$month = date('m');
			$random = rand(1000, 9999);
			$orderReferenceID = $year.$month.$random;

			$orderArray = array(
				'user_id' => $user_id,
				'ord_reference_id' => $orderReferenceID,
				'pro_id' => $this->input->post('product'),
				'cate_id' => $this->input->post('tmp_cate_id'),
				'ord_price' => $this->input->post('price'),
				'ord_product_size' => $this->input->post('product_size'),
				'ord_qty' => $this->input->post('qty'),
				'ord_discound_price' => $this->input->post('offerAmount'),
				'ord_total_price' => $this->input->post('total'),
				'ord_shipping' => $this->input->post('shipping'),
				'ord_mode_of_payments' => $this->input->post('paymentmode'),
				'ord_txt_message' => $this->input->post('messagetxt'),
				'ord_status' => '0',
				'ord_created' => date('Y:m-d H:i:s')
			);
			$orders['ord_id'] = $this->front->saveOrderinformation($orderArray);
			// DELETE TEMPORARY CUSTOMER DETAIL FROM TEMPORARY CUSTOMER TABLE //
			$tempCustoId = $this->input->post('tmp_hidden_custo_id');
			$tempCutomer = $this->front->deleteTempCustomerDetailById($tempCustoId);
			// DELETE TEMPORARY CHECKOUT PRODUCT DETAIL //
			$tmpid = $this->input->post('tmp_id');
			$temp_data = $this->front->deleteTempCheckoutProductDetailById($tmpid);
			// CREATE SESSION FOR CUSTOMER ORDER //
			$this->session->set_userdata(array('ord_id' => $orders));
			$orders['mode'] = $this->input->post('paymentmode');

			if($orders){
				echo json_encode($orders);
			}else{
				echo "fail";
			}
		}
	}

	public function success(){

		$ord_id = $this->uri->segment(3);
		if(empty($_POST)){
			redirect('users/welcome');
		}

		$status=$_POST["status"];
		$firstname=$_POST["firstname"];
		$amount=$_POST["amount"];
		$txnid=$_POST["txnid"];
		$posted_hash=$_POST["hash"];
		$key=$_POST["key"];
		$productinfo=$_POST["productinfo"];
		$email=$_POST["email"];
		$salt = "e5iIg1jwi8";
		$sno = $_POST["udf1"];

		$retHashSeq = $salt.'|'.$status.'||||||||||'.$sno.'|'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;

		$hash = strtolower(hash("sha512", $retHashSeq));

		if ($hash != $posted_hash) {
	       $this->session->set_flashdata('msg_error', "An Error occured while processing your payment. Try again..");
		}

		else{
			$this->session->set_flashdata('msg_success', "Payment was successful..");
		}
		unset($_POST);
		
		redirect('orders/orderSummery/'.$ord_id);
	}

	public function error(){

		$ord_id = $this->uri->segment(3);
		unset($_POST);
		$this->session->set_flashdata('msg_error', "Your payment was failed. Try again..");
		$ordid = $this->session->userdata('ord_id');
		redirect('orders/orderSummery/'.$ord_id);
	}

	//Method that handles when payment was cancelled.
	public function cancel(){

		$ord_id = $this->uri->segment(3);
		unset($_POST);
		$this->session->set_flashdata('msg_error', "Your payment was cancelled. Try again..");
		$ordid = $this->session->userdata('ord_id');
		redirect('orders/orderSummery/'.$ord_id);
	}

	public function orderSummery(){

		$ord_id = $this->uri->segment(3);
		$data['orders'] = $this->front->getOrderLists($ord_id);

		$this->load->view('includes/header');
		$this->load->view('includes/top_header');
		$this->load->view('includes/navbar');
		$this->load->view('orderSummary', $data);
		$this->load->view('includes/footer');
	}
}