<?php  
	session_start();
	include('db/dbh.php') ;

	$stud_id=$_SESSION['stud_id'];

    $sql = "SELECT * FROM student WHERE stud_id='$stud_id'";
    $result = mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $dept_id=$row['dept_id'];
    $sem_id=$row['sem_id'];
    $id=$row['id'];

    	$sql1 = "SELECT * FROM subject WHERE dept_id='$dept_id' AND sem_id='$sem_id'";
    $result1= mysqli_query($conn,$sql1);
    $rowcount=mysqli_num_rows($result1);

    $sql2 = "SELECT * FROM rating WHERE id='$id'";
    $result2= mysqli_query($conn,$sql2);
    $rowcount1=mysqli_num_rows($result2);

    if ($rowcount1==$rowcount) {
    	session_destroy();
	unset($_SESSION['name'],$_SESSION['stud_id']);
    	?>

    	<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/main1.css">
<link rel="icon" href="img/favicon.ico" type="image/gif" sizes="16x16">
</head>
<body>
<div class="error">
<h1>Thanks For Feedback</h1>

<button  class="btn-login" style="margin-left: 20px;"><a href="index.php" style="text-decoration:none;color: white;">Sign in</a></button>
</div>
</body>
</html>

    	<?php
    }
    if($rowcount1!=$rowcount){
	session_destroy();
	unset($_SESSION['name'],$_SESSION['stud_id']);
	header("location:index.php");
	}
	
	
?>