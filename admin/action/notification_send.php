<?php
	include("../../connect/db.php");
	$name=$_POST["name"];
	
	$subjct=$_POST["subjct"];
	
	$descp=$_POST["descp"];

	$date=date("Y-m-d");
	date_default_timezone_set("Asia/Kolkata");
	$tme=date('h:i:s A');

	// Check if a file is uploaded
	if(isset($_FILES['photo']) && $_FILES['photo']['size'] > 0) {
	    // Process the uploaded file
	    $image = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
	    $image_name = addslashes($_FILES['photo']['name']);
	    $image_size = getimagesize($_FILES['photo']['tmp_name']);
	    move_uploaded_file($_FILES["photo"]["tmp_name"], "../../teacher_photo/" . $_FILES["photo"]["name"]);
	    $photo = $_FILES["photo"]["name"];
	} else {
	    // If no file is uploaded, set photo to an empty string
	    $photo = '';
	}
	
	// Prepare and execute the SQL query
	$sql = "INSERT INTO notification (name, subjct, date, photo, tme, descp) VALUES (:name, :subjct, :date, :photo, :tme, :descp)";
	$q1 = $db->prepare($sql);
	$q1->execute(array(
	    ':name' => $name,
	    ':subjct' => $subjct,
	    ':date' => $date,
	    ':photo' => $photo,
	    ':tme' => $tme,
	    ':descp' => $descp
	));	

	header("location:../notification_view.php");
?>
