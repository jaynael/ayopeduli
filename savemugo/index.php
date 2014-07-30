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
	if(trim($_POST['paket']) === '') {
	$nameError = 'Please pilih paket.';
		$hasError = true;
	} else {
		$tujuan= trim($_POST['paket']);
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
	$messages = $_POST['message'];
	
	//$unixes = (int)$unix; 
	$date = date("l,Y-m-d H:i:s");
	
	//$wpdb->flush();
	//require_once('../../../wp-load.php');
	
	if(!isset($hasError)) {
	//$wpdb->insert($table, $data, $format);		
	//};
	//if(!isset($hasError)) {
		$to = "$email";
		$subject = "informasi Pendaftaran anda $nama, di event #RUNFORMUGO ";
		$headers = "From: Panitia #RUNFORMUGO donasi@ayopeduli.com\r\n";
		$headers .= "Reply-To: gufron@ayopeduli.com \r\n";
		$headers .= "CC: gufron@ayopeduli.com, tifadtami@gmail.com\r\n";
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
                                                <td width='25%' style='background:#eee'></td>
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
                                                                Terima kasih atas pendaftaran anda untuk #RUNFORMUGO. berikut adalah detail pendaftaran anda :
                                                            </div>
														</td>
                                                    </tr>
                                                    <tr>
                                                    	<td valign='top' style='padding-top:0; padding-bottom:0;'>
                                                          <table border='0' cellpadding='10' cellspacing='0' width='100%' class='templateDataTable'>
                                                              
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
                                                                    Total biaya
                                                                  </td>
                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content01'>
                                                                    $tujuan
                                                                  </td>                                                                  
                                                              </tr>
															  <tr mc:repeatable>
                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content00'>
                                                                    Pesan
                                                                  </td>
                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content01'>
                                                                    $messages
                                                                  </td>                                                                  
                                                              </tr>
                                                              
                                                          </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td valign='top' class='bodyContent'>
                                                            <div mc:edit='std_content01'>
                                                                Silahkan lakukan transfer pendaftaran anda sejumlah Rp. $tujuan ke rekening panitia #runformugo ayopeduli.com berikut :<br />
                                                               <strong>1. BCA a.n Jaenul Khupron acc. 1330-165-592  dengan mencantumkan email anda dalam referensi transfer donasi.</strong><br /><br />
                                                               Note : <br />
                                                               1. Silahkan konfirmasi pembayaran melalui sms ke no 0812 149 399 54 <br />
															   <strong>Jumlah # email # Nama </strong><br>
															   2. Pembayaran bisa dilakukan di tempat, Car Free Day Bekasi, Jln. A.Yani Bekasi, datang saja di booth ayopeduli.com untuk melakukan pendaftaran.                                                         
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
		mail($to, $subject, $message, $headers);
		$emailSent = true;
	}
} ?>
<!DOCTYPE HTML>
<!--
	Overflow 1.1 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>#RUNFORMUGO | Aksi sosial penyelamatan lingkungan Muara Gembong</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
        <link rel="shortcut icon" href="http://ayopeduli.com/wp-content/uploads/2013/08/Icon-150x150.png"/>
		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,300italic" rel="stylesheet" type="text/css" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.poptrox.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/init.js"></script>
        <noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
		</noscript>
        <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "ur-c9939f88-d0e3-ab30-58ad-2b115ce0f930", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>
	<body>
		<?php if(isset($emailSent) && $emailSent == true) { ?>
        	<div class="beres" style="width: 50%;margin: 58px auto -116px;background: #BCF;color: #fff;border: 1px solid #fff;border-radius: 13px;">
               <p style="padding: 10px;text-align: center;">Terima Kasih, Pendaftaran anda telah kami terima, mohon periksa email anda jika belum silahkan hubungi kami di No. 081214939954</p>
            </div>
        
        <?php } else { ?>							
        	<?php if(isset($hasError) || isset($captchaError)) { ?>
            <div class="error btn-warning" style="width: 50%;margin: 58px auto -116px;background: #ccc;color: #fff;border: 1px solid #fff;border-radius: 13px;">
               <p style="padding: 10px;text-align: center;">Maaf pendaftaran anda gagal terkirim, silahkan isi kembali form donasi dengan benar</p>
            </div>
            <?php } 
          }?>
		<!-- Header -->
			<section id="header">
				<header>
					<h1>#RunforMUGO</h1>
					<p>Collaborate to better life in Muara Gembong</p>
				</header>
				<footer>
					<a href="#banner" class="button style2 scrolly">Beritahu kami lebih jauh</a>
				</footer>
			</section>
		
		<!-- Banner -->
			<section id="banner">
				<header>
					<h2>#RUNFORMUGO</h2>
				</header>
				<p>Ini adalah sebuah aksi ungkapan kami akan kecintaan terhadap lingkungan kami,<br> Muara Gembong saat ini sedang mengalami kondisi kritis dan membutuhkan dukungan kita untuk lebih baik.<br> Dengan berlari anda telah menyumbangkan sedikit semangat untuk menyelamatkan muara gembong<br> dari abrasi laut yang dapat melenyapkan lingkungan kami.</p>
				<footer>
					<a href="#first" class="button style2 scrolly">Act on this message</a>
				</footer>
			</section>
		
		<!-- Feature 1 -->
			<article id="first" class="container box style1 right">
				<a href="http://ineedchemicalx.deviantart.com/art/Time-goes-by-too-fast-335982438" class="image full"><img src="https://fbcdn-sphotos-f-a.akamaihd.net/hphotos-ak-frc1/994961_788522664510712_75797535_n.jpg" alt="" /></a>
				<div class="inner">
					<header>
						<h2>Berlari<br />
						Setiap langkah adalah dukungan</h2>
					</header>
					<p>Setiap langkah anda akan membantu kami untuk terus bergerak dalam penyelamatan aksi #SAVEMUGO</p>
				</div>
			</article>
		
		<!-- Feature 2 -->
			<article class="container box style1 left">
				<a href="#" class="image full"><img src="images/viral.jpg" alt="" /></a>
				<div class="inner">
					<header>
						<h2>Agar mereka <br />
						terus tersenyum</h2>
					</header>
					<p>Kebahagiaan mereka adalah semangat kami, agar mereka dapat berangkat kesekolah dengan nyaman tanpa perlu bermusuhan dengan banjir rob yang selalu menggenang.</p>
				</div>
			</article>
            
            <!-- Feature 3 -->
			<article id="first" class="container box style1 right">
				<a href="#" class="image full"><img src="images/lingkungan.jpg" alt="" /></a>
				<div class="inner">
					<header>
						<h2>Agar generasi<br />
						Selanjutnya dapat menikmati </h2>
					</header>
					<p>Muara Gembong adalah warisan alam yang perlu kita lestarikan untuk dapat dinikmati oleh generasi selanjutnya, STOP pembalakan liar dan perusakan lingkungan, Jaga dan bersahabatlah dengan alam.</p>
				</div>
			</article>
            
		
		<!-- Portfolio -->
			<article class="container box style2">
				<header>
					<h2>#RUNFORMUGO</h2>
					<span>Akan dilaksanakan hari Minggu, 22 Desember 2013</span><br>
                    <span>Di</span>
                    <span>Car Free Day Bekasi - Summarecon Mall</span>
				</header>
				<div class="inner gallery">
					<div class="row flush">
						<div class="3u"><a href="#" class="image full"><img src="images/logo mal summarecon.jpg" alt="" title="Mall Bekasi" /></a></div>
                        <div class="3u"><a href="#" class="image full"><img src="images/bga.jpg" alt="" title="@BGreenAttack" /></a></div>
						<div class="3u"><a href="#" class="image full"><img src="images/ap.jpg" alt="" title="@ayopeduli" /></a></div>
                        <div class="3u"><a href="#" class="image full"><img src="images/paragembel.jpg" alt="" title="@para_gembel" /></a></div>
                        <!--<div class="3u"><a href="#" class="image full"><img src="https://pbs.twimg.com/profile_images/412931825221136384/5KYehWJ-.jpeg" alt="" title="@youngontop" /></a></div>
                       
						
					</div>
					<!--<div class="row flush">
						<div class="3u"><a href="#" class="image full"><img src="images/bga.jpg" alt="" title="@BGreenAttack" /></a></div>
						<div class="3u"><a href="#" class="image full"><img src="images/ap.jpg" alt="" title="@ayopeduli" /></a></div>
						<div class="3u"><a href="images/fulls/07.jpg" class="image full"><img src="images/thumbs/07.jpg" alt="" title="History was made here" /></a></div>
						<div class="3u"><a href="images/fulls/08.jpg" class="image full"><img src="images/thumbs/08.jpg" alt="" title="People come and go and walk away" /></a></div>
					</div>-->
				</div>
			</article>
		
		<!-- Contact -->
			<article class="container box style3">
				<header>
					<h2>Bergabunglah dalam Aksi #RUNFORMUGO</h2>
					<span>Daftarkan diri anda dan teman-teman anda dengan mengisi form dibawah ini</span>
				</header>
                <div id="message_ajax"></div>
				<form action="" method="post">
					<div class="row half">
						<div class="6u"><input type="text" class="text" name="nama" placeholder="Nama" /></div>
						<div class="6u"><input type="text" class="text" name="email" placeholder="Email" /></div>
                        <div class="6u">
                        	<select class="text" name="paket" />
                            	<option value="0">Pilih paket pendaftaran kelompok</option>
                            	<option value="Rp.15.000">Paket 3 Donasi Rp. 15.000</option>
                                <option value="Rp.25.000">Paket 5 Donasi Rp. 25.000</option>
                                <option value="Rp.50.000">Paket 10 Donasi Rp. 50.000</option>
                        	</select>
                        </div>
                        <div class="6u"><input type="text" class="text" name="hp" placeholder="No Handphone" /></div>
					</div>
					<div class="row half">
						<div class="12u">
							<textarea name="message" placeholder="Isikan Nama Pendaftar dengan koma, contoh : Alex, Nando, Vivi"></textarea>
						</div>
					</div>
					<div class="row">
						<div class="12u">
							<ul class="actions">
								<li><button type="submit" class="button form" id="submit" name="submit">Gabung sekarang</button></li>
                                <input type="hidden" name="submitted" id="submitted" value="true" />
							</ul>
						</div>
					</div>
				</form>
			</article>
		
		<!-- Generic -->
		<!--
			<article class="container box style3">
				<header>
					<h2>Generic Box</h2>
					<p>Just a generic box. Nothing to see here.</p>
				</header>
				<section>
					<header>
						<h3>Paragraph</h3>
						<p>This is a byline</p>
					</header>
					<p>Phasellus nisl nisl, varius id <sup>porttitor sed pellentesque</sup> ac orci. Pellentesque 
					habitant <strong>strong</strong> tristique <b>bold</b> et netus <i>italic</i> malesuada <em>emphasized</em> ac turpis egestas. Morbi 
					leo suscipit ut. Praesent <sub>id turpis vitae</sub> turpis pretium ultricies. Vestibulum sit 
					amet risus elit.</p>
				</section>
				<section>
					<header>
						<h3>Blockquote</h3>
					</header>
					<blockquote>Fringilla nisl. Donec accumsan interdum nisi, quis tincidunt felis sagittis eget.
					tempus euismod. Vestibulum ante ipsum primis in faucibus.</blockquote>
				</section>
				<section>
					<header>
						<h3>Divider</h3>
					</header>
					<p>Donec consectetur <a href="#">vestibulum dolor et pulvinar</a>. Etiam vel felis enim, at viverra 
					ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel. Praesent nec orci 
					facilisis leo magna. Cras sit amet urna eros, id egestas urna. Quisque aliquam 
					tempus euismod. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices 
					posuere cubilia.</p>
					<hr />
					<p>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra 
					ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel. Praesent nec orci 
					facilisis leo magna. Cras sit amet urna eros, id egestas urna. Quisque aliquam 
					tempus euismod. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices 
					posuere cubilia.</p>
				</section>
				<section>
					<header>
						<h3>Unordered List</h3>
					</header>
					<ul class="default">
						<li>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</li>
						<li>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</li>
						<li>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</li>
						<li>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</li>
					</ul>
				</section>
				<section>
					<header>
						<h3>Ordered List</h3>
					</header>
					<ol class="default">
						<li>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</li>
						<li>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</li>
						<li>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</li>
						<li>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</li>
					</ol>
				</section>
				<section>
					<header>
						<h3>Table</h3>
					</header>
					<div class="table-wrapper">
						<table class="default">
							<thead>
								<tr>
									<th>ID</th>
									<th>Name</th>
									<th>Description</th>
									<th>Price</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>45815</td>
									<td>Something</td>
									<td>Ut porttitor sagittis lorem quis nisi ornare.</td>
									<td>29.99</td>
								</tr>
								<tr>
									<td>24524</td>
									<td>Nothing</td>
									<td>Ut porttitor sagittis lorem quis nisi ornare.</td>
									<td>19.99</td>
								</tr>
								<tr>
									<td>45815</td>
									<td>Something</td>
									<td>Ut porttitor sagittis lorem quis nisi ornare.</td>
									<td>29.99</td>
								</tr>
								<tr>
									<td>24524</td>
									<td>Nothing</td>
									<td>Ut porttitor sagittis lorem quis nisi ornare.</td>
									<td>19.99</td>
								</tr>
							</tbody>
							<tfoot>
								<tr>
									<td colspan="3"></td>
									<td>100.00</td>
								</tr>
							</tfoot>
						</table>
					</div>
				</section>
				<section>
					<header>
						<h3>Form</h3>
					</header>
					<form method="post" action="#">
						<div class="row">
							<div class="6u">
								<input class="text" type="text" name="name" id="name" value="" placeholder="John Doe" />
							</div>
							<div class="6u">
								<input class="text" type="text" name="email" id="email" value="" placeholder="johndoe@domain.tld" />
							</div>
						</div>
						<div class="row">
							<div class="12u">
								<select name="department" id="department">
									<option value="">Choose a department</option>
									<option value="1">Manufacturing</option>
									<option value="2">Administration</option>
									<option value="3">Support</option>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="12u">
								<input class="text" type="text" name="subject" id="subject" value="" placeholder="Enter your subject" />
							</div>
						</div>
						<div class="row">
							<div class="12u">
								<textarea name="message" id="message" placeholder="Enter your message"></textarea>
							</div>
						</div>
						<div class="row">
							<div class="12u">
								<ul class="actions">
									<li><a href="#" class="button form">Submit</a></li>
									<li><a href="#" class="button style3 form-reset">Clear Form</a></li>
								</ul>
							</div>
						</div>
					</form>
				</section>
			</article>
		-->
        




		
		<section id="footer">
			<ul class="icons">
				<span class='st_facebook_hcount' displayText='Facebook'></span>
				<span class='st_twitter_hcount' displayText='Tweet'></span>
			</ul>
			<div class="copyright">
				<ul class="menu">
					<li>&copy; <a href="ayopeduli.com">ayopeduli.com</a>. All rights reserved.</li>					
				</ul>
			</div>
		</section>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-5095553-5']);
  _gaq.push(['_setDomainName', 'ayopeduli.com']);
  _gaq.push(['_setAllowLinker', true]);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
	</body>
</html>