<?php $this->load->helper('url'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ayopeduli.com | <?php echo $title  ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/asset/style/style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/asset/style/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/asset/style/bootstrap-2.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/asset/style/bootstrap-responsive.min.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>/asset/js/jquery-1.7.1.min.js"></script>
    	<script src="<?php echo base_url(); ?>/asset/js/jquery.roundabout.js"></script>
			<script>
                $(document).ready(function() {
                    $('ul#featured').roundabout();
                });
            </script>
<script type="text/javascript" src="<?php echo base_url(); ?>/asset/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/asset/js/affix.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/asset/js/tab.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<!--<script src="http://code.jquery.com/jquery-1.9.1.js"></script>-->
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

</head>
<div id="header">
	<div class="wrapper">
    	<div class="logo"><a href="/"><img src="<?php echo base_url(); ?>/asset/images/logo.png" /></a></div>  
        <div class="main-menu">
        	<ul>
            	<li>
                	<a href="#"><img src="<?php echo base_url(); ?>/asset/images/Kesehatan.png" /><span>Kesehatan</span></a>
                </li>
                <li>
                	<a href="#"><img src="<?php echo base_url(); ?>/asset/images/education.png" /><span>Pendidikan</span></a>
                </li>
                <li>
                	<a href="#"><img src="<?php echo base_url(); ?>/asset/images/lingkungan.png" /><span>Lingkungan</span></a>
                </li>
                <div class="clearfix"></div>
            </ul>
        </div>      
        <div class="menu-top">
        	<?php
			//include('connection.php');
			//session_start();
			if (!isset($_SESSION['uid'])){?>
			
            <div class="login-sosial">
                        <!--<a class="" href="https://www.youngontop.com/addons/facebook/fb_connect.php"><img width="150px" src="images/facebook.png" /></a>
                        <a class="" href="https://www.youngontop.com/addons/twitter/tw_connect.php"><img width="150px" src="images/twitter.png" /></a>-->
                        <a href="<?php echo base_url(); ?>login" class="btn btn-primary">login</a> 
                        <a href="<?php echo base_url(); ?>register" class="btn btn-primary" >Register</a>                          
            </div>
            <div class="clearfix"></div>
        	<!--<form class="form-inline" method="post" role="form" style="margin:0px 0px 15px 85px;" action="process.php">
              <div class="form-group">
                <label class="sr-only" for="exampleInputEmail2">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail2" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label class="sr-only" for="exampleInputPassword2">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
              </div>              
              <button type="submit" name="submit" class="btn btn-primary">Sign in</button>
              <a href="register.php" class="btn btn-primary">Register</a>
            </form> -->
			<?php } else { ?>
			<?php  //mag show sang information sang user nga nag login
			$member_id=$_SESSION['uid'];
			
			$result=mysql_query("select * from ap_user where uid='$member_id'")or die(mysql_error);
			$row=mysql_fetch_array($result);
			
			$panggilan=$row['panggilan']; ?>
			 <div class="profile-top" style="margin: 20px 0px 11px;text-align: right;">
             	Hi <a title="Go To My Profile" href="my-profile.php?uid=<?php echo "$member_id"; ?>"><?php echo "$panggilan"; ?></a>, <a href="logout.php">Logout</a>
             </div>
			<?php } ?>
        	       	
            
            <div class="clearfix"></div>
        	<!--<ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Cara Kerja</a></li>        
                <li><a href="#">Aksi Sosial</a></li>
                <li><a href="#">Partner</a></li>
                <li class="last"><a href="#">Donasi</a></li>
                <div class="clearfix"></div>
            </ul>-->
        </div>
        <div class="clearfix"></div>
    </div>

</div><!-- end #header-->
