    <div id="footer">
        <div class="wrapper">
            <div class="left-menu">
            	<?php $defaults = array(
				  'theme_location'  => 'footer_menu', 
				  );
				?>
				
				<?php wp_nav_menu( $defaults ); ?> 
                <!--<ul>
                    <li><a href="#">Donatur relations</a></li>
                    <li><a href="#">About </a></li>
                    <li><a href="#" class="last">Report</a></li>
                </ul>-->
            </div><!--end-->
            <div class="right-menu">
                Copyright &copy; 2012 | ayopeduli.com
            </div><!--end rightmenu-->
            <div class="clearfix"></div>
        </div>
    </div><!--end footer-->
</div><!--end universe-->
 <!-- Once the page is loaded, initalize the plug-in. -->
 						<!--<script src="<?php // echo get_template_directory_uri(); ?>/js/bootstrap.js"></script>
                        <script src="<?php // echo get_template_directory_uri(); ?>/js/bootstrap-modal.js"></script>-->
                                               
						  
<script type="text/javascript">
                            jQuery(document).ready(new function() {								
								//login or register page
								jQuery('#register-form').hide();
								jQuery('#login-tab').hide();
								jQuery('#register-tab').click(function(){
									jQuery('#register-form').show('slow');
									jQuery('#login-form').hide('slow');
									jQuery('#login-tab').show();
									jQuery('#register-tab').hide();
								jQuery('#login-tab').click(function(){
									jQuery('#register-form').hide('slow');
									jQuery('#login-form').show('slow');
									jQuery('#login-tab').hide();
									jQuery('#register-tab').show();
									})
								});
								$('.modal').hide();
								$('#tab-donasi').click(function(){
									$('#donasi').show('slide');
									$('#konfirmasi').hide('slide');
									$('#close-donasi').click(function(){
										$('#donasi').hide('slide');
									})
								})
								$('#tab-konfirmasi').click(function(){
									$('#konfirmasi').show('slide');
									$('#donasi').hide('slide');
									$('#close-konfirmasi').click(function(){
										$('#konfirmasi').hide('slide');
									})
								})
								$('#formBuilderSuccess').show();								
										$('#donasi').click( function() {
											$('#myModal').show('slow');
											$('button.close').show();
											$('button.close').click( function() {
												$('#myModal').hide('slow');
												}
												);
											}																				
										);
								$(".input-prepend").blur(function(){
								    // take US format text into std number format
								   var number = $(this).parseNumber({format:"#,###.00", locale:"us"}, false);
								   // write the number out
								   $("#prependedInput").val(number);

								});
                              // Prepare layout options.
                              var options = {
                                autoResize: true, // This will auto-update the layout when the browser window is resized.
                                container: jQuery('#wookmark'), // Optional, used for some extra CSS styling
                                offset: 2, // Optional, the distance between grid items
                                itemWidth: 218 , // Optional, the width of a grid item
                              };
                              
                              // Get a reference to your grid items.
                              var handler = jQuery('#tiles li');
                              
                              // Call the layout function.
                              handler.wookmark(options);
                              
                              // Capture clicks on grid items.
                              handler.click(function(){
                                // Randomize the height of the clicked item.
                               // var newHeight = jQuery('img', this).height() + Math.round(Math.random()*300+30);
                               // jQuery(this).css('height', newHeight+'px');
                                
                                // Update the layout.
                                handler.wookmark();
                              });
							  
							});
							
							
                          </script>
</body>
</html>
