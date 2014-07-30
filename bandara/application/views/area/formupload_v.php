<link href="<?php echo base_url();?>asset/theme/style.css" rel="stylesheet" type="text/css" />
<?php $this->load->helper('form');?>
<fieldset class='area'>
	<legend><b><?php echo $title;?></b></legend>
	<?php echo form_open_multipart('area/upload_file')?>
		<b>Masukkan File </b><input type='file' name='foto'>
		<input type='submit' name='upload' class='button buttonblue smallbtn' value='Pilih'>
	</form>
	<div class='atention'>
		<font color='red'>Extensi File yang diijinkan adalah <b>jpg</b>.</font><br />
		Pilih file foto, dengan menekan tombol <b>browse</b>. tekan tombol <b>pilih</b> jika telah selesai memilih
		file foto.
	</div>
</fieldset>
<div class='obj_right'><input class='button buttonblue smallbtn' type='button' value='Tutup' onclick='window.close()'/></div>
