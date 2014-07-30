<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<div class='panel'>
	<a class='button buttonwhite smallbtn' href="javascript:void(0);" onclick='load("area/input","#content");'>Input</a>
</div>
<div class='title'><?php echo $title?></div>
<table class='grid'>
    <tr>
        <th>No</th>
        <th>Nama&nbsp;Area</th>
        <th>Koordinat</th>
        <th>Tooltip</th>
        <!--<th>Keterangan</th>-->
		<th class='aksi'></th>
    </tr>
    <?php $no = 1; foreach($browse_area->result() as $ba):?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $ba->nama; ?></td>
        <td><?php echo $ba->koordinat1.','.$ba->koordinat2; ?></td>
        <td><?php echo $ba->tooltip; ?></td>
        <!--<td></?php echo $ba->keterangan; ?></td>-->
        <td class='aksi'>
			<a class='link1 blue98' href='javascript:void(0);' onclick='load("area/edit/<?php echo $ba->idarea?>","#content");'>Edit</a>
             - 
            <a class='link1 blue98' href='javascript:void(0);' onclick='return tanya("<?php echo $ba->idarea?>")' >Hapus</a>
        </td>
</tr>
    <?php endforeach;?>
</table>
<script>
	function tanya(id){
		if(confirm('Hapus Data Terpilih?')){
			load_no_loading("area/hapus/"+id,"#content")
			return true;
		}else{
			return false;
		}
	}
</script>