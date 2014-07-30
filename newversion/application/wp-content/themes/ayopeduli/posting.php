<?php
/*
Template Name: posting page
*/
if(isset($_POST['new_post']) == '1') {
$post_title = $_POST['post_title'];
$post_category = 'todays_post';
$post_content = $_POST['post_content'];
$post_url = $_POST['post_url'];

$new_post = array(
      'ID' => '',
      'post_author' => $user->ID, 
      'post_category' => array($post_category),
      'post_content' => $post_content,
      'post_title' => $post_title,
      'post_url' => $post_url,
      'post_status' => 'draft'
    );

$post_id = wp_insert_post($new_post);


        if (!function_exists('wp_generate_attachment_metadata')){
            require_once(ABSPATH . "wp-admin" . '/includes/image.php');
            require_once(ABSPATH . "wp-admin" . '/includes/file.php');
            require_once(ABSPATH . "wp-admin" . '/includes/media.php');
        }
         if ($_FILES) {
            foreach ($_FILES as $file => $array) {
                if ($_FILES[$file]['error'] !== UPLOAD_ERR_OK) {
                    return "upload error : " . $_FILES[$file]['error'];
                }
                $attach_id = media_handle_upload( $file, $post_id );
            }   
        }
if ($attach_id > 0){
    $post = get_post($post_id,'ARRAY_A');
    $image = wp_get_attachment_image_src( $attach_id, 'large' );
    $image_tag = '<p><img src="'.$image[0].'" width="'.$image[1].'" height="'.$image[2].'" /></p>';

    //add image under the content
    $post['post_content'] = $image_tag . $post['post_content'];

    //add image above the content
    //$post['post_content'] = $post['post_content'] . $image_tag;

$post_id =  wp_update_post( $post );
}


// This will redirect you to the newly created post
$post = get_post($post_id);
wp_redirect( get_permalink($post_id));
exit();
}      
get_header(); ?>
    <div id="content" style="padding:60px 0px;">
    	<div class="wrapper ">
        	<div id="single">
            <?php if (have_posts()) : while (have_posts()) : the_post();?>            	
                <div class="right">
                	<div class="post">                    	
                    	<h1><?php the_title(); ?></h1>
                        <div class="info">                        	                           
                    		<?php // if ( is_user_logged_in() ) { 
							//the_content(); ?>
                            <section id="container">
                                <h2>Buat project sosial disini, untuk hal yang lebih baik</h2>
                                <form name="hongkiat" id="hongkiat-form" method="post" action="#">
                                <div id="wrapping" class="clearfix">
                                    <section id="aligned">
                                    <input type="text" name="name" id="name" placeholder="Nama Anda" autocomplete="off" tabindex="1" class="txtinput">
                                
                                    <input type="email" name="email" id="email" placeholder="email" autocomplete="off" tabindex="2" class="txtinput">
                                
                                    <input type="tel" name="telephone" id="telephone" placeholder="No Hp" tabindex="4" class="txtinput">
                                
                                    <textarea name="message" id="message" placeholder="Deskripsi Project" tabindex="5" class="txtblock"></textarea>
                                    </section>
                                    
                                    <section id="aside" class="clearfix">
                                        <section id="recipientcase">
                                        <h3>Kategori project:</h3>
                                            <!--<select id="recipient" name="recipient" tabindex="6" class="selmenu">
                                                <option value="staff">Site Staff</option>
                                                <option value="editor">Editor-in-Chief</option>
                                                <option value="technical">Tech Department</option>
                                                <option value="pr">Public Relations</option>
                                                <option value="support">General Support</option>
                                            </select>-->
                                            <?php wp_dropdown_categories( 'show_option_none=Category&tab_index=4&taxonomy=category' ); ?>
                                        </section>
                                       
                                    </section>
                                </div>
                        
                        
                                <section id="buttons">
                                    <input type="reset" name="reset" id="resetbtn" class="resetbtn" value="Reset">
                                    <input type="submit" name="submit" id="submitbtn" class="submitbtn" tabindex="7" value="Submit this!">
                                    <br style="clear:both;">
                                </section>
                                </form>
                            </section>
                            <?php // } 
							//else {
//								echo 'anda harus login dahulu';
//							}
							?>
                        </div><!--nd info-->
                        <?php endwhile;  endif; ?>
                        
                    </div><!--end post-->
                </div><!--end right-->
                <div class="left">
                	<div class="widget profile">
                    	<div class="widget-content">
                        	<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fpages%2FAyoPeduli%2F326964637333186&amp;width=250&amp;height=290&amp;colorscheme=light&amp;show_faces=true&amp;border_color&amp;stream=false&amp;header=true&amp;appId=120839484664810" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:250px; height:290px;" allowTransparency="true"></iframe>
                        </div><!--end widget content-->
                    </div><!--end widget-->
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
                                <?php } ?>
                                <?php endwhile; ?>
                            </ul>
                        </div><!--end widget popular-->
                    
                </div><!--end left-->
                <div class="clearfix">
            </div><!--end single-->
        </div><!--end wrapper-->
    </div><!--end content-->
    <?php get_footer();?>