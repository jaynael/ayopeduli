	<?php
	/*
	Template Name: Login Page
	*/
        get_header();  
?> 
    <div id="content">
    	<div class="wrapper">
        	<div id="single" style="margin:55px auto 10px;">            	
                <div class="login">
                	<div class="post"> 
                       <?php if ( is_user_logged_in() ) {
						    echo "anda berhasil login $user_login <br> Redirect to Home...";
							echo "<script type='text/javascript'>window.location='". get_bloginfo('url') ."'</script>";
                             } 
							else { ?>								
                            <div id="login-form">                  	
                                <h2>Login Form</h2>
                                    <?php  $args = array(
                                    'echo' => true,
                                    //'redirect' => site_url( $_SERVER['REQUEST_URI'] ), 
                                    'redirect' => 'http://localhost/ayopeduli-wp/', 
                                    'form_id' => 'loginform',
                                    'label_username' => __( 'Username' ),
                                    'label_password' => __( 'Password' ),
                                    'label_remember' => __( 'Remember Me' ),
                                    'label_log_in' => __( 'Log In' ),
                                    'id_username' => 'user_login',
                                    'id_password' => 'user_pass',
                                    'id_remember' => 'rememberme',
                                    'id_submit' => 'wp-submit',
                                    'remember' => true,
                                    'value_username' => NULL,
                                    'value_remember' => false );  ?> 
                                    
                                    <?php wp_login_form('$redirect'); 					 
                                    ?> 
                             </div><!--end #login-form-->
                    
                    <?php
					//register action
					require_once(ABSPATH . WPINC . '/registration.php');  
					global $wpdb, $user_ID;  
					//Check whether the user is already logged in  
					if (!$user_ID) {  
					  
						if($_POST){  
							//We shall SQL escape all inputs  
							$username = $wpdb->escape($_REQUEST['username']);  
						   // if(emptyempty($username)) {  
							  //  echo "User name should not be empty.";  
							  //  exit();  
						   // }  
							$email = $wpdb->escape($_REQUEST['email']);  
							if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", $email)) {  
								echo "Please enter a valid email.";  
								exit();  
							}  
					  
								$random_password = wp_generate_password( 12, false );  
								$status = wp_create_user( $username, $random_password, $email );  
								if ( is_wp_error($status) )  
									echo "Username already exists. Please try another one.";  
								else {  
									$from = get_option('admin_email');  
											$headers = 'From: '.$from . "\r\n";  
											$subject = "Registration successful";  
											$msg = "Registration successful.\nYour login details\nUsername: $username\nPassword: $random_password";  
											wp_mail( $email, $subject, $msg, $headers );  
									echo "Please check your email for login details.";  
								}  
					  
							exit();  
					  
						} else {   
					?> 

                         <div id="register-form">
                         	<h2>Register Form</h2>
                            <?php if(get_option('users_can_register')) {  
							//Check whether user registration is enabled by the administrator ?>  							
							  
							<div id="result"></div> <!-- To hold validation results -->  
							<form action="" method="post">  
							<label>Username</label>  
							<input type="text" name="username" class="text" value="" /><br />  
							<label>Email address</label>  
							<input type="text" name="email" class="text" value="" /> <br />  
							<input type="submit" id="submitbtn" name="submit" value="SignUp" />  
							</form> 
                            <script type="text/javascript">  
							//<![CDATA[  
							  
							$("#submitbtn").click(function() {  
							  
							$('#result').html('<img src="<?php bloginfo('template_url') ?>/images/loader.gif" class="loader" />').fadeIn();  
							var input_data = $('#wp_signup_form').serialize();  
							$.ajax({  
							type: "POST",  
							url:  "",  
							data: input_data,  
							success: function(msg){  
							$('.loader').remove();  
							$('<div>').html(msg).appendTo('div#result').hide().fadeIn('slow');  
							}  
							});  
							return false;  
							  
							});  
							//]]>  
							</script>  
							  
							<?php } else echo "Registration is currently disabled. Please try again later."; ?>                           	
                         </div><!--end #regiter-form-->                        
                        
                        <p id="nav">
                        <a id="register-tab">Register | </a>  <a id="login-tab">Login | </a><a href="<?php echo get_option('home'); ?>/wp-login.php?action=lostpassword" title="Password Lost and Found">Lost your password?</a>
                        </p>
                       <?php } ?>
                    </div><!--end post-->
                </div><!--end right-->
                <div class="clearfix">
            </div><!--end single-->
        </div><!--end wrapper-->
    </div><!--end content-->
<?php  
  
    get_footer();  
 } //end of if($_post)  
  
} 
?> 