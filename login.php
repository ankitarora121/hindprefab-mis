<?php include("_barebones.php"); ?>



<?php 

 // Connects to your Database 

 mysql_connect("127.0.0.1", "root", "itsover") or die(mysql_error()); 

 mysql_select_db("hpl") or die(mysql_error()); 


 //Checks if there is a login cookie

 if(isset($_COOKIE['ID_my_site']))


 //if there is, it logs you in and directes you to the members page

 { 
 	$username = $_COOKIE['ID_my_site']; 

 	$pass = $_COOKIE['Key_my_site'];

 	 	$check = mysql_query("SELECT * FROM users WHERE username = '$username'")or die(mysql_error());

 	while($info = mysql_fetch_array( $check )) 	

 		{

 		if ($pass != $info['password']) 

 			{

 			 			}

 		else

 			{

 			header("Location: userpanel.php");



 			}

 		}

 }


 //if the login form is submitted 

 if (isset($_POST['submit'])) { // if form has been submitted



 // makes sure they filled it in

 	if(!$_POST['username'] | !$_POST['pass']) {

 		die('You did not fill in a required field.');

 	}

 	// checks it against the database



 	if (!get_magic_quotes_gpc()) {

 		//$_POST['email'] = addslashes($_POST['email']);

 	}

 	$check = mysql_query("SELECT * FROM users WHERE username = '".$_POST['username']."'")or die(mysql_error());



 //Gives error if user dosen't exist

 $check2 = mysql_num_rows($check);

 if ($check2 == 0) {

 		die('That user does not exist in our database. <a href=add.php>Click Here to Register</a>');

 				}

 while($info = mysql_fetch_array( $check )) 	

 {/*

 $_POST['pass'] = stripslashes($_POST['pass']);

 	$info['password'] = stripslashes($info['password']);

 	$_POST['pass'] = md5($_POST['pass']);
*/


 //gives error if the password is wrong

 	if ($_POST['pass'] != $info['password']) {

 		die('Incorrect password, please try again.');

 	}
 else 

 { 

 
 // if login is ok then we add a cookie 

 	 $_POST['username'] = stripslashes($_POST['username']); 

 	 $hour = time() + 3600; 

 setcookie(ID_my_site, $_POST['username'], $hour); 

 setcookie(Key_my_site, $_POST['pass'], $hour);	 

 

 //then redirect them to the members area 

 header("Location: userpanel.php"); 

 } 

 } 

 } 

 else 

{	 

 

 // if they are not logged in 

 ?> 

<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
<fieldset>

<!-- Form Name -->
<legend>User Login</legend>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="username">Username</label>
  <div class="controls"> 
    <input id="username" name="username" type="text" placeholder="" class="input-xlarge" required="" style="height:30px"  maxlength="40">
    
  </div>
</div>

<!-- Password input-->
<div class="control-group">
  <label class="control-label" for="pass">Password</label>
  <div class="controls">
    <input id="pass" name="pass" type="password" placeholder="" class="input-xlarge" style="height:30px"  maxlength="50" required = "">
    
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



 <?php 

 } 

 

 ?> 

 </body>
 </html>