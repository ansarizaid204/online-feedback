<?php 
include("db/dbh.php");
$sub_id=$_GET['sub_id'];
$sql="SELECT * FROM subject WHERE sub_id='$sub_id'";
$result=mysqli_query($conn,$sql);
$record=mysqli_fetch_array($result);

if (isset($_POST['submit'])) {
	$name=$_POST['name'];
	$sem_id=$_POST['sem_id'];
	$dept_id=$_POST['dept_id'];
	$t_id=$_POST['t_id'];

	$sql1="UPDATE subject SET sub_name='$name', sem_id='$sem_id', dept_id='$dept_id', t_id='$t_id' WHERE sub_id='$sub_id'";
	$result1=mysqli_query($conn,$sql1);
	if (!$result) {
		echo "data not updated";
	}
	else {
		header("location:subject.php");
	}
}

?>



<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form method="POST">
	<label>name</label><br>
	<input type="text" name="name" value="<?php echo $record['sub_name']; ?>" ><br>

	<label>SEM ID</label><br>
	<input type="text" name="sem_id"><br>

	<label>Department ID</label><br>
	<input type="text" name="dept_id"><br>

	<label>TEACHER ID</label><br>
	<input type="text" name="t_id"><br>

	<input type="submit" name="submit">
</form>


</body>
</html>