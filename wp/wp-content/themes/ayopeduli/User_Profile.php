<?php
/*
Template Name: Custom_Profiler
*/
?>
<?php
    //load the function that updates the data
    require_once (TEMPLATEPATH . '/Profile/profile.php');
    //load the functions that upload and update the image
    require_once (TEMPLATEPATH . '/Profile/profile_image.php');
    //check if the user is logged in
    if ( is_user_logged_in() ){
        //enter page to use to redirect
        $redirect = '?page_id=122'; //by id
        //$redirect = 'profile';  //by page slug
    
     //media_upload_library_form($e);
        //get current user information
        wp_get_current_user();
        $user_id = $current_user->ID;	
        $meta = get_user_meta($user_id, 'profile');
        $meta = $meta[0];
        $profile_image = get_user_meta($user_id, 'profile_image');
        $profile_image = $profile_image[0];
        
        //check if image upload button was pressed
        if ( isset( $_POST['html-upload'] ) && !empty( $_FILES ) ) {
          profile_image_upload($redirect,$user_id,$profile_image);
        } ?>
<?php get_header();?>
<div id="single">
			<div class="left">
                	<div class="widget profile">                    	
                    	<!--<h2 class="widget-title">Fasilitator<span>  
							<a href="<?php echo esc_url( home_url( '/' ) ); echo 'author/' . get_the_author() . "\n";?>"><?php echo get_the_author(); ?> </a></span></h2>
                        <div class="widget-content">
                        	<!--<div class="image">
                            	<img src="https://fbcdn-photos-a.akamaihd.net/hphotos-ak-ash4/313230_1857581051684_1605603982_1461442_3927779_a.jpg" />
                            	<p>Volunteer</p>
                            </div><!--end image
                        </div><!--end widget content-->
                    </div><!--end widget-->
                </div><!--end left-->
                <div class="right">
                	<div class="post">   
                    <h1><?php the_title(); ?></h1>
                        <div class="info">
	<?php    
        //check if the submit button was pressed
        if (isset($_POST['submit'])) {
           //email validation
           if(is_email($_POST['USER']['user_email'])){
           //if yes, call to update the data	     
             update_data($user_id,$redirect);	
             //if email is invalid, tell the user   
           }else{$message .= 'Invalid%20Email:%20'.$_POST['USER']['user_email'];wp_redirect( home_url().$redirect.'&update='.$message );}
    
         }
    
    ?>
        <h2>
        <?php if(!empty($_GET['update'])){ echo $_GET['update'];}//let the user know if data is updated ?>
        </h2>
        <h4>Welcome, <?php echo $current_user->display_name; ?></h4>
        <?php profile_image_display("medium",$profile_image); ?>
        <h2></h2>
        <!-- The Image Upload Form -->
        <ul id="image-upload">
        <form class="image-upload" id="file-form" enctype="multipart/form-data" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">  
            <li id="async-upload-wrap">  
            <label for="async-upload">Upload</label>  
            <input type="file" id="async-upload" name="async-upload"> <input type="submit" value="Upload" name="html-upload">  
            </li>  
            <!-- multiple file handling 
            <li id="async-upload-wrap">  
            <label for="async-upload">Upload</label>  
            <input type="file" id="async-upload" name="async-upload[]">   
            </li> 
             -->
            <li> 
            <!-- multiple file handling <input type="submit" value="Upload" name="html-upload"> -->
            <input type="hidden" name="post_id" id="post_id" value="1199" />  
            <?php wp_nonce_field('client-file-upload'); ?>  
            <input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>" />  
            </li>   
        </form>
        </ul>
        <!-- End image upload form -->
        
        <!-- The Web Form with user data filled in if any exists -->
        <ul id="stylized">
        <form class="profileform" method="post" action="">       
            
            <li><label for="first_name">First Name </label><input type="text" name="USER[first_name]" value="<?php if(!empty($current_user->user_firstname)){ echo $current_user->user_firstname;} ?>" /></li>
            <li><label for="last_name">Last Name </label><input type="text" name="USER[last_name]" value="<?php if(!empty($current_user->user_lastname)){ echo $current_user->user_lastname;} ?>" /></li>
            <li><label for="user_email">Email </label><input type="text" name="USER[user_email]" value="<?php if(!empty($current_user->user_email)){ echo $current_user->user_email;} ?>" /></li>
            <li><label for="user_pass">Password </label><input type="password" name="USER[user_pass]" value="" /></li>
            
            <li><label for="gender">Gender</label>
            <select name="META[gender]">
              <option <?php if($meta['gender']=='Neutral'){echo 'selected';} ?> value="Neutral">Neutral</option>
              <option <?php if($meta['gender']=='Male'){echo 'selected';} ?> value="Male">Male</option>
              <option <?php if($meta['gender']=='Female'){echo 'selected';} ?> value="Female">Female</option>
            </select><li>
            <li><label for="occupation">Occupation</label><input type="text" name="META[occupation]" value="<?php  if(!empty($meta['occupation'])){ echo $meta['occupation'];}  ?>" /></li>
            <li><label>&nbsp;</label><input type="submit" value="Update Profile" name="submit"/></li>
            
        </form>
        </ul>
       <!-- WEB FORM END -->
       
       <?php
	   $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
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
     <div style="height:100px;"></div>  
    <?php 
    } //end if user logged in
    
    //Else user is not logged in
    else { 
    
     //we give a message telling the user the 'WHY' and the 'HOW'
      echo '<h4>You must be logged in to view this page. </h4>';
      ?>
      <a href="<?php echo wp_login_url( get_permalink() ); ?>" title="Login">Login</a>
    
    <?php } //end else ?>
    
    </div>
    </div><!--end post-->
                </div><!--end right-->
                <div class="clearfix">
 </div><!--end single-->
        </div><!--end wrapper-->
    </div><!--end content-->
<?php get_footer(); ?>
