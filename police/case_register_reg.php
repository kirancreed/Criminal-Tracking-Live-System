<?php
	include("auth.php");
	include('../connect/db.php');
	$aadharno=$_POST['aadharno'];
	$result = $db->prepare("select * from crime where aadharno='$aadharno'");
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++)
	{
		$name=$row["name"];	
		$sex=$row["sex"];
		$age=$row["age"];
		$dob=$row["dob"];
		$cntno1=$row["cntno1"];
		$cntno2=$row["cntno2"];
		$email=$row["email"];
		$addr=$row["addr"];
		$state=$row["state"];
		$dstrct=$row["dstrct"];
		$pncth=$row["pncth"];
		$pcode=$row["pcode"];
		$adate=$row["adate"];
		$station=$row["station"];
		$pcntno=$row["pcntno"];
		$date=$row["date"];	
		$photo1=$row["photo"];	
		$about=$row["about"];	
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
							<h4>Crime Update</h4>
							
							




						</div>
						<div class="widget-inner">
		<form class="edit-profile m-b30" method="post" action="action/case_register.php" enctype="multipart/form-data" autocomplete="off">
								<div class="row">
									<div class="col-12">
										<div class="ml-auto">
											<h3>1. Personal Details</h3>
										</div>
									</div>
                                    <div class="form-group col-6">
										<label class="col-form-label">Aadhar No</label>
										<div>                                        
                                            <input class="form-control" type="text" name="aadharno"  value="<?php echo $aadharno;?>" readonly> 
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Full Name</label>
										<div>
											<input class="form-control" type="text" name="name" value="<?php echo $name;?>" readonly>
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Gender</label>
										<div>                                        
                                            <input class="form-control" type="text" name="sex"  value="<?php echo $sex;?>" readonly> 
										</div>
									</div>
                                    <div class="form-group col-6">
										<label class="col-form-label">Age</label>
										<div>
											<input class="form-control" type="text" name="age"  value="<?php echo $age;?>">
										</div>
									</div>
                                    <div class="form-group col-6">
										<label class="col-form-label">Date Of Birth</label>
										<div>
											<input class="form-control" type="text" name="dob"  value="<?php echo $dob;?>" readonly>
										</div>
									</div>
                                    <div class="form-group col-6">
										<label class="col-form-label">Phone No.</label>
										<div>
											<input class="form-control" type="text" name="cntno1"  value="<?php echo $cntno1;?>">
										</div>
									</div>									
									<div class="form-group col-6">
										<label class="col-form-label">Phone No.</label>
										<div>
											<input class="form-control" type="text" name="cntno2"  value="<?php echo $cntno2;?>" required pattern="[0-9]{10,10}" maxlength="10" minlength="10">
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
										<img src="<?php echo '../photo/'.$photo1; ?>" alt="Image">

											<input class="form-control" type="text" name="photo" value="<?php echo $photo1;?>">
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
										<label class="col-form-label">Postcode</label>
										<div>
											<input class="form-control" type="text" name="pcode"  value="<?php echo $pcode;?>" required pattern="[0-9]{6,6}" maxlength="6" minlength="6">
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Application Date</label>
										<div>
											<input class="form-control" type="date" name="adate" value="<?php echo date("Y-m-d");?>" readonly>
										</div>
									</div>
									<div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>

									<div class="col-12 m-t20">
										<div class="ml-auto">
											<h3 class="m-form__section">3. Crime Information</h3>
										</div>
									</div>

									<div class="form-group col-4">
										<label class="col-form-label">Station</label>
										<div>
                                        	<input list="station" required class="form-control" name="station" placeholder="Search" >
                                            <datalist id="station">
                                                <option><?php echo $station;?></option> 
                                                 <?php
                                                    $result = $db->prepare("select * from pl_station");
                                                    $result->execute();
                                                    for($i=0; $rows = $result->fetch(); $i++)
                                                    {
                                                    echo '<option>'.$rows['sname'].'</option>';
                                                    }
                                                ?>	                                         					
                                            </datalist>  
										</div>
									</div>
                                    <div class="form-group col-4">
										<label class="col-form-label">Phone No.</label>
										<div>
											<input class="form-control" type="text" name="pcntno" value="<?php echo $pcntno;?>" required pattern="[0-9]{10,10}" maxlength="10" minlength="10">
										</div>
									</div>									
									<div class="form-group col-4">
										<label class="col-form-label">Date</label>
										<div>
											<input class="form-control" type="date" name="date"  value="<?php echo $date;?>" readonly>
										</div>
									</div>
                                    <div class="col-12 m-t20">
										<div class="ml-auto">
									<h3 class="m-form__section">4. Case</h3>
										</div>
									</div>									
									<div class="form-group col-12">
										<label class="col-form-label">Describe</label>
										<div>
								<textarea class="form-control" name="case" required></textarea>
										</div>
									</div>	                                 	                                    									
									<div class="col-12">
										<button type="submit" class="btn">Register</button>
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