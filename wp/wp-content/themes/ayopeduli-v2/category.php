<? get_header(); ?>
<div id="content">
    	<div class="wrapper content-home">
        	<div class="top">
            	<div class="ads-left">
                	<a href="<?php echo esc_url( home_url( '/beriklan' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/banner/banner.gif" alt="" /></a>
                </div><!--end ads-left-->
        		<div id="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" /></a><span>Beta</span></div>
				<div class="ads-right">
                	<a href="<?php echo esc_url( home_url( '/beriklan' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/banner/banner.gif" alt="" /></a>
                </div>
                <div class="clearfix"></div>
            </div><!--end top-->
        	<div id="wookmark">
        	<ul id="tiles">           
                
			   <?  // the Loop
                while (have_posts()):
				 the_post(); 
				 global $more;
					$more = 0;
					$categories = get_categories();
					
					// foreach ($categories as $category) {
					
					?>

                	<li>
                        <div class="content-li">
                            <div class="image">
                            <?php 				
									
									if(has_post_thumbnail()) { ?>
										<a href="<?php the_permalink(); ?>" > <? the_post_thumbnail('post-item');?></a>
									<? } else { ?>
                                    	<a href="<?php the_permalink(); ?>" > <? echo '<img src="'.get_bloginfo("template_url").'/images/img-default.png" />'; ?> </a>
										<!--//echo '<img src="'.get_bloginfo("template_url").'/images/img-default.png" />';-->
									<? }
									?>
                            		<a href="<?php the_permalink(); ?>" class="name"><? the_title(); ?></p></a>
                                </div>
                                <!--<div class="date"><span>1</span>April - 2011</div>-->
                                <div class="tooltips">                                                                     	
                                   	<p class="description"><?php echo substr(strip_tags(get_the_content()),0,200); 
									 //$shortpost = substr(the_content('','',FALSE),0,50);
									//echo $shortpost; if (strlen($shortpost) >29){ echo '&hellip;'; }
									 ?> <a href="<?php the_permalink(); ?>">Selengkapnya</a></p>
                                    <div class="donate">
                                    	<?php if ( in_category( array( 'sobat', 'yayasan', 'program' ) )) { ?>												
                                    	<div class="total"><p>
                                        <? $key = "donasi";
											$donasi = get_post_meta($post->ID, $key, true);
											if (!$donasi){
											echo "Rp.0";
											}else{
											echo "Rp. $donasi ";
											}
										?>                           
                                        
                                        </p>Terkumpul </div>
                                        <a class="tombol" href="<?php the_permalink(); ?>"> Donate</a>
                                        <div class="clearfix"></div>
                                        <? } //elseif ( in_category('blog','Uncategorized') ) {
											//echo 'none';
										//} ?>
                                    </div>
                                        <div class="author">
                                        	<div class="images">
                                            <?
												if (function_exists('get_avatar')) {
												  echo get_avatar($email);
											   } else {
												  //alternate gravatar code for < 2.5
												  $grav_url = "http://www.gravatar.com/avatar/" . 
													 md5(strtolower($email)) . "?d=" . urlencode($default) . "&s=" . $size;
												  echo "<img src='$grav_url'/>";
											   }
											?>
                                        		<!--<img src="http://graph.facebook.com/765838607/picture?type=square" />-->
                                            </div>
                                            <p> oleh volunteer  <?php //$author = get_the_author(); 
												echo get_the_author_link(); ?> </p>
                                            <div class="clearfix"></div>
                                        </div>
                                </div>
                            </div>
                        </li>
                        <?php 
							endwhile;
							?>
                        
                        
                      </ul>
                      
                      </div>
                               	
        </div><!--end wrapper-->
    </div><!--end content-->
    <? get_footer();?>
