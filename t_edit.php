<?php
session_start();  
if (isset($_SESSION['admin_loggedin']) && $_SESSION['admin_loggedin'] == true) {
    ?>



<script type="application/javascript">

  function isNumber(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }

</script>



<?php 
    include("db/dbh.php");
    $sql= "SELECT * FROM department";
    $result = mysqli_query($conn,$sql);

    $sql1= "SELECT * FROM semester";
    $result1 = mysqli_query($conn,$sql1);
 ?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Portal</title>
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
   if( document.form.shift.value == "0" )
   {
     alert( "Please select shift!" );
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
    
    <i class="fa fa-pencil" style="font-size:30px;margin-left: 10px;margin-top: 15px; color: #373e4a<"></i>
    <span>Update Teacher</span>
    <button type="submit" name="login-btn"  
     class="btn-login1"><a href="teacher.php" style="text-decoration:none;color: white;">Back</a></button>
     <br><br>
    <hr style="color: #eeeeee; ">




    <div class="content4">
        
        
        <?php

if(isset($_GET['t_id']))
{
$id=$_GET['t_id'];

if(isset($_POST['submit1']))
{
        $name = $_POST['t_name'];
        $dept_id = $_POST['dept_id'];
        $shift = $_POST['shift'];
$query3=mysqli_query($conn,"UPDATE teacher SET t_name='$name', 
    dept_id='$dept_id', shift='$shift' WHERE t_id='$id'");
if($query3)
{
header("location:teacher.php");
}
}
$query1=mysqli_query($conn,"SELECT * FROM teacher WHERE t_id='$id'");
$query2=mysqli_fetch_array($query1);
?>

<form  method="POST" name="form" onsubmit="return validate(this);">
<table>
    <tr>
        <td>Name</td>
        <td><input type="text" name="t_name" placeholder="Name" class="textinput1" required autofocus value="<?php echo $query2['t_name']; ?>" ></td>
    </tr>
    
        <tr>
            <td>Department: </td>
            <td>
                <select name="dept_id" >

        <option value="0">select Department</option>
        <?php  while($row = mysqli_fetch_array($result)){
        ?>
        <option value="<?php echo $row['dept_id'];?>"><?php echo $row['dept_name'];?>
        <?php }
    ?>
    </option>
    </select>
            </td>

        </tr>
        
        <tr>
            <td>Shift: </td>
            <td>
                <select name="shift">
                <option value="0">select Shift</option>
                <option value="1">1</option> 
                <option value="2">2</option></select>
            </td>
        </tr>
    <tr>
        <td><button class="btn-login6" type="submit" name="submit1">Update</button></td>
    </tr>

    </table>
    </form>

<?php
}
?>


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

