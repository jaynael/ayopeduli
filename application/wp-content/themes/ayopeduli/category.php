<?php get_header(); ?>
<div id="content">
    	<div class="wrapper">
        	<div id="wookmark" style="margin: 55px 0px 10px;">
        	<ul id="tiles">           
                
			   <?php  // the Loop
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
										<a href="<?php the_permalink(); ?>" > <?php the_post_thumbnail('post-item');?></a>
									<?php } else { ?>
                                    	<a href="<?php the_permalink(); ?>" > <?php echo '<img src="'.get_bloginfo("template_url").'/images/img-default.png" />'; ?> </a>
										<!--//echo '<img src="'.get_bloginfo("template_url").'/images/img-default.png" />';-->
									<?php }
									?>
                            		<a href="<?php the_permalink(); ?>" class="name"><?php the_title(); ?></p></a>
                                </div>
                                <!--<div class="date"><span>1</span>April - 2011</div>-->
                                <div class="tooltips">                                                                     	
                                   	<p class="description"><?php 
																	
                    				the_content( 'Read the full post »' ); 
									 //$shortpost = substr(the_content('','',FALSE),0,50);
									//echo $shortpost; if (strlen($shortpost) >29){ echo '&hellip;'; }
									 ?> <a href="<?php the_permalink(); ?>">Selengkapnya</a></p>
                                    <div class="donate">
                                    	<?php if ( in_category( array( 'sobat', 'yayasan', 'program' ) )) { ?>												
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
                                        <a class="tombol" href="<?php the_permalink(); ?>"> Donate</a>
                                        <div class="clearfix"></div>
                                        <?php } //elseif ( in_category('blog','Uncategorized') ) {
											//echo 'none';
										//} ?>
                                    </div>
                                        <div class="author">
                                        	<div class="images">
                                            <?php
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
                        
                        <div class="clearfix"></div>
                      </ul>
                      
                      </div>
                               	
        </div><!--end wrapper-->
    </div><!--end content-->
    <?php get_footer();?>
