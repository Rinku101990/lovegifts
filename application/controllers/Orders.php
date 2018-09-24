<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {

	public function __construct() {
	    	parent::__construct();
	    	$this->load->model('Frontend', 'front');
	    	
	    	$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
	        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
	        $this->output->set_header('Pragma: no-cache'); 
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
				'ord_created' => date('Y:m-d H:i:s')
			);
			$ordid = $this->front->saveOrderinformation($orderArray);
			//$ordid = $ord_reference_id->ord_id;
			$orders['ord_id'] = $ordid;
			$orders['reference_id'] = $this->front->getReferenceIdByOrderId($ordid);
			// DELETE TEMPORARY CUSTOMER DETAIL FROM TEMPORARY CUSTOMER TABLE //
			$tempCustoId = $this->input->post('tmp_hidden_custo_id');
			$tempCutomer = $this->front->deleteTempCustomerDetailById($tempCustoId);
			// DELETE TEMPORARY CHECKOUT PRODUCT DETAIL //
			$tmpid = $this->input->post('tmp_id');
			$temp_data = $this->front->deleteTempCheckoutProductDetailById($tmpid);
			// CREATE SESSION FOR CUSTOMER ORDER //
			$this->session->set_userdata(array('ord_reference_id' => $orders));
			$orders['mode'] = $this->input->post('paymentmode');
			//print_r($orders);die;
			if($orders){
				echo json_encode($orders);
			}else{
				echo "fail";
			}
		}
	}


	public function orderSummary(){

		$ord_no = $this->session->userdata('order_no');
		$status = $this->session->userdata('status');
		if(isset($ord_no) && isset($status)){
			$this->session->unset_userdata($ord_no,$status);
			$this->session->sess_destroy();
			redirect('','refresh');
		}
		
		$ord_id = $this->uri->segment(3);
		$data['orders'] = $this->front->getOrderListsById($ord_id);
		$data['category'] = $this->front->getAllCategoryList();
		//$data['extra'] = $this->front->getExtrainfoById();
		
		$ord_no = $data['orders'][0]->ord_reference_id;
		if(!empty($ord_no)){
		
		 $ordno    = $data['orders'][0]->ord_reference_id;
		 $username = $data['orders'][0]->user_name;
		 $mobile   = $data['orders'][0]->user_mobile_no;
		 $product  = $data['orders'][0]->pro_title;
		 
		 $payment_mode = $this->front->get_payment_mode($ord_id);
		 if($payment_mode->ord_mode_of_payments==0){
			$data1['ord_status'] = "success";
			$this->front->update_order_status_mode($ord_id, $data1);
		 }else if($payment_mode->ord_mode_of_payments!=0){
			$data1['ord_status'] = "success";
			$this->front->update_order_status_mode($ord_id, $data1);
		 }else{
			
		 }
		 
		 $order_for_session = $this->front->get_order_status_for_session($ord_id);
		 $ord_session = array('order_no'=>$order_for_session->ord_reference_id, 'status'=>$order_for_session->ord_status);
		 $this->session->set_userdata($ord_session);
		 
		 
		 $data['response'] = $this->front->send($ordno, $username, $mobile, $product);
		 
		 $this->load->view('includes/header', $data);
		 $this->load->view('includes/top_header');
		 $this->load->view('includes/navbar');
		 $this->load->view('orderSummary');
		 $this->load->view('includes/footer');
		}
	}
	
	public function cancel()
	{
	
		$ord_no = $this->session->userdata('order_no');
		$status = $this->session->userdata('status');
		if(isset($ord_no) && isset($status)){
			$this->session->unset_userdata($ord_no,$status);
			$this->session->sess_destroy();
			redirect('','refresh');
		}
		
		$ord_id = $this->uri->segment(3);
		$ordid = $this->session->userdata('ord_id');
		$data['category'] = $this->front->getAllCategoryList();
		
		$payment_mode = $this->front->get_payment_mode($ord_id);
		if($payment_mode->ord_mode_of_payments==0){
			$data1['ord_status'] = "cancel";
			$this->front->update_order_status_mode($ord_id, $data1);
		}else if($payment_mode->ord_mode_of_payments!=0){
			$data1['ord_status'] = "cancel";
			$this->front->update_order_status_mode($ord_id, $data1);
		}else{
			
		}
		
		$order_for_session = $this->front->get_order_status_for_session($ord_id);
		$ord_session = array('order_no'=>$order_for_session->ord_reference_id, 'status'=>$order_for_session->ord_status);
		$this->session->set_userdata($ord_session);

		$this->load->view('includes/header', $data);
		$this->load->view('includes/top_header');
		$this->load->view('includes/navbar');
		$this->load->view('payment-failed');
		$this->load->view('includes/footer');
	}
}