<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">

<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats please -->
<meta name="keywords" content="ayo peduli,ayopeduli,crowd funding,sosial,charity,donasi,mohon bantuan,bantuan sosial,penyakit,project sosial,sedekah,beramal,">
<meta name="author" content="Jaenal Gufron">
<meta property='fb:app_id' content='154534017984249' /> 
<link rel="shortcut icon" href="http://ayopeduli.com/wp-content/uploads/2013/08/Icon-150x150.png"/>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/style/bootstrap.css" />
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/responsivemobilemenu.js"></script>

	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php //comments_popup_script(); // off by default ?>
	<?php // wp_head(); ?>

</head>

<body>

<div id="wrapper">

<div id="logo">
<!--<a href="<?php bloginfo('rss2_url'); ?>" class="mobile_rss"><img src="<?php bloginfo('template_directory'); ?>/images/mobile_rss.gif" border="0" alt="Subscribe" /></a>-->
<!--<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
<h2><?php bloginfo('description'); ?></h2>-->
<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="http://ayopeduli.com/wp-content/uploads/2013/08/Logo-ayopeduli.png" class="wp-post-image" width="200px" /></a>

</div>
<div class="rmm">
            <ul>
                <li><a href='http://ayopeduli.com/category/sobat/'>Sobat</a></li>
                <li><a href='http://ayopeduli.com/category/program/'>Program</a></li>
                <li><a href='http://ayopeduli.com/category/yayasan/'>Yayasan</a></li>
                <li><a href='http://ayopeduli.com/about-us/'>About Us</a></li>
                <li><a href='http://ayopeduli.com/sarankan-penerima-donasi/'>+ Project</a></li>
                <li><a href='http://ayopeduli.com/open-recruitment-volunteer/'>+ Volunteer</a></li>
            </ul>
</div>