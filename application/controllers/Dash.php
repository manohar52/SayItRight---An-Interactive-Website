<?php 

class Dash extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$this->load->library('session');
		if (!($this->session->has_userdata('userid'))) 
		{
			redirect('login/index');
		}
		elseif($this->session->userdata('role') != 1)
		{
			redirect('login/index');
		}
		$userid = $this->session->userdata('userid');
		$this->load->model('model_dash');
		$event_data = $this->model_dash->fetch_user_event_data($userid);
		$conf_data = $this->model_dash->fetch_user_conf_data($userid);

		$data['event_past'] = $event_data['ep'];
		$data['event_fut'] = $event_data['ef'];
		$data['event_title'] = $event_data['etitle'];
		$data['event_date'] = $event_data['edate'];
		$data['event_desc'] = $event_data['edesc'];

		$data['conf_past'] = $conf_data['cp'];
		$data['conf_fut'] = $conf_data['cf'];
		$data['conf_title'] = $conf_data['ctitle'];
		$data['conf_date'] = $conf_data['cdate'];
		$data['conf_desc'] = $conf_data['cdesc'];		

		$data['act2co'] = $data['event_fut'] + $data['conf_fut'];
		$data['act_past'] = $data['event_past'] + $data['conf_past'];

		$this->load->view('templates/ind_header');
		$this->load->view('pages/view_dash',$data);
		$this->load->view('templates/footer');

	}	
}


?>