<?php
	session_start();
 include("db/dbh.php");
if (isset($_POST['login-btn'])) {
$stud_id = $_POST['stud_id'];
$password = $_POST['password'];


$sql = "SELECT * FROM student WHERE stud_id='$stud_id' AND password='$password'";
$result = mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$status=$row['s_id'];
if (!$row) {
    	$_SESSION['errMsg']="Username/password combination incorrect";
		
}else
{
	
	if ($status==0) {
		$_SESSION['errMsg']="You Are Not Regular Student";
	}
	else{
    $_SESSION['name']=$row['name'];
    $_SESSION['stud_id']=$row['stud_id'];
    $_SESSION['loggedin'] = true;
		header("location:index3.php");
	}
}
 } 



  ?>



<!DOCTYPE html>
<html>
<head>
	<title>Login-Feedback System</title>
		<link rel="stylesheet" type="text/css" href="css/main1.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="icon" href="img/favicon.ico" type="image/gif" sizes="16x16">
<link rel="icon" href="img/favicon.ico" type="image/gif" sizes="16x16">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="header">
	<img src="img/logo.png">
	<h2>FeedBack Management System</h2>
</div>

<?php  
	if (isset($_SESSION['errMsg'])) {
		
            echo "<div class='errMsg'>
<div class='invalid'>Invalid Login</div>
<div class='msg' style='padding-top: 5px;'>".$_SESSION['errMsg']."</div></div>";
        
        unset($_SESSION['errMsg']);
	}
?>



<div class="login">
	
		<form action="index.php" method="POST">
        	<div class="input">
            <input type="text" name="stud_id" id="username" placeholder="Student ID" required class="form-input" autofocus onkeypress="return isNumber(event)" ></input>
        
        
            <input type="password" name="password" id="password" placeholder="Password" required class="form-input"></input>
            <br>
        <button type="submit" name="login-btn"  class="btn-login">Login</button>
        <button  class="btn-login" style="margin-left: 20px;"><a href="signup.php" style="text-decoration:none;color: white;">Sign Up</a></button><br>
        	
            </div>
        


    </form>
    <br><br><br> <br><br><br> <br><br><br> <br><br><br> <br><br><br>
    <a href="admin.php">Admin</a>
    <a href="teacher_login.php" style="margin-left: 30px;">Teacher</a>
    
    
</div>
<script type="application/javascript">

  function isNumber(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }

</script>







<!--moel box-->



</body>
</html>