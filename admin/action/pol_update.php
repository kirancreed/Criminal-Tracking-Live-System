<?php
	include("../auth.php");
	include('../../connect/db.php');
	
	$poli_id = $_POST['poli_id'];
	
	$sname = $_POST["sname"];
	$locatin = $_POST["locatin"];
	$addr = $_POST["addr"];
	$stat = $_POST["stat"];
	$dist = $_POST["dist"];
	$area = $_POST["area"];
	$scname = $_POST["scname"];
	$cntno1 = $_POST["cntno1"];
	$cntno2 = $_POST["cntno2"];
	$email = $_POST["email"];
	$jdate = $_POST["jdate"];
	$about = $_POST["about"];

	// Retrieve existing photo filename from the database
	$sql_select_photo = "SELECT photo FROM pl_station WHERE poli_id=?";
	$q_select_photo = $db->prepare($sql_select_photo);
	$q_select_photo->execute([$poli_id]);
	$existing_photo = $q_select_photo->fetchColumn();

	// Check if a new photo was uploaded
	if (!empty($_FILES['photo']['tmp_name'])) {
		$photo = $_FILES["photo"]["name"];
		move_uploaded_file($_FILES["photo"]["tmp_name"], "../../photo/" . $photo);
	} else {
		// If no new photo was uploaded, use the existing photo filename
		$photo = $existing_photo;
	}

	// Build and execute the SQL query
	$sql = "UPDATE pl_station SET sname=?, locatin=?, addr=?, stat=?, dist=?, area=?, scname=?, cntno1=?, cntno2=?, email=?, photo=?, jdate=?, about=? WHERE poli_id=?";
	$q1 = $db->prepare($sql);
	if ($q1->execute([$sname, $locatin, $addr, $stat, $dist, $area, $scname, $cntno1, $cntno2, $email, $photo, $jdate, $about, $poli_id])) {
		header("location:../pstation_update.php");
		exit;
	} else {
		echo "Error updating station information.";
		exit;
	}
?>
