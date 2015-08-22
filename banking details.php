<!Doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>
<body>
<form action="<?php $_SERVER["PHP_SELF"]; ?>" method="post">
<p><label>BANK NAME</label><input type="text" required="required" autofocus="autofocus" autocomplete="off" name="bankname"/></p>
<p><label>ACCOUNT NUMBER</label><input type="text" required="required" autofocus="autofocus" autocomplete="off" name="accountnumber"/></p>
<p><label>DATE OF BANKING</label><input type="text" required="required" autofocus="autofocus" autocomplete="off" name="dateofbanking"/></p>
<p><label>COMMENT</label><input type="text" required="required" autofocus="autofocus" autocomplete="off" name="comment"/></p>
<p><label>
REFERENCE NUMBER</label><input type="text" required="required" autofocus="autofocus" autocomplete="off" name="referencenumber"/></p>
<p><label>SUB TOTAL</label><input type="text" required="required" autofocus="autofocus" autocomplete="off" name="subtotal"/></p>
<p><input type="submit" name="" value="SUBMIT" /></p>
</form>
</body>
</html>
