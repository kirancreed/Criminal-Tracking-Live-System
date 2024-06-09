<?php
	include("auth.php");
	include('../connect/db.php');
	$Log_Id=$_SESSION['SESS_PEOPLE_ID'];
	$result = $db->prepare("select * from people where Log_Id='$Log_Id'");
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++)
	{
		$aadharno=$row["aadharno"];	
		$name=$row["name"];
		$sex=$row["sex"];
		$age=$row["age"];
		$dob=$row["dob"];
		$cntno=$row["cntno"];
		$email=$row["email"];
		$addr=$row["addr"];
		
		$state=$row["state"];
		$dstrct=$row["dstrct"];
		$pncth=$row["pncth"];
		$wrd=$row["wrd"];
		$pcode=$row["pcode"];
		$username=$row["username"];
		$password=$row["password"];
		$date=$row["date"];	
		$photo=$row["photo"];	
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include("include/css.php");?>	
</head>
<body class="ttr-opened-sidebar ttr-pinned-sidebar">
	
	<!-- header start -->
	<header class="ttr-header">
		<?php include("include/header.php");?>	
	</header>
	<!-- header end -->
	<!-- Left sidebar menu start -->
		<?php include("include/leftmenu.php");?>	
	<!-- Left sidebar menu end -->

	<!--Main container start -->
	<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Dashboard</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>Dashboard</li>
				</ul>
			</div>	
			<!-- Card -->
			<div class="row">
				<!-- Your Profile Views Chart -->
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>People Update</h4>
						</div>
						<div class="widget-inner">
		<form class="edit-profile m-b30" method="post" action="action/profile_update.php" enctype="multipart/form-data" autocomplete="off">
								<div class="row">
									<div class="col-12">
										<div class="ml-auto">
											<h3>1. Personal Details</h3>
										</div>
									</div>
                                    <div class="form-group col-6">
										<label class="col-form-label">Aadhar No</label>
										<div>                                        
                                            <input class="form-control" type="text" name="aadharno"  value="<?php echo $aadharno;?>"required maxlength="12"> 
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Full Name</label>
										<div>
                                        	<input type="hidden" value="<?php echo $Log_Id;?>" name="Log_Id">
											<input class="form-control" type="text" name="name" value="<?php echo $name;?>">
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Gender</label>
										<div>                                        
										<select class="form-control" name="sex" required>
            <option value="">Select Gender</option>
            <option value="Male" <?php if($sex == 'Male') echo 'selected'; ?>>Male</option>
            <option value="Female" <?php if($sex == 'Female') echo 'selected'; ?>>Female</option>
            <option value="Other" <?php if($sex == 'Other') echo 'selected'; ?>>Other</option>
        </select> 
										</div>
									</div>
                                    <div class="form-group col-6">
										<label class="col-form-label">Age</label>
										<div>
											<input class="form-control" type="text" name="age"  value="<?php echo $age;?>"min="18" required oninvalid="this.setCustomValidity('Age must be 18 or older')" oninput="this.setCustomValidity('')">
										</div>
									</div>
                                    <div class="form-group col-6">
										<label class="col-form-label">Date Of Birth</label>
										<div>
											<input class="form-control" type="date" name="dob"  value="<?php echo $dob;?>">
										</div>
									</div>
                                    <div class="form-group col-6">
										<label class="col-form-label">Phone No.</label>
										<div>
											<input class="form-control" type="text" name="cntno"  value="<?php echo $cntno;?>" required pattern="[0-9]{10,10}" maxlength="10" minlength="10">
										</div>
									</div>																		
                                    <div class="form-group col-6">
										<label class="col-form-label">Email</label>
										<div>
											<input class="form-control" type="text" name="email"  value="<?php echo $email;?>">										
										</div>
									</div>
                                    <div class="form-group col-6">
										<label class="col-form-label">Photo.</label>
										<div>
											<input class="form-control" type="file" name="photo">
										</div>
									</div>
									
									<div class="seperator"></div>
									
									<div class="col-12 m-t20">
										<div class="ml-auto m-b5">
											<h3>2. Address</h3>
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Address</label>
										<div>
											<input class="form-control" type="text" name="addr"  value="<?php echo $addr;?>" required>
										</div>
									</div>	
                                    <div class="form-group col-6">
										<label class="col-form-label">State</label>
										<div>
											<input class="form-control" type="text" name="state"  value="<?php echo $state;?>" required>
										</div>
									</div>
                                    <div class="form-group col-6">
										<label class="col-form-label">District</label>
										<div>
											<input class="form-control" type="text" name="dstrct"  value="<?php echo $dstrct;?>" required>
										</div>
									</div>
                                    <div class="form-group col-6">
										<label class="col-form-label">Panchayath</label>
										<div>
											<input class="form-control" type="text" name="pncth"  value="<?php echo $pncth;?>" required>
										</div>
									</div>								
									<div class="form-group col-6">
										<label class="col-form-label">Ward</label>
										<div>
											<input class="form-control" type="text" name="wrd"  value="<?php echo $wrd;?>" required>
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Postcode</label>
										<div>
											<input class="form-control" type="text" name="pcode"  value="<?php echo $pcode;?>" required pattern="[0-9]{6,6}" maxlength="6" minlength="6">
										</div>
									</div>

									<div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
									
                                    <div class="col-12 m-t20">
										<div class="ml-auto">
									<h3 class="m-form__section">4. Authentication Information</h3>
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Username</label>
										<div>
											<input class="form-control" type="text" name="username"  value="<?php echo $username;?>">
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Password</label>
										<div>
								<input class="form-control" type="password" name="password"  value="<?php echo $password;?>">
										</div>
									</div>                                   	                                    									
									<div class="col-12">
										<button type="submit" class="btn">Update</button>
										<button type="reset" class="btn-secondry">Cancel</button>
									</div>
								</div>
							</form>							
						</div>
					</div>
				</div>
				<!-- Your Profile Views Chart END-->
				<!-- Your Profile Views Chart END-->
                
			</div>
			<!-- Card -->
		</div>
	</main>
	<div class="ttr-overlay"></div>
<?php include("include/js.php");?>
</body>
</html>