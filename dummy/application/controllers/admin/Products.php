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
		$this->load->view('admin/includes/dataTable_footer');
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
	public function removeBanners()
	{
		$banner_id = $this->input->post('banner_id');
		$result = $this->adPro->deleteBannerById($banner_id);
		if($result){
			echo "ok";
		}else{
			echo "fail";
		}
	}
	// MANAGE CATEGORY //
	public function category()
	{
		$data['category'] = $this->adPro->getAllCategoryList();
		$data['level_list'] = $this->adPro->getTrackLevelList();

		$this->load->view('admin/includes/head');
		$this->load->view('admin/includes/header');
		$this->load->view('admin/includes/sidebar');
		$this->load->view('admin/addViewCategories', $data);
		$this->load->view('admin/includes/foot');
		$this->load->view('admin/includes/dataTable_footer');
	}
	public function saveCategory()
	{
		$category = $this->input->post();
		//print_r($category);die;
		if(!empty($category)){
			$cate_title_slug = strtolower($this->input->post('pro_category'));
			$cate_title_slug_format = str_replace(' ', '-', $cate_title_slug);
			$cateArray = array(
				'cate_name' => $this->input->post('pro_category'),
				'cate_title_slug' => $cate_title_slug_format,
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
		$this->load->view('admin/includes/dataTable_footer');
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
		$data['edit_extra'] = $this->adPro->getProductEditableExtraFieldById($editid);
		$data['edit_pic']  = $this->adPro->getProductsEditablePicById($editid); 
		$data['edit_meta'] = $this->adPro->getProductsEditableMetaById($editid);
		$data['category'] = $this->adPro->getAllCategoryList();
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
		//print_r($dataProducts);die;
		if(!empty($dataProducts)){
			
			// SAVE PRODUCTS INFORMATION IN DATABASE //
			$pro_id = $this->input->post('productid');

			$link = $this->input->post('pro_video');
			if(!empty($link)){
				$video_id = explode("?v=", $link);
				$video_id = $video_id[1];
			}else{
				$video_id = '';
			}

			$productsArray = array(
				'cate_id' => $this->input->post('pro_category'),
				'pro_title' => $this->input->post('pro_title'),
				'pro_theme' => $this->input->post('pro_theme'),
				'pro_offers' => $this->input->post('pro_offers_price'),
				'pro_offer_desc' => $this->input->post('pro_offers_desc'),
				'pro_videos' => $video_id,
				'pro_required_picture' => $this->input->post('pro_required_pic'),
				'pro_message_on_card' => $this->input->post('pro_message_on_card'),
				'pro_delivery_days_to' => $this->input->post('deliverd_to'),
				'pro_delivery_days_from' => $this->input->post('deliverd_from'),
				'pro_free_shipping' => $this->input->post('free_shipping'),
				'pro_cash_on_delivery' => $this->input->post('product_on_cod'),
				'pro_price_with_photo' => $this->input->post('price_with_photo'),
				'pro_description' => $this->input->post('pro_desc'),
				'pro_facebook_pixel' => $this->input->post('facebook_pixel')
			);
			$pro_id = $this->adPro->saveUpdatedProductInfo($pro_id, $productsArray);

			// UPDATE PRODUCT SIZE DATA ACCORDING SIZE ID //

			$sizeid = $this->input->post('size_id');
			$productSize = $this->input->post('pro_size');
			$productPrice = $this->input->post('pro_price');

			$prices = array();
			for ($i=0; $i < count($productSize); $i++) { 

				$prices[] = array(
					'size_id' => $sizeid[$i],
					'size_param' => $productSize[$i],
					'size_related_price' => $productPrice[$i]
				);
			} 
			$size_id = $this->adPro->saveUpdatedPriceSizeInfo($prices);

			// UPDATE EXTRA FIELD RECORD BY FILED ID //

			$fieldid = $this->input->post('field_id');
			$field_title = $this->input->post('extra_field_title');
			$field_value = $this->input->post('extra_field_value');

			$fields = array();
			for ($i=0; $i < count($field_title); $i++) { 

				$fields[] = array(
					'extra_id' => $fieldid[$i],
					'extra_field_keys' => $field_title[$i],
					'extra_field_value' => $field_value[$i]
				);
			} 
			$field_id = $this->adPro->saveUpdatedExtraFieldInfo($fields);

			// SAVE META DATA RELATED PRODUCTS //
			$metaDataArray = array(
				'meta_title' => $this->input->post('meta_title'),
				'meta_keywords' => $this->input->post('meta_keywords'),
				'meta_description' => $this->input->post('meta_description')
			);
			$result = $this->adPro->saveUpdatedMetaDataInfo($pro_id, $metaDataArray);

			// SAVE PRODUCTS IMAGES LIST RELATED TO PRODUCTS //
			// $data = array();
	        // // If file upload form submitted
	        // if(!empty($_FILES['userfile']['name'])){
	        //     $filesCount = count($_FILES['userfile']['name']);
	        //     for($i = 0; $i < $filesCount; $i++){
	        //         $_FILES['file']['name']     = $_FILES['userfile']['name'][$i];
	        //         $_FILES['file']['type']     = $_FILES['userfile']['type'][$i];
	        //         $_FILES['file']['tmp_name'] = $_FILES['userfile']['tmp_name'][$i];
	        //         $_FILES['file']['error']    = $_FILES['userfile']['error'][$i];
	        //         $_FILES['file']['size']     = $_FILES['userfile']['size'][$i];
	                
	        //         // File upload configuration
	        //         $uploadPath = 'uploads/products/';
	        //         $config['upload_path'] = $uploadPath;
	        //         $config['allowed_types'] = 'jpg|jpeg|png|gif';
	                
	        //         // Load and initialize upload library
	        //         $this->load->library('upload', $config);
	        //         $this->upload->initialize($config);
	                
	        //         // Upload file to server
	        //         if($this->upload->do_upload('file')){
	        //             // Uploaded file data
	        //             $fileData = $this->upload->data();
	        //             $uploadData[$i]['pic_param'] = $uploadPath.''.$fileData['file_name'];
	        //         }
	        //     }
	        //     $result = $this->adPro->saveUpdatedProductPictureList($pro_id, $uploadData);
	        // }

			$this->session->set_flashdata('message','<span class="alert alert-success">Product Updade Successfully.</span>');
			
			if($result){
				echo "done";
			}else{
				echo "fail";
			}
		}else{
			echo "Invalid Product Data.";
		}
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
    	//$data['pro_status'] = '1'; 
    	$delete = $this->adPro->deleteProductsById($product_id);
    	if($delete){
    		$this->session->set_flashdata('message','<span class="alert alert-danger" style="padding: 6px;">Product Deleted Successfully.</span>');
    		echo "ok";
    	}else{
    		$this->session->set_flashdata('message','<span class="alert alert-danger" style="padding: 6px;">Product Not Deleted Successfully.</span>');
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
		$this->load->view('admin/includes/dataTable_footer');
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
		$this->load->view('admin/includes/dataTable_footer');
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
		$this->load->view('admin/includes/dataTable_footer');
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
		$this->load->view('admin/includes/dataTable_footer');
	}

	public function orders()
	{
		$data['category'] = $this->adPro->getAllCategoryList();
		$data['orders'] = $this->adPro->getUniqueCategoryIdFromOrders();
		// echo "<pre>";
		// print_r($data);die;
		$this->load->view('admin/includes/head');
		$this->load->view('admin/includes/header');
		$this->load->view('admin/includes/sidebar');
		$this->load->view('admin/viewOrders', $data);
		$this->load->view('admin/includes/foot');
		$this->load->view('admin/includes/footer');
	}
	public function getOrderListAccordingCategoryId()
	{
		$cate_id = $this->input->post('cate_id');
		$result['order_list'] = $this->adPro->getOrderListByCategory($cate_id);
		echo json_encode($result);
	}
	// GET ORDERS BY CATEGORY ID //
	public function getOrderListByCategoryId()
	{
		$cate_id = $this->uri->segment(4);
		//echo $cate_id;
		$data['level'] = $this->adPro->getAllOrderTrackLevelByCategoryId($cate_id);
		$data['orders'] = $this->adPro->getAllOrderListAccordingCategory($cate_id);
		$data['track_status'] = $this->adPro->getTrackLevelStatus();
		// echo "<pre>";
		// print_r($data);
		
		$this->load->view('admin/includes/head');
		$this->load->view('admin/includes/header');
		$this->load->view('admin/includes/sidebar');
		$this->load->view('admin/orderCategoryList', $data);
		$this->load->view('admin/includes/foot');
		$this->load->view('admin/includes/dataTable_footer');
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
		$this->load->view('admin/includes/dataTable_footer');
	}

	// UPDATE TRACK LEVEL STATUS BY TRACK LEVEL ID AND ORDER ID //
	public function trackStatusChange()
	{
	        $data = $this->input->post();
		if(!empty($data)){
			$cat_track_id = $this->input->post('cat_track_id');
			$ord_id = $this->input->post('ord_id');
			//$data['track_status'] = $this->input->post('status');
			$check = $this->adPro->checkParameterInTrackStatus($cat_track_id, $ord_id);
			if($check){
				$update_id = $check->ord_trk_id;
				$statusUpdateArray = array(
					'track_status' => $this->input->post('status')
				);
				$result = $this->adPro->updateStatusofTrackLevel($update_id, $statusUpdateArray);
				if($result){
					echo "access";
				}else{
					echo "denied";
				}
			}else{
				$statusSaveArray = array(
					'cat_track_id' => $this->input->post('cat_track_id'),
					'ord_id' => $this->input->post('ord_id'),
					'track_status' => $this->input->post('status')
				);
				$result = $this->adPro->saveTrackLevelStatusOfOrders($statusSaveArray);
				if($result){
					echo "access";
				}else{
					echo "denied";
				}
			}
		}else{
			echo "No";
		}
	}
	// UPDATE TRACK LEVEL STATUS BY TRACK LEVEL ID AND ORDER ID //
	public function trackLevelNo()
	{
	        $data = $this->input->post();
		if(!empty($data)){
			$data['cat_track_id'] = $this->input->post('cat_track_id');
			$data['ord_id'] = $this->input->post('ord_id');
			$data['track_status'] = '0';
			$result = $this->adPro->saveTrackLevelStatusOfOrdersNo($data);
			if($result){
				echo "TrackNo";
			}else{
				echo "TrackYes";
			}
		}else{
			echo "No";
		}
	}
	// DELETE ODER FROM ADMIN SECTION //
	public function delete_order()
	{
		$cate_id = $this->uri->segment(4);
		$ord_id = $this->uri->segment(5);
		$result = $this->adPro->delete_order_by_id($ord_id);
		//$check_category = $this->adPro->checkCategoryInOrder($cate_id);
		if($result){
			$this->session->set_flashdata('message','<span class="alert alert-danger" style="padding: 2px;">Order Deleted Successfully.</span>');
    		redirect('admin/products/orders');
		}else{
			$this->session->set_flashdata('message','<span class="alert alert-danger" style="padding: 2px;">Order Delete Successfully.</span>');
    		redirect('admin/products/orders');
		}
	}
	// CHANGE PACKED ORDER STATUS //

	public function photoPackedNo()
	{
	        $data = $this->input->post();
		if(!empty($data)){
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
		$data = $this->input->post();
		if(!empty($data)){
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
		$data = $this->input->post();
		if(!empty($data)){
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