<?php 

class Model_conf extends CI_Model
{
	public function load_conf()
	{
		$today = date('Y-m-d');
		$this->db->select('conference.conf_id, conference.conf_type,conference_types.type_desc, conference.description, conference.date, conference.state,states.name');
		$this->db->from('conference');
		$this->db->join('conference_types', 'conference.conf_type = conference_types.conf_type','inner');
		$this->db->join('states','conference.state = states.state_code','inner');
		$this->db->where('DATE(conference.date) >= ',$today);
		
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}

	public function load_user_conf($userid)
	{
		$query = $this->db->get_where('user_conference', array('userid' => $userid));
		$result = $query->result_array();
		return $result;
	}
	public function register($userid,$confid)
	{
		$this->db->insert('user_conference',array('userid' => $userid, 'conf_id' => $confid));
	}
	public function deregister($userid,$confid)
	{
		$this->db->where(array('userid' => $userid, 'conf_id' => $confid));
		$this->db->delete('user_conference');
	}

	public function load_myconf($userid)
	{

		$this->db->select('conference.conf_id, conference.conf_type,conference_types.type_desc, conference.description, conference.date, conference.state,states.name');
		$this->db->from('conference');
		$this->db->join('conference_types', 'conference.conf_type = conference_types.conf_type','inner');
		$this->db->join('states','conference.state = states.state_code','inner');
		$this->db->join('user_conference','user_conference.conf_id = conference.conf_id','inner');
		$this->db->where('user_conference.userid',$userid);
		
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}	

	public function load_admin_conf($adminid)
	{

		$this->db->select('conference.conf_id, conference.conf_type,conference_types.type_desc, conference.description, conference.date, conference.state,states.name');
		$this->db->from('conference');
		$this->db->join('conference_types', 'conference.conf_type = conference_types.conf_type','inner');
		$this->db->join('states','conference.state = states.state_code','inner');
		$this->db->where('conference.organizer',$adminid);
		
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}	

	public function get_conf_types()
	{
		$query = $this->db->get('conference_types');
		$res = $query->result_array();
		return $res;
	}

	public function get_states()
	{
		$query = $this->db->get('states');
		$res = $query->result_array();
		return $res;	
	}

	public function save_conf($action,$organizer,$conf_id,$conf_type_id,$conf_desc,$conf_date,$conf_state_code)
	{
		switch ($action)
		{
			case 'CREATE':
				$this->db->insert('conference',array( 'conf_type' => $conf_type_id,
													  'description' => $conf_desc,
													  'date' => $conf_date,
													  'state' => $conf_state_code,
													  'organizer' => $organizer));
				break;
			
			case 'UPDATE':
				$this->db->where(array('conf_id' => $conf_id));
				$this->db->update('conference',array( 'conf_type' => $conf_type_id,
													  'description' => $conf_desc,
													  'date' => $conf_date,
													  'state' => $conf_state_code,
													  'organizer' => $organizer));
				break;
		}
	}

	public function delete_conf($conf_id)
	{
		$query = $this->db->get_where('user_conference',array('conf_id' => $conf_id),1);
		// print_r($this->db->last_query());    
		if ($query->num_rows())
		{
			return FALSE;				
		}
		else
		{
			$this->db->delete('conference',array('conf_id' => $conf_id));
			return TRUE;
		}
	}
}

?>