<?php


error_reporting(1);
include("../../CONFIGURATIONS/config.php");
$users=new users;
$security= new security;
$DB= new DB;
session_start();
$users->user_check($_SESSION["USERTYPE"],"MANAGER");
#$security->check_session($_SESSION["USERTYPE"]);
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
</head>
<body> 
<div id="container">
<div id="header">PILLAR FARM HUMAN RESOURCE MANAGEMENT SYSTEM</div>
<hr />
<div class="container-fluid" >
<ul class="nav navbar-nav">
  <li class="navbar-brand">CAYDEESOFT LIMITED</li>
    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="index.php?id=mngstf">MANAGE STAFF<b class="caret"></b> </a>
      <ul class="dropdown-menu" style="background:blue; font-weight:bold;">
         <li><a href="index.php?id=addstf">ADD STAFF</a></li>
         <li class="divider"></li>
         <li><a href="index.php?id=vs">VIEW STAFF</a></li>
         <li class="divider"></li>
         <li><a href="index.php?id=ts">TRANSFER STAFF</a></li>
         <li class="divider"></li>
         <li><a href="index.php?id=terms">TERMINATE STAFF</a></li>
     </ul>
    </li>
    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="index.php?id=empstat">EMPLOYEE STATUS<b class="caret"></b> </a>
      <ul class="dropdown-menu" style="background:blue; font-weight:bold;">
        <li><a href="index.php?id=act">ACTIVE</a></li>
        <li class="divider"></li>
        <li><a href="index.php?id=cont">CONTRACT</a></li>
        <li class="divider"></li>
        <li><a href="index.php?id=res">RESIGNED</a></li>
        <li class="divider"></li>
        <li><a href="index.php?id=ret">RETIRED</a></li>
        <li class="divider"></li>
        <li><a href="index.php?id=decd">DECEASED</a></li>
        <li class="divider"></li>
        <li><a href="index.php?id=leave">LEAVE/OFFS</a></li> 
      </ul>
    </li>
    
    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="index.php?id=dis">DISCIPLINE <b class="caret"></b> </a>
      <ul class="dropdown-menu" style="background:blue; font-weight:bold;">
         <li><a href="index.php?id=discipline&&act=addcase">ADD CASE</a></li>
         <li class="divider"></li>
         <li><a href="index.php?id=discipline&&act=vcase">VIEW CASE</a></li>
     </ul>
   </li>
   <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="index.php?id=cont">CONTRIBUTION<b class="caret"></b> </a>
     <ul class="dropdown-menu" style="background:blue; font-weight:bold;">
       <li><a href="index.php?id=contribution&&action=suggestion&&x=view">SUGGESTION</a></li>
       <li class="divider"></li>
       <li><a href="index.php?id=contribution&&action=complaint&&x=view">COMPLAINS</a></li>
    </ul>
  </li>
  <!--li><a href="index.php?id=com">COMMENTS</a></li-->
  <li><a href="index.php?id=view">VIEW REPORTS<b class="caret"></b></a></li>
  <li style="float:right !important;"><a href="index.php?logout=1">LOGOUT</a></li>
</ul>
</div>
<hr />
<div id="bod">
<?php
$con=$DB->db_connect();
if(isset($_REQUEST["id"]))
  {
#############################################################################################################################	  
#---------------------------------------------------------------------------------------------------------------------------#
#xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx  ADD  STAFF XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX#
#---------------------------------------------------------------------------------------------------------------------------#
#############################################################################################################################	  
	if($_REQUEST['id']=="addstf")  
	   {
		if(isset($_POST["add_staff"]))
		  {   
		     if(empty($_POST["access"]))
			    {
				  $access=0; 
			    }
			 else
			    {
				  $access=1;
			    }
		     
			  $password=$security->password_hash($_POST["password"],$_POST["username"]);
		      #$employeeno=$security->id_gen(8);
			  $dbh=$con->prepare("INSERT INTO `userdetails`(`firstname`, `lastname`, `surname`, `id_no`, `mobile_no`, `postal_address`, `email`, `staff_no`, `branch_id`, `gender`, `employment_type`, `department_id`, `marital_status`,dob,qualification,position,system_access) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
			  $dbh->bindParam(1,$_POST["firstname"],PDO::PARAM_STR,12);
			  $dbh->bindParam(2,$_POST["lastname"],PDO::PARAM_STR,12);
			  $dbh->bindParam(3,$_POST["surname"],PDO::PARAM_STR,12);
			  $dbh->bindParam(4,$_POST["id_no"],PDO::PARAM_STR,8);
			  $dbh->bindParam(5,$_POST["mobile_no"],PDO::PARAM_STR,12);
			  $dbh->bindParam(6,$_POST["postal_address"],PDO::PARAM_STR,100);
			  $dbh->bindParam(7,$_POST["email"],PDO::PARAM_STR,35);
			  $dbh->bindParam(8,$_POST["staffno"],PDO::PARAM_STR,8);
			  $dbh->bindParam(9,$_POST["branch_id"],PDO::PARAM_STR,12);####
			  $dbh->bindParam(10,$_POST["gendertype"],PDO::PARAM_STR,8);
			  $dbh->bindParam(11,$_POST["emp_type"],PDO::PARAM_STR,15);
			  $dbh->bindParam(12,$_POST["department_id"],PDO::PARAM_STR,8);
			  $dbh->bindParam(13,$_POST["marital_status"],PDO::PARAM_STR,8);
			  $dbh->bindParam(14,$_POST["dob"],PDO::PARAM_STR,11);
			  $dbh->bindParam(15,$_POST["qualification"],PDO::PARAM_STR,1000);
			  $dbh->bindParam(16,$_POST["position"],PDO::PARAM_STR,20);
			  $dbh->bindParam(17,$access,PDO::PARAM_INT);
			  $dbh->execute();
			  ###########################################################################################################
			  ########################################### _SALARY_ ######################################################
			  ###########################################################################################################	  
			  $dbh=null;
			  $dbh=$con->prepare("INSERT INTO `salary`(`salary_id`, `basicpay`, `Allowance`, `emp_no`) VALUES (null,?,?,?)");
			  $dbh->bindParam(1,$_POST["salary"]);
			  $dbh->bindParam(2,$_POST["allowance"]);
			  $dbh->bindParam(3,$_POST["staffno"]);
			  $dbh->execute();
		  }
?>
<fieldset name="addstaff">	
<form method="post" action="<?php $_SERVER["PHP_SELF"]; ?>">
<div id="left">
<p><label for="left">FIRSTNAME</label><input type="text" name="firstname" id="status" required autocomplete="off" autofocus pattern="[A-Za-z']{3,12}" /></p>
<p><label for="left"> LASTNAME</label><input type="text" name="lastname" id="status" required autocomplete="off" autofocus pattern="[A-Za-z']{3,12}" /></p>
<p><label for="left"> SURNAME</label><input type="text" name="surname" id="status" required autocomplete="off" autofocus pattern="[A-Za-z']{3,12}" /></p>
<p><label for="left"> ID NUMBER</label><input type="text" name="id_no" id="status" required autocomplete="off" autofocus pattern="^[0-9]{7,8}" /></p>
<script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                
                $('#datepicker').datepicker({
                    format: "yyyy-mm-dd"
                });  
            
            });
        </script>
<p><label for="left">D.O.B</label>

  <input id="datepicker"  name="dob" required  />
  
</p>

<p><label for="left">GENDER</label>
        <input type="radio" name="gendertype" value="Male" />Male
        <input type="radio" name="gendertype" value="Female" /> Female
		</p>
        <p><label for="left">MARITAL STATUS</label>
           <select name="marital_status" autofocus required>
        <option value="" selected>(please select:)</option>
        <option value="single">SINGLE</option>
        <option value="married">MARRIED</option>
         </select>	</p>
<p><label for="left"> MOBILE NUMBER</label><input type="text" name=" mobile_no" id="status" required autocomplete="off" autofocus pattern="[+]{1}[0-9]{1,3}-[0-9]{3}-[0-9]{6}"  placeholder="eg +254-763-0123456"/></p>
<p><label for="left">POSTAL ADDRESS</label><input type="text" name=" postal_address" id="status" required autocomplete="off" autofocus pattern="[a-Z0-9 #-#]{2,30}" /></p>
<p><label for="left">E-MAIL ADDRESS</label><input type="email" name="email" required autocomplete="off" autofocus pattern="[^ @]*@[^ @]*" /></p>


</div>
<div id="right">
<p><label for="right"> POSITION</label><input type="text" name="position" id="status" required autocomplete="off" autofocus pattern="[A-Za-z']{3,12}" /></p>
<p><label for="right"> STAFF NO</label><input type="text" name="staffno" id="status" autocomplete="off" autofocus pattern="[a-Z0-9]{8}" required /></p>
<p><label for="right">EMP TYPE</label>
		<select name="emp_type" autofocus required >
        <option value="" selected>(please select:)</option>
        <option value="permanent">PERMANENT</option>
        <option value="contract">CONTRACT</option>
		<option value="casual">CASUAL</option>
         </select>
         </p>
<p><label for="right">DEPARTMENT</label>
<select name="department_id" id="status" autofocus required>
<option value="" selected>(please select:)</option>
<?php
$dbh=$con->prepare("SELECT * FROM `department`");
$dbh->execute();
if($dbh->rowCount()>0)
   {
	while($row=$dbh->fetch(PDO::FETCH_ASSOC))   
	      {
			  echo "<option value='".$row["department_id"]."'>".$row["department_name"]."</option>";
		  }
   }
?>
</select>

</p>
<p><label for="right"> BRANCH</label>
<select name="branch_id" id="status" autofocus required>
<option value="" selected>(please select:)</option>
<?php
$dbh=$con->prepare("SELECT * FROM `branch`");
$dbh->execute();
if($dbh->rowCount()>0)
   {
	while($row=$dbh->fetch(PDO::FETCH_ASSOC))   
	      {
			  echo "<option value='".$row["branch_id"]."'>".$row["branch_name"]."</option>";
		  }
   }
?>
</select>
</p>


<p><label for="right">SALARY</label><input type="text" name="salary" id="status" required autocomplete="off" autofocus pattern="[0-9]{3,7}" /></p>
<p><label for="right">ALLOWANCE</label><input type="text" name="allowance" id="status"  required autocomplete="off" autofocus pattern="[0-9]{3,7}"/></p>
<p><label for="right">QUALIFICATION</label><textarea name="qualification"  autocomplete="off" autofocus pattern="[a-Z]{0,1000}"></textarea></p>
<p><label for="right"> SYSTEM ACCESS</label><input type="checkbox" name="access" value="1"   autofocus autocomplete="off" /></p>

</div>

<p style="height:0; margin:0; padding:0; clear:both;"></p>
<p><input type="submit" value="ADD STAFF" name="add_staff" class="btn btn-primary" style="margin:0 40%; " /></p>

</form>
</fieldset>
<?php   
	   }
	   
	   
	   
	   
############################################################################################################################
#--------------------------------------------------------------------------------------------------------------------------#
#XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX VIEW STAFF ##################################################################
#----------------------------------------------  START --------------------------------------------------------------------#
############################################################################################################################	   
	   
	if($_REQUEST["id"]=="vs")
	   {
		 ?>
         <fieldset name='viewstaff'>
         <form class="form-inline" role="form" style="margin:0 30%;" method="post" action="index.php?id=vs">
    
    <div class="form-group ">
      
     <p> <input type="text" class="form-control col-md-11" style="width:300px !important;" placeholder="Employee name or EMPLOYEE NO" name="sc">
   </div>
    <div class="form-group ">
    <button type="submit" class="btn btn-default" name="search">SEARCH</button>
     </div>
    </p>
  </form>

         <?php
		 if(isset($_POST["search"])==true)
		    {
			   if(empty($_POST["sc"]))
			      {
			         $dbt=$con->prepare("select firstname,lastname,surname,gender,employment_type,mobile_no,
				                   marital_status,position,staff_no,(select branch_name from branch where
								   branch_id = userdetails.branch_id)as branch_name,(select department_name from department 
								   where department_id = userdetails.department_id) as department_name from userdetails");
			      }
			   else
			      {
			          $dbt=$con->prepare("select firstname,lastname,surname,gender,employment_type,mobile_no,
				                         marital_status,position,staff_no,(select branch_name from branch where
								         branch_id = userdetails.branch_id)as branch_name,(select department_name from department 
								         where department_id = userdetails.department_id) as department_name from userdetails
										 where firstname like '%' :search '%' or lastname like'%' :search '%'
										 or surname like '%' :search '%' or staff_no like '%' :search '%'  ");
			         $dbt->bindParam(':search',$_POST["sc"]);			
			      }
			}
		else 
		   {
			    $dbt=$con->prepare("select firstname,lastname,surname,gender,employment_type,mobile_no,
				                   marital_status,position,staff_no,(select branch_name from branch where
								   branch_id = userdetails.branch_id)as branch_name,(select department_name from department 
								   where department_id = userdetails.department_id) as department_name from userdetails 
									");
			   
		   }
		 
		   
	     
		 $dbt->execute();
		 if($dbt->rowCount()>0)
		    { 
			echo "<fieldset style='padding:0; margin:0 1%;max-height:320px; overflow:auto;'><table id='viewstaff' class='table table-condensed' style='background:ghostwhite;  text-align:center !important;' >
			<thead>
			<th>STAFF NO.</th>
			<th>NAME</th>
			<th>GENDER</th>
			<th>EMPLOYMENT TYPE</th>
			<th>MOBILE NUMBER</th>
			<th>MARITAL STATUS</th>
			<th>BRANCH</th>
			<th>DEPARTMENT</th>
			<th>POSITION</th>
			<th>QUALIFICATION</th>
			</thead>
			<tr></tr>";
			$x=1;
		      while($DATA=$dbt->fetch(PDO::FETCH_ASSOC))
			        {
				     if($x%2==0)
					    {
						 $y="active";	
						}
					else
					    {
						  $y="success";	
						}
			echo "<tr class='".$y."'><td>".$DATA["staff_no"]."</td><td>".ucfirst(strtolower($DATA["firstname"]))." ".ucfirst(strtolower($DATA["lastname"]))." ".ucfirst(strtolower($DATA["surname"])) ."</td><td>".$DATA["gender"]."</td><td>".$DATA["employment_type"]."</td><td>".$DATA["mobile_no"]."</td><td>".$DATA["marital_status"]."</td><td>".$DATA["branch_name"]."</td><td>".$DATA["department_name"]."</td><td>".$DATA["position"]."</td><td><a href='index.php?id=qualification&&empno=".$DATA["staff_no"]."' target='_blank'>VIEW DETAILS</a></td></tr>";
			$x++;
								
					}
			 echo "</table></fieldset>";
			}
	   }
############################################################################################################################
#--------------------------------------------------------------------------------------------------------------------------#
#XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX TRANSFER STAFF ##############################################################
#-------------------------------------------------  START  ----------------------------------------------------------------#
############################################################################################################################

	if($_REQUEST["id"]=="ts")
	   {
		?>
		    <fieldset style="margin:0; padding:10px 25%; background:rgba(255,255,255,0.5);">
		      <form method="post" action="index.php?id=ts" role="form" class="form" style="margin:0 !important;">
		        <div class="form-group">
		           <div class="col-md-7">
                     <input type="text"  placeholder="Employee name or Employee No" name="sc" class="form-control "/>
                   </div>
                  <button  class="btn btn-primary"  name="search" >SEARCH</button><label id="Mes"></label> 
                </div>

              </form>
              
           </fieldset>
           <?php
           if(isset($_POST["search"]))
           	  {
           	  	$dbh=$con->prepare("select firstname,lastname,surname,gender,marital_status,staff_no,(select branch_name from branch where
								   branch_id = userdetails.branch_id)as branch_name,(select department_name from department 
								   where department_id = userdetails.department_id) as department_name from userdetails where firstname like '%' :search '%' or
								    lastname like '%' :search '%' or surname like '%' :search '%' or staff_no like '%' :search '%' ");
           	  	$dbh->bindParam(":search",$_POST["sc"]);
           	  	$dbh->execute();
           	  	if($dbh->rowCount()>0)
           	  	  {
           	  	  	$FORM_DATA=$dbh->fetch(PDO::FETCH_ASSOC);
                ?>
                <fieldset style="margin:0 15%; " >
           	     <form class="form-horizontal" method="post" action="index.php?id=ts" >
           	      <p>
           	      <input type="text" name="emp_no" value="<?php echo($FORM_DATA["staff_no"]); ?>" hidden />
           	       <div class="form-group">
           	  	    <label class="control-label col-md-4">EMPLOYEE NAME</label>
           	  	     <div class="col-md-4">
           	  	  	  <input type="text" id="emp_name"; name="emp_name" value="<?php echo $FORM_DATA["firstname"]." ".$FORM_DATA["lastname"]." ".$FORM_DATA["surname"]; ?>" class="form-control " readonly />
           	  	     </div>           	  	
           	      </div>
           	     </p>
           	     <p>
           	      <div class="form-group">
           	        <label class="control-label col-md-4">MARTAL STATUS</label>
                      <div class="col-md-4">
           	           <input type="text" value="<?php echo $FORM_DATA["marital_status"];   ?>"  class="form-control" readonly />
           	          </div>
           	      </div>
           	     </p>
           	     <p>
           	      <div class="form-group">
           	  	   <label class="control-label col-md-4">CURRENT BRANCH</label>
           	  	     <div class="col-md-4">
           	  	  	  <input type="text" name="" class="form-control " disabled value="<?php echo $FORM_DATA["branch_name"]; ?>" />
           	  	     </div>           	  	
           	       </div>
           	     </p>
           	     <p>
           	     <div class="form-group">
           	  	  <label class="control-label col-md-4">NEW BRANCH</label>
           	  	    <div class="col-md-4">
           	  	     <select name="new_branch" class="form-control" required autofocus>
           	  	      <option selected="selected" value="x">please select.....</option>
           	  	       <?php
           	  	        $dbh=$con->prepare("SELECT * FROM `branch` WHERE 1");
           	  	        $dbh->execute();
           	  	        if($dbh->rowCount()>0)
           	  	          {
                            while ($R=$dbh->fetch(PDO::FETCH_ASSOC))
                             {
                          	   echo "<option value='".$R["branch_id"]."'>".$R["branch_name"]."</option>";
                              }
           	  	          }
           	  	  	
           	  	  	    ?>
           	  	  	  </select>
           	  	    </div>           	  	
           	     </div>
           	    </p>
           	    <p>
           	     <div class="form-group">
           	      <label class="control-label col-md-4">DEPARTMENT</label>
                   <div class="col-md-4">
           	         <input type="text" name="" class="form-control" value="<?php echo $FORM_DATA["department_name"]; ?>" readonly />
           	       </div>
           	     </div>
           	    </p>
           	    <p>
           	     <div class="form-group">
           	  	  <label class="control-label col-md-4">NEW DEPARTMENT</label>
           	  	   <div class="col-md-3">
           	  	     <select name="new_department" class="form-control" required autofocus>
           	  	      <option selected="selected" value="x">please select.....</option>
           	  	       <?php
           	  	         $dbh=$con->prepare("SELECT * FROM `department` WHERE 1");
           	  	         $dbh->execute();
           	  	         if($dbh->rowCount()>0)
           	  	           {
                             while ($R=$dbh->fetch(PDO::FETCH_ASSOC))
                              {
                          	    echo "<option value='".$R["department_id"]."'>".$R["department_name"]."</option>";
                              }
           	  	            }
           	  	  	
           	  	  	    ?>
           	  	  	  </select>
           	  	    </div>   
           	  	   <button class="btn btn-primary col-md-1" name="transfer">Transfer<br />Employee</button>      	  	
           	      </div>
           	     </p>           	  	
           	   </form>
           	              	 
              </fieldset>
             <?php
			}
		else 
		    {
               echo "<label class='control-label col-md-7' style='margin:30px 35%; color:red;'>NO USER FOUND!!!</label>";
		    }  
	       }
        if(isset($_POST["transfer"]))
          {  #echo "branch=".$_POST["new_branch"]."\n";
          	 #echo "department=".$_POST["new_department"]."\n";
          	 # echo "staff=".$_POST["emp_no"];
          	
          	if($_POST["new_branch"]=="x")
          	  {
                 $d1=0;
          	  }
          	else
          	  {
                 $d1=1;
          	  }
          	    if($_POST["new_department"]=="x")
          	      {
                    $d2=0;
          	      }
          	    else
          	     {
                   $d2=1;
          	     }
                 if(($d1==1)&&($d2==0))
                   {
                     $sql="update userdetails set branch_id=:branch where staff_no = :staff_no";
                   	#echo "branch";
                     $dbh=$con->prepare($sql);
                     $dbh->bindParam(":staff_no",$_POST["emp_no"]);
                     $dbh->bindParam(":branch",$_POST["new_branch"]);
                   }
                 elseif(($d1==0)&&($d2==1))
                   {
                    $sql="update userdetails set department_id=:department where staff_no = :staff_no";
                    #echo "department";
                    $dbh=$con->prepare($sql);
                    $dbh->bindParam(":department",$_POST["new_department"]);
                    $dbh->bindParam(":staff_no",$_POST["emp_no"]);
                   } 
                 elseif(($d1==1)&&($d2==1))
                   {
                     $sql="update userdetails set department_id= :department, branch_id= :branch where staff_no = :staff_no";
                   	#echo "branch and department";
                     $dbh=$con->prepare($sql);
                     $dbh->bindParam(":branch",$_POST["new_branch"]);
                     $dbh->bindParam(":department",$_POST["new_department"]);
                     $dbh->bindParam(":staff_no",$_POST["emp_no"]);
                    }
                   
            
            #$dbh->bindParam(":department",$_POST["new_department"]);
            #$dbh->bindParam(":branch",$_POST["new_branch"]);
            #$dbh->bindParam(":staff_no",$_POST["emp_no"]);
            $y=$dbh->execute();
            if($y)
              {
                 
                 ?>
                  <script type="text/javascript">
                   //var rse = document.getElementById("emp_name").value+" ACCOUNT UPDATED!!!"; 
                   //document.alert(rse+ " CAYDEESOFT");
                   document.getElementById("Mes").innerHTML= <?php echo "'".$_POST["emp_name"]."`s account successfully updated !!!!'"; ?>;
                   </script>
                 <?php
              }
   
          }
         
	   }
	   
############################################################################################################################
#--------------------------------------------------------------------------------------------------------------------------#
#XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX TERMINATE STAFF #############################################################
#--------------------------------------------------  START  ---------------------------------------------------------------#
############################################################################################################################

	 if($_REQUEST["id"]=="terms")
	   {
		 ?>
		   <fieldset style="margin:0; padding:20px 25%; background:rgba(255,255,255,0.5);">
		      <form method="post" action="index.php?id=terms" role="form" class="form">
		        <div class="form-group">
		           <div class="col-md-7">
                     <input type="text"  placeholder="Employee name or Employee No" name="sc" class="form-control "/>
                   </div>
                  <button type="submit" class="btn btn-primary"  name="search" >SEARCH</button>
                </div>
              </form>
           </fieldset>
           <?php
		   if(isset($_POST["search"]))
		      {
			   $dbh=$con->prepare("SELECT firstname,lastname,surname,staff_no,(select branch_name from branch where
			                       branch_id=userdetails.branch_id) as branch_name,(select department_name from department where
								   department_id=userdetails.department_id) as department_name FROM `userdetails` WHERE
								   firstname like '%' :search '%' or lastname like '%' :search '%' or surname like '%' :search '%'
								   or staff_no like '%' :search '%'");
		       $dbh->bindParam(":search",$_POST["sc"]);
			   $dbh->execute();
			   if($dbh->rowCount()>0)
			      {
					$R=$dbh->fetch(PDO::FETCH_ASSOC);  
				  
			 
		   ?>
           <fieldset style="margin:0; padding:20px 15%;">
           	 <form method="post" action="index.php?id=terms"  class="form-horizontal" role="form">
           	  <input type="text" value="<?php echo $R["staff_no"]; ?>" name="emp_no" hidden="" />
              <div class="form-group">
                <label class="control-label col-md-3">EMPLOYEE NAME</label>
                  <div class="col-md-5">
                 <input type="text" value="<?php echo $R["firstname"]." ".$R["lastname"]." ".$R["surname"]."";  ?>" name="emp_name" readonly class="form-control" />
                 </div>
              </div>           
              
              <div class="form-group">
                <label class="control-label col-md-3">DEPARTMENT</label>
                 <div class="col-md-5">
                  <input type="text" value="<?php echo $R["department_name"]; ?>" name="dep_name" readonly class="form-control" />
                 </div>
              </div>             
              
              <div class="form-group">
                <label class="control-label col-md-3">BRANCH</label>
                 <div class="col-md-5">
                  <input type="text" value="<?php echo $R["branch_name"];  ?>" name="branch_name" readonly class="form-control" />
                 </div>
              </div>
              
             
               <div class="form-group" >
                 <label class="control-label col-md-3">TERMINATION REASON</label>
                 
                  <textarea name="reason"  placeholder="Enter Termination reason" 
                   class="col-lg-5" role="group" style="width:360px !important; height:80px !important; border-radius:5px; border:0.1px solid black; background:lavender;"></textarea>
                
               </div>
              <div class="col-xs-offset-5 ">
                <button class="btn btn-primary" name="doom">TERMINATE</button>
              </div>
           	 </form>
           </fieldset>
           
  <?php 
				  }
	   }
  if(isset($_POST["doom"]))
     {
		 $dbh=$con->prepare("INSERT INTO `discipline`(`employee_no`, `displinery_case`, `date`, `action`) 
		                     VALUES (?,?,now(),'TERMINATION')");
		$dbh->bindParam(1,$_POST["emp_no"]);
		$dbh->bindParam(2,$_POST["reason"]);
		#$dbh->bindParam(3,);
		$dbh->execute();
		$dbh=NULL;
		$dbh=$con->prepare("UPDATE `users` SET perm=2  where id= ?");
		$dbh->bindParam(1,$_POST["emp_no"]);
		$dbh->execute();
		
	 }
	   }  
	   
############################################################################################################################
#--------------------------------------------------------------------------------------------------------------------------#
#XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX LEAVE ####################################################################
#------------------------------------------------ START -------------------------------------------------------------------#
############################################################################################################################
 
	if($_REQUEST['id']=="leave")  
	   {
	   
	   }  
	   
############################################################################################################################
#--------------------------------------------------------------------------------------------------------------------------#
#XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX DISCIPLINE ##################################################################
#------------------------------------------------ START -------------------------------------------------------------------#
############################################################################################################################	   
	 if($_REQUEST['id']=="discipline")  
	   {
		   include("../MODULES/discipline.php");
		   discipline($con);
	   
	   }
	   
############################################################################################################################
#--------------------------------------------------------------------------------------------------------------------------#
#XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX COMMENTS ####################################################################
#---------------------------------------------- START ---------------------------------------------------------------------#
############################################################################################################################	   
	 if($_REQUEST['id']=="contribution")  
	   {
	      include("../MODULES/contributions.php");
		   contribution($con);
	   } 

############################################################################################################################
#--------------------------------------------------------------------------------------------------------------------------#
#XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX VIEW REPORTS ################################################################
#------------------------------------------------ START -------------------------------------------------------------------#
############################################################################################################################

	if($_REQUEST['id']=="view")  
	   {
		   ?>
          
           <?php
	   
	   } 

############################################################################################################################
#--------------------------------------------------------------------------------------------------------------------------#
#XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX VIEW Qualifications  ########################################################
#--------------------------------------------------- START ----------------------------------------------------------------#
############################################################################################################################

	if($_REQUEST['id']=="qualification")  
	   {
		$dbh=$con->prepare("select firstname,lastname,surname,qualification,gender,employment_type,mobile_no,
				            marital_status,position,staff_no,(select branch_name from branch where
					        branch_id = userdetails.branch_id)as branch_name,(select department_name from department 
						    where department_id = userdetails.department_id) as department_name from userdetails 
							 WHERE `staff_no`=?");
		$dbh->bindParam(1,$_REQUEST["empno"]);
		
	    $dbh->execute();
		if($dbh->rowCount()>0)
		   {
			$row=$dbh->fetch(PDO::FETCH_ASSOC);
?>
<fieldset style="padding:5% 25%;" style="color:white;">
<p><label for="qualification">NAME:</label> <?php echo strtoupper($row["firstname"]."  ".$row["lastname"]."  ".$row["surname"]); ?></p>
<p><label for="qualification">GENDER:</label> <?php echo strtoupper($row["gender"]); ?></p>
<p><label for="qualification">EMP TYPE:</label> <?php echo strtoupper($row["employment_type"]); ?></p>
<p><label for="qualification">MARITAL STATUS:</label> <?php echo strtoupper($row["marital_status"]); ?></p>
<p><label for="qualification">QUALIFICATION:</label> <?php echo strtoupper($row["qualification"]); ?></p>
<p><label for="qualification">BRANCH:</label> <?php echo strtoupper($row["branch_name"]); ?></p>
<p><label for="qualification">DEPARTMENT:</label> <?php echo strtoupper($row["department_name"]); ?></p>
<script>
function close_window() {
  if (confirm("Close Window?")) {
    close();
  }
}
</script>
<a href="javascript:close_window();" style="background:blue; border:solid 1px transparent; border-radius:3px; padding:5px 15px; margin:0 27%; text-decoration:none; font-weight:bold; color:white;">close</a>
</fieldset>
<?php   
		   }
	   } 
############################################################################################################################
#--------------------------------------------------------------------------------------------------------------------------#
#XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX END XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX#
#--------------------------------------------------------------------------------------------------------------------------#
############################################################################################################################        
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
