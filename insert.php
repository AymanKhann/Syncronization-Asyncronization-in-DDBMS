<?php
include("connection.php");
error_reporting(0);
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="" method="GET">
	
	Roll No <input type="text" name="rollno" value=""><br><br>
	Name    <input type="text" name="studentname" value=""><br><br>
	Class   <input type="text" name="class" value=""><br><br>
    <input type="submit" name="sync" value="Sync to all Nodes">
	<input type="submit" name="submit" value="Submit Locally">
	<input type="submit" name="async" value="Async to Node1 and Node2">
</form>


<?php

if($_GET['sync'])
{
// getting data through global array
	$rn=$_GET['rollno'];
	$sn=$_GET['studentname'];
	$cl=$_GET['class'];

//echo "$rn";  //displaying data on page

//check that form fields are not empty
if($rn !="" && $sn !="" && $cl !="")
	{
// Now inserting data into database
$query = "INSERT INTO STUDENT VALUES('$rn','$sn','$cl')";
$data = mysqli_query($conn, $query);
$data1 = mysqli_query($conn1, $query);
$data2 = mysqli_query($conn2, $query);

if($data)
		{
		echo "Data inserted locally successfully";
		}
if($data1)
        {
		echo "\n Data inserted remotely (user 1) successfully";
		}
if($data1)
        {
		echo "\n Data inserted remotely (user 2) successfully";
		}
	}
else
{
	echo "All fields are required";
}
}


if($_GET['submit'])
{
	
// getting data through global array
	$rn=$_GET['rollno'];
	$sn=$_GET['studentname'];
	$cl=$_GET['class'];

//echo "$rn";  //displaying data on page

//check that form fields are not empty
if($rn !="" && $sn !="" && $cl !="")
//data insertion in original table and temporary table locally
	{
// Now inserting data into database
$query = "INSERT INTO STUDENT VALUES('$rn','$sn','$cl')";
$data = mysqli_query($conn, $query);
$query_temp = "INSERT INTO temp VALUES('$rn','$sn','$cl')";
$data_temp=mysqli_query($conn,$query_temp);

if($data && $data_temp)
		{
		echo "Data inserted successfully";
		}
	}
	
else
{
	echo "All fields are required";
}
}
    
    
    
if($_GET['async']){
        
    $dbname = "connection";
    
    //Account1
    $servername1 = "192.168.43.66";
    $username1 = "aymankhan";
    $password1 = "aymankhan";

    
    //Account2
    $servername2 = "192.168.43.181";
    $username2 = "muneebafaheem";
    $password2 = "muneebafaheem";

    $conn1 = mysqli_connect($servername1,$username1,$password1,$dbname );
    
    echo "\nConnection Established with Node1";
    
    $conn2 = mysqli_connect($servername2,$username2,$password2,$dbname );
 
    echo "\nConnection Established with Node2";

	$query_temp="SELECT * FROM temp";
    $data_temp=mysqli_query($conn,$query_temp);
    

while($row = mysqli_fetch_array($data_temp)){

    $rn=$row['rollno'];
	$sn=$row['studentname'];
	$cl=$row['class'];
  
    
   $query = "INSERT INTO STUDENT (rollno, studentname, class)
                VALUES('$rn','$sn','$cl')";
    
   $data1 = mysqli_query($conn1, $query);
   $data2 = mysqli_query($conn2, $query);
   if($data1)
        {
		echo "\n Data inserted remotely (user 1) successfully";
		}
    if($data2)
        {
		echo "\n Data inserted remotely (user 2) successfully";
		}
}
$query_delete = "TRUNCATE Table temp";
$emptytemp = mysqli_query($conn, $query_delete);

}

    
    

?>
</body>
</html>