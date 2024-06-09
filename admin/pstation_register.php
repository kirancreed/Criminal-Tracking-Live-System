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
							<h4>Police Station Register</h4>
						</div>
						<div class="widget-inner">
		<form class="edit-profile m-b30" method="post" action="action/pol_save.php" enctype="multipart/form-data" autocomplete="off">
								<div class="row">
									<div class="col-12">
										<div class="ml-auto">
											<h3>1. Station Details</h3>
										</div>
									</div>
										<div class="col-md-12 col-sm-12 col-xs-12">
                                            <label>Station ID</label>
                        <input type="text" class="form-control" name="Log_Id"  required="" value="<?php echo"CRMT".rand(9874475896,1); ?>" readonly>
                                        </div>                                                                                
                                          <div class="col-md-6 col-sm-12 col-xs-12">
                                           <label>Station Name</label>
                                           <input type="text"  name="sname"   class="form-control" required pattern="[A-Za-z]*">
                                          </div>
                                          <div class="col-md-6 col-sm-12 col-xs-12">
                                           <label>Location</label>
                                           <input type="text"  name="locatin"   class="form-control" required pattern="[A-Za-z]*">
                                          </div>                                                                                    
                                          <div class="col-md-12 col-sm-12 col-xs-12">
                                           <label>Address</label>
                                          	<textarea name="addr" class="form-control" rows="2"></textarea>  
                                          </div>
                                          <div class="col-md-6 col-sm-12 col-xs-12">
                                           <label>State</label>
                                           <select name="stat" class="form-control" required>
                                            	<option value="">Select</option>
                                                <option>Kerala</option>
                                                
                                            </select>
                                          </div>                                                                                                                   
                                         <div class="col-md-6 col-sm-12 col-xs-12">
                                            <label>District</label>
                                           	<select name="dist" class="form-control" required>
                                            	<option value="">Select</option>
                                                <option>Palakkad</option>
                                                <option>Thrissur</option>
                                            </select>
                                         </div>
                                         <div class="col-md-12 col-sm-12 col-xs-12">
                                            <label>Area</label>
                                            <textarea name="area" class="form-control" rows="2"></textarea>  
                                         </div>   
									
									<div class="seperator"></div>
									
									<div class="col-12 m-t20">
										<div class="ml-auto m-b5">
											<h3>2. Personal Information</h3>
										</div>
									</div>
									<div class="col-md-6 col-sm-12 col-xs-12">
	                                       <label>SI OR CI Name</label>
    	                                  	<input type="text"  name="scname" rows="1"   class="form-control" required>
        	                              </div>                            	                                      				
									  <div class="col-md-6 col-sm-6 col-xs-12">
										<label style="float:left">Contact No</label>
										<input type="text"  name="cntno1"  class="form-control" required>
									</div>	  
                                     <div class="col-md-6 col-sm-6 col-xs-12">
										<label style="float:left">Contact No</label>
										<input type="text"  name="cntno2"  class="form-control" required>
									</div>	                                                                                                  
                                     <div class="col-md-6 col-sm-6 col-xs-12">
                                        <label>Email</label>
                                        <input type="email"  name="email"  class="form-control" required>
                                    </div>                                    
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                       <label>Photo</label>
                                       <input type="file"  name="photo"  class="form-control" required>
                                    </div>
                                     <div class="col-md-6 col-sm-12 col-xs-12">
                                       <label>Join Date</label>
                                       <input type="date"  name="jdate"  class="form-control" required>
                                    </div>							
                                    
                                    <div class="col-12 m-t20">
										<div class="ml-auto">
									<h3 class="m-form__section">3. Authentication Information</h3>
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Username</label>
										<div>
											<input class="form-control" type="text" name="username" required maxlength="20" minlength="5" >
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Password</label>
										<div>
								<input class="form-control" type="password" name="password" required maxlength="20" minlength="4" >
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