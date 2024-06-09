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
				<h4 class="breadcrumb-title">Dashboard Admin</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>Dashboard</li>
				</ul>
			</div>	
			<!-- Card -->
			<div class="row">
				<div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
					<div class="widget-card widget-bg1">					 
						<div class="wc-item">
							<h4 class="wc-title">
								Police Station
							</h4>
							<span class="wc-des">
								All Police Station
							</span>
							<span class="wc-stats">
                            	<span class="counter">
									<?php
                                        $result = $db->prepare("select count(*) from pl_station");
                                        $result->execute();
                                        for($i=0; $row = $result->fetch(); $i++)
                                        {
                                            echo"".$row['count(*)']."";
                                        }
                                    ?>
								</span>
							</span>		
							<div class="progress wc-progress">
								<div class="progress-bar" role="progressbar" style="width: 78%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							
						</div>				      
					</div>
				</div>
				<div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
					<div class="widget-card widget-bg2">					 
						<div class="wc-item">
							<h4 class="wc-title">
								Crime
							</h4>
							<span class="wc-des">
								All Crime
							</span>
							<span class="wc-stats counter">
								<span class="counter">
									<?php
                                        $result = $db->prepare("select count(*) from crime");
                                        $result->execute();
                                        for($i=0; $row = $result->fetch(); $i++)
                                        {
                                            echo"".$row['count(*)']."";
                                        }
                                    ?>
								</span>
							</span>		
							<div class="progress wc-progress">
								<div class="progress-bar" role="progressbar" style="width: 88%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							
						</div>				      
					</div>
				</div>
				<div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
					<div class="widget-card widget-bg3">					 
						<div class="wc-item">
							<h4 class="wc-title">
								People
							</h4>
							<span class="wc-des">
								All People
							</span>
							<span class="wc-stats counter">
								<span class="counter">
									<?php
                                        $result = $db->prepare("select count(*) from people");
                                        $result->execute();
                                        for($i=0; $row = $result->fetch(); $i++)
                                        {
                                            echo"".$row['count(*)']."";
                                        }
                                    ?>
								</span> 
							</span>		
							<div class="progress wc-progress">
								<div class="progress-bar" role="progressbar" style="width: 65%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							
						</div>				      
					</div>
				</div>
				<div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
					<div class="widget-card widget-bg4">					 
						<div class="wc-item">
							<h4 class="wc-title">
								Complanits 
							</h4>
							<span class="wc-des">
								All Complanits
							</span>
							<span class="wc-stats counter">
								<span class="counter">
									<?php
                                        $result = $db->prepare("select count(*) from complaints");
                                        $result->execute();
                                        for($i=0; $row = $result->fetch(); $i++)
                                        {
                                            echo"".$row['count(*)']."";
                                        }
                                    ?>
								</span>
							</span>		
							<div class="progress wc-progress">
								<div class="progress-bar" role="progressbar" style="width: 90%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							
						</div>				      
					</div>
				</div>
			</div>
			<!-- Card END -->
			<div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-8 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Case Track</h4>
						</div>
						<div class="widget-inner">
							<canvas id="chart" width="100" height="45"></canvas>
						</div>
					</div>
				</div>
				<!-- Your Profile Views Chart END-->
				<div class="col-lg-4 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Notifications</h4>
						</div>
						<div class="widget-inner">
							<div class="noti-box-list">
								<ul>
									<?php
									$result = $db->prepare("select * from notification");
									$result->execute();
									$row_count =  $result->rowcount();
									for($i=0; $rows = $result->fetch(); $i++)
									{
										?>
									<li>
										<span class="notification-icon dashbg-green">
											<i class="fa fa-comments-o"></i>
										</span>
										<span class="notification-text">
											<a href="notification_view.php"><?php echo $rows['subjct'];?></a> 
										</span>
										<span class="notification-time">
											<a href="notification_view.php" class="fa fa-close"></a>
											<span> <?php echo $rows['date'];?></span>
										</span>
									</li>
									<?php }?>
								</ul>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-lg-12 m-b30">
					
				</div>
			</div>
		</div>
	</main>
	<div class="ttr-overlay"></div>
<?php include("include/js.php");?>
</body>
</html>