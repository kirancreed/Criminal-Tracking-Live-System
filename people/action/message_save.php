<?php
	include("../auth.php");
	include('../../connect/db.php');
	
	$Log_Id=$_POST["Log_Id"];
	$name=$_POST["name"];
	
	$subjct=$_POST["subjct"];
	$descp=$_POST["descp"];	
	$reply="Pending";
	$date=date("Y-m-d");


	$sql = "insert into message(Log_Id,name,subjct,descp,reply,date)values('$Log_Id','$name','$subjct','$descp','$reply','$date')";
	$q1 = $db->prepare($sql);
	$q1->execute();	
		
	header("location:../message_view.php");
?>
