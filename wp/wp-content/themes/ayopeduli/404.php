<?php get_header(); ?>
    <div id="content">
    	<div class="wrapper content-home">
        	<div id="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" /></a></div>
        	<div id="single">
            
            	<!--<div class="left">
                	<div class="widget profile">
                    	<h2 class="widget-title">Fasilitator<span>  
												<a href="<?php echo esc_url( home_url( '/' ) ); echo 'author/' . get_the_author() . "\n";?>"><?php echo get_the_author(); ?> </a></span></h2>
                        <div class="widget-content">
                        	<div class="image">
                            	<img src="https://fbcdn-photos-a.akamaihd.net/hphotos-ak-ash4/313230_1857581051684_1605603982_1461442_3927779_a.jpg" />
                            	<p>Volunteer</p>
                            </div>
                        </div>
                    </div>
                </div><!--end left-->
                <div class="right">
                	<div class="post">                    	
                    	<h1></h1>
                        <div class="info">                        	                           
                    		<h1> Maaf , Halaman yang anda akses tidak ditemukan !!</h1>
                        </div><!--nd info-->
                        
                        
                    </div><!--end post-->
                </div><!--end right-->
                <div class="clearfix">
            </div><!--end single-->
        </div><!--end wrapper-->
    </div><!--end content-->
    <?php  // } ?>
    <?php get_footer();?>