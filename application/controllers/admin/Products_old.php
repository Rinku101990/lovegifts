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
		$this->load->model('AdminProducts', 'adPro');
		$this->load->database();
        	$this->load->model('import_model', 'import');
	}

	public function add()
	{
		// $name = $this->session->userdata('name');
		// if(empty($reference)){
		// 	redirect('welcome/index','refresh');
		// }

		$data['pincode'] = $this->adPro->getPincodeList();

		$this->load->view('admin/includes/head');
		$this->load->view('admin/includes/header');
		$this->load->view('admin/includes/sidebar');
		$this->load->view('admin/addProducts', $data);
		$this->load->view('admin/includes/foot');
		$this->load->view('admin/includes/footer');
	}
	public function saveProducts()
	{
		
		$dataProducts = $this->input->post();

		if(!empty($dataProducts)){
			
			// SAVE PRODUCTS INFORMATION IN DATABASE //
			$productsArray = array(
				'pro_title' => $this->input->post('pro_title'),
				'pro_theme' => $this->input->post('pro_theme'),
				'pro_offers' => $this->input->post('pro_offers'),
				'pro_videos' => $this->input->post('pro_video'),
				'pro_required_picture' => $this->input->post('pro_required_pic'),
				'pro_message_on_card' => $this->input->post('pro_message_on_card'),
				'pro_description' => $this->input->post('pro_desc'),
				'pro_delivery_days_to' => $this->input->post('deliverd_to'),
				'pro_delivery_days_from' => $this->input->post('deliverd_from'),
				'pro_status' => '0',
				'pro_created' => date('Y-m-d H:i:s')
			);
			$pro_id = $this->adPro->saveProductInfo($productsArray);

			// SAVE PINCODE AVAILABILITY //
			$pin_code = '110001';
			foreach($pin_code as $code){
				$pincodeArray = array(
					'pro_id' => $pro_id,
					'pin_code' => $code,
					'avail_created' => date('Y-m-d H:i:s')
				);
				$pin_code_id = $this->adPro->savePincodeInfo($pincodeArray);
			}
			

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

			$this->session->set_flashdata('message','<span class="alert alert-success">Product Added Successfully.</span>');
			
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
		//$result['pic'] = $this->adPro->getProductPictureById($product_id);
		$result['price'] = $this->adPro->getProductPriceById($product_id);
		//print_r($result);die;
		echo json_encode($result);
	}
	// DELETE PRODUCTS FROM TABLE //
	public function deleteProducts()
    {
    	$product_id = $this->input->post('pro_id');
    	$delete = $this->adPro->deleteProductsById($product_id);
    	$this->session->set_flashdata('message','<span class="alert alert-danger">Product Deleted Successfully.</span>');
    	$status = "false";
    	if ($this->db->affected_rows() > 0){
   		$status = "true";
  		}
  		echo $status;
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
                //print_r($allDataInSheet);die;
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
		$data['orders'] = $this->adPro->getAllOrderList();
		//print_r($data);die;
		$this->load->view('admin/includes/head');
		$this->load->view('admin/includes/header');
		$this->load->view('admin/includes/sidebar');
		$this->load->view('admin/viewOrders', $data);
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