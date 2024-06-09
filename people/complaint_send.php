<?php
	include("auth.php");
	include('../connect/db.php');
	$Log_Id=$_SESSION['SESS_PEOPLE_ID'];
	$result = $db->prepare("select * from people where Log_Id='$Log_Id'");
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++)
	{
		$mname=$row["name"];
		$age=$row["age"];
		$sex=$row["sex"];
		$cntno=$row["cntno"];

		$police_stations = $db->prepare("SELECT poli_id, sname FROM pl_station");
		$police_stations->execute();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- META ============================================= -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	
	<!-- DESCRIPTION -->
	<meta name="description" content="Easy Pay" />
	
	<!-- OG -->
	<meta property="og:title" content="Easy Pay" />
	<meta property="og:description" content="Easy Pay" />
	<meta property="og:image" content="" />
	<meta name="format-detection" content="telephone=no">
	
	<!-- FAVICONS ICON ============================================= -->
	<link rel="icon" href="../error-404.html" type="image/x-icon" />
	<link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png" />
	
	<!-- PAGE TITLE HERE ============================================= -->
	<title>Crime Track</title>
	
	<!-- MOBILE SPECIFIC ============================================= -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="assets/css/assets.css">
	<link rel="stylesheet" type="text/css" href="assets/vendors/calendar/fullcalendar.css">
	<link rel="stylesheet" type="text/css" href="assets/vendors/summernote/summernote.css">
	<link rel="stylesheet" type="text/css" href="assets/vendors/file-upload/imageuploadify.min.css">
	
	<!-- TYPOGRAPHY ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/typography.css">
	
	<!-- SHORTCODES ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/shortcodes/shortcodes.css">
	
	<!-- STYLESHEETS ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/dashboard.css">
	<link class="skin" rel="stylesheet" type="text/css" href="assets/css/color/color-1.css">
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
				<div class="col-lg-8 m-b30">
					<div class="widget-box">
						<div class="email-wrapper">							
							<div class="mail-list-container">
								<form class="mail-compose" method="post" action="action/complaint_save.php" autcomplete="off">
                                <div class="row">
									<div class="form-group col-6">
                                    	<label class="col-form-label">Name</label>
                                    	<div>
										<input class="form-control" type="name" value="<?php echo $mname;?>" name="name" required>
                                        <input type="hidden" value="<?php echo $Log_Id;?>" name="Log_Id">
                                        </div>
									</div>	
                                    <div class="form-group col-6">
                                    	<label class="col-form-label">Age</label>
                                    	<div>
										<input class="form-control" type="text" value="<?php echo $age;?>"  name="age" required>
                                        </div>
									</div>
                                  </div>
                                 <div class="row"> 
                                    <div class="form-group col-6">
                                    	<label class="col-form-label">Gender</label>
                                    	<div>
        <select class="form-control" name="sex" required>
            <option value="" >Select Gender</option>
            <option value="male" <?php if($sex == 'male') echo 'selected'; ?>>Male</option>
            <option value="female" <?php if($sex == 'female') echo 'selected'; ?>>Female</option>
            <option value="other" <?php if($sex == 'other') echo 'selected'; ?>>Other</option>
        </select>
    </div>
									</div>
                                    <div class="form-group col-6">
                                    	<label class="col-form-label">Contact</label>
                                    	<div>
										<input class="form-control" type="text" value="<?php echo $cntno;?>"  name="cntno" required>
                                        </div>
									</div>
                                  </div>	
                                  <div class="row">  							
									<div class="form-group col-6">
                                    	<label class="col-form-label">Subject</label>
                                    	<div>
										<input class="form-control" type="text"  name="subjct" required>
                                        </div>
									</div>


									
                                    <div class="form-group col-6">
                                    	<label class="col-form-label">Date</label>
                                    	<div>
										<input class="form-control" type="date" value="<?php echo date("Y-m-d");?>"  name="date" required max="<?php echo date("Y-m-d");?>">
                                        </div>
									</div>     
                                 </div>	

								 <div class="form-group col-6">
                                    	<label class="col-form-label">Police Station</label>
                                    	<div>
										<select class="form-control" name="police_station" required>
											<option value="">Select Police Station</option>
											<?php 
												while($station = $police_stations->fetch()) {
													echo "<option value='".$station['poli_id']."'>".$station['sname']."</option>";
												}
											?>
										</select>
                                        </div>
									</div>
								 


                                 <div class="row">  		
                                     <div class="form-group col-12">
                                     	<label class="col-form-label">Description</label>
                                        <div>
                                            <textarea name="descp" class="form-control" required></textarea>
                                        </div>							
                                     </div>                                     
                                 </div>
									<div class="form-group col-12">
										<button type="submit" class="btn btn-lg pull-right">Send</button>
									</div>
								</form>
							</div>
						</div>
					</div> 
				</div>
				<!-- Your Profile Views Chart END-->
				
                
			</div>
			<!-- Card -->
		</div>
	</main>
	<div class="ttr-overlay"></div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/vendors/bootstrap/js/popper.min.js"></script>
<script src="assets/vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>
<script src="assets/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
<script src="assets/vendors/magnific-popup/magnific-popup.js"></script>
<script src="assets/vendors/counter/waypoints-min.js"></script>
<script src="assets/vendors/counter/counterup.min.js"></script>
<script src="assets/vendors/imagesloaded/imagesloaded.js"></script>
<script src="assets/vendors/masonry/masonry.js"></script>
<script src="assets/vendors/masonry/filter.js"></script>
<script src="assets/vendors/owl-carousel/owl.carousel.js"></script>
<script src='assets/vendors/scroll/scrollbar.min.js'></script>
<script src="assets/js/functions.js"></script>
<script src="assets/vendors/chart/chart.min.js"></script>
<script src="assets/js/admin.js"></script>
<script src="assets/vendors/summernote/summernote.js"></script>
<script src="assets/vendors/file-upload/imageuploadify.min.js"></script>
<script src='assets/vendors/switcher/switcher.js'></script>
<script>
    $(document).ready(function() {
      $('.summernote').summernote({
        height: 300,
        tabsize: 2
      });
	  
	   $('input[type="file"]').imageuploadify();
    });
</script>
</body>
</html>