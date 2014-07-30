<script type="text/JavaScript">
$(document).ready(function() { 

	$('#submit').click(function(e){
	
		// Declare the function variables:
		// Parent form, form URL, email regex and the error HTML
		var $formId = $(this).parents('form');
		var formAction = $formId.attr('action');
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		var $error = $('<span class="error"></span>');

		// Prepare the form for validation - remove previous errors
		$('li',$formId).removeClass('error');
		$('span.error').remove();

		// Validate all inputs with the class "required"
		$('.required',$formId).each(function(){
			var inputVal = $(this).val();
			var $parentTag = $(this).parent();
			if(inputVal == ''){
				$parentTag.addClass('error').append($error.clone().text('Required Field'));
			}
			
			// Run the email validation using the regex for those input items also having class "email"
			if($(this).hasClass('email') == true){
				if(!emailReg.test(inputVal)){
					$parentTag.addClass('error').append($error.clone().text('Enter valid email'));
				}
			}
		});

		// All validation complete - Check if any errors exist
		// If has errors
		if ($('span.error').length > 0) {
			
			$('span.error').each(function(){
				
				// Set the distance for the error animation
				var distance = 5;
				
				// Get the error dimensions
				var width = $(this).outerWidth();
				
				// Calculate starting position
				var start = width + distance;
				
				// Set the initial CSS
				$(this).show().css({
					display: 'block',
					opacity: 0,
					right: -start+'px'
				})
				// Animate the error message
				.animate({
					right: -width+'px',
					opacity: 1
				}, 'slow');
				
			});
		} else {
			$formId.submit();
		}
		// Prevent form submission
			e.preventDefault();
	});
	
	// Fade out error message when input field gains focus
	$('.required').focus(function(){
		var $parent = $(this).parent();
		$parent.removeClass('error');
		$('span.error',$parent).fadeOut();
	});
	$('#left').affix({
					offset: {
					  top: 250
					, bottom: function () {
						return (this.bottom = $('.bs-footer').outerHeight(true))
					  }
					}
				  })
});
</script>
<style type="text/css">
/* Tutorial CSS */
/*Form styles*/
.styled {
}
.styled fieldset { 
padding: 0 25px 20px 25px; 
position: relative;
}
.styled fieldset h3 { 
color: #555;
margin-bottom: 0.5em;
}

.styled label {
display: block; 
font-weight: bold; 
line-height: 24px; 
padding-top: 4px; 
color: #555;
}
.styled label.double {
padding-top: 0; 
line-height: 20px; 
margin-top: -3px;
}
.styled fieldset li.button-row {
margin-bottom: 0; 
padding: 5px 0 0; 
text-align: right;
}
/* Text input styles */
/* Default */
.styled input.text-input {
padding: 5px 8px; 
background: url(images/bg_input.png) no-repeat 0 0;  
border: none;   
font: normal 15px Arial, sans-serif;
color: #333;
line-height: 1em;
}
	/* Form Validation */
.styled span.error {
	font: bold 11px Arial, sans-serif;
	color:#fff;
	text-shadow: 1px 1px 1px #000;
	display: none; 
	background: url(/asset/images/arrow_error.png) no-repeat 0 center; 
	height: 11px;
	padding: 7px 15px 20px 20px; 
	line-height: 1em; 
	position: absolute; 
	top: 3px; 
	right: 0; 
	border-right: 1px solid #6c0202;
}
.styled fieldset li.error input.text-input {
background-position: 0 -64px;
}
</style>
<div id="content" class="page">
	<div class="wrapper">
    	<div class="left" style="width:215px;">
    		<div class="profile-tab">
            	<div class="top">                
                    <div class="pic">
                    	<?php 
						//var_dump(!is_null($user_item['photo']));
						if ($user_item['pic']== 'null'){ ?>
                        <img width="300px" src="/upload/user/0cc783073edbff95b4b94868c1f4e49c.jpg" />                         
                        <?php }else{?> 
                        <img width="300px" src="/upload/partner/<?php echo $user_item['pic']?>" /> 
                        <?php }?>                  
                    </div>
                    <h4 style="margin:10px 0px;"><?php echo $user_item['perusahaan'] ?> </h4>
                    <span style="font-size:14px;text-align:center;margin:5px 0px;">Partner ID : <?php echo $user_item['partid'] ?></span>
                </div>
                
            </div><!-- .end .profile-tab-->
        </div>
        <div class="right" style="width:730px;">
        	<?php if (!isset($thanks)){
				echo "";
			}else{?>
				<div class="alert alert-success"><?php echo $thanks?></div>
			<?php } ?>
            <?php if (!isset($error)){
				echo "";
			}else{?>
				<div class="alert alert-danger"><?php echo $error?></div>
			<?php }			
			?>
            <?php if (!isset($success)){
				echo "";
			}else{?>
				<div class="alert alert-success"><?php echo $success?></div>
			<?php }			
			?>
            <div class="nav-dash">
            	<a href="http://ayopeduli.dev/partner/home" class="btn "> My Promo</a>
                <a href="http://ayopeduli.dev/partner/new_promo" class="btn btn-primary"> + Create Promo</a>
                <a href="#" class="btn "> My Support</a>
                <a href="#" class="btn "> + Give Support</a>
                <a href="#" class="btn "> Setting</a>
            </div>
            <div class="content-dash">
            	<form name="buataksi" method="post" class="styled buataksi" action="/partner/insert_promo" enctype="multipart/form-data">
        
                <div class="section">
                	<label for="exampleInputEmail1"><h3>Judul Promo :</h3></label>
                    <div class="inp">
                    	<input type="text" name="judul" class="input form-control required" id="judul"  value="<?php if (!isset($judul)){
						 }else { echo $judul ; } ?>">
                    </div>
                    <p>Tuliskan judul Promosi sesingkat dan sejelas mungkin, Agar mudah dimengerti oleh donatur dan volunteer, Tersedia <span id="chars">30</span> Karakter</p>                
                   	</div>
                
                <div class="section">
                	<label for="exampleInputEmail1"><h3>Upload logo product :</h3></label>
                    <!--<textarea name="descsingkat" class="desc" style="width: 595px;height: 130px;" ></textarea>-->
                    <div class="inp">
                    	<!--<input type="file" name="pic" class="input form-control" id="pic" >-->
                        <input type="file" name="pic" id="pic" class="input form-control required" size="20" />
                        <input type="hidden" name="submitted" id="submitted" value="true" />
                    </div>
                    <p>Upload logo produk dengan resolusi 600px * 600px untuk hasil yang lebih bagus</p>               
                </div>                
                <script src="/asset/ckeditor/ckeditor.js"></script>
                <script>
					// Remove advanced tabs for all editors.
					CKEDITOR.config.removeDialogTabs = 'image:advanced;link:advanced;flash:advanced;creatediv:advanced;editdiv:advanced';
					CKEDITOR.replace( 'desc' );
				</script>
                <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>-->
  				<script type="text/javascript" src="/asset/js/jquery.number.js"></script>
                <script type="text/javascript">
					$(document).ready(function() {
						$(".datepicker").datepicker();
						//$('.jumlahtarget').number( true, 0 );
						$('#butuh').hide();
						//$('#donasi ').removeClass('required');
						$('.tidak .datepicker').removeClass('required');
						//$('#donasi').change(function(){		
//							$('.gak').hide();	
//							$('#' + $(this).val()).show().addClass('butuh');
//							$('.jumlahtarget').val('').addClass('required');
//							//$('.datepicker').val('').addClass('required');
//						});
						
					});
				</script>
                <div class="section">
                        <label for="exampleInputEmail1"><h3>Jumlah Voucher Promo :</h3></label>
                        <div class="inp">
                        	<select name="tersedia" class="input form-control required">
                            	<option value="15"> 15 Voucher : Rp.300.000</option>
                                <option value="50"> 50 Voucher : Rp.500.000</option>
                                <option value="75"> 75 Voucher : Rp.800.000</option>
                                <option value="100">100 Voucher : Rp.1.200.000</option>
                            </select>
                        </div>
                        <p>Jumlah promo voucher dalam promosi ini.</p>              
                </div>

                <div class="section">
                        <label for="exampleInputEmail1"><h3>Jumlah Poin :</h3></label>
                        <div class="inp">
                        	<select name="poin" class="input required">
                            	<option value="50"> 50 Poin</option>
                                <option value="100"> 100 Poin</option>
                                <option value="200"> 200 Poin</option>
                                <option value="500"> 500 Poin</option>
                            </select>
                        </div>
                        <p>Jumlah poin yang bisa di tukar dengan promo ini.</p>              
                </div>
                <div class="section">
                	<label for="exampleInputEmail1"><h3>Deskripsi Promosi</h3></label>
                    <div class="inp">
                    <textarea  cols="80" id="desc" name="deskripsi" rows="20" class="form-control required">
                    <?php if (!isset($desc)){?> <h2><strong><span style="line-height:1.2em">Short Summary :</span></strong></h2>

<p>Contributors fund ideas they can be passionate about and to people they trust. Here are some things to do in this section:</p>

<ul>
	<li>Introduce yourself and your background.</li>
	<li>Briefly describe your campaign and why it&#39;s important to you.</li>
	<li>Express the magnitude of what contributors will help you achieve.</li>
</ul>

<p>Remember, keep it concise, yet personal. Ask yourself: if someone stopped reading here would they be ready to make a contribution?</p>

<h2><strong>What We Need &amp; What You Get :</strong></h2>

<p>Break it down for folks in more detail:</p>

<ul>
	<li>Explain how much funding you need and where it&#39;s going. Be transparent and specific&mdash;people need to trust you to want to fund you.</li>
	<li>Tell people about your unique perks. Get them excited!</li>
	<li>Describe where the funds go if you don&#39;t reach your entire goal.</li>
</ul>

<h2><strong>The Impact</strong></h2>

<p>Feel free to explain more about your campaign and let people know how the difference their contribution will make:</p>

<ul>
	<li>Explain why your project is valuable to the contributor and to the world.</li>
	<li>Point out your successful track record with projects like this (if you have one).</li>
	<li>Make it real for people and build trust.</li>
</ul>

<h2><strong>Other Ways You Can Help</strong><br />
<span style="font-size:13px; line-height:1.6em">Some people just can&#39;t contribute, but that doesn&#39;t mean they can&#39;t help:</span></h2>

<ul>
	<li>Ask folks to get the word out and make some noise about your campaign.</li>
	<li>Remind them to use the Indiegogo share tools!</li>
</ul>

<p>&nbsp;</p>

<h2><strong>And that&#39;s all there is to it.</strong></h2>
<?php }else{?>
<?php echo $desc;
} ?>
</textarea>
</div>
                    <p>Jelaskan secara lengkap tentang promosi ini</p>    
                    <script>
						// Remove advanced tabs for all editors.
						//CKEDITOR.config.removeDialogTabs = 'image:advanced;link:advanced;flash:advanced;creatediv:advanced;editdiv:advanced';
						CKEDITOR.replace( 'desc' );
						CKEDITOR.plugins.add('ajaxsave',
						{
							init: function(editor)
							{
								var pluginName = 'ajaxsave';
								editor.addCommand( pluginName,
								{
									exec : function( editor )
									{
										$.post("result.php", {
											data : editor.getSnapshot()
										} );
									},
									canUndo : true
								});
								editor.ui.addButton('Ajaxsave',
								{
									label: 'Save Ajax',
									command: pluginName,
									className : 'cke_button_save'
								});
							}
						});
					</script>           
                </div>
                
               <input type="hidden" name="partid" class="input form-control" id="partid" value="<?php echo $user_item['partid'] ?>" >
               <input type="hidden" name="email" class="input form-control" id="email" value="<?php  echo $user_item['email'] ?>" >
               
               <div class="submit">
               			<button name="submit" id="submit" class="btn btn-submit btn-primary"> Buat Promo Sekarang </button>
               </div>
            </form>
<script src="/asset/js/jquery.tinylimiter.js"></script>
<script>
$(document).ready( function() {
	var elem = $("#chars");
	$("#judul").limiter(30, elem);
//	
//	var elemdescing = $("#elemdescing");
//	$("#descsing").limiter(70, elemdescing);
});
</script>
            </div>
        </div>        
        <div class="clearfix"></div>
    </div><!--end .wrapper-->
</div><!-- end #content-->