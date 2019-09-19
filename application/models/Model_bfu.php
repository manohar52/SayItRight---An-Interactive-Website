<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_bfu extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function load_products()
	{
		$query = $this->db->get('products');
		return $query;
	}

	public function load_product_by_id($pid)
	{
		$query = $this->db->get_where('products',array('prod_id' => $pid));
		return $query;	
	}

	public function update_sales($header)
	{
		$this->db->insert('sales_header',$header);
		$tid = $this->db->insert_id();

		$this->load->library('cart');
		if ($this->cart->contents()) 
		{
			$sales_item = array();
			$cnt = 0;
			foreach ($this->cart->contents() as $item) 
			{	
				$sales_item[$cnt] = array( 'tid' => $tid,
										   'prod_id' => $item['id'],
										   'quantity' => $item['qty']);
				$cnt = $cnt + 1;						
			}
			$this->db->insert_batch('sales_item', $sales_item);
			$this->cart->destroy();
		}	
	}
}
?>