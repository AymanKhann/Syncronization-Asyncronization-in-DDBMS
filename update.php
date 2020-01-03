
<?php
include("connection.php");
error_reporting(0);
$_GET['rn'];
$_GET['sn'];
$_GET['cl'];
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="" method="GET">
	
	Roll No <input type="text" name="rollno" value="<?php echo $_GET['rn'];?>"><br><br>
	Name <input type="text" name="studentname" value="<?php echo $_GET['sn'];?>"><br><br>
	Class <input type="text" name="class" value="<?php echo $_GET['cl'];?>"><br><br>
	<input type="submit" name="submit" value="Update">
</form>


<?php
if($_GET['submit'])
{
	//echo "Button Pressed";
	$rollno= $_GET['rollno'];
	$name= $_GET['studentname'];
	$class= $_GET['class'];

	$query = "UPDATE STUDENT SET NAME='$name',CLASS='$class' WHERE ROLLNO='$rollno'";
	$data =mysqli_query($conn,$query);
	if ($data) {
		echo "<font color='green'>Record Updated Successfully. <a href='display.php'> View Updated Records</a>";
		# code...
	}
	else
	{
		echo "<font color='red'>Sorry! record updation failed.<a href='display.php'> View Records</a>";
	}
}
else
	echo "<font color='blue'>Press Update button to save the changes";

?>
</body>
</html>