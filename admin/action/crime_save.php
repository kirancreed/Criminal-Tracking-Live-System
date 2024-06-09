<?php
	include("../auth.php");
	include('../../connect/db.php');
	$Log_Id=$_SESSION['SESS_ADMIN_ID'];
	
	$name=$_POST["name"];
	$aadharno=$_POST["aadharno"];
	$sex=$_POST["sex"];
	$age=$_POST["age"];
	$dob=$_POST["dob"];
	$cntno1=$_POST["cntno1"];
	$cntno2=$_POST["cntno2"];

	$email=$_POST["email"];
	$addr=$_POST["addr"];	
	$state=$_POST["state"];
	$dstrct=$_POST["dstrct"];
	$pncth=$_POST["pncth"];
	$pcode=$_POST["pcode"];
	
	$adate=$_POST["adate"];
	$station=$_POST["station"];
	$date=$_POST["date"];
	$pcntno=$_POST["pcntno"];
	
	
	$about=$_POST["about"];
	
	$image = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
	$image_name = addslashes($_FILES['photo']['name']);
	$image_size = getimagesize($_FILES['photo']['tmp_name']);
	move_uploaded_file($_FILES["photo"]["tmp_name"], "../../photo/" . $_FILES["photo"]["name"]);
	$photo = $_FILES["photo"]["name"];
	
	
	$sql = "insert into crime(Log_Id,aadharno,name,sex,age,dob,cntno1,cntno2,email,photo,addr,state,dstrct,pncth,pcode,adate,station,date,pcntno,about)values('$Log_Id','$aadharno','$name','$sex','$age','$dob','$cntno1','$cntno2','$email','$photo','$addr','$state','$dstrct','$pncth','$pcode','$adate','$station','$date','$pcntno','$about')";
	$q1 = $db->prepare($sql);
	$q1->execute();	


	header("location:../criminal_search.php");
?>
