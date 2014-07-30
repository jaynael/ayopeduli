<?php get_header(); ?>

	<div id="content">

    	<div class="wrapper content-home">

       		<div class="top">            	

            <div id="logo">

                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="http://ayopeduli.com/wp-content/uploads/2013/08/Logo-ayopeduli.png" /></a>

            </div>

                <div class="clearfix"></div>



            </div><!--end top-->

            </div>

            <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.roundabout.js"></script>

			<script>

                $(document).ready(function() {

                    $('ul#featured').roundabout();

                });

            </script>

            <ul id="featured">

            <?php

 // $pc = new WP_Query('orderby=comment_count&posts_per_page=5&category=sobat'); 

	$pc = new WP_Query('orderby=rand&posts_per_page=3');?>              

	<?php while ($pc->have_posts()) : $pc->the_post() ; ?>

		<?php if ( in_category( array( 'sobat','sobat-3','program','program-2' ) )) { ?>

             

                <li>

                	<div class="image">                    	

                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail(552,369); ?></a>

                   	</div>

                    <div class="sobat-ribbon">

						<h3><?php 

						$category = get_the_category(); 

						if($category[0]){

						echo ''.$category[0]->cat_name.'';

						}

						?></h3>

                    </div><!--end .sobat-ribbon-->

                    <div class="info">

                    	<div class="nama">

                            <h4><?php the_title(); ?></h4>

                            <p><?php the_title(); ?></p>

                            </div>

                        <div class="donasi">

                        	<a href="<?php the_permalink(); ?>">

                            	<h2><?php $key = "donasi";

											$donasi = get_post_meta($post->ID, $key, true);

											if (!$donasi){ ?>

											Rp.0 

											<?php }else{ ?>

											Rp. <?php echo $donasi ?> 

											<?php } ?></h2>

                                <p>Terkumpul</p>

                                <p>Donasi Sekarang</p>

                            </a>

                        </div>

                        <div class="clearfix"></div>

                    </div>                

                </li>

                <?php } ?>



        <?php endwhile; ?>                

            </ul>            

	<div class="wrapper content-home">

		<div class="social-report">

        	<!--<div class="twitter">

            	<ul>

                	<li class="quolvover">

                    	<p>"Banyak yang membutuhkan bantuan kita di ayopeduli.com"</p>

                        <div class="autor">

                        	<span><a href="#">@billyboen</a></span>                            

                        </div>

                    </li>

                </ul>

            </div>-->

            <div class="report">

            	<h4>Statistic Donasi Dalam Rupiah (Rp)</h4>

                <!--<div class="jumlah">

                	<div class="item terkumpul">

                    	<p><span>Rp. 110.000.000</span> Terkumpul</p>

                    </div>

                    <div class="item tersalurkan">

                    	<p><span>Rp.60.000.000</span>Tersalurkan</p>

                    </div>

                    <div class="item segera">

                    	<p><span>Rp.50.000.000</span>Segera disalurkan</p>

                    </div>

                	<div class="clearfix"></div>

                </div>-->

                <ul class="pricing_table">

                    <li>

                        <div class="price_body">

                            <div class="price">

                                <span class="price_figure">Rp122.236.084</span>

                                <span class="price_term">Terkumpul</span>

                            </div>

                        </div>

                    </li>

                    <!-- Active/Hover styles -->

                    <li class="active">

                        <div class="price_body">

                            <div class="price">

                                <span class="price_figure">Rp69.349.808</span>

                                <span class="price_term">Terdistribusikan</span>

                            </div>

                        </div>

                    </li>

                    <li>

                        <div class="price_body">

                            <div class="price">                                

                                <span class="price_figure">Rp51.255.348</span>

                                <span class="price_term">Segera Disalurkan</span>

                            </div>

                        </div>

                    </li>

                    <div class="clearfix"></div>

                    <p>Update pada : 17 Oktober 2013</p>

                </ul>

            </div>

            <div class="clearfix"></div>

        </div>

        <div id="wookmark">

				<h2 class="all">Seluruh Project Sosial</h2>

        	<ul id="tiles">         



			   <?php  // the Loop



                while (have_posts()):



				 the_post(); 



				 global $more;



					$more = 0;?>



                	<li>



                        <div class="content-li">



							 <?php if ( in_category( array( 'sobat' , 'sobat-3' ) )) { ?>	



                             <div class="sobat-ribbon">



                                    <h3>Sobat</h3>



                                </div><!--end .sobat-ribbon-->



                             <?php } ?>                        	



                            <div class="image">                            



                            <?php 				



									



									if(has_post_thumbnail()) { ?>



										<a href="<?php the_permalink(); ?>" > <?php the_post_thumbnail('post-item');?></a>



									<?php } else { ?>



                                    	<a href="<?php the_permalink(); ?>" > <?php echo '<img src="'.get_bloginfo("template_url").'/images/img-default.png" />'; ?> </a>



										<!--//echo '<img src="'.get_bloginfo("template_url").'/images/img-default.png" />';-->



									<?php }



									?>



                            		<a href="<?php the_permalink(); ?>" class="name"><?php the_title(); ?></a>



                                </div>



                                <!--<div class="date"><span>1</span>April - 2011</div>-->



                                <div class="tooltips">                                                                     	



                                   	<p class="description"><?php 																	



                    				the_content( 'Read the full post »' ); 



									 //$shortpost = substr(the_content('','',FALSE),0,50);



									//echo $shortpost; if (strlen($shortpost) >29){ echo '&hellip;'; }



									 ?> <a href="<?php the_permalink(); ?>">Selengkapnya</a></p>



                                     <div class="donate">



                                     <?php if ( in_category( array( 'sobat', 'sobat-3', 'yayasan', 'yayasan-2', 'program', 'program-2' ) )) { ?>												



                                    	<div class="total"><p>



                                        <?php $key = "donasi";



											$donasi = get_post_meta($post->ID, $key, true);



											if (!$donasi){



											echo "Rp.0";



											}else{



											echo "Rp. $donasi ";



											}



										?>                               



                                        



                                        </p>Terkumpul </div>



                                        <a class="tombol" href="<?php the_permalink(); ?>"> Donasi</a>



                                        <div class="clearfix"></div>



											<?php } //elseif ( in_category('blog','Uncategorized') ) {



											//echo 'none';



										//} ?>



                                      </div>



                                        <div class="author">



                                        	<div class="images">



                                            <?php



												/*if (function_exists('get_avatar')) {



												  echo get_avatar($email);



											   } else {



												  //alternate gravatar code for < 2.5



												  $grav_url = "http://www.gravatar.com/avatar/" . 



													 md5(strtolower($email)) . "?d=" . urlencode($default) . "&s=" . $size;



												  echo "<img src='$grav_url'/>";



											   }*/



											    echo get_avatar(get_the_author_meta('user_email'), 30);



											?>



                                        		<!--<img src="http://graph.facebook.com/765838607/picture?type=square" />-->



                                            </div>



                                            <div> oleh volunteer  <?php //$author = get_the_author(); 



												echo get_the_author_link(); ?>



                                            </div>



                                            <div class="clearfix"></div>



                                        </div>



                                </div>



                            </div>



                        </li>



                       



                <?php // the_post();



                    //the_content( 'Read the full post »' );



					



                endwhile;



                ?>



                



                        <div class="clearfix"></div>



                        



                      </ul>



                      



                      </div>



                <?php twentyeleven_content_nav( 'nav-below' ); ?>



                <div class="sponsor">



                    <h2>Operational Partners </h2>



                    <div class="content-sponsor" style="width: 551px;">                        



                        <div class="item-sponsor">



                            <a href="http://optikseis.com" target="_new"><img src="<?php echo get_template_directory_uri(); ?>/images/optic-seis.jpg" /></a>



                        </div>



			<div class="item-sponsor">

                            <a href="http://maxsolution.net" target="_new"><img src="https://fbcdn-sphotos-g-a.akamaihd.net/hphotos-ak-prn2/1186149_633575470020191_911170691_n.jpg" /></a>

                        </div>



                        <div class="item-sponsor">



                            <a href="http://youngontop.com" target="_new"><img src="<?php echo get_template_directory_uri(); ?>/images/logo-tim.png" /></a>



                        </div>

			



                        <!--<div class="item-sponsor">



                            <a href="http://youngontop.com" target="_new"><img src="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc7/s160x160/423969_437751772942668_1260977220_a.jpg" /></a>



                        </div>



                        <div class="item-sponsor">



                            <a href="http://youngontop.com" target="_new"><img src="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc7/s160x160/423969_437751772942668_1260977220_a.jpg" /></a>



                        </div>



                        <div class="item-sponsor">



                            <a href="http://youngontop.com" target="_new"><img src="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc7/s160x160/423969_437751772942668_1260977220_a.jpg" /></a>



                        </div>-->



                        <div class="clearfix"></div>



                    </div><!--end content-sponsor-->                



                </div><!--end sponsored-->



                <div class="sponsor community">



                    <h2>Media & Community Partners </h2>



                    <div class="content-sponsor" style="width:650px;">



                        <div class="item-sponsor">



                            <a href="http://youngontop.com" target="_new"><img src="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc7/s160x160/423969_437751772942668_1260977220_a.jpg" /></a>



                        </div>



                        <div class="item-sponsor">



                            <a href="http://3littleangels.com" target="_new"><img src="<?php echo get_template_directory_uri(); ?>/images/3littleangels.png" /></a>



                        </div>



                        <div class="item-sponsor">



                            <a href="http://eryepeduli.com" target="_new"><img src="<?php echo get_template_directory_uri(); ?>/images/eryepeduli.png" /></a>



                        </div>



                        <div class="item-sponsor">



                            <a href="http://bflact.com/" target="_new"><img src="<?php echo get_template_directory_uri(); ?>/images/bflact.png" style="width: 150px;margin: 20px 0px 0px;" /></a>



                        </div>



                        <div class="item-sponsor">



                            <a href="http://mindtalk.com" target="_new"><img src="http://ayopeduli.com/wp-content/uploads/2013/06/mindtalk-logo-colour.png" style="width: 150px;margin: 20px 0px 0px;" /></a>



                        </div>



                        <!--<div class="item-sponsor">



                            <a href="http://youngontop.com" target="_new"><img src="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc7/s160x160/423969_437751772942668_1260977220_a.jpg" /></a>



                        </div>



                        <div class="item-sponsor">



                            <a href="http://youngontop.com" target="_new"><img src="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc7/s160x160/423969_437751772942668_1260977220_a.jpg" /></a>



                        </div>-->



                        <div class="clearfix"></div>



                    </div><!--end content-sponsor-->                



                </div><!--end sponsored-->             	



        </div><!--end wrapper-->



    </div><!--end content-->



    



    



    <?php get_footer();?>