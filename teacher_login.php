<?php
    session_start();
 include("db/dbh.php");
if (isset($_POST['login-btn'])) {
$t_username = $_POST['t_username'];
$password = $_POST['password'];

$sql = "SELECT * FROM teacher WHERE t_username='$t_username' AND password='$password'";
$result = mysqli_query($conn,$sql);

if (!$row=mysqli_fetch_assoc($result)) {
        $_SESSION['errMsg']="username/password combination incorrect";
        
}else
{   
    $_SESSION['t_name']=$row['t_name'];
    $_SESSION['t_username']=$row['t_username'];
    $_SESSION['t_id']=$row['t_id'];
    $_SESSION['teacher_loggedin'] = true;
        header("location:teacher_home.php");

   
}
  
}


  ?>



<!DOCTYPE html>
<html>
<head>
    <title>teacher Login-Feedback System</title>
    <link rel="stylesheet" type="text/css" href="css/main1.css">
<link rel="icon" href="img/favicon.ico" type="image/gif" sizes="16x16">
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
    
        <form action="teacher_login.php" method="POST">
            <div class="input">
            <input type="text" name="t_username" id="t_username" placeholder="Teacher ID" required class="form-input" autofocus></input>
        
        
            <input type="password" name="password" id="password" placeholder="Password" required class="form-input"></input>
            <br>
        <button type="submit" name="login-btn"  class="btn-login">Login</button>
        <button  class="btn-login" style="margin-left: 20px;"><a href="index.php" style="text-decoration:none;color: white;">Back</a></button><br>
            
            </div>
        


    </form>
    <br><br><br> <br><br><br> <br><br><br> <br><br><br> <br><br><br>
   
    
</div>
</body>
</html>