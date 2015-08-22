<?php
function discipline($DENO)
{
 #echo date_default_timezone_get();
date_default_timezone_set("AFRICA/NAIROBI");
if($_REQUEST["act"]=="addcase")
   {
	   if(isset($_POST["judgement"]))
	     {  #echo $_POST["staff_no"];
			
		    $dbh=$DENO->prepare("INSERT INTO `discipline`(`employee_no`, `displinery_case`, `date`, `action`)
		                        VALUES (?,?,now(),?)");	 
		    $dbh->bindParam(1,$_POST["staff_no"]);
		    $dbh->bindParam(2,$_POST["offence"]);
		    #$dbh->bindParam(3,);
		    $dbh->bindParam(3,$_POST["action"]);
			$dbh->execute();
			
		 }
	  ?>
	  <script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                
                $('#datepicker').datepicker({
                    format: "yyyy-mm-dd"
                });  
            
            });
        </script>
 <fieldset style="padding:15px 26%;margin:0; background:rgba(255,255,255,0.4);  ">
<form class="form" role="form" method="post" action="index.php?id=discipline&act=addcase">
 <div class="form-group">
  <div class="col-md-8">
    <input type="text" required="required" autofocus="autofocus" autocomplete="off" name="staff_no" class="form-control" placeholder="EMPLOYEE  NAME OR NUMBER or Telephone No"/>
  </div>
  <button class="btn btn-default"  name="searchemp">SEARCH</button> 
</div>
</form>
</fieldset>
<hr style="margin:0;" />
<?php
if(isset($_POST["searchemp"]))
  {
	  $dbh=$DENO->prepare("select * from userdetails where firstname like '%' :search '%' or lastname like '%' :search '%' or 
	                       surname like '%' :search '%' or staff_no like '%' :search '%'");
	  $dbh->bindParam(":search",$_POST["staff_no"]);
	  $dbh->execute();
	  if($dbh->rowCount()>0)
	    {
		  $ROW=$dbh->fetch(PDO::FETCH_ASSOC);	
		
	  ?>
<fieldset style="padding: 25px 0;" >
	 <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="post" role="form" class="form-horizontal">
     
    
  <!--div class="form-group">
     <label for="date" class="control-label col-md-4">DATE</label>
       <div class="col-md-3">
         <input id="datepicker"  name="date" required class="form-control" class="datepicker"  /> 
      </div>
</div-->

<div class="form-group">
<label class="control-label col-md-4">STAFF NAME</label>
  <div class="col-md-3">
     <input name="staff_no" value="<?php echo $ROW["staff_no"];  ?>"   hidden="true" />
     <input type="text" required="required" autofocus="autofocus" autocomplete="off" name="staff_name" class="form-control disabled" disabled="disabled" value="<?php echo $ROW["firstname"]." ".$ROW["lastname"]." ".$ROW["surname"]; ?>"/>
   </div>
</div>
<div class="form-group">
 <label class="control-label col-md-4">OFFENCE</label>
    <div class="col-md-3">
      <textarea required autofocus autocomplete="off" name="offence" class="form-control" style="max-height:80px !important; overflow:auto !important; width:265px;  !important;">
      </textarea>
    </div>
</div>
<div class="form-group">
  <label class="control-label col-md-4">ACTION</label>
    <div class="col-md-3">
       <input type="text" required="required" autofocus="autofocus" autocomplete="off" name="action" class="form-control"/>
    </div>
</div>
<div class="form-group">
<div class="col-md-4 col-sm-offset-6 ">
<input type="submit" name="judgement" value="ADD CASE" class="btn btn-primary" />
</div>
</div>
</form>
</fieldset>
	  <?php
	  
  }
  else
  {
	echo "<label class='control-label'> NO RECORD FOUND!!!</label>";  
  }
  }
   }
if($_REQUEST["act"]=="vcase")
   {  
      
	   
	
	?>
    <fieldset style="margin:0; padding:10px 19%;">
    <form method="post" action="index.php?id=discipline&&act=vcase" role="form" class="form" >
    <div class="form-group ">
    <div class="col-md-7">
    <input type="text" name="sc" class="form-control" placeholder="Employee name or employee no in one word " />
    </div>
    </div>
    <div class="form-group">
    <button name="search" class="btn btn-primary">SEARCH</button>
    </div>
    </form>
    </fieldset>
    
    <?php
    if(isset($_POST["search"]))
	  { 
	    if(!empty($_POST["sc"]))
		   {
	        $dbh=$DENO->prepare("SELECT * FROM `discipline` join userdetails on userdetails.staff_no=discipline.employee_no 
			                    where firstname like '%' :SEARCH '%' or lastname like '%' :SEARCH '%' or surname like 
								'%' :SEARCH '%'or staff_no like '%' :SEARCH '%'");
		   $dbh->bindParam(":SEARCH",$_POST["sc"]);
		   }
		else
		   {
			$dbh=$DENO->prepare("SELECT * FROM `discipline` join userdetails on userdetails.staff_no=discipline.employee_no");
		   }
	  }
	else
	  {
		$dbh=$DENO->prepare("SELECT * FROM `discipline` join userdetails on userdetails.staff_no=discipline.employee_no");
	  }
	  $dbh->execute();  
	  if($dbh->rowCount()>0)
		 { 
		   $x=1;
		   echo' 
				         <fieldset style="background:lavender; padding:0; margin:0 5%;
				         text-align:left !important; max-height:300px; overflow:auto;">
                         <table class="table table-condensed" style="margin:0 !important;
				         padding:0 !important!;">
                         <tr>
                         <thead>
                         <th>NO</th>
                         <th>EMPLOYEE NAME</th>
                         <th>DISCIPLINERY CASE</th>
                         <th>VERDICT/ACTION</th>
                         <th>DATE_______TIME</th>
                         </thead>
                         </tr>'
						 ;
		   while($ROW=$dbh->fetch(PDO::FETCH_ASSOC))
			    {
					
				 if($x%2==0)
				   {
				     $y="success";   
				   }
				else
				   {
					 $y="active";  
				   }
			       echo "<tr class='".$y."'><td>".$x."</td><td>".$ROW["firstname"]." ".$ROW["lastname"]." ".$ROW["surname"]."</td><td>".$ROW["displinery_case"]."</td><td>".$ROW["action"]."</td><td>".date("d-m-Y -- h:i:s a",strtotime($ROW["date"]))."</td></tr>";
					  $x++;
				 }
			}
	  echo "</table></fieldset>";
   }

}

?>