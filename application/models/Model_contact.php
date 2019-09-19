<?php 

class Model_contact extends CI_Model
{

	function __construct()
	{
		$this->load->database();
	}
	public function update_message($fname,$lname,$phone,$msg)
	{
		$data = array( 'fname' => $fname,
					   'lname' => $lname,
					   'phone' => $phone,
					   'message' => $msg);
		$this->db->insert('contactus',$data);
	}
}

?>