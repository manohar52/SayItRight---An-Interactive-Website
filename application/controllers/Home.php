<?php 
 class Home extends CI_Controller{
	public function index()
	{
		$this->load->library('session');
		if ($this->session->has_userdata('userid'))
		{
			redirect('login/index');
		}
	        $this->load->view('templates/main_header');
	        $this->load->view('pages/view_home');
	        $this->load->view('templates/footer');
	}
	public function subscribe()
	{
		$this->form_validation->set_rules('sub', 'Email', 'required|is_unique[subscription.emailid]',
		array('is_unique' => 'Email ID already subscribed'));
		$valid = $this->form_validation->run();
		if ($valid == TRUE) 
		{	
			$emailid = $this->input->post('sub');
			$this->load->model('model_home');
			$msg = "Thank you for subscribing to Say It Right!";
			$msg = wordwrap($msg,70);
			if(mail($emailid,"Say It Right",$msg))
			{
				$this->model_home->subscribe($emailid);
    		}
    		$data['msg'] = "&#9989".$msg;
			$this->load->view('templates/main_header');
	        $this->load->view('pages/view_home',$data);
	        $this->load->view('templates/footer');   
		}	
		else
		{
			$this->index();
		}
	}
}