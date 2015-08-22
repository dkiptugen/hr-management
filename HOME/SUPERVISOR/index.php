<?php
error_reporting(1);
include("../../CONFIGURATIONS/config.php");
$users=new users;
$security= new security;
$DB= new DB;
session_start();
$users->user_check($_SESSION["USERTYPE"],"SUPERVISOR");
if(isset($_REQUEST["logout"]))
   {
	if($_REQUEST["logout"]==1)
	   {
	     $security->logout();
	   }
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta  charset="utf-8" />
<title>PILLAR HR</title>
<link href="../../CSS/new.css" rel="stylesheet" />
<link href="../../CSS/bootstrap.css" rel="stylesheet" />
<link href="../../CSS/datepicker.css" rel="stylesheet" />
<script src="../../js/jquery.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/bootstrap-datepicker.js"></script>
<script src="../../js/timer.js"></script>
<!--link href="CSS/main.css" rel="stylesheet" /-->
</head>
<body> 
<div id="container">
<div id="header">PILLAR FARM HUMAN RESOURCE MANAGEMENT SYSTEM</div>
<hr />
<div class="container-fluid">
<ul class="nav navbar-nav">
<li class=" navbar-brand">CAYDEESOFT LIMITED</li>
<li><a href="index.php?id=salary">JOB ALLOCATION</a></li>

<li><a href="index.php?id=comp">SUGGESTIONS</a></li>
<li><a href="index.php?id=comp">COMPLAINS</a></li>
<!--li><a href="index.php?id=comm">COMMENTS</a></li-->
<li><a href="index.php?id=view">VIEW REPORTS<b class="caret"></b></a>
</li>
<li style="float:right;"><a href="index.php?logout=1">LOGOUT</a></li>
</ul>
</div>
<hr />
<div id="bod">
<?php
$con=$DB->db_connect();

$DB->db_close($con);
?>

</div>
<hr />
<div id="footer">&copy; Copyright <?php echo date("Y");?>.All Rights Reserved
<span class=" " style="float:right; line-height:15px;" id="timer"></span>

</div>
</div>
</body>
</html>
