<?php
    include("../auth.php");
    include('../../connect/db.php');
    $Log_Id=$_SESSION['SESS_ADMIN_ID'];
    
    // Initialize variables with empty values
    $existing_name = "";
    $existing_aadharno = "";
    $existing_sex = "";
    $existing_age = "";
    $existing_dob = "";
    $existing_cntno1 = "";
    $existing_cntno2 = "";
    $existing_email = "";
    $existing_addr = "";
    $existing_state = "";
    $existing_dstrct = "";
    $existing_pncth = "";
    $existing_pcode = "";
    $existing_adate = "";
    $existing_station = "";
    $existing_date = "";
    $existing_pcntno = "";
    $existing_caser = "";
    $existing_photo = "";

    // Assign POST data to variables
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
    $caser=$_POST["case"];
    $photo = $_POST["photo"];

    // Process uploaded photo
    if(!empty($photo)) {
        move_uploaded_file($_FILES["photo"]["tmp_name"], "../../photo/" . $photo);
    }

    // Insert data into the database
    $sql = "INSERT INTO case_reg (Log_Id,aadharno,name,sex,age,dob,cntno1,cntno2,email,photo,addr,state,dstrct,pncth,pcode,adate,station,date,pcntno,caser) VALUES ('$Log_Id','$aadharno','$name','$sex','$age','$dob','$cntno1','$cntno2','$email','$photo','$addr','$state','$dstrct','$pncth','$pcode','$adate','$station','$date','$pcntno','$caser')";
    $q1 = $db->prepare($sql);
    $q1->execute();    

    header("location:../case_search.php");
?>
