<?php 

class Conf_admin extends CI_Controller
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
		$userid = $this->session->userdata('userid');

		$this->load->model('model_conf');
		$data['admin_conf'] = $this->model_conf->load_admin_conf($userid);

		if ($this->data['msg']) 
		{
			$data['msg'] = $this->data['msg'];
			$this->data['msg'] = "";
		}
		$this->load->view('templates/conf_header');
		$this->load->view('pages/view_conf_admin',$data);
		$this->load->view('templates/footer');		
	}

	public function cre_edit_del_conf()
	{
		$this->load->model('model_conf');

		$conf_id = $this->input->post('conf_id');
		$action = $this->input->post('action');

		switch ($action)
		 {
			case 'edit':
			$data['conf_types'] = $this->model_conf->get_conf_types();
			$data['states'] = $this->model_conf->get_states();
			$data['upd_crt'] = "UPDATE";
			$data['conf_det'] = array( 'conf_id' => $conf_id,
										'conf_type_id' => $this->input->post('conf_type_id'),
										'conf_type' => $this->input->post('conf_type'),
										'conf_desc' => $this->input->post('conf_desc'),
										'conf_date' => $this->input->post('conf_date'),
										'conf_state' => $this->input->post('conf_state'),
										'conf_state_code' => $this->input->post('conf_state_code'));
			$this->load->view('pages/view_edit_conf',$data);
			$this->load->view('templates/footer');		
			break;
			
			case 'create':
				$data['conf_types'] = $this->model_conf->get_conf_types();
				$data['states'] = $this->model_conf->get_states();
				$data['upd_crt'] = "CREATE";
				$this->load->view('pages/view_edit_conf',$data);
				$this->load->view('templates/footer');		
				break;

			case 'delete':
				$data['eve_id'] = $conf_id;
				$res = $this->model_conf->delete_conf($conf_id);
				if ($res == FALSE) 
				{
					$this->data['msg'] = "&#10060"."conf already registered by users";
				}
				$this->index();
				break;
		}
	}

	public function save_conf()
	{
		$this->load->library('session');
		if ($this->session->has_userdata('userid'))
		{
			$organizer = $this->session->userdata('userid');
		}
		$this->load->model('model_conf');
		$action = $this->input->post('upd_crt');

		$conf = explode(" ",$this->input->post('conf_type'));
		$state_code = explode(" ",$this->input->post('state'));

		$this->model_conf->save_conf( $action,
										$organizer,
										$this->input->post('conf_id'),
										$conf[0],
										$this->input->post('conf_desc'),
										$this->input->post('conf_date'),
										$state_code[0]);
		$this->index();

	}
	public function cancel_conf()
	{
		$this->index();
	}

}

?>