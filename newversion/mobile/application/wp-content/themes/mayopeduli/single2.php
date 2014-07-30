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
<?php get_header(); ?> 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.countdown.js"></script>
<script type="text/javascript">
$(function () {
	var austDay = new Date(<?php $key = "tglakhir";$tglakhir = get_post_meta($post->ID, $key, true);if (!$tglakhir){ ?>2013,3-1,20 <?php }else{ ?><?php echo $tglakhir ?><?php } ?>);
	//austDay = new Date(austDay.getFullYear() + 1, 1 - 1, 26);
	//austDay = new Date(2013,3,02);
	$('#defaultCountdown').countdown({until: austDay});
	$('#year').text(austDay.getFullYear());
});
</script>
<style type="text/css">
@import "<?php echo get_template_directory_uri(); ?>/css/jquery.countdown.css";

</style>            
        <div class="entry"> 
        

                                <div id="container">
                    
                                    <?php if(have_posts()) : ?>
                                    <?php while(have_posts()) : the_post(); ?>
                    
                                        <div class="post" id="post-<?php the_ID(); ?>">
                	 <?php if(isset($emailSent) && $emailSent == true) { ?>
                        <div class="thanks btn btn-primary" style="display: block;margin: 0px 0px 10px;font-size: 17px;">
                          <p style="padding: 10px;text-align: center;">Terima kasih <?php echo "$nama"; ?>, donasi anda akan segera kami proses. detail donasi telah kami kirimkan ke email <?php echo " $email ";?>, silahkan cek inbox ataupun folder spam:</p>

                            <table width="697" border="2" style="font-size:12px; text-align:left;" bordercolorlight="#FFFFFF">
                              <tr>
                               <td width="142">Tujuan Donasi</td>
	                             <td width="537">: <?php the_title()  ?></td>
                              </tr>
	                          <tr>
`                               <td>Total Donasi</td>
`                               <td>:  Rp. <?php echo $totalis //if ($total != 'total2'){
//												echo $total;
//										}else{
//											echo $total2;
//										}; ?></td>
                              </tr>
                              <tr>
                                <td>Tujuan Rek. Donasi</td>
                                <td>: <strong>1. BCA KCP Metro Pasar Baru <br />  a.n Yayasan Solidaritas Anak Terlantar acc. 536-011-0399</strong></td>
                              </tr>
                              <tr>
                                <td>No. HP anda</td>
                                <td>: <?php echo "$hp"; ?></td>
                              </tr>
                              <tr>
                                <td>Donasi ID</td>
                                <td>: <?php echo "$unixes"; ?></td>
                              </tr>
                            </table>
                        </div>
                        <?php } else { ?>							
                        <?php if(isset($hasError) || isset($captchaError)) { ?>
                        <div class="error btn-warning">
                            <p style="padding: 10px;text-align: center;">Maaf donasi anda gagal terkirim, silahkan isi kembali form donasi dengan benar</p>
                        </div>
                        <?php } 
                    }?>	
                    	<div class="title">
                        	<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                            <?php if ( in_category( array( 'sobat', 'yayasan', 'program' ) )) { ?>
                            <div id="donasi-infoin">
                                <div class="do">
                                    <p class="figure"><?php $key = "donasi";
                                                                            $donasi = get_post_meta($post->ID, $key, true);
                                                                            if (!$donasi){
                                                                            echo "Rp.0";
                                                                            }else{
                                                                            echo "Rp. $donasi ";
                                                                            }
                                                                        ?></p>
                                    <p class="minor">donasi Terkumpul</p>
                                </div>
                                <div class="sekarang">
                                    <a href="#donasi">Bantu Donasi</a>
                                </div>
                            </div>     
                             <?php }?>
                            <div class="image">
                             <?php 				
									if(has_post_thumbnail()) { ?>
										<a href="<?php the_permalink(); ?>" > <?php the_post_thumbnail('300,300');?></a>
									<?php } else { ?>
                                    	<a href="<?php the_permalink(); ?>" > <?php echo '<img src="'.get_bloginfo("template_url").'/images/img-default.png" />'; ?> </a>
										<!--//echo '<img src="'.get_bloginfo("template_url").'/images/img-default.png" />';-->
									<?php }
									?>
                            </div><!--3nd .image-->
                          	<div class="content"><?php the_content(); ?></div>
                        </div>   
                        <?php if ( in_category( array( 'sobat', 'yayasan', 'program' ) )) { ?>
                            <div id="donasi-infoin">
                                <div class="do">
                                    <p class="figure"><div id="defaultCountdown"></div></p>
                                    <p class="minor">Project akan berakhir</p>
                                </div>
                            </div>     
                             <?php }?> 
                        <div class="date">
                             Posted on <?php the_time('F j, Y') ?>
                        </div>    
                                              	
                    <br clear="all" />
                    <div class="info">
                            <div class="box" id="donasi">
                                    <a class="boxclose" id="boxclose"></a>
                                    <h1>Bantu Donasi Sekarang</h1>
                                    <p>Silahkan Mengisi form ini untuk memberikan donasi kepada <?php the_title(); ?> </p>
                                    <form class="form form-horizontal" id="form1" method="post" action="<?php the_permalink(); ?>">
                                        <div class="control-group">
                                            <label class="control-label" for="inputNama">Nama</label>
                                            <div class="controls">
                                              <input type="text" id="name" name="nama" placeholder="Nama anda">
                                            </div>
                                        </div>
                                       <div class="control-group">
                                            <label class="control-label" for="inputHp">Hp</label>
                                            <div class="controls">
                                                <input type="text" id="handphone" name="hp" placeholder="Nomer Handphone">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="inputEmail">Email</label>
                                            <div class="controls">
                                                <input type="text"  name="email" placeholder="Email" class="validate[required,custom[email]] text-input" id="email"/>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="inputEmail">Jumlah Donasi Rp.</label>
                                            <div class="controls">
                                            	<select name="total" class="total" id="total" value="<?php $key = "harga";$harga = get_post_meta($post->ID, $key, true);if(!$harga){ ?><?php }else{ ?><?php echo $harga ?><?php } ?>">
                                            		<option value="10.<?php $key = "idproject";
											$idproject = get_post_meta($post->ID, $key, true);
											if (!$idproject){ ?>
											000 
											<?php }else{ ?><?php echo $idproject ?> 
											<?php } ?>">10.<?php $key = "idproject";
											$idproject = get_post_meta($post->ID, $key, true);
											if (!$idproject){ ?>
											000 
											<?php }else{ ?><?php echo $idproject ?> 
											<?php } ?></option>
                                            		<option value="20.<?php $key = "idproject";
											$idproject = get_post_meta($post->ID, $key, true);
											if (!$idproject){ ?>
											000 
											<?php }else{ ?><?php echo $idproject ?> 
											<?php } ?>">20.<?php $key = "idproject";
											$idproject = get_post_meta($post->ID, $key, true);
											if (!$idproject){ ?>
											000 
											<?php }else{ ?><?php echo $idproject ?> 
											<?php } ?></option>
                                            		<option value="30.<?php $key = "idproject";
											$idproject = get_post_meta($post->ID, $key, true);
											if (!$idproject){ ?>
											000 
											<?php }else{ ?><?php echo $idproject ?> 
											<?php } ?>">30.<?php $key = "idproject";
											$idproject = get_post_meta($post->ID, $key, true);
											if (!$idproject){ ?>
											000 
											<?php }else{ ?><?php echo $idproject ?> 
											<?php } ?></option>
                                            		<option value="40.<?php $key = "idproject";
											$idproject = get_post_meta($post->ID, $key, true);
													if (!$idproject){ ?>
											000 
											<?php }else{ ?><?php echo $idproject ?> 
											<?php } ?>">40.<?php $key = "idproject";
											$idproject = get_post_meta($post->ID, $key, true);
											if (!$idproject){ ?>
											000 
											<?php }else{ ?><?php echo $idproject ?> 
											<?php } ?></option>
                                           		<option value="50.<?php $key = "idproject";
											$idproject = get_post_meta($post->ID, $key, true);
											if (!$idproject){ ?>
											000 
											<?php }else{ ?><?php echo $idproject ?> 
											<?php } ?>">50.<?php $key = "idproject";
											$idproject = get_post_meta($post->ID, $key, true);
											if (!$idproject){ ?>
											000 
											<?php }else{ ?><?php echo $idproject ?> 
											<?php } ?></option>
                                         		<option value="60.<?php $key = "idproject";
											$idproject = get_post_meta($post->ID, $key, true);
											if (!$idproject){ ?>
											000 
											<?php }else{ ?><?php echo $idproject ?> 
											<?php } ?>">60.<?php $key = "idproject";
											$idproject = get_post_meta($post->ID, $key, true);
											if (!$idproject){ ?>
											000 
											<?php }else{ ?><?php echo $idproject ?> 
											<?php } ?></option>
                                          		<option value="70.<?php $key = "idproject";
											$idproject = get_post_meta($post->ID, $key, true);
											if (!$idproject){ ?>
											000 
											<?php }else{ ?><?php echo $idproject ?> 
											<?php } ?>">70.<?php $key = "idproject";
											$idproject = get_post_meta($post->ID, $key, true);
											if (!$idproject){ ?>
											000 
											<?php }else{ ?><?php echo $idproject ?> 
											<?php } ?></option>
                                          		<option value="80.<?php $key = "idproject";
											$idproject = get_post_meta($post->ID, $key, true);
											if (!$idproject){ ?>
											000 
											<?php }else{ ?><?php echo $idproject ?> 
											<?php } ?>">80.<?php $key = "idproject";
											$idproject = get_post_meta($post->ID, $key, true);
											if (!$idproject){ ?>
											000 
											<?php }else{ ?><?php echo $idproject ?> 
											<?php } ?></option>
                                          		<option value="90.<?php $key = "idproject";
											$idproject = get_post_meta($post->ID, $key, true);
											if (!$idproject){ ?>
											000 
											<?php }else{ ?><?php echo $idproject ?> 
											<?php } ?>">90.<?php $key = "idproject";
											$idproject = get_post_meta($post->ID, $key, true);
											if (!$idproject){ ?>
											000 
											<?php }else{ ?><?php echo $idproject ?> 
											<?php } ?></option>
                                           		<option value="100.<?php $key = "idproject";
											$idproject = get_post_meta($post->ID, $key, true);
											if (!$idproject){ ?>
											000 
											<?php }else{ ?><?php echo $idproject ?> 
											<?php } ?>">100.<?php $key = "idproject";
											$idproject = get_post_meta($post->ID, $key, true);
											if (!$idproject){ ?>
											000 
											<?php }else{ ?><?php echo $idproject ?> 
											<?php } ?></option>
                                           		<option value="total2">Jumlah lainnya</option>
                                           	</select>
                                              <!--<input type="text" name="total" class="total" value="<?php // $key = "harga";$harga = get_post_meta($post->ID, $key, true);if(!$harga){ ?><?php // }else{ ?><?php // echo $harga ?><?php // } ?>" />-->
                                             <input type="hidden" name="harga" class="harga" value="<?php // $key = "harga";
	                                         //$harga = get_post_meta($post->ID, $key, true); 
                                             //if (!$harga){ ?>
                                            <?php // }else{ ?><?php // echo $harga ?> 
                                            <?php // } ?>" />
                                                <input type="hidden" name="tujuan" value="<?php the_title(); ?>">
                                            </div>
                                        </div>
                                        <div class="control-group" id="total3">
                                            <label class="control-label" for="inputEmail"></label>
                                            <div class="controls">                                           		
                                             	<input type="text" name="total2" id="total2" class="totals" placeholder="tambahkan angka <?php $key = "idproject";
											$idproject = get_post_meta($post->ID, $key, true);
											if (!$idproject){ ?>
											000 
											<?php }else{ ?><?php echo $idproject ?>
											<?php } ?>"  />	
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <div class="controls">
                                                <!--<input class="btn btn-primary" name="submitted" type="submit" value="Submit" id="send" />-->
                                                <button class="btn btn-primary" type="submit">Kirim Donasi</button>
                                            </div>
                                        </div>
                                        <input type="hidden" name="submitted" id="submitted" value="true" />
                                    </form>
                                </div>

                    <?php // comments_template(); ?>
                                        </div>                    
                    
                                    <?php endwhile; ?>
                   
                                    <?php endif; ?>
                                    
                                </div>
         
         <div id="fb-root"></div> 
						<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>  
                        <fb:comments href="<?php the_permalink(); ?>" width="775"></fb:comments>
        
        </div> <!--entry-->
   		
  
        <?php get_sidebar(); ?>

        <?php get_footer(); ?>        