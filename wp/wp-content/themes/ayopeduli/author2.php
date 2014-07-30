<?php
/*
Template Name: author
*/ ?>
<?php get_header(); ?>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/contact-form.js"></script>
    <div id="content">
    	<div class="wrapper content-home">
        	
        	<div id="single">            
            <!-- This sets the $curauth variable -->   

            	<div class="left profile">
                	<div class="widget profile">
                    <?php
						$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
						?>
                    	<h2 class="widget-title">Fasilitator<span><?php echo $curauth->nickname; ?></span></h2>
                        <div class="widget-content">
                        	<div class="image">
                            	<img src="https://fbcdn-photos-a.akamaihd.net/hphotos-ak-ash4/313230_1857581051684_1605603982_1461442_3927779_a.jpg" />
                            	<p>Volunteer</p>
                            </div><!--end image-->
                        </div><!--end widget content-->
                    </div><!--end widget-->
                </div><!--end left-->
                <div class="right">
                	<div class="post">
                        <div class="info">
                        <!-- This sets the $curauth variable -->
						<?php
                        if(isset($_GET['author_name'])) :
                        $curauth = get_userdatabylogin($author_name);
                        else :
                        $curauth = get_userdata(intval($author));
                        endif;
                        ?>
                        
                        <h2>About: <?php echo $curauth->display_name; ?></h2>
                        <p style="float:left;padding-right:10px;"><a href="<?php echo $user_link; ?>" title="<?php echo $curauth->display_name; ?>">
                        <?php echo get_avatar($curauth->user_email, '96', $avatar); ?>
                        </a></p><p style="float:left;">Connect with <?php echo $curauth->display_name; ?> at: <a href="http://twitter.com/<?php echo $curauth->twitter; ?>"><strong>Twitter</strong></a> | <a href="http://facebook.com/<?php echo $curauth->facebook; ?>"><strong>Facebook</strong></a> | <a href="http://linkedin.com/in/<?php echo $curauth->linkedin; ?>"><strong>LinkedIn</strong></a></p>
                        <br />
                        <h3><strong>Website:</strong> <span><a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a></span></h3>
                        <p><strong>Profile:</strong> <?php echo $curauth->user_description; ?><p>                       
                        <div class="entry">
                        <h3>Posts by <?php echo $curauth->display_name; ?>:</h3>
                        <ul>
                        <!-- The Loop -->
                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <li>
                        <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">
                        <?php the_title(); ?></a>
                        </li>
                        <?php endwhile; else: ?>
                        <p><?php _e('No posts by this author.'); ?></p>
                        <?php endif; ?>
                        <!-- End Loop -->
                        </ul>
                        </div>
                          <!--<h1><?php // echo $curauth->nickname; ?> page's </h1>                     
                         <dl>
                                <dt>Website</dt>
                                <dd><a href="<?php // echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a></dd>
                                <dt>Profile</dt>
                                <dd><?php // echo $curauth->user_description; ?></dd>
                            </dl>
                        
                            <h2>Posts by <?php //  echo $curauth->nickname; ?>:</h2>
                        
                            <ul>
                        
                            <?php // if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                                <li>
                                    <a href="<?php // the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php // the_title(); ?>">
                                    <?php // the_title(); ?></a>,
                                    <?php // the_time('d M Y'); ?> in <?php // the_category('&');?>
                                </li>
                        
                            <?php // endwhile; else: ?>
                                <p><?php //  _e('No posts by this author.'); ?></p>
                        
                            <?php // endif; ?>
                        
                        <!-- End Loop -->

                                                		
                        </div><!--nd info-->
                    </div><!--end post-->
                </div><!--end right-->
                <div class="clearfix">
            </div><!--end single-->
        </div><!--end wrapper-->
    </div><!--end content-->
    <?php  // } ?>
    <?php get_footer();?>