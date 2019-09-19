<?php 
 class Bfu extends CI_Controller{
 	private $data;
	public function __construct()
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
		$this->load->model('model_bfu');
		$this->data['products'] = $this->model_bfu->load_products();
        $this->load->view('templates/main_header');
        $this->load->view('pages/view_bfu',$this->data);
        $this->load->view('templates/footer');
	}
	public function addtocart()
	{
		$this->data['msg'] = "";
		$this->form_validation->set_rules('qty', 'Quantity', 'required|is_natural_no_zero');
		$valid = $this->form_validation->run();
		if ($valid == TRUE) 
		{

			$qty =   $this->input->post('qty');
			$pid = $this->input->post('pid');		
			$this->load->model('model_bfu');		
			$query = $this->model_bfu->load_product_by_id($pid);
			foreach ($query->result() as $field) {
			 	$name = $field->prod_name;
			 	$img = $field->image_url;
			 	$price = $field->cost;
			 } 

			$this->load->library('cart');
			$cart_item = array( 'id' => $pid,
								'qty' => $qty,
								'price' => $price,
								'name' => $name,
								'options' => array( 'img' => base_url()."assets/".$img )
							);
			$this->cart->insert($cart_item);
			$this->data['msg'] = "&#9989"."Item sucessfully added to cart";
			$this->index();
		}
		else
		{
			$this->index();
		}
	}

	public function viewcart()
	{
		$this->load->library('cart');
		if ($this->cart->contents()) {
			$this->data['kart'] = $this->cart->contents();
	        $this->load->view('templates/main_header');
        	$this->load->view('pages/view_checkout',$this->data);
        	$this->load->view('templates/footer');
		}
		else
		{
			$this->data['msg'] = "&#10060"."Cart is Empty";
			$this->index();
		}
	}

	public function checkout()
	{
		$this->form_validation->set_rules('email', 'Email Id', 'required|valid_email');
		$this->form_validation->set_rules('fname', 'First Name', 'required|alpha');
		$this->form_validation->set_rules('lname', 'Last Name', 'required|alpha');
		$this->form_validation->set_rules('addr', 'Address', 'required');
		$this->form_validation->set_rules('apt', 'Apartment', 'required');
		$this->form_validation->set_rules('city', 'City', 'required|alpha');
		$this->form_validation->set_rules('lang', 'Language');
		$this->form_validation->set_rules('postal', 'Zip Code', 'required|is_natural|min_length[5]');

		$valid = $this->form_validation->run();
		if ($valid == TRUE) 
		{

			$header = array( 'sfname' => $this->input->post('fname'),
							 'slname' => $this->input->post('lname'),
							 'addr' => $this->input->post('addr'),
							 'emailid' => $this->input->post('email'),
							 'apt_no' => $this->input->post('apt'),
							 'city' => $this->input->post('city'),
							 'lang' => $this->input->post('lang'),
							 'zip' => $this->input->post('postal'),
							 'timstamp' => $date = date('Y/m/d H:i:s'));

			$this->load->model('model_bfu');
			$this->model_bfu->update_sales($header);
			$this->data['msg'] = "&#9989"."Order Placed Sucessfully";
			$this->index();
		}
		else
		{
			$this->viewcart();
		}
	}

	public function clear()
	{
		$this->load->library('cart');
		$this->cart->destroy();
		$this->index();	
	}
}

?>