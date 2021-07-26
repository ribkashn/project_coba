<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct() {
		parent::__construct();

		$this->load->model('dashboardmodel');
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
		$this->dashboard1();
	}

	public function dashboard1()
	{
		$tahunperiode=date("Y");
		$login=$this->applib->cek_session();
		$demanddivisi=$this->dashboardmodel->demanddivisi($tahunperiode);
		$demandsektor=$this->dashboardmodel->demandsektor($tahunperiode);
		$demandgrpsektor=$this->dashboardmodel->demandgrpsektor($tahunperiode);
		$listdivisi=$this->dashboardmodel->listparameter('Divisi');
		$listgrpsektor=$this->dashboardmodel->listparametergrp('GroupSektor');

		$data=array(
			'title'=>'Dashboard',
			'menu'=>'Dashboard,Dashboard BNP',
			'demanddivisi' => $demanddivisi,
			'demandsektor' => $demandsektor,
			'demandgrpsektor' => $demandgrpsektor,
			'listdivisi' => $listdivisi,
			'listgrpsektor' => $listgrpsektor,
			'login' => $login,
			'content' => 'dashboard/dashboard1',
		);
		$this->load->view('layout2/template',$data);
	}

	function statusdivisi(){
		if (isset($_GET['divisi'])) $divisi=$_GET['divisi'];
		else $divisi= 'All';

		$tahunperiode=date("Y");
		$datastatusdivisi=$this->dashboardmodel->statusdemand($tahunperiode,"All",$divisi,"All");
		$datastatusdivisi1=$this->dashboardmodel->statusdemand($tahunperiode,"Project",$divisi,"All");
		$datastatusdivisi2=$this->dashboardmodel->statusdemand($tahunperiode,"Procurement",$divisi,"All");
		$listdivisi=$this->dashboardmodel->listparameter('Divisi');

		$data=array(
			'title'=>'Dashboard BNP',
			'menu'=>'Dashboard,Dashboard BNP',
			'datastatusdivisi' => $datastatusdivisi,
			'datastatusdivisi1' => $datastatusdivisi1,
			'datastatusdivisi2' => $datastatusdivisi2,
			'listdivisi' => $listdivisi,
		);
		$this->load->view('dashboard/dashboardstatusdivisi',$data);

	}

	function statusgrpsektor(){
		if (isset($_GET['grpsektor'])) $grpsektor=$_GET['grpsektor'];
		else $grpsektor= 'All';
		if (isset($_GET['projectprocurement'])) $projectprocurement=$_GET['projectprocurement'];
		else $projectprocurement= 'All';

		$tahunperiode=date("Y");
		$datastatusdemand=$this->dashboardmodel->statusdemand($tahunperiode,"All","All",$grpsektor);
		$datastatusdemand1=$this->dashboardmodel->statusdemand($tahunperiode,"Project","All",$grpsektor);
		$datastatusdemand2=$this->dashboardmodel->statusdemand($tahunperiode,"Procurement","All",$grpsektor);
		$listgrpsektor=$this->dashboardmodel->listparametergrp('GroupSektor');

		$data=array(
			'title'=>'Dashboard',
			'menu'=>'Dashboard,Dashboard 1',
			'datastatusdemand' => $datastatusdemand,
			'datastatusdemand1' => $datastatusdemand1,
			'datastatusdemand2' => $datastatusdemand2,
			'listgrpsektor' => $listgrpsektor,
			'projectprocurement' => $projectprocurement,
		);
		$this->load->view('dashboard/dashboardstatus',$data);

	}

	function statusgrpsektornew(){

		$tahunperiode=date("Y");
		$datagrpsektor=$this->dashboardmodel->statusgrpsektor($tahunperiode);

		$data=array(
			'title'=>'Dashboard',
			'menu'=>'Dashboard,Dashboard 1',
			'datagrpsektor' => $datagrpsektor,
		);
		$this->load->view('dashboard/dashboardgrpsektor',$data);

	}


	function statusimplementasi(){
		if (isset($_GET['grpsektor'])) $grpsektor=$_GET['grpsektor'];
		else $grpsektor= 'All';
		if (isset($_GET['projectprocurement'])) $projectprocurement=$_GET['projectprocurement'];
		else $projectprocurement= 'All';

		$tahunperiode=date("Y");
		$dataimplementasi=$this->dashboardmodel->ekspektasiimplementasi($tahunperiode,"All",$grpsektor);
		$dataimplementasi1=$this->dashboardmodel->ekspektasiimplementasi($tahunperiode,"Project",$grpsektor);
		$dataimplementasi2=$this->dashboardmodel->ekspektasiimplementasi($tahunperiode,"Procurement",$grpsektor);
		$listgrpsektor=$this->dashboardmodel->listparametergrp('GroupSektor');

		$data=array(
			'title'=>'Dashboard',
			'menu'=>'Dashboard,Dashboard 1',
			'dataimplementasi' => $dataimplementasi,
			'dataimplementasi1' => $dataimplementasi1,
			'dataimplementasi2' => $dataimplementasi2,
			'listgrpsektor' => $listgrpsektor,
			'projectprocurement' => $projectprocurement,
		);
		$this->load->view('dashboard/dashboardimplementasi',$data);

	}


	function lineofbusiness(){
		if (isset($_GET['grpsektor'])) $grpsektor=$_GET['grpsektor'];
		else $grpsektor= 'All';
		if (isset($_GET['projectprocurement'])) $projectprocurement=$_GET['projectprocurement'];
		else $projectprocurement= 'All';

		$tahunperiode=date("Y");
		$datalineofbusiness=$this->dashboardmodel->lineofbusiness($tahunperiode,"All",$grpsektor);
		$datalineofbusiness1=$this->dashboardmodel->lineofbusiness($tahunperiode,"Project",$grpsektor);
		$datalineofbusiness2=$this->dashboardmodel->lineofbusiness($tahunperiode,"Procurement",$grpsektor);
		$listgrpsektor=$this->dashboardmodel->listparametergrp('GroupSektor');

		$data=array(
			'title'=>'Dashboard',
			'menu'=>'Dashboard,Dashboard 1',
			'datalineofbusiness' => $datalineofbusiness,
			'datalineofbusiness1' => $datalineofbusiness1,
			'datalineofbusiness2' => $datalineofbusiness2,
			'listgrpsektor' => $listgrpsektor,
			'projectprocurement' => $projectprocurement,
		);
		$this->load->view('dashboard/dashboardlineofbusiness',$data);

	}


function jenisdemand(){
		if (isset($_GET['grpsektor'])) $grpsektor=$_GET['grpsektor'];
		else $grpsektor= 'All';
		if (isset($_GET['projectprocurement'])) $projectprocurement=$_GET['projectprocurement'];
		else $projectprocurement= 'All';

		$tahunperiode=date("Y");
		$datajenisdemand=$this->dashboardmodel->jenisdemand($tahunperiode,"All",$grpsektor);
		$datajenisdemand1=$this->dashboardmodel->jenisdemand($tahunperiode,"Project",$grpsektor);
		$datajenisdemand2=$this->dashboardmodel->jenisdemand($tahunperiode,"Procurement",$grpsektor);
		$listgrpsektor=$this->dashboardmodel->listparametergrp('GroupSektor');

		$data=array(
			'title'=>'Dashboard',
			'menu'=>'Dashboard,Dashboard 1',
			'datajenisdemand' => $datajenisdemand,
			'datajenisdemand1' => $datajenisdemand1,
			'datajenisdemand2' => $datajenisdemand2,
			'listgrpsektor' => $listgrpsektor,
			'projectprocurement' => $projectprocurement,
		);
		$this->load->view('dashboard/dashboardjenisdemand',$data);

	}

	function statuseksimplementasi(){
		if (isset($_GET['grpsektor'])) $grpsektor=$_GET['grpsektor'];
		else $grpsektor= 'All';
		if (isset($_GET['projectprocurement'])) $projectprocurement=$_GET['projectprocurement'];
		else $projectprocurement= 'All';

		$tahunperiode=date("Y");
		$statuseksp=$this->dashboardmodel->statuseksp($tahunperiode,"All",$grpsektor);
		$statuseksp1=$this->dashboardmodel->statuseksp($tahunperiode,"Project",$grpsektor);
		$statuseksp2=$this->dashboardmodel->statuseksp($tahunperiode,"Procurement",$grpsektor);
		$listgrpsektor=$this->dashboardmodel->listparametergrp('GroupSektor');

		$data=array(
			'title'=>'Dashboard',
			'menu'=>'Dashboard,Dashboard 1',
			'statuseksp' => $statuseksp,
			'statuseksp1' => $statuseksp1,
			'statuseksp2' => $statuseksp2,
			'listgrpsektor' => $listgrpsektor,
			'projectprocurement' => $projectprocurement,
		);
		$this->load->view('dashboard/dashboardeksimplementasi',$data);

	}

	function detaildashboard(){
		$NPP=$this->session->userdata('npp');
		if (isset($_GET['divisi'])) $divisi=$_GET['divisi'];
		else $divisi= '';
		if (isset($_GET['status'])) $statusproject=$_GET['status'];
		else $statusproject= '';
		if (isset($_GET['sektor'])) $sektor=$_GET['sektor'];
		else $sektor= '';
		if (isset($_GET['implementasi'])) $implementasi=$_GET['implementasi'];
		else $implementasi= '';
		if (isset($_GET['thnimplementasi'])) $thnimplementasi=$_GET['thnimplementasi'];
		else $thnimplementasi= '';
		if (isset($_GET['projectprocurement'])) $projectprocurement=$_GET['projectprocurement'];
		else $projectprocurement= '';
		if (isset($_GET['groupstatus'])) $groupstatus=$_GET['groupstatus'];
		else $groupstatus= '';
		if (isset($_GET['grpsektor'])) $grpsektor=$_GET['grpsektor'];
		else $grpsektor= '';
		if (isset($_GET['lob'])) $lob=$_GET['lob'];
		else $lob= '';
		if (isset($_GET['tipe'])) $tipe=$_GET['tipe'];
		else $tipe= '';

		$judul="Detail Dashboard: [";
		if ($projectprocurement=="") $judul=$judul."All"; else $judul=$judul.$projectprocurement;
		$judul=$judul."][";
		$judul=$judul.$groupstatus;
		$judul=$judul."][";
		if($implementasi=="") $judul=$judul."All"; else $judul=$judul.$implementasi." ".$thnimplementasi;
		$judul=$judul."][";
		if($divisi=="") $judul=$judul."All"; else $judul=$judul.$divisi;
		$judul=$judul."][";
		if($grpsektor=="") $judul=$judul."All"; else $judul=$judul.$grpsektor;
		$judul=$judul."][";
		if($lob=="") $judul=$judul."All"; else $judul=$judul.$lob;
		$judul=$judul."]";
		if($tipe=="") $judul=$judul."All"; else $judul=$judul.$tipe;
		$judul=$judul."]";

   
		$periodedemand=date("Y");
		$datademand=$this->modelapp->demand($periodedemand,'',$divisi,$statusproject,$tipe,$sektor,$implementasi,$thnimplementasi,$projectprocurement,$lob,$groupstatus,$grpsektor);

		$listdivisi=$this->modelapp->listparameter('Divisi');
		$liststatusproject=$this->modelapp->listparameter('StatusProject');
		$liststatusprocurement=$this->modelapp->listparameter('StatusProcurement');
		$listsektor=$this->modelapp->listparameter('Sektor');
		$listlob=$this->modelapp->listparameter('LineofBusiness');
		$data=array(
			'title'=>'Dashboard',
			'menu'=>'Dashboard,Dashboard 1',
			'datademand' => $datademand,
			'listdivisi' => $listdivisi,
			'liststatusproject' => $liststatusproject,
			'liststatusprocurement' => $liststatusprocurement,
			'listsektor' => $listsektor,
			'listlob' => $listlob,
			'NPP' => $NPP,
			'alert' => false,
			'message1' => '',
			'message2' => '',
			'typealert' => '',
			'judul' => $judul,
		);
		$this->load->view('dashboard/dashboarddetail',$data); 
	}

	function dashboardbsa() {

		$datasddbsa=$this->modelapp->datasddbsa();
		$datasddmgrbsa=$this->modelapp->datasddmgrbsa();
		$datasddbulanan=$this->modelapp->datasddbulanan();
		$datasddmingguan=$this->modelapp->datasddmingguan();

		$data=array(
			'title'=>'Dashboard BSA',
			'menu'=>'Dashboard,Dashboard BSA',
			'datasddbsa' => $datasddbsa,
			'datasddmgrbsa' => $datasddmgrbsa,
			'datasddbulanan' => $datasddbulanan,
			'datasddmingguan' =>$datasddmingguan,
			'alert' => false,
			'message1' => '',
			'message2' => '',
			'typealert' => '',
		);
		$this->load->view('dashboard/dashboardbsa',$data); 

	}

	function detaildashboardbsa(){
		$NPP=$this->session->userdata('npp');
		if (isset($_GET['jenis'])) $jenis=$_GET['jenis'];
		else $jenis= '';
		if (isset($_GET['bulan'])) $bulan=$_GET['bulan'];
		else $bulan= '';
		if (isset($_GET['tanggal'])) $tanggal=$_GET['tanggal'];
		else $tanggal= '';
		if (isset($_GET['nama'])) $nama=$_GET['nama'];
		else $nama= '';

		$datasddbsa=$this->modelapp->detaildashboardbsa($jenis,$bulan,$tanggal,$nama);

		$data=array(
			'title'=>'Dashboard BSA',
			'menu'=>'Dashboard,Dashboard BSA',
			'datasddbsa' => $datasddbsa,
			'jenis' => $jenis,
			'bulan' => $bulan,
			'tanggal' => $tanggal,
			'nama' => $nama,
			'alert' => false,
			'message1' => '',
			'message2' => '',
			'typealert' => '',
		);
		$this->load->view('dashboard/dashboardbsadetail',$data); 
	}

function dashboardptm() {

		$periode=$this->modelapp->periodeweek(date("Y-m-d"));

		$data=array(
			'title'=>'Dashboard PTM',
			'menu'=>'Dashboard,Dashboard PTM',
			'tglmulai' => $periode[0]->tgl1,
			'tglakhir' => $periode[0]->tgl2,
			'alert' => false,
			'message1' => '',
			'message2' => '',
			'typealert' => '',
		);
		$this->load->view('dashboard/dashboardptm',$data); 
	}

	function dashboardptm1() {
		$tglmulai=$this->konvtgl($this->input->post('tglmulai'));
		$tglakhir=$this->konvtgl($this->input->post('tglakhir'));
		$crreleasediv=$this->modelapp->CRreleasebyDivisi($tglmulai,$tglakhir);
		$crreleasedev=$this->modelapp->CRreleasebyDevelopmen($tglmulai,$tglakhir);
		$crtglrelease=$this->modelapp->CRtanggalrelease($tglmulai,$tglakhir);
		$crreleasekategori=$this->modelapp->CRreleasekategori($tglmulai,$tglakhir);
		$picptm=$this->modelapp->picptm();

		$data=array(
			'title'=>'Dashboard PTM',
			'menu'=>'Dashboard,Dashboard PTM',
			'tglmulai' => $tglmulai,
			'tglakhir' => $tglakhir,
			'crreleasediv' => $crreleasediv,
			'crreleasedev' => $crreleasedev,
			'crtglrelease' => $crtglrelease,
			'crreleasekategori' => $crreleasekategori,
			'picptm' => $picptm,
			'alert' => false,
			'message1' => '',
			'message2' => '',
			'typealert' => '',
		);
		$this->load->view('dashboard/dashboardptm1',$data); 
	}

	function detaildashboardtracker() {
		if (isset($_GET['jenis'])) $jenis=$_GET['jenis'];
		else $jenis= '';
		if (isset($_GET['divisi'])) $divisi=$_GET['divisi'];
		else $divisi= '';
		if (isset($_GET['maingroup'])) $maingroup=$_GET['maingroup'];
		else $maingroup= '';
		if (isset($_GET['tglmulai'])) $tglmulai=$this->konvtgl($_GET['tglmulai']);
		else $tglmulai= '';
		if (isset($_GET['tglakhir'])) $tglakhir=$this->konvtgl($_GET['tglakhir']);
		else $tglmulai= '';
		if (isset($_GET['rproddate'])) $rproddate=$_GET['rproddate'];
		else $rproddate= ''; 
		if ($rproddate!='All') $rproddate=$this->konvtgl($rproddate);
		if (isset($_GET['projectcategory'])) $projectcategory=$_GET['projectcategory'];
		else $projectcategory= ''; 

		$judul="Detail Dashboard PTM: ";
		if ($jenis==1) {
			$datatracker=$this->modelapp->detaildashboardtracker($jenis,$divisi,$tglmulai,$tglakhir);
			if ($divisi=="") $judul=$judul."[All]"; else $judul=$judul."[".$divisi."]";
			$judul=$judul."[All][All][All]";
		}
		if ($jenis==2) {
			$datatracker=$this->modelapp->detaildashboardtracker($jenis,$maingroup,$tglmulai,$tglakhir);
			$judul=$judul."[All]";
			if ($maingroup=="") $judul=$judul."[All]"; else $judul=$judul."[".$maingroup."]";
			$judul=$judul."[All][All]";
		}		
		if ($jenis==3) {
			$datatracker=$this->modelapp->detaildashboardtracker($jenis,$rproddate,$tglmulai,$tglakhir);
			$judul=$judul."[All][All]";
			if ($rproddate=="") $judul=$judul."[All]"; else $judul=$judul."[".$rproddate."]";
			$judul=$judul."[All]";
		}
		if ($jenis==4) {
			$datatracker=$this->modelapp->detaildashboardtracker($jenis,$projectcategory,$tglmulai,$tglakhir);
			$judul=$judul."[All][All][All]";
			if ($projectcategory=="") $judul=$judul."[All]"; else $judul=$judul."[".$projectcategory."]";
		}
		$judul=$judul."[".$tglmulai."][".$tglakhir."]";

		$data=array(
			'title'=>'Dashboard PTM',
			'menu'=>'Dashboard,Dashboard PTM',
			'tglmulai' => $tglmulai,
			'tglakhir' => $tglakhir,
			'datatracker' => $datatracker,
			'judul' => $judul,
			'alert' => false,
			'message1' => '',
			'message2' => '',
			'typealert' => '',
		);
		$this->load->view('dashboard/dashboardtrackerdet',$data); 
	}

}
