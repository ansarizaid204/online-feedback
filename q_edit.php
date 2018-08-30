<?php
session_start();  
if (isset($_SESSION['admin_loggedin']) && $_SESSION['admin_loggedin'] == true) {

    if (empty($_GET['q_id'])) {
        header("location:question.php");
    }
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
    $sql= "SELECT * FROM category";
    $result = mysqli_query($conn,$sql);
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
     alert( "Please select Department!" );
     return false;

   }
   if( document.form.sem_id.value == "0" )
   {
     alert( "Please select Semester!" );
     return false;
   }
   if( document.form.shift.value == "0" )
   {
     alert( "Please select shift!" );
     return false;
   }
   if( document.form.status.value == "2" )
   {
     alert( "Please select Status!" );
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
    <span>Update Question</span>
    <button type="submit" name="login-btn"  
     class="btn-login1"><a href="question.php" style="text-decoration:none;color: white;">Back</a></button>
     <br><br>
    <hr style="color: #eeeeee; ">




    <div class="content4">
        
        <?php

if(isset($_GET['q_id']))
{
$q_id=$_GET['q_id'];
if(isset($_POST['submit']))
{
        $q_name = $_POST['q_name'];
        $c_id = $_POST['c_id'];
$query3=mysqli_query($conn,"UPDATE question SET q_name='$q_name', c_id='$c_id' WHERE q_id='$q_id'");
if($query3)
{
header("location:question.php");
}
}
$query1=mysqli_query($conn,"SELECT * FROM question WHERE q_id='$q_id'");
$query2=mysqli_fetch_array($query1);
?>

        <form  method="POST" name="form" onsubmit="return validate(this);">
<table>
    <tr>
        <td>Question</td>
        <td><input type="text" name="q_name" placeholder="Write Question" class="textinput1" required autofocus size="35" value="<?php echo $query2['q_name'];  ?>"></td>
    </tr>
    
        <tr>
            <td>Category: </td>
            <td>
                <select name="c_id" >

        <option value="0">select Category</option>
        <?php  while($row = mysqli_fetch_array($result)){
        ?>
        <option value="<?php echo $row['c_id'];?>"><?php echo $row['c_name'];?>
        <?php }
    ?>
    </option>
    </select>
            </td>

        </tr>
        
        
    <tr>
        
        <td><button class="btn-login6" type="submit" name="submit">Update</button></td>
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



