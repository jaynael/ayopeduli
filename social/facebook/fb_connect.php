<?php
require_once 'facebook.php';
include 'function.php';
$facebook = new Facebook($config);
$user_id = $facebook->getUser();
session_start();
if(stristr($_SERVER['HTTP_REFERER'],'mobile')){
	$_SESSION['is_mobile']="1";
}
?>
<html>
<head>
<title>Processing Facebook Connect</title>
<?php
if ($_SESSION['is_mobile']<>"1"){
?>
<style type="text/css">
<!--
body {
	background-image: url(/images/bg_body1.png);
	background-repeat: repeat;
	background-attachment: scroll;
	background-position: 0% 0%;
	background-clip: border-box;
	background-origin: padding-box;
	background-size: 113px auto;
}
.oneColFixCtr #container {
	position:absolute;
	top:250px;
	left:300px;
	width: 780px;  /* using 20px less than a full 800px width allows for browser chrome and avoids a horizontal scroll bar */
	background: #FFFFFF;
	margin: 0 auto; /* the auto margins (in conjunction with a width) center the page */
	border: 1px solid #000000;
	text-align: left; /* this overrides the text-align: center on the body element. */
}
.oneColFixCtr #mainContent {
	padding: 0 20px; /* remember that padding is the space inside the div box and margin is the space outside the div box */
}
.bar {
	color: rgb(204, 204, 204);
    font-size: 8px;
    background: none repeat scroll 0px 0px rgb(0, 130, 161);
    padding: 7px 14px;
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 20px;
    z-index: 9999;
    box-shadow: -3px 1px 5px rgb(34, 34, 34);
    border: medium none !important;
}
.themes {
    float: left;
	left: 100px;
	top: 50px;
    margin: 0 35%;
    position: absolute;
    width: 320px;
    z-index: 0;
}
-->
</style>
</head>
<body class="oneColFixCtr">
<?php
}else{
?>
</head>
<body>
<?php
}
if ($_SESSION['is_mobile']<>"1"){
?>
<div class="bar">&nbsp;</div>
<div class="logo" style="width:150px; margin:150px auto 0px;"><img alt="logo" src="/addons/default/themes/yot/img/demo/logo-yot.png" width="150px"></a></div>
<!--<div class="themes"><img alt="demo/theme" src="../default/themes/yot/img/demo/theme.png"></div>-->
<div id="mainContent" align="center">
<?php
}
?>
<h3>Your request is being processed ... <br  />Do not press any key ...  <br  /><br  />
<?php
if ($_SESSION['is_mobile']<>"1"){
?>
<img src="/images/framely.gif" border="1"  />  
</div>
<?php
}
?>
</h3>
<?php
if($user_id) {

     try {

			$data = $facebook->api('/me','GET');

			include '../../system/cms/config/database.php';
			mysql_connect('localhost',$db['live']['username'],$db['live']['password']) or die("Error init 1 : ".mysql_error());
			mysql_select_db($db['live']['database']) or die("Error init 2 : ".mysql_error());
			$sql = "SELECT * FROM default_users WHERE email='".$data['email']."' ORDER BY id DESC LIMIT 1";
			$res = mysql_query($sql) or die("Error init 3 : ".mysql_error());
			if(mysql_num_rows($res)==0){
				$sql = "SELECT * FROM default_users WHERE email='".$data['username']."@facebook.com' ORDER BY id DESC LIMIT 1";
				$res = mysql_query($sql) or die("Error init 3 : ".mysql_error());
			}
			if(mysql_num_rows($res)==0){
				$sql = "SELECT * FROM default_profiles WHERE twitter_account='".$data['username']."' ORDER BY id LIMIT 1";
				$res = mysql_query($sql) or die("Error init 3 : ".mysql_error());
				if(mysql_num_rows($res)>0){
					$dtp = mysql_fetch_array($res);
					$sql = "SELECT * FROM default_users WHERE id=".$dtp['user_id'];
					$res = mysql_query($sql) or die("Error init 3 : ".mysql_error());
				}

			}
			if(mysql_num_rows($res)>0){
			
				$row = mysql_fetch_array($res);
				$_SESSION['alt_username'] = $row['username'];
				$_SESSION['alt_email'] = $row['email'];
				$_SESSION['alt_user_id'] = $row['id'];
				$_SESSION['alt_id'] = $row['id'];
				$_SESSION['alt_group'] = 'users';
                        mysql_query("UPDATE default_users SET last_login=UNIX_TIMESTAMP(NOW()) WHERE id=".$row['id']);

           }else{                

              include '../../system/cms/config/database.php';
              mysql_connect('localhost',$db['live']['username'],$db['live']['password']) or die("Error init 1 : ".mysql_error());
              mysql_select_db($db['live']['database']) or die("Error init 2 : ".mysql_error());
			  if(isset($data['email'])){
			  		$email = $data['email'];
			  }else{
			  		$email = $data['username'].'@facebook.com';
			  }
              $sql = "INSERT INTO default_users VALUES ('','".$email."','".$config['secret']."','".substr($data['id'],0,5)."','2','".$_SERVER['REMOTE_ADDR']."','1',NULL,UNIX_TIMESTAMP(NOW()),'0','".$data['username']."',NULL,NULL,'0')";
              mysql_query($sql) or die("Error init 4 : ".mysql_error()); 
			  $res = mysql_query("SELECT max(id) as id FROM default_users");
			  $row = mysql_fetch_array($res);
			  $dir = "/home/youngont/public_html/uploads/default/files/profile/";
			  mkdir($dir.$row['id'],0777);
			  mkdir($dir.$row['id']."/thumb",0777);
			  $pic = get_web_page("http://graph.facebook.com/".$data['id']."/picture?type=large");
			  $pic2 = get_web_page("http://graph.facebook.com/".$data['id']."/picture?type=small");
			  file_put_contents($dir.$row['id']."/".$row['id'].".jpg",$pic);
			  file_put_contents($dir.$row['id']."/thumb/".$row['id'].".jpg",$pic2);
			  $loc = explode(', ',$data['location']['name']);
              $sql = "INSERT INTO default_profiles(user_id,display_name,first_name,last_name,picture,updated_on,first_login,gender,town,location,twitter_account) VALUES('".$row['id']."','".$data['name']."','".$data['first_name']."','".$data['last_name']."','".$dir.$row['id']."/".$row['id'].".jpg"."',UNIX_TIMESTAMP(NOW()),'0','".substr($data['gender'],0,1)."','".$loc[0]."','".$loc[1]."','".$data['username']."')";
              mysql_query($sql) or die("Error init 5 : ".mysql_error()); 
			 file_get_contents("http://www.youngontop.com/forum/add_user.php?username=".$data['username']."&password=".$config['secret']."&email=".$email."&gid=2&key=mysecretkey");
			  $_SESSION['alt_username'] = $data['username'];
			  $_SESSION['alt_email'] = $data['email'];
			  $_SESSION['alt_user_id'] = $row['id'];
			  $_SESSION['alt_id'] = $row['id'];
			  $_SESSION['alt_group'] = 'users';
                          mysql_query("INSERT INTO default_cv(id_user,name,email) VALUES('".$row['id']."','".$data['name']."','".$data['email']."')"); 	
                          mysql_query("INSERT INTO default_quotes(title,slug,user_id,quotes_content,datecreated,set_top,views,status,recordid) VALUES('Hello I am new user','hello-i-am-new-user-".$row['id']."','".$row['id']."','Hello I am new user',NOW(),0,0,0,NULL)");		  

           }
?>
			<script language="javascript">
 <?php 
	if($_SESSION['is_mobile']=="1"){
?>
            	window.location = 'http://mobile.youngontop.com/set_login.php?id=<?=$_SESSION['alt_user_id']?>&email=<?=$_SESSION['alt_email']?>&name=<?=$data['first_name'].' '.$data['last_name']?>';
<?php
	}else{
?>
           		window.location = '../../users/login';
<?php
	}
?>
            </script>
<?php
      } catch(FacebookApiException $e) {

        $login_url = $facebook->getLoginUrl(); 		
       // echo 'Error 1 Please <a href="' . $login_url . '">login.</a>';		
       // error_log($e->getType());
       // error_log($e->getMessage());
?>
	<script language="javascript">
            	window.location = '<?=$login_url?>';
        </script>
<?php

      } 
	  

    } else {

      $login_url = $facebook->getLoginUrl(); 
     // echo 'Error 2 Please <a href="' . $login_url . '">login.</a>';	
?>
	<script language="javascript">
            	window.location = '<?=$login_url?>';
        </script>
<?php
	    
    }



  ?>
</body>
</html>
