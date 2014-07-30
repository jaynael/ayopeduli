<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />
		<meta name="author" content="www.frebsite.nl" />
		<meta name="viewport" content="width=device-width initial-scale=1.0 maximum-scale=1.0 user-scalable=yes" />

		<title>jQuery.mmenu - Documentation</title>

		<link type="text/css" rel="stylesheet" href="/mobile/asset/mobile/demo.css" />
		<link type="text/css" rel="stylesheet" href="/mobile/asset/mobile/css/jquery.mmenu.css" />
		<link type="text/css" rel="stylesheet" href="/mobile/asset/mobile/css/extensions/jquery.mmenu.widescreen.css" media="all and (min-width: 900px)" />
		<link type="text/css" rel="stylesheet" href="/mobile/asset/mobile/extensions/jquery.mmenu.themes.css" media="all and (min-width: 900px)" />

		<style type="text/css">
			@media all and (min-width: 900px) {
				html, body {
					height: 100%;
				}
				#menu {
					background: #eee;
				}
				#page {
					border-left: 1px solid #ccc;
					min-height: 100%;
				}
				/* hide open-button */
				a[href="#menu"]
				{
					display: none !important;
				}
			}
		</style>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script type="text/javascript" src="/mobile/asset/mobile/js/jquery.mmenu.js"></script>
		<script type="text/javascript">
			$(function() {
				$('nav#menu').mmenu({
					classes: 'mm-light'
				});
			});
		</script>
	</head>
	<body>
		<div id="page">
			<div id="header">
				<a href="#menu"></a>
				Documentation
			</div>
			
			<nav id="menu">
				<ul>
					<li class="Selected"><a href="index.html">Introduction</a></li>
					<li><a href="horizontal-submenus.html">Horizontal submenus example</a></li>
					<li><a href="vertical-submenus.html">Vertical submenus example</a></li>
					<li><a href="photos.html">Photos in sliding panels</a></li>
					<li><a href="positions.html">Positioning the menu</a></li>
					<li><a href="colors.html">Coloring the menu</a></li>
					<li><a href="advanced.html">Advanced example</a></li>
					<li><a href="onepage.html">One page scrolling example</a></li>
					<li><a href="jqmobile/index.html">jQuery Mobile example</a></li>
				</ul>
			</nav>
		</div>
	</body>
</html>