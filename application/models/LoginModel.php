<?php

class LoginModel extends CI_Model{
	
	function  __construct(){

		parent::__construct();
	}
	
    function validate_login($npp,$psw){
        $this->db->select('*');
        $this->db->where('NPP', $npp);
        $this->db->where('password', md5($psw));
        $this->db->from('user');
        $query=$this->db->get();
        return $query->result();
    }

	function updateexp($npp,$expire){
 		$q=$this->db->query("update user set expireuser = '$expire' where npp = '$npp'");
		return $this->db->affected_rows();
    }

    function getuserbynpp($npp){
        $q=$this->db->query("select npp from user where npp = '$npp'");
        return $q->num_rows();
    }

    function getuserbynpp2($npp){
        $q=$this->db->query("select * from user where npp = '$npp'");
        return $q;
    }

    function gantipwd($npp,$pwd){
        date_default_timezone_set("Asia/Jakarta");
        $expire= date("Y-m-d H:i:s",strtotime('+1 years'));
        
        $pwd1=md5($pwd);
        $q=$this->db->query("update user set password = '$pwd1',expirepass='$expire' 
            where npp = '$npp'");
        return $this->db->affected_rows();
    }

    function gantipwd2($npp,$pwd,$sekarang,$expire){
        $pwd1=md5($pwd);
        $q=$this->db->query("update user set password = '$pwd1', expirepass = '$sekarang',
            expireuser = '$expire' where npp = '$npp'");
        return $this->db->affected_rows();
    }


    
}