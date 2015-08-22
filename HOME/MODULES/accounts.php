<?php
include_once("../../CONFIGURATIONS/config.php");
$DB= new DB;
$con=$DB->db_connect();
$dbh=$con->prepare("SELECT count(`employee_name`) as tot FROM `insecurity` where date_format(date,'%d-%m-%Y')= date_format(now(),'%d-%m-%Y')&& stat=0");
$dbh->execute();
if($dbh->rowCount()>0)
   {
	 $R=$dbh->fetch(PDO::FETCH_ASSOC);  
	  echo $R["tot"]; 
   }
else
   {
	echo "0";   
   }
$DB->db_close($con);
?>
