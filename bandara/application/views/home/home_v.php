<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Peta Bandara Adisucipto Yogyakarta</title>
<link href="<?php echo base_url()?>asset/theme/default.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url()?>asset/js/jquery.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>asset/js/mobilymap.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>asset/js/init.js" type="text/javascript"></script>
</head>

<body>
	<ul style="float:right;" class="map_buttons">
		<?php foreach($browse_area->result() as $ba): ?>
		<li><a href="#" rel="<?php echo 'p-'.$ba->koordinat1.'-'.$ba->koordinat2?>"><?php echo $ba->nama?></a></li>
		<?php endforeach ?>
	</ul>	
	<div class="bandara_map">
		<img src="<?php echo base_url()?>asset/images/bandara.jpg" alt="Peta Bandara Adisucipto Yogyakarta" width="1475" height="1200" />
	<?php foreach($browse_area->result() as $ba2): ?>
		<div class="point" id="<?php echo 'p-'.$ba2->koordinat1.'-'.$ba2->koordinat2?>">
			<span><?php echo $ba2->nama?> <img src="asset/images/fotoarea/<?php echo $ba2->foto?>" width="240" /></span>
			<p><?php echo $ba2->tooltip?></p>
			<a href="#">selengkapnya</a>
		</div>
	<?php endforeach ?>
	</div>
</body>
</html>