<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Dhtmlx\Connector\GanttConnector;

class Project extends CI_Controller {

	function __construct() {
		parent::__construct();

		$this->load->model('projectmodel');
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
		$this->demand();
	}

	public function demand()
	{
		$login=$this->applib->cek_session();
		$NPP=$this->session->userdata('npp');
		if (isset($_GET['id'])) $id=$_GET['id'];
		else $id= '';
		if (isset($_GET['periodedemand'])) $periodedemand=$_GET['periodedemand'];
		else $periodedemand=date("Y");
		if ($periodedemand=='') $periodedemand=date("Y");
		if (isset($_GET['demand'])) $demand=$_GET['demand'];
		else $demand= '';
		if (isset($_GET['divisi'])) $divisi=$_GET['divisi'];
		else $divisi= '';
		if (isset($_GET['statusproject'])) $statusproject=$_GET['statusproject'];
		else $statusproject= '';
		if (isset($_GET['tipedemand'])) $tipedemand=$_GET['tipedemand'];
		else $tipedemand= '';
		if (isset($_GET['sektor'])) $sektor=$_GET['sektor'];
		else $sektor= '';
		if (isset($_GET['implementasi'])) $implementasi=$_GET['implementasi'];
		else $implementasi= '';
		if (isset($_GET['thnimplementasi'])) $thnimplementasi=$_GET['thnimplementasi'];
		else $thnimplementasi= '';
		if (isset($_GET['projectprocurement'])) $projectprocurement=$_GET['projectprocurement'];
		else $projectprocurement= '';
		if (isset($_GET['lineofbusiness'])) $lineofbusiness=$_GET['lineofbusiness'];
		else $lineofbusiness= '';
		if (isset($_GET['cari'])) $cari=$_GET['cari'];
		else $cari= '';

		// $datademand=$this->projectmodel->demand($periodedemand,$demand,$divisi,$statusproject,$tipedemand,$sektor,$implementasi,$thnimplementasi,$projectprocurement,$lineofbusiness);
		$datademand='';

		$listdivisi=$this->projectmodel->listparameter('Divisi');
		$liststatusproject=$this->projectmodel->listparameter('StatusProject');
		$liststatusprocurement=$this->projectmodel->listparameter('StatusProcurement');
		$listsektor=$this->projectmodel->listparameter('Sektor');
		$listlob=$this->projectmodel->listparameter('LineofBusiness');

		// $datademand='';
		// $listdivisi='';
		// $liststatusproject='';
		// $liststatusprocurement='';
		// $listsektor='';
		// $listlob='';

	
		$data=array(
			'title' => 'Demand',
			'menu' => 'Project,Demand',
			'datademand' => $datademand,
			'cari' => '',
			'tahun' => $periodedemand,
			'demand' => $demand,
			'divisi' => $divisi,
			'projectprocurement' => $projectprocurement,
			'statusproject' => $statusproject,
			'tipedemand' => $tipedemand,
			'sektor' => $sektor,
			'implementasi' => $implementasi,
			'thnimplementasi' => $thnimplementasi,
			'lineofbusiness' => $lineofbusiness,
			'listdivisi'=> $listdivisi,
			'liststatusproject'=> $liststatusproject,
			'liststatusprocurement' => $liststatusprocurement,
			'listsektor'=> $listsektor,
			'id' => $id,
			'projectprocurement' => $projectprocurement,
			'listlob' => $listlob,
			'NPP' => $NPP,
			'alert' => false,
			'message1' => '',
			'message2' => '',
			'typealert' => '',
			'cari' => $cari,
			'content' => 'project/demand',
			'login' => $login,
		);
		$this->load->view('layout2/template',$data);
	}

	function demanddetail() {
		$login=$this->applib->cek_session();
		if (isset($_GET['id'])) $id=$_GET['id'];
		else $id= '';
		if (isset($_GET['aksi'])) $aksi=$_GET['aksi'];
		else $aksi= '';
		if (isset($_GET['demandid'])) $demandid=$_GET['demandid'];
		else $demandid= '';
		if (isset($_GET['dari'])) $dari=$_GET['dari'];
		else $dari= '';
		$NPP=$this->session->userdata('npp');
		$listdivisi=$this->projectmodel->listparameter('Divisi');
		$listlob=$this->projectmodel->listparameter('LineofBusiness');
		$liststatusproject=$this->projectmodel->listparameter('StatusProject');
		$liststatusprocurement=$this->projectmodel->listparameter('StatusProcurement');
		$listgrouping=$this->projectmodel->listparameter('Grouping');
		$listgroupingcluster=$this->projectmodel->listparameter('GroupingCluster');
		$listcorpplan=$this->projectmodel->listparameter('CorporatePlan');
		$listtipeproject=$this->projectmodel->listparameter('ProjectCategory');
		$listpengembangojk=$this->projectmodel->listparameter('KetegoriPengambanganOJK');
		$listjenispengembang=$this->projectmodel->listparameter('JenisPengembangan');
		$listpengembang=$this->projectmodel->listparameter('Pengembang');
		$listlokasidc=$this->projectmodel->listparameter('LokasiDC');
		$listlokasidrc=$this->projectmodel->listparameter('LokasiDC');
		$listuicsupportit=$this->projectmodel->listparameter('UICSupportIT');
		$listtipeproject=$this->projectmodel->listparameter('tipeproject');
		$listaplikasi=$this->projectmodel->listparameter('Aplikasi');
		$listjenisdok=$this->projectmodel->listparameter('JenisDokumen');
		$listkategoripengadaan=$this->projectmodel->listparameter('KategoriPengadaan');
		$listtitlenote=$this->projectmodel->listparameter('TitleNote');
		$listmgrbnp=$this->projectmodel->listmgr('BNP');
		$listamgrbnp=$this->projectmodel->listamgr('BNP');
		$listmgrbsa=$this->projectmodel->listmgr('BSA');
		$listamgrbsa=$this->projectmodel->listamgr('BSA');
		$listmgrptm=$this->projectmodel->listmgr('PTM');
		$listamgrptm=$this->projectmodel->listamgr('PTM');
		$listsdd=$this->projectmodel->listdokumenall('SDD');
		$listproject=$this->projectmodel->listparameter('Project');
		$listprogram=$this->projectmodel->listparameter('Program');

		if ($aksi=='View' or $aksi=='Edit') {
			$detaildemand=$this->projectmodel->detaildemand($demandid);
			$datatracker=$this->projectmodel->datatracker($demandid);
			$listdokumen=$this->projectmodel->listdokumen($demandid);
			$listnote=$this->projectmodel->listnote($demandid);
			$listhistori=$this->projectmodel->listhistori($demandid);
			$listmembermgrbnp=$this->projectmodel->listmember($demandid,'BNP','MGR');
			$listmemberamgrbnp=$this->projectmodel->listmember($demandid,'BNP','AMGR');
			$listmembermgrbsa=$this->projectmodel->listmember($demandid,'BSA','MGR');
			$listmemberamgrbsa=$this->projectmodel->listmember($demandid,'BSA','AMGR');
			$listmembermgrptm=$this->projectmodel->listmember($demandid,'PTM','MGR');
			$listmemberamgrptm=$this->projectmodel->listmember($demandid,'PTM','AMGR');			
		} else {
			$detaildemand='';
			$datatracker='';
			$listdokumen='';
			$listnote='';
			$listhistori='';
			$listmembermgrbnp='';
			$listmemberamgrbnp='';
			$listmembermgrbsa='';
			$listmemberamgrbsa='';
			$listmembermgrptm='';
			$listmemberamgrptm='';
		}


		if ($aksi=='View' or $aksi=='Edit') {
			$listmembermgrbnp=$this->projectmodel->listmember($demandid,'BNP','MGR');
			$listmemberamgrbnp=$this->projectmodel->listmember($demandid,'BNP','AMGR');
			$listmembermgrbsa=$this->projectmodel->listmember($demandid,'BSA','MGR');
			$listmemberamgrbsa=$this->projectmodel->listmember($demandid,'BSA','AMGR');
			$listmembermgrptm=$this->projectmodel->listmember($demandid,'PTM','MGR');
			$listmemberamgrptm=$this->projectmodel->listmember($demandid,'PTM','AMGR');
		} else {
			$listmembermgrbnp='';
			$listmemberamgrbnp='';
			$listmembermgrbsa='';
			$listmemberamgrbsa='';
			$listmembermgrptm='';
			$listmemberamgrptm='';
		}


		$data=array(
			'title' => 'Demand',
			'menu' => 'Project,Demand',
			'id' => $id,
			'aksi' => $aksi,
			'listdivisi' => $listdivisi,
			'listlob' => $listlob,
			'liststatusproject' => $liststatusproject,
			'liststatusprocurement' => $liststatusprocurement,
			'listgrouping' => $listgrouping,
			'listgroupingcluster' => $listgroupingcluster,
			'listcorpplan' => $listcorpplan,
			'listtipeproject' => $listtipeproject,
			'listpengembangojk'=> $listpengembangojk,
			'listjenispengembang' => $listjenispengembang,
			'listpengembang' => $listpengembang,
			'listlokasidc' => $listlokasidc,
			'listlokasidrc' =>$listlokasidrc,
			'listuicsupportit' => $listuicsupportit,
			'detaildemand' => $detaildemand,
			'datatracker' => $datatracker,
			'listdokumen' => $listdokumen,
			'listnote' => $listnote,
			'listhistori' => $listhistori,
			'listaplikasi' => $listaplikasi,
			'listkategoripengadaan' => $listkategoripengadaan,
			'listtitlenote' => $listtitlenote,
			'demandid' => $demandid,
			'listmgrbnp' => $listmgrbnp,
			'listamgrbnp' => $listamgrbnp,
			'listmgrbsa' => $listmgrbsa,
			'listamgrbsa' => $listamgrbsa,
			'listmgrptm' => $listmgrptm,
			'listamgrptm' => $listamgrptm,
			'listmembermgrbnp' => $listmembermgrbnp,
			'listmemberamgrbnp' => $listmemberamgrbnp,
			'listmembermgrbsa' => $listmembermgrbsa,
			'listmemberamgrbsa' => $listmemberamgrbsa,
			'listmembermgrptm' => $listmembermgrptm,
			'listmemberamgrptm' => $listmemberamgrptm,
			'npp' => $NPP,
			'listjenisdok' => $listjenisdok,
			'listsdd' => $listsdd,
			'dari' => $dari,
			'listproject' => $listproject,
			'listprogram' => $listprogram,
			'content' => 'project/demanddetail',
			'login' => $login,
		);
		$this->load->view('layout2/template',$data);
		
	}

function trackerdetail() {
		$cek=$this->applib->cek_session();if ($cek==1) return;
		if (isset($_GET['id'])) $id=$_GET['id'];
		else $id= '';
		if (isset($_GET['nomorcr'])) $nomorcr=$_GET['nomorcr'];
		else $nomorcr= '';
		$aksi='View';
		$NPP=$this->session->userdata('npp');
		$detailtracker=$this->projectmodel->detailtracker($nomorcr);
 
		$data=array(
			'title' => 'PVCS Tracker',
			'menu' => 'Project,PVCS Tracker',
			'id' => $id,
			'aksi' => $aksi,
			'tracker' =>$detailtracker,
			'nomorcr'=> $nomorcr,
		);
		$this->load->view('project/trackerdetail',$data);
		
	}

	function getdetaildemand() {
		$demandid=$this->input->post('demandid');
		$detaildemand=$this->projectmodel->detaildemand($demandid);
		$datatracker=$this->projectmodel->datatracker($demandid);
		$listmembermgrbnp=$this->projectmodel->listmember($demandid,'BNP','MGR');
		$listmemberamgrbnp=$this->projectmodel->listmember($demandid,'BNP','AMGR');
		$listmembermgrbsa=$this->projectmodel->listmember($demandid,'BSA','MGR');
		$listmemberamgrbsa=$this->projectmodel->listmember($demandid,'BSA','AMGR');
		$listmembermgrptm=$this->projectmodel->listmember($demandid,'PTM','MGR');
		$listmemberamgrptm=$this->projectmodel->listmember($demandid,'PTM','AMGR');
		$listdokumen=$this->projectmodel->listdokumen($demandid);
		$listnote=$this->projectmodel->listnote($demandid);
		$listhistori=$this->projectmodel->listhistori($demandid);
		$data=array(
			'detaildemand' => $detaildemand,
			'datatracker' => $datatracker,
			'listmembermgrbnp' => $listmembermgrbnp,
			'listmemberamgrbnp' => $listmemberamgrbnp,
			'listmembermgrbsa' => $listmembermgrbsa,
			'listmemberamgrbsa' => $listmemberamgrbsa,
			'listmembermgrptm' => $listmembermgrptm,
			'listmemberamgrptm' => $listmemberamgrptm,
			'listdokumen' => $listdokumen,
			'listnote' => $listnote,
			'listhistori' => $listhistori,
		);
		echo json_encode($data); 
	}

	function getlistdemand(){
		$NPP=$this->session->userdata('npp');
		$periodedemand=$this->input->post('periodedemand');
		$demand=$this->input->post('demand');
		$divisi=$this->input->post('divisi');
		$statusproject=$this->input->post('statusproject');
		$tipedemand=$this->input->post('tipedemand');
		$sektor=$this->input->post('sektor');
		$implementasi=$this->input->post('implementasi');
		$thnimplementasi=$this->input->post('thnimplementasi');
		$projectprocurement=$this->input->post('projectprocurement');
		$lineofbusiness=$this->input->post('lineofbusiness');
		$cari=$this->input->post('cari');

		$this->session->set_userdata('periodedemand', $periodedemand);
		$this->session->set_userdata('demand', $demand);
		$this->session->set_userdata('divisi', $divisi);
		$this->session->set_userdata('statusproject', $statusproject);
		$this->session->set_userdata('tipedemand', $tipedemand);
		$this->session->set_userdata('sektor', $sektor);
		$this->session->set_userdata('implementasi', $implementasi);
		$this->session->set_userdata('thnimplementasi', $thnimplementasi);
		$this->session->set_userdata('projectprocurement', $projectprocurement);
		$this->session->set_userdata('lineofbusiness', $lineofbusiness);

		$strquery=$this->projectmodel->demandsebagian($periodedemand,$demand,$divisi,$statusproject,$tipedemand,$sektor,$implementasi,$thnimplementasi,$projectprocurement,$lineofbusiness,'All');

		$this->session->set_userdata('strquery', $strquery);

		$listdivisi=$this->projectmodel->listparameter('Divisi');
		$liststatusproject=$this->projectmodel->listparameter('StatusProject');
		$liststatusprocurement=$this->projectmodel->listparameter('StatusProcurement');
		$listsektor=$this->projectmodel->listparameter('Sektor');
		$listlob=$this->projectmodel->listparameter('LineofBusiness');
		$data=array(
			//'datademand' => $datademand,
			'listdivisi' => $listdivisi,
			'liststatusproject' => $liststatusproject,
			'liststatusprocurement' => $liststatusprocurement,
			'listsektor' => $listsektor,
			'listlob' => $listlob,
			'NPP' => $NPP,
			'cari' => $cari,
		);
		$this->load->view('project/demandresult',$data); 
	}

	function gettimmember() {
		$this->applib->cek_session();
		$id=$this->input->post('id');
		$aksi=$this->input->post('aksi');
		$demandid=$this->input->post('demandid');
		
		$listmgrbnp=$this->projectmodel->listmgr('BNP');
		$listamgrbnp=$this->projectmodel->listamgr('BNP');
		$listmgrbsa=$this->projectmodel->listmgr('BSA');
		$listamgrbsa=$this->projectmodel->listamgr('BSA');
		$listmgrptm=$this->projectmodel->listmgr('PTM');
		$listamgrptm=$this->projectmodel->listamgr('PTM');

		$listmembermgrbnp=$this->projectmodel->listmember($demandid,'BNP','MGR');
		$listmemberamgrbnp=$this->projectmodel->listmember($demandid,'BNP','AMGR');
		$listmembermgrbsa=$this->projectmodel->listmember($demandid,'BSA','MGR');
		$listmemberamgrbsa=$this->projectmodel->listmember($demandid,'BSA','AMGR');
		$listmembermgrptm=$this->projectmodel->listmember($demandid,'PTM','MGR');
		$listmemberamgrptm=$this->projectmodel->listmember($demandid,'PTM','AMGR');

		if ($aksi=='Tambah') $aksi='Edit';


		$data=array(
			'title' => 'Demand',
			'menu' => 'Project,Demand',
			'id' => $id,
			'aksi' => $aksi,
			'demandid' => $demandid,
			'listmgrbnp' => $listmgrbnp,
			'listamgrbnp' => $listamgrbnp,
			'listmgrbsa' => $listmgrbsa,
			'listamgrbsa' => $listamgrbsa,
			'listmgrptm' => $listmgrptm,
			'listamgrptm' => $listamgrptm,
			'listmembermgrbnp' => $listmembermgrbnp,
			'listmemberamgrbnp' => $listmemberamgrbnp,
			'listmembermgrbsa' => $listmembermgrbsa,
			'listmemberamgrbsa' => $listmemberamgrbsa,
			'listmembermgrptm' => $listmembermgrptm,
			'listmemberamgrptm' => $listmemberamgrptm,
		);
		$this->load->view('project/timmember',$data);
	}

	function getterdampak() {
		$this->applib->cek_session();
		$id=$this->input->post('id');
		$aksi=$this->input->post('aksi');
		$demandid=$this->input->post('demandid');

		$detaildemand=$this->projectmodel->detaildemand($demandid);
		$listaplikasi=$this->projectmodel->listparameter('Aplikasi');

		if ($aksi=='Tambah') $aksi='Edit';

		$data=array(
			'title' => 'Demand',
			'menu' => 'Project,Demand',
			'id' => $id,
			'aksi' => $aksi,
			'demandid' => $demandid,
			'detaildemand' => $detaildemand,
			'listaplikasi' => $listaplikasi,
		);
		$this->load->view('project/terdampak',$data);
	}

function tulislog($message) {
	$log_filename = "log";
    if (!file_exists($log_filename)) 
    {
        // create directory/folder uploads.
        mkdir($log_filename, 0777, true);
    }
    $log_file_data = $log_filename.'/log_' . date('Y-M-d') . '.log';

	if (is_null($this->session->userdata('nama'))) $nama=""; else $nama=$this->session->userdata('nama');
	if (is_null($this->session->userdata('npp'))) $npp=""; else $npp=$this->session->userdata('npp');
	$log=date("Y-m-d H:i:s")."-".$nama."(".$npp.")-".$_SERVER['REMOTE_ADDR']." ".$message."\n";
	file_put_contents($log_file_data, $log, FILE_APPEND);
}

	function tambahdemand() {
		$cek=$this->applib->cek_session();if ($cek==1) return;
		$NPP=$this->session->userdata('npp'); if ($NPP=='') return;

		// var_dump($_POST);
		if ($this->input->post('dari')<>'') $dari=$this->input->post('dari'); else $dari= '';
		if ($this->input->post('jenisdemand')<>'') $jenisdemand=$this->input->post('jenisdemand'); else $jenisdemand= '';
		if ($this->input->post('demandid')<>'') $demandid=$this->input->post('demandid'); else $demandid= '';
		if ($this->input->post('tipedemand')<>'') $tipedemand=$this->input->post('tipedemand'); else $tipedemand= '';
		if ($this->input->post('tahundemand')<>'') $tahundemand=$this->input->post('tahundemand'); else $tahundemand= 0;
		if ($this->input->post('periodedemand')<>'') $periodedemand=$this->input->post('periodedemand'); else $periodedemand= 0;
		if ($this->input->post('namademand')<>'') $namademand=$this->input->post('namademand'); else $namademand= '';
		$namademand=str_replace("'", "\'", $namademand);
		if ($this->input->post('divisi')<>'') $divisi=$this->input->post('divisi'); else $divisi= '';
		if ($this->input->post('lob')<>'') $lob=$this->input->post('lob'); else $lob= '';
		if ($this->input->post('projectprocurement')<>'') $projectprocurement=$this->input->post('projectprocurement'); else $projectprocurement= '';
		if ($this->input->post('statusproject')<>'') $statusproject=$this->input->post('statusproject'); else $statusproject= '';
		if ($this->input->post('grouping')<>'') $grouping=$this->input->post('grouping'); else $grouping= '';
		if ($this->input->post('groupingcluster')<>'') $groupingcluster=$this->input->post('groupingcluster'); else $groupingcluster= '';
		if ($this->input->post('tipeproject')<>'') $tipeproject=$this->input->post('tipeproject'); else $tipeproject= '';
		if ($this->input->post('corpplan')<>'') $corpplan=$this->input->post('corpplan'); else $corpplan= '';
		if ($this->input->post('narative')<>'') $narative=$this->input->post('narative'); else $narative= '';
		$narative=str_replace("'", "\'", $narative);
		if ($this->input->post('eksimplementasi')<>'') $eksimplementasi=$this->input->post('eksimplementasi'); else $eksimplementasi= '';
		if ($this->input->post('jenisekspektasi')<>'') $jenisekspektasi=$this->input->post('jenisekspektasi'); else $jenisekspektasi= '';
		if ($this->input->post('mingguke')<>'') $mingguke=$this->input->post('mingguke'); else $mingguke= 0;
		if ($this->input->post('bulan')<>'') $bulan=$this->input->post('bulan'); else $bulan= 0;
		if ($this->input->post('kuartal')<>'') $kuartal=$this->input->post('kuartal'); else $kuartal= 0;
		if ($this->input->post('tahun')<>'') $tahun=$this->input->post('tahun'); else $tahun= 0;
		if ($this->input->post('mandays')<>'') $mandays=$this->input->post('mandays'); else $mandays= 0;
		if ($this->input->post('mandaysdesain')<>'') $mandaysdesain=$this->input->post('mandaysdesain'); else $mandaysdesain= 0;
		if ($this->input->post('mandaysdev')<>'') $mandaysdev=$this->input->post('mandaysdev'); else $mandaysdev= 0;
		if ($this->input->post('mandaystest')<>'') $mandaystest=$this->input->post('mandaystest'); else $mandaystest= 0;
		if ($this->input->post('projectid')<>'') $projectid=$this->input->post('projectid'); else $projectid= '';
		if ($this->input->post('namaproject')<>'') $namaproject=$this->input->post('namaproject'); else $namaproject= '';
		if ($this->input->post('kategoripengadaan')<>'') $kategoripengadaan=$this->input->post('kategoripengadaan'); else $kategoripengadaan= '';
		if ($this->input->post('versidokproj')<>'') $versidokproj=$this->input->post('versidokproj'); else $versidokproj= '';
		if ($this->input->post('tglinitialproj')<>'') $tglinitialproj=$this->konvtgl($this->input->post('tglinitialproj')); else $tglinitialproj= '0000-00-00';
		if ($this->input->post('tglfinalproj')<>'') $tglfinalproj=$this->konvtgl($this->input->post('tglfinalproj')); else $tglfinalproj= '0000-00-00';
		if ($this->input->post('picuser')<>'') $picuser=$this->input->post('picuser'); else $picuser= '';
		$picuser=str_replace("'", "\'", $picuser);
		if ($this->input->post('uicsupport')<>'') $uicsupport=$this->input->post('uicsupport'); else $uicsupport= '';
		if ($this->input->post('kategoripengembanganojk')<>'') $kategoripengembanganojk=$this->input->post('kategoripengembanganojk'); else $kategoripengembanganojk= '';
		if ($this->input->post('jenispengembangan')<>'') $jenispengembangan=$this->input->post('jenispengembangan'); else $jenispengembangan= '';
		if ($this->input->post('pengembang')<>'') $pengembang=$this->input->post('pengembang'); else $pengembang= '';
		if ($this->input->post('ppjti')<>'') $ppjti=$this->input->post('ppjti'); else $ppjti= '';
		if ($this->input->post('profit')<>'') $profit=$this->input->post('profit'); else $profit= '';
		if ($this->input->post('lokasidc')<>'') $lokasidc=$this->input->post('lokasidc'); else $lokasidc= '';
		if ($this->input->post('lokasidrc')<>'') $lokasidrc=$this->input->post('lokasidrc'); else $lokasidrc= '';
		if ($this->input->post('capex')<>'') $capex=$this->input->post('capex'); else $capex= '0';
		if ($this->input->post('opex')<>'') $opex=$this->input->post('opex'); else $opex= '0';
		if ($this->input->post('estimasirp')<>'') $estimasirp=$this->input->post('estimasirp'); else $estimasirp= '0';
		if ($this->input->post('maxreqreceived')<>'') $maxreqreceived=$this->konvtgl($this->input->post('maxreqreceived')); else $maxreqreceived= '0000-00-00';
		if ($this->input->post('requirementreceived')=='on') $requirementreceived='Sudah'; else $requirementreceived= '';
		if ($this->input->post('tglrequest')<>'') $tglrequest=$this->konvtgl($this->input->post('tglrequest')); else $tglrequest= '0000-00-00';
		if ($this->input->post('statusklarifikasireq')<>'') $statusklarifikasireq=$this->input->post('statusklarifikasireq'); else $statusklarifikasireq= '';
		if ($this->input->post('rencanainisiasi')<>'') $rencanainisiasi=$this->input->post('rencanainisiasi'); else $rencanainisiasi= '';
		if ($this->input->post('tgldocumentproject')<>'') $tgldocumentproject=$this->konvtgl($this->input->post('tgldocumentproject')); else $tgldocumentproject= '0000-00-00';
		if ($this->input->post('desain')<>'') $desain=$this->input->post('desain'); else $desain= '';
		if ($this->input->post('nomordrf')<>'') $nomordrf=$this->input->post('nomordrf'); else $nomordrf= ''; 
		if ($this->input->post('aksi')<>'') $aksi=$this->input->post('aksi'); else $aksi= '';
		if ($this->input->post('ubahmember')<>'') $ubahmember=$this->input->post('ubahmember'); else $ubahmember= ''; 
		if ($this->input->post('benefitcommercial')<>'') $benefitcommercial=$this->input->post('benefitcommercial'); else $benefitcommercial= '0';
		if ($this->input->post('benefitautomation')<>'') $benefitautomation=$this->input->post('benefitautomation'); else $benefitautomation= '0';
		if ($this->input->post('benefitregulatory')<>'') $benefitregulatory=$this->input->post('benefitregulatory'); else $benefitregulatory= '0';
		if ($this->input->post('benefitbniimage')<>'') $benefitbniimage=$this->input->post('benefitbniimage'); else $benefitbniimage= '0';
		if ($this->input->post('businessrequestor')<>'') $businessrequestor=$this->input->post('businessrequestor'); else $businessrequestor= ''; 
		if ($this->input->post('businessapprover')<>'') $businessapprover=$this->input->post('businessapprover'); else $businessapprover= '';
		if ($this->input->post('nmproject')<>'') $nmproject=substr($this->input->post('nmproject'),0,6); else $nmproject= '';
		if ($this->input->post('program')<>'') $program=$this->input->post('program'); else $program= '';

		if($jenisdemand=='Baru') {
			$index=$this->projectmodel->indexlob($lob);

			$hasil=$this->projectmodel->lastdemandid($tipedemand.substr($tahundemand,2).$index[0]->group);

			$indexbaru=$hasil[0]->ctr;
			$divisi2=$this->projectmodel->divisi2($divisi);

			$this->tulislog("Divisi2:".$divisi2);

			if (empty($divisi2) || ($divisi2=='')) $divisi2=$divisi;
			$demandid=$tipedemand.substr($tahundemand,2).$index[0]->group.str_pad($indexbaru,3,"0",STR_PAD_LEFT).$divisi2;

			$log="Create Demand Id:".$demandid." tipedemand:".$tipedemand." tahun demand:".$tahundemand." LOB:".$lob."-".$index[0]->group." divisi:".$divisi ;
			$this->tulislog($log);
		}

		$statusprocurement='';
		if ($projectprocurement=='Procurement') {
			$statusprocurement=$statusproject;
			$statusproject='';
		}

		$namabulan=array("","Januari","Februari","Maret","April","Mei",
                    "Juni","Juli","Agustus","September","Oktober","November","Desember");

		if ($mingguke<>0) {$eksimplementasi='W'.$mingguke.' '.$namabulan[$bulan].
            ' '.$tahun;
            if ($bulan==1) $tgleksimplementasi=$tahun.'-01-31';
        	if ($bulan==2) {
        		$tgl='28';
        		if ($tahun % 4==0) $tgl='29';
        		$tgleksimplementasi=$tahun.'-02-'.$tgl;
	        }
        	if ($bulan==3) $tgleksimplementasi=$tahun.'-03-31';
        	if ($bulan==4) $tgleksimplementasi=$tahun.'-04-30';
        	if ($bulan==5) $tgleksimplementasi=$tahun.'-05-31';
        	if ($bulan==6) $tgleksimplementasi=$tahun.'-06-30';
        	if ($bulan==7) $tgleksimplementasi=$tahun.'-07-31';
        	if ($bulan==8) $tgleksimplementasi=$tahun.'-08-31';
        	if ($bulan==9) $tgleksimplementasi=$tahun.'-09-30';
        	if ($bulan==10) $tgleksimplementasi=$tahun.'-10-31';
        	if ($bulan==11) $tgleksimplementasi=$tahun.'-11-30';
        	if ($bulan==12) $tgleksimplementasi=$tahun.'-12-31';
    	} 
        elseif ($bulan<>0) {
        	$eksimplementasi=$namabulan[$bulan].' '.$tahun ;
        	if ($bulan==1) $tgleksimplementasi=$tahun.'-01-31';
        	if ($bulan==2) {
        		$tgl='28';
        		if ($tahun % 4==0) $tgl='29';
        		$tgleksimplementasi=$tahun.'-02-'.$tgl;
	        }
        	if ($bulan==3) $tgleksimplementasi=$tahun.'-03-31';
        	if ($bulan==4) $tgleksimplementasi=$tahun.'-04-30';
        	if ($bulan==5) $tgleksimplementasi=$tahun.'-05-31';
        	if ($bulan==6) $tgleksimplementasi=$tahun.'-06-30';
        	if ($bulan==7) $tgleksimplementasi=$tahun.'-07-31';
        	if ($bulan==8) $tgleksimplementasi=$tahun.'-08-31';
        	if ($bulan==9) $tgleksimplementasi=$tahun.'-09-30';
        	if ($bulan==10) $tgleksimplementasi=$tahun.'-10-31';
        	if ($bulan==11) $tgleksimplementasi=$tahun.'-11-30';
        	if ($bulan==12) $tgleksimplementasi=$tahun.'-12-31';
        }
        else {
        	if ($kuartal<> 0) {
        		$eksimplementasi='Q'.$kuartal.' '.$tahun ;
        		if ($kuartal==1) $tgleksimplementasi=$tahun.'-03-31';
        		if ($kuartal==2) $tgleksimplementasi=$tahun.'-06-30';
        		if ($kuartal==3) $tgleksimplementasi=$tahun.'-09-30';
        		if ($kuartal==4) $tgleksimplementasi=$tahun.'-12-31';
        	}
        	else {
        		$eksimplementasi=$tahun ;
        		$tgleksimplementasi=$tahun.'-12-31';
        	}
        }

        $aplikasiterdampak='';$cnt=0;
        for ($x=1; $x<=20; $x++) {
        	if ($this->input->post('terdampak_'.$x)<>'') {
        		if ($cnt==1) $aplikasiterdampak=$aplikasiterdampak.";"; else $cnt=1;
        		$aplikasiterdampak=$aplikasiterdampak.$this->input->post('terdampak_'.$x);
        	}
        }


        $str='';$cnt=0;$str2='';
        for ($x=1; $x<=20; $x++) {
        	if ($this->input->post('mgrbnp_'.$x)<>'') {
        		if ($cnt==1) {$str=$str.","; $str2=$str2.",";}else $cnt=1;
        		$str=$str."('".$demandid."','".$this->input->post('mgrbnp_'.$x)."','BNP','MGR')";
        		$str2=$str2.$this->input->post('mgrbnp_'.$x);
        	}
        	if ($this->input->post('amgrbnp_'.$x)<>'') {
        		if ($cnt==1) {$str=$str.","; $str2=$str2.",";} else $cnt=1;
        		$str=$str."('".$demandid."','".$this->input->post('amgrbnp_'.$x)."','BNP','AMGR')";
        		$str2=$str2.$this->input->post('amgrbnp_'.$x);
        	}
        	if ($this->input->post('mgrbsa_'.$x)<>'') {
        		if ($cnt==1) {$str=$str.","; $str2=$str2.",";} else $cnt=1;
        		$str=$str."('".$demandid."','".$this->input->post('mgrbsa_'.$x)."','BSA','MGR')";
        		$str2=$str2.$this->input->post('mgrbsa_'.$x);
        	}
        	if ($this->input->post('amgrbsa_'.$x)<>'') {
        		if ($cnt==1) {$str=$str.","; $str2=$str2.",";} else $cnt=1;
        		$str=$str."('".$demandid."','".$this->input->post('amgrbsa_'.$x)."','BSA','AMGR')";
        		$str2=$str2.$this->input->post('amgrbsa_'.$x);
        	}
        	if ($this->input->post('mgrptm_'.$x)<>'') {
        		if ($cnt==1) {$str=$str.","; $str2=$str2.",";} else $cnt=1;
        		$str=$str."('".$demandid."','".$this->input->post('mgrptm_'.$x)."','PTM','MGR')";
        		$str2=$str2.$this->input->post('mgrptm_'.$x);
        	}
        	if ($this->input->post('amgrptm_'.$x)<>'') {
        		if ($cnt==1) {$str=$str.","; $str2=$str2.",";} else $cnt=1;
        		$str=$str."('".$demandid."','".$this->input->post('amgrptm_'.$x)."','PTM','AMGR')";
        		$str2=$str2.$this->input->post('amgrptm_'.$x);
        	}
        }

        $message1='';
		$message2='';
		$typealert='';

        if ($aksi=='Tambah') {
			$gagal=$this->projectmodel->tambahdemand($jenisdemand,$demandid,$tipedemand,
				$tahundemand,$periodedemand,$namademand,$divisi,$lob,$projectprocurement,
				$statusproject,$statusprocurement,$grouping,$groupingcluster,$tipeproject,
				$corpplan,$narative,$eksimplementasi,$mingguke,$bulan,$kuartal,$tahun,$mandays,
				$mandaysdesain,$mandaysdev,$mandaystest,$projectid,$namaproject,$kategoripengadaan,
				$versidokproj,$tglinitialproj,
				$tglfinalproj,$picuser,$uicsupport,$kategoripengembanganojk,$jenispengembangan,
				$pengembang,$ppjti,$profit,$lokasidc,$lokasidrc,$capex,$opex,$estimasirp,
				$maxreqreceived,$tglrequest,$statusklarifikasireq,$rencanainisiasi,
				$tgldocumentproject,$desain,$nomordrf,$NPP,$tgleksimplementasi,$aplikasiterdampak,
				$requirementreceived,$str,$businessrequestor,$businessapprover,$benefitcommercial,$benefitautomation,$benefitregulatory,$benefitbniimage,
				$program,$nmproject);

			$this->tulislog("Tambah Demand:".$demandid." status:".$gagal);

			if ($gagal==0) {
				$message1='Berhasil ditambahkan Demand ID : '.$demandid;
				$message2='';
				$typealert='success';
			} elseif ($gagal==1) {
				$message1='Gagal menambahkan Demand #'.$gagal;
				$message2='';
				$typealert='error';
			} elseif ($gagal==2) {
				$message1='Sudah ada Demand '.$demandid.' untuk periode '.$periodedemand;
				$message2='';
				$typealert='error';
			}
		}

		if ($aksi=='Edit') {
			$gagal=$this->projectmodel->editdemand($jenisdemand,$demandid,$tipedemand,
				$tahundemand,$periodedemand,$namademand,$divisi,$lob,$projectprocurement,
				$statusproject,$statusprocurement,$grouping,$groupingcluster,$tipeproject,
				$corpplan,$narative,$eksimplementasi,$mingguke,$bulan,$kuartal,$tahun,$mandays,
				$mandaysdesain,$mandaysdev,$mandaystest,$projectid,$namaproject,$kategoripengadaan,
				$versidokproj,$tglinitialproj,
				$tglfinalproj,$picuser,$uicsupport,$kategoripengembanganojk,$jenispengembangan,
				$pengembang,$ppjti,$profit,$lokasidc,$lokasidrc,$capex,$opex,$estimasirp,
				$maxreqreceived,$tglrequest,$statusklarifikasireq,$rencanainisiasi,
				$tgldocumentproject,$desain,$nomordrf,$NPP,$tgleksimplementasi,$aplikasiterdampak,
				$requirementreceived,$str,$str2,$ubahmember,$businessrequestor,$businessapprover,$benefitcommercial,$benefitautomation,$benefitregulatory,$benefitbniimage,
				$program,$nmproject);

			$this->tulislog("Edit Demand:".$demandid." status:".$gagal);

			if ($gagal==0) {
				$message1='Berhasil Update Demand ID : '.$demandid;
				$message2='';
				$typealert='success';
			} elseif ($gagal==1) {
				$message1='Gagal mengupdate Demand #'.$gagal;
				$message2='';
				$typealert='error';
			} elseif ($gagal==2) {
				$message1='Tidak ada Demand '.$demandid.' untuk periode '.$periodedemand;
				$message2='';
				$typealert='error';
			} elseif ($gagal==3) {
				$message1='Gagal mengupdate Demand #'.$gagal;
				$message2='';
				$typealert='error';
			} elseif ($gagal==4) {
				$message1='Tidak ada perubahan '.$demandid;
				$message2='';
				$typealert='info';
			}

		}

		if (isset($_GET['id'])) $id=$_GET['id'];
		else $id= '';
		$periodedemand= date("Y");
		$demand= '';
		$divisi= '';
		$statusproject= '';
		$tipedemand= '';
		$sektor= '';
		$implementasi= '';
		$thnimplementasi= '';
		$projectprocurement= '';
		$lineofbusiness= '';

		$datademand=$this->projectmodel->demand($periodedemand,$demand,$divisi,$statusproject,$tipedemand,$sektor,$implementasi,$thnimplementasi,$projectprocurement,$lineofbusiness,'All','All');
		$listdivisi=$this->projectmodel->listparameter('Divisi');
		$liststatusproject=$this->projectmodel->listparameter('StatusProject');
		$liststatusprocurement=$this->projectmodel->listparameter('StatusProcurement');
		$listsektor=$this->projectmodel->listparameter('Sektor');
		$listlob=$this->projectmodel->listparameter('LineofBusiness');

		// $datademand='';
		// $listdivisi='';
		// $liststatusproject='';
		// $liststatusprocurement='';
		// $listsektor='';
		// $listlob='';
		unset($_POST);

		$data=array(
			'title' => 'Demand',
			'menu' => 'Project,Demand',
			'datademand' => $datademand,
			'cari' => '',
			'tahun' => $periodedemand,
			'demand' => $demand,
			'divisi' => $divisi,
			'projectprocurement' => $projectprocurement,
			'statusproject' => $statusproject,
			'tipedemand' => $tipedemand,
			'sektor' => $sektor,
			'implementasi' => $implementasi,
			'thnimplementasi' => $thnimplementasi,
			'lineofbusiness' => $lineofbusiness,
			'listdivisi'=> $listdivisi,
			'liststatusproject'=> $liststatusproject,
			'liststatusprocurement' => $liststatusprocurement,
			'listsektor'=> $listsektor,
			'id' => $id,
			'projectprocurement' => $projectprocurement,
			'listlob' => $listlob,
			'NPP' => $NPP,
			'alert' => true,
			'message1' => $message1,
			'message2' => $message2,
			'typealert' => $typealert,
			'dari' => $dari,
			'cari' => $demandid,
		);
		$this->load->view('project/tambahedit',$data);

	}

	function simpannote() {
		$hasil=0;
		$this->applib->cek_session();
		$NPP=$this->session->userdata('npp');
		$demandid=$this->input->post('demandid');
		$title=$this->input->post('title');
		$note=$this->input->post('note');
		$aksi=$this->input->post('aksi');
		$idnote=$this->input->post('idnote');
		
		if ($NPP!='') {
			$hasil1=$this->projectmodel->simpannote($demandid,$title,$note,$NPP,$aksi,$idnote);
			if (!$hasil1) $hasil=2;
		} else $hasil=1;

		$this->tulislog("Simpan Note:".$demandid." Title:".$title." Aksi:".$aksi." status:".$hasil);

		echo json_encode($hasil);

	}

	function loadnote() {
		$cek=$this->applib->cek_session();if ($cek==1) return;
		$demandid=$_GET['demandid'];
		$NPP=$this->session->userdata('npp');
		$aksi=$_GET['aksi'];
		$listnote=$this->projectmodel->listnote($demandid);

		$data=array(
			'listnote' => $listnote,
			'npp' => $NPP,
			'aksi' => $aksi,
		);
		$this->load->view('project/tabelnote',$data);
	}

	function hapusnote(){
		$cek=$this->applib->cek_session();if ($cek==1) return;
		$id=$_GET['id'];
		$NPP=$this->session->userdata('npp');
		$demandid=$_GET['demandid'];
		$hasil=$this->projectmodel->hapusnote($id,$demandid,$NPP);

		$this->tulislog("Hapus Note:".$demandid." status:".$hasil);

		echo json_encode($hasil);

	}

	function hapusdok(){
		$cek=$this->applib->cek_session();if ($cek==1) return;
		$id=$_GET['id'];
		$NPP=$this->session->userdata('npp');
		$demandid=$_GET['demandid'];
		$nomordokumen=$_GET['nomordokumen'];
		$hasil=$this->projectmodel->hapusdok($id,$demandid,$NPP,$nomordokumen);

		$this->tulislog("Hapus Dokumen:".$demandid." Nomor Dokumen:".$nomordokumen." status:".$hasil);

		echo json_encode($hasil);

	}

	function hapusdemand(){
		$cek=$this->applib->cek_session();if ($cek==1) return;
		$demandid=$_GET['demandid'];
		$NPP=$this->session->userdata('npp');
		$hasil=$this->projectmodel->hapusdemand($demandid,$NPP);

		$this->tulislog("Hapus Demand:".$demandid." status:".$hasil);

		echo json_encode($hasil);

	}

	function loadhistori() {
		$cek=$this->applib->cek_session();if ($cek==1) return;
		$demandid=$_GET['demandid'];
		$NPP=$this->session->userdata('npp');
		$listhistori=$this->projectmodel->listhistori($demandid);

		$data=array(
			'listhistori' => $listhistori,
			'npp' => $NPP,
		);
		$this->load->view('project/tabelhistori',$data);
	}

	function simpandok() {
		$hasil=0;
		$this->applib->cek_session();
		$demandid=$this->input->post('demandid');
		$jenisdok=$this->input->post('jenisdok');
		$nomordokumen=$this->input->post('nomordokumen');
		if ($this->input->post('tgldokumen')<>'') $tgldokumen=$this->konvtgl($this->input->post('tgldokumen')); else $tgldokumen= '0000-00-00';
		$perihal=$this->input->post('perihal');
		$versi=$this->input->post('versi');
		$divisi=$this->input->post('divisi');
		if ($this->input->post('tgldisposisi')<>'') $tgldisposisi=$this->konvtgl($this->input->post('tgldisposisi')); else $tgldisposisi= '0000-00-00';
		$picmgrbsa=$this->input->post('picmgrbsa');
		$picamgrbsa=$this->input->post('picamgrbsa');
		$NPP=$this->session->userdata('npp');
		$aksi=$this->input->post('aksi');
		$iddokumen=$this->input->post('iddokumen');
		$ubahpicbsa=$this->input->post('ubahpicbsa');
		$nomorsdd=$this->input->post('nomorsdd');
		$namafile=$this->input->post('namafile');

		if ($jenisdok=='SDD') {
			if ($nomorsdd=='') {
				$nomordokumen=$this->projectmodel->getnosdd($tgldokumen);
				$this->tulislog("Create NomorSDD:".$nomordokumen." Versi:".$versi." Demand Id:".$demandid." tanggal dokumen:".$tgldokumen);

			if (!$this->projectmodel->cekdobelsdd($nomordokumen,$versi)) $hasil=3;
			$this->tulislog("Cek dobel NomorSDD:".$nomordokumen." Versi:".$versi." Demand Id:".$demandid." status:".$hasil);
			}
			else {
				$nomordokumen=$nomorsdd;
				if (!$this->projectmodel->cekdobelsdd($nomordokumen,$versi)) $hasil=3;
			}
		
		}

		if ($NPP!='') {
			$hasil=$this->projectmodel->simpandok($demandid,$jenisdok,$nomordokumen,$tgldokumen,$perihal,$versi,$divisi,$tgldisposisi,$NPP,$picmgrbsa,$picamgrbsa,$aksi,$iddokumen,$ubahpicbsa,$namafile);
		} else {
			$hasil=1;
		}

		$this->tulislog("Simpan Dokumen:".$nomordokumen." Versi:".$versi." Demand Id:".$demandid." status:".$hasil);

		$data=array(
			'nomordokumen' => $nomordokumen,
			'hasil' => $hasil,
		);

		echo json_encode($data);
	}	

function loaddok() {
		$this->applib->cek_session();
		$demandid=$_GET['demandid'];
		$NPP=$this->session->userdata('npp');
		$aksi=$_GET['aksi'];
		$listdokumen=$this->projectmodel->listdokumen($demandid);

		$data=array(
			'listdokumen' => $listdokumen,
			'npp' => $NPP,
			'aksi' => $aksi,
		);
		$this->load->view('project/tabeldokumen',$data);
	}

function getdoksdd() {
	$nomorsdd=$this->input->post('nomorsdd');
	$dokumensdd=$this->projectmodel->dokumensdd($nomorsdd);

	echo json_encode($dokumensdd);
	}

function getlistsdd() {
	$listsdd=$this->projectmodel->listdokumenall('SDD');

	echo json_encode($listsdd);
	}


function getdokumen() {
	$Id=$this->input->post('id');
	$datadokumen=$this->projectmodel->getdokumen($Id);
	echo json_encode($datadokumen);
}

function getnote() {
	$Id=$this->input->post('id');
	$datanote=$this->projectmodel->getnote($Id);

	echo json_encode($datanote);

}

function uploadfile(){
	$error_types = array(
    1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini.',
    'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.',
    'The uploaded file was only partially uploaded.',
    'No file was uploaded.',
    6 => 'Missing a temporary folder.',
    'Failed to write file to disk.',
    'A PHP extension stopped the file upload.'
);
	$demandid=$this->input->post('demandid');
	$NPP=$this->session->userdata('npp');

	$target_dir = "upload/$demandid/";
	$target_file = $target_dir . basename($_FILES["file"]["name"]);
	if ($NPP=='') {
		echo "Harap login dulu";
	} else
	if ( 0 < $_FILES['file']['error'] ) {
		$error_message = $error_types[$_FILES['file']['error']];
		$info=phpinfo();
        echo 'Error: ' . $error_message . '<br>'.$info.'<br>';
    }
    else if (file_exists($target_file)) {
	  echo "File ".$_FILES["file"]["name"]." sudah ada";
	  $uploadOk = 0;
	}
    else {
    	if(!is_dir("upload/$demandid")){
	    	mkdir("upload/$demandid", 0755);
		}
        move_uploaded_file($_FILES['file']['tmp_name'], $target_file);
        $keterangan="Upload file dokumen: ".$_FILES['file']['name'];
        $this->projectmodel->tambahhistori($demandid,$keterangan,$NPP);
    }
}

function downloadfile() {
	$demandid=$_GET['demandid'];
	$namafile=$_GET['namafile'];

	$namafile1="upload/$demandid/$namafile";
	$NPP=$this->session->userdata('npp');
	if (file_exists($namafile1)) {
		//Define header information
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header("Cache-Control: no-cache, must-revalidate");
		header("Expires: 0");
		header('Content-Disposition: attachment; filename="'.basename($namafile1).'"');
		header('Content-Length: ' . filesize($namafile1));
		header('Pragma: public');
		ob_clean();
		flush();

		//Read the size of the file
		readfile($namafile1);

		//Terminate from the script
		exit;
	} else {
		echo "File $namafile tidak ada";
	}

}

function hapusfile() {
	$NPP=$this->session->userdata('npp');
	$demandid=$_GET['demandid'];
	$namafile=$_GET['namafile'];
	$nomordokumen=$_GET['nomordokumen'];
	$versi=$_GET['versi'];
	$namafile1="upload/$demandid/$namafile";
	if (file_exists($namafile1)) {
		unlink($namafile1);
	}
	$this->projectmodel->hapusfile($demandid,$nomordokumen,$namafile,$NPP,$versi);
}

function ganttchart() {
	$this->applib->cek_session();
	$NPP=$this->session->userdata('npp');
	$harilibur=$this->projectmodel->listparameter('HariLibur');
	$listpegawai=$this->projectmodel->listpegawai();
	$tahun=date("Y");

	$data=array(
		'title' => 'Gantt Chart',
		'menu' => 'Project,Gantt Chart',
		'NPP' => $NPP,
		'harilibur' => $harilibur,
		'tanggal1' => "01/01/$tahun",
		'tanggal2' => "31/12/$tahun",
		'listpegawai' => $listpegawai,
	);
	$this->load->view('project/ganttchart',$data); 

}

function ganttchart2() {
	$this->applib->cek_session();
	$NPP=$this->session->userdata('npp');
	$harilibur=$this->projectmodel->listparameter('HariLibur');

	$data=array(
		'title' => 'Gantt Chart',
		'menu' => 'Project,Gantt Chart',
		'NPP' => $NPP,
		'harilibur' => $harilibur,
	);
	$this->load->view('project/ganttchart2',$data); 

}

public function data() {
        $this->load->database();

        $scheduler = new GanttConnector($this->db, "PHPCI");
        $scheduler->render_links("gantt_links", "id", "source,target,type");
        $scheduler->render_table("gantt_tasks","id",
        	"start_date,duration,text,progress,parent,demandid,nomorcrir,user,NPP","",
        	"parent");
    }

function ganttdata() {
	$result=[
		"data" => [],
		"links" => []
	];

	$data=$this->projectmodel->datagantt();
	$links=$this->projectmodel->linkgantt();
	
	if (!empty($data)) {
    	foreach ($data as $row) {
    		array_push($result["data"], $row);
    	}
    }

    if (!empty($links)) {
    	foreach ($links as $link) {
    		array_push($result["links"], $link);
    	}
    }
	echo json_encode($result);
}

function getdetailcrir() {
		$nomorcrir=$this->input->post('nomorcrir');
		$detailcrir=$this->projectmodel->detailcrir($nomorcrir);
		$data=array(
			'detailcrir' => $detailcrir,
		);
		echo json_encode($data); 
	}

function simpantask() {
	$hasil=0;
	$NPP=$this->session->userdata('npp');
	$demandid=$this->input->post('demandid');
	$namademand=$this->input->post('namademand');
	$nomorcrir=$this->input->post('nomorcrir');
	$shortdescription=$this->input->post('shortdescription');
	$namatask=$this->input->post('namatask');
	$tglmulai=$this->konvtgl($this->input->post('tglmulai'));
	$duration=$this->input->post('durasi');
	$pic=$this->input->post('pic');
	$parent=$this->input->post('parent');
	$progress=$this->input->post('progress');
	$typetask=$this->input->post('typetask');
	$baru=$this->input->post('baru');
	$taskid=$this->input->post('taskid');


	$hasil1=$this->projectmodel->simpantask($demandid,$namademand,$nomorcrir,$shortdescription,$namatask,$tglmulai,$duration,$pic,$parent,$progress,$typetask,$NPP,$baru,$taskid);
	if (!$hasil1) $hasil=1;
	echo json_encode($hasil); 
}

function simpantaskdrag() {
	$hasil=0;
	$NPP=$this->session->userdata('npp');
	$taskid=$this->input->post('taskid');	
	$tglmulai=$this->konvtgl($this->input->post('tglmulai'));
	$duration=$this->input->post('durasi');
	$progress=$this->input->post('progress');

	$hasil1=$this->projectmodel->simpantaskdrag($taskid,$tglmulai,$duration,$progress,$NPP);
	if (!$hasil1) $hasil=1;
	echo json_encode($hasil); 
}

function hapustask() {
	$taskid=$this->input->post('taskid');
	$hasil1=$this->projectmodel->hapustask($taskid);
	$hasil=0;
	if (!$hasil1) $hasil=1;
	echo json_encode($hasil);
}

function get_data_user() {
    $list = $this->projectmodel->get_datatables();
    $data = array();
    $no = $_POST['start'];

    $namabulan=array("","Januari","Februari","Maret","April","Mei",
                    "Juni","Juli","Agustus","September","Oktober","November","Desember");
    
    foreach ($list as $field) {

	if ($field->MingguEksImplementasi<>0) {$eksimpl='W'.$field->MingguEksImplementasi.' '.$namabulan[$field->BulanEksImplementasi].
	  ' '.$field->TahunEksImplementasi;} 
	elseif ($field->BulanEksImplementasi<>0) {
	    $eksimpl=$namabulan[$field->BulanEksImplementasi].
	  ' '.$field->TahunEksImplementasi ;}
	else {$eksimpl='Q'.$field->KuartalEksImplementasi.
	  ' '.$field->TahunEksImplementasi ;}

	$jenis='';
	if ($field->JenisDemand == 'Carry Over') $jenis = 'Carry Over';
	else if ($field->SoIn == 'SO') $jenis = 'Sign Off';
	else $jenis = 'Insersi';

    if ($field->ProjectProcurement == 'Project') $status=$field->StatusProject;
    else $status=$field->StatusProcurement;

        $row = array();
        $row[] = $field->DemandId;
        $row[] = $field->NamaDemand;
        $row[] = $field->Divisi;
        $row[] = $field->nomordokumen;
        $row[] = $field->ProjectProcurement.'-'.$jenis;
        $row[] = $status;
        $row[] = $field->tim_member;
        $row[] = $eksimpl;
        $row[] = $field->nomorcr;
        $row[] = 0;

        $data[] = $row;
    }

    $output = array(
        "draw" => $_POST['draw'],
        "recordsTotal" => $this->projectmodel->count_all(),
        "recordsFiltered" => $this->projectmodel->count_filtered(),
        "data" => $data,
    );
    //output dalam format JSON
    echo json_encode($output);

}

public function tracker()
	{
		$cek=$this->applib->cek_session();if ($cek==1) return;
		$NPP=$this->session->userdata('npp');
		if (isset($_GET['id'])) $id=$_GET['id'];
		else $id= '';
		if (isset($_GET['state'])) $state=$_GET['state'];
		else $state= 'Open';
		if (isset($_GET['crstatus'])) $crstatus=$_GET['crstatus'];
		else $crstatus= '';
		$datatracker='';
		$listcrstatus=$this->projectmodel->listparameter('CRStatus');

		$data=array(
			'title' => 'PVCS Tracker',
			'menu' => 'Project,PVCS Tracker',
			'datatracker' => $datatracker,
			'state' => $state,
			'crstatus' => $crstatus,
			'alert' => false,
			'message1' => '',
			'message2' => '',
			'typealert' => '',
			'listcrstatus' => $listcrstatus,
		);
		$this->load->view('project/tracker',$data);

	}

function getlisttracker(){
		$NPP=$this->session->userdata('npp');
		$state=$this->input->post('state');
		$crstatus=$this->input->post('crstatus');

		$this->session->set_userdata('state', $state);
		$this->session->set_userdata('crstatus', $crstatus);

		$strquery=$this->projectmodel->trackersebagian($state,$crstatus);

		$this->session->set_userdata('strquery', $strquery);

		$data=array(
			//'datademand' => $datademand,
			'NPP' => $NPP,
		);
		$this->load->view('project/trackerresult',$data); 
	}	

function get_data_tracker() {
    $list = $this->projectmodel->get_datatracker();
    $data = array();
    $no = $_POST['start'];

    foreach ($list as $field) {

        $row = array();
        $row[] = $field->nomorcrir;
        $row[] = $field->submitdate;
        $row[] = $field->projectname.'-'.$field->shortdescription;
        $row[] = $field->assignto;
        $row[] = $field->po1;
        $row[] = $field->demandid;
        $row[] = $field->crstatus;
        $row[] = 0;

        $data[] = $row;
    }

    $output = array(
        "draw" => $_POST['draw'],
        "recordsTotal" => $this->projectmodel->count_all(),
        "recordsFiltered" => $this->projectmodel->count_filtered(),
        "data" => $data,
    );
    //output dalam format JSON
    echo json_encode($output);

}

function test() {

		$data=array(
			'title' => 'Demand',
			'menu' => 'Project,Demand',

		);
		$this->load->view('project/test',$data);

}

	public function tabel()
	{
		$login=$this->applib->cek_session();
		$dokumen=$this->projectmodel->dokumen();
		$data=[
			'title' => 'Tabel',
			'menu' => 'Project,Tabel',
			'content' => 'project/tabel',
			'dokumen' => $dokumen,
			'login' => $login,
		];
		$this->load->view('layout2/template',$data);
	}
}
