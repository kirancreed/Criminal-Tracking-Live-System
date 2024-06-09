<?php
	include("auth.php");
	include('../connect/db.php');
	$Log_Id=$_SESSION['SESS_OFFICER_ID'];
	$result = $db->prepare("select * from pl_station where Log_Id='$Log_Id'");
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++)
	{		
		
		$Log_Id=$row["Log_Id"];
		$sname=$row["sname"];
		$locatin=$row["locatin"];
		$addr=$row["addr"];
		$stat=$row["stat"];
		$dist=$row["dist"];
		$area=$row["area"];
		$scname=$row["scname"];
		$cntno1=$row["cntno1"];
		$cntno2=$row["cntno2"];
		$email=$row["email"];
		$jdate=$row["jdate"];
		$username=$row["username"];
		$password=$row["password"];
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
							<h4>Update Profile</h4>
						</div>
						<div class="widget-inner">
		<form class="edit-profile m-b30" method="post" action="action/profile_update.php" enctype="multipart/form-data">
								<div class="row">
									<div class="col-12">
										<div class="ml-auto">
											<h3>1. Station Details</h3>
										</div>
									</div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                            <label>Station ID</label>
                        <input type="text" class="form-control" name="Log_Id" value="<?php echo $Log_Id;?>" readonly>
                                        </div>                                                                                
                                          <div class="col-md-6 col-sm-12 col-xs-12">
                                           <label>Station Name</label>
                                           <input type="text"  name="sname"   class="form-control" required pattern="[A-Za-z]*" value="<?php echo $sname;?>">
                                          </div>
                                          <div class="col-md-6 col-sm-12 col-xs-12">
                                           <label>Location</label>
                                           <input type="text"  name="locatin"   class="form-control" required pattern="[A-Za-z]*" value="<?php echo $locatin;?>">
                                          </div>                                                                                    
                                          <div class="col-md-12 col-sm-12 col-xs-12">
                                           <label>Address</label>
                                          	<textarea name="addr" class="form-control" rows="2"><?php echo $addr;?></textarea>  
                                          </div>
                                          <div class="col-md-6 col-sm-12 col-xs-12">
                                           <label>State</label>
                                           <select name="stat" class="form-control" required>
                                            	<option><?php echo $stat;?></option>
                                                <option>Kerala</option>
                                                <option>Tamilnadu</option>
                                            </select>
                                          </div>                                                                                                                   
                                         <div class="col-md-6 col-sm-12 col-xs-12">
                                            <label>District</label>
                                           	<select name="dist" class="form-control" required>
                                            	<option><?php echo $dist;?></option>
                                                <option>Palakkad</option>
                                                <option>Thrissur</option>
                                            </select>
                                         </div>
                                         <div class="col-md-12 col-sm-12 col-xs-12">
                                            <label>Area</label>
                                            <textarea name="area" class="form-control" rows="2"><?php echo $Log_Id;?></textarea>  
                                         </div>  
									
									<div class="seperator"></div>
									
									<div class="col-12 m-t20">
										<div class="ml-auto m-b5">
											<h3>2. Personal Information</h3>
										</div>
									</div>
									<div class="col-md-6 col-sm-12 col-xs-12">
	                                       <label>SI OR CI Name</label>
    	                                  	<input type="text"  name="scname" rows="1"   class="form-control" required value="<?php echo $scname;?>">
        	                              </div>                            	                                      				
									  <div class="col-md-6 col-sm-6 col-xs-12">
										<label style="float:left">Contact No</label>
										<input type="text"  name="cntno1"  class="form-control" required value="<?php echo $cntno1;?>">
									</div>	  
                                     <div class="col-md-6 col-sm-6 col-xs-12">
										<label style="float:left">Contact No</label>
										<input type="text"  name="cntno2"  class="form-control" required value="<?php echo $cntno2;?>">
									</div>	                                                                                                  
                                     <div class="col-md-6 col-sm-6 col-xs-12">
                                        <label>Email</label>
                                        <input type="email"  name="email"  class="form-control" required value="<?php echo $email;?>">
                                    </div>                                    
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                       <label>Photo</label>
                                       <input type="file"  name="photo"  class="form-control">
                                    </div>
                                     <div class="col-md-6 col-sm-12 col-xs-12">
                                       <label>Join Date</label>
                                       <input type="date"  name="jdate"  class="form-control" required value="<?php echo $jdate;?>">
                                    </div>	
                                    <div class="col-12 m-t20">
										<div class="ml-auto">
									<h3 class="m-form__section">4. Authentication Information</h3>
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Username</label>
										<div>
											<input class="form-control" type="text" name="username"  value="<?php echo $username;?>" readonly>
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Password</label>
										<div>
								<input class="form-control" type="password" name="password"  value="<?php echo $password;?>" readonly>
										</div>
									</div>                                   	
                                    <div class="col-12 m-t20">
										<div class="ml-auto">
									<h3 class="m-form__section">5. About</h3>
										</div>
									</div>									
									<div class="form-group col-12">
										<label class="col-form-label">Describe</label>
										<div>
								<textarea class="form-control" name="about"><?php echo $about;?></textarea>
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