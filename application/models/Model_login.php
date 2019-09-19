<?php 

class Model_login extends CI_Model
{
	public function authenticate($email,$pass)
	{
		
		$query = $this->db->get_where('user_master', array('email_id' => $email), 1);
		$res = $query->result_array();
		if ($res)
		{	$user_det = $res[0];
			if ($user_det['password'] == $pass)
			{
				return $user_det;
			}
			else
			{
				return FALSE;
			}
		}
		else
		{
			return FALSE;
		}
		
	}
}

?>