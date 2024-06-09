<?php
    include("auth.php");
    include('../connect/db.php');
    
    $Log_Id = $_SESSION['SESS_OFFICER_ID'];
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
                             <th>Police Station</th>
                             <th>Description</th>
                             <th>Date</th>
                             <th>Reply</th>
                           </tr>
                          </thead>
                          <tbody>    
                             <?php
                                $result = $db->prepare("SELECT c.*, p.sname AS station_name 
                                FROM complaints c 
                                LEFT JOIN pl_station p ON c.poli_station = p.poli_id 
                                WHERE c.reply = 'Pending' 
                                AND c.poli_station = (SELECT poli_id FROM pl_station WHERE Log_id = ?)");
                                
                                if ($result->execute([$Log_Id])) {
                                    while ($row = $result->fetch()) {
                                        $msg_id = $row["msg_id"];
                                        echo "<tr>";
                                        echo "<td>".htmlspecialchars($row["name"], ENT_QUOTES, 'UTF-8')."</td>";
                                        echo "<td>".htmlspecialchars($row["age"], ENT_QUOTES, 'UTF-8')."</td>";
                                        echo "<td>".htmlspecialchars($row["sex"], ENT_QUOTES, 'UTF-8')."</td>";
                                        echo "<td>".htmlspecialchars($row["cntno"], ENT_QUOTES, 'UTF-8')."</td>";
                                        echo "<td>".htmlspecialchars($row["subjct"], ENT_QUOTES, 'UTF-8')."</td>";
                                        echo "<td>".htmlspecialchars($row["station_name"], ENT_QUOTES, 'UTF-8')."</td>";
                                        echo "<td>".htmlspecialchars($row["descp"], ENT_QUOTES, 'UTF-8')."</td>";    
                                        echo "<td>".htmlspecialchars($row["date"], ENT_QUOTES, 'UTF-8')."</td>";   
                             ?>
                                    <td>
                                        <a href="complaint_send.php<?php echo '?msg_id=' . htmlspecialchars($msg_id, ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-sm btn-info">Send</a>  
                                    </td>                                                 
                             <?php                                           
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='9'>Error retrieving data.</td></tr>";
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
