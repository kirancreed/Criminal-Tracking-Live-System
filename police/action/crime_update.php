<?php
    include("../auth.php");
    include('../../connect/db.php');
    
    // Fetch existing data from the database
    $cand_id = $_POST['cand_id'];
    $sql_fetch = "SELECT * FROM crime WHERE cand_id = :cand_id";
    $q_fetch = $db->prepare($sql_fetch);
    $q_fetch->bindParam(':cand_id', $cand_id);
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
    $existing_about = $row['about'];
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
    $about=$_POST["about"];
    $photo = $_FILES["photo"]["name"];

    // Process uploaded photo
    if(!empty($photo)) {
        move_uploaded_file($_FILES["photo"]["tmp_name"], "../../photo/" . $photo);
    }

    // Update data in the database
    if(empty($photo)) {
        $sql_update = "UPDATE crime SET ";
        $sql_update .= "cntno2='$cntno2', ";
        $sql_update .= "email='$email', ";
        $sql_update .= "addr='$addr', ";
        $sql_update .= "state='$state', ";
        $sql_update .= "dstrct='$dstrct', ";
        $sql_update .= "pncth='$pncth', ";
        $sql_update .= "pcode='$pcode', ";
        $sql_update .= "station='$station', ";
        $sql_update .= "pcntno='$pcntno', ";
        $sql_update .= "about='$about'";
    } else {
        $sql_update = "UPDATE crime SET ";
        $sql_update .= "photo='$photo', ";
        $sql_update .= "cntno2='$cntno2', ";
        $sql_update .= "email='$email', ";
        $sql_update .= "addr='$addr', ";
        $sql_update .= "state='$state', ";
        $sql_update .= "dstrct='$dstrct', ";
        $sql_update .= "pncth='$pncth', ";
        $sql_update .= "pcode='$pcode', ";
        $sql_update .= "station='$station', ";
        $sql_update .= "pcntno='$pcntno', ";
        $sql_update .= "about='$about'";
    }
    $sql_update .= " WHERE cand_id='$cand_id'";

    $q_update = $db->prepare($sql_update);
    $q_update->execute();

    header("location:../criminal_update.php");
?>
