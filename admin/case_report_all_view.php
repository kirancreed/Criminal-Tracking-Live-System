<?php
	include("auth.php");
	include('../connect/db.php');
	$fdate=$_POST["fdate"];
	$tdate=$_POST["tdate"];
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
							<h4>
                            	Generate Report For 
                                Form <?php echo $fdate;?>
                                To <?php echo $tdate;?>
                            </h4>
						</div>
						<div class="widget-inner">
							<div class="content-wrapper">
     <!-- Main content -->
     <section class="invoice">      
      <!-- info row -->
      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Sl No</th>
                <th>Date</th>
                <th>Aadhar</th>
                <th>Name</th>
                <th>Age</th>   
                <th>Contact</th>                                                  
                <th>Address</th>
                <th>Station</th>
                <th>Contact</th>    
                <th>Case</th>
            </tr>
            </thead>
            <tbody>
         	<?php				
				$npmnt=0;				
				$result = $db->prepare("select * from case_reg where  date>='$fdate' and date<='$tdate' order by date asc");
				$result->execute();
				for($i=1; $row = $result->fetch(); $i++)
				{
					echo"<tr>";
						echo"<td>".$i."</td>";
						echo"<td>".$row["date"]."</td>";
						echo"<td>".$row["aadharno"]."</td>";
						echo"<td>".$row["name"]."</td>";
						echo"<td>".$row["age"]."</td>";
						echo"<td>".$row["cntno1"]."</td>";
						echo"<td>".$row["addr"]."</td>";
						echo"<td>".$row["station"]."</td>";	
						echo"<td>".$row["pcntno"]."</td>";
						echo"<td>".$row["caser"]."</td>";			
					echo"</tr>";
				}
			?>
            </tr>                              
            </tbody>
          </table>
       </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          
          <button type="button" class="btn btn-primary pull-right" style="position:relative; left:800px; width:180px;"  onClick="window.print() ">
            <i class="fa fa-print"></i> Print
          </button>                    
          </form>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
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