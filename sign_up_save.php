<?php
	include("connect/db.php");
		
	$Log_Id="CRT".rand(1000000000,1);
	$name=$_POST["name"];
	$cntno1=$_POST["cntno1"];
	$utype="People";
	$username=$_POST["username"];
	$password=$_POST["password"];
	$date=date("Y-m-d");
	
	$image = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
	$image_name = addslashes($_FILES['photo']['name']);
	$image_size = getimagesize($_FILES['photo']['tmp_name']);
	move_uploaded_file($_FILES["photo"]["tmp_name"], "photo/" . $_FILES["photo"]["name"]);
	$photo = $_FILES["photo"]["name"];
	

	$sql = "insert into people(Log_Id,name,cntno,photo,username,password,utype,date)values('$Log_Id','$name','$cntno1','$photo','$username','$password','$utype','$date')";
	$q1 = $db->prepare($sql);
	$q1->execute();	

	header("location:login.php");
	
?>
