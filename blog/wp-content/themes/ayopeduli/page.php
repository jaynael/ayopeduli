<?php get_header ();?>
<div id="content" class="page">
<?php if (have_posts()):
    the_post(); ?>
	<div class="wrapper">
    	<div class="right">
        	
        	<h1 style="margin:10px 0px;"><?php the_title(); ?></h1>            
                     
            <div class="descripsi">
            <?php the_content(); ?>
            </div>
        </div> 
        
        <div class="left">
    	<?php $defaults = array(
				  'theme_location'  => 'footer_menu', 
				  );
				?>			

				<?php wp_nav_menu( $defaults ); ?>       	
            
        </div><!--end .left-->
       
        <div class="clearfix"></div>
    </div><!--end .wrapper-->
<?php endif; ?>
   <div class="clearfix"></div>
</div><!-- end #content-->

</div>
<div id="footer" style="margin:20px 0px 20px;">
	<div class="wrapper">
		<div class="copyright">&copy; 2014 ayopeduli.com | Yay. Ayo Peduli Nusantara</div>
        <div class="menu-bottom">
        	<a href="/about">About</a>
            <a href="/faq">FAQ</a>
            <a href="/tim">Our Team</a>
            <a href="#">Terms &amp; Condition</a> 
            <a href="/partner">Partner</a>            
        </div>
        <div class="clearfix"></div>
    </div>
</div><!--end #footer-->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-5095553-5']);
  _gaq.push(['_setDomainName', 'ayopeduli.com']);
  _gaq.push(['_setAllowLinker', true]);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<script type='text/javascript'>(function () { var done = false; var script = document.createElement('script'); script.async = true; script.type = 'text/javascript'; script.src = 'https://widget.purechat.com/VisitorWidget/WidgetScript'; document.getElementsByTagName('HEAD').item(0).appendChild(script); script.onreadystatechange = script.onload = function (e) { if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) { var w = new PCWidget({ c: '67641cac-7f29-4dbd-b446-d3df93e5b180', f: true }); done = true; } }; })();</script>


<body>
</body>
</html>