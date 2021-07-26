<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {
		parent::__construct();

		$this->load->model('adminmodel');
		$this->load->helper(array('url','text','form'));
		$this->load->library('applib');
		//$this->output->enable_profiler(TRUE);
	}

	public function index()
	{
		$this->applib->cek_session();
		$error=$this->applib->kewenangan_menu();

		if ($error == 0){
			$data=array(
				'title'=>'Reset Password',
				'menu'=>'Admin,Reset Password',
				'alert' => false,
				);
			$this->load->view('admin/resetpwd',$data);
		}
	}

	public function ganti()
	{
		$this->applib->cek_session();

		$npp=$this->input->post('NPP');
		$pwd=$this->input->post('passwd');

		$result = $this->modeladmin->getuserbynpp($npp);
		if ($result > 0) {
			$errormsg ='Password berhasil diganti';
			$type='success';
			$result = $this->modeladmin->gantipwd($npp,$pwd);
			if ($result <= 0) {
				$errormsg ='Password GAGAL diganti';
				$type='error';

			}
		} else {
			$errormsg ='User tidak ditemukan';
			$type='error';
		}

		$data=array(
			'title'=>'Reset Password',
			'menu'=>'Admin,Reset Password',
			'alert' => true,
			'message1' => $errormsg,
			'message2' => '',
			'typealert' => $type,
			'npp' => $npp,
			);
		$this->load->view('admin/resetpwd',$data);
		
	}

	function parameter() {
		$login=$this->applib->cek_session();
		$error=$this->applib->kewenangan_menu();
		if ($error == 0){
			$npp=$this->session->userdata('npp');
			$listkategori=$this->modeladmin->listkategori();
			$data=array(
				'title'=>'Parameter',
				'menu'=>'Admin,Parameter',
				'npp' => $npp,
				'listkategori' => $listkategori,
				'kategori' => '',
				'dataparameter' => NULL,
				'login' => $login,
				'content' => 'admin/parameter',
				);
			$this->load->view('layout2/template',$data);
		}
	}

	function parameter_1() {
		$npp=$this->session->userdata('npp');
		$admin=$this->session->userdata('admin');
		if (isset($_GET['kategori'])) $kategori=$_GET['kategori'];
		else $kategori= '';
		$dataparameter=$this->modeladmin->listparameter("$kategori");
		$data=array(
			'title'=>'Parameter',
			'menu'=>'Admin,Parameter',
			'dataparameter' => $dataparameter,
			'npp' => $npp,
			'admin' => $admin,
			);
		$this->load->view('admin/parameterresult',$data);
	}

}
