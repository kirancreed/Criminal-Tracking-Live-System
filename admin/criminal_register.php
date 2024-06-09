<?php
	include("auth.php");
	include('../connect/db.php');
	$Log_Id=$_SESSION['SESS_ADMIN_ID'];
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
							<h4>Crime Register</h4>
						</div>
						<div class="widget-inner">
							<form class="edit-profile m-b30" action="action/crime_save.php" method="post" enctype="multipart/form-data" autocomplete="off">
								<div class="row">
									<div class="col-12">
										<div class="ml-auto">
											<h3>1. Personal Details</h3>
										</div>
									</div>
									<div class="form-group col-4">
										<label class="col-form-label">Aadhar No</label>
										<div>
											<input class="form-control" type="text" name="aadharno" required maxlength="12" minlength="12">
										</div>
									</div>
                                    <div class="form-group col-4">
										<label class="col-form-label">Full Name</label>
										<div>
											<input class="form-control" type="text" name="name" required pattern="[a-zA-Z1 _]{3,50}">
										</div>
									</div>
									<div class="form-group col-4">
										<label class="col-form-label">Gender</label>
										<div>
                                        	<select name="sex" class="form-control" required>
                                            	<option value="">Select</option>
                                                <option>Male</option>
                                                <option>Female</option>
		                                     </select>
										</div>
									</div>
                                    <div class="form-group col-6">
										<label class="col-form-label">Age</label>
										<div>
											<input class="form-control" type="number" name="age" min="18" max="100" required>
										</div>
									</div>
                                    <div class="form-group col-6">
										<label class="col-form-label">Date Of Birth</label>
										<div>
											<input class="form-control" type="date" name="dob" required max="<?php echo date("2005-01-01");?>">
										</div>
									</div>
                                    <div class="form-group col-6">
										<label class="col-form-label">Contact</label>
										<div>
											<input class="form-control" type="text" name="cntno1" required pattern="[0-9]{10,10}" maxlength="10" minlength="10">
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Email</label>
										<div>
											<input class="form-control" type="text" name="email" required>										
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Phone No.</label>
										<div>
											<input class="form-control" type="text" name="cntno2" required pattern="[0-9]{10,10}" maxlength="10" minlength="10">
										</div>
									</div>
                                    <div class="form-group col-6">
										<label class="col-form-label">Photo.</label>
										<div>
											<input class="form-control" type="file" name="photo" required>
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
											<input class="form-control" type="text" name="addr" required>
										</div>
									</div>									
									<div class="form-group col-6">
										<label class="col-form-label">State</label>
										<div>
											<input class="form-control" type="text" name="state" required>
										</div>
									</div>
                                    <div class="form-group col-6">
										<label class="col-form-label">District</label>
										<div>
											<input class="form-control" type="text" name="dstrct" required>
										</div>
									</div>
                                    <div class="form-group col-6">
										<label class="col-form-label">Panchayath</label>
										<div>
											<input class="form-control" type="text" name="pncth" required>
										</div>
									</div>                                    
									<div class="form-group col-6">
										<label class="col-form-label">Postcode</label>
										<div>
											<input class="form-control" type="text" name="pcode" required pattern="[0-9]{6,6}" maxlength="6" minlength="6">
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
                                                <option value="">Select</option> 
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
											<input class="form-control" type="text" name="pcntno" required pattern="[0-9]{10,10}" maxlength="10" minlength="10">
										</div>
									</div>						
                                    <div class="form-group col-4">
										<label class="col-form-label">Date</label>
										<div>
											<input class="form-control" type="date" name="date" required min="<?php echo date("Y-m-d");?>">
										</div>
									</div>
                                   <div class="col-12 m-t20">
										<div class="ml-auto">
									<h3 class="m-form__section">4. About</h3>
										</div>
									</div>									
									<div class="form-group col-12">
										<label class="col-form-label">Describe</label>
										<div>
								<textarea class="form-control" name="about" required></textarea>
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