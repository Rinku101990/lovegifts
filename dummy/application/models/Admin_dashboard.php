<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_dashboard extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function getAllOrders()
	{
		$this->db->select('count(*)');
		$query = $this->db->get('lovegift_orders');
		$count = $query->row_array();
		return $count;
	}

	public function getAllProducts()
	{
		$this->db->select('count(*)');
		$query = $this->db->get('lovegift_products');
		$count = $query->row_array();
		return $count;
	}

	public function getAllUsers()
	{
		$this->db->select('count(*)');
		$query = $this->db->get('lovegift_users');
		$count = $query->row_array();
		return $count;
	}

	public function getAllNotifications()
	{
		$this->db->select('count(*)');
		$query = $this->db->get('lovegift_notification');
		$count = $query->row_array();
		return $count;
	}
}