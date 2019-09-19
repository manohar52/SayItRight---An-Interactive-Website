<?php 

class Model_dash extends CI_Model
{
	
	public function fetch_user_event_data($userid)
	{
		$event_title = $event_date = $event_desc = [];
		$ind = 1;
		$event_past = $event_fut = 0;

		$this->db->select('event.event_id, event.event_type,event_types.type_desc, event.description, event.date, event.state,states.name');
		$this->db->from('event');
		$this->db->join('event_types', 'event.event_type = event_types.event_type','inner');
		$this->db->join('states','event.state = states.state_code','inner');
		$this->db->join('user_event','user_event.event_id = event.event_id','inner');
		$this->db->where('user_event.userid',$userid);

		$query = $this->db->get();
		foreach ($query->result() as $item) 
		{
			if($item->date < date("Y-m-d"))
			{
				$event_past = $event_past + 1;
			}
			else
			{
				$event_fut = $event_fut + 1;
				$event_title[$ind] = $item->type_desc;
				$event_date[$ind] = $item->date;
				$event_desc[$ind] = $item->description;
				$ind = $ind + 1;				
			}
		}
		$event_data = array( 'ep' => $event_past,
							 'ef' => $event_fut,
							 'etitle' => $event_title,
							 'edate' => $event_date,
							 'edesc' => $event_desc);
		return $event_data;
	}

public function fetch_user_conf_data($userid)
	{
		$ind = 1;
		$conf_past = $conf_fut = 0;
		$conf_title = $conf_date = $conf_desc = [];

		$this->db->select('conference.conf_id, conference.conf_type,conference_types.type_desc, conference.description, conference.date, conference.state,states.name');
		$this->db->from('conference');
		$this->db->join('conference_types','conference.conf_type = conference_types.conf_type','inner');
		$this->db->join('states','conference.state = states.state_code','inner');
		$this->db->join('user_conference','user_conference.conf_id = conference.conf_id','inner');
		$this->db->where('user_conference.userid',$userid);

		$query = $this->db->get();
		foreach ($query->result() as $item) 
		{
			if($item->date < date("Y-m-d"))
			{
				$conf_past = $conf_past + 1;
			}
			else
			{
				$conf_fut = $conf_fut + 1;
				$conf_title[$ind] = $item->type_desc;
				$conf_date[$ind] = $item->date;
				$conf_desc[$ind] = $item->description;
				$ind = $ind + 1;				
			}
		}
		$conf_data = array( 'cp' => $conf_past,
							 'cf' => $conf_fut,
							 'ctitle' => $conf_title,
							 'cdate' => $conf_date,
							 'cdesc' => $conf_desc);
		return $conf_data;
	}	
}

?>