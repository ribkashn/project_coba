<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
		parent::__construct();

		$this->load->model('homemodel');
		$this->load->helper(array('url','text','form'));
		$this->load->library('applib');
		//$this->output->enable_profiler(TRUE);
	}

	function konvtgl($tanggal) {
		$tgl=substr($tanggal, 6,4) . '-' . substr($tanggal, 3,2) . '-' . substr($tanggal, 0,2);
		return $tgl;
	}
	
	public function index()
	{
		$this->home();
	}

	public function home()
	{
			$login=$this->applib->cek_session();
			$data=array(
				'alert' => false,
				'login' => $login,
				'title' => 'Home',
				'menu' => 'Home',
				'content' => 'home/home',
			);
			$this->load->view('layout2/template',$data);
		
	}


}
