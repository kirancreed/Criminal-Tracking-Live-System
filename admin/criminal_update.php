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
				<!-- Y<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>All Crime</h4>
						</div>
							<!-- Start -->
                        <?php
                        $result = $db->prepare("select * from crime");
                        $result->execute();
                        $row_count =  $result->rowcount();
                        for($i=0; $rows = $result->fetch(); $i++)
                        {
							?>
                        <div class="widget-inner">
							<div class="card-courses-list admin-courses">
								<div class="card-courses-media">
									<img src="../photo/<?php echo $rows['photo'];?>" alt=""/>
								</div>
								<div class="card-courses-full-dec">
									<div class="card-courses-title">
										<h4>Crime Track</h4>
									</div>
									<div class="card-courses-list-bx">
										<ul class="card-courses-view">
											<li class="card-courses-user">
												<div class="card-courses-user-pic">
													<img src="../photo/<?php echo $rows['photo'];?>" alt=""/>
												</div>
												<div class="card-courses-user-info">
													<h5>Name</h5>
													<h4><?php echo $rows['name'];?></h4>
												</div>
											</li>
                                            <li class="card-courses-categories">
												<h5>Age</h5>
												<h4><?php echo $rows['age'];?></h4>
											</li>	
                                            <li class="card-courses-categories">
												<h5>Gender</h5>
												<h4><?php echo $rows['sex'];?></h4>
											</li>	
                                            <li class="card-courses-categories">
												<h5>Aadhar</h5>
												<h4><?php echo $rows['aadharno'];?></h4>
											</li>
											<li class="card-courses-categories">
												<h5>Station</h5>
												<h4><?php echo $rows['station'];?></h4>
											</li>	                                                                                      
                                            <li class="card-courses-categories">
												<h5>Contact</h5>
												<h4><?php echo $rows['cntno1'];?></h4>
											</li>																				
										</ul>
									</div>
									<div class="row card-courses-dec">
										<div class="col-md-12">
											<h6 class="m-b10">Address</h6>
											<p><?php echo $rows['addr'];?></p>	
                                            <h6 class="m-b10">Date</h6>
											<p><?php echo $rows['date'];?></p>	
                                            <a href="criminal_update_view.php<?php echo '?cand_id='.$rows['cand_id'];?>" class="btn btn-danger btn-sm pull-right">Update</a>
										</div>										
									</div>
									
								</div>
							</div>
							
						</div>
                        <?php }?>
                        <!-- End-->
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