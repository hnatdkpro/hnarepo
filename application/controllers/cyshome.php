<<?php 

/**
 * 
 */
class cyshome extends CI_Controller
{
	public function index()
	{
		$this->load->view("cyshome");
	}
		public function    construct()
		{
			parent::   Construct();
			$this->load->helper('url');
		}

} 
 ?>