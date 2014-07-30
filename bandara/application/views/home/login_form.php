<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<head>
</head>
<body>
<div id='form_login'>
    <div class='title'><center>Login to <?php echo $this->config->item('site_name')?> Application</center></div>
    <div class='the_content'>
        <?php echo form_open('home/do_login',array('name'=>'login_form'));?>
		<?php /*echo $this->pquery->form_remote_tag(array(
			'url'=>site_url('home/do_login'), 'update'=>'#container',
			'name'=>'f1', 'id'=>'maspegawai', 'type'=>'post')); */
		?>
        <table class='myform' style='width:90%'>
            <tr>
                <td class='a_right' valign='top' width='80'>Username:</td>
                <td class='a_left' valign='top'><input type='text' id='user' name='username' style='width:85%' /><?php echo form_error('username');?></td>
            </tr>
            <tr>
                <td class='a_right' valign='top'>Password:</td>
                <td class='a_left' valign='top'><input type='password' name='password' style='width:99%' /><?php echo form_error('password');?></td>
            </tr>
			<!--<tr>
                <td class='a_right'>Captcha</td><td class='a_left' style='width:75%' valign='top'></?php echo  $cap['image'] ?></td>
			</tr>
            <tr>
				<td>&nbsp;</td>
                <td class='a_left' valign='top'><input type='text' name='captcha' style='width:35%' /></?php echo form_error('captcha');?></td>
            </tr>-->
			<tr>
				<td>&nbsp;</td>
				<td class='a_left'>
					<div class='the_footer'>
						<input type='submit' value='Login' class='button buttonwhite mediumbtn'>
						<input type='reset' value='Reset' class='button buttonblue mediumbtn'>
					</div>
				</td>
			</tr>
        </table>
        </form>
    </div>
</div>
</body>