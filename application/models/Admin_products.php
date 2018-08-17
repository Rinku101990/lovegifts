<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_products extends CI_Model {

	public function __construct() {
		parent::__construct();
	}
    // VERIFY PRODUCT SLUG INFORMATION //
    public function checkProductSlugInfo($verify_title_slug)
    {
        $this->db->select('pro_title_slug');
        $this->db->from('lovegift_products');
        $this->db->where('pro_title_slug',$verify_title_slug);
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();
    }
    // SAVE CAT6EGORY INFORMATION //
    public function saveCategoryInfo($cateArray)
    {
        $this->db->insert('lovegift_category', $cateArray);
        return $this->db->insert_id();
    }
    // SAVE CATEGORY TRACK LEVEL //
    public function saveCategoryBasedTrackLevel($level)
    {
        $this->db->insert_batch('lovegift_category_track_level', $level); 
		return $this->db->insert_id();
    }
    // GET ALL GATEGORY LIST //
    public function getAllCategoryList()
    {
        $this->db->select('*');
        $this->db->from('lovegift_category');
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();
    }
    public function getCategoryDetailById($cat_id)
    {
        $this->db->select('*');
        $this->db->from('lovegift_category');
        $this->db->where('cate_id' , $cat_id);
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->row();
    }
    public function getCategoryInfoById($catid)
    {
        $this->db->select('*');
        $this->db->from('lovegift_category');
        $this->db->where('cate_id' , $catid);
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->row();
    }
    public function UpdateCategoryInfoById($cateid, $cateArray)
    {
        $this->db->where('cate_id', $cateid);
        $this->db->update('lovegift_category', $cateArray);
        //echo $this->db->last_query();
        return $cateid;
    }
    public function deleteCategoryById($cateid)
    {
        $this->db->where('cate_id', $cateid);
        $this->db->delete('lovegift_category');
        return $cateid;
    }

    public function saveSubCategoryInfo($subCateArray)
    {
        $this->db->insert('lovegift_sub_category', $subCateArray);
        return $this->db->insert_id();
    }
    public function getAllSubCategoryList()
    {
        $this->db->select('cat.cate_name, scat.*');
        $this->db->from('lovegift_sub_category scat');
        $this->db->join('lovegift_category cat','scat.cate_id=cat.cate_id','left');
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();
    }

    public function getSubCategoryDetailById($scat_id)
    {

        $this->db->select('cat.cate_name, scat.*');
        $this->db->from('lovegift_sub_category scat');
        $this->db->join('lovegift_category cat','scat.cate_id=cat.cate_id','left');
        $this->db->where('scat.scate_id' , $scat_id);
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->row();
    }
    
    public function getSubCategoryInfoById($scatid)
    {
        $this->db->select('cat.cate_name, scat.*');
        $this->db->from('lovegift_sub_category scat');
        $this->db->join('lovegift_category cat','scat.cate_id=cat.cate_id','left');
        $this->db->where('scat.scate_id' , $scatid);
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();
    }
    
    public function UpdateSubCategoryInfoById($scateid, $scateArray)
    {
        $this->db->where('scate_id', $scateid);
        $this->db->update('lovegift_sub_category', $scateArray);
        //echo $this->db->last_query();
        return $scateid;
    }
    
    public function deleteSubCategoryById($scate_id)
    {
        $this->db->where('scate_id', $scate_id);
        $this->db->delete('lovegift_sub_category');
        return $scate_id;
    }
    public function saveHomeSlider($uploadData)
    {
        $this->db->insert('lovegifts_banners', $uploadData);
        return $this->db->insert_id();
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
    // SAVE EXTRA FIELD INFORMATION  //
    public function saveExtraFieldInfo($extraFieldArray)
    {
        $this->db->insert_batch('lovegifts_extra_info', $extraFieldArray); 
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
    public function uploadHomeBanners($uploadData)
    {
        $this->db->insert('lovegifts_banners', $uploadData); 
        return $this->db->insert_id();
    }
    public function getAllBannersList()
    {
        $this->db->select('*');
        $this->db->from('lovegifts_banners');
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();
    }
    public function changeBannersStatusEnable($bann_id, $data)
    {
        $this->db->where('bann_id', $bann_id);
        $this->db->update('lovegifts_banners', $data);
        //echo $this->db->last_query();
        return $bann_id;
    }
    public function changeBannersStatusDisable($bann_id, $data)
    {
        $this->db->where('bann_id', $bann_id);
        $this->db->update('lovegifts_banners', $data);
        //echo $this->db->last_query();
        return $bann_id;
    }
    public function deleteBannerById($banner_id)
    {
        $this->db->where('bann_id', $banner_id);
        $this->db->delete('lovegifts_banners');
        return $banner_id;
    }

	// GET PRODUCTS LIST //
	public function getProductsList()
	{
		$this->db->select('*');
		$this->db->from('lovegift_products');
        $this->db->where('pro_status','0');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}

    // GET ALL INACTIVE PRODUCT LIST //
    public function getInactiveProductsList()
    {
        $this->db->select('*');
        $this->db->from('lovegift_products');
        $this->db->where('pro_status','1');
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();
    }
    // GET TEMPORARY CHECKOUT CUSTOMER LIST //
    public function getTempCheckoutCustomers()
    {
        $this->db->select('pp.pro_title, tcc.*');
        $this->db->from('lovegift_temp_checkout_customers tcc');
        $this->db->join('lovegift_products pp','tcc.pro_id=pp.pro_id','left');
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();
    }

	// DELETE PRODUCTS BY ID //
    public function deleteProductsById($product_id, $data)
    {
        $this->db->where('pro_id', $product_id);
        $this->db->update('lovegift_products', $data);
        //echo $this->db->last_query();
        return $product_id;

    }
    // VIEW TEMPORARY CUSTOMER RECORD //
    public function get_temporary_customer_record_by_id($temp_custo_id)
    {
        $this->db->select('pp.pro_title, tcc.*');
        $this->db->from('lovegift_temp_checkout_customers tcc');
        $this->db->join('lovegift_products pp','tcc.pro_id=pp.pro_id','left');
        $this->db->where('tcc.tmp_custo_id', $temp_custo_id);
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->row();
    }
    // DELETE TEMPORARY CUSTOMER RECORD //
    public function deleteTempCustomersRecordById($temp_custo_id)
    {
        $this->db->where('tmp_custo_id', $temp_custo_id);
        $this->db->delete('lovegift_temp_checkout_customers');
        //echo $this->db->last_query();
        return $temp_custo_id;
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

    // GET CUSTOMER DETAILS BY ORDER ID //
    public function get_customer_detail_by_order_id($order_id)
    {
        $this->db->select('pro.*,urs.*, ord.*');
        $this->db->from('lovegift_orders ord');
        $this->db->join('lovegift_products pro','ord.pro_id=pro.pro_id','left');
        $this->db->join('lovegift_users urs','ord.ord_id=urs.user_id','left');
        $this->db->where('ord.ord_id', $order_id);
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
    	return $query->result();
    }

    // GET PRODUCT INFORMATION BY PRODUCT ID //
    public function getProductsEditableInfoById($editid)
    {
        $this->db->select('*');
        $this->db->from('lovegift_products');
        $this->db->where('pro_id', $editid);
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();
    }
    // GET PRODUCT SIZE INFORMARTION BY ID
    public function getProductsEditableSizeById($editid)
    {
        $this->db->select('*');
        $this->db->from('lovegift_sizes');
        $this->db->where('pro_id', $editid);
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();
    }
    // GET PRODUCT PICTURE BY ID //
    public function getProductsEditablePicById($editid)
    {
        $this->db->select('*');
        $this->db->from('lovegift_pictures');
        $this->db->where('pro_id', $editid);
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();
    }
    // GET PRODUCT META INFORMATION BY ID //
    public function getProductsEditableMetaById($editid)
    {
        $this->db->select('*');
        $this->db->from('lovegift_meta_data');
        $this->db->where('pro_id', $editid);
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();
    }
    //  UPDATE PRODUCT CHANGE INFORMATION //
    // public function saveUpdatedProductInfo($pro_id,$productsArray)
    // {
    //     $this->db->where('pro_id', $pro_id);
    //     $this->db->update('lovegift_products', $productsArray);
    //     //echo $this->db->last_query();
    //     return $pro_id;
    // }
    // UPDATE PRODUCT SIZE INFORMATION //
    // public function saveUpdatedPriceSizeInfo($pro_id,$prices)
    // {
    //     $this->db->where('pro_id', $pro_id);
    //     $this->db->update_batch('lovegift_sizes', $prices);
    //     echo $this->db->last_query();
    //     return $pro_id;
    // }
    // UPDATE PRODUCT META INFORMATION //
    // public function saveUpdatedMetaDataInfo($pro_id,$metaDataArray)
    // {
    //     $this->db->where('pro_id', $pro_id);
    //     $this->db->update('lovegift_meta_data', $metaDataArray);
    //     //echo $this->db->last_query();
    //     return $pro_id;
    // }
    // UPDATE PRODUCT PICTURE INFO //
    // public function saveUpdatedProductPictureList($pro_id, $uploadData)
    // {
    //     $this->db->where('pro_id', $pro_id);
    //     $this->db->update_batch('lovegift_pictures', $uploadData);
    //     //echo $this->db->last_query();
    //     return $pro_id;
    // }
    
    // GET ORDER TRACK LEVEL LIST BY CATEGORY ID //
	public function getAllOrderTrackLevelByCategoryId($cate_id)
	{
		$this->db->select('ct.cate_name,ctl.*');
        $this->db->from('lovegift_category_track_level ctl');
        $this->db->join('lovegift_category ct','ctl.cate_id=ct.cate_id','left');
		$this->db->where('ctl.cate_id', $cate_id);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
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
    public function getAllOrderListAccordingCategory($cate_id)
    {
        $this->db->select('pro.pro_title,ord.*');
        $this->db->from('lovegift_orders ord');
        $this->db->join('lovegift_products pro','ord.pro_id=pro.pro_id','left');
        $this->db->where('ord.cate_id',$cate_id);
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();
    }
    public function getOrderListByCategory($cate_id)
    {
        $this->db->select('*');
        $this->db->from('lovegift_products');
        $this->db->where('cate_id', $cate_id);
        $query = $this->db->get();
        // echo $this->db->last_query();
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

    public function saveTrackLevelStatusOfOrders($data)
    {
        $this->db->insert('lovegift_order_track_status', $data);
        return $this->db->insert_id();
    }
    // GET ALL TRACK STATUS //
    public function getTrackLevelStatus()
    {
        $this->db->select('*');
        $this->db->from('lovegift_order_track_status');
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();
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