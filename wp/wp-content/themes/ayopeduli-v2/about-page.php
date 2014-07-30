<?
/*
Template Name: About-page
*/
get_header(); ?>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.7.1.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.jticker.js" type="text/javascript"></script>
<script type="text/javascript">
<!--
  jQuery(document).ready(function(){
	jQuery(".slide-2").hide();
	jQuery(".slide-3").hide();
	jQuery(".slide-4").hide();
	jQuery(".slide-5").hide();
	/*jQuery(".slide2").click(function(){
		jQuery("slide-1").hide();
		jQuery("slide-2").show();
	});*/
    // Instantiate jTicker 
	jQuery("#ticker").ticker({
 		cursorList:  " ",
 		rate:        30,
 		delay:       4000
	}).trigger("play").trigger("stop");

    // Trigger events 
    jQuery(".stop").click(function(){
        jQuery("#ticker").trigger("stop");
        return false;
    });
    
    jQuery(".play").click(function(){
        jQuery("#ticker").trigger("play");
        return false;
    });
    
    jQuery(".speedup").click(function(){
        jQuery("#ticker")
        .trigger({
            type: "control",
            item: 0,
            rate: 10,
            delay: 4000
        })
        return false;
    });
    
    jQuery(".slowdown").click(function(){
        jQuery("#ticker")
        .trigger({
            type: "control",
            item: 0,
            rate: 90,
            delay: 8000
        })
        return false;
    });
    
    jQuery(".next").live("click", function(){
        jQuery("#ticker")
        .trigger({type: "play"})
        .trigger({type: "stop"});
		jQuery("slide-1").hide();
		jQuery("slide-2").show();
        return false;
    });

    jQuery(".style").click(function(){
        jQuery("#ticker")
        .trigger({
            type: "control",
            cursor: jQuery("#ticker").data("ticker").cursor.css({width: "4em", background: "#efefef", position: "relative", top: "1em", left: "-1em"})
        })
        return false;
    });
	
  	
  });

//-->
</script>
<!--<script type="text/javascript" src="<?php// bloginfo('template_directory'); ?>/js/contact-form.js"></script>-->
<div id="content">
	<div class="wrapper content-home">
    	<div class="about">
        	<div class="logo-about">
            	<img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" />
            </div><!--end .logo about--> 
            <ul id="slide">
            	<li class="slide-1"><img src="<?php echo get_template_directory_uri(); ?>/images/slide/slide-1.png" /></li>
                <li class="slide-2"><img src="<?php echo get_template_directory_uri(); ?>/images/slide/slide-2.png" /></li>
            </ul><!--end slider-about-->
            <div id="ticker">
            <div>
              <h3>Apa itu ayopeduli.com ?</h3>
                <p>Ayopeduli.com adalah web apps charity 2.0 yang berperan sebagai new media dalam melaksanakan fundraising sosial untuk sobat yang sedang membutuhkan biaya operasi maupun biaya pendidikan.</p>
                <p>Ayopeduli.com bekerja sama dengan anda para volunteer dan pihak-pihak terkait untuk menjadi sebuah media yang mampu memberikan implikasi positive terhadap masyarakat indonesia secara luas dan masyarakat golongan kurang mampu pada khususnya.</p>
                <a class="next slide2" href="#">next</a>
            </div>
            <div>        	
              <h3>Not my cup of tea, really, ...</h3>
                <p>annoying little blinky things trying to distract attention when you want to get on with the serious business of reading a website, but if it's your thing, here it is.</p>
                <a class="next" href="#">next</a>
            </div>
            <div>
                <h3>jTicker has some neat features:</h3>
                <ul>
                    <li>jTicker can be declared on any element, and it respects that element's DOM tree, printing it back out with the same hierarchy.</li>
                    <li>jTicker handles any number of alternating cursors (or just one).</li>
                    <li>jTicker's cursor container is styleable using the class .cursor, or can be defined as your own jQuery object</li>
                    <li>jTicker reacts to jQuery events "play", "stop" and "control". You can try them out below.</li>
                </ul>
                <a class="next" href="#">next</a>
            </div>
            
            <div>
                <h3>There is one caveat:</h3>
                <ul>
                    <li><span>jTicker can't understand text and children at the same level (I don't know how to do that yet), so if you want some text and then a link, you have to wrap the text in, say, a span, like this:</span>
                        <code>|span| some text |/span| |a|and then a link|/a|</code>
                    </li>
                    <li>But obviously not with those brackets. That's another thing, jTicker is not good at handling html character entities. So make that two caveats.</li>
                </ul>
                <a class="next" href="#">next</a>
            </div>
        </div>  		
	</div><!--end .wrapper-->
</div><!--end content-->
<? get_footer();?>