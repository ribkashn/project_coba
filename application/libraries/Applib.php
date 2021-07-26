<?php 
class Applib  extends CI_Controller{

private $ci; 

function __construct()
    {
    	//parent::__construct();
        $this->ci =& get_instance();    // get a reference to CodeIgniter.
        //$this->load->helper('url');
        //$this->load->library('session');
    }

    function cekmenu($menuid,$allowed,$notallowed,$divisi,$kelompok) 
    {
    	if ($allowed=='all') $akses=true;
    	else if ($allowed) {
			$akses=false;
			$arrayallowed=explode(",", $allowed);
			if (in_array($divisi.'-*',$arrayallowed)) $akses=true;
			if (in_array($divisi.'-'.$kelompok,$arrayallowed)) $akses=true;
		} else if ($notallowed=='all') $akses=false;
		else if ($notallowed) {
			$akses=true;
			$arraynotallowed=explode(",", $notallowed);
			if (in_array($divisi.'-*',$arraynotallowed)) $akses=false;
			if (in_array($divisi.'-'.$kelompok,$arraynotallowed)) $akses=false;
		}

    	return $akses;
    }


	function build_menu($menu,$divisi,$kelompok)
    {
        $html_out='';
 	    $query = $this->ci->db->query("select * from menu where parent = 0 order by urut");
 	    $arraymenu=explode(",", $menu);

 	    foreach ($query->result() as $row) {
 	    	if (in_array($row->menu, $arraymenu)) {$menuopen="menu-open";
 	    	$aktif="active";} else {$menuopen="";$aktif="";}
 	    	$akses=$this->cekmenu($row->id,$row->allowed,$row->notallowed,$divisi,$kelompok);
 	    	$link=base_url("$row->url")."?id=".$row->id;
 	    	if (!$akses) $link="javascript:void(0)";

 	    	$html_out .= "\t<li class=\"nav-item has-treeview $menuopen\">\n";
 	    	$html_out .= "\t\t<a href=\"$link\" class=\"nav-link nav-progo $aktif disable\">\n";
 	    	$html_out .= "\t\t\t<i class=\"nav-icon fas $row->icon\"></i>\n";
 	    	$html_out .= "\t\t\t<p> $row->menu\n";
            $html_out .= "\t\t\t\t<i class=\"right fas fa-angle-left\"></i>\n";
            $html_out .= "\t\t\t</p>\n";
            $html_out .= "\t\t</a>\n";

            $html_out .= $this->get_childs($row->id,$menu,$divisi,$kelompok);
            $html_out .= "\t</li>\n";
 	    }
 	 return $html_out;  
 	    
	}

	function get_childs($id,$menu,$divisi,$kelompok) {

		$html_out='';
		$arraymenu=explode(",", $menu);

		$query = $this->ci->db->query("select * from menu where parent = $id");

		if ($query->num_rows() >0 ) {
			$html_out .="\t\t<ul class=\"nav nav-treeview\">\n";
			foreach ($query->result() as $row) {
				if (in_array($row->menu, $arraymenu)) {$aktif="active";} 
 	    			else {$aktif="";}
 	    		$akses=$this->cekmenu($row->id,$row->allowed,$row->notallowed,$divisi,$kelompok);
 	    		$link=base_url("$row->url")."?id=".$row->id;
 	    		if (!$akses) $link="javascript:void(0)";

				$html_out .="\t\t\t<li class=\"nav-item\">\n";
				$html_out .="\t\t\t<a href=\"$link\" class=\"nav-link nav-progo $aktif\">\n";
				$html_out .="\t\t\t<i class=\"far $row->icon nav-icon\"></i>\n";
				$html_out .="\t\t\t<p>$row->menu</p></a></li>\n";
			}
			$html_out .="\t\t</ul>\n";
		}
		return $html_out;
	}


	function cek_session() {
		$status=0;
		if (is_null($this->ci->session->userdata('nama'))) {
			$status = 1; //harus login dulu
		}
		if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
		    // last request was more than 30 minutes ago
		    $nama=$this->ci->session->userdata('nama');
		    session_unset();     // unset $_SESSION variable for the run-time 
		    session_destroy();   // destroy session data in storage
		    if(!empty($nama))  $status=1;
		}
		$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp

		if (!isset($_SESSION['CREATED'])) {
		    $_SESSION['CREATED'] = time();
		} else if (time() - $_SESSION['CREATED'] > 1800) {
		    // session started more than 30 minutes ago
		    session_regenerate_id(true);    // change session ID for the current session and invalidate old session ID
		    $_SESSION['CREATED'] = time();  // update creation time
		}
		return $status;
	}

	function kewenangan_menu() {
		if (isset($_GET['id'])) $menu_id=$_GET['id']; else $menu_id=0;
		$error = 0;

		if (is_null($this->ci->session->userdata('nama'))) {
			$error = 1; //harus login dulu
		} else {

			$npp=$this->ci->session->userdata('npp');
			$result = $this->ci->profilemodel->getuserbynpp2($npp);
			foreach ($result->result_array() as $row) {
				$groupmenu=$row['Jabatan'];
			};

			$result = $this->ci->profilemodel->val_menu($menu_id,$groupmenu);
			if ($result <= 0) {
				$error = 2; // tidak berwenang akses menu
			} 
		}

		if ($error<>0){
			if ($error == 1){
				$errormsg = 'Harap Anda login dulu';
			}
			if ($error == 2){
				$errormsg = 'Kewenangan menu Anda tidak cukup untuk akses menu ini';
			}

			$data=array(
				'title'=>'Tidak berwenang',
				'menu'=>'',
				'alert' => false,
				'errormsg' =>$errormsg,
			);
			$this->ci->load->view('tdkberwenang',$data);
		};

		return $error;
	}
	

}