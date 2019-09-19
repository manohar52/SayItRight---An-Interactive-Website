<?php

class Settings extends CI_Controller {

        private $data;
        public function __construct()
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
                $userid = $this->session->userdata('userid');
                $data['error'] = $this->data['error'];
                $this->data['error'] = '';
                $data['user_info'] = $this->load_user_profile($userid); 
                
                $data['role'] = $this->session->userdata('role');
                switch ($this->session->userdata('role')) 
                {
                        case 1:
                                $this->load->view('templates/ind_header', $data);  
                                break;
                        case 2:
                                $this->load->view('templates/event_header', $data);
                                break;
                        case 3:
                                $this->load->view('templates/conf_header', $data);
                                break;
                }

                $this->load->view('pages/view_settings', $data);
                $this->load->view('templates/footer');
        }

        public function do_upload()
        {      
                $this->load->library('session');
                if ($this->session->has_userdata('userid')) 
                {
                        $userid = $this->session->userdata('userid');

                        $config['upload_path']          = './assets/images/';
                        $config['allowed_types']        = 'gif|jpg|png';
                        $config['max_size']             = 500000;
                        // $config['max_width']            = 1024;
                        // $config['max_height']           = 768;

                        $target_dir = "./assets/images/";
                
                        $curr_name = basename($_FILES["fileToUpload"]["name"]);
                        $ext = strtolower(pathinfo($curr_name,PATHINFO_EXTENSION));
                        $filename = "user_".$userid.".".$ext;
                        $fullimgpath = $target_dir.$filename;
                        $config['file_name'] = $filename;


                        $this->load->library('upload', $config);

                        if (file_exists($fullimgpath))
                        {
                                unlink($fullimgpath);
                        }

                        if ( ! $this->upload->do_upload('fileToUpload'))
                        {
                                $this->data['error'] = $this->upload->display_errors();
                        }
                        else
                        {
                                $this->load->model('model_settings');
                                $this->model_settings->update_user_img($userid,$filename);
                        }
                        $this->index();
                }
        }

        public function load_user_profile($userid)
        {
                $this->load->model('model_settings');
                $user_info = $this->model_settings->get_user_data($userid);
                return $user_info;
        }

        public function update_user_data()
        {
                $this->load->library('session');
                if ($this->session->has_userdata('userid')) 
                {
                        switch ($this->session->userdata('role')) 
                        {
                                case 1:
                                        $user_data = array('fname' => $this->input->post('fname'),
                                                           'lname' => $this->input->post('lname'),
                                                           'work_loc' => $this->input->post('email'),
                                                           'school' => $this->input->post('school'),
                                                           'password' => $this->input->post('password'));

                                        $this->form_validation->set_rules('fname','First Name','required|alpha');
                                        $this->form_validation->set_rules('lname','Last Name','required|alpha');
                                        $this->form_validation->set_rules('work','Work Location','required');
                                        $this->form_validation->set_rules('school','School','required');                 
                                        break;
                                case 2:
                                        $user_data = array('fname' => $this->input->post('fname'),
                                                           'lname' => $this->input->post('lname'),
                                                           'password' => $this->input->post('password'));
                                        
                                        $this->form_validation->set_rules('fname','First Name','required|alpha');
                                        $this->form_validation->set_rules('lname','Last Name','required|alpha');
                                        break;
                                case 3:
                                        $user_data = array('fname' => $this->input->post('fname'),
                                                            'password' => $this->input->post('password'));
                                        
                                        $this->form_validation->set_rules('fname','First Name','required|alpha');
                                        break;
                        }

                        $this->form_validation->set_rules('password','Password','required|callback_password_check');

                        if(!($this->form_validation->run()))
                        {
                                $this->index();
                        }
                        else
                        {
                                $userid = $this->session->userdata('userid');
                                $this->load->model('model_settings');
                                $user_info = $this->model_settings->update_user_data($userid,$user_data);        
                                $this->index();
                        }
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