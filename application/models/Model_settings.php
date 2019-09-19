<?php 
class Model_settings extends CI_Model
{
	public function get_user_data($userid)
	{
		$query = $this->db->get_where('user_master',array('userid' => $userid));
		$ret = $query->result_array();
		return $ret[0];

	}
	public function update_user_img($userid,$img)
	{  
		$this->db->update('user_master',array('image_url' => $img),array('userid' => $userid));
	}
	public function update_user_data($userid,$user_data)
	{  
		$q = $this->db->update('user_master',$user_data,array('userid' => $userid));
		echo $q;
	}
}

?>