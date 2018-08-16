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
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_products', 'adPro');
		$this->load->database();
        $this->load->model('import_model', 'import');
	}

	public function add()
	{
		// $name = $this->session->userdata('name');
		// if(empty($reference)){
		// 	redirect('welcome/index','refresh');
		// }

		//$data['pincode'] = $this->adPro->getPincodeList();
		$data['category'] = $this->adPro->getAllCategoryList();

		$this->load->view('admin/includes/head');
		$this->load->view('admin/includes/header');
		$this->load->view('admin/includes/sidebar');
		$this->load->view('admin/addProducts', $data);
		$this->load->view('admin/includes/foot');
		$this->load->view('admin/includes/footer');
	}
	public function checkProductSlugValue()
	{
		$check_title_slug = strtolower($this->input->post('pro_title'));
		$verify_title_slug = str_replace(' ', '-', $check_title_slug);
		$result = $this->adPro->checkProductSlugInfo($verify_title_slug);
		if($result){
			echo "fail";
		}else{
			echo "done";
		}
	}
	public function banners()
	{
		$data['banners'] = $this->adPro->getAllBannersList(); 

		$this->load->view('admin/includes/head');
		$this->load->view('admin/includes/header');
		$this->load->view('admin/includes/sidebar');
		$this->load->view('admin/addHomeBanners',$data);
		$this->load->view('admin/includes/foot');
		$this->load->view('admin/includes/footer');
	}
	public function save_home_slider()
	{
		$banner_title = $this->input->post('home_slider_title');
		$banner_desc  = $this->input->post('home_slider_desc');

		if(!empty($_FILES['userfile']['name'])){

            $_FILES['file']['name']     = $_FILES['userfile']['name'];
            $_FILES['file']['type']     = $_FILES['userfile']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['userfile']['tmp_name'];
            $_FILES['file']['error']    = $_FILES['userfile']['error'];
            $_FILES['file']['size']     = $_FILES['userfile']['size'];
            
            // File upload configuration
            $uploadPath = 'uploads/banners/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            
            // Load and initialize upload library
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $this->upload->do_upload('file');
            // Upload file to server

            // Uploaded file data
            $fileData = $this->upload->data();
            $uploadData['bann_title'] = $banner_title;
            $uploadData['bann_picture'] = $uploadPath.''.$fileData['file_name'];
            $uploadData['bann_desc'] = $banner_desc;
            $uploadData['bann_status'] = '0';
            $uploadData['bann_created'] = date("Y-m-d H:i:s");
            
            //print_r($uploadData);
        	$result = $this->adPro->uploadHomeBanners($uploadData);
        	if($result){
        		$this->session->set_flashdata('message','<span class="alert alert-success" style="padding: 6px;">Banner Uploaded Successfully.</span>');
        		echo "upload";
        	}else{
        		$this->session->set_flashdata('message','<span class="alert alert-success" style="padding: 6px;">Banner Uploaded Failed.</span>');
        		echo "failed";
        	}
	    }

	}
	public function manageBannerStatusEnable()
	{
		$bann_id = $this->input->post('bann_id');
		$data['bann_status'] = '0';
		$result = $this->adPro->changeBannersStatusEnable($bann_id, $data);
		if($result){
			echo "ok";
		}else{
			echo "fail";
		}
	}
	public function manageBannerStatusDisable()
	{
		$bann_id = $this->input->post('bann_id');
		$data['bann_status'] = '1';
		$result = $this->adPro->changeBannersStatusDisable($bann_id, $data);
		if($result){
			echo "ok";
		}else{
			echo "fail";
		}
	}
	// public function viewBanner()
	// {
	// 	$this->load->view('admin/includes/head');
	// 	$this->load->view('admin/includes/header');
	// 	$this->load->view('admin/includes/sidebar');
	// 	$this->load->view('admin/viewHomeBanners');
	// 	$this->load->view('admin/includes/foot');
	// 	$this->load->view('admin/includes/footer');
	// }
	// MANAGE CATEGORY //
	public function category()
	{
		$data['category'] = $this->adPro->getAllCategoryList();

		$this->load->view('admin/includes/head');
		$this->load->view('admin/includes/header');
		$this->load->view('admin/includes/sidebar');
		$this->load->view('admin/addViewCategories', $data);
		$this->load->view('admin/includes/foot');
		$this->load->view('admin/includes/footer');
	}
	public function saveCategory()
	{
		$category = $this->input->post();
		//print_r($category);die;
		if(!empty($category)){
			$cateArray = array(
				'cate_name' => $this->input->post('pro_category'),
				'cate_status' => $this->input->post('pro_category_status'),
				'cate_created' => date('Y-m-d H:i:s')
			);
			$cate_id = $this->adPro->saveCategoryInfo($cateArray);
			// CREATE CATEGORY BASED ORDER TRACKING LIST DYNAMICALLY //
			$track_level = $this->input->post('pro_cate_ord_track');
			//print_r($track_level);die;
			$level = array();
			for ($i=0; $i < count($track_level); $i++) { 

			        $level[] = array(
			        	'cate_id' => $cate_id, 
			        	'cat_track_name' => $track_level[$i],
			        	'cat_track_status' => '0',
			        	'cat_track_created' => date('Y-m-d H:i:s') 
			        );
			    } 
			$result = $this->adPro->saveCategoryBasedTrackLevel($level);
			// CHECK SUCCESSFULLY CATEGORY TRACK LEVEL CREATED //
			if($result){
				$this->session->set_flashdata('message','<span class="alert alert-success" style="padding: 6px;">Category Added Successfully.</span>');
				echo "done";
			}else{
				$this->session->set_flashdata('message','<span class="alert alert-success" style="padding: 6px;">Failed.</span>');
				echo "fail";
			}
		}else{

		}
	}
	public function viewCategory()
	{
		$cat_id = $this->input->post('cat_id');
		$result['cat_info'] = $this->adPro->getCategoryDetailById($cat_id);
		//print_r($result);die;
		echo json_encode($result);
	}
	public function edit_cate()
	{
		$catid = $this->uri->segment(4);
		$data['edit_info'] = $this->adPro->getCategoryInfoById($catid);
		$data['category'] = $this->adPro->getAllCategoryList();
		//print_r($data);die;
		$this->load->view('admin/includes/head');
		$this->load->view('admin/includes/header');
		$this->load->view('admin/includes/sidebar');
		$this->load->view('admin/editCategories', $data);
		$this->load->view('admin/includes/foot');
		$this->load->view('admin/includes/footer');
	}
	public function updateCategoryInfo()
	{
		$category = $this->input->post();
		//print_r($category);die;
		if(!empty($category)){
			$cateid = $this->input->post('cate_id');
			$cateArray = array(
				'cate_name' => $this->input->post('pro_category'),
				'cate_status' => $this->input->post('pro_category_status')
			);
			$result = $this->adPro->UpdateCategoryInfoById($cateid, $cateArray);
			if($result){
				$this->session->set_flashdata('message','<span class="alert alert-success" style="padding: 6px;">Category Update Successfully.</span>');
				echo "done";
			}else{
				$this->session->set_flashdata('message','<span class="alert alert-success" style="padding: 6px;">Failed.</span>');
				echo "fail";
			}
		}else{

		}
	}
	public function deleteCategory()
	{
		$cateid = $this->input->post('cate_id');
    	$delete = $this->adPro->deleteCategoryById($cateid);
    	if($delete){
    		$this->session->set_flashdata('message','<span class="alert alert-danger" style="padding: 6px;">Category Deleted Successfully.</span>');
    		echo "ok";
    	}else{
    		$this->session->set_flashdata('message','<span class="alert alert-danger" style="padding: 6px;">Process Failed.</span>');
    		echo "fail";
    	}
	}

	public function sub_category()
	{

		$data['category'] = $this->adPro->getAllCategoryList();
		$data['subcategory'] = $this->adPro->getAllSubCategoryList();

		$this->load->view('admin/includes/head');
		$this->load->view('admin/includes/header');
		$this->load->view('admin/includes/sidebar');
		$this->load->view('admin/addViewSubCategories',$data);
		$this->load->view('admin/includes/foot');
		$this->load->view('admin/includes/footer');
	}
	
	public function viewSubCategory()
	{
		$scat_id = $this->input->post('scat_id');
		$result['scat_info'] = $this->adPro->getSubCategoryDetailById($scat_id);
		//print_r($result);die;
		echo json_encode($result);
	}
	public function edit_scate()
	{
		$scatid = $this->uri->segment(4);
		//print_r($scatid);
		$data['sub_edit_info'] = $this->adPro->getSubCategoryInfoById($scatid);
		$data['category'] = $this->adPro->getAllCategoryList();
		$data['subcategory'] = $this->adPro->getAllSubCategoryList();
		//print_r($data);die;
		$this->load->view('admin/includes/head');
		$this->load->view('admin/includes/header');
		$this->load->view('admin/includes/sidebar');
		$this->load->view('admin/editSubCategories', $data);
		$this->load->view('admin/includes/foot');
		$this->load->view('admin/includes/footer');
	}
	
	public function updateSubCategoryInfo()
	{
		$scategory = $this->input->post();
		//print_r($category);die;
		if(!empty($scategory)){
			$scateid = $this->input->post('sub_cat_id');
			$scateArray = array(
				'cate_id' => $this->input->post('pro_category'),
				'scate_name' => $this->input->post('pro_sub_category'),
				'scate_status' => $this->input->post('pro_sub_category_status')
			);
			//print_r($scateArray);die;
			$result = $this->adPro->UpdateSubCategoryInfoById($scateid, $scateArray);
			if($result){
				$this->session->set_flashdata('message','<span class="alert alert-success" style="padding: 6px;">Updated Successfully.</span>');
				echo "done";
			}else{
				$this->session->set_flashdata('message','<span class="alert alert-success" style="padding: 6px;">Failed.</span>');
				echo "fail";
			}
		}else{

		}
	}
	
	public function deleteSubCategory()
	{
		$scate_id = $this->input->post('scate_id');
    	$delete = $this->adPro->deleteSubCategoryById($scate_id);
    	if($delete){
    		$this->session->set_flashdata('message','<span class="alert alert-danger" style="padding: 6px;"> Deleted Successfully.</span>');
    		echo "ok";
    	}else{
    		$this->session->set_flashdata('message','<span class="alert alert-danger" style="padding: 6px;">Process Failed.</span>');
    		echo "fail";
    	}
	}
	//  SAVE SUB CATEGORY //
	public function saveSubCategory()
	{
		$subcategory = $this->input->post();
		//print_r($subcategory);die;
		if(!empty($subcategory)){
			$subCateArray = array(
				'cate_id' => $this->input->post('pro_category'),
				'scate_name' => $this->input->post('pro_sub_category'),
				'scate_status' => $this->input->post('pro_category_status'),
				'scate_created' => date('Y-m-d H:i:s')
			);
			$result = $this->adPro->saveSubCategoryInfo($subCateArray);
			if($result){
				$this->session->set_flashdata('message','<span class="alert alert-success" style="padding: 6px;">Added Successfully.</span>');
				echo "done";
			}else{
				$this->session->set_flashdata('message','<span class="alert alert-success" style="padding: 6px;">Failed.</span>');
				echo "fail";
			}
		}else{

		}
	}

	public function saveProducts()
	{
		
		$dataProducts = $this->input->post();
		//print_r($dataProducts);die;

		if(!empty($dataProducts)){
			
			// SAVE PRODUCTS INFORMATION IN DATABASE //
			$title_slug = strtolower($this->input->post('pro_title'));
			$title_slug_format = str_replace(' ', '-', $title_slug);

			// YOUTUBE VIDEO LINK //
			$link = $this->input->post('pro_video');
			if(!empty($link)){
				$video_id = explode("?v=", $link);
				$video_id = $video_id[1];
			}else{
				$video_id = '';
			}
			
			// PRODUCT ARRAY //	
			$productsArray = array(
				'cate_id' => $this->input->post('pro_category'),
				'pro_title' => $this->input->post('pro_title'),
				'pro_title_slug' => $title_slug_format,
				'pro_theme' => $this->input->post('pro_theme'),
				'pro_offers' => $this->input->post('pro_offers_price'),
				'pro_offer_desc' => $this->input->post('pro_offers_desc'),
				'pro_videos' => $video_id,
				'pro_required_picture' => $this->input->post('pro_required_pic'),
				'pro_message_on_card' => $this->input->post('pro_message_on_card'),
				'pro_description' => $this->input->post('pro_desc'),
				'pro_delivery_days_to' => $this->input->post('deliverd_to'),
				'pro_delivery_days_from' => $this->input->post('deliverd_from'),
				'pro_cash_on_delivery' => $this->input->post('product_on_cod'),
				'pro_free_shipping' => $this->input->post('free_shipping'),
				'pro_price_with_photo' => $this->input->post('price_with_photo'),
				'pro_facebook_pixel' => $this->input->post('facebook_pixel'),
				'pro_status' => '0',
				'pro_created' => date('Y-m-d H:i:s')
			);
			$pro_id = $this->adPro->saveProductInfo($productsArray);			

			// INSERT PRODUCT DATA IN MULTIDIMENSIONAL ARRAY THROUGH BATCH INSERT //
			$productSize = $this->input->post('pro_size');
			$productPrice = $this->input->post('pro_price');

			$prices = array();
			for ($i=0; $i < count($productSize); $i++) { 

			        $prices[] = array(
			        	'pro_id' => $pro_id, 
			        	'size_param' => $productSize[$i],
			        	'size_related_price' => $productPrice[$i] ,
			        	'size_status' => '0',
			        	'size_created' => date('Y-m-d H:i:s') 
			        );
			    } 
			$size_id = $this->adPro->savePriceSizeInfo($prices);

			// SAVE EXTRA FIELD KEYS AND VALUES //
			$extraFieldTitle = $this->input->post('extra_field_title');
			$extraFieldValue = $this->input->post('extra_field_value');

			$extraFieldArray = array();
			for($i=0; $i < count($extraFieldTitle); $i++){

				$extraFieldArray[] = array(
					'pro_id' => $pro_id,
					'extra_field_keys' => $extraFieldTitle[$i],
					'extra_field_value' => $extraFieldValue[$i],
					'extra_status' => '0',
					'extra_created' => date('Y-m-d H:i:s')
				);
			}
			$extra_id = $this->adPro->saveExtraFieldInfo($extraFieldArray);		
			// SAVE META DATA RELATED PRODUCTS //
			$metaDataArray = array(
				'pro_id' => $pro_id,
				'meta_title' => $this->input->post('meta_title'),
				'meta_keywords' => $this->input->post('meta_keywords'),
				'meta_description' => $this->input->post('meta_description'),
				'meta_created' => date('Y-m-d H:i:s')
			);
			$meta_id = $this->adPro->saveMetaDataInfo($metaDataArray);

			// SAVE PRODUCTS IMAGES LIST RELATED TO PRODUCTS //
			$data = array();
	        // If file upload form submitted
	        if(!empty($_FILES['userfile']['name'])){
	            $filesCount = count($_FILES['userfile']['name']);
	            for($i = 0; $i < $filesCount; $i++){
	                $_FILES['file']['name']     = $_FILES['userfile']['name'][$i];
	                $_FILES['file']['type']     = $_FILES['userfile']['type'][$i];
	                $_FILES['file']['tmp_name'] = $_FILES['userfile']['tmp_name'][$i];
	                $_FILES['file']['error']    = $_FILES['userfile']['error'][$i];
	                $_FILES['file']['size']     = $_FILES['userfile']['size'][$i];
	                
	                // File upload configuration
	                $uploadPath = 'uploads/products/';
	                $config['upload_path'] = $uploadPath;
	                $config['allowed_types'] = 'jpg|jpeg|png|gif';
	                
	                // Load and initialize upload library
	                $this->load->library('upload', $config);
	                $this->upload->initialize($config);
	                
	                // Upload file to server
	                if($this->upload->do_upload('file')){
	                    // Uploaded file data
	                    $fileData = $this->upload->data();
	                    $uploadData[$i]['pro_id'] = $pro_id;
	                    $uploadData[$i]['pic_param'] = $uploadPath.''.$fileData['file_name'];
	                    $uploadData[$i]['pic_status'] = '0';
	                    $uploadData[$i]['pic_created'] = date("Y-m-d H:i:s");
	                }
	            }
	            $result = $this->adPro->saveProductPictureList($uploadData);
	        }
	        
			$this->session->set_flashdata('message','<span class="alert alert-success" style="padding: 6px;">Product Added Successfully.</span>');
			
			if($result){
				echo "done";
			}else{
				echo "fail";
			}
		}else{
			echo "Invalid Product Data.";
		}
	}
	// UPDATE PRODUCT BY ID //
	public function edit()
	{
		$editid = $this->uri->segment(4);
		$data['edit_info'] = $this->adPro->getProductsEditableInfoById($editid);
		$data['edit_size'] = $this->adPro->getProductsEditableSizeById($editid);
		$data['edit_pic']  = $this->adPro->getProductsEditablePicById($editid); 
		$data['edit_meta'] = $this->adPro->getProductsEditableMetaById($editid);
		// echo "<pre>";
		// print_r($data);die; 

		$this->load->view('admin/includes/head');
		$this->load->view('admin/includes/header');
		$this->load->view('admin/includes/sidebar');
		$this->load->view('admin/editProducts', $data);
		$this->load->view('admin/includes/foot');
		$this->load->view('admin/includes/footer');
	}

	// SAVE PRODUCT CHANGE INFORMATION //
	public function saveProductsChangeInfo()
	{
		$dataProducts = $this->input->post();
		print_r($dataProducts);
		// if(!empty($dataProducts)){
			
		// 	// SAVE PRODUCTS INFORMATION IN DATABASE //
		// 	$pro_id = $this->input->post('productid');
		// 	$productsArray = array(
		// 		'pro_title' => $this->input->post('pro_title'),
		// 		'pro_theme' => $this->input->post('pro_theme'),
		// 		'pro_offers' => $this->input->post('pro_offers'),
		// 		'pro_videos' => $this->input->post('pro_video'),
		// 		'pro_required_picture' => $this->input->post('pro_required_pic'),
		// 		'pro_message_on_card' => $this->input->post('pro_message_on_card'),
		// 		'pro_description' => $this->input->post('pro_desc'),
		// 		'pro_delivery_days_to' => $this->input->post('deliverd_to'),
		// 		'pro_delivery_days_from' => $this->input->post('deliverd_from')
		// 	);
		// 	$pro_id = $this->adPro->saveUpdatedProductInfo($pro_id,$productsArray);

		// 	// SAVE PINCODE AVAILABILITY //
		// 	// $pin_code = $this->input->post('pro_available[]');
		// 	// foreach($pin_code as $code){
		// 	// 	$pincodeArray = array(
		// 	// 		'pro_id' => $pro_id,
		// 	// 		'pin_code' => $code,
		// 	// 		'avail_created' => date('Y-m-d H:i:s')
		// 	// 	);
		// 	// 	$pin_code_id = $this->adPro->savePincodeInfo($pincodeArray);
		// 	// }
			

		// 	// INSERT PRODUCT DATA IN MULTIDIMENSIONAL ARRAY THROUGH BATCH INSERT //
		// 	$productSize = $this->input->post('pro_size');
		// 	$productPrice = $this->input->post('pro_price');

		// 	$prices = array();
		// 	for ($i=0; $i < count($productSize); $i++) { 

		// 	        $prices[] = array(
		// 	        	'size_param' => $productSize[$i],
		// 	        	'size_related_price' => $productPrice[$i]
		// 	        );
		// 	    } 
		// 	$pro_id = $this->adPro->saveUpdatedPriceSizeInfo($pro_id, $prices);

		// 	// SAVE META DATA RELATED PRODUCTS //
		// 	$metaDataArray = array(
		// 		'meta_title' => $this->input->post('meta_title'),
		// 		'meta_keywords' => $this->input->post('meta_keywords'),
		// 		'meta_description' => $this->input->post('meta_description')
		// 	);
		// 	$pro_id = $this->adPro->saveUpdatedMetaDataInfo($pro_id,$metaDataArray);

		// 	// SAVE PRODUCTS IMAGES LIST RELATED TO PRODUCTS //
		// 	$data = array();
	 //        // If file upload form submitted
	 //        if(!empty($_FILES['userfile']['name'])){
	 //            $filesCount = count($_FILES['userfile']['name']);
	 //            for($i = 0; $i < $filesCount; $i++){
	 //                $_FILES['file']['name']     = $_FILES['userfile']['name'][$i];
	 //                $_FILES['file']['type']     = $_FILES['userfile']['type'][$i];
	 //                $_FILES['file']['tmp_name'] = $_FILES['userfile']['tmp_name'][$i];
	 //                $_FILES['file']['error']    = $_FILES['userfile']['error'][$i];
	 //                $_FILES['file']['size']     = $_FILES['userfile']['size'][$i];
	                
	 //                // File upload configuration
	 //                $uploadPath = 'uploads/products/';
	 //                $config['upload_path'] = $uploadPath;
	 //                $config['allowed_types'] = 'jpg|jpeg|png|gif';
	                
	 //                // Load and initialize upload library
	 //                $this->load->library('upload', $config);
	 //                $this->upload->initialize($config);
	                
	 //                // Upload file to server
	 //                if($this->upload->do_upload('file')){
	 //                    // Uploaded file data
	 //                    $fileData = $this->upload->data();
	 //                    $uploadData[$i]['pic_param'] = $uploadPath.''.$fileData['file_name'];
	 //                }
	 //            }
	 //            $result = $this->adPro->saveUpdatedProductPictureList($pro_id, $uploadData);
	 //        }

		// 	$this->session->set_flashdata('message','<span class="alert alert-success">Product Updade Successfully.</span>');
			
		// 	if($result){
		// 		echo "done";
		// 	}else{
		// 		echo "fail";
		// 	}
		// }else{
		// 	echo "Invalid Product Data.";
		// }
	}

	// VIEW PRODUCT DETAIL BY PRODUCT ID //
	public function viewProductDetails(){

		$product_id = $this->input->post('pro_id');
		$result['info'] = $this->adPro->getProductDetailById($product_id);
		$result['pic'] = $this->adPro->getProductPictureById($product_id);
		$result['price'] = $this->adPro->getProductPriceById($product_id);
		//print_r($result);die;
		echo json_encode($result);
	}
	// VIEW CUSTOMER DETAIL WITH ORDER ID //
	public function viewCustomerDetailWithOrderId()
	{
		$order_id = $this->input->post('order_id');
		$data['customers'] = $this->adPro->get_customer_detail_by_order_id($order_id);
		echo json_encode($data);
	}
	// DELETE PRODUCTS FROM TABLE //
	public function deleteProducts()
    {
    	$product_id = $this->input->post('pro_id');
    	$data['pro_status'] = '1'; 
    	$delete = $this->adPro->deleteProductsById($product_id, $data);
    	if($delete){
    		$this->session->set_flashdata('message','<span class="alert alert-danger" style="padding: 6px;">Product Disabled Successfully.</span>');
    		echo "ok";
    	}else{
    		$this->session->set_flashdata('message','<span class="alert alert-danger" style="padding: 6px;">Product Not Disabled Successfully.</span>');
    		echo "fail";
    	}
    }
    // VIEW TEMPORARY CUSTOMER DETAILS //
    public function viewTempCustomerRecordById()
	{
		$temp_custo_id = $this->input->post('temp_custo_id');
		$data['temp_record'] = $this->adPro->get_temporary_customer_record_by_id($temp_custo_id);
		echo json_encode($data);
	}
    // DELETE TEMPORARY CUSTOMER RECORD //
    public function deleteTempCustomersRecord()
    {
    	$temp_custo_id = $this->input->post('temp_custo_id');
    	$delete = $this->adPro->deleteTempCustomersRecordById($temp_custo_id);
    	if($delete){
    		$this->session->set_flashdata('message','<span class="alert alert-danger" style="padding: 6px;">Temporary Customer Record Successfully.</span>');
    		echo "ok";
    	}else{
    		$this->session->set_flashdata('message','<span class="alert alert-danger" style="padding: 6px;">Failed.</span>');
    		echo "fail";
    	}
    }
    // ENABLE PRODUCTS //
    public function enableProducts()
    {
    	$product_id = $this->input->post('pro_id');
    	$data['pro_status'] = '0'; 
    	$delete = $this->adPro->deleteProductsById($product_id, $data);
    	if($delete){
    		$this->session->set_flashdata('message','<span class="alert alert-danger" style="padding: 6px;">Product active Successfully.</span>');
    		echo "ok";
    	}else{
    		$this->session->set_flashdata('message','<span class="alert alert-danger" style="padding: 6px;">Product not active Successfully.</span>');
    		echo "fail";
    	}
    }	

    // VIEW PRODUCTS LIST //
	public function view()
	{
		// $name = $this->session->userdata('name');
		// if(empty($reference)){
		// 	redirect('welcome/index','refresh');
		// }
		
		$data['products'] = $this->adPro->getProductsList();

		$this->load->view('admin/includes/head');
		$this->load->view('admin/includes/header', $data);
		$this->load->view('admin/includes/sidebar');
		$this->load->view('admin/viewProducts');
		$this->load->view('admin/includes/foot');
		$this->load->view('admin/includes/footer');
	}
	// VIEW ALL DISABLED PRODUCTS //
	public function disabled()
	{
		$data['disabled'] = $this->adPro->getInactiveProductsList();

		$this->load->view('admin/includes/head');
		$this->load->view('admin/includes/header', $data);
		$this->load->view('admin/includes/sidebar');
		$this->load->view('admin/viewDisabledProducts');
		$this->load->view('admin/includes/foot');
		$this->load->view('admin/includes/footer');
	}
	// INCOMPLITE CHECKOUT CUSTOMERS //
	public function temp_orders()
	{
		$data['temp_orders'] = $this->adPro->getTempCheckoutCustomers();

		$this->load->view('admin/includes/head');
		$this->load->view('admin/includes/header', $data);
		$this->load->view('admin/includes/sidebar');
		$this->load->view('admin/viewTempCheckoutCustomers');
		$this->load->view('admin/includes/foot');
		$this->load->view('admin/includes/footer');
	}

	//  MANAGE PINCODE SECTION //
	public function pincode()
	{
		$this->load->view('admin/includes/head');
		$this->load->view('admin/includes/header');
		$this->load->view('admin/includes/sidebar');
		$this->load->view('admin/addPincode');
		$this->load->view('admin/includes/foot');
		$this->load->view('admin/includes/footer');
	}
	public function upload_pincode(){

	    if ($this->input->post('submit')) {
	            
            $path = 'uploads/';
            require_once APPPATH . "/third_party/PHPExcel.php";
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'xlsx|xls';
            $config['remove_spaces'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);            
            if (!$this->upload->do_upload('uploadFile')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $data = array('upload_data' => $this->upload->data());
            }
            if(empty($error)){
              if (!empty($data['upload_data']['file_name'])) {
                $import_xls_file = $data['upload_data']['file_name'];
            } else {
                $import_xls_file = 0;
            }
            $inputFileName = $path . $import_xls_file;
            
            try {
                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
                $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
                $flag = true;
                $i=0;
                foreach ($allDataInSheet as $value) {
                  if($flag){
                    $flag =false;
                    continue;
                  }
                  $inserdata[$i]['pin_code'] = $value['A'];
                  $inserdata[$i]['pin_courier_name'] = $value['B'];
                  $inserdata[$i]['pin_city_name'] = $value['C'];
                  $inserdata[$i]['pin_state_name'] = $value['D'];
                  $inserdata[$i]['pin_state_code'] = $value['E'];
                  $inserdata[$i]['pin_pick_up'] = $value['F'];
                  $i++;
                }               
                $result = $this->import->importdata($inserdata);   
                if($result){
                  echo "Imported successfully";
                }else{
                  echo "ERROR !";
                }             

            } catch (Exception $e) {
                die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
                . '": ' .$e->getMessage());
            }
        }else{
              echo $error['error'];
            }   
    }
    redirect('admin/products/view_pincode');
  	}

	public function view_pincode()
	{

		$data['pincode'] = $this->import->getAllPincodeList();

		$this->load->view('admin/includes/head');
		$this->load->view('admin/includes/header');
		$this->load->view('admin/includes/sidebar');
		$this->load->view('admin/viewPincode', $data);
		$this->load->view('admin/includes/foot');
		$this->load->view('admin/includes/footer');
	}

	public function orders()
	{
		$data['category'] = $this->adPro->getAllCategoryList();
		//print_r($data);die;
		$this->load->view('admin/includes/head');
		$this->load->view('admin/includes/header');
		$this->load->view('admin/includes/sidebar');
		$this->load->view('admin/viewOrders', $data);
		$this->load->view('admin/includes/foot');
		$this->load->view('admin/includes/footer');
	}
	// GET ORDERS BY CATEGORY ID //
	public function getOrderListByCategoryId()
	{
		$cate_id = $this->uri->segment(4);
		//echo $cate_id;
		$data['level'] = $this->adPro->getAllOrderTrackLevelByCategoryId($cate_id);
		$data['orders'] = $this->adPro->getAllOrderListAccordingCategory($cate_id);
		// echo "<pre>";
		// print_r($data);
		
		$this->load->view('admin/includes/head');
		$this->load->view('admin/includes/header');
		$this->load->view('admin/includes/sidebar');
		$this->load->view('admin/orderCategoryList', $data);
		$this->load->view('admin/includes/foot');
		$this->load->view('admin/includes/footer');
	}

	public function disable()
	{
		$data['orders'] = $this->adPro->getAllDisableOrderList();
		//print_r($data);die;
		$this->load->view('admin/includes/head');
		$this->load->view('admin/includes/header');
		$this->load->view('admin/includes/sidebar');
		$this->load->view('admin/disableOrders', $data);
		$this->load->view('admin/includes/foot');
		$this->load->view('admin/includes/footer');
	}

	// CHANGE PHOTO STATUS ACCORDING USER RESPONSE //
	public function photoReceivedYes()
	{
		if(!empty($this->input->post())){
			$order_id = $this->input->post('ord_id');
			$data['ord_photo_status'] = '1';
			$result = $this->adPro->updatePhotoStatusYes($order_id, $data);
			if($result){
				echo "PhotoYes";
			}else{
				echo "PhotoNo";
			}
		}else{
			echo "No";
		}
	}

	public function photoReceivedNo()
	{
		if(!empty($this->input->post())){
			$order_id = $this->input->post('ord_id');
			$data['ord_photo_status'] = '0';
			$result = $this->adPro->updatePhotoStatusNo($order_id, $data);
			if($result){
				echo "PhotoNo";
			}else{
				echo "PhotoYes";
			}
		}else{
			echo "No";
		}
	}

	// SHIPPING STATUS CHANGE //

	public function shippingYes()
	{
		if(!empty($this->input->post())){
			$order_id = $this->input->post('ord_id');
			$data['ord_shipping_required'] = '1';
			$result = $this->adPro->updateShippingStatusYes($order_id, $data);
			if($result){
				echo "shipYes";
			}else{
				echo "shipNo";
			}
		}else{
			echo "No";
		}
	}

	public function shippingNo()
	{
		
		if(!empty($this->input->post())){
			
			$order_id = $this->input->post('ord_id');
			$data['ord_shipping_required'] = '0';
			$result = $this->adPro->updateShippingStatusNo($order_id, $data);
			if($result){
				echo "shipNo";
			}else{
				echo "shipYes";
			}
		}else{
			echo "No";
		}
	}

	// CHANGE PHOTO CROPED STATUS //

	public function photoCropYes()
	{
		if(!empty($this->input->post())){
			$order_id = $this->input->post('ord_id');
			$data['ord_photo_croped'] = '1';
			$result = $this->adPro->updatePhotoCropStatusYes($order_id, $data);
			if($result){
				echo "cropYes";
			}else{
				echo "cropNo";
			}
		}else{
			echo "No";
		}
	}

	public function photoCropNo()
	{
		if(!empty($this->input->post())){
			$photoStatus = $this->input->post();
			$order_id = $this->input->post('ord_id');
			$data['ord_photo_croped'] = '0';
			$result = $this->adPro->updatePhotoCropStatusNo($order_id, $data);
			if($result){
				echo "cropNo";
			}else{
				echo "cropYes";
			}
		}else{
			echo "No";
		}
	}
	// PHOTO PRINTED OR NOT //

	public function photoPrintedYes()
	{
		if(!empty($this->input->post())){
			$order_id = $this->input->post('ord_id');
			$data['ord_photo_printed'] = '1';
			$result = $this->adPro->updatePhotoPrintedStatusYes($order_id, $data);
			if($result){
				echo "printYes";
			}else{
				echo "printNo";
			}
		}else{
			echo "No";
		}
	}

	public function photoPrintedNo()
	{
		if(!empty($this->input->post())){
			$photoStatus = $this->input->post();
			$order_id = $this->input->post('ord_id');
			$data['ord_photo_printed'] = '0';
			$result = $this->adPro->updatePhotoPrintedStatusNo($order_id, $data);
			if($result){
				echo "printNo";
			}else{
				echo "printYes";
			}
		}else{
			echo "No";
		}
	}
	// PHOTO CUTTING STATUS //
	public function photoCuttingYes()
	{
		if(!empty($this->input->post())){
			$order_id = $this->input->post('ord_id');
			$data['ord_photo_cutting'] = '1';
			$result = $this->adPro->updatePhotoCuttingStatusYes($order_id, $data);
			if($result){
				echo "cuttingYes";
			}else{
				echo "cuttingNo";
			}
		}else{
			echo "No";
		}
	}

	public function photoCuttingNo()
	{
		if(!empty($this->input->post())){
			$photoStatus = $this->input->post();
			$order_id = $this->input->post('ord_id');
			$data['ord_photo_cutting'] = '0';
			$result = $this->adPro->updatePhotoCuttingStatusNo($order_id, $data);
			if($result){
				echo "cuttingNo";
			}else{
				echo "cuttingYes";
			}
		}else{
			echo "No";
		}
	}
	// STATUS OF PHOTO PASTING //
	public function photoPastingYes()
	{
		if(!empty($this->input->post())){
			$order_id = $this->input->post('ord_id');
			$data['orf_photo_pasting'] = '1';
			$result = $this->adPro->updatePhotoPastingStatusYes($order_id, $data);
			if($result){
				echo "pastingYes";
			}else{
				echo "pastingNo";
			}
		}else{
			echo "No";
		}
	}

	public function photoPastingNo()
	{
		if(!empty($this->input->post())){
			$photoStatus = $this->input->post();
			$order_id = $this->input->post('ord_id');
			$data['orf_photo_pasting'] = '0';
			$result = $this->adPro->updatePhotoPastingStatusNo($order_id, $data);
			if($result){
				echo "pastingNo";
			}else{
				echo "pastingYes";
			}
		}else{
			echo "No";
		}
	}
	// PHOTO CHECKED STATUSN  //
	public function photoCheckedYes()
	{
		if(!empty($this->input->post())){
			$order_id = $this->input->post('ord_id');
			$data['ord_photo_checked'] = '1';
			$result = $this->adPro->updatePhotoCheckedStatusYes($order_id, $data);
			if($result){
				echo "checkedYes";
			}else{
				echo "checkedNo";
			}
		}else{
			echo "No";
		}
	}

	public function photoCheckedNo()
	{
		if(!empty($this->input->post())){
			$photoStatus = $this->input->post();
			$order_id = $this->input->post('ord_id');
			$data['ord_photo_checked'] = '0';
			$result = $this->adPro->updatePhotoCheckedStatusNo($order_id, $data);
			if($result){
				echo "checkedNo";
			}else{
				echo "checkedYes";
			}
		}else{
			echo "No";
		}
	}

	//PHOTO PACKED STATUS //
	public function photoPackedYes()
	{
		if(!empty($this->input->post())){
			$order_id = $this->input->post('ord_id');
			$data['ord_photo_packed'] = '1';
			$result = $this->adPro->updatePhotoPackedStatusYes($order_id, $data);
			if($result){
				echo "packedYes";
			}else{
				echo "packedNo";
			}
		}else{
			echo "No";
		}
	}

	public function photoPackedNo()
	{
		if(!empty($this->input->post())){
			$photoStatus = $this->input->post();
			$order_id = $this->input->post('ord_id');
			$data['ord_photo_packed'] = '0';
			$result = $this->adPro->updatePhotoPackedStatusNo($order_id, $data);
			if($result){
				echo "packedNo";
			}else{
				echo "packedYes";
			}
		}else{
			echo "No";
		}
	}
	// PHOTO DESPATCHED STATUS //
	public function photoDespatchedYes()
	{
		if(!empty($this->input->post())){
			$order_id = $this->input->post('ord_id');
			$data['ord_photo_despatched'] = '1';
			$result = $this->adPro->updatePhotoDespatchedStatusYes($order_id, $data);
			if($result){
				echo "despatchedYes";
			}else{
				echo "despatchedNo";
			}
		}else{
			echo "No";
		}
	}

	public function photoDespatchedNo()
	{
		if(!empty($this->input->post())){
			$photoStatus = $this->input->post();
			$order_id = $this->input->post('ord_id');
			$data['ord_photo_despatched'] = '0';
			$result = $this->adPro->updatePhotoDespatchedStatusNo($order_id, $data);
			if($result){
				echo "despatchedNo";
			}else{
				echo "despatchedYes";
			}
		}else{
			echo "No";
		}
	}


	// DISABLE ORDERS //
	public function orderDisable()
	{
		$ord_id = $this->input->post('ord_id');
		$orderArray = array(
			'ord_status' => '1'
		);
		$result = $this->adPro->disableOrderById($ord_id, $orderArray);
		if($result){
			echo "done";
		}else{
			echo "fail";
		}
	}
}