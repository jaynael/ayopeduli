<?php
require'../koneksi.php';
 
$name = $_POST['name']; // this is from data parameter
$phone = $_POST['phone'];
 
// and lastly place your  SQL query here
mysql_query("INSERT INTO employees (`name`, `phone`) VALUES('$name', '$phone')")
 or die(mysql_error());
?>