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
					<li><a href="#"><i class="fa fa-home"></i>Notification</a></li>
				</ul>
			</div>	
			<!-- Card -->
			<div class="row">
				<!-- Your Profile Views Chart -->
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="email-wrapper">						
							<div class="mail-list-container">
                            	<form method="post" action="notification_serch.php" autocomplete="off">
								<div class="mail-toolbar">									
                                    <div class="mail-search-bar">
										<input type="text" class="form-control" placeholder="Search" name="name" required/>
									</div>
									<div class="mail-search-bar">
											<input type="submit" value="Search" class="btn btn-block" style="width:150px; margin-left:2px;">
									</div>
									<div class="next-prev-btn">
										<a href="#"><i class="fa fa-angle-left"></i></a>
										<a href="#"><i class="fa fa-angle-right"></i></a>
									</div>
								</div>
                                </form>
							<?php
                                $result = $db->prepare("select * from notification where name='Police'");
                                $result->execute();
                                $row_count =  $result->rowcount();
                                for($i=0; $rows = $result->fetch(); $i++)
                                {
                                    ?>
                                <div class="mail-box-list">
									<div class="mail-list-info">
										<div class="mail-list-title">
											<h6><?php echo $rows['name'];?></h6>
										</div>
										<div class="mail-list-title-info">
											<p><?php echo $rows['subjct'];?></p>
										</div>
                                        <div class="mail-list-title-info">
											<p><?php echo $rows['descp'];?></p>
										</div>
                                        <div class="mail-list-title-info">
											<p><a href="../photo/<?php echo $rows['photo'];?>" download>Download</a></p>
										</div>
										<div class="mail-list-time">
											<span> <?php echo $rows['date'];?> <?php echo $rows['tme'];?></span>
										</div>										
									</div>
									<?php }?>
								</div>
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
<?php include("include/js.php");?>
</body>
</html>