<?php
	$Log_Id=$_SESSION['SESS_OFFICER_ID'];
	$result = $db->prepare("select * from pl_station where Log_Id='$Log_Id'");
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++)
	{
		$photo=$row["photo"];	
		$nname=$row["sname"];
	}
?>
<div class="ttr-header-wrapper">
    <!--sidebar menu toggler start -->
    <div class="ttr-toggle-sidebar ttr-material-button">
        <i class="ti-close ttr-open-icon"></i>
        <i class="ti-menu ttr-close-icon"></i>
    </div>
    <!--sidebar menu toggler end -->
    <!--logo start -->
    <div class="ttr-logo-box">
        <div>
            <a href="index.php" class="ttr-logo">
                <img class="ttr-logo-mobile" alt="" src="assets/images/logo-mobile.png" width="30" height="30">
                <img class="ttr-logo-desktop" alt="" src="assets/images/logo-white.png" width="160" height="27">
            </a>
        </div>
    </div>
    <div class="ttr-header-right ttr-with-seperator">
        <!-- header right menu start -->
        <ul class="ttr-header-navigation">           
            <li>
                <a href="#" class="ttr-material-button ttr-submenu-toggle"><i class="fa fa-bell"></i></a>
                <div class="ttr-header-submenu noti-menu">
                    <div class="ttr-notify-header">
                        <span class="ttr-notify-text-top">New</span>
                        <span class="ttr-notify-text">Notifications</span>
                    </div>
                    <div class="noti-box-list">
                        <ul>
                        <?php
							$result = $db->prepare("select * from notification where name='Police'");
							$result->execute();
							$row_count =  $result->rowcount();
							for($i=0; $rows = $result->fetch(); $i++)
							{
								?>
                            <li>
                                <span class="notification-icon dashbg-gray">
                                    <i class="fa fa-check"></i>
                                </span>
                                <span class="notification-text">
                                    <span><?php echo $rows['subjct'];?></span>
                                </span>
                                <span class="notification-time">
                                    <a href="notification_view.php" class="fa fa-close"></a>
                                    <span><?php echo $rows['date'];?></span>
                                </span>
                            </li>   
                            <?php }?>                        
                        </ul>
                    </div>
                </div>
            </li>
            <li>
                <a href="#" class="ttr-material-button ttr-submenu-toggle"><span class="ttr-user-avatar">
                	<img alt="" src="../photo/<?php echo $photo;?>" width="32" height="32"></span>
                </a>
                <div class="ttr-header-submenu">
                    <ul>
                        <li><a href="profile.php"> Profile</a></li>
                        <li><a href="../logout.php"> Logout</a></li>
                    </ul>
                </div>
            </li>           
        </ul>
        <!-- header right menu end -->
    </div>   
</div>