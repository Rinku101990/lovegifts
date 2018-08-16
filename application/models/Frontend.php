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
		$this->db->select('size_related_price');
		$this->db->from('lovegift_sizes');
		$this->db->order_by('size_related_price', 'DESC');
		$this->db->limit('1');
		$this->db->where('pro_id', $proid);
		$query = $this->db->get();
		//echo $this->db->last_query();
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
		$this->db->select('pro_id,size_related_price');
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
	// GENERATE RANDOM NUMBER FOR ORDER //
	// public function getOrderID()
	// {
	// 	$this->db->select('ord_reference_id');
	// 	$this->db->from('lovegift_orders');
	// 	$this->db->order_by('user_id','desc');
	// 	$this->db->limit('1');

	// 	$query = $this->db->get();
	// 	$ORDID = '';
	// 	$LastInsertedID = 0;
	// 	$countID = $query->num_rows();
	// 	if($countID > 0){
	// 		$result = $query->row();
	// 		$ORDID = $result->ord_reference_id;
	// 	}else{
	// 		$ORDID = 'ORD00000';
	// 	}
	// 	$LastInsertedID = substr($ORDID, 3, 5);
	// 	$NEWIDS = 'ORD' . str_pad($LastInsertedID + 1, 5, '0', STR_PAD_LEFT);
	// 	return $NEWIDS;

	// }

	public function getOrderLists($ord_id)
	{
		$this->db->select('usr.*,pro.pro_title,pro.pro_offers, ord.*');
		$this->db->from('lovegift_orders ord');
		$this->db->join('lovegift_users usr','ord.user_id=usr.user_id','left');
		$this->db->join('lovegift_products pro','ord.pro_id=pro.pro_id','left');
		$this->db->where('ord.ord_id', $ord_id);
		$query = $this->db->get();
		//echo $this->db->last_query();
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
