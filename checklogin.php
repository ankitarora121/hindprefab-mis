<?php include("_barebones.php"); ?>
<ul class="breadcrumb">
  <li><a href="login.php">Home</a><span class="divider">/</span></li>
  <li class="active">Check Login</li>
</ul>

<?php

// Connects to your Database

mysql_connect( "127.0.0.1", "ankit", "itsover" ) or die( mysql_error() );

mysql_select_db( "hpl" ) or die( mysql_error() );


//Checks if there is a login cookie

// if ( isset( $_COOKIE['ID_my_site'] ) )
// 	//if there is, it logs you in and directes you to the members page

// {
// 	$username = $_COOKIE['ID_my_site'];

// 	$pass = $_COOKIE['Key_my_site'];

// 	$check = mysql_query( "SELECT * FROM users WHERE username = '$username'" )or die( mysql_error() );

// 	while ( $info = mysql_fetch_array( $check ) ) {

// 		if ( $pass != $info['password'] ) {

// 		}

// 		else {

// 			header( "Location: userpanel.php" );



// 		}

// 	}

// }


//if the login form is submitted

if ( $_POST['submit'] == "Login") { // if form has been submitted
	session_start();

	$_SESSION['usernamesave']=$_POST['username'];

	// makes sure they filled it in

	if ( !$_POST['username'] | !$_POST['pass'] ) {

		die( 'You did not fill in a required field.' );

	}

	// checks it against the database



	if ( !get_magic_quotes_gpc() ) {

		//$_POST['email'] = addslashes($_POST['email']);

	}

	$check = mysql_query( "SELECT * FROM users WHERE username = '".$_POST['username']."'" )or die( mysql_error() );



	//Gives error if user dosen't exist

	$check2 = mysql_num_rows( $check );

	if ( $check2 == 0 ) {

		die( 'That user does not exist in our database.' );

	}

	while ( $info = mysql_fetch_array( $check ) ) {/*

 $_POST['pass'] = stripslashes($_POST['pass']);

 	$info['password'] = stripslashes($info['password']);

 	$_POST['pass'] = md5($_POST['pass']);
*/


		//gives error if the password is wrong

		if ( $_POST['pass'] != $info['password'] ) {

			die( 'Incorrect password, please try again.' );

		}
		else {


			// if login is ok then we add a cookie

			$hour = time() + 3600;

			setcookie( ID_my_site, $_POST['username'], $hour );

			setcookie( Key_my_site, $_POST['pass'], $hour );



			//then redirect them to the members area
			if ( $info['admin']==1 ) {

				// session_start();
				$_SESSION["is_admin"] = true;
				header( "Location: adminpanel.php" ); }
			else {
				// session_start();
				$_SESSION["is_admin"] = false;
				header( "Location: userpanel.php" );
			}

		}

	}

}

else if ( $_POST['submit'] == "Change Password" ){

	header( "Location: changepassword.php" );
}

// if they are not logged in

?>
