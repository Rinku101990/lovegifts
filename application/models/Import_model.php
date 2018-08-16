<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Import_model extends CI_Model {

    public function importData($data) 
    {
        $res = $this->db->insert_batch('lovegift_pincode',$data);
        if($res){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function getAllPincodeList()
    {
    	$this->db->select('*');
    	$this->db->from('lovegift_pincode');
        $this->db->limit(100);
    	$query = $this->db->get();
    	//echo $this->db->last_query();
    	return $query->result();
    }
 
}
 
?>
