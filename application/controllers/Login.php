<?php 

class Login extends CI_Controller
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
		if ($this->session->has_userdata('userid')) {
			// echo $this->session->userdata('role');
			switch ($this->session->userdata('role')) {
				case 1:
					redirect('dash/index');
					break;
				case 2:
					redirect('event_admin/index');
					break;
				case 3:
					redirect('conf_admin/index');
					break;
			}
		}
		$this->load->view('templates/main_header');
		$this->load->view('pages/view_login',$this->data);
		$this->load->view('templates/footer');
	}

	public function signin()
	{
		$this->form_validation->set_rules('email','Email ID','required|valid_email');
		$this->form_validation->set_rules('password','Password','required');
		$valid = $this->form_validation->run();
		if ($valid == TRUE) 
		{
			$this->load->model('model_login');
			$user_data = $this->model_login->authenticate($this->input->post('email'),$this->input->post('password'));
			if ($user_data == FALSE) {
				$this->data['msg'] = "Authentication failed! Try again with correct credentials.";
				$this->index();	
			}
			else
			{
				$this->load->library('session');
				$login = array('userid' => $user_data['userid'],
								'role' => $user_data['role_id'] );
				$this->session->set_userdata($login);
				switch ($user_data['role_id']) {
					case 1:
						redirect('dash/index');
						break;
					case 2:
						redirect('event_admin/index');
						break;
					case 3:
						redirect('conf_admin/index');
						break;
				}
			}
		}
		else
		{
			$this->index();
		}
	}
}


?>