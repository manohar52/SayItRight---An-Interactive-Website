<?php 
class Model_home extends CI_Model
{
	
	public function __construct()
	{
		$this->load->database();
	}

	public function subscribe($emailid)
	{

			$data = array('emailid' => $emailid);
			$this->db->insert('subscription',$data);
	}
}


?>