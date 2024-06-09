<?php
include('../../connect/db.php');


	$wrng_id=$_GET["wrng_id"]; 	
	
	
$sql = "update warning_cr set stat='approve' where wrng_id='$wrng_id'";
$q1 = $db->prepare($sql);
$q1->execute();

header("location:../warning_request.php");

?>						

