<?php
if(isset($_POST['submitted'])) {
	if(trim($_POST['nama']) === '') {
		$nameError = 'Please enter your name.';
		$hasError = true;
	} else {
		$nama = trim($_POST['nama']);
	}
	if(trim($_POST['hp']) === '') {
		$nameError = 'Please enter your phone number.';
		$hasError = true;
	} else {
		$hp = trim($_POST['hp']);
	}
	/*if(trim($_POST['pax']) === '') {
		$nameError = 'Please enter your phone number.';
		$hasError = true;
	} else {
		$pax = trim($_POST['pax']);
	}*/
	if(trim($_POST['tujuan']) === '') {
	$nameError = 'Please enter tujuan.';
		$hasError = true;
	} else {
		$tujuan= trim($_POST['tujuan']);
	}
	if(trim($_POST['email']) === '')  {
	$emailError = 'Please enter your email address.';
		$hasError = true;
	} else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['email']))) {
		$emailError = 'You entered an invalid email address.';
		$hasError = true;
	} else {
		$email = trim($_POST['email']);
	}
	if(trim($_POST['total']) === '') {
		$commentError = 'Please enter a message.';
		$hasError = true;
	} else {
		if(function_exists('stripslashes')) {
			$total = stripslashes(trim($_POST['total']));
		} else {
			$total = trim($_POST['total']);
		}
	}
	if(trim($_POST['total2']) === '') {
		$commentError = 'Silahkan masukan jumlah donasi.';

	//$hasError = true;
	} else {
		//if(function_exists('stripslashes')) {
		//$total2 = stripslashes(trim($_POST['total2']));
		//} else {
			$total2 = trim($_POST['total2']);
		//}
	}
	$unix = $hp-$total;
	$unix= str_replace('.', '', $unix);       // menghilangkan titik dari string harga
	$unix= str_replace(',', '', $unix); 
	$unixes = (int)$unix; 
	$date = date("l,Y-m-d H:i:s");	
	$totalis = ($total !== "total2" ? $total : $total2 );
	$toti = $totalis ;
	$wpdb->flush();
	if(!isset($hasError)) {
	//$wpdb->insert($table, $data, $format);
		$wpdb->insert(
			'donatur',
			array(
				'nama' => $nama,
				'hp' => $hp,
				'email' => $email,
				'jumlah' => $toti,
				'untuk' => $tujuan,
				'id' => $unixes,
				'times' => $date,
			),
			array(
				'%s',
				'%d'
			)
		);
	};
	if(!isset($hasError)) {
		$to = "$email";
		$subject = "[$unix] Detail donasi anda $nama untuk $tujuan";
		$headers = "From: donasi@ayopeduli.com\r\n";
		$headers .= "Reply-To: donasi@ayopeduli.com \r\n";
		$headers .= "CC: donasi@ayopeduli.com\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		$message .= "<html><head><style type='text/css'>
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
	</head>";
    $message .= "<body leftmargin='0' marginwidth='0' topmargin='0' marginheight='0' offset='0'>
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
                                            	<td width='75%' style='background:#eee'>
                                            	<img src='http://ayopeduli.com/wp-content/themes/ayopeduli/images/logo.png' style='max-width:600px;width:80px;' id='headerImage campaign-icon' mc:label='header_image' mc:edit='header_image' mc:allowdesigner mc:allowtext />
                                                </td>
                                                <td width='25%' style='background:#eee'>Jln. Cut Mutiah Blok D No.5 Rt.8/8 Margahayu Bekasi</td>
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
                                                                <h4 class='h4'>Hello $nama,</h4>
                                                                Terima kasih atas donasi anda untuk $tujuan. berikut adalah detail donasi anda :
                                                            </div>
														</td>
                                                    </tr>
                                                    <tr>
                                                    	<td valign='top' style='padding-top:0; padding-bottom:0;'>
                                                          <table border='0' cellpadding='10' cellspacing='0' width='100%' class='templateDataTable'>
                                                              <tr>
                                                                  <th scope='col' valign='top' width='25%' class='dataTableHeading' mc:edit='data_table_heading00'>
                                                                    Donasi ID : 
                                                                  </th>
                                                                  <th scope='col' valign='top' width='75%' class='dataTableHeading' mc:edit='data_table_heading01'>$unixes <td> <img src='http://quote.collivery.co.za/barcode/barcode.php?barcode=374093&width=200&height=40&text=0' alt='barcode' /></td></th>
                                                              </tr>
                                                              <tr mc:repeatable>
                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content00'>
                                                                    Date
                                                                  </td>
                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content01'>
                                                                    $date
                                                                  </td>                                                                  
                                                              </tr>
                                                              <tr mc:repeatable>
                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content00'>
                                                                    Name
                                                                  </td>
                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content01'>
                                                                    $nama
                                                                  </td>                                                                  
                                                              </tr>
                                                              <tr mc:repeatable>
                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content00'>
                                                                    HP
                                                                  </td>
                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content01'>
                                                                    $hp
                                                                  </td>                                                                  
                                                              </tr>
                                                              <tr mc:repeatable>
                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content00'>
                                                                    Email
                                                                  </td>
                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content01'>
                                                                    $email
                                                                  </td>                                                                  
                                                              </tr>
                                                              <tr mc:repeatable>
                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content00'>
                                                                    Tujuan
                                                                  </td>
                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content01'>
                                                                    $tujuan
                                                                  </td>                                                                  
                                                              </tr>
                                                              <!--<tr mc:repeatable>
                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content00'>
                                                                    Jumlah Pax
                                                                  </td>
                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content01'>
                                                                    $pax Pax
                                                                  </td>                                                                  
                                                             </tr>-->
                                                              <tr mc:repeatable>
                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content00'>
                                                                    Total
                                                                  </td>
                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content01'>
                                                                    Rp. $totalis																	
                                                                  </td>                                                                  
                                                              </tr>
                                                          </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td valign='top' class='bodyContent'>
                                                            <div mc:edit='std_content01'>
                                                                Silahkan lakukan transfer donasi anda sejumlah Rp. $totalis  ke rekening berikut :<br />
                                                               <strong>1. BCA KCP Metro Pasar Baru <br>   a.n Yayasan Solidaritas Anak Terlantar acc. 536-011-0399 dengan mencantumkan id donasi anda dalam referensi transfer donasi.</strong><br /><br />
                                                               Note : <br />
                                                               1. Silahkan konfirmasi donasi melalui sms ke no 0857 269 33 154 <br />
															   <strong>Id Donasi # Nama # Tujuan Donasi # Jumlah Donasi</strong>                                                         
                                                            </div>
														</td>
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
																<em>Copyright &copy; 2012 ayopeduli.com, All rights reserved.</em>
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
		wp_mail($to, $subject, $message, $headers);
		$emailSent = true;
	}
} ?>