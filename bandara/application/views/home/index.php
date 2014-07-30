<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title><?php echo $this->config->item('site_name').' - '.$this->config->item('site_description');?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <script type="text/javascript" src="<?php echo base_url();?>asset/javascript/jquery.js"></script>
    <script type='text/javascript' src='<?php echo base_url();?>asset/plugin/lightbox/facebox.js'></script>
    <script type="text/javascript" src="<?php echo base_url();?>asset/plugin/calendar/jquery.calendar.js" ></script>
    <script type="text/javascript" src="<?php echo base_url();?>asset/javascript/date-picker.js" ></script>
    <script type='text/javascript'>
        var site = "<?php echo site_url()?>";
        var loading_image_large = "<?php echo base_url();?>asset/images/loading_large.gif";
        var loading_image_small = "<?php echo base_url();?>asset/images/loading.gif";
    </script>
    <script type="text/javascript" src="<?php echo base_url();?>asset/javascript/app.js" ></script>
    <script>
		function load_submit(div){
			var image_load = "<div class='ajax_loading'><img src='"+loading_image_large+"' /></div>";
			$.ajax({
				beforeSend: function(){
					$(div).html(image_load);
				},
				success: function(response){
				},
				dataType:"html"
			});
		}
		function show(page,div){
			do_scroll(0);
			var image_load = "<div class='ajax_loading'><img src='"+loading_image_large+"' /></div>";
			var site = "<?php echo site_url()?>";
			$.ajax({
				url: site+"/"+page,
				beforeSend: function(){
					$(div).html(image_load);
				},
				success: function(response){			
					$(div).html(response);
				},
				dataType:"html"
			});
			return false;
		}
	</script>
	<script type="text/javascript">
	function fokus(){
		document.getElementById('user').focus();	
	}
	function showClock(){
		// now = new Date();
		var clock=new Date();
		var hours=clock.getHours();
		var minutes=clock.getMinutes();
		var seconds=clock.getSeconds();
		// var hari=now.getDay();
		// for a nice disply we'll add a zero before the numbers between 0 and 9
		if (hours<10){
			hours="0" + hours;
		}
		if (minutes<10){
			minutes="0" + minutes;
		}
		if (seconds<10){
			seconds="0" + seconds;
		}
		document.getElementById('tampilJam').innerHTML=hours+":"+minutes+":"+seconds;
		t=setTimeout('showClock()',500);
	}
	function tanyax(){
		if(confirm('KONFIRMASI LogOut\nUntuk Keluar Dari Aplikasi Tekan Tombol OK')){
			return true;
		}else{
			return false;
		}
	}
	</script>
    <link href="<?php echo base_url();?>asset/theme/style.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>asset/theme/print_style.css" rel="stylesheet" type="text/css" media='print'/>
    <link href="<?php echo base_url();?>asset/plugin/lightbox/facebox.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>asset/theme/topmenu.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>asset/plugin/calendar/jquery.calendar.css" rel="stylesheet"  type="text/css" />
    <link rel="shorcut icon" href="<?php echo base_url()?>asset/images/favicon.png" />
</head>
<body onload="showClock(); fokus();">
    <div id='container'>
        <div id='header'>
            <div class='logo'>
				<span style="float:right;"></span>
			</div>
			<div class='clock'><div id='day'><?php echo hari().', '.tgl_indo(date('Y-m-d'),1);?></div><div id="tampilJam"></div></div>
            <div class='tabs'>
                <?php echo anchor(base_url(),'Beranda','class="tab"');?>
                <?php
                if(is_logged_in())
                {
                    ?>
					<a href='javascript:void(0);' class="tab" onclick='load("area","#content");'>Data Area</a>
                    <a class='tab' onclick='return tanyax()' href='<?php echo site_url('home/logout');?>' >Logout</a>
                    <?php
                }
                ?>
            </div>
        </div>
        <div id='content'>
            <?php
            if(!is_logged_in()){
				$data = $this->auth->setChaptcha();
				$this->load->view('home/login_form',$data);
            }else{
                $this->load->view('home/home_v');
            }
            ?>
        </div>
        <div id='footer'>
			<div id='footer-profil'>
				<!-- Foot identitas -->
			</div>
            <div class='left_footer'>
				<!-- Foot Left Identitas -->
			</div>
        </div>
    </div>
</body>
</html>