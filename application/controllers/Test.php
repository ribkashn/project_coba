<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {


	public function index()
	{
		$data=[
			'title'=> 'Dashboard',
			'content' => 'dashboard/dashboard1'
		];
		$this->load->view('layout/template',$data);
	}
}

