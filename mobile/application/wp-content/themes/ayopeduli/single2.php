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
	//$wpdb->flush();
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
	//};
	//if(!isset($hasError)) {
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
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.waterwheelCarousel.js"></script>



<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.validationEngine-en.js" type="text/javascript"></script>



<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.validationEngine.js" type="text/javascript"></script>



<script>



	$(document).ready(function() {				



	// SUCCESS AJAX CALL, replace "success: false," by:     success : function() { callSuccessFunction() }, 



			//$('#box').hide();



			$('#total2').hide();



			$('#total').change(function(){		



				$('.totals').hide();		



				$('#' + $(this).val()).show();



			});



			$('#activator').click(function(){



				$('#overlay').fadeIn('fast',function(){



					$('#box').animate({'top':'120px'},500);



				});



			});



			$('#boxclose').click(function(){



				$('#box').animate({'top':'-430px'},500,function(){



					$('#overlay').fadeOut('fast');



				});



			});



			$('#overlay').click(function(){



				$('#box').animate({'top':'-430px'},500,function(){



					$('#overlay').fadeOut('fast');



				});



			});



		$("#form1").validationEngine({



			ajaxSubmit: true,



			ajaxSubmitFile: "<?php bloginfo('template_directory'); ?>/ajaxSubmit.php",



			ajaxSubmitMessage: "Terima kasih atas donasi anda, kami akan segera menghubungi anda untuk proses selanjutnya  !!",



			success :  false,



			failure : function() {alert('Fail to submit')}



			})



		$('.box').hide();



		$('.active').hide();



		$('#dropdown').change(function() {



			$('.box').hide();



			$('.active').hide();



			//$('#div' + $(this).val()).show();



			$('#' + $(this).val()).show('slide');



		});	



		$("#waterwheel-carousel-flat").waterwheelCarousel({



				itemSeparationFactor: 1,



				itemDecreaseFactor: 1,



				waveSeparationFactor: 1,



				startingWaveSeparation: 0,



				startingItemSeparation: 280,



				centerOffset: 10,



				opacityDecreaseFactor: .3,



				autoPlay: 3000,



				edgeReaction: 'reverse'



			});			



	});



</script>



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

#defaultCountdown { width: 273px; height: 45px; padding: 15px 0px 0px; }

</style>



<!--<script type="text/javascript" src="<?php// bloginfo('template_directory'); ?>/js/contact-form.js"></script>-->



<div id="content">
    	<div class="wrapper content-home">
            <?php if (have_posts()):
    		the_post(); ?>
            <div id="single">      
                <div class="right">
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
                	<div class="post">                    	
                    	<h1><?php the_title(); ?></h1>
                        <!--<div id="tabs2">
                        	<ul>
                            	<li><a href="#tabs-1" title="">Tab 1</a></li>
                                <li><a href="#tabs-2" title="">Tab 2</a></li>
                                <li><a href="#tabs-3" title="">Tab 3</a></li>
                            </ul>
                        
                                <div id="tabs_container">
                                <div id="tabs-1">
                                        <p>Proin elit arcu, rutrum commodo, vehicula tempus, commodo a, risus. Curabitur nec arcu. Donec sollicitudin mi sit amet mauris. Nam elementum quam ullamcorper ante. Etiam aliquet massa et lorem. Mauris dapibus lacus auctor risus.</p><p>Aenean tempor ullamcorper leo. Vivamus sed magna quis ligula eleifend adipiscing. Duis orci. Aliquam sodales tortor vitae ipsum. Aliquam nulla. Duis aliquam molestie erat. Ut et mauris vel pede varius sollicitudin. Sed ut dolor nec orci tincidunt interdum. Phasellus ipsum. Nunc tristique tempus lectus.</p>
                                </div>
                        
                                <div id="tabs-2">
                                        <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor.</p>
                            
                                </div>
                        
                                <div id="tabs-3">
                                        <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem.</p><p> Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales.</p>
                                </div>
                        
                                </div><!--End tabs container--
                                
                            </div><!--End tabs-->

                        <p>Date post : <?php the_time('F jS, Y') ?></p>
                        <div class="info">
                        	<div class="overlay" id="overlay" style="display:none;"></div> 
                            <div class="box" id="box">
                                    <a class="boxclose" id="boxclose"></a>
                                    <h2>Bantu dengan donasi :</h2>
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
                                                <input type="hidden" name="pid" value="<?php $key = "idproject";$idproject = get_post_meta($post->ID, $key, true);if (!$idproject){ ?>000<?php }else{ ?><?php echo $idproject ?>											<?php } ?>">
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
                            <?php // endif; ?>
                         <!--<div class="modal" id="donasi">
                                    <div class="modal-header">
                                    <button class="close" id="close-donasi" >×</button>
                                    <h2>Form Donasi Ayopeduli.com</h2>
                                    </div> 
                                    <div class="modal-body">
                                    <form class="form" id="form1" method="post" action="">
                               			<div class="modal-body">
                                        	<ul class="forms">
                                            	<li><label for="name">Name</label>
                                                	<input type="text" name="name"  class="validate[required,custom[onlyLetter],length[0,100]] text-input" id="name" placeholder="Nama anda"/>
                                            	</li>
                                                <li><label for="email">email</label>
                                                    <input type="text" placeholder="Email" name="email" class="validate[required,custom[email]] text-input" id="email"/>
    	                                             <input type="hidden" name="untuk" id="untuk" value="<?php the_title(); ?>" />
                                                   <input type="hidden" name="link" id="link" value="<?php the_permalink(); ?>" />
                                                </li>
                                                <li><label for="email">No. Hp</label>
                                                   <input type="text" placeholder="No. Hp" name="hp" class=" text-input" id="hp"/>
                                                </li>
                                            	<li><label for="contactName">Jumlah Donasi</label>                                     
													<div class="input-prepend">
                                                    	<span class="add-on">Rp.</span>
                                                    	<!--<input id="prependedInput" name="web" placeholder="masukan jumlah donasi" class="span2" type="text" size="16">
                                                        <select name="web" id="dropdown">
                                                        	<option value="min0">--pilih range donasi--</option> 
                                                            <option value="min1">Rp.50.000 - Rp.200.000</option>        
                                                            <option value="min2">Rp.200.000 - Rp.300.000</option>        
                                                            <option value="min3">Rp.300.000 - Rp.500.000</option>        
                                                            <option value="min4">Rp.500.000 - Rp.1.000.000</option>
                                                            <option value="min5">Lainnya</option>        
                                                        </select>                                                        
	                                                      <div id="min1" class="active">
                                                      	Reward<br /> mug cantik                                                        
                                                        </div>
                                                        <div id="min2" class=" active">
                                                        	Reward <br /> topi keren                                                       
                                                        </div>
                                                        <div id="min3" class="active">
                                                        	Reward <br />payung ayopeduli                                                        
                                                        </div>
                                                        <div id="min4" class="active">
                                                        	Reward <br />kaos ayopeduli                                                        
                                                        </div>
                                                        <div id="min5" class="active">
                                                        	masukan jumlah lengkapnya<br />
                                                        	<input id="prependedInput" name="jml" value="0" placeholder="masukan jumlah donasi" class="span2" type="text" size="16">                                                     
                                                        </div>
                                                      <div id="min0" class="wewe">
                                                        </div>
                                                	</div>
                                            	</li>
                                                <!--<li><label for="contactName">Pembayaran</label>    
                                                    <select name="via">
                                                        <option>Donasi Via</option>
                                                        <option>BCA (1330-16-5592)</option>
                                                        <option>BRI</option>
                                                        <option>Paypal</option>
                                                    </select>
                                                </li>
                                                <li class="textarea"><label for="commentsText">Alamat</label>
                                                    <textarea name="text" class="validate[required,length[6,300]] text-input" id="comment" cols="30" rows="5"></textarea>
                                                </li>
                                                <li><input class="btn btn-primary" type="submit" value="Submit" id="send" /></li>
                                            </ul>
                                    </div>
                                    <!--<div class="modal-footer">                                          
                                   </div>
                                   </form> 
                                   	</div>
                                    </div>
                                    <div class="modal" id="konfirmasi">
                                    	<div class="modal-header">
                                    		<button class="close" id="close-konfirmasi" >×</button>
                                    		<h2>Konfirmasi Donasi Ayopeduli.com</h2>
                                   	 	</div>
                                     	<form action="<?php the_permalink(); ?>" id="contactForm" method="post">
                               			 	<div class="modal-body">
                                        		<ul class="forms">
                                            		<li><label for="contactName">Name</label>
                                                	<input type="text" name="contactName" placeholder="Nama anda" id="contactName"  class="requiredField" />
                                            		</li>
                                                    <li><label for="contactName">Jumlah Donasi</label> 
                                                        <div class="input-prepend">
                                                            <span class="add-on">Rp.</span>
                                                           <input id="prependedInput" placeholder="masukan jumlah donasi" class="span2" type="text" size="16">        
                                                        </div>        
                                                    </li>
                                                    <li><label for="contactName">Pembayaran</label>
                                                        <select name="via">
                                                            <option>Donasi Via</option>        
                                                            <option>BCA (1330-16-5592)</option>        
                                                            <option>BRI</option>        
                                                            <option>Paypal</option>        
                                                        </select>        
                                                    </li>         
                                                    <li><label for="contactName">No.Hp</label>        
                                                        <input id="prependedInput" name="hp" placeholder="No.hp" class="span2" type="text" size="16">        
                                                   </li>     
                                                    <li><label for="email">email</label>
                                                        <input type="text" placeholder="Email" name="email" id="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="requiredField email" />        
                                                        <input type="hidden" name="untuk" id="untuk" value="<?php the_permalink(); ?>" />        
                                                    </li>
                                                    <li class="textarea"><label for="commentsText">Alamat</label>
        



                                                        <textarea name="comments" placeholder="Alamat anda" id="commentsText" rows="5" cols="30" class="requiredField"><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>        



                                                    </li>        



                                                    <!--<li class="inline" style="display:none"><input type="checkbox" name="sendCopy" id="sendCopy" checked="checked" value="true"<?php // if(isset($_POST['sendCopy']) && $_POST['sendCopy'] == true) echo ' checked="checked"'; ?> /><label for="sendCopy">Send a copy of this email to yourself</label></li>



        



                                                   <!-- <li class="screenReader"><label for="checking" class="screenReader">If you want to submit this form, do not enter anything in this field</label><input type="text" name="checking" id="checking" class="screenReader" value="<?php // if(isset($_POST['checking']))  echo $_POST['checking'];?>" /></li>-->



        



                                                    <!--<li class="buttons"><input type="hidden" name="submitted" id="submitted" value="true" /><button type="submit">Email me &raquo;</button></li>



        



                                                    <li><label></label><input class="btn btn-primary" type="submit" value="Submit" id="send" /></li>



        



                                                </ul>        



                                            </div>



                                    	</form> 







                                    </div>-->



                            <div class="image">
                             <?php 				
									if(has_post_thumbnail()) { ?>
										<a href="<?php the_permalink(); ?>" > <?php the_post_thumbnail('post-single');?></a>
									<?php } else { ?>
                                    	<a href="<?php the_permalink(); ?>" > <?php echo '<img src="'.get_bloginfo("template_url").'/images/img-default.png" />'; ?> </a>
										<!--//echo '<img src="'.get_bloginfo("template_url").'/images/img-default.png" />';-->
									<?php }
									?>
                            </div><!--3nd .image-->
                    		<?php 
							the_content(); ?>

							<?php $key = "donatur";

							$donatur = get_post_meta($post->ID, $key, true);

							if (!$donatur){ ?>

							<?php }else{ ?>

							<div class="info-donasi">

								<div class="kiri">Donasi per <?php echo date('l jS F Y'); ?></div>

								<div class="kanan"><marquee behavior="scroll" direction="left"><?php echo $donatur ?></marquee></div>

								<div class="clearfix"></div>

							</div> 

							<?php } ?>

                        </div><!--nd info-->



                        <?php $args = array(



							'walker'            => null,



							'style'             => 'ul',



							'callback'          => null,



							'end-callback'      => null,



							'type'              => 'all',



							'page'              => 2,



							'per_page'          => 5,



							'avatar_size'       => 32,



							'reverse_top_level' => null,



							 ); ?>



                            <div class="commentlist"><?php wp_list_comments(array('style' => 'div')); ?></div>

						

                        <?php endif; ?>

						<div class="tweet" style="margin:15px 0px;">

                        	<a href="https://twitter.com/share" class="twitter-share-button" data-via="ayopeduli" data-size="large" data-dnt="true">Tweet</a>

<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

                        </div>

                        <div id="fb-root"></div>  



						<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>  



                        <fb:comments href="<?php the_permalink(); ?>" width="775"></fb:comments> 



                    </div><!--end post-->

                    



                </div><!--end right-->



                <div class="left">



                	<div class="widget profile affix" data-spy="affix" data-offset-top="50">



                    <div class="widget-popular donasi" style="margin: -15px 0px 3px;" >



                    <?php if (in_category( array( 'sobat','sobat-3', 'yayasan','yayasan-2', 'program','program-2' ) )) { ?>	



                        	<h2 class="widget-title">Donasi</h2>



                            <div class="widget-content">



                            	<div id="angel" class="donate">



                            	<div class="text" style="text-align:center;"> 



                                	Donasi yang telah terkumpul sebanyak 



									<div class="nominal"> <?php $key = "donasi";



											$donasi = get_post_meta($post->ID, $key, true);



											if (!$donasi){ ?>



											Rp.0 



											<?php }else{ ?>



											Rp. <?php echo $donasi ?> 



											<?php } ?>



                                     </div>



                                </div>



                                <div class="field-donate" style="width: 115px;margin: 9px auto;">

                                        <a class="btn btn-primary" data-toggle="modal" id="activator">Bantu Donasi</a>

										

                                        <!--<a class="btn btn-info" data-toggle="modal" id="tab-konfirmasi">Konfirmasi Donasi</a>-->



                                </div>                                



                               	<p style="text-align:center;">Sertakan angka <strong><?php $key = "idproject";

											$idproject = get_post_meta($post->ID, $key, true);

											if (!$idproject){ ?>

											000 

											<?php }else{ ?><?php echo $idproject ?> 

											<?php } ?></strong> dalam donasi anda ex. 50.000 menjadi 50.<?php echo $idproject ?> sebagai penanda donasi anda ke rekening BCA KCP Metro Pasar Baru <br>   <strong>a.n Yayasan Solidaritas Anak Terlantar acc. 536-011-0399</strong>

                               	</p>

                                <div class="clearfix"></div>



                            </div>



                            </div>



                        </div><!--end widget popular-->

                        	<h2 class="widget-title">Fasilitator by  </h2>







							<a class="title"><?php echo get_the_author(); ?> </a>







                        <?php }else{ ?> 

<div class="widget">
							<h2 class="widget-title">Donasi</h2>
							<div class="nominal" style="text-align:center;margin:30px auto; font-size:20px;"> <?php $key = "donasi";



											$donasi = get_post_meta($post->ID, $key, true);



											if (!$donasi){ ?>



											Rp.0 



											<?php }else{ ?>



											Rp. <?php echo $donasi ?> 



											<?php } ?>



                                     </div>


</div>

                    		<h2 class="widget-title">Kontributor by</h2>







							<a class="title"><?php echo get_the_author(); ?> </a>







                        <?php } ?>





                        <div class="widget-popular" style="margin: 0px 0px -24px 1px;" >

                            <div class="widget-content">

                                
                                <?php if (in_category( array( 'sobat','sobat-3', 'yayasan','yayasan-2', 'program','program-2' ) )) { ?>
                                <h2 class="widget-title">Donasi Akan Berakhir</h2>
                                <div class="image">

                                    <div id="defaultCountdown"></div>

                                </div><!--end image-->
                                <?php } ?>

                                <div class="share" style="width:275px">

                                	<p style="margin:5px 0px;">Bantu sebarkan informasi ini</p>

                                	<span class='st_facebook_vcount' displayText='Facebook'></span>

                                    <span class='st_twitter_vcount' displayText='Tweet'></span>

                                    <span class='st_email_vcount' displayText='Email'></span>

                                </div>

                            </div><!--end widget content-->

                       </div>                        

                    </div><!--end widget-->







                    </div>







                </div><!--end left-->

                <div class="clearfix">





            </div><!--end single-->

			

            <div class="widget-popular">

                        	<h2 class="widget-title">Popular Project</h2>

                        	<ul id="popular-comments">

								<?php

                              // $pc = new WP_Query('orderby=comment_count&posts_per_page=5&category=sobat'); 

							   $pc = new WP_Query('orderby=rand&posts_per_page=3');?>              

                                <?php while ($pc->have_posts()) : $pc->the_post() ; ?>

                                	<?php if ( in_category( array( 'sobat','sobat-3','program','program-2' ) )) { ?>

                                    <li>

                                    	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail(array(60,60)); ?></a>

                                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>

                                        <div class="donasi-jumlah">

                                        	<?php $key = "donasi";



											$donasi = get_post_meta($post->ID, $key, true);



											if (!$donasi){ ?>



											Rp.0 



											<?php }else{ ?>



											Rp. <?php echo $donasi ?> 



											<?php } ?>

                                        </div>

                                    	<p>Fasilitator By <strong><?php the_author() ?></strong></p>

                                    </li>

                                <?php } ?>

                                <?php endwhile; ?>

                                <div class="clearfix"></div>

                            </ul>

                        </div><!--end widget popular-->

        </div><!--end wrapper-->

        

    </div><!--end content-->



    







    <?php  // } ?>







    <?php get_footer();?>