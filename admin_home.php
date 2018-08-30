<?php
session_start();  
if (isset($_SESSION['admin_loggedin']) && $_SESSION['admin_loggedin'] == true) {
    ?>


<!DOCTYPE html>
<html>
<head>
	<title>Admin Members</title>
	<link rel="stylesheet" type="text/css" href="css/main1.css">
<link rel="icon" href="img/favicon.ico" type="image/gif" sizes="16x16">
</head>
<body>



<h1>Welcome <?php echo $_SESSION['name'];  ?> </h1>
<h4><a href="admin_logout.php">Logout</a></h4>

<!--<a href="admin_profile.php">Profile</a><br><br>-->
<a href="student.php">Student</a><br><br>
<a href="teacher_sel.php">Teacher</a><br>
<a href="report.php">Generate Teacher Report</a><br>


</body>
</html>
<?php } 
else {
    echo "Please log in first to see this page.";
    echo "<br>"; ?>
    <a href="admin.php"> LOGIN</a>
<?php 
}
?>