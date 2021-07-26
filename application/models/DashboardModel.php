<?php

class DashboardModel extends CI_Model{
	
	function  __construct(){

		parent::__construct();
	}

    function demanddivisi($periodedemand) {
        $str="select divisi, count(*) jumlah from demand where periodedemand=$periodedemand and flaghapus is null
            group by divisi
            order by jumlah desc";
        $q=$this->db->query($str);
        return $q->result();
    }

    function demandsektor($tahunperiode) {
        $str="select b.`Group` sektor,count(*) jumlah from demand a
            left join parameter b on b.Kategori='Divisi' and a.Divisi=b.Kode
            where periodedemand=$tahunperiode and flaghapus is null 
            group by b.`Group` order by jumlah desc";
        $q=$this->db->query($str);
        return $q->result();
    }

    function demandgrpsektor($tahunperiode) {
        $str="select b.`Group2` grpsektor,count(*) jumlah from demand a
            left join parameter b on b.Kategori='GroupSektor' and a.Divisi=b.Kode
            where periodedemand=$tahunperiode and flaghapus is null 
            group by b.`Group2` order by jumlah desc";
        $q=$this->db->query($str);
        return $q->result();
    }

    function listparameter($kategori){
        $str="select Kode,Nama,`Group`,Group2 from parameter where kategori = '$kategori' order by kode";
        $q=$this->db->query($str);
        return $q->result();
    }

    function listparametergrp($kategori){
        $str="select group2 from parameter where kategori = '$kategori' and group2<>'' group by group2";
        $q=$this->db->query($str);
        return $q->result();
    }

    function statusdemand($periodedemand,$jenis,$divisi,$grpsektor) {
        $str="select substring(`group`,3) `group`, count(*) jumlah from (";
        if ($jenis!='Procurement') { $str=$str.
            "select a.demandid,projectprocurement,statusproject,statusprocurement,b.nama,b.group,b.Group2, statusproject `status`,b.kode";
         if ($grpsektor!='All') $str=$str.",c.group2 grpsektor ";
         $str=$str." from demand a 
         left join parameter b on (b.Nama=a.StatusProject) ";
         if ($grpsektor!='All') $str=$str."left join parameter c on (c.kategori='GroupSektor' and c.kode=a.divisi)";
         $str=$str." where periodedemand=$periodedemand and flaghapus is null and ProjectProcurement='Project' and b.kategori='StatusProject'";
         if ($divisi!='All') $str=$str." and divisi='$divisi' ";
         if ($grpsektor!='All') $str=$str." and c.group2='$grpsektor' ";

         $str=$str."union
          select a.demandid,projectprocurement,statusproject,statusprocurement,b.nama,b.group,b.Group2, statusprocurement `status`,b.kode";
         if ($grpsektor!='All') $str=$str.",c.group2 grpsektor ";
         $str=$str."  from demand a 
         left join parameter b on (b.Nama='') ";
         if ($grpsektor!='All') $str=$str."left join parameter c on (c.kategori='GroupSektor' and c.kode=a.divisi)";
         $str=$str." where periodedemand=$periodedemand and flaghapus is null and ProjectProcurement='Project' and StatusProject='' and b.kategori='StatusKosong'";
         if ($divisi!='All') $str=$str." and divisi='$divisi' ";
         if ($grpsektor!='All') $str=$str." and c.group2='$grpsektor' ";
        }

         if ($jenis=='All') $str=$str." union ";

         if ($jenis!='Project') { $str=$str.
         "select a.demandid,projectprocurement,statusproject,statusprocurement,b.nama,b.group,b.Group2, statusprocurement `status`,b.kode";
         if ($grpsektor!='All') $str=$str.",c.group2 grpsektor ";
         $str=$str." from demand a 
         left join parameter b on (b.Nama=substring(a.StatusProcurement,6)) ";
         if ($grpsektor!='All') $str=$str."left join parameter c on (c.kategori='GroupSektor' and c.kode=a.divisi) ";
         $str=$str." where periodedemand=$periodedemand and flaghapus is null and ProjectProcurement='Procurement' and b.kategori='StatusProcurement'";
         if ($divisi!='All') $str=$str." and divisi='$divisi' ";
         if ($grpsektor!='All') $str=$str." and c.group2='$grpsektor' ";

         $str=$str."union
          select a.demandid,projectprocurement,statusproject,statusprocurement,b.nama,b.group,b.Group2, statusprocurement `status`,b.kode";
         if ($grpsektor!='All') $str=$str.",c.group2 grpsektor ";
         $str=$str."  from demand a 
         left join parameter b on (b.Nama='') ";
         if ($grpsektor!='All') $str=$str."left join parameter c on (c.kategori='GroupSektor' and c.kode=a.divisi) ";
         $str=$str." where periodedemand=$periodedemand and flaghapus is null and ProjectProcurement='Procurement' and StatusProcurement='' and b.kategori='StatusKosong'";
         if ($divisi!='All') $str=$str." and divisi='$divisi' ";
         if ($grpsektor!='All') $str=$str." and c.group2='$grpsektor' ";
        }
        $str=$str.") d 
        group by d.group order by d.group";
        //print_r($str);
        $q=$this->db->query($str);
        return $q->result();
    }

    function statusgrpsektor($tahunperiode) {
        $str="select groupsektor,sum(if(groupstatus='1.No Req',jumlah,0)) noreq,
            sum(if(groupstatus='2.On Progress',jumlah,0)) onprogress,
            sum(if(groupstatus='3.Done',jumlah,0)) done,
            sum(if(groupstatus='4.Cancel / Pending',jumlah,0)) cancel,
            sum(if(groupstatus='5.Procurement',jumlah,0)) procurement,
            sum(if(groupstatus is null,jumlah,0)) kosong
            from (
            select 'Project' jenis, b.`group2` groupstatus,c.Group2 groupsektor,count(*) jumlah from demand a
            left join parameter b on b.kategori ='StatusProject' and b.nama=a.StatusProject
            left join parameter c on c.kategori ='GroupSektor' and c.kode=a.divisi
            where a.PeriodeDemand=2021 and a.FlagHapus is null and a.ProjectProcurement='Project'
            group by groupsektor,groupstatus 
            union
            select 'Procurement' jenis, '5.Procurement' groupstatus,c.Group2 groupsektor,count(*) jumlah from demand a
            left join parameter c on c.kategori ='GroupSektor' and c.kode=a.divisi
            where  a.PeriodeDemand=2021 and a.FlagHapus is null and a.ProjectProcurement='Procurement'
            group by groupsektor,groupstatus 
            ) x group by groupsektor";
        log_message('error','Query:['.$str.']');
        $q=$this->db->query($str);
        return $q->result();
    }

    function ekspektasiimplementasi($periodedemand,$jenis,$grpsektor) {
        $str="select count(*) jumlah,if(BulanEksImplementasi>=1 and BulanEksImplementasi<=3,'1',if(BulanEksImplementasi>=4 and BulanEksImplementasi<=6,'2',
            if(BulanEksImplementasi>=7 and BulanEksImplementasi<=9,'3',if(BulanEksImplementasi>=10 and BulanEksImplementasi<=12,'4',
            if(kuartalEksImplementasi<>0,kuartalEksImplementasi,'4'))))) kuartal,TahunEksImplementasi tahun from demand a ";
        if ($grpsektor!='All') $str=$str."left join parameter b on (b.kategori='GroupSektor' and b.kode=a.divisi) ";
        $str=$str." where periodedemand = $periodedemand and flaghapus is null ";
        if ($jenis=='Project') $str=$str." and ProjectProcurement='Project' ";
        if ($jenis=='Procurement') $str=$str." and ProjectProcurement='Procurement' ";
        if ($grpsektor!='All') $str=$str." and b.group2='$grpsektor' ";
        $str=$str." group by kuartal,TahunEksImplementasi
            order by TahunEksImplementasi,kuartal";
        $q=$this->db->query($str);
        return $q->result();   
    }

    function lineofbusiness($tahunperiode,$jenis,$grpsektor) {
        $str="select LOB,count(*) jumlah,c.nama from demand a";
        if ($grpsektor!='All') $str=$str." left join parameter b on (b.kategori='GroupSektor' and b.kode=a.divisi)";
        $str=$str."  left join parameter c on c.kode=a.lob
        where periodedemand=$tahunperiode and flaghapus is null ";
        if ($grpsektor!='All') $str=$str." and b.group2='$grpsektor'";
        if ($jenis!='All') $str=$str." and ProjectProcurement='$jenis'";
        $str=$str." group by LOB";
        $q=$this->db->query($str);
        return $q->result();
    }

    function jenisdemand($tahunperiode,$jenis,$grpsektor) {
        $str="select jenis,count(*) jumlah,tipe from (
            select if(jenisdemand='Carry Over','Carry Over',if(SOIN='SO','Sign Off','Insersi')) jenis, if(jenisdemand='Carry Over','CO',SOIN) tipe
            from demand a ";
        if ($grpsektor!='All') $str=$str." left join parameter b on (b.kategori='GroupSektor' and b.kode=a.divisi)";
        $str=$str."  where periodedemand=$tahunperiode and flaghapus is null ";
        if ($grpsektor!='All') $str=$str." and b.group2='$grpsektor'";
        if ($jenis!='All') $str=$str." and ProjectProcurement='$jenis'";
        $str=$str."  ) x group by jenis";
        $q=$this->db->query($str);
        return $q->result();
    }

    function statuseksp($tahunperiode,$jenis,$grpsektor) {
        $str="select '' group2,count(*) jumlah,if(BulanEksImplementasi>=1 and BulanEksImplementasi<=3,'1',if(BulanEksImplementasi>=4 and BulanEksImplementasi<=6,'2',
            if(BulanEksImplementasi>=7 and BulanEksImplementasi<=9,'3',if(BulanEksImplementasi>=10 and BulanEksImplementasi<=12,'4',
            if(kuartalEksImplementasi<>0,kuartalEksImplementasi,''))))) kuartal,TahunEksImplementasi tahun 
            from demand e";
        if ($grpsektor!='All') $str=$str." left join parameter f on (f.kategori='GroupSektor' and f.kode=e.divisi) ";
        $str=$str."  where periodedemand=$tahunperiode and flaghapus is null and ((projectprocurement='Project' and statusproject='')
        or (projectprocurement='Procurement' and statusprocurement=''))";
        if ($jenis=='Project') $str=$str." and ProjectProcurement='Project' ";
        if ($jenis=='Procurement') $str=$str." and ProjectProcurement='Procurement' ";
        if ($grpsektor!='All') $str=$str." and f.group2='$grpsektor'  ";
        $str=$str." group by tahun,kuartal 
        union
        select y.group2, if(z.demandid is null,0,count(*)) jumlah,x.kuartal,x.tahun from (
        select  '1' id, eksimplementasi,substr(eksimplementasi,2,1) kuartal,tahuneksimplementasi tahun from demand where eksimplementasi like 'Q%' group by eksimplementasi) x
        left join
        (select '1' id, group2 from parameter where kategori in ('StatusProject','StatusProcurement') group by group2 ) y on y.id=x.id
        left join 
        (select demandid,projectprocurement,statusproject,statusprocurement,b.group,b.Group2, if(projectprocurement='Project',statusproject,substring(statusprocurement,6)) `status`,b.kode,if(BulanEksImplementasi>=1 and BulanEksImplementasi<=3,'1',if(BulanEksImplementasi>=4 and BulanEksImplementasi<=6,'2',
            if(BulanEksImplementasi>=7 and BulanEksImplementasi<=9,'3',if(BulanEksImplementasi>=10 and BulanEksImplementasi<=12,'4',
            if(kuartalEksImplementasi<>0,kuartalEksImplementasi,''))))) kuartal,TahunEksImplementasi tahun
            from demand a
            left join parameter b on (b.Nama=a.StatusProject or b.Nama=substring(a.StatusProcurement,6))";
        if ($grpsektor!='All') $str=$str." left join parameter c on (c.kategori='GroupSektor' and c.kode=a.divisi) ";
        $str=$str."  where periodedemand=$tahunperiode and flaghapus is null ";
        if ($jenis=='Project') $str=$str." and a.ProjectProcurement='Project' and b.kategori='StatusProject' ";
        if ($jenis=='Procurement') $str=$str." and a.ProjectProcurement='Procurement' and b.kategori='StatusProcurement' ";
        if ($jenis=='All') $str=$str." and (b.kategori='StatusProject' or b.kategori='StatusProcurement') ";
        if ($grpsektor!='All') $str=$str." and c.group2='$grpsektor' ";
        $str=$str." group by demandid
        ) z on z.group2=y.group2 and z.kuartal=x.kuartal and z.tahun=x.tahun
        group by tahun,kuartal,group2 order by tahun,kuartal,group2";
        //log_message('error','Query:['.$str.']');
        $q=$this->db->query($str);
        return $q->result();
    }
                    
}