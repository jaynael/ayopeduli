<?php
/*
Template Name: posting page
*/
get_header();
?>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/1.8.6/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.inputfocus-0.9.min.js"></script>
<!--<script type="text/javascript" src="<?php // echo get_template_directory_uri(); ?>/js/jquery.main.js"></script>-->
<script type="text/javascript">
	$(document).ready(function() {				
	// SUCCESS AJAX CALL, replace "success: false," by:     success : function() { callSuccessFunction() }, 
	//original field values
    var field_values = {
            //id        :  value
            'username'  : 'username',
            'password'  : 'password',
            'cpassword' : 'password',
            'firstname'  : 'first name',
            'lastname'  : 'last name',
            'email'  : 'email address'
    };


    //inputfocus
    $('input#username').inputfocus({ value: field_values['username'] });
    $('input#password').inputfocus({ value: field_values['password'] });
    $('input#cpassword').inputfocus({ value: field_values['cpassword'] }); 
    $('input#lastname').inputfocus({ value: field_values['lastname'] });
    $('input#firstname').inputfocus({ value: field_values['firstname'] });
    $('input#email').inputfocus({ value: field_values['email'] }); 




    //reset progress bar
    $('#progress').css('width','0');
    $('#progress_text').html('0% Complete');

    //first_step
    $('form').unbind('submit').submit(function(){ return false; });
    $('#submit_first').click(function(){
        //remove classes
        $('#first_step input').removeClass('error').removeClass('valid');

        //ckeck if inputs aren't empty
        var fields = $('#first_step input[type=text], #first_step input[type=password]');
        var error = 0;
        fields.each(function(){
            var value = $(this).val();
            if( value.length<4 || value==field_values[$(this).attr('id')] ) {
                $(this).addClass('error');
                $(this).effect("shake", { times:3 }, 50);
                
                error++;
            } else {
                $(this).addClass('valid');
            }
        });        
        
        if(!error) {
            if( $('#password').val() != $('#cpassword').val() ) {
                    $('#first_step input[type=password]').each(function(){
                        $(this).removeClass('valid').addClass('error');
                        $(this).effect("shake", { times:3 }, 50);
                    });
                    
                    return false;
            } else {   
                //update progress bar
                $('#progress_text').html('33% Complete');
                $('#progress').css('width','113px');
                
                //slide steps
                $('#first_step').slideUp();
                $('#second_step').slideDown();     
            }               
        } else return false;
    });


    $('#submit_second').click(function(){
        //remove classes
        $('#second_step input').removeClass('error').removeClass('valid');

        //var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
		var emailPattern = /^[a-zA-Z0-9._-]/;  
        var fields = $('#second_step input[type=text]');
        var error = 0;
        fields.each(function(){
            var value = $(this).val();
            if( value.length<1 || value==field_values[$(this).attr('id')] || ( $(this).attr('id')=='email' && !emailPattern.test(value) ) ) {
                $(this).addClass('error');
                $(this).effect("shake", { times:3 }, 50);
                
                error++;
            } else {
                $(this).addClass('valid');
            }
        });

        if(!error) {
                //update progress bar
                $('#progress_text').html('66% Complete');
                $('#progress').css('width','226px');
                
                //slide steps
                $('#second_step').slideUp();
                $('#third_step').slideDown();     
        } else return false;

    });


    $('#submit_third').click(function(){
        //update progress bar
        $('#progress_text').html('100% Complete');
        $('#progress').css('width','339px');

        //prepare the fourth step
        var fields = new Array(
            $('#username').val(),
            $('#password').val(),
            $('#email').val(),
            $('#firstname').val() + ' ' + $('#lastname').val(),
            $('#age').val(),
            $('#gender').val(),
            $('#country').val()                       
        );
        var tr = $('#fourth_step tr');
        tr.each(function(){
            //alert( fields[$(this).index()] )
            $(this).children('td:nth-child(2)').html(fields[$(this).index()]);
        });
                
        //slide steps
        $('#third_step').slideUp();
        $('#fourth_step').slideDown();            

	var data = new Array(
            $('#username').html(fields[$('#username').index()]),
            $('#password').html(fields[$('#password').index()]),
            $('#email').html(fields[$('#email').index()]),
            $('#firstname').html(fields[$('#firstname').index()]), //+ ' ' + $('#lastname').html(fields[$(this).index()]))
            $('#age').html(fields[$('#age').index()]),
            $('#gender').html(fields[$('#gender').index()]),
            $('#country').html(fields[$('#country').index()])                  
        );

    $('#submit_fourth').click(function(){
        //send information to server
        //alert('Data sent');
		$.ajax({
            //this is the php file that processes the data and send mail
            url: "<?php bloginfo('template_directory'); ?>/inposting.php", 
			             
            //GET method is used
            type: "GET",
 
            //pass the data         
            data: data,     
             
            //Do not cache the page
            cache: false,
             
            //success
            success: function (html) {              
                //if process.php returned 1/true (send mail success)
                if (html==1) {                  
                    //hide the form
                    //$('.form').fadeOut('slow');                 
                     alert('Data sent');
                    //show the success message
                    //$('.done').fadeIn('slow');
                     
                //if process.php returned 0/false (send mail failed)
                } else alert('Sorry, unexpected error. Please try again later.');               
            }       
        });
	});
});
				
});
</script>
<div id="content">
    	<div class="wrapper content-home">
        	<div class="top">
            	<div class="ads-left">
                	<a href="<?php echo esc_url( home_url( '/beriklan' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/banner/banner.gif" alt="" /></a>
                </div><!--end ads-left-->
        		<div id="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" /></a><span>Beta</span></div>
				<div class="ads-right">
                	<a href="<?php echo esc_url( home_url( '/beriklan' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/banner/banner.gif" alt="" /></a>
                </div>
                <div class="clearfix"></div>
            </div><!--end top-->
	
	<div id="container">
        <form action="#" method="post">
	
            <!-- #first_step -->
            <div id="first_step">
                <h1>Langka 1 <a id="login-button" href="#" >Login</a> or <a href="#" id="register-button">Register</a></h1>

                <div class="form">
                    <input type="text" name="username" id="username" value="username" />
                    <label for="username">Ketikan username anda</label>
                    
                    <input type="password" name="password" id="password" value="password" />
                    <label for="password">Ketikan password anda</label>
                    
                    <input type="password" name="cpassword" id="cpassword" value="password" />
                    <label for="cpassword">Ulangi password anda</label>
                </div>      <!-- clearfix --><div class="clear"></div><!-- /clearfix -->
                <input class="submit" type="submit" name="submit_first" id="submit_first" value="send" />
            </div>      <!-- clearfix --><div class="clear"></div><!-- /clearfix -->


            <!-- #second_step -->
            <div id="second_step">
                <h1>Langkah 2 : Data diri anda 'Penyelamat volunter'</h1>

                <div class="form">
                    <input type="text" name="firstname" id="firstname" value="Nama depan" />
                    <label for="firstname">Nama lengkap anda anda </label>
                    <input type="text" name="lastname" id="lastname" value="Nama panggilan" />
                    <label for="lastname">Nama panggilan anda </label>
                    <input type="text" name="email" id="email" value="Nomer HP" />
                    <label for="email">Masukan Nomer Hp yang masih aktif</label>                    
                </div>      <!-- clearfix --><div class="clear"></div><!-- /clearfix -->
                <input class="submit" type="submit" name="submit_second" id="submit_second" value="send" />
            </div>      <!-- clearfix --><div class="clear"></div><!-- /clearfix -->


            <!-- #third_step -->
            <div id="third_step">
                <h1>Langkah 3 informasi data dukungan</h1>

                <div class="form">
                    <select id="age" name="age">
                        <option>Sahabat</option>
                        <option>Program</option>
                        <option>Yayasan</option>
                    </select>
                    <label for="age">Kategori</label> <!-- clearfix --><div class="clear"></div><!-- /clearfix -->

                    <!--<select id="gender" name="gender">
                        <option>Male</option>
                        <option>Female</option>
                    </select>-->
                    <input name="gender" id="gender" type="text" value="Judul Dukungan">
                    <label for="gender">Judul dukungan </label> <!-- clearfix --><div class="clear"></div><!-- /clearfix -->
                    
                    <input name="img" id="img" type="file" >
                    <label for="gender">Gambar </label> <!-- clearfix --><div class="clear"></div><!-- /clearfix -->
                    
                    <!--<select id="country" name="country">
                        <option>United States</option>
                        <option>United Kingdom</option>
                        <option>Canada</option>
                        <option>Serbia</option>
                        <option>Italy</option>
                    </select>-->
                    <textarea name="country" id="country" class="deskripsi" rows="10" cols="55"></textarea>
                    <label for="country">Deskripsi. </label> <!-- clearfix --><div class="clear"></div><!-- /clearfix -->
                    
                </div>      <!-- clearfix --><div class="clear"></div><!-- /clearfix -->
                <input class="submit" type="submit" name="submit_third" id="submit_third" value="send" />
                
            </div>      <!-- clearfix --><div class="clear"></div><!-- /clearfix -->
            
            
            <!-- #fourth_step -->
            <div id="fourth_step">
                <h1>Berikut data dukungan anda</h1>

                <div class="form">
                    <h2>Summary</h2>
                    
                    <table>
                        <tr><td>Username</td><td></td></tr>
                        <tr><td>Password</td><td></td></tr>
                        <tr><td>Email</td><td></td></tr>
                        <tr><td>Name</td><td></td></tr>
                        <tr><td>Age</td><td></td></tr>
                        <tr><td>Judul</td><td></td></tr>
                        <tr><td>Deskripsi</td><td></td></tr>
                    </table>
                </div>      <!-- clearfix --><div class="clear"></div><!-- /clearfix -->
                <input class="send submit" type="submit" name="submit_fourth" id="submit_fourth" value="send" />            
            </div>
            
        </form>
	</div>
	<div id="progress_bar">
        <div id="progress"></div>
        <div id="progress_text">0% Complete</div>
	</div>
	
  <? get_footer();?>