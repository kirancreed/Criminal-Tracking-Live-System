<?php
	include("auth.php");
	include('../connect/db.php');
	$Log_Id=$_SESSION['SESS_OFFICER_ID'];
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
			
			<!-- Search bar start -->
			<div class="row">
				<div class="col-md-12">
					<form method="get" action="">
						<div class="input-group mb-3">
							<input type="text" name="search" class="form-control" placeholder="Search by name, aadhar number, age, sex, panchayath, or contact">
							<span class="input-group-btn">
								<button class="btn btn-primary" type="submit">Search</button>
							</span>
						</div>
					</form>
				</div>
			</div>
			<!-- Search bar end -->

			<!-- Card -->
			<div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Crime Track</h4>
						</div>
                        <!-- Start -->
                        <?php
                        // Get search term
                        $search = isset($_GET['search']) ? $_GET['search'] : '';

                        // Prepare SQL query based on search term
                        if ($search) {
                            $query = "SELECT * FROM warning_cr WHERE stat='approve' AND (name LIKE :search OR aadharno LIKE :search OR age LIKE :search OR sex LIKE :search OR pncth LIKE :search OR cntno LIKE :search)";
                            $stmt = $db->prepare($query);
                            $stmt->execute(['search' => "%$search%"]);
                        } else {
                            $query = "SELECT * FROM warning_cr WHERE stat='approve'";
                            $stmt = $db->prepare($query);
                            $stmt->execute();
                        }

                        // Fetch and display results
                        $row_count = $stmt->rowCount();
                        while ($rows = $stmt->fetch(PDO::FETCH_ASSOC)) {
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
												<h5>Aadhar No</h5>
												<h4><?php echo $rows['aadharno'];?></h4>
											</li>
											<li class="card-courses-categories">
												<h5>Age</h5>
												<h4><?php echo $rows['age'];?></h4>
											</li>
                                            <li class="card-courses-categories">
												<h5>Sex</h5>
												<h4><?php echo $rows['sex'];?></h4>
											</li>
                                            <li class="card-courses-categories">
												<h5>Panchayath</h5>
												<h4><?php echo $rows['pncth'];?></h4>
											</li>                                            
                                            <li class="card-courses-categories">
												<h5>Contact</h5>
												<h4><?php echo $rows['cntno'];?></h4>
											</li>																				
										</ul>
									</div>
									<div class="row card-courses-dec">
										<div class="col-md-4">
											<h6 class="m-b10">Date </h6>
											<p><?php echo $rows['sidate'];?></p> 	
										</div>
                                        <div class="col-md-4">
											<h6 class="m-b10">Time</h6>
											<p><?php echo $rows['sitm'];?></p>	
										</div>										
									</div>
									
								</div>
							</div>
							
						</div>
                        <?php }?>
                        <!-- End -->
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
