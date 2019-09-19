<?php 
 class About extends CI_Controller{
	public function index()
	{
		$this->load->library('session');
		if ($this->session->has_userdata('userid'))
		{
			redirect('login/index');
		}
	        $this->load->view('templates/main_header');
	        $this->load->view('pages/view_about');
	        $this->load->view('templates/footer');
	}
}
?>