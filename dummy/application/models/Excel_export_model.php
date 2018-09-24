<?php
class Excel_export_model extends CI_Model
{
	function fetch_data()
	{
		$this->db->order_by("id", "DESC");
		$query = $this->db->get("employee");
		return $query->result();
	}

	public function getOrderRecordAccordingCategoryId($cate_id)
	{
		$this->db->select('pro.pro_title, urs.user_name,urs.user_address1, urs.user_address2, urs.user_nearby_landmark,urs.user_pincode,urs.user_state,urs.user_city,urs.user_mobile_no,urs.user_whatsapp_no,ord.*');
		$this->db->from('lovegift_orders ord');
		$this->db->join('lovegift_products pro','ord.pro_id=pro.pro_id','left');
		$this->db->join('lovegift_users urs','ord.user_id=urs.user_id','left');
		$this->db->where('ord.cate_id', $cate_id);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}

	
}
