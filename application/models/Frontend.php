<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	// GET PRODUCTS LIST //
	public function home_products_list()
	{
		$this->db->select('*');
		$this->db->from('lovegift_products');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	public function getAllCategoryList()
	{
		$this->db->select('*');
		$this->db->from('lovegift_category');
		$this->db->where('cate_status','0');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	// GET ALL ACTIVE BANNERS LIST //
	public function getAllActiveBanners()
	{
		$this->db->select('*');
		$this->db->from('lovegifts_banners');
		$this->db->where('bann_status','0');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}

	public function home_products_pictures()
	{
		$this->db->select('pic_id,pro_id,pic_param');
		$this->db->from('lovegift_pictures');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}

	// GET PRODUCT ID BY PRODUCT SLUG //
	public function getProductId($product_slug)
	{
		$this->db->select('pro_id');
		$this->db->from('lovegift_products');
		$this->db->where('pro_title_slug', $product_slug);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->row();
	}

	public function productsDetail($proid)
	{
		$this->db->select('*');
		$this->db->from('lovegift_products');
		$this->db->where('pro_id', $proid);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}

	public function productSizePrices($proid)
	{
		$this->db->select('*');
		$this->db->from('lovegift_sizes');
		$this->db->where('pro_id', $proid);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}

	public function getSelectedProductPrice($proid)
	{
		$this->db->select('size_id,size_related_price');
		$this->db->from('lovegift_sizes');
		$this->db->order_by('size_related_price', 'DESC');
		$this->db->limit('1');
		$this->db->where('pro_id', $proid);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	
	// GET ALL CATEGORY ID BY THEIR SLUG //
	public function get_related_category_id($categoty_slug_name)
	{
		$this->db->select('cate_id,cate_name');
		$this->db->from('lovegift_category');
		$this->db->where('cate_title_slug',$categoty_slug_name);
		$query = $this->db->get();
		return $query->row();
	}
	// GET ALL PRODUCT LIST BY THEIR ID //
	public function get_all_category_list_by_id($cateid)
	{
		$this->db->select('*');
		$this->db->from('lovegift_products');
		$this->db->where('cate_id',$cateid);
		$query = $this->db->get();
		return $query->result();
	}
	// GET ALL EXTRA FIELD LIST ACCORDING PRODUCT ID //
	public function getAllExtraField($proid)
	{
		$this->db->select('*');
		$this->db->from('lovegifts_extra_info');
		$this->db->where('pro_id', $proid);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	// GET PRODUCT META INFORMATION //
	public function getProductsMetaInfo($proid)
	{
		$this->db->select('*');
		$this->db->from('lovegift_meta_data');
		$this->db->where('pro_id', $proid);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}

	public function getDefaultPrice()
	{
		$this->db->select('size_id,pro_id,size_related_price');
		$this->db->from('lovegift_sizes');
		$this->db->order_by('size_related_price', 'DESC');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}

	public function getPriceListById($proSizePrice)
	{
		$this->db->select('*');
		$this->db->from('lovegift_sizes');
		$this->db->where('size_id', $proSizePrice);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->row();

	}

	public function saveCustomerCheckoutInfo($data)
	{
		$this->db->insert('lovegift_temp_checkout', $data);
		return $this->db->insert_id();
	}
	public function getProductsSlug($temp_id)
	{
		$this->db->select('pro_title_slug');
		$this->db->from('lovegift_temp_checkout');
		$this->db->where('temp_ckout_id', $temp_id);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->row();
	}
	public function getTempProductIdBySlug($pro_slug)
	{
		$this->db->select('temp_ckout_id');
		$this->db->from('lovegift_temp_checkout');
		$this->db->where('pro_title_slug', $pro_slug);
		$this->db->order_by('temp_ckout_id','DESC');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->row();
	}

	public function productsTempCheckoutDetail($pro_id)
	{
		$this->db->select('`pp`.`pro_title`, `pp`.`cate_id`, `pp`.`pro_offers`, `pp`.`pro_required_picture`,`pp`.`pro_facebook_pixel`, `pp`.`pro_cash_on_delivery`,`mt`.`meta_title`,`mt`.`meta_keywords`,`mt`.`meta_description`, `ps`.`size_param`, `ps`.`size_related_price`, `tc`.*');
		$this->db->from('lovegift_temp_checkout tc');
		$this->db->join('lovegift_products pp','tc.pro_id=pp.pro_id','left');
		$this->db->join('lovegift_sizes ps','tc.size_id=ps.size_id','left');
		$this->db->join('lovegift_meta_data mt','tc.pro_id=mt.pro_id','left');
		$this->db->where('tc.temp_ckout_id', $pro_id);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}

	public function getPincodeByProducts()
	{
		$this->db->select('*');
		$this->db->from('lovegift_availability');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}

	public function checkAvailability($cod)
	{
		$this->db->select('pin_pick_up');
		$this->db->from('lovegift_pincode');
		//$this->db->where('pro_id', $proid);
		$this->db->where('pin_code', $cod);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->row();
	}

	public function setStateCityInfo($pincode)
	{
		$this->db->select('pin_city_name,pin_state_name,pin_pick_up');
		$this->db->from('lovegift_pincode');
		$this->db->where('pin_code', $pincode);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->row();		
	}

	public function saveCustomerProfile($customerProfile)
	{
		$this->db->insert('lovegift_users', $customerProfile);
		return $this->db->insert_id();
	}

	public function saveOrderinformation($orderArray)
	{
		$this->db->insert('lovegift_orders', $orderArray);
		//echo $this->db->last_query();
		return $this->db->insert_id();
	}
	
	public function getReferenceIdByOrderId($ordid)
	{
		$this->db->select('ord_reference_id');
		$this->db->from('lovegift_orders');
		$this->db->where('ord_id', $ordid);
		$query = $this->db->get();
		return $query->row();
	}
	
	// GET MODE OF PAYMENT BY ORDER REFERENCE //
	public function get_payment_mode($ord_id)
	{
		$this->db->select('ord_mode_of_payments');
		$this->db->from('lovegift_orders');
		$this->db->where('ord_reference_id', $ord_id);
		$query = $this->db->get();
		return $query->row();
	}
	
	// UPDATE ORDER STATUS BY MODE OF PAYMENT AND ORDER REFERENCE ID //
	public function update_order_status_mode($ord_id, $data1)
	{
		$this->db->where('ord_reference_id', $ord_id);
		$this->db->update('lovegift_orders', $data1);
		//echo $this->db->last_query();
		return $ord_id;
	}
	
	// GET ORDER DETAIL FOR SESSION //
	public function get_order_status_for_session($ord_id)
	{
		$this->db->select('ord_reference_id,ord_status');
		$this->db->from('lovegift_orders');
		$this->db->where('ord_reference_id',$ord_id);
		$query = $this->db->get();
		return $query->row();
	}
	
	public function deleteTempCheckoutProductDetailById($tmpid)
	{
		$this->db->where('temp_ckout_id', $tmpid);
		$this->db->delete('lovegift_temp_checkout');
		return $tmpid;
	}
	public function deleteTempCustomerDetailById($tempCustoId)
	{
		$this->db->where('tmp_custo_id', $tempCustoId);
		$this->db->delete('lovegift_temp_checkout_customers');
		return $tempCustoId;
	}
	

	public function getOrderLists($ord_id)
	{
		$this->db->select('usr.*,pro.pro_title,pro.pro_offers, ord.*');
		$this->db->from('lovegift_orders ord');
		$this->db->join('lovegift_users usr','ord.user_id=usr.user_id','left');
		$this->db->join('lovegift_products pro','ord.pro_id=pro.pro_id','left');
		$this->db->where('ord.ord_reference_id', $ord_id);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->row();
	}
	
	// SEND MESSAGE FOR ORDER GENERATION //
	public function send($ordno, $username, $mobile, $product)
	{
		$message1 = urlencode("Hi '".$username."' Thank you for your order '".$product."'.Your Order Number is '".$ordno."'.\r\n For any query call us at 9988655011,\r\n Happy Gifting :) <a href='https://api.whatsapp.com/send?phone=919988655011&text=Hi%20Love%20Gifts.My%20Name%20is%20customer%20Name.My%20order%20number%20is%204540.'>lovegifts.in</a>");
		$message = rtrim($message1, " ");
					
	        $api_url ="http://manage.staticking.net/index.php/smsapi/httpapi/?uname=kamal03&password=123456&sender=LUVGFT&receiver=".$mobile."&route=TA&msgtype=1&sms=".$message."
";				
		$stream_options = array(
			'http' => array(
			   'method'  => 'POST',
			),
		);
		$context  = stream_context_create($stream_options);
		$response = file_get_contents($api_url, null, $context);
                //print_r($response);die;
		return $response;
	}
	
	
	
	public function getOrderListsById($ord_id)
	{
		$this->db->select('usr.*,pro.pro_title,pro.pro_offers, ord.*');
		$this->db->from('lovegift_orders ord');
		$this->db->join('lovegift_users usr','ord.user_id=usr.user_id','left');
		$this->db->join('lovegift_products pro','ord.pro_id=pro.pro_id','left');
		$this->db->where('ord.ord_reference_id', $ord_id);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	
	public function getExtrainfoById()
	{
		$this->db->select('*');
		$this->db->from('lovegifts_extra_info');
		$query = $this->db->get();
		return $query->result();
	}

	public function saveTempCustomerInformation($tmpCustomerArray)
	{
		$this->db->insert('lovegift_temp_checkout_customers', $tmpCustomerArray);
		return $this->db->insert_id();
	}
	public function updateTempCustomerInformation($id, $tmpCustomerArray)
	{
		$this->db->where('tmp_custo_id', $id);
		$this->db->update('lovegift_temp_checkout_customers', $tmpCustomerArray);
		//echo $this->db->last_query();
		return $id;
	}
	public function getLastInsertedTempCustomerId()
	{
		$this->db->select('tmp_custo_id');
		$this->db->from('lovegift_temp_checkout_customers');
		$this->db->order_by('tmp_custo_id','desc');
		$this->db->limit('1');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
}
