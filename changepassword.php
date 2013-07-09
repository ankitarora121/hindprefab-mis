<?php include("_barebones.php"); ?>
<ul class="breadcrumb">
  <li><a href="login.php">Home</a><span class="divider">/</span></li>
  <li class="active">Change Password</li>
</ul>


<form class="form-horizontal" action="changepassword_process.php" method="post">
<fieldset>

<!-- Form Name -->
<legend>Change Password</legend>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="username">Username</label>
  <div class="controls"> 
    <input id="username" name="username" type="text" placeholder="" class="input-xlarge" required="" maxlength="40">
    
  </div>
</div>

<!-- Password input-->
<div class="control-group">
  <label class="control-label" for="pass">Old Password</label>
  <div class="controls">
    <input id="pass" name="pass" type="password" placeholder="" class="input-xlarge" maxlength="50" required = "">
    
  </div>
</div>
<!-- Password input-->
<div class="control-group">
  <label class="control-label" for="pass">New Password</label>
  <div class="controls">
    <input id="passnew" name="passnew" type="password" placeholder="" class="input-xlarge" maxlength="50" required = "">
    
  </div>
</div>

<!-- Password input-->
<div class="control-group">
  <label class="control-label" for="pass">New Password (again)</label>
  <div class="controls">
    <input id="passnew2" name="passnew2" type="password" placeholder="" class="input-xlarge" maxlength="50" required = "">
    
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





 </body>
 </html>