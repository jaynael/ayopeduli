<?php get_header(); ?> 
<div id="content"> 
	<div class="wrapper">  
   	 <?php if (have_posts()) : while (have_posts()) : the_post();?> 
        	<div id="single" style="margin:55px auto 10px;">                       	
                <div class="right">
                	<div class="post">                    	
                    	<h1><?php the_title(); ?></h1>
                        <div class="info">                        	                           
                    		<?php 
							the_content(); ?>
                        </div><!--nd info-->
                        <?php endwhile;  endif; ?>
                        
                    </div><!--end post-->
                </div><!--end right-->
                <div class="left">
                	<div class="widget profile" style="margin: -20px 0px;">                   	
                        <div class="widget-popular">
                        	<h2 class="widget-title">Project Lainya</h2>
                        	<ul id="popular-comments">
								<?php
                                $pc = new WP_Query('orderby=rand&posts_per_page=5'); ?>
                                
                                <?php while ($pc->have_posts()) : $pc->the_post(); ?>
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
                                
                                <?php endwhile; ?>
                            </ul>
                        </div><!--end widget popular-->
                    </div><!--end widget-->
                </div><!--end left-->
                <div class="clearfix"></div>
            </div><!--end single-->
        </div><!--end wrapper-->
    </div><!--end content-->
    <?php  // } ?>
    <?php get_footer();?>