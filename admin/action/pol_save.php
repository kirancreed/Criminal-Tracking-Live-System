<?php
	include("../../connect/db.php");
	
	$Log_Id=$_POST["Log_Id"];
	$sname=$_POST["sname"];
	$locatin=$_POST["locatin"];
	$addr=$_POST["addr"];
	$stat=$_POST["stat"];
	$dist=$_POST["dist"];
	$area=$_POST["area"];
	$scname=$_POST["scname"];
	$cntno1=$_POST["cntno1"];
	$cntno2=$_POST["cntno2"];
	$email=$_POST["email"];
	$jdate=$_POST["jdate"];
	$username=$_POST["username"];
	$password=$_POST["password"];
	$about=$_POST["about"];

	$date=date("Y-m-d");
	
	
	$utype="Police";
	
	
	$image = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
	$image_name = addslashes($_FILES['photo']['name']);
	$image_size = getimagesize($_FILES['photo']['tmp_name']);
	move_uploaded_file($_FILES["photo"]["tmp_name"], "../../photo/" . $_FILES["photo"]["name"]);
	$photo = $_FILES["photo"]["name"];
	
	
	
	$sql = "insert into pl_station(Log_Id,sname,locatin,addr,stat,dist,area,scname,cntno1,cntno2,email,photo,jdate,username,password,date,about,utype)values('$Log_Id','$sname','$locatin','$addr','$stat','$dist','$area','$scname','$cntno1','$cntno2','$email','$photo','$jdate','$username','$password','$date','$about','$utype')";
	$q1 = $db->prepare($sql);
	$q1->execute();	

	header("location:../pstation_search.php");
?>
