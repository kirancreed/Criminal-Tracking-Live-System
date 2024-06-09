<?php
	include("auth.php");
	include('../connect/db.php');
	$Log_Id=$_SESSION['SESS_ADMIN_ID'];
	$stat="pending";
	$result =$db->prepare("select * from wrngtemp");
	$result->execute();	
	for($i=0;$row=$result->fetch();$i++)
	{
		$name = $row["name"];
		$sidate = $row["sidate"];
		$sitm = $row["sitm"];
	
		$result =$db->prepare("select * from crime where name='$name'");
		$result->execute();	
		
		for($i=0;$row=$result->fetch();$i++)
		{	
		$Log_Id = $row["Log_Id"];
		$aadharno = $row["aadharno"];
		$sex = $row["sex"];
		$age = $row["age"];
		$cntno = $row["cntno1"];
		$photo = $row["photo"];
		
		$dstrct = $row["dstrct"];
		$pncth = $row["pncth"];

			
		$sql = "insert into warning_cr(Log_Id,name,aadharno,sex,age,cntno,photo,dstrct,pncth,sidate,sitm,stat) VALUES ('$Log_Id','$name','$aadharno','$sex','$age','$cntno','$photo','$dstrct','$pncth','$sidate','$sitm','$stat')";
		$q1 = $db->prepare($sql);
		$q1->execute();
		}
	}
	$sql = "delete from wrngtemp";
	$q1 = $db->prepare($sql);
	$q1->execute();
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
							<h4>Warning Request</h4>
						</div>
                        <!-- Start -->
                        <?php
                        $result = $db->prepare("select * from warning_cr where stat='pending'");
                        $result->execute();
                        $row_count =  $result->rowcount();
                        for($i=0; $rows = $result->fetch(); $i++)
                        {
							$wrng_id = $rows['wrng_id'];
							$aadharno = $rows['aadharno'];
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
												<h4><?php echo $rows['sex'];?></h4>
											</li>
                                            <li class="card-courses-categories">
												<h5>Sex</h5>
												<h4><?php echo $rows['age'];?></h4>
											</li>
                                            <li class="card-courses-categories">
												<h5>Panchayath</h5>
												<h4><?php echo $rows['pncth'];?></h4>
											</li>                                            
                                            <li class="card-courses-categories">
												<h5>Contact</h5>
												<h4><?php echo $rows['cntno'];?></h4>
											</li>
											<li class="card-courses-categories">
											<a href="#" class="btn button-sm green radius-xl">
												<?php echo ucfirst($rows['stat']);?>
                                            </a>
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
										<div class="col-md-12">
				<a href="action/wrng_appr.php<?php echo '?wrng_id='.$wrng_id;?>" class="btn green radius-xl outline">Verify</a>
				<a href="warning_request_case.php<?php echo '?aadharno='.$aadharno;?>" class="btn red outline radius-xl ">Case</a>
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
