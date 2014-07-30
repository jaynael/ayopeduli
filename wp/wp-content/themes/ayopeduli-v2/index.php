<!DOCTYPE html>
<html lang="en">
    <head>

		<meta charset="UTF-8" />

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"> 

        <meta name="description" content="Experimental Page Layout Inspired by Flipboard" />

        <meta name="keywords" content="flip, pages, flipboard, layout, responsive, web, web design, grid, ipad, jquery, css3, 3d, perspective, transitions, transform" />

        <meta name="author" content="" />

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

		<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700,300,300italic' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/demo.css" />

        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/style.css" />

		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/modernizr.custom.08464.js"></script>

		<script id="pageTmpl" type="text/x-jquery-tmpl">

			<div class="${theClass}" style="${theStyle}">

				<div class="front">

					<div class="outer">

						<div class="content" style="${theContentStyleFront}">

							<div class="inner">{{html theContentFront}}</div>

						</div>

					</div>

				</div>

				<div class="back">

					<div class="outer">

						<div class="content" style="${theContentStyleBack}">

							<div class="inner">{{html theContentBack}}</div>

						</div>

					</div>

				</div>

			</div>			

		</script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.6.1.min.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.waterwheelCarousel.min.js"></script>
		<script type="text/javascript">

			$("#waterwheel-carousel-flat").waterwheelCarousel({
				itemSeparationFactor: 1,
				itemDecreaseFactor: 1,
				waveSeparationFactor: 1,
				startingWaveSeparation: 0,
				startingItemSeparation: 280,
				centerOffset: 10,
				opacityDecreaseFactor: .3,
				autoPlay: 1000,
				edgeReaction: 'reverse'
			});
			</script>
    </head>

    <body>

		

		<header class="main-title">

			<!--<h1>New face of <strong>ayopeduli.com</strong></h1>-->

            <div class="logo-img">

                <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png">

                <p><strong><a href="#">Lebih peduli, lebih baik</a></strong></p>

            </div>

		</header>

       <!-- <div class="supported">

            	<H1> Supported by :</H1>

                <div class="content">

                	<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/sponsors/facebook.png"></a>

                    <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/sponsors/adobe.png"></a>

                    <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/sponsors/cisco.png"></a>

                    <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/sponsors/ea.png"></a>

                    <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/sponsors/microsoft.png"></a>

                    <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/sponsors/google.png"></a>
                    
                </div><!--end .content

            </div><!--end .supported by-->

		

		<div id="flip" class="container">

		<?  // the Loop

                if (have_posts()):

				 the_post(); 

				 global $more;

					$more = 0;?>

			<div class="f-page f-cover">

				<div class="cover-elements">

					<!--<div class="logo">

						Pageflip

						<a class="f-ref" href="http://www.flickr.com/photos/nasahqphoto/">Images by NASA HQ Photo</a>

					</div>-->

					<h1><a href="<?php home_url(); ?>/buat-dukungan/" class="title">+ Buat Dukungan</a> </h1>

                    <h1><a href="#" class="title">>> Tentang Ayopeduli</a></h1>

                    <h1><a href="#" class="title">>> Laporan Donasi</a></h1>

					<div class="f-cover-story">
                          <div class="images">
                            <?php

                               // $pc = new WP_Query('orderby=comment_count&posts_per_page=5&category=sobat'); 

							   $pc = new WP_Query('posts_per_page=5');
								while ($pc->have_posts()) : $pc->the_post() ; ?>
                                <?php if ( in_category( array( 'sobat', 'yayasan', 'program' ) )) { ?>
                                <div class="item">
                                	<span class="title"><?php the_title(); ?></span>
                                    <a class="thumbs" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail(array(500,500)); ?>                                   
                                    </a>
                                    <span class="title"><?php the_title(); ?></span> 
                                </div>

                                <? } ?>

                                <?php endwhile; ?>
                          </div>
                    </div>

				</div>

				<div class="f-cover-flip">&lt; Geser</div>

			</div>

			

			<div class="f-page sobat">

				<div class="f-title">

					<a href="http://ayopeduli.dev/?page=0">Home</a>

					<h2> Sobat </h2>

					<a href="#">Sobat lainnya</a> 

				</div>

                <?  // the Loop

                while (have_posts()):

				 the_post(); 

				 global $more;

					$more = 0;

				if ( in_category( array( 'sobat' ) )) { ?>

                <div class="box w-25 h-70">

					<div class="img-cont img-1">

					<?php 				

						if(has_post_thumbnail()) { ?>

						<a href="<?php the_permalink(); ?>" > <? the_post_thumbnail();?></a>

						<? } else { ?>

                                    	<a href="<?php the_permalink(); ?>" > <? echo '<img src="'.get_bloginfo("template_url").'/images/img-default.png" />'; ?> </a>

										<!--//echo '<img src="'.get_bloginfo("template_url").'/images/img-default.png" />';-->

									<? }

									?>

                    </div>       

					<h3><? the_title(); ?> <span>Published <? the_date(); ?></span>

					<? $key = "donasi";

						$donasi = get_post_meta($post->ID, $key, true);

						if (!$donasi){

							echo "Rp.0";

							}else{

							echo "Rp. $donasi ";

							}

						?> Terkumpul</h3>

					<? the_content(); ?>

				</div>

                <? // the_post();

				}//the_content( 'Read the full post »' );

					

                endwhile;

                ?>

			</div>

			<div class="f-page">

				<div class="f-title">

					<a href="http://ayopeduli.com">Home</a>

					<h2>Program sosial</h2>

					<a href="#">Program Lainnya</a>

				</div>

                <?  // the Loop

                while (have_posts()):

				 the_post(); 

				 global $more;

					$more = 0;

				if ( in_category( array( 'program' ) )) { ?>

                <div class="box w-25 h-70">

					<div class="img-cont img-1">

					<?php 				

						if(has_post_thumbnail()) { ?>

						<a href="<?php the_permalink(); ?>" > <? the_post_thumbnail();?></a>

						<? } else { ?>

                                    	<a href="<?php the_permalink(); ?>" > <? echo '<img src="'.get_bloginfo("template_url").'/images/img-default.png" />'; ?> </a>

										<!--//echo '<img src="'.get_bloginfo("template_url").'/images/img-default.png" />';-->

									<? }

									?>

                    </div>       

					<h3><? the_title(); ?> <span>Published <? the_date(); ?></span>

					<? $key = "donasi";

						$donasi = get_post_meta($post->ID, $key, true);

						if (!$donasi){

							echo "Rp.0";

							}else{

							echo "Rp. $donasi ";

							}

						?> Terkumpul</h3>

					<? the_content(); ?>

				</div>

                <? // the_post();

				}//the_content( 'Read the full post »' );

					

                endwhile;

                ?>

			</div>

			

			<div class="f-page">

				<div class="f-title">

					<a href="http://ayopeduli.com">Home</a>

					<h2>Yayasan</h2>

					<a href="#">Yayasan lainnya</a>

				</div>
						

			</div>

            <div class="f-page">

				<div class="f-title">

					<a href="http://ayopeduli.com">Home</a>

					<h2>Maps</h2>

					<a href="http://tympanus.net/codrops/2012/05/07/experimental-page-layout-inspired-by-flipboard/">Cara donasi</a>

				</div>

				<iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=id&amp;geocode=&amp;q=indonesia&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=37.735377,86.572266&amp;ie=UTF8&amp;hq=&amp;hnear=Indonesia&amp;t=m&amp;z=4&amp;ll=-0.789275,113.921327&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=id&amp;geocode=&amp;q=indonesia&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=37.735377,86.572266&amp;ie=UTF8&amp;hq=&amp;hnear=Indonesia&amp;t=m&amp;z=4&amp;ll=-0.789275,113.921327" style="color:#0000FF;text-align:left">Lihat Peta Lebih Besar</a></small>

			</div>

			<? // the_post();

                    //the_content( 'Read the full post »' );

					

                endif;

                ?>

			<div class="f-page f-cover-back">

				<div id="codrops-ad-wrapper">

					<h1>Close</h1>

				</div>

			</div>

		</div>

	

		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.7.1.min.js"></script>
        

		<script type="text/javascript">


			var $container 	= $( '#flip' ),

				$pages		= $container.children().hide();

			

			Modernizr.load({

				test: Modernizr.csstransforms3d && Modernizr.csstransitions,

				yep : ['<?php echo get_template_directory_uri(); ?>/js/jquery.tmpl.min.js','<?php echo get_template_directory_uri(); ?>/js/jquery.history.js','<?php echo get_template_directory_uri(); ?>/js/core.string.js','<?php echo get_template_directory_uri(); ?>/js/jquery.touchSwipe-1.2.5.js','<?php echo get_template_directory_uri(); ?>/js/jquery.flips.js'],

				nope: 'css/fallback.css',

				callback : function( url, result, key ) {

					

					if( url === '<?php echo get_template_directory_uri(); ?>/css/fallback.css' ) {

						$pages.show();

					}

					else if( url === '<?php echo get_template_directory_uri(); ?>/js/jquery.flips.js' ) {

						$container.flips();

					}

			

				}

			});

				

		</script>

    </body>

</html>