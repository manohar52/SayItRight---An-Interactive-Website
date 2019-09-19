<?php 

class Event_admin extends CI_Controller
{
	private $data;
	
	function __construct()
	{
		parent::__construct();
		$this->data['msg'] = "";
	}
	public function index()
	{
		$data = [];
		$this->load->library('session');
		if (!($this->session->has_userdata('userid'))) 
		{
			redirect('login/index');
		}
		elseif($this->session->userdata('role') != 2)
		{
			redirect('login/index');
		}
		$userid = $this->session->userdata('userid');

		$this->load->model('model_event');
		$data['admin_events'] = $this->model_event->load_admin_events($userid);

		if ($this->data['msg']) 
		{
			$data['msg'] = $this->data['msg'];
			$this->data['msg'] = "";
		}
		$this->load->view('templates/event_header');
		$this->load->view('pages/view_event_admin',$data);
		$this->load->view('templates/footer');		
	}

	public function cre_edit_del_event()
	{
		$this->load->model('model_event');

		$event_id = $this->input->post('event_id');
		$action = $this->input->post('action');

		switch ($action)
		 {
			case 'edit':
			$data['event_types'] = $this->model_event->get_event_types();
			$data['states'] = $this->model_event->get_states();
			$data['upd_crt'] = "UPDATE";
			$data['event_det'] = array( 'event_id' => $event_id,
										'event_type_id' => $this->input->post('event_type_id'),
										'event_type' => $this->input->post('event_type'),
										'event_desc' => $this->input->post('event_desc'),
										'event_date' => $this->input->post('event_date'),
										'event_state' => $this->input->post('event_state'),
										'event_state_code' => $this->input->post('event_state_code'));
			$this->load->view('pages/view_edit_event',$data);
			$this->load->view('templates/footer');		
			break;
			
			case 'create':
				$data['event_types'] = $this->model_event->get_event_types();
				$data['states'] = $this->model_event->get_states();
				$data['upd_crt'] = "CREATE";
				$this->load->view('pages/view_edit_event',$data);
				$this->load->view('templates/footer');		
				break;

			case 'delete':
				$data['eve_id'] = $event_id;
				$res = $this->model_event->delete_event($event_id);
				if ($res == FALSE) 
				{
					$this->data['msg'] = "&#10060"."Event already registered by users";
				}
				$this->index();
				break;
		}
	}

	public function save_event()
	{
		$this->load->library('session');
		if ($this->session->has_userdata('userid'))
		{
			$organizer = $this->session->userdata('userid');
		}
		$this->load->model('model_event');
		$action = $this->input->post('upd_crt');

		$event = explode(" ",$this->input->post('event_type'));
		$state_code = explode(" ",$this->input->post('state'));

		$this->model_event->save_event( $action,
										$organizer,
										$this->input->post('event_id'),
										// $this->input->post('event_type_id'),
										$event[0],
										$this->input->post('event_desc'),
										$this->input->post('event_date'),
										$state_code[0]);
										// $this->input->post('event_state_code'));
		$this->index();

	}
	public function cancel_event()
	{
		$this->index();
	}
}
?>