<?php include("_barebones.php"); ?>
<ul class="breadcrumb">
	<li class="active">Home<span class="divider">/</span></li>
</ul>


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
   	<input type="submit" name="submit" value="Change Password" class="btn">
  </div>
</div>

</fieldset>
</form>





 </body>
 </html>