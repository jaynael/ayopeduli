
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Platform kolaborasi aksi sosial media untuk membantu memudahkan penggalangan donasi secara online bagi aksi-aks sosial di Indonesia ">
<meta name="keywords" content="ayo peduli,ayopeduli,crowd funding,sosial,charity,donasi,mohon bantuan,bantuan sosial,penyakit,project sosial,sedekah,beramal,">
<meta name="author" content="Jaenal Gufron">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'ayopeduli' ), max( $paged, $page ) );

	?></title>
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/logo.png"/>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style/style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style/bootstrap-2.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style/bootstrap-responsive.min.css" />
<link href="<?php echo get_template_directory_uri(); ?>/style/style-responsive.css" rel="stylesheet" type="text/css">
<link href="<?php echo get_template_directory_uri(); ?>/style/bootstrap-tour.css" rel="stylesheet" type="text/css">
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>-->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.7.1.min.js"></script>
    	<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.roundabout.js"></script>
			<script>
                $(document).ready(function() {
                    $('ul#featured').roundabout();
                });
            </script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/affix.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/tab.js"></script>
<!--<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/tooltip.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/popover.js"></script>-->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/bootstrap-tour.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<!--<script src="http://code.jquery.com/jquery-1.9.1.js"></script>-->
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

<!-- responsive-->
<!--<link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/js/menu-mobile/demo/demo.css" />-->
		<link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/js/menu-mobile/src/css/jquery.mmenu.css" />
		<link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/js/menu-mobile/src/css/extensions/jquery.mmenu.widescreen.css" media="all and (min-width: 900px)" />
		<link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/js/menu-mobile/src/css/extensions/jquery.mmenu.themes.css" media="all and (min-width: 900px)" />

		<style type="text/css">
			@media all and (min-width: 900px) {
				html, body {
					height: 100%;
				}
				#menu {
					background: #eee;
				}
				#page {
					border-left: 1px solid #ccc;
					min-height: 100%;
				}
				/* hide open-button */
				a[href="#menu"]
				{
					/*display: none !important;*/
				}
				#header #logo a#menu
				{
					background: center center no-repeat transparent;
					background-image: url( data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAZCAYAAADE6YVjAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAADhJREFUeNpi/P//PwOtARMDHQBdLGFBYtMq3BiHT3DRPU4YR4NrNAmPJuHRJDyahEeT8Ii3BCDAAF0WBj5Er5idAAAAAElFTkSuQmCC );
				
					display: block;
					width: 40px;
					height: 40px;
					position: absolute;
					top: 0;
					left: 10px;
				}
			}
		</style>

		
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/menu-mobile/src/js/jquery.mmenu.js"></script>
		<script type="text/javascript">
			$(function() {
				//$('nav#menu').mmenu({
//					classes: 'mm-light'
//				});
			});
		</script>

</head>
<div id="header">
	<div class="wrapper">
    	<div class="logo" id="logo"> <a href="#menu" id="menu"></a> <a href="/"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" /></a></div>  
        <div class="main-menu" id="category">
        	<ul>
            	<li>
                	<a href="/aksi/category/kesehatan"><img src="<?php echo get_template_directory_uri(); ?>/images/Kesehatan.png" /><span>Kesehatan</span></a>
                </li>
                <li>
                	<a href="/aksi/category/pendidikan"><img src="<?php echo get_template_directory_uri(); ?>/images/education.png" /><span>Pendidikan</span></a>
                </li>
                <li>
                	<a href="/aksi/category/lingkungan"><img src="<?php echo get_template_directory_uri(); ?>/images/lingkungan.png" /><span>Lingkungan</span></a>
                </li>
                <div class="clearfix"></div>
            </ul>
        </div>      
        <div class="menu-top" id="menu-top">
        	            <div class="login-sosial">
                        <!--Hi, <a href="/profile/myprofile">Jaenal </a>--> 
                        <a href="/login" class="btn btn-primary">login</a> 
                        <a href="/register" class="btn btn-primary" >Register</a>                          
            </div>
            <div class="clearfix"></div>				
			        	       	
            
            <div class="clearfix"></div>
        	<!--<ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Cara Kerja</a></li>        
                <li><a href="#">Aksi Sosial</a></li>
                <li><a href="#">Partner</a></li>
                <li class="last"><a href="#">Donasi</a></li>
                <div class="clearfix"></div>
            </ul>-->
        </div>
        <div class="clearfix"></div>
        <!--<div class="banner">
        	<a href="http://ayopeduli.com/savemugo" target="_blank"><img src="http://ayopeduli.com<?php // echo get_template_directory_uri(); ?>/sangkur/images/banner-ayopeduli.png"></a>
        </div>-->
    </div>

</div><!-- end #header--><!--<script src="<?php echo get_template_directory_uri(); ?>/vendor/jquery.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/vendor/bootstrap.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/vendor/prism.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/vendor/jquery.smoothscroll.js"></script>-->
<script type="text/javascript">
	$(document).ready(function() {
    	// Instance the tour
		var tour = new Tour({
		  
		  });
		
		// Add your steps. Not too many, you don't really want to get your users sleepy
		tour.addSteps([
		  {
			element: "#logo", // string (jQuery selector) - html element next to which the step popover should be shown
			title: "Selamat datang di ayopeduli.com", // string - title of the popover
			content: "ayopeduli.com adalah sebuah platform website untuk kolaborasi aksi sosial", // string - content of the popover
		  	placement:"bottom",
		  },
		  {
			element: ".main-menu",
			title: "Aksi sosial apa yang ayopeduli fokuskan?.",
			content: "Kami percaya 3 element penting ini dapat meningkatkan kesejahteraan masyarakat.",
		  },
		  {
			element: "#item",
			title: "Solusi apa yang kami tawarkan?.",
			content: "Informasi mengenai Aksi kami tampilkan dengan lebih jelas dan transparan.",
			placement:"top",
		  },
		  {
			element: "#poin",
			title: "Mengapa saya harus bergabung?.",
			content: "Mari berkolaborasi untuk membantu aksi sosial dan kumpulkan gudnes poin untuk dapatkan penawaran menarik dari partner kami.",
			placement:"top",
		  },
		  {
			element: "#buat",
			title: "Bergabunglah bersama kami",
			content: "Tunggu apa lagi, ayo buat aksi sosialmu dan sebarkan untuk dapatkan dukungan lebih banyak, buat aksi sekarang, atau...",
			placement:"left",
		  },
		  {
			element: "#menu-top",
			title: "Login atau Register",
			content: "Gabung dan join bersama ribuan volunteer dan fasilitator di seluruh Nusantara untuk lakukan hal yang lebih baik.",
			placement:"bottom",
		  }	  
		]);
		
		
		// Initialize the tour
		tour.init();
		
		// Start the tour
		tour.start();
		$("#slideshow > div:gt(0)").hide();
	
			setInterval(function() { 
			  $('#slideshow > div:first')
			    .fadeOut(700)
			    .next()
			    .fadeIn(700)
			    .end()
			    .appendTo('#slideshow');
			},  7000);
	});
</script>