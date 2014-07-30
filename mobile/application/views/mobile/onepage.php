<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />
		<meta name="author" content="www.frebsite.nl" />
		<meta name="viewport" content="width=device-width initial-scale=1.0 maximum-scale=1.0 user-scalable=yes" />

		<title>jQuery.mmenu - Examples</title>

		<link type="text/css" rel="stylesheet" href="demo.css" />
		<link type="text/css" rel="stylesheet" href="../src/css/jquery.mmenu.all.css" />
		
		<!-- for the one page -->
		<style type="text/css">
			#intro,
			#first,
			#second,
			#third
			{
				height: 400px;
			}
			#intro
			{
				padding-top: 40px;
			}
			#first,
			#second,
			#third
			{
				border-top: 1px solid #ccc;
				padding-top: 60px;
			}
		</style>
		
		<!-- for the fixed header -->
		<style type="text/css">
			#header,
			#footer
			{
				position: fixed;
				width: 100%;

				-webkit-box-sizing: border-box;
				-moz-box-sizing: border-box;
				-ms-box-sizing: border-box;
				-o-box-sizing: border-box;
				box-sizing: border-box;
			}
		</style>
		
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script type="text/javascript" src="../src/js/jquery.mmenu.js"></script>
		<script type="text/javascript">
			$(function() {
				var $menu = $('nav#menu'),
					$html = $('html, body');

				$menu.mmenu();
				$menu.find( 'li > a' ).on(
					'click',
					function()
					{
						var href = $(this).attr( 'href' );

						//	if the clicked link is linked to an anchor, scroll the page to that anchor 
						if ( href.slice( 0, 1 ) == '#' )
						{
							$menu.one(
								'closed.mm',
								function()
								{
									setTimeout(
										function()
										{
											$html.animate({
												scrollTop: $( href ).offset().top
											});	
										}, 10
									);	
								}
							);						
						}
					}
				);
			});
		</script>
	</head>
	<body>
		<div id="page">
			<div id="header" class="mm-fixed-top">
				<a href="#menu"></a>
				Examples
			</div>
			<div id="content">
				<div id="intro">
					<p>This is the <strong>one page scrolling example</strong> demo page.<br />
						Click the menu-button in the header to open the menu.</p>
	
					<p>This page has a fixed header and a fixed footer.</p>
					<p>The links in the menu link to a section on the same page, some small javascript makes the page scroll smoothly.</p>
				</div>
				<div id="first">
					<p><strong>This is the first section.</strong><br />
						<a href="#menu">Open the menu</a></p>
				</div>
				<div id="second">
					<p><strong>This is the second section.</strong><br />
						<a href="#menu">Open the menu</a></p>
				</div>
				<div id="third">
					<p><strong>This is the third section.</strong><br />
						<a href="#menu">Open the menu</a></p>
				</div>
			</div>
			<div id="footer" class="mm-fixed-bottom">
				Fixed footer :-)
			</div>
			<nav id="menu">
				<ul>
					<li><a href="index.html">Introduction</a></li>
					<li><a href="horizontal-submenus.html">Horizontal submenus example</a></li>
					<li><a href="vertical-submenus.html">Vertical submenus example</a></li>
					<li><a href="photos.html">Photos in sliding panels</a></li>
					<li><a href="positions.html">Positioning the menu</a></li>
					<li><a href="colors.html">Coloring the menu</a></li>
					<li><a href="advanced.html">Advanced example</a></li>
					<li class="Selected">
						<a href="onepage.html">One page scrolling example</a>
						<ul>
							<li><a href="#content">Introduction</a></li>
							<li><a href="#first">First section</a></li>
							<li><a href="#second">Second section</a></li>
							<li><a href="#third">Third section</a></li>
						</ul>
					</li>
					<li><a href="jqmobile/index.html">jQuery Mobile example</a></li>
				</ul>
			</nav>
		</div>
	</body>
</html>