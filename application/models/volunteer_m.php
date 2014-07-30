<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 
Class Volunteer_m extends CI_Model{
	public function __construct(){
		parent::__construct();
		//$this->load->helper('url');
		$this->load->database();
	}
	public function getvolun($aid = FALSE){
		if ($aid === FALSE)
		{
			$this->db->select('*');
			$this->db->from('ap_volunteer');
			$this->db->order_by('void','desc');
			//$this->db->where(array('statdon' => 0));
			//$this->db->order_by("UPPER(course_name)","desc");
			$query = $this->db->get();
			return $query->result_array();
		}	
		//$query = $this->db->get_where('ap_volunteer', array('aid' => $aid));
		$this->db->select('*');
		$this->db->from('ap_volunteer');
		$this->db->where(array('aid' => $aid));
		$this->db->join('ap_user', 'ap_volunteer.uidv = ap_user.uid');
		$query = $this->db->get();
		return $query->result_array();		
		//$uid = $query->row_array('uid');
//		$queryuap = $this->db->get_where('ap_user', array('uid'=> $uid));
//		return $queryuap->row_array();		
	}
	public function getvolunuid($uid2, $aid2){
		//$query = $this->db->get_where('ap_volunteer', array('uid' => $uid));
		$this->db->select('*');
		$this->db->from('ap_volunteer');
		$this->db->where(array('uidv' => $uid2,'aid' => $aid2));
		//$this->db->join('ap_user', 'ap_volunteer.uid = ap_user.uid');
		$query = $this->db->get();
		return $query->result_array();	
	}
	public function getvolunid($uid){
		$this->db->order_by('void','desc');
		$this->db->select('*');
		$this->db->from('ap_volunteer');
		$this->db->where(array('uidv' => $uid));
		$this->db->join('ap_aksi', 'ap_volunteer.aid = ap_aksi.aid');
		$query = $this->db->get();
		return $query->result_array();	
	}
   
	public function insert (){
		$poin = 10 ; 
		//$poin  = mysql_real_escape_string($_POST['poin']);
        $uid = mysql_real_escape_string($_POST['uid']);
		$aid  = mysql_real_escape_string($_POST['aid']); 
		$now1 = date("m/d/Y H:i:s"); 
		function autonumber($tabel, $kolom, $lebar=0, $awalan='')
			{
				$query="select $kolom from $tabel order by $kolom desc limit 1";
				$hasil=mysql_query($query);
				$jumlahrecord = mysql_num_rows($hasil);
				if($jumlahrecord == 0)
					$nomor=1;
				else
				{
					$row=mysql_fetch_array($hasil);
					$nomor=intval(substr($row[0],strlen($awalan)))+1;
				}
				if($lebar>0)
					$angka = $awalan.str_pad($nomor,$lebar,"0",STR_PAD_LEFT);
				else
					$angka = $awalan.$nomor;
				return $angka;
			}
		$void = autonumber("ap_volunteer","void",5,"VAP");
		$this->db->select('*');
		$this->db->from('ap_user');
		$this->db->where(array('uid' => $uid));
		$query = $this->db->get();
		$poin2 = $query->row_array();
		$panggilan =$poin2['fullname'];
		$emailvolun =$poin2['email'];
		$poin3 =$poin2['poin'];
		$poin4 =$poin + $poin3;
		$this->db->select('*');
		$this->db->from('ap_volunteer');
		$this->db->where(array('uidv' => $uid,'aid' => $aid));
		$query23 = $this->db->get();
		$uidsame = $query23->row_array();
		if (count($uidsame)>0){
							?>
                        	<div class="alert alert-success">Anda telah menjadi volunteer di aksi ini</div>
						<?php }else {
			$sqlvolun   = "insert into ap_volunteer (void, uidv, aid, date ) values ('$void', '$uid', '$aid', '$now1' )";
        	$query = mysql_query($sqlvolun); 
		
		$data = array(
               'poin' => $poin4,               
            );
		$this->db->where('uid', $uid);
		$this->db->update('ap_user', $data);
		//var_dump($que)
		//var_dump($query);
		//select owner aksi
		$this->db->select('*');
		$this->db->from('ap_aksi');
		$this->db->where(array('aid' => $aid));
		$queryuid = $this->db->get();
		$selectuid = $queryuid->row_array();
		$uid2 =$selectuid['uid'];
		$judul =$selectuid['judul'];
		$slug =$selectuid['slug'];
		
		$this->db->select('*');
		$this->db->from('ap_user');
		$this->db->where(array('uid' => $uid2));
		$queryuid = $this->db->get();
		$selectuid = $queryuid->row_array();
		$emailowner =$selectuid['email'];
		$panggilanowner =$selectuid['panggilan'];
		//var_dump($emailowner);
//		var_dump($panggilan);
//		var_dump($judul);
		
		//sending email
		$this->load->library('email');
    	$this->email->set_mailtype("html");
    	$email_body ="<html><head><style type='text/css'>
				#outlook a{padding:0;}
				body{width:100% !important;} .ReadMsgBody{width:100%;} .ExternalClass{width:100%;} 
				body{-webkit-text-size-adjust:none;}
				body{margin:0; padding:0;}
				img{border:0; height:auto; line-height:100%; outline:none; text-decoration:none;}
				table td{border-collapse:collapse;}
				#backgroundTable{height:100% !important; margin:0; padding:0; width:100% !important;}
				body, #backgroundTable{
					background-color:#FAFAFA;
				}
				#templateContainer{
					border: 1px solid #DDDDDD;
				}
				h1, .h1{
					color:#202020;
					display:block;
					font-family:Arial;
					font-size:34px;
					font-weight:bold;
					line-height:100%;
					margin-top:0;
					margin-right:0;
					margin-bottom:10px;
					margin-left:0;
					text-align:left;
				}
				h2, .h2{
					color:#202020;
					display:block;
					font-family:Arial;
					font-size:30px;
					font-weight:bold;
					line-height:100%;
					margin-top:0;
					margin-right:0;
					margin-bottom:10px;
					margin-left:0;
					text-align:left;
				}
				h3, .h3{
					color:#202020;
					display:block;
					font-family:Arial;
					font-size:26px;
					font-weight:bold;
					line-height:100%;
					margin-top:0;
					margin-right:0;
					margin-bottom:10px;
					margin-left:0;
					text-align:left;
				}
				h4, .h4{
					color:#202020;
					display:block;
					font-family:Arial;
					ont-size:22px;
					font-weight:bold;
					line-height:100%;
					margin-top:0;
					margin-right:0;
					margin-bottom:10px;
					margin-left:0;
					ext-align:left;
				}
				#templateHeader{
					background-color:#FFFFFF;
					border-bottom:0;
				}
				.headerContent{
					color:#202020;
					font-family:Arial;
					font-size:34px;
					font-weight:bold;
					line-height:100%;
					padding:10px;
					text-align:center;
					vertical-align:middle;
					background: none repeat scroll 0 0 #EEEEEE;
				}
				.headerContent a:link, .headerContent a:visited, .headerContent a .yshortcuts {
					color:#336699;
					font-weight:normal;
					text-decoration:underline;
				}
				#headerImage{
					height:auto;
					max-width:600px !important;
				}
				#templateContainer, .bodyContent{
					background-color:#FFFFFF;
				}
				.bodyContent div{
					color:#505050;
					font-family:Arial;
					font-size:14px;
					line-height:150%;
					text-align:left;
				}
				.bodyContent div a:link, .bodyContent div a:visited, /* Yahoo! Mail Override */ .bodyContent div a .yshortcuts /* Yahoo! Mail Override */{
					color:#336699;
					font-weight:normal;
					text-decoration:underline;
				}
				.templateDataTable{
					background-color:#FFFFFF;
					border:1px solid #DDDDDD;
				}
				.dataTableHeading{
					background-color:#D8E2EA;
					color:#336699;
					font-family:Helvetica;
					font-size:14px;
					font-weight:bold;
					line-height:150%;
					text-align:left;
				}
				.dataTableHeading a:link, .dataTableHeading a:visited, /* Yahoo! Mail Override */ .dataTableHeading a .yshortcuts /* Yahoo! Mail Override */{
					color:#FFFFFF;
					font-weight:bold;
					text-decoration:underline;
				}
				.dataTableContent{
					border-top:1px solid #DDDDDD;
					border-bottom:0;
					color:#202020;
					font-family:Helvetica;
					font-size:12px;
					font-weight:bold;
					line-height:150%;
					text-align:left;
				}
				.dataTableContent a:link, .dataTableContent a:visited, /* Yahoo! Mail Override */ .dataTableContent a .yshortcuts /* Yahoo! Mail Override */{
					color:#202020;
					font-weight:bold;
					text-decoration:underline;
				}
				.templateButton{
					-moz-border-radius:3px;
					-webkit-border-radius:3px;
					background-color:#336699;
					border:0;
					border-collapse:separate !important;
					border-radius:3px;
				}
				.templateButton, .templateButton a:link, .templateButton a:visited, /* Yahoo! Mail Override */ .templateButton a .yshortcuts /* Yahoo! Mail Override */{
					color:#FFFFFF;
					font-family:Arial;
					font-size:15px;
					font-weight:bold;
					letter-spacing:-.5px;
					line-height:100%;
					text-align:center;
					text-decoration:none;
				}
				.bodyContent img{
					display:inline;
					height:auto;
				}
				#templateFooter{
					background-color:#FFFFFF;
					border-top:0;
				}
				.footerContent div{
					color:#707070;
					font-family:Arial;
					font-size:12px;
					line-height:125%;
					text-align:center;
				}
				.footerContent div a:link, .footerContent div a:visited, /* Yahoo! Mail Override */ .footerContent div a .yshortcuts /* Yahoo! Mail Override */{
					color:#336699;
					font-weight:normal;
					text-decoration:underline;
				}
				.footerContent img{
					display:inline;
				}
				#utility{
					background-color:#FFFFFF;
					border:0;
				}
				#utility div{
					text-align:center;
				}
				#monkeyRewards img{
					max-width:190px;
				}
			</style>
		</head>
		<body leftmargin='0' marginwidth='0' topmargin='0' marginheight='0' offset='0'>
	    	<center>
	        	<table border='0' cellpadding='0' cellspacing='0' height='100%' width='100%' id='backgroundTable'>
	            	<tr>
	                	<td align='center' valign='top' style='padding-top:20px;'>
	                    	<table border='0' cellpadding='0' cellspacing='0' width='600' id='templateContainer'>
	                        	<tr>
	                            	<td align='center' valign='top'>
	                                    <!-- // Begin Template Header \\ -->
	                                	<table border='0' cellpadding='0' cellspacing='0' width='600' id='templateHeader'>
	                                        <tr>
	                                            <td class='headerContent'>
	                                            	<td width='65%' style='background:#eee'>
	                                            	<img src='http://ayopeduli.com/wp-content/themes/ayopeduli/images/logo.png' style='max-width:600px;width:80px;' id='headerImage campaign-icon' mc:label='header_image' mc:edit='header_image' mc:allowdesigner mc:allowtext />
	                                                </td>
	                                                <td width='35%' style='background:#eee'>Buat Aksi sosial dan berkolaborasilah bersama kami</td>
	                                            </td>
	                                        </tr>
	                                    </table>
	                                    <!-- // End Template Header \\ -->
	                                </td>
	                            </tr>
	                        	<tr>
	                            	<td align='center' valign='top'>
	                                    <!-- // Begin Template Body \\ -->
	                                	<table border='0' cellpadding='0' cellspacing='0' width='600' id='templateBody'>
	                                    	<tr>
	                                            <td valign='top'>
	                                                <!-- // Begin Module: Standard Content \\ -->
	                                                <table border='0' cellpadding='20' cellspacing='0' width='100%'>
	                                                    <tr>
	                                                        <td valign='top' class='bodyContent'>
	                                                            <div mc:edit='std_content00'>
	                                                                <h4 class='h4'>Hello $panggilanowner,</h4>
	                                                                Selamat, $panggilan telah bergabung menjadi volunteer di aksi (<span style='font-style:italic;'>$judul </span>) yang telah anda buat, silahkan hubungi $panggilan di kontak berikut:
	                                                            </div>
															</td>
	                                                    </tr>
	                                                    <tr>
	                                                    	<td valign='top' style='padding-top:0; padding-bottom:0;'>
	                                                          <table border='0' cellpadding='10' cellspacing='0' width='100%' class='templateDataTable'>
															  <tr mc:repeatable>
	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content00'>
	                                                                    Email
	                                                                  :</td>
	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content01'>
	                                                                    $emailvolun
	                                                                  </td>                                                       
	                                                              </tr> 
																                                                                
	                                                          </table>
	                                                        </td>
	                                                    </tr>
	                                                    <tr>
	                                                      
                                                    </tr>
	                                                </table>
	                                                <!-- // End Module: Standard Content \\ -->
	                                           </td>
	                                        </tr>
	                                    </table>
	                                    <!-- // End Template Body \\ -->
	                                </td>
	                            </tr>
	                        	<tr>
	                            	<td align='center' valign='top'>
	                                   <!-- // Begin Template Footer \\ -->
		                               	<table border='0' cellpadding='10' cellspacing='0' width='600' id='templateFooter'>
	                                	<tr>
	                                        	<td valign='top' class='footerContent'>
	                                                <!-- // Begin Module: Transactional Footer \\ -->
	                                                <table border='0' cellpadding='10' cellspacing='0' width='100%'>
	                                                    <tr>
	                                                        <td valign='top'>
	                                                            <div mc:edit='std_footer'>
																	<em>Copyright &copy; 2014 ayopeduli.com, All rights reserved.</em>
	                                                            </div>
	                                                        </td>
	                                                    </tr>
	                                                    <tr>
	                                                        <td valign='middle' id='utility'>
	                                                        </td>
	                                                   </tr>
	                                                </table>
	                                               <!-- // End Module: Transactional Footer \\ -->
	                                           </td>
	                                        </tr>
	                                    </table>
		                                  <!-- // End Template Footer \\ -->
	                                </td>
	                            </tr>
	                        </table>
	                        <br />
	                    </td>
	                </tr>
	            </table>
	        </center>
	   </body>
	</html>";
    $this->email->from('volunteer@ayopeduli.com', 'Volunteer Ayopeduli.com');
    //$list = array('user@gmail.com');
    $this->email->to($emailowner);
	$this->email->cc('gufron@ayopeduli.com');
    $this->email->subject('volunteer baru untuk aksi anda anda di ayopeduli.com');
    $this->email->message($email_body);

    $this->email->send();
	//echo $this->email->print_debugger();
		};
	}

};
