<?php
    include("../auth.php");
    include('../../connect/db.php');
    
    $Log_Id=$_POST['Log_Id'];

    // Fetch existing data from the database
    $sql_fetch = "SELECT * FROM pl_station WHERE Log_Id = :Log_Id";
    $q_fetch = $db->prepare($sql_fetch);
    $q_fetch->bindParam(':Log_Id', $Log_Id);
    $q_fetch->execute();
    $row = $q_fetch->fetch(PDO::FETCH_ASSOC);

    // Assign fetched data to variables
    $existing_sname = $row['sname'];
    $existing_locatin = $row['locatin'];
    $existing_addr = $row['addr'];
    $existing_stat = $row['stat'];
    $existing_dist = $row['dist'];
    $existing_area = $row['area'];
    $existing_scname = $row['scname'];
    $existing_cntno1 = $row['cntno1'];
    $existing_cntno2 = $row['cntno2'];
    $existing_email = $row['email'];
    $existing_jdate = $row['jdate'];
    $existing_about = $row['about'];
    $existing_photo = $row['photo'];

    // Assign POST data to variables
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
    $about=$_POST["about"];
    $photo = $_FILES["photo"]["name"];

    // Process uploaded photo
    if(!empty($photo)) {
        move_uploaded_file($_FILES["photo"]["tmp_name"], "../../photo/" . $photo);
    }

    // Update data in the database
    if(empty($photo)) {
        $sql_update = "UPDATE pl_station SET ";
        $sql_update .= "sname='$sname', ";
        $sql_update .= "locatin='$locatin', ";
        $sql_update .= "addr='$addr', ";
        $sql_update .= "stat='$stat', ";
        $sql_update .= "dist='$dist', ";
        $sql_update .= "area='$area', ";
        $sql_update .= "scname='$scname', ";
        $sql_update .= "cntno1='$cntno1', ";
        $sql_update .= "cntno2='$cntno2', ";
        $sql_update .= "email='$email', ";
        $sql_update .= "jdate='$jdate', ";
        $sql_update .= "about='$about' ";
    } else {
        $sql_update = "UPDATE pl_station SET ";
        $sql_update .= "sname='$sname', ";
        $sql_update .= "locatin='$locatin', ";
        $sql_update .= "addr='$addr', ";
        $sql_update .= "stat='$stat', ";
        $sql_update .= "dist='$dist', ";
        $sql_update .= "area='$area', ";
        $sql_update .= "scname='$scname', ";
        $sql_update .= "cntno1='$cntno1', ";
        $sql_update .= "cntno2='$cntno2', ";
        $sql_update .= "email='$email', ";
        $sql_update .= "photo='$photo', ";
        $sql_update .= "jdate='$jdate', ";
        $sql_update .= "about='$about' ";
    }
    $sql_update .= "WHERE Log_Id='$Log_Id'";

    $q_update = $db->prepare($sql_update);
    $q_update->execute();

    header("location:../index.php");
?>
