<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	function __construct() {
		parent::__construct();

		$this->load->model('profilemodel');
		$this->load->helper(array('url','text','form'));
		$this->load->library('applib');
		//$this->output->enable_profiler(TRUE);
	}

	public function gantipass()
	{
		$login=$this->applib->cek_session();
		$error=$this->applib->kewenangan_menu();

		if ($error == 0){
			$data=array(
				'title'=>'Ganti Password',
				'menu'=>'Admin,Ganti Password',
				'alert' => false,
				'content' => 'admin/gantipwd',
				'login' =>$login,
				);
			$this->load->view('layout2/template',$data);
		}
	}


	public function gantipass1()
	{
		$this->applib->cek_session();
		$npp=$this->input->post('NPP');
		$pwslama=$this->input->post('passwd');
		$pwsbaru=$this->input->post('passwd1');

		$result = $this->profilemodel->validate_login($npp,$pwslama);
		$jml=count($result);
		if ($jml > 0) {
			$errormsg ='Password berhasil diganti';
			$type='success';
			$result = $this->profilemodel->gantipwd($npp,$pwsbaru);
			if ($result <= 0) {
				$errormsg ='Password GAGAL diganti';
				$type='error';

			}
		} else {
			$errormsg ='Password lama salah';
			$type='error';
		}

		$data=array(
			'title'=>'Ganti Password',
			'menu'=>'Admin,Ganti Password',
			'alert' => true,
			'message1' => $errormsg,
			'message2' => '',
			'typealert' => $type,
			'npp' => $npp,
			'content' => 'admin/gantipwd',
			);
		$this->load->view('layout2/template',$data);
	}
}
