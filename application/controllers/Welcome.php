<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function index()
	{
		$data=[
			'title'=> 'Input AIP',
			'content' => 'Input/aip'
		];
		$this->load->view('layout2/template',$data);
	}
}
