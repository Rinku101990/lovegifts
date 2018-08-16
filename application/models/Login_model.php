<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}
    
    // AUTHERIZATION OF USER FROM DATABASE //
    public function verification($username, $userpass){

        $this->db->select('*');
        $this->db->from('lovegift_admin');
        $this->db->where('adm_email', $username);
        $this->db->where('adm_pass', $userpass);
        $query = $this->db->get();
        //echo $this->db->last_query();
        $rowCount = $query->num_rows();
    		if($rowCount>0)	{
    			$result = $query->row();
                $id = $result->adm_id;
                $role = $result->adm_email;
                //print_r($role);die;
    			$userdata = array(
    			'id' => $result->adm_id,
    			'email' => $result->adm_email,
                	'name' => $result->adm_name
                );
    			$this->session->set_userdata($userdata);
    			return $role;
    		} else {
    			return false;
    		}
    }
	
}