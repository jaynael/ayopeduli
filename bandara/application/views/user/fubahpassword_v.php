<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<div class='title'>Ubah Password User</div>
<?php echo $this->pquery->form_remote_tag(array(
	'url'=>site_url('user/update'), 'update'=>'#content',
	'name'=>'f1', 'id'=>'masuk', 'type'=>'post'));
?>
<!--<form name='fuser' method='post' action=''>-->
    <?php
        echo form_hidden('user_id');        
    ?>
<table width='80%'>
    <tr>
        <td class='a_right'>Nama</td>
        <td>
			<input type='text' name='user_name' readonly value="<?php echo $this->session->userdata('nama')?>" style='width:280px' />
			<?php echo form_error('user_name')?>
		</td>
    </tr>
    <tr>
        <td class='a_right'>Username</td>
        <td><input type='text' name='user_username' readonly value="<?php echo $this->session->userdata('username')?>" style='width:150px' />
        <input type='hidden' name='user_id' value="<?php echo $this->session->userdata('user_id')?>" />
		<?php echo form_error('user_username')?></td>
    </tr>
    <tr>
        <td class='a_right'>Password</td>
        <td><input type='password' id='pass' name='user_password' style='width:150px; float:left; margin-right:3px;'/>
		<?php echo form_error('user_password')?></td>
    </tr>
    <tr>
        <td class='a_right'>Password Baru</td>
        <td><input type='password' id='pass' name='user_passwordbaru' style='width:150px; float:left; margin-right:3px;'/>
		<?php echo form_error('user_passwordbaru')?></td>
    </tr>
    <tr>
        <td class='a_right'>Konfirmasi Password Baru</td>
        <td><input type='password' id='pass' name='user_passwordbarulagi' style='width:150px; float:left; margin-right:3px;'/>
		<?php echo form_error('user_passwordbarulagi')?></td>
    </tr>
    <tr>
        <td class='a_right'>Jabatan</td>
        <td><input type='text' name='user_jabatan' readonly value="<?php echo $this->session->userdata('jabatan')?>" style='width:170px' />
		<?php echo form_error('user_jabatan')?></td>
    </tr>
    <tr>
        <td class='a_right'>Level</td>
        <td><input type='text' name='user_level' readonly value="<?php echo $this->session->userdata('level')?>"/>
        </td>
    </tr>
	<tr>
		<td>&nbsp;</td>
		<td>
			<div class='the_footer a_left'>
				<input type='submit' name='simpan' value='Simpan' class='button buttonblue smallbtn'/>
				<input type='reset' name='batal' value='Kosongkan Form' class='button buttonblue smallbtn'/>
			</div>
		</td>
	</tr>
</table>
</form>
<script>
	function tanya(id){
		if(confirm('Yakin Akan Merubah Password Anda?')){
			load_no_loading("user/hapus/"+id,"#content")
			return true;
		}else{
			return false;
		}
	}
</script>