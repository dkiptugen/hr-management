<?php
function contribution($con)
  {
    if($_REQUEST["action"]=="suggestion")
       { 
	     if($_REQUEST["x"]=="add")
		   {
		      ?>
              <fieldset style="padding:20px 25%;">
                <form class="form-horizontal">
                  <div class="form-group">
                    <div class="col-md-11">
                      <textarea class="form-control" autofocus="autofocus" required="required"></textarea>
                    </div>
                 </div>
                 <div class="form-group">
                   <div class="col-xs-offset-9">
                     <button class="btn btn-primary">POST</button>
                  </div>
                </div>
              </form>
             </fieldset>	
        <?php
		   }
		elseif($_REQUEST["x"]=="view")
		   {
			 #suggestion=1
			echo "<table class='table table-condensed' class='background:ghostwhite; margin:0;padding:0;'>
			      <thead><tr><th>NO</th><th>NAME</th><th>SUGGESTION</th><th>DATE</th><th>ACTION</th></tr></thead>";   
			$dbh=$con->prepare("");
			$dbh->execute();
			if($dbh->rowCount()>0)
			   { $x=1;
				 while($RW=fetch(PDO::FETCH_ASSOC))
				      {
						echo "<tr><td>".$x."</td><td>".strtoupper($RW["firstname"]." ".$RW["lastname"]." ".$RW["surname"])."</td>
						      <td>".$RW["sugestion"]."</td><td>".$RW["date"]."</td><td><a href=index.php
							  ?DENO=READ&&suges='".$RW["id"]."'>MARK AS READ</a><a href=index.php?DENO=FORWARD&&suges='".$RW["id"]
							  ."'>FORWARD MBELE</a>
							  </td></tr>";
						
						$x++; 						  
					  }
			   }
			echo "</table>";   
		   }
	   }
	if($_REQUEST["action"]=="complaint")
       {
		 if($_REQUEST["x"]=="add")
		    {
		      ?>
              <fieldset style="padding:20px 25%;">
                <form class="form-horizontal">
                  <div class="form-group">
                    <div class="col-md-11">
                      <textarea class="form-control" autofocus="autofocus" required="required"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                   <div class="col-xs-offset-9">
                    <button class="btn btn-primary">POST</button>
                   </div>
                </div>
              </form>
            </fieldset>	
            <?php 
		  }
		 elseif($_REQUEST["x"]=="view")
		    {
			echo "<table class='table table-condensed' class='background:ghostwhite; margin:0;padding:0;'>
			      <thead><tr><th>NO</th><th>NAME</th><th>SUGGESTION</th><th>DATE</th><th>ACTION</th></tr></thead>";   
			$dbh=$con->prepare("");
			$dbh->execute();
			if($dbh->rowCount()>0)
			   { $x=1;
				 while($RW=fetch(PDO::FETCH_ASSOC))
				      {
						echo "<tr><td>".$x."</td><td>".strtoupper($RW["firstname"]." ".$RW["lastname"]." ".$RW["surname"])."</td>
						      <td>".$RW["sugestion"]."</td><td>".$RW["date"]."</td><td><a href=index.php
							  ?DENO=READ&&suges='".$RW["id"]."'>MARK AS READ</a><a href=index.php?DENO=FORWARD&&suges='".$RW["id"]
							  ."'>FORWARD MBELE</a>
							  </td></tr>";
						
						$x++; 						  
					  }
			   }
			
			echo "</table>"; 	
				
			}
	   }
    ?>
    <fieldset style="max-height:200px; overflow:auto;">
    
    </fieldset>
    <?php  
  }

?>