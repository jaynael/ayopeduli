<? get_header(); ?>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.waterwheelCarousel.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.validationEngine-en.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.validationEngine.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function() {				
	// SUCCESS AJAX CALL, replace "success: false," by:     success : function() { callSuccessFunction() }, 
		$("#form1").validationEngine({
			ajaxSubmit: true,
			ajaxSubmitFile: "<?php bloginfo('template_directory'); ?>/ajaxSubmit.php",
			ajaxSubmitMessage: "Terima kasih atas donasi anda, kami akan segera menghubungi anda untuk proses selanjutnya  !!",
			success :  false,
			failure : function() {alert('Fail to submit')}
			})
		$('.box').hide();
		$('.active').hide();
		$('#dropdown').change(function() {
			$('.box').hide();
			$('.active').hide();
			//$('#div' + $(this).val()).show();
			$('#' + $(this).val()).show('slide');
		});	
		$("#waterwheel-carousel-flat").waterwheelCarousel({
				itemSeparationFactor: 1,
				itemDecreaseFactor: 1,
				waveSeparationFactor: 1,
				startingWaveSeparation: 0,
				startingItemSeparation: 280,
				centerOffset: 10,
				opacityDecreaseFactor: .3,
				autoPlay: 3000,
				edgeReaction: 'reverse'
			});	
	});
</script>

<!--<script type="text/javascript" src="<?php// bloginfo('template_directory'); ?>/js/contact-form.js"></script>-->
<div id="content">
    	<div class="wrapper content-home">
        	<div class="top">
            	<!--<div class="ads-left">
                	<a href="<?php // echo esc_url( home_url( '/beriklan' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/banner/banner.gif" alt="" /></a>
                </div>
        		<div id="logo"><a href="<?php // echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" /></a><span>Beta</span></div>
				<div class="ads-right">
                	<a href="<?php // echo esc_url( home_url( '/beriklan' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/banner/banner.gif" alt="" /></a>
                </div>
                <div class="clearfix"></div>-->
                <div id="waterwheel-carousel-flat">
                          <!--<div class="carousel-controls">
                            <div class="carousel-prev"><a href="#">&lt; previous</a></div>
                            <div class="carousel-next"><a href="#">&gt; next</a></div>
                          </div>-->
                          <div class="carousel-images">
                            <?php

                               // $pc = new WP_Query('orderby=comment_count&posts_per_page=5&category=sobat'); 

							   $pc = new WP_Query('posts_per_page=5');
								while ($pc->have_posts()) : $pc->the_post() ; ?>
                                <?php if ( in_category( array( 'sobat', 'yayasan', 'program' ) )) { ?>
                                    <div><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail(array(500,500)); ?>
                                    	
                                    </a></div>

                                <? } ?>

                                <?php endwhile; ?>
                          </div>
                  </div>
            </div><!--end top-->
            <?php if (have_posts()):
    the_post(); ?>
            <div id="single">                       
                <div class="right">
                	<div class="post">                    	
                    	<h1><?php the_title(); ?></h1>
                        <p>Date post : <?php the_time('F jS, Y') ?></p>
                        <div class="info">
                         <div class="modal" id="donasi">
                                    <div class="modal-header">
                                    <button class="close" id="close-donasi" >×</button>
                                    <h2>Form Donasi Ayopeduli.com</h2>
                                    </div> 
                                    <div class="modal-body">
                                    <form class="form" id="form1" method="post" action="">
                               			<div class="modal-body">
                                        	<ul class="forms">
                                            	<li><label for="name">Name</label>
                                                	<input type="text" name="name"  class="validate[required,custom[onlyLetter],length[0,100]] text-input" id="name" placeholder="Nama anda"/>
                                            	</li>
                                                <li><label for="email">email</label>
                                                    <input type="text" placeholder="Email" name="email" class="validate[required,custom[email]] text-input" id="email"/>
                                                    <input type="hidden" name="untuk" id="untuk" value="<?php the_title(); ?>" />
                                                    <input type="hidden" name="link" id="link" value="<?php the_permalink(); ?>" />
                                                </li>
                                                <li><label for="email">No. Hp</label>
                                                    <input type="text" placeholder="No. Hp" name="hp" class=" text-input" id="hp"/>
                                                </li>
                                            	<li><label for="contactName">Jumlah Donasi</label>                                     
													<div class="input-prepend">
                                                    	<span class="add-on">Rp.</span>
                                                    	<!--<input id="prependedInput" name="web" placeholder="masukan jumlah donasi" class="span2" type="text" size="16">-->
                                                        <select name="web" id="dropdown">
                                                        	<option value="min0">--pilih range donasi--</option> 
                                                            <option value="min1">Rp.50.000 - Rp.200.000</option>        
                                                            <option value="min2">Rp.200.000 - Rp.300.000</option>        
                                                            <option value="min3">Rp.300.000 - Rp.500.000</option>        
                                                            <option value="min4">Rp.500.000 - Rp.1.000.000</option>
                                                            <option value="min5">Lainnya</option>        
                                                        </select>                                                        
                                                        <div id="min1" class="active">
                                                        	Reward<br /> mug cantik                                                        
                                                        </div>
                                                        <div id="min2" class=" active">
                                                        	Reward <br /> topi keren                                                       
                                                        </div>
                                                        <div id="min3" class="active">
                                                        	Reward <br />payung ayopeduli                                                        
                                                        </div>
                                                        <div id="min4" class="active">
                                                        	Reward <br />kaos ayopeduli                                                        
                                                        </div>
                                                        <div id="min5" class="active">
                                                        	masukan jumlah lengkapnya<br />
                                                        	<input id="prependedInput" name="jml" value="0" placeholder="masukan jumlah donasi" class="span2" type="text" size="16">                                                     
                                                        </div>
                                                        <div id="min0" class="wewe">
                                                        	                                                        
                                                        </div>

                                                	</div>
                                            	</li>
                                                <!--<li><label for="contactName">Pembayaran</label>    
                                                    <select name="via">
                                                        <option>Donasi Via</option>
                                                        <option>BCA (1330-16-5592)</option>
                                                        <option>BRI</option>
                                                        <option>Paypal</option>
                                                    </select>
                                                </li>-->
                                                <li class="textarea"><label for="commentsText">Alamat</label>
                                                    <textarea name="text" class="validate[required,length[6,300]] text-input" id="comment" cols="30" rows="5"></textarea>
    
                                                </li>
                                                <li><input class="btn btn-primary" type="submit" value="Submit" id="send" /></li>
                                            </ul>
                                    </div>
                                    <!--<div class="modal-footer">                                          

                                    </div>-->
                                    </form> 
                                   	</div>
                                    </div>
                                    <div class="modal" id="konfirmasi">
                                    	<div class="modal-header">
                                    		<button class="close" id="close-konfirmasi" >×</button>
                                    		<h2>Konfirmasi Donasi Ayopeduli.com</h2>
                                   	 	</div>
                                     	<form action="<?php the_permalink(); ?>" id="contactForm" method="post">
                               			 	<div class="modal-body">
                                        		<ul class="forms">
                                            		<li><label for="contactName">Name</label>
                                                	<input type="text" name="contactName" placeholder="Nama anda" id="contactName"  class="requiredField" />
                                            		</li>
                                                    <li><label for="contactName">Jumlah Donasi</label> 
                                                        <div class="input-prepend">
                                                            <span class="add-on">Rp.</span>
                                                            <input id="prependedInput" placeholder="masukan jumlah donasi" class="span2" type="text" size="16">        
                                                        </div>        
                                                    </li>
                                                    <li><label for="contactName">Pembayaran</label>
                                                        <select name="via">
                                                            <option>Donasi Via</option>        
                                                            <option>BCA (1330-16-5592)</option>        
                                                            <option>BRI</option>        
                                                            <option>Paypal</option>        
                                                        </select>        
                                                    </li>         
                                                    <li><label for="contactName">No.Hp</label>        
                                                        <input id="prependedInput" name="hp" placeholder="No.hp" class="span2" type="text" size="16">        
                                                    </li>     
                                                    <li><label for="email">email</label>
                                                        <input type="text" placeholder="Email" name="email" id="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="requiredField email" />        
                                                        <input type="hidden" name="untuk" id="untuk" value="<?php the_permalink(); ?>" />        
                                                    </li>
                                                    <li class="textarea"><label for="commentsText">Alamat</label>
        
                                                        <textarea name="comments" placeholder="Alamat anda" id="commentsText" rows="5" cols="30" class="requiredField"><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>        
                                                    </li>        
                                                    <!--<li class="inline" style="display:none"><input type="checkbox" name="sendCopy" id="sendCopy" checked="checked" value="true"<?php // if(isset($_POST['sendCopy']) && $_POST['sendCopy'] == true) echo ' checked="checked"'; ?> /><label for="sendCopy">Send a copy of this email to yourself</label></li>
        
                                                   <!-- <li class="screenReader"><label for="checking" class="screenReader">If you want to submit this form, do not enter anything in this field</label><input type="text" name="checking" id="checking" class="screenReader" value="<?php // if(isset($_POST['checking']))  echo $_POST['checking'];?>" /></li>-->
        
                                                    <!--<li class="buttons"><input type="hidden" name="submitted" id="submitted" value="true" /><button type="submit">Email me &raquo;</button></li>-->
        
                                                    <li><label></label><input class="btn btn-primary" type="submit" value="Submit" id="send" /></li>
        
                                                </ul>        
                                            </div>
                                    	</form> 

                                    </div>
                            
                    		<?php 
							the_content(); ?>
                        </div><!--nd info-->
                        <?php $args = array(
							'walker'            => null,
							'style'             => 'ul',
							'callback'          => null,
							'end-callback'      => null,
							'type'              => 'all',
							'page'              => 2,
							'per_page'          => 5,
							'avatar_size'       => 32,
							'reverse_top_level' => null,
							 ); ?>
                            <div class="commentlist"><?php wp_list_comments(array('style' => 'div')); ?></div>
                        <?php endif; ?>
                        <div id="fb-root"></div>  
						<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>  
                        <fb:comments href="<?php the_permalink(); ?>" width="775"></fb:comments> 
                    </div><!--end post-->
                    <?php
						$tags = wp_get_post_tags($post->ID);
						if ($tags) {
							$tag_ids = array();
							foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
							$args=array(
								'tag__in' => $tag_ids,
								'post__not_in' => array($post->ID),
								'showposts'=>5, // Number of related posts that will be shown.
								'caller_get_posts'=>1
							);
							$my_query = new wp_query($args);
							if( $my_query->have_posts() ) {
								echo '<h3>Related Posts</h3><ul>';
								while ($my_query->have_posts()) {
									$my_query->the_post();
								?>
									<li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
								<?php
								}
								echo '</ul>';
							}
						}
						?>
                </div><!--end right-->
                <div class="left">
                	<div class="widget profile">
                    

                        <div class="widget-popular">

                        	<h2 class="widget-title">Popular Project</h2>

                        	<ul id="popular-comments">

								<?php

                               // $pc = new WP_Query('orderby=comment_count&posts_per_page=5&category=sobat'); 

							   $pc = new WP_Query('orderby=comment_count&posts_per_page=5');?>

                                

                                <?php while ($pc->have_posts()) : $pc->the_post() ; ?>

                                	<?php if ( in_category( array( 'Sobat', 'yayasan', 'program' ) )) { ?>

                                    <li>

                                    

                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail(array(60,60)); ?></a>

                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>

                                    

                                    <p>Posted by <strong><?php the_author() ?></strong> on the

                                        <?php the_time('F jS, Y') ?> with

                                        <?php // comments_popup_link('No Comments;', '1 Comment', '% Comments'); ?>

                                        <fb:comments-count href=<?php the_permalink(); ?>></fb:comments-count> comments</p>

                                    </li>

                                <? } ?>

                                <?php endwhile; ?>

                            </ul>

                        </div><!--end widget popular-->

                    </div><!--end widget-->

                    </div>

                </div><!--end left-->

                <div class="clearfix">

            </div><!--end single-->

        </div><!--end wrapper-->

    </div><!--end content-->
    

    <?php  // } ?>

    <? get_footer();?>