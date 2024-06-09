<?php
	include("../auth.php");
	include('../../connect/db.php');
	
	$case_id=$_POST['case_id'];

	// Fetch existing data from the database
	$sql_fetch = "SELECT * FROM case_reg WHERE case_id = :case_id";
	$q_fetch = $db->prepare($sql_fetch);
	$q_fetch->bindParam(':case_id', $case_id);
	$q_fetch->execute();
	$row = $q_fetch->fetch(PDO::FETCH_ASSOC);

	// Assign fetched data to variables
	$existing_cntno2 = $row['cntno2'];
	$existing_email = $row['email'];
	$existing_addr = $row['addr'];
	$existing_state = $row['state'];
	$existing_dstrct = $row['dstrct'];
	$existing_pncth = $row['pncth'];
	$existing_pcode = $row['pcode'];
	$existing_station = $row['station'];
	$existing_pcntno = $row['pcntno'];
	$existing_caser = $row['caser'];
	$existing_photo = $row['photo'];

	// Assign POST data to variables
	$cntno2=$_POST["cntno2"];
	$email=$_POST["email"];
	$addr=$_POST["addr"];	
	$state=$_POST["state"];
	$dstrct=$_POST["dstrct"];
	$pncth=$_POST["pncth"];
	$pcode=$_POST["pcode"];
	$station=$_POST["station"];
	$pcntno=$_POST["pcntno"];
	$caser=$_POST["case"];
	$photo = $_FILES["photo"]["name"];

	// Process uploaded photo
	if($photo != "") {
		move_uploaded_file($_FILES["photo"]["tmp_name"], "../../photo/" . $photo);
	}

	// Update data in the database
	if($photo == "") {
		$sql = "UPDATE case_reg SET cntno2='$cntno2', email='$email', addr='$addr', state='$state', dstrct='$dstrct', pncth='$pncth', pcode='$pcode', station='$station', pcntno='$pcntno', caser='$caser' WHERE case_id='$case_id'";
	} else {
		$sql = "UPDATE case_reg SET photo='$photo', cntno2='$cntno2', email='$email', addr='$addr', state='$state', dstrct='$dstrct', pncth='$pncth', pcode='$pcode', station='$station', pcntno='$pcntno', caser='$caser' WHERE case_id='$case_id'";
	}
	$q1 = $db->prepare($sql);
	$q1->execute();

	header("location:../criminal_update.php");
?>
