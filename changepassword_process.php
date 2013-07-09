<?php include("_barebones.php"); ?>
<ul class="breadcrumb">
  <li><a href="login.php">Home</a><span class="divider">/</span></li>
  <li><a href="changepassword.php">Change Password</a><span class="divider">/</span></li>
  <li class="active">Processing...</li>
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

if ( isset($_POST['submit'])) { // if form has been submitted



	// makes sure they filled it in

	if ( !$_POST['username'] | !$_POST['pass'] ) {

		die( 'You did not fill in a required field.' );

	}

	// checks it against the database



	$check = mysql_query( "SELECT * FROM users WHERE username = '".$_POST['username']."'" )or die( mysql_error() );



	//Gives error if user dosen't exist

	$check2 = mysql_num_rows( $check );

	if ( $check2 == 0 ) {

		die( 'That user does not exist in our database.' );

	}
	$info = mysql_fetch_array( $check );
	// while ( $info) {
		// gives error if the password is wrong
		if ( $_POST['pass'] != $info['password'] ) {

			die( 'Incorrect password, please try again.' );

			}
		else {

			if($_POST['passnew'] != $_POST['passnew2'])
			{
				die(' Passwords do not match. Please try again.');
			}
			else 
			{
				$changepwquery = "UPDATE users SET password = '" .$_POST['passnew'] . "' WHERE username= '" . $_POST['username'] . "'";
				$check3 = mysql_query($changepwquery)or die( mysql_error() );
				echo "Password Changed Successfully!"

			}

		}

	// }

}

?>
