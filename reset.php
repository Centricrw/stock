<?php // Destry session if it hasn't been used for 15 minute.
session_start();
if (isset($_SESSION['username'])) {
	$username = $_SESSION['username'];
}
if (!isset($_SESSION["username"])) {
 header("location: login.php"); 
    exit();
}
?>
<?php
$body="";
if(isset($_FILES['contactsFile'])){
$filename = basename($_FILES['contactsFile']['name']);
$path = 'docs/'.$filename;
move_uploaded_file($_FILES['contactsFile']['tmp_name'], $path);
//echo $filename;

include "db.php";
		
// EXCEL BULK INVITATIONS
include ("classes/PHPExcel/IOFactory.php");  
$objPHPExcel = PHPExcel_IOFactory::load($path);  
foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)   
{  
	$sqlemptyTable = $db->query ("TRUNCATE items")or die (mysqli_error());
	$sqlemptyTransaction = $db->query ("TRUNCATE transactions")or die (mysqli_error());
	//$sqlemptyROI = $db->query ("TRUNCATE returnoninvestment")or die (mysqli_error());
	$sqlemptyInvoiceNumbers = $db->query ("TRUNCATE serieid")or die (mysqli_error());
	$n=0;		
	$highestRow = $worksheet->getHighestRow();
	for ($row=2; $row<=$highestRow; $row++)
	{
		$n++;
		$kode = mysqli_real_escape_string($db, $worksheet->getCellByColumnAndRow(0, $row)->getValue());
		$itemName = mysqli_real_escape_string($db, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
		$unityPrice = mysqli_real_escape_string($db, $worksheet->getCellByColumnAndRow(2, $row)->getValue());
		$unit = mysqli_real_escape_string($db, $worksheet->getCellByColumnAndRow(3, $row)->getValue());
		$sqlsaveexcel = $db->query ("INSERT INTO items (itemName, unityPrice, kode, unit, inDate, addedBy) 
			VALUES ('$itemName', '$unityPrice', '$kode', '$unit', now(), '$username')")or die (mysqli_error());
	}
	$body.='Birakozwe. Ibicuruzwa Byose bivuyemo, hagiyemo ibikoresho '.$n.' bishya! <a href="index.php">Kanda Hano</a>.';
}
}else{
	$body.='
		<form action="reset.php" method="post" enctype="multipart/form-data">
		  <input type="file" name="contactsFile">
		  <input type="submit" value="upload">
		</form>';
}
// END EXCEL BULK INVITATIONS
?>



<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<?php echo $body;?>
</body>
</html>