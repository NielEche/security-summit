<?php
 

 //Connect to the MySQL database that is holding your data
 $DBhost = "server261";
 $DBuser = "meshwqob_ss20";
$DBpass = "PhebenDanny1";
 $DBname = "meshwqob_ss2020";
 $DBcon = new MySQLi($DBhost,$DBuser,$DBpass,$DBname);
 
 if ($DBcon->connect_errno) {
     die("ERROR : -> ".$DBcon->connect_error);
 }
?>
