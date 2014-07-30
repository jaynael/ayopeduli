<?php
/**
 * The Header for ayopeduli theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html  <?php language_attributes(); ?>>
<head>
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/logo.png"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta charset="<?php bloginfo( 'charset' ); ?>" />  
    <meta property='fb:app_id' content='154534017984249' />  
   <!-- <title><?php // wp_title( '|', true, 'right' ); bloginfo( 'name' ); ?></title>  --> 
<title>
<?php
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
    <?php wp_enqueue_script("jquery"); ?>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link href='http://fonts.googleapis.com/css?family=Imprima' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/css-reseter.css" />
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap-responsive.css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/validationEngine.jquery.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap-tooltip.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap-popover.js"></script>
<!--<script src="<?php// echo get_template_directory_uri(); ?>/js/contact.js"></script>
<script type="text/javascript" src="<?php // bloginfo('template_directory'); ?>/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php // bloginfo('template_directory'); ?>/js/verif.js"></script>-->
<script>
var options={ "publisher": "398c0313-d14d-4902-8bd7-b299713590b6", "position": "left", "ad": { "visible": true, "openDelay": 5, "closeDelay": 0}, "chicklets": { "items": ["facebook", "twitter", "linkedin", "email", "pinterest", "googleplus"]}};
var st_hover_widget = new sharethis.widgets.hoverbuttons(options);

</script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.7.1.min.js"></script>                                              
                        <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.wookmark.js"></script>
                        <!--<script src="<?php // echo get_template_directory_uri(); ?>/js/jquery.numberformatter.js"></script>
                        <script src="<?php // echo get_template_directory_uri(); ?>/js/jshashset.js"></script> -->
</head>

<body>
<div id="universe">
	<div id="header">
        <div class="wrapper">
    		<div class="left-menu">
            	<div class="home"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">&nbsp;</a></div>            	
                	
                    <?php $defaults = array(
						  'theme_location'  => 'main_menu', 
						  );
						?>
                        <?php wp_nav_menu( $defaults ); ?>
                	<!--<li><a href="#">Sobat</a></li>
                    <li><a href="#">Lingkungan</a></li>
                    <li><a href="#">Yayasan</a></li>-->
                
                
            </div><!--end left menu-->
            <form method="get" id="searchform" action="<?php bloginfo('url'); ?>/search">
                 	<div class="input-prepend">
                         <input id="prependedInput" placeholder="Search" class="span2" type="text" value="<?php the_search_query(); ?>" size="16">
                         <input class="btn btn-info" type="submit" id="searchsubmit" value="Search">
                   </div>
                   
                   <div class="clearfix"></div>
              	</form>
            <div class="right-menu">
            <?php
			if ( is_user_logged_in() ) { 
				/*wp_get_current_user();
				$user_id = $current_user->ID;	
				$meta = get_user_meta($user_id, 'profile');
				$meta = $meta[0];
				$profile_image = get_user_meta($user_id, 'profile_image');
				$profile_image = $profile_image[0];
				//check if image upload button was pressed
				if ( isset( $_POST['html-upload'] ) && !empty( $_FILES ) ) {
				  //profile_image_upload($redirect,$user_id,$profile_image);
				  profile_image_upload($user_id,$profile_image);
				}*/
			 ?>
			
			<ul>  
            	<li> <a class="profile">
                	<?php global $current_user;
					  //get_currentuserinfo();
					  echo 'Welcome ' . $current_user->display_name . "\n";					  
				?></a>

                </li> 
                <li><span class="image">
                      <?php // profile_image_display('small',$profile_image);
                        echo get_avatar('$current_user'); 
                        //echo get_avatar(get_the_author_meta('user_email'), 230); 
                      ?> 
                      <!--<img src="<?php echo $current_user->avatar; ?>" />   -->                                  	
                </span><!--end image-->    
                </li>         
                <li><a href="<?php echo esc_url( home_url( '/' ) ); echo 'data' ?>" title="data">+ Project</a></li>
                <li><a href="<?php echo esc_url( home_url( '/' ) ); echo 'author/' . $current_user->user_login . "\n"; ?>" title="profile"> Profile</a></li>
                <li><a href="<?php echo wp_logout_url('login-or-register'); // echo wp_logout_url( 'http://ayopeduli.com' ); ?>" title="Logout">Logout</a></li>                
             </ul>
			<? } else { ?>	
            	<ul>
                	
                	<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>login-or-register/">Login</a></li>
                </ul>	

            <?  } ?>
            </div><!--end right-menu-->
            <div class="clearfix"></div>
        </div><!--end wrapper-->
    </div><!--end header-->