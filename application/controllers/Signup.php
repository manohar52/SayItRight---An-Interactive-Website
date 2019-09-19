<?php 

class Signup extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$this->load->library('session');
		if ($this->session->has_userdata('userid'))
		{
			redirect('login/index');
		}
		$this->load->view('templates/main_header');
		$this->load->view('pages/view_signup_m');
		$this->load->view('pages/view_signup_footer');
		$this->load->view('templates/footer');
	}
	public function ind()
	{
		$this->load->view('templates/main_header');
		$this->load->view('pages/view_signup_m');
		$this->load->view('pages/view_signup_i');
		$this->load->view('pages/view_signup_footer');
		$this->load->view('templates/footer');	
	}
	public function evt()
	{
		$this->load->view('templates/main_header');
		$this->load->view('pages/view_signup_m');
		$this->load->view('pages/view_signup_e');
		$this->load->view('pages/view_signup_footer');
		$this->load->view('templates/footer');	
	}
	public function bus()
	{
		$this->load->view('templates/main_header');
		$this->load->view('pages/view_signup_m');
		$this->load->view('pages/view_signup_b');
		$this->load->view('pages/view_signup_footer');
		$this->load->view('templates/footer');	
	}

	public function ind_reg()
	{
		$this->form_validation->set_rules('fname','First Name','required|alpha');
		$this->form_validation->set_rules('lname','Last Name','required|alpha');
		$this->form_validation->set_rules('work','Work location','required|alpha');
		$this->form_validation->set_rules('school','School','required');
		$this->form_validation->set_rules('email','Email Id','required|valid_email|is_unique[user_master.email_id]');
		$this->form_validation->set_rules('pass','Password','required|callback_password_check');

		$valid = $this->form_validation->run();
		if($valid == TRUE)
		{
			$this->load->model('model_signup');
			$user_data = array( 'fname' => $this->input->post('fname'),
								'lname' => $this->input->post('lname'),
								'work_loc' => $this->input->post('work'),
								'school' => $this->input->post('school'),
								'email_id' => $this->input->post('email'),
								'password' => $this->input->post('pass'),
								'role_id' => 1,
								'image_url' => 'user.jpg');

			$userid = $this->model_signup->individual_reg($user_data);
			$this->load->library('session');
			$login = array('userid' => $userid, 'role' => 1);
			$this->session->set_userdata($login); 
			redirect('dash/index');
		}
		else
		{
			$this->ind();
		}
	}

	public function evt_reg()
	{
		$this->form_validation->set_rules('fname','First Name','required|alpha');
		$this->form_validation->set_rules('lname','Last Name','required|alpha');
		$this->form_validation->set_rules('email','Email Id','required|valid_email|is_unique[user_master.email_id]');
		$this->form_validation->set_rules('pass','Password','required|callback_password_check');

		$valid = $this->form_validation->run();
		if($valid == TRUE)
		{
			$this->load->model('model_signup');
			$user_data = array( 'fname' => $this->input->post('fname'),
								'lname' => $this->input->post('lname'),
								'email_id' => $this->input->post('email'),
								'password' => $this->input->post('pass'),
								'role_id' => 2,
								'image_url' => 'user.jpg');

			$userid = $this->model_signup->individual_reg($user_data);
			$this->load->library('session');
			echo $userid;
			$login = array('userid' => $userid, 'role' => 2);
			$this->session->set_userdata($login);
			redirect('event_admin/index');
		}
		else
		{
			$this->evt();
		}
	}
	public function bus_reg()
	{
		$this->form_validation->set_rules('fname','First Name','required|alpha');
		$this->form_validation->set_rules('email','Email Id','required|valid_email|is_unique[user_master.email_id]');
		$this->form_validation->set_rules('password','Password','required|callback_password_check');

		$valid = $this->form_validation->run();
		if($valid == TRUE)
		{
			if ($this->input->post('optradio') == 'U') 
			{
				$subrole = 1;
			}
			else
			{
				$subrole = 2;
			}
			$this->load->model('model_signup');
			$user_data = array( 'fname' => $this->input->post('fname'),
								'email_id' => $this->input->post('email'),
								'password' => $this->input->post('password'),
								'role_id' => 3,
								'sub_role_id' => $subrole,
								'image_url' => 'user.jpg');

			$userid = $this->model_signup->individual_reg($user_data);
			$this->load->library('session');
			$login = array('userid' => $userid, 'role' => 3);
			$this->session->set_userdata($login);
			redirect('conf_admin/index');
		}
		else
		{
			$this->bus();
		}
	}

	public function password_check($pass)
	{
		if(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\da-zA-Z]).{8,15}$/", $pass))
		{
			$this->form_validation->set_message('password_check','Password should be of length 8-15, must contain atleast one upper, one lower case, one special character, and one number');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

}

?>