<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excel_export extends CI_Controller {
	
	// function index()
	// {
	// 	$this->load->model("excel_export_model");
	// 	$data["employee_data"] = $this->excel_export_model->fetch_data();
	// 	$this->load->view("excel_export_view", $data);
	// }

	function action()
	{
		$this->load->model("excel_export_model");
		$this->load->library("excel");
		$object = new PHPExcel();

		$object->setActiveSheetIndex(0);

		$table_columns = array("Order_No", "Order_Date", "Customer_Name", "Address1", "Address2","Landmark", "Pincode","City","State","Calling_Mobile","Whatsapp_Mobile","Product_Name","Mode_Of_Payment","Message_Txt");

		$column = 0;

		foreach($table_columns as $field)
		{
			$object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
			$column++;
		}
		$cate_id = $this->input->post('category_id');
		//print_r($cate_id);die;
		$order_data = $this->excel_export_model->getOrderRecordAccordingCategoryId($cate_id);

		$excel_row = 2;

		foreach($order_data as $row)
		{
			$object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->ord_reference_id);
			$order_date = date('d M-Y', strtotime($row->ord_created));
			$object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $order_date);
			$object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->user_name);
			$object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->user_address1);
			$object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->user_address2);
			$object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->user_nearby_landmark);
			$object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->user_pincode);
			$object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->user_state);
			$object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row->user_city);
			$object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row->user_mobile_no);
			$object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $row->user_whatsapp_no);
			$object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $row->pro_title);
			if(($row->ord_mode_of_payments)=='0'){
				$object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, 'Cash On Delivery');
			}else{
				$object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, 'Online Payments');
			}
			if(($row->ord_txt_message)!=''){
				$object->getActiveSheet()->setCellValueByColumnAndRow(13, $excel_row, $row->ord_txt_message);
			}else{
				$object->getActiveSheet()->setCellValueByColumnAndRow(13, $excel_row, 'NA');
			}
			
			$excel_row++;
		}

		$object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Order_list_'.date('y').'_'.date('m').'_'.date('d').'.xls"');
		$object_writer->save('php://output');
	}

	
	
}

















































	