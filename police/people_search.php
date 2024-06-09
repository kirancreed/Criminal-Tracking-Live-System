<?php
	include("auth.php");
	include('../connect/db.php');
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
			
			
			<div class="row">
                <div class="col-md-12">
                    <form method="get" action="">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search by name">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>

			<!-- Card -->
			<div class="row">
				<!-- Y<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>All Peoples</h4>
						</div>
							<!-- Start -->
							
							<?php
                        // Database connection
                        include('../connect/db.php');

                        // Get search term
                        $search = isset($_GET['search']) ? $_GET['search'] : '';

                        // Prepare SQL query based on search term
                        if ($search) {
                            $query = "SELECT * FROM people WHERE name LIKE :search";
                            $stmt = $db->prepare($query);
                            $stmt->execute(['search' => "%$search%"]);
                        } else {
                            $stmt = $db->prepare("SELECT * FROM people");
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
												<h5>Age</h5>
												<h4><?php echo $rows['age'];?></h4>
											</li>	
                                            <li class="card-courses-categories">
												<h5>Gender</h5>
												<h4><?php echo $rows['sex'];?></h4>
											</li>
                                             <li class="card-courses-categories">
												<h5>State</h5>
												<h4><?php echo $rows['state'];?></h4>
											</li>
                                             <li class="card-courses-categories">
												<h5>District</h5>
												<h4><?php echo $rows['dstrct'];?></h4>
											</li>
                                            <li class="card-courses-categories">
												<h5>Panchayath</h5>
												<h4><?php echo $rows['pncth'];?></h4>
											</li>	
                                            <li class="card-courses-categories">
												<h5>Ward</h5>
												<h4><?php echo $rows['wrd'];?></h4>
											</li>																					
										</ul>
									</div>
									<div class="row card-courses-dec">
										<div class="col-md-3">
											<h6 class="m-b10">Aadhar</h6>
											<p><?php echo $rows['aadharno'];?></p>	
                                            <h6 class="m-b10">Contact</h6>
											<p><?php echo $rows['cntno'];?></p>	
										</div>
                                        <div class="col-md-9">
											<h6 class="m-b10">Address</h6>
											<p><?php echo $rows['addr'];?></p>	
                                            <h6 class="m-b10">Date</h6>
											<p><?php echo $rows['date'];?></p>	
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