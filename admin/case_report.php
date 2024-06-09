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
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Case Report</h4>
						</div>
						<div class="widget-inner">
							<form class="edit-profile m-b30" method="post" action="case_report_view.php" autocomplete="off">
								<div class="row">
									<div class="col-12">
										<div class="ml-auto">
											<h3>Case Statement</h3>
										</div>
									</div>	
                                    <div class="form-group col-4">
                                    	<label class="col-form-label">Aadhar No</label>
										<div>
											<input list="aadharno" required class="form-control" name="aadharno" placeholder="Search">
                                            <datalist id="aadharno">
                                                <option value="">Select</option> 
                                                 <?php
                                                    $result = $db->prepare("select * from crime");
                                                    $result->execute();
                                                    for($i=0; $rows = $result->fetch(); $i++)
                                                    {
                                                    echo '<option>'.$rows['aadharno'].'</option>';
                                                    }
                                                ?>	                                         					
                                            </datalist>
										</div>
									</div> 								
                                    <div class="form-group col-4">
										<label class="col-form-label">From</label>
										<div>
											<input class="form-control" type="date" name="fdate" required max="<?php echo date("Y-m-d");?>">
										</div>
									</div>
									<div class="form-group col-4">
										<label class="col-form-label">To</label>
										<div>
											<input class="form-control" type="date" name="tdate" required max="<?php echo date("Y-m-d");?>">
										</div>
									</div>									
									<div class="seperator"></div>
																							
									<div class="col-12">
											<button type="submit" class="btn pull-right">Submit</button>
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