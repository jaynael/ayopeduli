<?php get_header(); ?> 
             
        <div class="entry"> 
        

                                <div id="container">
                    
            <?php if (have_posts()) : ?>

		<h2 class="search">Search Results for "<?php echo $_GET['s']; ?>"</h2>


		<?php while (have_posts()) : the_post(); ?>
                    
                                        <div class="post" id="post-<?php the_ID(); ?>">

                                 <div class="imgpost"><?php mtheme_thumb(); ?></div>

                                            <div class="title">
                                                <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                                            </div>   
                                                                
                                            <div class="date">
                                                Posted on <?php the_time('F j, Y') ?>
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
                                            <h2>Your search for "<?php echo $_GET['s']; ?>" returned no results! </h2>
                                        </div>
                    
                                    <?php endif; ?>
                                    
                                </div>
         
        
        </div> <!--entry-->
        
  
        <?php get_sidebar(); ?>

        <?php get_footer(); ?>        