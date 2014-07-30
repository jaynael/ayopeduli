<?php 
	//include('connection.php');
//			session_start();
//			if (isset($_SESSION['uid'])){
//            header('location:my-profile.php');
//}
?>
<?php $this->load->helper('url');
 $this->load->helper('html');
 $this->load->library('session');
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ayopeduli.com | Login</title>
<?php  $base_url=$this->config->item('base_url'); ?>
<link rel="stylesheet" type="text/css" href="<?php // base_url (); ?><?php echo base_url(); ?>/asset/style/style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/asset/style/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/asset/style/bootstrap-responsive.min.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>/asset/js/jquery-1.7.1.min.js"></script>
    	<script src="<?php echo base_url(); ?>/asset/js/jquery.roundabout.js"></script>
			<script>
                $(document).ready(function() {
                    $('ul#featured').roundabout();
                });
            </script>

</head>
<div id="header">

</div><!-- end #header-->
<div id="login">
	<div class="wrapper">
    	<div class="category">
        	<div class="content-category" style="width:350px; float:none; margin:15px auto 10px; text-align:center;">
            	<div class="image">
                	<a href="index.php"><img src="<?php echo base_url(); ?>/asset/images/logo.png" /></a>
                </div>
                <div class="title">
                	<h2>Login</h2>
                </div>
                <div class="clearfix"></div>
            </div><!-- end.content-category-->
            <div class="item-aksi" style="width: 350px;float: none;margin: 0px auto 20px;padding: 20px;height: auto;">           
                <div id="#result"></div>
                <div class="register">
                	<?php 
					// echo form_open('login/validate');
//					 echo form_input('email', 'email');
//					 echo form_password('password', 'Password');
//					 echo form_submit('submit', 'Login');
//					 echo anchor('login/signup', 'Create Account');
//					 echo form_close();
					 ?>
                	<!--<form role="form" method="post" action="/login/validate/">   -->
                    <?php // echo validation_errors(); ?>
                    
                    <!--Facebook Botton-->
                   		<?php 
							$ses_user=$this->session->userdata('User');		
							
							if(empty($ses_user))   { 
							echo "<a href='#'><img src='$base_url/asset/images/facebook.png' id='facebook'></a>";
							
							 }  else{
								
							 echo '<img src="https://graph.facebook.com/'. $ses_user['id'] .'/picture" width="30" height="30"/><div>'.$ses_user['name'].'</div>';	
								echo '<a href="'.$this->session->userdata('logout').'">Logout</a>';
							
								
								
								
							}
								?>
							
							<div id="fb-root"></div>
							
							   <script type="text/javascript">
							  window.fbAsyncInit = function() {
								  //Initiallize the facebook using the facebook javascript sdk
								 FB.init({ 
								   appId:'<?php echo $this->config->item('appID'); ?>', // App ID 
								   cookie:true, // enable cookies to allow the server to access the session
								   status:true, // check login status
								   xfbml:true, // parse XFBML
								   oauth : true //enable Oauth 
								 });
							   };
							   //Read the baseurl from the config.php file
							   (function(d){
									   var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
									   if (d.getElementById(id)) {return;}
									   js = d.createElement('script'); js.id = id; js.async = true;
									   js.src = "//connect.facebook.net/en_US/all.js";
									   ref.parentNode.insertBefore(js, ref);
									 }(document));
								//Onclick for fb login
							 $('#facebook').click(function(e) {
								FB.login(function(response) {
								  if(response.authResponse) {
									  parent.location ='<?php echo base_url(); ?>login/fblogin'; //redirect uri after closing the facebook popup
								  }
							 },{scope: 'email,read_stream,publish_stream,user_birthday,user_location,user_work_history,user_hometown,user_photos'}); //permissions for facebook
							});
							   </script>
											   <!--end .facebook-->
   					<?php // echo form_open('verifylogin'); ?>
                
                      <div class="form-group">
                        <label for="exampleInputEmail1">Alamat Email :</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password :</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                      </div>                     
                      <button type="submit" name="submit" id="submit" class="btn btn-primary">Login sekarang</button>
                   </form>                   
                </div>
            </div><!--end .item-aksi-->
        </div>        
    </div><!--end .wrapper-->
</div><!-- end #content-->
<?php include"footer.php"; ?>