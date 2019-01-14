<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services_out_controller extends CI_Controller {

	public function index()
	{
		$this->load->view('services_out');
	}
	
}
