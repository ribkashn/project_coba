<?php

class ProjectModel extends CI_Model{
	
	function  __construct(){

		parent::__construct();
	}

    function listparameter($kategori){
        $str="select Kode,Nama,`Group`,Group2 from parameter where kategori = '$kategori' order by kode";
        $q=$this->db->query($str);
        return $q->result();
    }

    function listmgr($kelompok) {
        $str="select NPP,Nama from user where kelompok = '$kelompok' and jabatan = 'MGR'
         and aktif = 'Y' order by nama";
        $q=$this->db->query($str);
        return $q->result();
    }

    function detaildemand($demandid) {
        $str="SELECT DemandId, NamaDemand, NamaProject, Divisi, JenisDemand, ProjectProcurement, StatusProject, StatusProcurement, MingguEksImplementasi, BulanEksImplementasi, KuartalEksImplementasi, TahunEksImplementasi, date_format(TanggalEksImplementasi,'%d/%m/%Y') TanggalEksImplementasi, EstimasiMandays, ProjectCategory, StatusDescription, Narative, AttentionArea, Sektor, ProjectID,   CorPlan, LOB, TipeProject, VersiDokProj,date_format(TglInitialDokProj,'%d/%m/%Y') TglInitialDokProj, date_format(TglFinalDokProj,'%d/%m/%Y') TglFinalDokProj, BNP1, BNP2, BSA1, BSA2, PTM1, PTM2, ProfitEfesiensi, EstimasiRp, EstimasiRPNilai, TahunDemand, PeriodeDemand, Grouping, GroupingCluster, KategoriPengembanganOJK, JenisPengembangan, Pengembang, PPJTIPihakTerkait, LokasiDC, LokasiDRC, EstimasiBiayaCapex, EstimasiBiayaOpex, KategoriPengembanganProject, Keterangan, date_format(MaxReqReceived,'%d/%m/%Y') MaxReqReceived, RequirementReceived, NomorDRF, StatusKlarifikasiReq, RencanaInisiasi, PICUser, UICSupportIT, date_format(TglDocumentProject,'%d/%m/%Y') TglDocumentProject,SoIn,KategoriPengadaan,date_format(TglRequest,'%d/%m/%Y') TglRequest,Desain,
            b.nama Divisi1,c.nama LOB1,d.nama CorPlan1,AplikasiTerdampak,MandaysDesain, MandaysDev, MandaysTest,BusinessRequestor,BusinessApprover,BenefitCommercial,BenefitAutomation,BenefitRegulatory,BenefitBNIImage,Program,Project,e.Nama
    FROM demand a
    left join parameter b on b.kategori = 'Divisi' and b.kode=a.Divisi
    left join parameter c on c.kategori = 'LineofBusiness' and c.kode=a.LOB
    left join parameter d on d.kategori = 'CorporatePlan' and d.kode=a.CorPlan
    left join parameter e on e.kategori = 'Project' and e.kode=a.Project
    where demandid = '$demandid' and flaghapus is null limit 1";
        $q=$this->db->query($str);
        return $q->result();
    }

    function datatracker($demandid) {
        $str="select nomorcrir,projectname,ShortDescription,AssignTo,CRStatus from pvcstracker where demandid='$demandid'";
        $q=$this->db->query($str);
        return $q->result();
    }

    function listdokumen($demandid) {
        $str="select Id,JenisDokumen, NomorDokumen, date_format(TanggalDokumen,'%d/%m/%Y') TanggalDokumen, Deskripsi, a.Divisi, Versi,
        NamaFile, Folder, date_format(TanggalDispo,'%d/%m/%Y') TanggalDispo, a.npp,b.nama, b.kelompok, WaktuCreate from dokumen a
        left join user b on b.npp=a.npp where 
        demandid='$demandid' and a.aktif='Y'";
        $q=$this->db->query($str);
        return $q->result();
    }

    function listnote($demandid) {
        $str="select Id,Title, Note, a.npp,b.nama,b.kelompok, date_format(WaktuCreate,'%d/%m/%Y %H:%i:%s') WaktuCreate from note a
        left join user b on b.npp=a.npp where 
        demandid='$demandid' and a.aktif='Y'";
        $q=$this->db->query($str);
        return $q->result();
    }

    function listhistori($demandid) {
        $str="select  Keterangan, a.npp,b.nama,b.kelompok, date_format(WaktuCreate,'%d/%m/%Y %H:%i:%s') WaktuCreate from histori a
        left join user b on b.npp=a.npp where 
        demandid='$demandid'";
        $q=$this->db->query($str);
        return $q->result();
    }

    function listmember($demandid,$kelompok,$jabatan) {
        $str="select demandid,a.npp,a.kelompok,a.jabatan,b.nama from timmember a
            left join user b on b.NPP=a.NPP where 
            demandid = '$demandid' and a.kelompok='$kelompok' and a.jabatan='$jabatan'
            group by a.npp";
        $q=$this->db->query($str);
        return $q->result();
    }

    function demandsebagian($tahun,$demand,$divisi,$statusproject,$tipedemand,$sektor,$implementasi
        ,$thnimplementasi,$projectprocurement,$lineofbusiness,$groupstatus) {

        $str="select DemandId,NamaDemand,NamaProject,Divisi,JenisDemand,StatusProject, MingguEksImplementasi,BulanEksImplementasi,TahunEksImplementasi, KuartalEksImplementasi,SoIn,tim_member,
            ProjectProcurement,StatusProcurement,nomorcr,nomordokumen from ( ";
        $str=$str."select a.DemandId,NamaDemand,NamaProject,a.Divisi,JenisDemand,StatusProject, MingguEksImplementasi,BulanEksImplementasi,TahunEksImplementasi, KuartalEksImplementasi,SoIn,group_concat(distinct concat(c.kelompok,'-',c.Nama) order by c.Kelompok,c.Nama separator ', ') tim_member,
            ProjectProcurement,StatusProcurement,group_concat(distinct concat(nomorcrir,'-',d.CRStatus) order by nomorcrir separator ', ') nomorcr,e.nomordokumen from demand a
        left join timmember b on b.DemandID=a.demandid
        left join user c on c.NPP=b.NPP
        left join pvcstracker d on d.DemandId=a.DemandId
        left join dokumen e on e.demandid=a.demandid and e.jenisdokumen='Memo Requirement'
        where periodedemand=$tahun and flaghapus is null";
        if ($demand <> '') $str=$str. " and namademand like '%$demand%'";
        if ($divisi <> '') $str=$str. " and a.divisi = '$divisi'";
        if ($statusproject <> '') {
            if ($projectprocurement == 'Project') $str=$str. " and statusproject = '$statusproject'";
            else $str=$str. " and statusprocurement = '$statusproject'";
        }
        if ($projectprocurement <> '') $str=$str. " and projectprocurement = '$projectprocurement'";
        if ($groupstatus <> 'All') {
            if ($groupstatus == '') $str=$str. " and ((projectprocurement='Project' and statusproject='') or (projectprocurement='Procurement' and statusprocurement='')) ";
            else
            $str=$str. " and ((projectprocurement='Project' and statusproject in (select nama from parameter where kategori='StatusProject' and `group` like '%$groupstatus')) or (projectprocurement='Procurement' and statusprocurement in (select concat(kode,'. ',nama) from parameter 
            where kategori='StatusProcurement' and `group` like '%$groupstatus'))) ";

        }
        if ($tipedemand <> '') {
            if ($tipedemand=='CO') $str=$str. " and jenisdemand = 'Carry Over'";
            else if ($tipedemand=='SO') $str=$str. " and jenisdemand = 'Baru' and soin = 'SO'";
            else $str=$str. " and jenisdemand = 'Baru' and soin = 'IN'";
        }
        if ($sektor <> '') $str=$str. " and sektor = '$sektor'";
        if ($implementasi <> '') {
            if ($implementasi=='Q1') $str=$str." and (kuartaleksimplementasi=1 or 
            bulaneksimplementasi=1 or bulaneksimplementasi=2 or bulaneksimplementasi=3)"; 
            else if ($implementasi=='Q2') $str=$str." and (kuartaleksimplementasi=2 or 
            bulaneksimplementasi=4 or bulaneksimplementasi=5 or bulaneksimplementasi=6)";
            else if ($implementasi=='Q3') $str=$str." and (kuartaleksimplementasi=3 or 
            bulaneksimplementasi=7 or bulaneksimplementasi=8 or bulaneksimplementasi=9)";
            else if ($implementasi=='Q4') $str=$str." and (kuartaleksimplementasi=4 or 
            bulaneksimplementasi=10 or bulaneksimplementasi=11 or bulaneksimplementasi=12)";
            else  $str=$str." and bulaneksimplementasi=$implementasi";
        }
        if ($thnimplementasi <> '') $str=$str. " and tahuneksimplementasi=$thnimplementasi";
        if ($lineofbusiness <> '') $str=$str. " and LOB='$lineofbusiness'";
        $str=$str. " group by a.demandid ";
        $str=$str.") x ";
        log_message('error','Query:['.$str.']');
        return $str;

    }

    function get_datatables() {
        $column_order = array('DemandId','NamaDemand','Divisi','nomordokumen','ProjectProcurement','StatusProject','tim_member','KuartalEksImplementasi','nomorcr',null);

        $str=$this->session->userdata('strquery');
        if ($_POST['search']['value']) {

        $cari=$_POST['search']['value'];

        $str=$str." where (demandid like '%$cari%' or
                    NamaDemand like '%$cari%' or
                    Divisi like '%$cari%' or
                    nomordokumen like '%$cari%' or
                    JenisDemand like '%$cari%' or
                    StatusProject like '%$cari%' or
                    tim_member like '%$cari%' or
                    nomorcr like '%$cari%')";
        }

        if (isset($_POST['order'])) {
            if ($column_order[$_POST['order']['0']['column']]!=null)
            $str=$str." order by ".$column_order[$_POST['order']['0']['column']]." ".$_POST['order']['0']['dir'];
        }        
        $this->session->set_userdata('strqueryfiltered', $str);

        if($_POST['length'] != -1)
            $str=$str." limit ".$_POST['start'].",".$_POST['length'];

        log_message('error', 'Order Kolom:['.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].']'.' ISI str:['.$str.']');

        $q=$this->db->query($str);
        return $q->result();
    }

    function count_filtered()
    {
        $str=$this->session->userdata('strqueryfiltered');
        $q=$this->db->query($str);
        return $q->num_rows();
    }
 
    public function count_all()
    {
        $str=$this->session->userdata('strquery');
        $q=$this->db->query($str);
        return $q->num_rows();
    }

    function dokumen()
    {
        $str="select * from dokumen";
        $q=$this->db->query($str);
        return $q->result();
    }

    function listamgr($kelompok) {
        $str="select NPP,Nama from user where kelompok = '$kelompok' and not (jabatan = 'MGR'
         or jabatan = 'AVP') and aktif = 'Y' order by nama";
        $q=$this->db->query($str);
        return $q->result();
    }

    function listdokumenall($jenisdokumen) {
        $str="select nomordokumen,deskripsi,versi from dokumen 
           where jenisdokumen='$jenisdokumen' and aktif='Y' group by nomordokumen";
        $q=$this->db->query($str);
        return $q->result();
    }
}