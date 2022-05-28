<?php  

$db = new mysqli("localhost", "root", "" , "stock");
	
	if($db->connect_errno){
		die('Sorry we have some problem with the Database!');
	}             
?>
<?php
$str = "";
//echo md5($str);
?>