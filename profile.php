<?php
session_start();  
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    ?>


<?php  
	
	
	include('db/dbh.php') ;
	$stud_id=$_SESSION['stud_id'];
	$sql= "SELECT * FROM Student WHERE stud_id='$stud_id'";
	$record=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($record);
	$name = $row['name'];
		$stud_id1 = $row['stud_id'];
		
		$email = $row['email'];
		$mob = $row['mob'];
		$enr_no = $row['enr_no'];
		$gender = $row['gender'];
		$dept_id=$row['dept_id'];
	$sql1= "SELECT * FROM department WHERE dept_id='$dept_id'";
	$record1=mysqli_query($conn,$sql1);
	$row1=mysqli_fetch_assoc($record1);
		$dept_name=$row1['dept_name'];

	$sem_id=$row['sem_id'];
	$sql2= "SELECT * FROM semester WHERE sem_id='$sem_id'";
	$record2=mysqli_query($conn,$sql2);
	$row2=mysqli_fetch_assoc($record2);
	$sem_name=$row2['sem_name'];
	$shift=$row['shift'];

	



?>




<!DOCTYPE html>
<html>
<head>
	<title>Student data</title>
	

	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}


}
</style>
<link rel="icon" href="img/favicon.ico" type="image/gif" sizes="16x16">
</head>
<body>

<table  >
<tr>
	<th>Name: </th>
	<td><?php echo $name;  ?></td>
	<th>Mobile No:</th>
	<td><?php echo $mob;  ?></td>
</tr>

<tr>
	<th>Student ID:</th>
	<td><?php echo $stud_id1;  ?></td>
	<th>Department: </th>
	<td><?php echo $dept_name;  ?></td>
</tr>

<tr>
	<th>Enrol No:</th>
	<td><?php echo $enr_no;  ?></td>
	<th>Semester: </th>
	<td><?php echo $sem_name;  ?></td>
</tr>

<tr>
	<th>E-Mail:</th>
	<td><?php echo $email;  ?></td>
	<th>Shift: </th>
	<td><?php echo $shift;  ?></td>
</tr>






 </table><br>
 <a href="home.php" style="font-size: 30px;">back</a>
</body>
</html>

<?php } 
else {?>

    <!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/main1.css">
<link rel="icon" href="img/favicon.ico" type="image/gif" sizes="16x16">
</head>
<body>
<div class="error">
<h1>ERROR 404!</h1>
Please Login For Proceed<br><br>
<button  class="btn-login" style="margin-left: 20px;"><a href="index.php" style="text-decoration:none;color: white;">Login</a></button>
</div>
</body>
</html>

<?php
}
?>