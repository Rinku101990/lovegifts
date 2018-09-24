<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_products extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	// SAVE PRODUCTS INFORMATION //
	public function saveProductInfo($productsArray)
	{
		$this->db->insert('lovegift_products', $productsArray);
		return $this->db->insert_id();
	}

	// SAVE PRODUCTS SIZE //
	public function saveProductSizeInfo($productSizeArray)
	{
		$this->db->insert('lovegift_sizes', $productSizeArray);
		return $this->db->insert_id();
	}

	// SAVE PINCODE LIST //
	// public function savePincodeInfo($pincodeArray)
	// {
	// 	$this->db->insert('lovegift_availability', $pincodeArray);
	// 	return $this->db->insert_id();
	// }

	// SAVE PRODUCTS PRICE RELATED PRODUCT AND SIZES //
	public function savePriceSizeInfo($prices)
	{
		$this->db->insert_batch('lovegift_sizes', $prices); 
		return $this->db->insert_id();
	}

	// GET PINCODE LIST OF PRODUCT VISIBILITY //
	public function getPincodeList()
	{
		$this->db->select('pin_id,pin_code');
		$this->db->from('lovegift_pincode');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();

	}

	// SAVE PRODUCTS META DATA RELATED PRODUCTS //
	public function saveMetaDataInfo($metaDataArray)
	{
		$this->db->insert('lovegift_meta_data', $metaDataArray); 
		return $this->db->insert_id();
	}

	// SAVE PRODUCTS IMAGES RELATED PRODUCTS //
	public function saveProductPictureList($uploadData)
	{
		$this->db->insert_batch('lovegift_pictures', $uploadData); 
		return $this->db->insert_id();
	}

	// GET PRODUCTS LIST //
	public function getProductsList()
	{
		$this->db->select('*');
		$this->db->from('lovegift_products');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}

	// DELETE PRODUCTS BY ID //
    public function deleteProductsById($product_id)
    {
        $this->db->where('pro_id', $product_id);
        $this->db->delete('lovegift_products');
        //echo $this->db->last_query();
        return $this->db->affected_rows();

    }

    // GET RRODUCT INFORMATION BY PRODUCT ID /
    public function getProductDetailById($product_id)
    {
    	$this->db->select('*');
    	$this->db->from('lovegift_products');
    	$this->db->where('pro_id', $product_id);
    	$query = $this->db->get();
    	//echo $this->db->last_query();
    	return $query->row();
    }
    public function getProductPictureById($product_id)
    {
    	$this->db->select('*');
    	$this->db->from('lovegift_pictures');
    	$this->db->where('pro_id', $product_id);
    	$query = $this->db->get();
    	//echo $this->db->last_query();
    	return $query->row();
    }

    public function getProductPriceById($product_id)
    {
    	$this->db->select('*');
    	$this->db->from('lovegift_sizes');
    	$this->db->where('pro_id', $product_id);
    	$query = $this->db->get();
    	//echo $this->db->last_query();
    	return $query->row();
    }

    public function getAllOrderList()
    {
    	$this->db->select('pro.pro_title,ord.*');
    	$this->db->from('lovegift_orders ord');
    	$this->db->join('lovegift_products pro','ord.pro_id=pro.pro_id','left');
        $this->db->where('ord.ord_status','0');
    	$query = $this->db->get();
    	//echo $this->db->last_query();
    	return $query->result();
    }

    public function getAllDisableOrderList()
    {
        $this->db->select('pro.pro_title,ord.*');
        $this->db->from('lovegift_orders ord');
        $this->db->join('lovegift_products pro','ord.pro_id=pro.pro_id','left');
        $this->db->where('ord.ord_status','1');
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();
    }

    public function updatePhotoStatusYes($order_id, $data)
    {
    	$this->db->where('ord_id', $order_id);
    	$this->db->update('lovegift_orders', $data);
    	//echo $this->db->last_query();
    	return $order_id;
    }
    public function updatePhotoStatusNo($order_id, $data)
    {
    	$this->db->where('ord_id', $order_id);
    	$this->db->update('lovegift_orders', $data);
    	//echo $this->db->last_query();
    	return $order_id;
    }

    //SHIPPING STATUS CHANGE //
    public function updateShippingStatusYes($order_id, $data)
    {
    	$this->db->where('ord_id', $order_id);
    	$this->db->update('lovegift_orders', $data);
    	//echo $this->db->last_query();
    	return $order_id;
    }
    public function updateShippingStatusNo($order_id, $data)
    {
    	$this->db->where('ord_id', $order_id);
    	$this->db->update('lovegift_orders', $data);
    	//echo $this->db->last_query();
    	return $order_id;
    }

    // PHOTO CROPED STATUS  //
    public function updatePhotoCropStatusYes($order_id, $data)
    {
    	$this->db->where('ord_id', $order_id);
    	$this->db->update('lovegift_orders', $data);
    	//echo $this->db->last_query();
    	return $order_id;
    }
    public function updatePhotoCropStatusNo($order_id, $data)
    {
    	$this->db->where('ord_id', $order_id);
    	$this->db->update('lovegift_orders', $data);
    	//echo $this->db->last_query();
    	return $order_id;
    }
    // PHOTO PRINTED STATUS //

    public function updatePhotoPrintedStatusYes($order_id, $data)
    {
    	$this->db->where('ord_id', $order_id);
    	$this->db->update('lovegift_orders', $data);
    	//echo $this->db->last_query();
    	return $order_id;
    }
    public function updatePhotoPrintedStatusNo($order_id, $data)
    {
    	$this->db->where('ord_id', $order_id);
    	$this->db->update('lovegift_orders', $data);
    	//echo $this->db->last_query();
    	return $order_id;
    }

    // STATUS OF PHOTO CUTTING //
    public function updatePhotoCuttingStatusYes($order_id, $data)
    {
    	$this->db->where('ord_id', $order_id);
    	$this->db->update('lovegift_orders', $data);
    	//echo $this->db->last_query();
    	return $order_id;
    }
    public function updatePhotoCuttingStatusNo($order_id, $data)
    {
    	$this->db->where('ord_id', $order_id);
    	$this->db->update('lovegift_orders', $data);
    	//echo $this->db->last_query();
    	return $order_id;
    }

    // PHOTO PASTING STATUS //
     public function updatePhotoPastingStatusYes($order_id, $data)
    {
    	$this->db->where('ord_id', $order_id);
    	$this->db->update('lovegift_orders', $data);
    	//echo $this->db->last_query();
    	return $order_id;
    }
    public function updatePhotoPastingStatusNo($order_id, $data)
    {
    	$this->db->where('ord_id', $order_id);
    	$this->db->update('lovegift_orders', $data);
    	//echo $this->db->last_query();
    	return $order_id;
    }

    // PHOTO CHECKED STATUS //
    public function updatePhotoCheckedStatusYes($order_id, $data)
    {
    	$this->db->where('ord_id', $order_id);
    	$this->db->update('lovegift_orders', $data);
    	//echo $this->db->last_query();
    	return $order_id;
    }
    public function updatePhotoCheckedStatusNo($order_id, $data)
    {
    	$this->db->where('ord_id', $order_id);
    	$this->db->update('lovegift_orders', $data);
    	//echo $this->db->last_query();
    	return $order_id;
    }

    // PHOTO PACKED STATUS //

    public function updatePhotoPackedStatusYes($order_id, $data)
    {
    	$this->db->where('ord_id', $order_id);
    	$this->db->update('lovegift_orders', $data);
    	//echo $this->db->last_query();
    	return $order_id;
    }
    public function updatePhotoPackedStatusNo($order_id, $data)
    {
    	$this->db->where('ord_id', $order_id);
    	$this->db->update('lovegift_orders', $data);
    	//echo $this->db->last_query();
    	return $order_id;
    }

    // PHOTO DESPATCHED STATUS //
    public function updatePhotoDespatchedStatusYes($order_id, $data)
    {
    	$this->db->where('ord_id', $order_id);
    	$this->db->update('lovegift_orders', $data);
    	//echo $this->db->last_query();
    	return $order_id;
    }
    public function updatePhotoDespatchedStatusNo($order_id, $data)
    {
    	$this->db->where('ord_id', $order_id);
    	$this->db->update('lovegift_orders', $data);
    	//echo $this->db->last_query();
    	return $order_id;
    }

    public function disableOrderById($ord_id, $orderArray)
    {
        $this->db->where('ord_id', $ord_id);
        $this->db->update('lovegift_orders', $orderArray);
        //echo $this->db->last_query();
        return $ord_id;
    }
}