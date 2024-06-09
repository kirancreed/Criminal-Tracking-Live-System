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
					<li>Message Reply</li>
				</ul>
			</div>	
			<!-- Card -->
			<div class="row">
				<!-- Your Profile Views Chart -->
				<!-- Your Profile Views Chart -->
				<div class="col-12">
					<div class="widget-box">
                    	
						<table class="table table-bordered table-striped">
                           <thead>
                            <tr>
                             <th>Name</th>  
                             <th>Age</th>    
                             <th>Gender</th>
                             <th>Contact</th>                                   
                             <th>Subject</th>
                             <th>Description</th>
                             <th>Date</th>
                             <th>Reply</th>
                             <th>Date</th>
                           </tr>
                          </thead>
                          <tbody>	
                             <?php
                                $result = $db->prepare("select * from complaints where reply!='Pending'");
                                $result->execute();
                                for($i=1; $row = $result->fetch(); $i++)
                                {
                                echo"<tr>";
                                    echo"<td>".$row["name"]."</td>";
									echo"<td>".$row["age"]."</td>";
									echo"<td>".$row["sex"]."</td>";
									echo"<td>".$row["cntno"]."</td>";
                                    echo"<td>".$row["subjct"]."</td>";
                                    echo"<td>".$row["descp"]."</td>";	
                                    echo"<td>".$row["date"]."</td>";
									echo"<td>".$row["reply"]."</td>";  
									echo"<td>".$row["rdate"]."</td>";    
                               echo"</tr>";
                               }						
                        ?>		
                        </tbody>
                      </table>
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