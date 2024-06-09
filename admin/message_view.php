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
					<li>All Message</li>
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
                             <th>Subject</th>
                             <th>Description</th>
                             <th>Date</th>
                             <th>Reply</th>
                           </tr>
                          </thead>
                          <tbody>	
                             <?php
                                $result = $db->prepare("select * from message where reply='Pending'");
                                $result->execute();
                                for($i=1; $row = $result->fetch(); $i++)
                                {
									$msg_id=$row["msg_id"];
                                echo"<tr>";
                                    echo"<td>".$row["name"]."</td>";
                                    echo"<td>".$row["subjct"]."</td>";
                                    echo"<td>".$row["descp"]."</td>";	
                                    echo"<td>".$row["date"]."</td>";   
									 ?>
                                    <td>
                                        <a href="message_send.php<?php echo '?msg_id='.$msg_id;?>" class=" btn btn-sm btn-info">&nbsp;Send</a>  
                                    </td>    								                           
                                   <?php	                                  								                           																				
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