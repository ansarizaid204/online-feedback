<?php
session_start();  
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    ?>
 



<!DOCTYPE html>
<html>
<head>
	<title>Members</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="icon" href="img/favicon.ico" type="image/gif" sizes="16x16">
</head>
<body>



<h1>Welcome <?php echo $_SESSION['name'];  ?> </h1>
<h4><a href="./logout.php" name="stud_logout">Logout</a></h4>
<h2><a href="profile.php">Profile</a></h2>
<h2><a href="feedback.php">feedback</a></h2>

</body>
</html>

<?php } 
else {
    echo "Please log in first to see this page.";
    echo "<br>"; ?>
    <a href="index.php"> LOGIN</a>
<?php 
}
?>