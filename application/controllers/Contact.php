<?php 

class Contact extends CI_Controller
{
	private $data;
	public function __construct()
	{
		parent::__construct();
		$this->data['msg'] = "";
	}

	public function index()
	{
		$this->load->library('session');
		if ($this->session->has_userdata('userid'))
		{
			redirect('login/index');
		}
        $this->load->view('templates/main_header');
        $this->load->view('pages/view_contact',$this->data);
        $this->load->view('templates/footer');
	}

	public function send()
	{   
		$this->form_validation->set_rules('fname','First Name', 'required|alpha');
		$this->form_validation->set_rules('lname','Last Name', 'required|alpha');
		$this->form_validation->set_rules('phone','Telephone', 'required|callback_phone_check');
		$this->form_validation->set_rules('msg','Message', 'required');

		$valid = $this->form_validation->run();
		if ($valid == TRUE)
		{
			$this->load->model('Model_contact');
			$this->Model_contact->update_message($this->input->post('fname'),
								  $this->input->post('lname'),
								  $this->input->post('phone'),
								  $this->input->post('msg') );
			$this->data['msg'] = "&#9989"."Thank you for your message";
			$this->index();
		}
		else
		{
			$this->index();
		}
	}
	public function phone_check($phone)
	{
// 	    if (!$phone)
// 	    {
// 	        $this->form_validation->set_message('phone_check','%s is required.');
// 			return FALSE;
// 	    }
// 	    else
// 	    {
    		if (!preg_match("/^[2-9]\d{2}-\d{3}-\d{4}$/", $phone)) 
    		{
    			$this->form_validation->set_message('phone_check','%s should be like this: 246-456-7899');
    			return FALSE;
    		}
    		else
    		{
    			return TRUE;
    		}
	   // }
	}
}


?>