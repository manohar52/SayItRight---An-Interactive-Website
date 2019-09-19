<?php 

class Model_signup extends CI_Model
{
	public function individual_reg($user_data)
	{
		$this->db->insert('user_master',$user_data);
		return $this->db->insert_id();
	}

}

?>