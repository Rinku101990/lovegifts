<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_orders extends CI_Model {

	public function getOrderStatuslist($orders_no, $mobile_no)
	{
		$this->db->select('pr.pro_title,urs.*,ord.*');
		$this->db->from('lovegift_orders ord');
		$this->db->join('lovegift_users urs','ord.user_id=urs.user_id','left');
		$this->db->join('lovegift_products pr','ord.pro_id=pr.pro_id','left');
		$this->db->where('ord.ord_reference_id', $orders_no);
		$this->db->where('urs.user_mobile_no', $mobile_no);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();

	}
	
}