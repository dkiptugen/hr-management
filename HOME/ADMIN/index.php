<?php
error_reporting(0);
include("../../CONFIGURATIONS/config.php");
$users=new users;
$security= new security;
$DB= new DB;
$vall= new validate;
session_start();
$users->user_check($_SESSION["USERTYPE"],"ADMIN");
if($_GET["logout"]==1)
      {
		$security->logout(); 		  
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
<script type="text/javascript">
function reloadNames() {
    var url = "../MODULES/accounts.php?t=" + (new Date()).getTime(); //kills browser cache
    // This will make a request to names.php (code above) and put the resulting
    // text (which happens to be valid html) into the names div.
    jQuery("#number").load(url);
}
jQuery(function() {
    // Schedule the reloadNames function to run every 5 seconds.
    // So, the list of names will be updated every 5 seconds.
    setInterval(reloadNames, 3000);
});
</script>
<!--link href="CSS/main.css" rel="stylesheet" /-->
</head>
<body> 
<div id="container">
<div id="header">PILLAR FARM HUMAN RESOURCE MANAGEMENT SYSTEM</div>
<hr />
<div class="container-fluid">
<ul class="nav navbar-nav">
<li class="navbar-brand">CAYDEESOFT LIMITED</li>
<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="index.php?id=manage">MANAGE USERS</a>
<ul class="dropdown-menu" style="background:blue; font-weight:bold;">
<li><a href="index.php?id=addu">ADD USERS</a></li>
<li><a href="index.php?id=reset">PSWD MANAGE</a></li>
<!--li><a href="index.php?id=remove">DELETE USER</a></li>
<li><a href="index.php?id=permissions">ACCOUNT STATUS</a></li-->
</ul>
</li>
<li><a href="index.php?id=view">VIEW USERS</a></li>
<li><a href="index.php?id=invalid">INVALID LOGINS  <b id="number"></b></a></li>
<li><a style="float:right !important;" href="index.php?logout=1">LOGOUT</a></li>
</ul>
</div>
<hr />
<div id="bod">
<?php
$con=$DB->db_connect();
if(isset($_REQUEST["id"]))
  {
	if($_REQUEST['id']=="invalid")  
	   {   if(isset($_REQUEST["act"]))
	          {
				 $dbh=$con->prepare("update insecurity set stat=1 where id=:id");
				 $dbh->bindParam(":id",$vall->test_input($_REQUEST["val"]));
				 $dbh->execute();
			  }
	   
	      $dbh=$con->prepare("SELECT * FROM `insecurity` where date_format(date,'%d-%m-%Y')  = date_format(now(),'%d-%m-%Y')
		                     && stat=0");
          $dbh->execute();
		    $x=1;
           if($dbh->rowCount()>0)
              {
				echo "<fieldset><fieldset style='background:lavender; margin:10px 2%; padding:0; max-height:370px; overflow:auto''><table class='table table-condensed' style='padding:0 !important; margin:0 !important;'><tr><th>NO</th><th>USER</th><th>TELEPHONE NO</th><th>ACCESSED USERNAME</th><th>ACCESSED PASSWORD</th>
				       <th>LAN IP ADDRESS</th><th>REMOTE IP ADDRESS</th><th>ACTION</th></tr>";
	            while($R=$dbh->fetch(PDO::FETCH_ASSOC))
				      {    
					        if($x%2==0)
					           {
								$y="success";   
							    }
						   else
							    {
								 $y="active";  
							    }
	                        echo "<tr class='".$y."'><td>".$x."</td><td>".$R["employee_name"]."</td><td>".$R["tel_no"]."</td>
					        <td>".$R["username"]."</td><td>".$R["password"]."</td><td>".$R["local_ip"]."</td>
							<td>".$R["public_ip"]."</td><td><a href='index.php?id=invalid&&act=1&&val=".$R["id"]."'>
							MARK AS VIEWED</a></td></tr>";
				            $x++; 
					  }
			    echo"</table></fieldset></fieldset>";
              }	   
	   }
	   
	  
	if($_REQUEST['id']=="addu")  
	   {
		if(isset($_POST["add_user"]))
		  {   
		      $password=$security->password_hash($_POST["password"],$_POST["username"]);
			  
		  }
?>
<fieldset name="addu">
<div id="left">


<?php
$dbh=$con->prepare("select * from userdetails left join users on userdetails.staff_no=users.id where users.id is null && system_access=1");
$dbh->execute();
if($dbh->rowCount()>0)
   {
	  echo' <h3>USERS</h3>
<fieldset id="users" style="max-height:300px; overflow:auto;">';
	while($ROW=$dbh->fetch(PDO::FETCH_ASSOC)) 
	      { 
			echo "<p><a href='index.php?id=addu&&user=".$ROW["staff_no"]."&&name=".$ROW["firstname"]." ".$ROW["lastname"]." ".$ROW["surname"]."'>".$ROW["firstname"]." ".$ROW["lastname"]." ".$ROW["surname"]."</a></p>";  
		  }
		 echo' </fieldset>';
   }
 
?>

</div>	
<?php
if(isset($_REQUEST["user"]))
   {
	if(isset($_POST["add_user"]))
	   { 
	    
		 if($_POST["password1"] != $_POST["password2"])
		    {?>
			<script	>
			 alert("PASSWORD MISMATCH");
			</script>
	  <?php }
		else
		    {
		if(empty($_POST["password_status"]))
		   {
			$passwordstat=1;   
		   }
		else
		   {
			$passwordstat=0;  
		   }
		$password=$security->password_hash($_POST["password1"],$_POST["username"]);			
		$dbh=$con->prepare("INSERT INTO `users`(`id`, `username`, `password`, `passwordstatus`, `usertype`, `perm`) VALUES (?,?,?,?,?,1)");
		$dbh->bindParam(1,$vall->test_input($_POST["emp_no"])); 
		$dbh->bindParam(2,$vall->test_input($_POST["username"]));
		$dbh->bindParam(3,$vall->test_input($password));
		$dbh->bindParam(4,$vall->test_input($passwordstat));
		$dbh->bindParam(5,$vall->test_input(strtoupper($_POST["usertype"])));
		$dbh->execute(); 
		header("location:index.php?id=addu");exit;
			}
	   }
?>
<form method="post" action="index.php?id=addu&&user=<?php echo $_REQUEST["user"];  ?>&&name=<?php echo $_REQUEST["name"]; ?>" role="form" class="form-horizontal">
<div id="right" >
<input hidden="true" name="emp_no" value="<?php echo $_REQUEST["user"]; ?>" />
<p>
 <div  class="form-group">
  <label  class="control-label col-sm-3" >FULL NAME</label>
    <div class="col-sm-3">
      <input type="text" name="username" id="status" class="form-control" value="<?php echo $_REQUEST["name"]; ?>" readonly  />
   </div>
 </div>
</p>
<p>
 <div  class="form-group">
  <label  class="control-label col-sm-3" > USERNAME</label>
    <div class="col-sm-3">
      <input type="text" name="username" id="status" class="form-control"  />
   </div>
 </div>
</p>
<p>
  <div  class="form-group">
     <label  class="control-label col-sm-3">ENTER PASSWORD</label>
       <div class="col-sm-3">
         <input type="password" name="password1" id="status" class="form-control col-md-1" />
       </div>
   </div>
</p>
<p>
  <div  class="form-group">
   <label  class="control-label col-sm-3">CONFIRM PASSWORD</label>
     <div class="col-sm-3">
       <input type="password" name="password2" id="status" class="form-control col-md-1"/>
     </div>
  </div>
</p>
<p>
  <div  class="form-group">
    <label class="control-label col-sm-3">Change password on next login</label>
       <div class="col-sm-2"> 
        <input type="checkbox" name="password_status" class="form-control" />
      </div>  
  </div>
</p>
<p>
 <div  class="form-group">
    <label  class="control-label col-sm-3">USERTYPE</label>
       <div class="col-sm-3">
    <select name="usertype" class="form-control">
<option value="admin">ADMIN</option>
<option value="director">DIRECTOR</option>
<option value="manager">MANAGER</option>
<option value="accountant">ACCOUNTANT</option>
<option value="supervisor">SUPERVISOR</option>
</select>
</div>
</div>
</p>

<p style="height:0; margin:0; padding:0; clear:both;"></p>
<p>
  <div class="form-group">
    <div class="col-sm-offset-9 col-sm-20">
      <input type="submit" value="ADD USER" name="add_user" class="btn btn-primary" />
    </div>
 </div>
</p>
</form>
</div>
</fieldset>
<?php 
   }
	   }
	if($vall->test_input($_REQUEST["id"])=="reset")
	   { 
	   if($vall->test_input($_REQUEST["user"])==1)
		  {
		   if($vall->test_input($_POST["password1"]) != $vall->test_input($_POST["password2"]))
		    {?>
			<script	>
			 alert("PASSWORD MISMATCH");
			</script>
	  <?php }
		else
		    {
		     if(empty($_POST["password_status"]))
		       {
			     $passwordstat=1;   
		       }
		    else
		       {
			  $passwordstat=0;  
		       }
			 $password=$security->password_hash($vall->test_input($_POST["password1"]),$vall->test_input($_POST["username"]));
			 $dbh=$con->prepare("update users set password=?,passwordstatus=? where id=?"); 
			 $dbh->bindParam(1,$vall->test_input($password));
			 $dbh->bindParam(2,$vall->test_input($passwordstat));
			 $dbh->bindParam(3,$vall->test_input($_POST["emp_no"]));
			 $dbh->execute(); 
			}
		  }
		   ?>
	   <fieldset style="padding:2% 15%;">
       <form class="form-inline" role="form" style="margin:0 5%;" method="post" action="index.php?id=reset">
    
    <div class="form-group ">
      
     <p> <input type="text" class="form-control col-md-11" style="width:300px !important;" placeholder="Employee name or Employee Number" name="sc">
   </div>
    <div class="form-group ">
    <button type="submit" class="btn btn-default" name="search">SEARCH</button>
     </div>
    </p>
  </form>
  <?php
  if(isset($_POST["search"])==true) 
     {
  $dbh=$con->prepare("SELECT * FROM `users` join userdetails on userdetails.staff_no=users.id WHERE firstname like '%' :search '%' or lastname like '%' :search '%' or surname like '%' :search '%' or staff_no like '%':search '%'");
  $dbh->bindParam(':search',$vall->test_input($_POST["sc"]));
  $dbh->execute();
  if($dbh->rowCount()>0)
    {
	 $DATA=$dbh->fetch(PDO::FETCH_ASSOC);	
	 $name=$DATA["firstname"]." ".$DATA["lastname"]." ".$DATA["surname"];	
  ?>
  <form method="post" action="index.php?id=reset&&user=1" role="form" class="form-horizontal">
<div id="right" >
<input hidden="true" name="emp_no" value="<?php echo $DATA["staff_no"]; ?>" />
<input hidden="true" name="username" value="<?php echo $DATA["username"]; ?>" />
<p>
 <div  class="form-group">
  <label  class="control-label col-sm-3" >FULL NAME</label>
    <div class="col-sm-5">
      <input type="text" id="status" class="form-control" value="<?php echo $name;  ?>" readonly  />
   </div>
 </div>
</p>

<p>
  <div  class="form-group">
     <label  class="control-label col-sm-3">ENTER PASSWORD</label>
       <div class="col-sm-5">
         <input type="password" name="password1" id="status" class="form-control col-md-1" />
       </div>
   </div>
</p>
<p>
  <div  class="form-group">
   <label  class="control-label col-sm-3">CONFIRM PASSWORD</label>
     <div class="col-sm-5">
       <input type="password" name="password2" id="status" class="form-control col-md-1"/>
     </div>
  </div>
</p>
<p>
  <div  class="form-group">
    <label class="control-label col-sm-3">Change password on next login</label>
       <div class="col-sm-2"> 
        <input type="checkbox" name="password_status" class="form-control" />
      </div>  
  </div>
</p>


<p style="height:0; margin:0; padding:0; clear:both;"></p>
<p>
  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-20">
      <input type="submit" value="ADD USER" name="add_user" class="btn btn-primary" />
    </div>
 </div>
</p>
</form>
<?php
	}
	 }
?>
       </fieldset>   
<?php  
}
	
	if($_REQUEST['id']=="view")  
	   {
	   if(isset($_REQUEST["action"]) )
	     {   
	      if($_REQUEST["action"]=="activate")
	        {
		      $dbh=$con->prepare("update users set perm = 1 where id=?"); 
	        }
	      if($_REQUEST["action"]=="deactivate")
	        {
		      $dbh=$con->prepare("update users set perm = 0 where id=?");
	        }
	      if($_REQUEST["action"]=="terminate")
	        {
		      $dbh=$con->prepare("update users set perm = 2 where id=?");
	        }
			$dbh->bindParam(1,$vall->test_input($_REQUEST["user"]));
			$dbh->execute();
		 }
		?>
        <fieldset style="padding:0 5%;" >
         <fieldset style="padding:2% 15%;">
       <form class="form-inline" role="form" style="margin:0 5%;" method="post" action="index.php?id=view">
    
    <div class="form-group ">
      
     <p> <input type="text" class="form-control col-md-11" style="width:300px !important;" placeholder="Employee name or position or usertype" name="sc">
   </div>
    <div class="form-group ">
    <button type="submit" class="btn btn-default" name="search">SEARCH</button>
     </div>
    </p>
  </form>
  </fieldset>
  <table class='table table-condensed' style='background:ghostwhite; max-height:300px; overflow:auto; text-align:left !important;'>
  <tr><thead style="text-align:center !important;">
  <th>NAME</th>
  <th>POSITION</th>
  <th>USERTYPE</th>
  <th>ACCOUNT STATUS</th>
  <th>PASSWORD STATUS</th>
  <th>ACTION</th>
  </thead></tr>
        <?php
		if(isset($_POST["search"])==true)
		   {
			if(empty($_POST["sc"]))
			  {
				$dbh=$con->prepare("select * from users join userdetails on userdetails.staff_no=users.id  ");              
			     
			  }
			else
			  {
				  $dbh=$con->prepare("select * from users join userdetails  on userdetails.staff_no=users.id 
								    where firstname like '%' :search '%' or lastname like '%' :search '%' or surname like 
        							'%' :search '%' or usertype like  :search  or position  like '%' :search '%' ");  
				  $dbh->bindParam(":search",$vall->test_input($_POST["sc"]));
				   
			  }
		   }
		  else
		   {
		     $dbh=$con->prepare("select * from users join userdetails  on userdetails.staff_no=users.id  ");
		   }
	    $dbh->execute();
		if($dbh->rowCount()>0)
		  { $x=1;
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
			if($ROW["perm"]==1)
			  {
				$stat="ACTIVE";  
			  }
	   else if($ROW["perm"]==0)
			  {
				$stat="NOT ACTIVE";
			  }
			else
			   {
				 $stat="TERMINATED";  
			   }
			echo "<tr class='".$y."'>
			<td>".$ROW["firstname"]." ".$ROW["lastname"]." ".$ROW["surname"]."</td>
			<td>".$ROW["position"]."</td>
			<td>".$ROW["usertype"]."</td>
			<td>".$stat."</td>
			<td>".$ROW["passwordstatus"]."</td>
			<td><a href='index.php?id=view&&user=".$ROW["staff_no"]."&&action=activate'>ACTIVATE</a>
			    <a href='index.php?id=view&&user=".$ROW["staff_no"]."&&action=deactivate'>DEACTIVATE</a>
			     <a href='index.php?id=view&&user=".$ROW["staff_no"]."&&action=terminate'>TERMINATE</a>
			</td>
			</tr>";	
			 $x++;	  
				  }
		  }
	   } 
	   echo "</table></fieldset>";  
  }
$DB->db_close($con);
?>
<p style="height:0; margin:0; padding:0; clear:both;"></p>
</div>
<hr />
<div id="footer">&copy; Copyright <?php echo date("Y");?>.All Rights Reserved <span class=" " style="float:right; line-height:15px;" id="timer"></span>
</div>
</div>
</body>
</html>
