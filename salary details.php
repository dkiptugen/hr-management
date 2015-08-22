<!Doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>
<body>
<form action="<?php $_SERVER["PHP_SELF"]; ?>" method="post">
<div id="left">
<p><label>DATE</label><input type="text" required="required" autofocus="autofocus" autocomplete="off" name="date"/></p>
<p><label>STAFF NAME</label><input type="text" required="required" autofocus="autofocus" autocomplete="off" name="staffname"/></p>
<p><label>ID NUMBER</label><input type="text" required="required" autofocus="autofocus" autocomplete="off" name="idnumber"/></p>
<p><label>BASIC SALARY</label><input type="text" required="required" autofocus="autofocus" autocomplete="off" name="basicsalary"/></p>
<p><label>ALLOWANCE</label><input type="text" required="required" autofocus="autofocus" autocomplete="off" name="houseallowance"/></p>
<p><label>GROSS PAY</label><input type="text" required="required" autofocus="autofocus" autocomplete="off" name="grosspay"/></p>
</div>
<div id="right">
<p><label>ADVANCE</label><input type="text" required="required" autofocus="autofocus" autocomplete="off" name="advance"/></p>
<p><label>LOAN</label><input type="text" required="required" autofocus="autofocus" autocomplete="off" name="loan"/></p>
<p><label>NET SALARY</label><input type="text" required="required" autofocus="autofocus" autocomplete="off" name="netsalary"/></p>
<p><label>NHIF</label><input type="text" required="required" autofocus="autofocus" autocomplete="off" name="nhif"/></p>
<p><label>NSSF</label><input type="text" required="required" autofocus="autofocus" autocomplete="off" name="nssf"/></p>

<p>PAYROLL TYPE
		<select name="menu">
        <option value="0" selected>(please select:)</option>
        <option value="1">PERMANENT</option>
        <option value="2">CASUAL</option>
		<option value="2">CONTRACT</option>
		</select>
</div>		
<p><input type="submit" name="" value="SUBMIT" /></p>
</form>
</body>
</html>
