<?php
function memo()
  {
?>
<fieldset style="padding:20px 15%;">
  <form class="form-horizontal">
   <div class="form-group">
     <div class="col-md-4">
        <textarea class="form-control" autofocus="autofocus" required="required"></textarea>
      </div>
   </div>
   <div class="form-group">
     <div class="col-sm-1">
        <input type="checkbox" name="[]access" class="form-control" autofocus="autofocus" required="required" value="all" />
          </div>
            <label class="control-label col-sm-1">ALL</label>
             <div class="col-md-1">
               <input type="checkbox" name="[]access" class="form-control" autofocus="autofocus" required="required" />
            </div>
        <label class="control-label col-sm-1">MANAGER</label>
    </div>
   <div class="form-group">
     <div class="col-sm-1">
        <input type="checkbox" name="[]access" class="form-control" autofocus="autofocus" required="required" value="all" />
          </div>
            <label class="control-label col-sm-1">SUPERVISOR</label>
             <div class="col-xs-1">
               <input type="checkbox" name="[]access" class="form-control" autofocus="autofocus" required="required" />
            </div>
        <label class="control-label col-sm-1">ACCOUNTANT</label>
    </div>
   <div class="form-group">
     <div class="col-xs-offset-3">
        <button class="btn btn-primary">POST</button>
     </div>
   </div>
  </form>	
</fieldset>  
<?php	  
  }
?>