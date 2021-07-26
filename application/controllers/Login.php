<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
		parent::__construct();

		$this->load->model('loginmodel');
		$this->load->helper(array('url','text','form'));
		$this->load->library('applib');
		// $this->output->enable_profiler(TRUE);
	}

	function exception_error_handler($severity, $message, $file, $line) {
		print_r("Ini Message:");
	    print_r($message);
	    if (!(error_reporting() & $severity)) {
	        // This error code is not included in error_reporting
	        return;
	    }

	    throw new ErrorException($message, 0, $severity, $file, $line);
	}



	public function index()
	{
		$this->login();
	}

	public function login()
	{
		$this->applib->cek_session();

		$data = array('alert' => false,
			'message1' =>'',
            	'message2' =>'',
            	'npp' => '',
            	'psw' => '',
            	'title'=>'Login',
		);
		$this->load->view('login/login',$data);
	}

	public function login1_SSO()
	{

		$userid=$this->input->post('NPP');
		$password=$this->input->post('psw');

		$SearchFor=$userid;
		$SearchField="uid";

		$ldaphost="10.70.9.68";
		$ldapport=80;
		$dn="ou=accounts,o=bni,dc=co,dc=id";

		//$LDAPUser="cn=devldap;cn=Users,o=bni,dc=co,dc=id";
		//$LDAPUserPassword="devldap123";
		$LDAPUser="uid=$userid,ou=accounts,o=bni,dc=co,dc=id";
		$LDAPUserPassword="$password";
		$LDAPFieldsToFind=array("cn","mail","uid","branchalias","o","mobileuserenrolled",
			"homephoneuserenrolled","voiduserenrolled","accountstatus");

		$cnx=ldap_connect($ldaphost,$ldapport);
		ldap_set_option($cnx, LDAP_OPT_PROTOCOL_VERSION, 3);
		ldap_set_option($cnx, LDAP_OPT_REFERRALS,0);

		$r=@ldap_bind($cnx,$LDAPUser,$LDAPUserPassword); //or die("Could not bind to LDAP");
		if ($r) echo "Sukses"; else echo "gagal";
		error_reporting(E_ALL ^E_NOTICE);
		$filter="($SearchField=$SearchFor)";
		$sr=ldap_search($cnx,$dn,$filter,$LDAPFieldsToFind );
		$info=ldap_get_entries($cnx,$sr);

		$total=$info["count"];

		print_r($info);

	}

	public function login1()
	{
		$login=false;
		$this->applib->cek_session();
		date_default_timezone_set("Asia/Jakarta");
		$sekarang = date("Y-m-d H:i:s");
		$sekarang10 = date("Y-m-d H:i:s",strtotime('+10 minutes'));
        $postData = $this->input->post();
        $NPP=""; $psw="";
        if (!empty($postData['NPP'])) {$NPP=$postData['NPP'];}
        if (!empty($postData['psw'])) {$psw=$postData['psw'];}
		// $nama="Isi nama  : ".$NPP."-".$psw;        
		// echo '<script language="javascript">';
		// echo "alert('$nama')";
		// echo '</script>';
		// exit;        	
        $validate = $this->loginmodel->validate_login($NPP,$psw);
        $jml=count($validate);
        if ($jml > 0){
        	$expireuser=$validate[0]->expireuser;
        	$expirepass=$validate[0]->expirepass;

        	if ( $expireuser < $sekarang) {
				$data = array(
            	//untulsweetalert
	            	'alert' => true,
	            	'message1' =>'User sudah expired, aktifkan dari Lupa Password',
	            	'message2' =>'',
	            	'typealert'=>'error',

	            	'npp' => $postData['NPP'],
	            	'psw' => $postData['psw'],
	            	'title'=>'Login',
	            );
		        $this->load->view('login/login',$data);        		
        	} else {
	            $newdata = array(
	                'npp'     => $validate[0]->NPP,
	                'nama' => $validate[0]->Nama,
	                'kelompok' =>$validate[0]->Kelompok,
	                'divisi' => $validate[0]->Divisi,
	                'jabatan' => $validate[0]->Jabatan,
	                'admin' => $validate[0]->admin, 
	                'logged_in' => TRUE,
	                'title'=>'Login',
	            );
	            $this->session->set_userdata($newdata);

	        	//Berhasil login, dicek apakah expireuser 10 menit kedepan (dari LupaPassword)
	        	if($expireuser < $sekarang10) {
		        	$npp = $validate[0]->NPP;	
	        		$expire=date("Y-m-d H:i:s",strtotime('+3 years'));
	        		$this->loginmodel->updateexp($npp,$expire);
	        	}	

	            if ($expirepass < $sekarang ) {
	            $data=array(
					'login' => $login,
					'title'=>'Home',
					'menu'=>'Home',
	            	'alert' => true,
	            	'message1' =>'Password sudah expired, Harap ganti password Anda',
	            	'message2' =>'',
	            	'typealert'=>'error',
	            	'content' => 'home/home',
				);
	            $this->load->view('layout2/template',$data);
	        } else {
	        	$data=array(
	        		'login' => $login,
					'title'=>'Home',
					'menu'=>'Home',
	            	'alert' => false,
	            	'message1' =>'',
	            	'message2' =>'',
	            	'typealert'=>'',
	            	'content' => 'home/home',
				);
	            $this->load->view('layout2/template',$data);
	        }
            } 
        }
        else{
            $data = array(
            	//untuk sweetalert
            	'alert' => true,
            	'message1' =>'User atau Password Salah',
            	'message2' =>'',
            	'typealert'=>'error',
            	'menu'=>'',
            	'npp' => $NPP,
            	'psw' => $psw,
            	'title'=>'Login',
            );
	        $this->load->view('login/login',$data);
        }
	}

	public function logout()
	{
		session_unset();     // unset $_SESSION variable for the run-time 
		session_destroy(); 
		$data=array(
		'npp' => '',
        'psw' => '',
        'title'=>'Login',
		'menu'=>'',
		'alert' => false,
		);
        $this->load->view('login/login',$data); 
	}

	function randstr($jml){ 
		$str1 = 'ABCDEFGHIJKLMOPQRSTUVXWYZ0123456789'; 
		$jmlstr = strlen($str1); 
		$jmlstr--; 

		$hasil=NULL; 
		    for($x=1;$x<=$jml;$x++){ 
		        $posisi = rand(0,$jmlstr); 
		        $hasil .= substr($str1,$posisi,1); 
		    } 

		return $hasil; 
	} 

	

	function createmail($npp,$nama,$pass,$expire,$email)
	{
	
    $from = "progo@bni.co.id";
    $to = "$email";

    $headers = "From:" . $from ."\n";
    $headers .= "MIME-Version: 1.0\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\n";

    $subject = "Password Aplikasi Pro-Go";
    
    $message = "<html><body style=\"font-family: -system-ui,-apple-system,BlinkMacSystemFont,segoe ui,Roboto,Helvetica,Arial,sans-serif,apple color emoji,segoe ui emoji,segoe ui symbol;\">";
    $message .= "<p>Dear <strong> $nama </strong>, <br><br>";
    $message .= "Terima kasih karena sudah mengakses aplikasi Pro-Go.. <br>";
    $message .= "Berikut kami disampaikan user login dan password aplikasi Pro-Go Anda : <br></p>";
    $message .= "<table style=\"font-family: -system-ui,-apple-system,BlinkMacSystemFont,segoe ui,Roboto,Helvetica,Arial,sans-serif,apple color emoji,segoe ui emoji,segoe ui symbol;\">";
    $message .= "<tr><td></td><td>Login</td><td>:</td><td><strong>$npp</strong></td></tr>";
    $message .= "<tr><td></td><td>Password</td><td>:</td><td><strong>$pass</strong><td></tr>";
    $message .= "<tr><td></td><td>Berlaku sampai</td><td>:</td><td><strong>$expire</strong><td></tr>";
    $message .= "</table>";
    $message .= "<br><p>Password ini hanya sementara, dan harus langsung diganti lagi setelah Anda ";
    $message .= "berhasil login. <br>";
    $message .= "Harap password digunakan sebelum masa berlakunya berakhir. ";
    $message .= "Jika masa berlakunya sudah berakhir, ";
    $message .= "harus dilakukan aktivasi/forgot password lagi.<br><br></p>";

    $message .= "Salam Hangat, <br>";
    $message .= "Admin Pro-Go <br>";
    $message .= "</body> </html>";

    if(!is_dir("assets/mail")){
	    mkdir("assets/mail", 0755);
	}

    $namafile = "$npp-".date("YmdHis").".txt";
    $myfile = fopen("assets/mail/$namafile", "w") or die("Unable to open file!");
	fwrite($myfile, "To:$to\n");
	fwrite($myfile, "Subject:$subject\n");
	fwrite($myfile, "Header:$headers\n");
	fwrite($myfile, "Message:$message\n");
	fclose($myfile);

	$success=true;
	error_reporting(0);
    $success=mail($to,$subject,$message, $headers);

    print_r($success);
    if ($success) print_r("Ini Sukses\n");
    if (!$success) {
    	$errorMessage = error_get_last();
    	print_r(error_get_last());
    }

    
    return $success;
	}

	public function forgot()
	{
		$this->applib->cek_session();
		$data=array(
			'title'=>'Lupa Password',
			'alert' => false,
			'message1' =>'',
            'message2' =>'',
            'npp' => '',
            'psw' => '',
		);
        $this->load->view('login/forgot',$data);
	}

	public function forgot1()
	{
		$message = '';
		$error = '';
		$npp=$this->input->post('NPP');

		$result=$this->loginmodel->getuserbynpp2($npp);
		if ($result->num_rows() > 0) {
			foreach ($result->result_array() as $row) {
				$nama=$row['Nama'];
				$email=$row['email'];
			};

			if ($email != NULL ) {
				$pass=$this->randstr(6);
				date_default_timezone_set("Asia/Jakarta");
				$sekarang = date("Y-m-d H:i:s");
				$expire = date("Y-m-d H:i:s",strtotime('+10 minutes'));
				$expire1 = date("d-m-Y H:i:s",strtotime($expire));

				$result = $this->loginmodel->gantipwd2($npp,$pass,$sekarang,$expire);


				if ($result <= 0) {
					$message = 'Gagal update database';
					$error='error';
				} else {
					$success=$this->createmail($npp,$nama,$pass,$expire1,$email);
					if ($success) {
						$message="Password sudah dikirim ke email $email. Mohon dicek email tsb..";
						$error= 'success';
					} else {
						$message="Gagal kirim Password via Email";
						$error= 'error';
					}
				}
			} else {
				$message = 'Email tidak terdaftar';
				$error='error';
			}
			
		} else {
			$message = 'User tidak ada di database';
			$error='error';
		}

		$data=array(
			'title'=>'Lupa Password`',
			);
		$data = array('alert' => true,
				'message1' =>$message,
            	'message2' =>'',
            	'typealert'=>$error,
            	'npp' => '',
            	'psw' => '',
            	'title'=>'Lupa Password',
		);
        $this->load->view('login/forgot',$data);
	}

	public function profile()
	{
		$this->applib->cek_session();
		$userid=$this->session->userdata('npp');
		if ($userid!='') {
			$month=date("m", strtotime($this->config->item('tglhrini')));
			$year=date("Y", strtotime($this->config->item('tglhrini')));

	
			$profile=$this->loginmodel->profile($userid,$month,$year);

			$data=array(
				'title'=>'Profile',
				'menu'=>'Login,Profile',
				'alert' => false,
				'message1' =>'',
	        	'message2' =>'',
	        	'npp' => '',
	        	'psw' => '',
	        	'userid' => $userid,
	        	'dataprofile' => $profile,
			);
	        $this->load->view('login/profile',$data);
		    
		}
	}

	public function do_upload(){
		$userid=$this->session->userdata('npp');
		$namafile=$_FILES["userfile"]["name"];
		$imageFileType = strtolower(pathinfo($namafile,PATHINFO_EXTENSION));
		$namafilebaru=$userid.'.'.$imageFileType;
		// $nama="Isi nama  : ".$namafile."-".$imageFileType.'-'.$namafilebaru;        
		// echo '<script language="javascript">';
		// echo "alert('$nama')";
		// echo '</script>';
		// exit;
		$path="assets/img/";
		if (file_exists($path.$userid.".jpg")) unlink($path.$userid.".jpg");
		if (file_exists($path.$userid.".png")) unlink($path.$userid.".png");
		if (file_exists($path.$userid.".gif")) unlink($path.$userid.".gif"); 
		
		$config = array(
			'upload_path' => "./assets/img/",
			'allowed_types' => "gif|jpg|png",
			'overwrite' => TRUE,
			'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			'max_height' => "768",
			'max_width' => "1024",
		);

		//$namafile=$userid.file_ext

		$config['file_name']=$namafilebaru;
		$this->load->library('upload', $config);
		if($this->upload->do_upload('userfile'))
		{
			//$data = array('upload_data' => $this->upload->data());
			header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
			header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
			header("Cache-Control: no-store, no-cache, must-revalidate");
			header("Cache-Control: post-check=0, pre-check=0", false);
			header("Pragma: no-cache");
			//$this->profile();
			$error='';
		}
		else
		{
			$error = array('error' => $this->upload->display_errors());
			
		}
		echo json_encode($error); 
	}

}
