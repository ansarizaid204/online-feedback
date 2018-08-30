<?php
session_start();  
if (isset($_SESSION['admin_loggedin']) && $_SESSION['admin_loggedin'] == true) {
    ?>




<?php  

    include('db/dbh.php') ;
    $sql="SELECT id FROM student";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_num_rows($result);

    $sql2="SELECT t_id FROM teacher";
    $result2=mysqli_query($conn,$sql2);
    $row2=mysqli_num_rows($result2);

    $sql3="SELECT r_id FROM rating";
    $result3=mysqli_query($conn,$sql3);
    $row3=mysqli_num_rows($result3);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Portal</title>
    <link rel="stylesheet" type="text/css" 
    href="css/main1.css">
    <link rel="stylesheet" type="text/css" 
    href="css/style.css">
    <link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css">
    <script type="text/JavaScript">  
function validate() 
{

   if( document.form.dept_id.value == "0" )
   {
     alert( "Please select department!" );
     return false;
   }
   if( document.form.sem_id.value == "0" )
   {
     alert( "Please select Semester!" );
     return false;
   }
   
}

</script>
    <style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 700px;
    height:300px;
    margin:30px auto;
    border-radius: 10px;
}

td, th {
    

    text-align: left;
    padding: 8px;
    
}


}
</style>
<link rel="icon" href="img/favicon.ico" type="image/gif" sizes="16x16">
</head>
<body>
<div class="wrapper">
    
<div class="welcome">
    Welcome Admin
</div>
<div class="student">
    
    <h1>Admin Portal</h1>

</div>
<div class="sidebar">
    
     <div class="link">

<i class="fa fa-graduation-cap" aria-hidden="true" style="margin-bottom: -2px;margin-right: 10px;">
    
</i>
<a href="student_sel.php">
Students
</a>
</div>

<div class="link">

<i class="fa fa-users" aria-hidden="true" style="margin-bottom: -2px;margin-right: 9px;"></i>
<a href="teacher_sel.php">
Teachers
</a>
</div>

<div class="link">

<i class="fa fa-id-card-o" aria-hidden="true" style="margin-bottom: -2px;margin-right: 9px;"></i>
<a href="report.php">
Generate Report
</a>
</div>

<div class="link">

<i class="fa fa-sign-out" aria-hidden="true" style="margin-bottom: -2px;margin-right: 9px;"></i>
<a href="admin_logout.php">
Logout
</a>
</div>

</div>
<div class="status">
    
    <span><?php date_default_timezone_set("Asia/Kolkata"); echo(date("Y-m-d")); ?> </span><span style="margin-left: 120px;"> <?php date_default_timezone_set("Asia/Kolkata"); echo(date("h:i A ")); ?></span>

</div>
<div class="content">
    
    <i class="fa fa-tachometer" style="font-size:30px;margin-left: 10px;margin-top: 15px; color: #373e4a<"></i>
    <span>Dashboard</span>
    
     <br><br>
    <hr style="color: #eeeee; ">


    <div class="calender">
    <img src="db.jpeg" height="550px"
    width="700px">
    </div>
    


    <div class="box1">
    <div class="dash_no">
       <span style="font-size: 40px; color: white;"><?php echo $row; ?></span>
    </div>
    <div class="statement">
        <span style="font-size: 22px; color: white;">Students</span>
        <br>
        <span style="font-size: 11px; color: white;">Total students</span>
    </div>
        <div class="icon" style="left: 220px;">

         <i class="fa fa-graduation-cap" style="font-size: 100px; color: rgba(0, 0, 0, 0.1);"></i>
            
        </div>
    </div>
    <div class="box2">

        <div class="dash_no">
       <span style="font-size: 40px; color: white;"><?php echo $row2; ?></span>
    </div>

    <div class="statement">
        <span style="font-size: 22px; color: white;">Teachers</span>
        <br>
        <span style="font-size: 11px; color: white;">Total Teacher</span>
    </div>
         <div class="icon" >
            <i class="fa fa-users" style="font-size: 100px; color: rgba(0, 0, 0, 0.1);"></i>
         </div>
    </div>
    <div class="box3">


<div class="dash_no">
       <span style="font-size: 40px; color: white;"><?php echo $row3; ?></span>
    </div>

    <div class="statement">




        <span style="font-size: 22px; color: white;">Feedback</span>
        <br>
        <span style="font-size: 11px; color: white;">Total Given</span>
    </div>
         <div class="icon" style="left: 230px;">
             <i class="fa fa-bar-chart" style="font-size: 100px; color: rgba(0, 0, 0, 0.1);"></i>
         </div>
    </div>

    

    
    </div>

    


<div class="footer">
    
<hr style="color: #eeeeee; "><br>
    <span>© 2017 Computer Department. Developed by CO6G-19 Group</span>

</div>
</div>
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
<button  class="btn-login" style="margin-left: 20px;"><a href="admin.php" style="text-decoration:none;color: white;">Login</a></button>
</div>
</body>
</html>

<?php
}
?>


