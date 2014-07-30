<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<script type='text/javascript'>
    function simpan_user()
    {
        send_form(document.fuser,"user/simpan","#content");
    }
	function enable_pass(){
		$('input[name=user_password]').attr("disabled","");
		// $('input[name=user_password').focus();
		$("#pass").focus();
	}
    function edit(id)
    {
        $('input[name=user_name]').val($('#name_'+id).val());
        $('input[name=user_username]').val($('#username_'+id).val());
        $('select[name=user_level]').val($('#level_'+id).val());
        $('input[name=user_jabatan]').val($('#jabatan_'+id).val());
        $('input[name=user_id]').val(id);
        $('input[name=user_password]').attr("disabled","disabled");
		document.getElementById('ups').style.display = "block";
    }
</script>
<div class='title'>Tambah User</div>
<?php echo $this->pquery->form_remote_tag(array(
	'url'=>site_url('user/simpan'), 'update'=>'#content',
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
			<input type='text' name='user_name' style='width:280px' />
			<?php echo form_error('user_name')?>
		</td>
    </tr>
    <tr>
        <td class='a_right'>Username</td>
        <td><input type='text' name='user_username' style='width:150px' />
		<?php echo form_error('user_username')?></td>
    </tr>
    <tr>
        <td class='a_right'>Password</td>
        <td><input type='password' id='pass' name='user_password' style='width:150px; float:left; margin-right:3px;'/>
		<a href='javascript:void(0)' id='ups' style='display:none;' onclick='enable_pass()' class='link1 blue98' >ubah password</a>
		<?php echo form_error('user_password')?></td>
    </tr>
    <tr>
        <td class='a_right'>Jabatan</td>
        <td><input type='text' name='user_jabatan' style='width:170px' />
		<?php echo form_error('user_jabatan')?></td>
    </tr>
    <tr>
        <td class='a_right'>Level</td>
        <td>
            <select name='user_level'>
                <option value='operator'>Operator</option>
                <option value='admin'>Admin</option>
            </select>
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
<div class='title'>Daftar User</div>
<table class='grid'>
    <tr>
        <th>Nama</th>
        <th>Username</th>
        <th>Level</th>
        <th>Jabatan</th>
        <th width='100px'>Login Count</th>
        <th width='150px'>Aksi</th>
    </tr>
    <?php foreach($user->result() as $row):?>
    <tr>
        <td>
            <input type='hidden' id='name_<?php echo $row->user_id;?>' value='<?php echo $row->user_name;?>' />
            <input type='hidden' id='username_<?php echo $row->user_id;?>' value='<?php echo $row->user_username;?>' />
            <input type='hidden' id='level_<?php echo $row->user_id;?>' value='<?php echo $row->user_level;?>' />
            <input type='hidden' id='jabatan_<?php echo $row->user_id;?>' value='<?php echo $row->user_jabatan;?>' />
            <?php echo $row->user_name;?>
        </td>
        <td><?php echo $row->user_username;?></td>
        <td><?php echo $row->user_level;?></td>
        <td><?php echo $row->user_jabatan;?></td>
        <td><?php echo $row->user_logincount;?></td>
        <td>
			<a class='link1 blue98' href="javascript:void(0);" onclick='load("user/hak_akses/<?php echo $row->user_id?>/<?php echo $row->user_username?>","#content");'>Akses</a>
			-
            <a class='link1 blue98' href='javascript:void(0)' onclick='edit(<?php echo $row->user_id;?>)' >Edit</a>
             - 
            <a class='link1 blue98' href='javascript:void(0)' onclick='tanya(<?php echo $row->user_id;?>)' >Hapus</a>
        </td>
    </tr>
    <?php endforeach;?>
</table>
<script>
	function tanya(id){
		if(confirm('Hapus Data Terpilih?')){
			load_no_loading("user/hapus/"+id,"#content")
			return true;
		}else{
			return false;
		}
	}
</script>