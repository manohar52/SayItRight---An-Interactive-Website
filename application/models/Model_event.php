<?php 

class Model_event extends CI_Model
{
	public function load_events()
	{
		$today = date('Y-m-d');
		$this->db->select('event.event_id, event.event_type,event_types.type_desc, event.description, event.date, event.state,states.name');
		$this->db->from('event');
		$this->db->join('event_types', 'event.event_type = event_types.event_type','inner');
		$this->db->join('states','event.state = states.state_code','inner');
		$this->db->where('DATE(event.date) >= ',$today);
		
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}

	public function load_user_events($userid)
	{
		$query = $this->db->get_where('user_event', array('userid' => $userid));
		$result = $query->result_array();
		return $result;
	}
	public function register($userid,$eventid)
	{
		$this->db->insert('user_event',array('userid' => $userid, 'event_id' => $eventid));
	}
	public function deregister($userid,$eventid)
	{
		$this->db->where(array('userid' => $userid, 'event_id' => $eventid));
		$this->db->delete('user_event');
	}

	public function load_myevents($userid)
	{

		$this->db->select('event.event_id, event.event_type,event_types.type_desc, event.description, event.date, event.state,states.name');
		$this->db->from('event');
		$this->db->join('event_types', 'event.event_type = event_types.event_type','inner');
		$this->db->join('states','event.state = states.state_code','inner');
		$this->db->join('user_event','user_event.event_id = event.event_id','inner');
		$this->db->where('user_event.userid',$userid);
		
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}	

	public function load_admin_events($adminid)
	{

		$this->db->select('event.event_id, event.event_type,event_types.type_desc, event.description, event.date, event.state,states.name');
		$this->db->from('event');
		$this->db->join('event_types', 'event.event_type = event_types.event_type','inner');
		$this->db->join('states','event.state = states.state_code','inner');
		$this->db->where('event.organizer',$adminid);
		
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}	

	public function get_event_types()
	{
		$query = $this->db->get('event_types');
		$res = $query->result_array();
		return $res;
	}

	public function get_states()
	{
		$query = $this->db->get('states');
		$res = $query->result_array();
		return $res;	
	}

	public function save_event($action,$organizer,$event_id,$event_type_id,$event_desc,$event_date,$event_state_code)
	{
		switch ($action)
		{
			case 'CREATE':
				$this->db->insert('event',array(  'event_type' => $event_type_id,
												  'description' => $event_desc,
												  'date' => $event_date,
												  'state' => $event_state_code,
												  'organizer' => $organizer));
				break;
			
			case 'UPDATE':
				$this->db->where(array('event_id' => $event_id));
				$this->db->update('event',array( 'event_type' => $event_type_id,
												  'description' => $event_desc,
												  'date' => $event_date,
												  'state' => $event_state_code,
												  'organizer' => $organizer));
				break;
		}
	}

	public function delete_event($event_id)
	{
		$query = $this->db->get_where('user_event',array('event_id' => $event_id),1);
		// print_r($this->db->last_query());    
		if ($query->num_rows())
		{
			return FALSE;				
		}
		else
		{
			$this->db->delete('event',array('event_id' => $event_id));
			return TRUE;
		}
	}
}

?>