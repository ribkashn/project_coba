<?php

class InboxModel extends CI_Model{
	
	function  __construct(){

		parent::__construct();
	}
	
    function inboxpic($NPP,$kelompok,$jenis) {
        $periodedemand=date("Y");
        $hariini=date("Y-m-d");

        $liststatus="''";
        $inbox="Inbox".$kelompok;
        $groupstatus=array();

        if ($kelompok=="BNP") $groupstatus=array('','No Requirement','Antrian Klarifikasi','Klarifikasi Requirement','Selesai Klarifikasi');
        if ($kelompok=="BSA") $groupstatus=array('','Klarifikasi Requirement','Antrian Design','Design','Selesai Design');
        if ($kelompok=="PTM") $groupstatus=array('','Klarifikasi & Design','Antrian Development','Development & Testing','Selesai');

        $str="select kode from parameter where kategori='Baru'";
        $q=$this->db->query($str);
        $hasil=$q->result();
        $tambahan=0;
        $hari=date("D");
        if ($hari=='Sun') $tambahan=2;
        if ($hari=='Sat') $tambahan=1;
        $jmlhari=$hasil[0]->kode+$tambahan;

        $str="select if(group2='Procurement',concat(kode,': ',nama),nama) nama from parameter where kategori='$inbox' and `group`='$groupstatus[$jenis]'";
        $q=$this->db->query($str);
        $koma="";
        $hasil="";
        foreach ($q->result() as $row) {
            if ($koma=="") { $hasil="'".$row->nama."'";$koma=","; $status1=$row->nama;}
            else $hasil=$hasil.$koma."'".$row->nama."'";$koma=",";
        }

        $str="select b.DemandId,NamaDemand,NamaProject,b.Divisi,JenisDemand,StatusProject, MingguEksImplementasi,BulanEksImplementasi,TahunEksImplementasi, KuartalEksImplementasi,SoIn,group_concat(distinct concat(d.kelompok,'-',d.Nama) order by d.Kelompok,d.Nama separator ', ') tim_member, ProjectProcurement,StatusProcurement,group_concat(distinct concat(nomorcrir,'-',e.CRStatus) order by nomorcrir separator ', ') nomorcr,if(max(f.waktucreate) is not null,'Y','') baru,datediff(tanggaleksimplementasi,current_date()) as selisih,kategoripengembanganproject from 
            (
            select a.demandid from 
            demand a
            left join
            timmember b on b.DemandID=a.demandid
            and b.NPP='$NPP'
            where a.PeriodeDemand=$periodedemand and flaghapus is null and b.NPP is not null 
            and ((projectprocurement='Project' and statusproject in ($hasil))
            or (projectprocurement='Procurement' and statusprocurement in ($hasil)))
            ) a
            left join demand b on b.demandid=a.demandid
            left join timmember c on c.DemandID=a.demandid 
            left join user d on d.NPP=c.NPP 
            left join pvcstracker e on e.DemandId=a.DemandId
            left join histori f on f.DemandID=a.demandid and f.waktucreate> '$hariini' - interval $jmlhari day and (f.keterangan like 'Create Demand%' or f.keterangan like '%menjadi [$status1]') 
            group by b.demandid";

         log_message('error', ' ISI str:['.$str.']');
        $q=$this->db->query($str);

        $data=array(
            'datainbox' => $q->result(),
            'jenis' => $groupstatus[$jenis],
            'jumlah' => count($q->result()),
        );
        return $data;
    }
    
}