<?php
	include("auth.php");
	include('../connect/db.php');
	$Log_Id=$_SESSION['SESS_ADMIN_ID'];
	$result = $db->prepare("select * from admin where Log_Id='$Log_Id'");
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++)
	{
		$name=$row["name"];
		$contactno=$row["contactno"];
		$email=$row["email"];
		$username=$row["username"];
		$password=$row["password"];	
		$date=$row["date"];	
		$design=$row["design"];	
		
		$addrs=$row["addrs"];	
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
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>User Profile</h4>
						</div>
						<div class="widget-inner">
							<form class="edit-profile m-b30" method="post" action="action/profile_update.php" enctype="multipart/form-data" autocomplete="off">
								<div class="">
									<div class="form-group row">
										<div class="col-sm-10  ml-auto">
											<h3>1. Personal Details</h3>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Full Name</label>
										<div class="col-sm-7">
											<input class="form-control" type="text" value="<?php echo $name;?>" name="name" required pattern="[a-zA-Z1 _]{3,50}">
                                            <input type="hidden" value="<?php echo $Log_Id;?>" name="Log_Id">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Designation</label>
										<div class="col-sm-7">
											<input class="form-control" type="text" value="<?php echo $design;?>" name="design" required>
										</div>
									</div>		
                                    <div class="form-group row">
										<label class="col-sm-2 col-form-label">Email</label>
										<div class="col-sm-7">
											<input class="form-control" type="email" value="<?php echo $email;?>" name="email">
										</div>
									</div>
                                    <div class="form-group row">
										<label class="col-sm-2 col-form-label">Photo</label>
										<div class="col-sm-7">
											<input class="form-control" type="file" name="photo">
										</div>
									</div>							
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Phone No.</label>
										<div class="col-sm-7">
											<input class="form-control" type="text" value="<?php echo $contactno;?>" name="contactno" required pattern="[0-9]{10,10}" maxlength="10" minlength="10">
										</div>
									</div>
									
									<div class="seperator"></div>
									
									<div class="form-group row">
										<div class="col-sm-10 ml-auto">
											<h3>2. Address</h3>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Address</label>
										<div class="col-sm-7">
											<input class="form-control" type="text"  value="<?php echo $addrs;?>" name="addrs" required>
										</div>
									</div>
								</div>
								<div class="">
									<div class="">
										<div class="row">
											<div class="col-sm-2">
											</div>
											<div class="col-sm-7">
												<button type="submit" class="btn">Save changes</button>
												<button type="reset" class="btn-secondry">Cancel</button>
											</div>
										</div>
									</div>
								</div>
							</form>
							<form class="edit-profile" method="post" action="action/password_update.php" autocomplete="off">
								<div class="">
									<div class="form-group row">
										<div class="col-sm-10 ml-auto">
											<h3>3. Password</h3>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Current Password</label>
										<div class="col-sm-7">
											<input class="form-control" type="password" value="<?php echo $password;?>">
                                            <input type="hidden" value="<?php echo $Log_Id;?>" name="Log_Id">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">New Password</label>
										<div class="col-sm-7">
											<input class="form-control" type="password" name="password" required>
										</div>
									</div>									
								</div>
								<div class="row">
									<div class="col-sm-2">
									</div>
									<div class="col-sm-7">
										<button type="submit" class="btn">Save changes</button>
										<button type="reset" class="btn-secondry">Cancel</button>
									</div>
								</div>
									
							</form>
						</div>
					</div>
				</div>
				<!-- Your Profile Views Chart END-->
                
			</div>
			<!-- Card -->
		</div>
	</main>
	<div class="ttr-overlay"></div>
<?php include("include/js.php");?>
</body>
</html>