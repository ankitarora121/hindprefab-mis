<?php include("_barebones.php"); ?>

<!-- <form action=admin.php method="post">
UserName : <input type="text" name="user"><br>

Password : <input type="password" name="password"><br>
<input type="submit" value="SUBMIT">


</form> -->


<form class="form-horizontal" action="admin.php" method="post">
<fieldset>

<!-- Form Name -->
<legend>Admin Login</legend>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="username">Username</label>
  <div class="controls"> 
    <input id="username" name="user" type="text" placeholder="" class="input-xlarge" required="" style="height:30px"  maxlength="40">
    
  </div>
</div>

<!-- Password input-->
<div class="control-group">
  <label class="control-label" for="pass">Password</label>
  <div class="controls">
    <input id="pass" name="password" type="password" placeholder="" class="input-xlarge" style="height:30px"  maxlength="50" required="">
    
  </div>
</div>

<!-- Button -->
<div class="control-group">
  <label class="control-label" for="singlebutton"></label>
  <div class="controls">
   	<input type="submit" name="submit" value="SUBMIT" class="btn btn-primary">  

  </div>
</div>

</fieldset>
</form>

</body>
</html>