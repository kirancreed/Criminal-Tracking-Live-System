<?php
    include("../auth.php");
    include('../../connect/db.php');
    
    $Log_Id=$_POST['Log_Id'];

    // Fetch existing data from the database
    $sql_fetch = "SELECT * FROM people WHERE Log_Id = :Log_Id";
    $q_fetch = $db->prepare($sql_fetch);
    $q_fetch->bindParam(':Log_Id', $Log_Id);
    $q_fetch->execute();
    $row = $q_fetch->fetch(PDO::FETCH_ASSOC);

    // Assign fetched data to variables
    $existing_aadharno = $row['aadharno'];
    $existing_sex = $row['sex'];
    $existing_age = $row['age'];
    $existing_dob = $row['dob'];
    $existing_email = $row['email'];
    $existing_password = $row['password'];
    $existing_cntno = $row['cntno'];
    $existing_addr = $row['addr'];
    $existing_state = $row['state'];
    $existing_dstrct = $row['dstrct'];
    $existing_pncth = $row['pncth'];
    $existing_wrd = $row['wrd'];
    $existing_pcode = $row['pcode'];
    $existing_photo = $row['photo'];

    // Assign POST data to variables
    $aadharno=$_POST["aadharno"];
    $sex=$_POST["sex"];
    $age=$_POST["age"];
    $dob=$_POST["dob"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $cntno=$_POST["cntno"];
    $addr=$_POST["addr"];
    $state=$_POST["state"];
    $dstrct=$_POST["dstrct"];
    $pncth=$_POST["pncth"];
    $wrd=$_POST["wrd"];
    $pcode=$_POST["pcode"];
    $photo = $_FILES["photo"]["name"];

    // Process uploaded photo
    if(!empty($photo)) {
        move_uploaded_file($_FILES["photo"]["tmp_name"], "../../photo/" . $photo);
    }

    // Update data in the database
    if(empty($photo)) {
        $sql_update = "UPDATE people SET ";
        $sql_update .= "aadharno='$aadharno', ";
        $sql_update .= "sex='$sex', ";
        $sql_update .= "age='$age', ";
        $sql_update .= "dob='$dob', ";
        $sql_update .= "email='$email', ";
        $sql_update .= "cntno='$cntno', ";
        $sql_update .= "addr='$addr', ";
        $sql_update .= "state='$state', ";
        $sql_update .= "dstrct='$dstrct', ";
        $sql_update .= "pncth='$pncth', ";
        $sql_update .= "wrd='$wrd', ";
        $sql_update .= "pcode='$pcode', ";
        $sql_update .= "password='$password' ";
    } else {
        $sql_update = "UPDATE people SET ";
        $sql_update .= "aadharno='$aadharno', ";
        $sql_update .= "sex='$sex', ";
        $sql_update .= "age='$age', ";
        $sql_update .= "dob='$dob', ";
        $sql_update .= "email='$email', ";
        $sql_update .= "photo='$photo', ";
        $sql_update .= "cntno='$cntno', ";
        $sql_update .= "addr='$addr', ";
        $sql_update .= "state='$state', ";
        $sql_update .= "dstrct='$dstrct', ";
        $sql_update .= "pncth='$pncth', ";
        $sql_update .= "wrd='$wrd', ";
        $sql_update .= "pcode='$pcode', ";
        $sql_update .= "password='$password' ";
    }
    $sql_update .= "WHERE Log_Id='$Log_Id'";

    $q_update = $db->prepare($sql_update);
    $q_update->execute();

    header("location:../index.php");
?>
