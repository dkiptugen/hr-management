<?php
session_start();
#$security->check_session($_SESSION["USERTYPE"]);
error_reporting(1);
include("../../CONFIGURATIONS/config.php");
$users=new users;
$security= new security;
$DB= new DB;
$val=new validate;
session_start();
$users->user_check($_SESSION["USERTYPE"],"DIRECTOR");
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
<script>
 (function($){
	$(document).ready(function(){
		$('ul.dropdown-menu [data-toggle=dropdown]').on('click', function(event) {
			event.preventDefault(); 
			event.stopPropagation(); 
			$(this).parent().siblings().removeClass('open');
			$(this).parent().toggleClass('open');
		});
	});
})(jQuery);
</script>
</head>
<body> 
<div id="container">
<div id="header">PILLAR FARM HUMAN RESOURCE MANAGEMENT SYSTEM</div>
<hr />
<div class="container-fluid">
<ul class="nav navbar-nav">
<li class="navbar-brand" > CAYDEESOFT LIMITED</li>
<li class="dropdown"><a href="index.php" class="dropdown-toggle" data-toggle="dropdown">MANAGE<b class="caret"></b></a>
<ul class="dropdown-menu" style="background:blue; font-weight:bold;">
<!--<li><a href="index.php?id=location">LOCATION</a></li>-->
<li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle"  data-toggle="dropdown">DEPARTMENT</a>
  <ul class="dropdown-menu" style="background:blue; font-weight:bold;">
	 <li><a href="index.php?id=department&&act=add">ADD/REMOVE</a></li>
	 <li><a href="index.php?id=department&&act=search">SEARCH</a></li>
  </ul>
</li>
<li class="nav-divider"></li>
<li class="dropdown dropdown-submenu"><a class="dropdown-toggle"  data-toggle="dropdown" href="index.php?id=branch">BRANCH</a>
<ul class="dropdown-menu" style="background:blue; font-weight:bold;">
	 <li><a href="index.php?id=branch&&act=add">ADD/REMOVE</a></li>
	 <li><a href="index.php?id=branch&&act=search">SEARCH</a></li>
  </ul>
</li>
<li class="nav-divider"></li>
<li ><a href="index.php?id=bank&&act=add" >BANK ACCOUNT</a>
</li>
</ul>
</li>
<li><a href="index.php?id=discipline&&act=vcase">DISCIPLINE</a></li>
<!--li><a href="index.php?id=memo">MEMO BROADCAST</a></li-->
<li><a href="index.php?id=view">VIEW REPORTS<b class="caret"></b></a></li>
<!--ul>
<li><a href="index.php?id=addu">ADD USERS</a></li>
</ul-->
</li>
<li class="nav-tabs-justified" style="float:right;"><a href="index.php?logout=1">LOGOUT</a></li>
</ul>
</div>
<hr />
<div id="bod">
<?php
$con=$DB->db_connect();
if(isset($_REQUEST["id"]))
  {
#########################################################################################################################
#-----------------------------------------------------------------------------------------------------------------------#
#XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX _DISCIPLINE_ XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX#
#----------------------------------------------------- START -----------------------------------------------------------#
#########################################################################################################################
	  if($_REQUEST['id']=="discipline")  
	   { 
		 include("../MODULES/discipline.php");
		 discipline($con);   
	   }
############################################### __END OF DISCIPLINE__ ###################################################
#########################################################################################################################

#_______________________________________________________________________________________________________________________#

#########################################################################################################################
#-----------------------------------------------------------------------------------------------------------------------#
#XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX _MEMO BROADCAST_ XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX#
#----------------------------------------------------- START -----------------------------------------------------------#
#########################################################################################################################
	   if($_REQUEST['id']=="memo")  
	   {
		 include("../MODULES/memo.php");
		 memo();   
	   }
################################################# __END OF MEMO__ #######################################################
#########################################################################################################################

#_______________________________________________________________________________________________________________________#

#########################################################################################################################
#-----------------------------------------------------------------------------------------------------------------------#
#XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX _DEPARTMENT_ XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX#
#----------------------------------------------------- START -----------------------------------------------------------#
#########################################################################################################################
	if($_REQUEST['id']=="department")  
	   {
/*
                        ADD USER
			   
*/
		   if($_REQUEST["act"]=="add")
		      {
		        if(isset($_POST["add_department"]))
	              {
		           $dbt=$con->prepare("INSERT INTO `department`(`department_id`, `department_name`) VALUES (null,?)");
		           $dbt->bindParam(1,$_POST["departmentname"]);
		           $dbt->execute();
	               }
	            if(isset($_POST["remove_department"]) || isset($_REQUEST["x"]))
	               {
		          $dbt=$con->prepare("DELETE FROM `department` WHERE department_id like :depid or department_name like :depname");
		          $dbt->bindParam(':depid',$_REQUEST["department_id"]);
				  $dbt->bindParam(':depname',$_POST["department_name"]);
		          $dbt->execute();
	              }
	 
		   ?>
           	<fieldset name="adddepartment"  >
<form method="post" action="index.php?id=department&&act=add" role="form" class="form" style="margin:2% 25%;">
 <div class="form-group ">
 
<div class="col-md-7">
<input type="text" name="departmentname" id="status" required autocomplete="off" autofocus pattern="[A-Za-z'  ]{2,12}" class="form-control col-lg-11" placeholder="Department Name" /></div>
</div>
 <div class="form-group ">		
<div class="col-sm-offset-1 col-sm-20">
      <input type="submit" value="ADD" name="add_department" class="btn btn-primary" />
      <!--input type="submit" value="REMOVE" name="remove_department" class="btn btn-primary" /-->
      </div>
        </div>
</form>
</fieldset>
<fieldset style="padding:0; margin:0 25%; max-height:300px; overflow:auto; background:ghostwhite;" >
<table class='table table-condensed' style='background:ghostwhite; text-align:left !important; padding:0; margin:0;'><thead><tr><th>No</th><th>DEPARTMENT NAME</th><th>ACTION</th><tr></thead>
		<?php 
		$db3=$con->prepare("select * from department");
		$db3->execute();
		if($db3->rowCount()>0)
		   {
			  
			   $x=1;
			while($DAT=$db3->fetch(PDO::FETCH_ASSOC)) 
			     {
				  if($x%2==0)
					 {
					  $y="active";	
					 }
				 else
					 {
					  $y="success";	
					 }
				echo "<tr class='".$y."'><td>".$x."</td><td>".$DAT["department_name"]."</td><td><a href='index.php?id=department&&act=add&&x=remove&&department_id=".$DAT["department_id"]."'>REMOVE</a></td></tr>";	
				$x++; 
			  }
				 echo "</table></fieldset>";
		   }
			  }
/*
                  VIEW
 */
         if($_REQUEST["act"]=="search")
		    {
				?>
		<fieldset style="padding:20px 28%; margin:0;">
          <form method="post" action="index.php?id=department&&act=search" role="form" class="form">
          <div class="form-group"><div class="col-md-8"><input type="text" class="form-control" name="sc" placeholder="DEPARTMENT NAME" required autofocus /></div>
          <button name="search" class="btn btn-primary">SEARCH</button></div>
          </form>
        </fieldset>		
		<?php
		if(isset($_POST["search"]))
		   {
		     $db3=$con->prepare("select * from department where department_name like '%' :search '%'");
			 $db3->bindParam(":search",$val->test_input($_POST["sc"]));
		     $db3->execute();
		     if($db3->rowCount()>0)
		        {    
		          echo '
				      <fieldset style="padding:0; margin:0 25%; max-height:200px; overflow:auto; background:ghostwhite;" >
                      <table class="table table-condensed" style="background:ghostwhite; text-align:left !important; 
					  padding:0; margin:0;"><thead><tr><th>No</th><th>DEPARTMENT NAME</th><th>ACTION</th><tr></thead>';
			  
			      $x=1;
			     while($DAT=$db3->fetch(PDO::FETCH_ASSOC)) 
			          {
				        if($x%2==0)
					       {
					         $y="active";	
					       }
				      else
					       {
					         $y="success";	
					       }
				     echo "<tr class='".$y."'><td>".$x."</td><td>".$DAT["department_name"]."</td>
					       <td><a href='index.php?id=department&&act=add&&x=remove&&department_id=".$DAT["department_id"]."'>
						   REMOVE</a></td></tr>";	
				     $x++; 
			        }
				 echo "</table></fieldset>";
		       }
			 }
		   }
	   }
	   
#########################################################################################################################
#-----------------------------------------------------------------------------------------------------------------------#
#XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX _BRANCH_ XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX#
#----------------------------------------------------- START -----------------------------------------------------------#
#########################################################################################################################
	   if($_REQUEST['id']=="branch")  
	   {
		   if(isset($_POST["add_branch"]))
	           {
		        $dbt=$con->prepare("INSERT INTO `branch`(`branch_id`, `branch_name`, `Location`) VALUES (null,?,?)");
		        $dbt->bindParam(1,$_POST["branchname"]);
		        $dbt->bindParam(2,$_POST["location"]);
		        $dbt->execute();
	           }
	       if(isset($_GET["x"]))
	           {
		         $dbt=$con->prepare("DELETE FROM `branch` WHERE branch_id like ?");
		         $dbt->bindParam(1,$_GET["value"]);
		         $dbt->execute();
	            }
	       if($_REQUEST["act"]=="add")
		      {
		       ?>
           	  <fieldset name="addbranch" style="padding:2% 0;">
                 <form method="post" action="<?php $_SERVER["PHP_SELF"]; ?>" role="form" class="form form-horizontal">
                   <div class="form-group">
                      <p>
                       <label class="control-label col-md-4 ">BRANCH NAME</label>
                          <div class="col-sm-3">
                            <input type="text" name="branchname" id="status" required autocomplete="off" 
                              autofocus pattern="[A-Za-z' ]{3,12}" role="textbox" class="form-control" />
                           </p>	
                     </div>
                   </div>
                  <div class="form-group">
                   <p><label class="control-label col-md-4">LOCATION</label>
                     <div class="col-sm-2">
                       <input type="text" name="location" id="status" required autocomplete="off" 
                       autofocus pattern="[A-Za-z'  ]{3,12}" class="form-control" />
                      </p>	
                  </div>
                    <input type="submit" value="ADD BRANCH" name="add_branch" class="btn btn-success" />
                  </div>      
                      <!--input type="submit" value="REMOVE BRANCH" name="remove_branch" class="btn btn-primary" /-->
            
             </form>
           </fieldset>
           <fieldset style="margin:0 20%; padding:0 ; max-height:200px; overflow:auto;background:lavender; " class="">
		   <?php
		   if(isset($_POST["add_branch"]))
		       {			
			     $dbh=$con->prepare("select * from branch");   
		       }
		   else
		       {
			      $dbh=$con->prepare("select * from branch");   
		       }
		   $dbh->execute();
		   if($dbh->rowCount()>0)
		      {
				 echo "
				        <table class='table table-condensed' style='background:lavender; max-height:100px; overflow:auto;
						  margin:0; padding:0;'><tr><th>NO</th><th>BRANCH</th><th>LOCATION</th><th>ACTION</th></tr>";
				 $x=1;
				 while($ROW=$dbh->fetch(PDO::FETCH_ASSOC))
				       {
					       if($x%2==0)
					          {
						       $y="active";
					          }
					      else
					          {
						        $y="success";
					          }
					      echo "
						        <tr class='".$y."'><td>".$x."</td><td>".strtoupper($ROW["branch_name"])."</td>
						        <td>".strtoupper($ROW["Location"])."</td><td>
								<a href='index.php?id=branch&&act=add&&x=remove&&value=".$ROW["branch_id"]."'>REMOVE</a>
								</td></tr>";
					       $x++;
				      }
				echo "</table></fieldset>";
			     }
			  }
			 
			  if($_REQUEST["act"]=="search")
		         {
					 ?>
		     <fieldset style="padding:20px 28%; margin:0;">
             <form method="post" action="index.php?id=branch&&act=search" role="form" class="form">
             <div class="form-group">
             <div class="col-md-8">
             <input type="text" class="form-control" name="sc" placeholder="LOCATION OR BRANCH NAME" required autofocus />
             </div>
             <button name="search" class="btn btn-primary">SEARCH</button></div>
             </form>
             </fieldset>		
		<?php
		    if(isset($_POST["search"]))
			  {
			   $dbh=$con->prepare("select * from branch where location like '%' :search '%' or branch_name like '%' :search '%' ");
				$dbh->bindParam(":search",$val->test_input($_POST["sc"])); 
			   $dbh->execute();
		       if($dbh->rowCount()>0)
		          {
				   echo "
				         <fieldset style='margin:0 15%; max-height:280px; overflow:auto; '><table class='table table-condensed' style='background:lavender;
						  max-height:100px;overflow:auto; margin:0; padding:0;'><tr><th>NO</th><th>BRANCH</th>
						  <th>LOCATION</th><th>ACTION</th></tr>";
				   $x=1;
				   while($ROW=$dbh->fetch(PDO::FETCH_ASSOC))
				         {
					      if($x%2==0)
					         {
						       $y="active";
					         }
					     else
					         {
						     $y="success";
					         }
					     echo "
						       <tr class='".$y."'><td>".$x."</td><td>".strtoupper($ROW["branch_name"])."</td>
							   <td>".strtoupper($ROW["Location"])."</td>
							   <td><a href='index.php?id=branch&&act=add&&x=remove&&value=".$ROW["branch_id"]."'>REMOVE</a>
							   </td></tr>";
					    $x++;
				       }
				  echo "</table></fieldset>";
			    }
			} 
			}
	   }
#########################################################################################################################
#-----------------------------------------------------------------------------------------------------------------------#
#XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX _BANK_ XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX#
#----------------------------------------------------- START -----------------------------------------------------------#
#########################################################################################################################
	   if($_REQUEST['id']=="bank")  
	   {   
	      if(isset($_REQUEST["x"]))
		     {
			     if($_REQUEST["x"]=="activate")
			       {
					  ?>
                      <script>
				      window.confirm("DO YOU WANT TO ACTIVATE THIS BANK ACCOUNT");
				      </script>
                      <?php					   
				      $dbh=$con->prepare("update bank set activity=1 where bank_id=?");
				      $dbh->bindParam(1,$_REQUEST["bankid"]);
			       }
			 elseif($_REQUEST["x"]=="deactivate")
			       {
					  ?>
                      <script>
				      window.confirm("DO YOU WANT TO DEACTIVATE THIS BANK ACCOUNT");
				      </script>
                      <?php					   
				      $dbh=$con->prepare("update bank set activity=0 where bank_id=?");
				      $dbh->bindParam(1,$_REQUEST["bankid"]);
				   }
				$dbh->execute();
		      }        
		   if(isset($_POST["addbank"]))
		   {
			   $alfy=$con->prepare("INSERT INTO `bank`(`bank_name`, `bank_id`, `ac_no`) VALUES (?,null,?)");
			   $alfy->bindParam(1,$_POST["bankname"]);
			   $alfy->bindParam(2,$_POST["accountnumber"]);
			   $alfy->execute();
		   }
		?>
        <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="post" role="form" class="form form-horizontal">
   <div class="form-group">     
<p><label class=" control-label col-md-5">BANK NAME</label>
<div class="col-sm-3">
<input type="text" required autofocus autocomplete="off" name="bankname" class=" form-control"/></p>
</div>
</div>
<div class="form-group">
<p><label class="control-label col-md-5">ACCOUNT NUMBER</label>
<div class="col-sm-2">
<input type="text" required autofocus autocomplete="off" name="accountnumber" class="form-control"/>
</div>
<input type="submit" name="addbank" value="ADDBANK" class="btn btn-primary" /></p>

</div>
</form>
<fieldset style="padding:0; margin:0 25%; max-height:300px; overflow:auto; background:ghostwhite;" >
<table class='table table-condensed' style='background:ghostwhite; text-align:left !important; padding:0; margin:0;'><thead><tr><th>No</th><th>BANK NAME</th><th>ACCOUNT NO</th><th>STATUS</th><th>ACTION</th><tr></thead>
		<?php
		
		$db3=$con->prepare("select * from bank");
		$db3->execute();
		 if($db3->rowCount()>0)
		     {		  
			    $x=1;
			    while($DAT=$db3->fetch(PDO::FETCH_ASSOC)) 
			          {
				         if($DAT["activity"]==0)
				            {
					          $status="inactive";	
					        }
				       else if($DAT["activity"]==1)
				            {
					          $status="active";
				            }
				        if($x%2==0)
					       {
					         $y="active";	
					       }
				        else
					       {
					         $y="success";	
					       }
				        echo "<tr class='".$y."'>
						     <td>".$x."</td><td>".$DAT["bank_name"]."</td>
							 <td>".$DAT["ac_no"]."</td><td>".strtoupper($status)."</td>
							 <td><a href='index.php?id=bank&&act=add&&x=activate&&bankid=".$DAT["bank_id"]."'>ACTIVATE</a>
							 &nbsp; &nbsp;
							 <a href='index.php?id=bank&&act=add&&x=deactivate&&bankid=".$DAT["bank_id"]."'>DEACTIVATE</a>
							 </td></tr>";	
				        $x++; 
			      }
			echo "</table></fieldset>";
		   }
			  
		   
	   }
			  
 }
$DB->db_close($con);
?>

</div>
<hr />
<div id="footer">&copy; Copyright <?php echo date("Y");?>.All Rights Reserved <span class=" " style="float:right; line-height:15px;" id="timer"></span>
</div>
</div>
</body>
</html>
