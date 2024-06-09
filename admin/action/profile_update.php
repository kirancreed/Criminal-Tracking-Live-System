<?php
    include("../../connect/db.php");

    $Log_Id=$_POST["Log_Id"];

    // Fetch existing data from the database
    $sql_fetch = "SELECT * FROM admin WHERE Log_Id = :Log_Id";
    $q_fetch = $db->prepare($sql_fetch);
    $q_fetch->bindParam(':Log_Id', $Log_Id);
    $q_fetch->execute();
    $row = $q_fetch->fetch(PDO::FETCH_ASSOC);

    // Assign fetched data to variables
    $existing_name = $row['name'];
    $existing_design = $row['design'];
    $existing_email = $row['email'];
    $existing_contactno = $row['contactno'];
    $existing_addrs = $row['addrs'];
    $existing_photo = $row['photo'];

    // Assign POST data to variables
    $name=$_POST["name"];
    $design=$_POST["design"];
    $email=$_POST["email"];
    $contactno=$_POST["contactno"];
    $addrs=$_POST["addrs"];
    $photo = $_FILES["photo"]["name"];

    // Process uploaded photo
    if(!empty($photo)) {
        move_uploaded_file($_FILES["photo"]["tmp_name"], "../../photo/" . $photo);
    }

    // Update data in the database
    if(empty($photo)) {
        $sql_update = "UPDATE admin SET ";
        $sql_update .= "name='$name', ";
        $sql_update .= "design='$design', ";
        $sql_update .= "email='$email', ";
        $sql_update .= "contactno='$contactno', ";
        $sql_update .= "addrs='$addrs' ";
    } else {
        $sql_update = "UPDATE admin SET ";
        $sql_update .= "name='$name', ";
        $sql_update .= "design='$design', ";
        $sql_update .= "email='$email', ";
        $sql_update .= "contactno='$contactno', ";
        $sql_update .= "addrs='$addrs', ";
        $sql_update .= "photo='$photo' ";
    }
    $sql_update .= "WHERE Log_Id='$Log_Id'";

    $q_update = $db->prepare($sql_update);
    $q_update->execute();

    header("location:../index.php");
?>
