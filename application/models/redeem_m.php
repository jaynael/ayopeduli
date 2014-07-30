<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 
Class Redeem_m extends CI_Model{
	public function __construct(){
		parent::__construct();
		//$this->load->helper('url');
		$this->load->database();
	}
	public function poin($uid, $alamat, $item){
		$alamatlengkap = $alamat;
		$this->db->select('*');
		$this->db->from('ap_user');
		$this->db->where(array('uid' =>$uid));
		$query = $this->db->get();
		$em = $query->row_array();
		$poin = $em['poin'];
		$nama = $em['fullname'];
		$now1 = date("m/d/Y H:i:s");
		//update to poin user
		$this->db->select('*');
		$this->db->from('ap_product');
		$this->db->where(array('promid' =>$item));
		$query = $this->db->get();
		$em = $query->row_array();
		$poinpro = $em['poin'];
		//$namaproduct = $em['product'];
		//var_dump($uid);
		if ($poin > $poinpro){
		//insert to redeem db
			$dataredeem = array(
				'stat' => 0,
				'uidreed' => $uid,
				'promid' => $item,
				'alamat' => $alamat,
				'time' => $now1,
				'poin' => $poinpro
			);
			$this->db->insert('ap_redeem', $dataredeem);
			$poinupdate = $poin - $poinpro;
			$data = array(
				   'poin' => $poinupdate,               
				);
			$this->db->where('uid', $uid);
			$this->db->update('ap_user', $data);
			//email to donatur :
		//$this->load->library('email');
//    	$this->email->set_mailtype("html");
//    	$email_body ="<html><head><style type='text/css'>
//				#outlook a{padding:0;}
//				body{width:100% !important;} .ReadMsgBody{width:100%;} .ExternalClass{width:100%;} 
//				body{-webkit-text-size-adjust:none;}
//				body{margin:0; padding:0;}
//				img{border:0; height:auto; line-height:100%; outline:none; text-decoration:none;}
//				table td{border-collapse:collapse;}
//				#backgroundTable{height:100% !important; margin:0; padding:0; width:100% !important;}
//				body, #backgroundTable{
//					background-color:#FAFAFA;
//				}
//				#templateContainer{
//					border: 1px solid #DDDDDD;
//				}
//				h1, .h1{
//					color:#202020;
//					display:block;
//					font-family:Arial;
//					font-size:34px;
//					font-weight:bold;
//					line-height:100%;
//					margin-top:0;
//					margin-right:0;
//					margin-bottom:10px;
//					margin-left:0;
//					text-align:left;
//				}
//				h2, .h2{
//					color:#202020;
//					display:block;
//					font-family:Arial;
//					font-size:30px;
//					font-weight:bold;
//					line-height:100%;
//					margin-top:0;
//					margin-right:0;
//					margin-bottom:10px;
//					margin-left:0;
//					text-align:left;
//				}
//				h3, .h3{
//					color:#202020;
//					display:block;
//					font-family:Arial;
//					font-size:26px;
//					font-weight:bold;
//					line-height:100%;
//					margin-top:0;
//					margin-right:0;
//					margin-bottom:10px;
//					margin-left:0;
//					text-align:left;
//				}
//				h4, .h4{
//					color:#202020;
//					display:block;
//					font-family:Arial;
//					ont-size:22px;
//					font-weight:bold;
//					line-height:100%;
//					margin-top:0;
//					margin-right:0;
//					margin-bottom:10px;
//					margin-left:0;
//					ext-align:left;
//				}
//				#templateHeader{
//					background-color:#FFFFFF;
//					border-bottom:0;
//				}
//				.headerContent{
//					color:#202020;
//					font-family:Arial;
//					font-size:34px;
//					font-weight:bold;
//					line-height:100%;
//					padding:10px;
//					text-align:center;
//					vertical-align:middle;
//					background: none repeat scroll 0 0 #EEEEEE;
//				}
//				.headerContent a:link, .headerContent a:visited, .headerContent a .yshortcuts {
//					color:#336699;
//					font-weight:normal;
//					text-decoration:underline;
//				}
//				#headerImage{
//					height:auto;
//					max-width:600px !important;
//				}
//				#templateContainer, .bodyContent{
//					background-color:#FFFFFF;
//				}
//				.bodyContent div{
//					color:#505050;
//					font-family:Arial;
//					font-size:14px;
//					line-height:150%;
//					text-align:left;
//				}
//				.bodyContent div a:link, .bodyContent div a:visited, /* Yahoo! Mail Override */ .bodyContent div a .yshortcuts /* Yahoo! Mail Override */{
//					color:#336699;
//					font-weight:normal;
//					text-decoration:underline;
//				}
//				.templateDataTable{
//					background-color:#FFFFFF;
//					border:1px solid #DDDDDD;
//				}
//				.dataTableHeading{
//					background-color:#D8E2EA;
//					color:#336699;
//					font-family:Helvetica;
//					font-size:14px;
//					font-weight:bold;
//					line-height:150%;
//					text-align:left;
//				}
//				.dataTableHeading a:link, .dataTableHeading a:visited, /* Yahoo! Mail Override */ .dataTableHeading a .yshortcuts /* Yahoo! Mail Override */{
//					color:#FFFFFF;
//					font-weight:bold;
//					text-decoration:underline;
//				}
//				.dataTableContent{
//					border-top:1px solid #DDDDDD;
//					border-bottom:0;
//					color:#202020;
//					font-family:Helvetica;
//					font-size:12px;
//					font-weight:bold;
//					line-height:150%;
//					text-align:left;
//				}
//				.dataTableContent a:link, .dataTableContent a:visited, /* Yahoo! Mail Override */ .dataTableContent a .yshortcuts /* Yahoo! Mail Override */{
//					color:#202020;
//					font-weight:bold;
//					text-decoration:underline;
//				}
//				.templateButton{
//					-moz-border-radius:3px;
//					-webkit-border-radius:3px;
//					background-color:#336699;
//					border:0;
//					border-collapse:separate !important;
//					border-radius:3px;
//				}
//				.templateButton, .templateButton a:link, .templateButton a:visited, /* Yahoo! Mail Override */ .templateButton a .yshortcuts /* Yahoo! Mail Override */{
//					color:#FFFFFF;
//					font-family:Arial;
//					font-size:15px;
//					font-weight:bold;
//					letter-spacing:-.5px;
//					line-height:100%;
//					text-align:center;
//					text-decoration:none;
//				}
//				.bodyContent img{
//					display:inline;
//					height:auto;
//				}
//				#templateFooter{
//					background-color:#FFFFFF;
//					border-top:0;
//				}
//				.footerContent div{
//					color:#707070;
//					font-family:Arial;
//					font-size:12px;
//					line-height:125%;
//					text-align:center;
//				}
//				.footerContent div a:link, .footerContent div a:visited, /* Yahoo! Mail Override */ .footerContent div a .yshortcuts /* Yahoo! Mail Override */{
//					color:#336699;
//					font-weight:normal;
//					text-decoration:underline;
//				}
//				.footerContent img{
//					display:inline;
//				}
//				#utility{
//					background-color:#FFFFFF;
//					border:0;
//				}
//				#utility div{
//					text-align:center;
//				}
//				#monkeyRewards img{
//					max-width:190px;
//				}
//			</style>
//		</head>
//		<body leftmargin='0' marginwidth='0' topmargin='0' marginheight='0' offset='0'>
//	    	<center>
//	        	<table border='0' cellpadding='0' cellspacing='0' height='100%' width='100%' id='backgroundTable'>
//	            	<tr>
//	                	<td align='center' valign='top' style='padding-top:20px;'>
//	                    	<table border='0' cellpadding='0' cellspacing='0' width='600' id='templateContainer'>
//	                        	<tr>
//	                            	<td align='center' valign='top'>
//	                                    <!-- // Begin Template Header \\ -->
//	                                	<table border='0' cellpadding='0' cellspacing='0' width='600' id='templateHeader'>
//	                                        <tr>
//	                                            <td class='headerContent'>
//	                                            	<td width='65%' style='background:#eee'>
//	                                            	<img src='http://ayopeduli.com/wp/wp-content/themes/ayopeduli/images/logo.png' style='max-width:600px;width:80px;' id='headerImage campaign-icon' mc:label='header_image' mc:edit='header_image' mc:allowdesigner mc:allowtext />
//	                                                </td>
//	                                                <td width='35%' style='background:#eee'>Buat Aksi sosial dan berkolaborasilah bersama kami</td>
//	                                            </td>
//	                                        </tr>
//	                                    </table>
//	                                    <!-- // End Template Header \\ -->
//	                                </td>
//	                            </tr>
//	                        	<tr>
//	                            	<td align='center' valign='top'>
//	                                    <!-- // Begin Template Body \\ -->
//	                                	<table border='0' cellpadding='0' cellspacing='0' width='600' id='templateBody'>
//	                                    	<tr>
//	                                            <td valign='top'>
//	                                                <!-- // Begin Module: Standard Content \\ -->
//	                                                <table border='0' cellpadding='20' cellspacing='0' width='100%'>
//	                                                    <tr>
//	                                                        <td valign='top' class='bodyContent'>
//	                                                            <div mc:edit='std_content00'>
//	                                                                <h4 class='h4'>Hello Admin,</h4>
//	                                                                Berikut saya infomasikan ada penukaran redeem baru di ayopeduli.com:
//	                                                            </div>
//															</td>
//	                                                    </tr>
//	                                                    <tr>
//	                                                    	<td valign='top' style='padding-top:0; padding-bottom:0;'>
//	                                                          <table border='0' cellpadding='10' cellspacing='0' width='100%' class='templateDataTable'>															  
//																<tr mc:repeatable>
//	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content00'>
//	                                                                    Dari
//	                                                                  :</td>
//	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content01'>
//	                                                                    $nama
//	                                                                  </td>                                                       
//	                                                              </tr>
//															<tr mc:repeatable>
//	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content00'>
//	                                                                    Redeem dengan
//	                                                                  :</td>
//	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content01'>
//	                                                                    $namaproduct
//	                                                                  </td>                                                       
//	                                                       </tr>
//														   <tr mc:repeatable>
//	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content00'>
//	                                                                    Dikirim ke
//	                                                                  :</td>
//	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content01'>
//	                                                                    $alamatlengkap
//	                                                                  </td>                                                       
//	                                                       </tr>
//														   <tr mc:repeatable>
//	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content00'>
//	                                                                    Poin yang di redeem
//	                                                                  :</td>
//	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content01'>
//	                                                                   $poinpro
//	                                                                  </td>                                                       
//	                                                       </tr> 
//														   <tr mc:repeatable>
//	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content00'>
//	                                                                    Poin sisa
//	                                                                  :</td>
//	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content01'>
//	                                                                    $poinupdate
//	                                                                  </td>                                                       
//	                                                       </tr> 
//																                                                                
//	                                                          </table>
//	                                                        </td>
//	                                                    </tr>
//	                                                    <tr>
//	                                                      
//                                                    </tr>
//	                                                </table>
//	                                                <!-- // End Module: Standard Content \\ -->
//	                                           </td>
//	                                        </tr>
//	                                    </table>
//	                                    <!-- // End Template Body \\ -->
//	                                </td>
//	                            </tr>
//	                        	<tr>
//	                            	<td align='center' valign='top'>
//	                                   <!-- // Begin Template Footer \\ -->
//		                               	<table border='0' cellpadding='10' cellspacing='0' width='600' id='templateFooter'>
//	                                	<tr>
//	                                        	<td valign='top' class='footerContent'>
//	                                                <!-- // Begin Module: Transactional Footer \\ -->
//	                                                <table border='0' cellpadding='10' cellspacing='0' width='100%'>
//	                                                    <tr>
//	                                                        <td valign='top'>
//	                                                            <div mc:edit='std_footer'>
//																	<em>Copyright &copy; 2014 ayopeduli.com, All rights reserved.</em>
//	                                                            </div>
//	                                                        </td>
//	                                                    </tr>
//	                                                    <tr>
//	                                                        <td valign='middle' id='utility'>
//	                                                        </td>
//	                                                   </tr>
//	                                                </table>
//	                                               <!-- // End Module: Transactional Footer \\ -->
//	                                           </td>
//	                                        </tr>
//	                                    </table>
//		                                  <!-- // End Template Footer \\ -->
//	                                </td>
//	                            </tr>
//	                        </table>
//	                        <br />
//	                    </td>
//	                </tr>
//	            </table>
//	        </center>
//	   </body>
//	</html>";
//    $this->email->from('donasi@ayopeduli.com', 'Donasi Ayopeduli.com');
//    //$list = array('user@gmail.com');
//    $this->email->to('gufron@ayopeduli.com');
//    $this->email->subject('Redeem Poin di ayopeduli.com');
//    $this->email->message($email_body);
//
//    $this->email->send();
			
		}else{
			$datas = array(
			'title' =>'Redeem Poin Kamu!',
			'error' => 'Mohon maaf, Poin kamu tidak cukup untuk me-redeem dengan product ini, silahkan tingkatkan poin kamu dengan berdonasi dan jadi volunteer Aksi.',
			'alamat' => $alamat,
			'kota' => $kota,
			'pos' => $pos
			);
			//$this->load->view('sangkur', $data);			
			 $session_data = $this->session->userdata('logged_in');
			 $data['email'] = $session_data['email'];
			 $email= $data['email'];
			 $data['uid'] = $session_data['uid'];
			 $uid2= $data['uid'];
			 //var_dump($uid);
			 $this->load->model(array('user_m'));
			 $datas['user_item'] = $this->user_m->getuser($email);
			 //$datas['namanya'] = $datas['user_item']['fullname'] ;
			 $datas['donasi_user'] = $this->user_m->getdonasi($uid2);
			 $datas['aksi_user'] = $this->user_m->getaksi($uid);
			 //$datas['title'] = $datas['user_item']['fullname'] ;
			 $this->load->model(array('partner_m'));
			$datas['product'] = $this->partner_m->getproduct();	
			 $datas['title'] = 'halaman profile' ;	 
				if (empty($datas['user_item']))
					{
						redirect('home');
					}
			$this->load->view('header', $datas);
			$this->load->view('profile/my-profile_v', $datas);
			$this->load->view('footer'); 
		}
		//var_dump($poinupdate);		
	}
	
};
