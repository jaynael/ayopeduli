<?php get_header(); ?> 
             
        <div class="entry"> 
        

                                <div id="container">
                    
                                    <?php if(have_posts()) : ?>
                                    <?php while(have_posts()) : the_post(); ?>
                    
                                        <div class="post" id="post-<?php the_ID(); ?>">

                                <div class="imgpost"><?php mtheme_thumb(); ?></div>
<div class="contentes" style="float:left;margin:0px 5px 0px 0px;min-width:250px;">
                                            <div class="title" style="margin:-10px 0px 0px;">
                                                <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                                            </div>
                                            <div class="donate" style="margin:-20px 0px 0px;">
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
                                                    
                                                    Terkumpul</p> </div>
                                                    <a class="tombol" style="display: block;margin: 0px 0px 10px;border: 1px solid;text-align: center;width: 100px;border-radius: 5px;
padding: 3px;" href="<?php the_permalink(); ?>"> Bantu Donasi</a>
                                                    <?php } //elseif ( in_category('blog','Uncategorized') ) {
                                                        //echo 'none';
                                                    //} ?>
                                               
                                            </div> 
                                </div>    
                                              	
                    <br clear="all" />
                                        </div>                    
                    
                                    <?php endwhile; ?>
                                    
        <div class="navigation">
			<div class="goleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="goright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
            <div class="clear"></div>
		</div>             
                    
                                    <?php else : ?>
                    
                                        <div class="post" id="post-<?php the_ID(); ?>">
                                            <h2><?php _e('No posts are added.'); ?></h2>
                                        </div>
                    
                                    <?php endif; ?>
                                    
                                </div>
         
        
        </div> <!--entry-->
        
  
        <?php get_sidebar(); ?>

        <?php get_footer(); ?>        