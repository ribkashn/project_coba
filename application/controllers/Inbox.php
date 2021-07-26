<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inbox extends CI_Controller {

	function __construct() {
		parent::__construct();

		$this->load->model('inboxmodel');
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
		$this->inbox();
	}

	public function inbox()
	{

		$login=$this->applib->cek_session();
		$NPP=$this->session->userdata('npp');
		$kelompok=$this->session->userdata('kelompok');

		$datapic1=$this->inboxmodel->inboxpic($NPP,$kelompok,'1');
		$datapic2=$this->inboxmodel->inboxpic($NPP,$kelompok,'2');
		$datapic3=$this->inboxmodel->inboxpic($NPP,$kelompok,'3');
		$datapic4=$this->inboxmodel->inboxpic($NPP,$kelompok,'4');

		$jumlah1=$datapic1['jumlah'];
		$jumlah2=$datapic2['jumlah'];
		$jumlah3=$datapic3['jumlah'];
		$jumlah4=$datapic4['jumlah'];

		//print_r('DATA PIC ['.$datapic2.']');

		$data=array(
			'title' => 'Inbox',
			'menu' => 'Inbox',
			'NPP' => $NPP,
			'alert' => false,
			'message1' => '',
			'message2' => '',
			'typealert' => '',
			'datapic1' => $datapic1['datainbox'],
			'jumlah1' => $jumlah1,
			'jenis1' => $datapic1['jenis'],
			'datapic2' => $datapic2['datainbox'],
			'jumlah2' => $jumlah2,
			'jenis2' => $datapic2['jenis'],
			'datapic3' => $datapic3['datainbox'],
			'jumlah3' => $jumlah3,
			'jenis3' => $datapic3['jenis'],
			'datapic4' => $datapic4['datainbox'],
			'jumlah4' => $jumlah4,
			'jenis4' => $datapic4['jenis'],
			'content' => 'inbox/inbox',
			'login' => $login,
		);
		$this->load->view('layout2/template',$data);

	}


}
