<script language="javascript" type="text/javascript">
function SendValueToParent(asd){
	var myVal = '<?php echo $file?>';
	window.opener.GetValueFromChild(myVal);
	window.close();
	return false;
}
</script>
<body onload='SendValueToParent()'>
</body>