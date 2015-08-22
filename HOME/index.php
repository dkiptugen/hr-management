<!DOCTYPE html>
<?php
$msg="";
include("../CONFIGURATIONS/config.php");
#class import
$DB=new DB;
$security=new security;
$users= new users;
#error_reporting(0);
#end of class import
function login($msg)
    {
      
     $x='<form method="post" action="index.php"  role="form" class="form-horizontal" style="margin:30px;" ><label style=" color:gold; text-decoration:blink; font-weight:bold;">'.$msg.'</label>';
     $x.='<div class="form-group"><label  class="control-label col-md-3 success" >USERNAME</label><div class=" col-md-7"><input type="text" name="usename" class="form-control" /></div></div>';
     $x.='<div class="form-group"><label class="control-label col-md-3" >PASSWORD</label><div class=" col-md-7"><input type="password" name="pwd" class="form-control" /></div></div>';
     $x.='<div class="col-xs-offset-7"><button name="login" class="btn btn-success">LOGIN</button></div>';
     $x.='</form>';
     echo $x;
    }
function change_pass()
    {
	 $x='<form action="index.php"  method="post" role="form" class="form-horizontal" style="margin:25px !important;">';
     #$x.='<p><label>OLD PASSWORD</label><input type="text" required="required" autofocus="autofocus" autocomplete="off" name="oldpassword"/></p>';
     $x.='<div class="form-group"><label class=" control-label col-md-6" >NEW PASSWORD</label><div class=" col-md-6"><input type="password" required="required" autofocus="autofocus" autocomplete="off" name="newpassword" class="form-control"/></div></div>';
     $x.='<div class="form-group"><label class=" control-label col-md-6 "  >CONFIRM PASSWORD</label><div class=" col-md-6"><input type="password" required="required" autofocus="autofocus" autocomplete="off" name="confirmpassword" class="form-control"/></div></div>';
     $x.='<div class="col-xs-offset-7"><input type="submit" name="changepass" value="CHANGE PASSWORD" class="btn btn-success" /></div>';
     $x.='</form>';
	 echo $x;
	}
session_start();
if(isset($_SESSION["ID"])==true)
   {
     if(isset($_SESSION["USERTYPE"])==true)
	    {
          $users->det_user($_SESSION["USERTYPE"]);
        }
	}

?>
<html lang="en">
<head>
<meta  charset="utf-8" />
<title>PILLAR HR</title>
<link href="../CSS/new.css" rel="stylesheet" />
<link href="../CSS/login.css" rel="stylesheet" />
<link href="../CSS/bootstrap.css" rel="stylesheet" />
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</head>
<body> 
<div id="container">
<div id="header">PILLAR FARM HUMAN RESOURCE MANAGEMENT SYSTEM</div>
<hr />

<div class="">

</div>
<hr />
<div id="bod">
<?php
$con=$DB->db_connect(); #Database initialization
if(isset($_POST["login"]))#Start of login
  {  
     $Username=$_POST["usename"];
	 $Password=$_POST["pwd"];
	 #include("../CONFIGURATIONS/config.php");
	 #$DB=new DB;
	 #$security=new security;
	 #$users= new users; 
	 #echo $Password;
	 $password=$security->password_hash($Password,$Username);	 
	 $sth=$con->prepare("select * from users join userdetails on userdetails.staff_no=users.id where username=? and password=?");
	 $sth->bindParam(1,$Username,PDO::PARAM_STR, 12);
	 $sth->bindParam(2,$password,PDO::PARAM_STR, 32);
	 $sth->execute();
	 $count=$sth->rowCount(); #check for database record
	 if($count>0)
	    {		 
		   $Rows=$sth->fetch(PDO::FETCH_ASSOC);
		   #$_SESSION["INITIAL_ID"]=$security->id_gen(8);
		   #print_r($Rows);		 
		   $_SESSION["ID"]=$Rows['id'];
		   $_SESSION["EMPLOYEE_NO"]=$Rows['staff_no'];
		   if($Rows["perm"]==1)
		       {
		         if($Rows['passwordstatus']==0)
		            {
			           $_SESSION["Usertype"]=$Rows['usertype'];
			           setcookie("PASSWORD", $Rows['password'], time() + 360, "/");
			           $_SESSION["USERNAME"]=$Rows["username"];
			           #$_SESSION["PASSWORD"]=$Rows['password'];
			           header("location:index.php?act=chngpass"); exit;
			        }
		        elseif($Rows['passwordstatus']==1)
		            { 
			           $_SESSION["USERTYPE"]=$Rows['usertype'];
			           $users->det_user($Rows["usertype"]);
			        }
			   }
		  else
			   {
				  $msg="YOUR ACCOUNT IS DEACTIVATED";
			   }
		
		 }
	   else
	      {
			$security->wrong_login($con,$Username,$Password);  
			  
		  }
	
	 #end of login
  }
else if(isset($_POST["changepass"]))
    {
	 #Begin of change password
	 $pass1=$_POST["newpassword"];
	 $pass2=$_POST["confirmpassword"];
	 if($pass1==$pass2)
	    { 
		 if(isset($_COOKIE["PASSWORD"])==true)
		    {
			  $Password=$security->password_hash($pass1,$_SESSION["USERNAME"]);
			  $smt=$con->prepare("update users set password=? , passwordstatus=1 where id=?");
			  $smt->bindParam(1,$Password,PDO::PARAM_STR, 32);
			  #$smt->bindParam(2,"1");
			  $smt->bindParam(2,$_SESSION["ID"],PDO::PARAM_STR, 8);
			  $smt->execute();
			  if($smt)
			    {
				 $_SESSION["USERTYPE"]=$_SESSION["Usertype"];
				 $users->det_user($_SESSION["USERTYPE"]);
				}
			}
		
        } 
	else
		{?>
		  <script>
		   alert("PASSWORD MISMATCH");
		   </script>
<?php   }
     #End of change password
    }
$DB->db_close($con);#close of database connection
?>
<div id="login">
<fieldset name="login">
<?php
if(!isset($_GET["act"]))
    {
     login($msg);
    }
else
    {
	  change_pass();	
	}
?>
</fieldset>
</div>
</div>
<hr />
<div id="footer">
&copy; Copyright <?php echo date("Y");?>.All Rights Reserved
</div>
</div>
</body>
</html>
