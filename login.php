<?php include("_barebones.php"); ?>



<form class="form-horizontal" action="checklogin.php" method="post">
<fieldset>

<!-- Form Name -->
<legend>User Login</legend>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="username">Username</label>
  <div class="controls"> 
    <input id="username" name="username" type="text" placeholder="" class="input-xlarge" required="" maxlength="40">
    
  </div>
</div>

<!-- Password input-->
<div class="control-group">
  <label class="control-label" for="pass">Password</label>
  <div class="controls">
    <input id="pass" name="pass" type="password" placeholder="" class="input-xlarge" maxlength="50" required = "">
    
  </div>
</div>

<!-- Button -->
<div class="control-group">
  <label class="control-label" for="singlebutton"></label>
  <div class="controls">
   	<input type="submit" name="submit" value="Login" class="btn btn-primary">  

  </div>
</div>

</fieldset>
</form>

<!-- 


	 <table border="0"> 

	 <tr><td colspan=2><h1>Login</h1></td></tr> 

	 <tr><td><label class="control-label">Username:</label></td><td> 

<div class="controls">
	 <input type="text" name="username" maxlength="40"> 
</div>
	 </td></tr> 

	 <tr><td><label class="control-label">Password:</label></td><td> 

<div class="controls">
	 <input type="password" name="pass" maxlength="50"> 
</div>
	 </td></tr> 

	 <tr><td colspan="2" align="right"> 

<div class="controls">
	 <input type="submit" name="submit" value="Login"> 
</div>
	 </td></tr> 

	 </table> 

	 </form> -->



 </body>
 </html>