<?php
	include("../auth.php");
	include('../../connect/db.php');
	
	$Log_Id=$_POST["Log_Id"];
	$name=$_POST["name"];
	
	$age=$_POST["age"];
	$sex=$_POST["sex"];
	$cntno=$_POST["cntno"];
	
	$police_station=$_POST["police_station"];

	$subjct=$_POST["subjct"];
	$descp=$_POST["descp"];	
	$reply="Pending";
	$date=date("Y-m-d");


	$sql = "insert into complaints(Log_Id,name,subjct,descp,reply,date,age,sex,cntno,poli_station)values('$Log_Id','$name','$subjct','$descp','$reply','$date','$age','$sex','$cntno' ,'$police_station')";
	$q1 = $db->prepare($sql);
	$q1->execute();	
		
	header("location:../complaint_view.php");
?>
