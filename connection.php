<?php

$dbname = "connection";


//LOCAL
$servername = "localhost";
$username = "root";
$password = "";


//REMOTE USER1 ACCOUNT
$servername1 = "192.168.43.66";
$username1 = "aymankhan";
$password1 = "aymankhan";


//REMOTE USER2 ACCOUNT
$servername2 = "192.168.43.181";
$username2 = "muneebafaheem";
$password2 = "muneebafaheem";

// create connection

$conn=mysqli_connect($servername,$username,$password,$dbname );
$conn1 = mysqli_connect($servername1,$username1,$password1,$dbname );
$conn2 = mysqli_connect($servername2,$username2,$password2,$dbname );

if ($conn) {
	# code...
	echo "Connecton Open."; 
	
}


if ($conn1) {
	# code...
    echo "\nConnecton Open Remotely with user 1."; 
	
}
if ($conn2) {
	# code...
    echo "\nConnecton Open Remotely with user 2."; 
}
else
		echo "\nConnection failed";
	// or use the die function to view the reason

	 
?>