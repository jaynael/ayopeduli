<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<html>
<head>
	<title>Upload Foto Area</title>
	<script language="javascript" type="text/javascript">
		function GetValueFromChild(myVal){
			document.getElementById('file').value = myVal;
		}
	</script>
</head>
</html>
<div class='panel'>
	<a href='javascript:void(0);' class='button buttonwhite smallbtn' onclick='load("area","#content");'>Browse</a>
</div>
<div class='the_content'>
<?php echo $this->pquery->form_remote_tag(array(
	'url'=>site_url('area/simpan'), 'update'=>'#content',
	'name'=>'f1', 'id'=>'area', 'type'=>'post'));
	foreach($detail_area->result() as $da):
?>
<div class='form_area' >
<div class='title'><?php echo $title?></div>
    <table class='myform' style='width:100%' border="0">
        <tr>
            <td class='a_right'>Nama Area</td>
            <td class='a_left'>
				<input type='text' name='nama' value='<?php echo $da->nama?>' size='50'/>
				<input type='hidden' name='idarea' value='<?php echo $da->idarea?>' />
				<?php echo form_error('nama')?>
			</td>
		</tr>
        <tr>
            <td class='a_right'>Foto Area</td>
            <td class='a_left'>
				<input type='text' name='foto' id='file' readonly value='<?php echo $da->foto?>' size='30'/>
				<?php echo form_error('foto')?>
				<?php
					$atrfile = array(
						'width' => 500, 'height' => 200, 'screenx' => 350, 'screeny' => 250,
						'class' => 'buttonwhite smallbtn'
					);
					echo anchor_popup('area/form_upload', 'browse file', $atrfile);
				?>
			</td>
		</tr>
		<tr>
            <td class='a_right'>Koordinat</td>
            <td class='a_left'>
				<input type='text' name='koordinat1' value='<?php echo $da->koordinat1;?>' size='5' /> ,
				<input type='text' name='koordinat2' value='<?php echo $da->koordinat2;?>' size='5' /> contoh : 900, 610
				<?php echo form_error('koordinat1')?> <?php echo form_error('koordinat2')?>
			</td>
        </tr>
		<tr>
            <td class='a_right'>Tooltip</td>
            <td class='a_left'>
				<textarea name='tooltip' cols='50' rows='2'><?php echo $da->tooltip?></textarea>
				<?php echo form_error('tooltip')?>
			</td>
        </tr>
		<tr>
            <td class='a_right'>Keterangan</td>
            <td class='a_left'>
				<textarea name='keterangan' cols='90' rows='4'><?php echo $da->keterangan?></textarea>
				<?php echo form_error('keterangan')?>
			</td>
        </tr>
		<tr>
			<td>&nbsp;</td>
			<td colspan='3'>
				<div class='the_footer a_left'>
					<input type='submit' class='button buttonblue smallbtn' name='simpan' value='Update'/>
					<input type='reset' class='button buttonwhite smallbtn' name='batal' value='Batal'/>
				</div>
			</td>
		</tr>
    </table>
</div>
<?php endforeach; ?>
</form>
</div>