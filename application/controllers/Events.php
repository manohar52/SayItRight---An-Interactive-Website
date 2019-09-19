<?php 

class Events extends CI_Controller
{
	private $data;
	
	function __construct()
	{
		parent::__construct();
		$this->data['msg'] = "";
	}

	public function index()
	{
		$this->load->library('session');
		if (!($this->session->has_userdata('userid'))) 
		{
			redirect('login/index');
		}
		$userid = $this->session->userdata('userid');		

		$this->load->model('model_event');
		$event_list = $this->model_event->load_events();
		$user_events = $this->model_event->load_user_events($userid);
		$data['event_list'] = $event_list;
		$data['user_events'] = $user_events;

		$this->load->view('templates/ind_header');
		$this->load->view('pages/view_events',$data);
		$this->load->view('templates/footer');

	}
	public function reg_dreg()
	{
		$this->load->library('session');
		$userid = $this->session->userdata('userid');	
		$event_id = $this->input->post('event_id');

		$this->load->model('model_event');
		$func = $this->input->post('button_type');
		switch ($func) {
			case 'r':
				$this->model_event->register($userid,$event_id);
				break;
			
			case 'd':
				$this->model_event->deregister($userid,$event_id);
				break;
		}
		$this->index();		

	}

	public function myevents()
	{
		$this->load->library('session');
		if (!($this->session->has_userdata('userid'))) 
		{
			redirect('login/index');
		}
		$userid = $this->session->userdata('userid');		

		$this->load->model('model_event');
		$user_events = $this->model_event->load_myevents($userid);
		$data['user_events'] = $user_events;

		$this->load->view('templates/ind_header');
		$this->load->view('pages/view_myevents',$data);
		$this->load->view('templates/footer');

	}
}

?>