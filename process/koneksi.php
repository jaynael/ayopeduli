<?php
$host="localhost";
$user="root";
$pass="";
$db="yot";
$connect=mysql_connect("$host","$user","$pass")or die("error connection");
mysql_select_db("$db",$connect) or die ("error select DB");

?>