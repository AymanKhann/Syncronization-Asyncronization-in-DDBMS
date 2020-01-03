<style type="text/css">
td{
	padding: 10px;
}
	
</style>
<?php
include("connection.php");
error_reporting(0);
$query = "SELECT * FROM STUDENT";
$data = mysqli_query($conn,$query);
$total = mysqli_num_rows($data);
// database coloum names are provided above
//echo $total; // total number of records
if($total != 0)
{	//echo "Table contains data";
	// in next line, closing php tag here as we cannot use html tags inside phpcode
	?> 
	<table>
		<tr>
			<th>Roll No	</th>
			<th>Name	</th>
			<th>Class	</th>
			<th colspan="2">Options</th>
		</tr>
	<?php
	while ($result = mysqli_fetch_assoc($data)) {
		/*	echo $result['rollno']." ".$result['name']." ".$result['class']."<br/>";	*/
	// for formatting purpose we drag the closing table tag to last
	echo "<tr>
			<td>". $result['rollno'] ."</td>
			<td>". $result['name'] ."	</td>
			<td>". $result['class'] ."</td>
			<td><a href='update.php?rn=$result[rollno]&sn=$result[name]&cl=$result[class]'>Edit </a></td>
			<td><a href='delete.php?rn=$result[rollno] onclick= 'return checkdelete()'>Delete</a></td>
		</tr>";								}
}else{	//echo" No data found in table"; 
	}
?>
</table>
<script type="text/javascript">
	function checkdelete()
	{
		return confirm('Really! you want to delete');
	}
</script>