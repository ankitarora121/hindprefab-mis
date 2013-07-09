<?php include "_barebones.php"; ?>

<ul class="breadcrumb">
  <li><a href="login.php">Home</a><span class="divider">/</span></li>
  <li><a href="adminpanel.php">Admin Panel</a><span class="divider">/</span></li>
  <li class="active">Add new User</li>

</ul>

<?php
session_start();

if ( !isset( $_COOKIE["Key_my_site"] ) || !$_SESSION["is_admin"] ) {
  header( "Location: login.php" );
}

?>

<form class="form-horizontal" action="addnewuser_process.php" method="post" id="signup">
<fieldset>

<!-- Form Name -->
<legend>Add New User</legend>



<div class="control-group">
  <label class="control-label" for="project_id">Full Name</label>
  <div class="controls">
    <input required="" id="fullname" name="fullname" type="text" placeholder="" class="input-xlarge" >

  </div>
</div>


<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="project_id">Username</label>
  <div class="controls">
    <input required="" id="username" name="username" type="text" placeholder="" class="input-xlarge" >

  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="project_name">Password</label>
  <div class="controls">
    <input required="" id="password" name="password" type="password" placeholder="" class="input-xlarge">

  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="client">Confirm Password</label>
  <div class="controls">
    <input required="" id="confpassword" name="confpassword" type="password" placeholder="" class="input-xlarge">

  </div>
</div>



<!-- Button -->
<div class="control-group">
  <label class="control-label" for="submit"></label>
  <div class="controls">
    <button id="submit" name="submit" class="btn btn-primary">Submit</button>
  </div>
</div>

</fieldset>
</form>


 <script type="text/javascript">
$(document).ready(function(){
  $("#signup").validate({
    rules:
    {
      username:"required",
      fullname:"required",
      password:
            {
            required:true,
            minlength: 6
            },
      confpassword:
            {
            required:true,
            equalTo: "#password"
            },
    },

    errorClass: "help-inline"

  });
});
</script>










</body>
</html>
