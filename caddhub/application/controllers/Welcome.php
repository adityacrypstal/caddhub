<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	public function index($page='welcome_message')
	{
		if(!file_exists(APPPATH.'views/'.$page.'.php')){
				show_404();
				}
		$this->load->view($page);
	}
}
