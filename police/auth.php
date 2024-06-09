<?php
session_start();
if(!isset($_SESSION['SESS_OFFICER_ID']) || (trim($_SESSION['SESS_OFFICER_ID']) == '')) {
	header("location:../");
	exit();
}

?>
