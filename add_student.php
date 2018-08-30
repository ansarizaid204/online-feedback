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
    
    include('db/dbh.php') ;
    $sql= "SELECT * FROM department";
    $result = mysqli_query($conn,$sql);

    $sql1= "SELECT * FROM semester";
    $result1 = mysqli_query($conn,$sql1);

    if (isset($_POST['register-btn'])) {
        $name = $_POST['name'];
        $stud_id = $_POST['stud_id'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $mob = $_POST['mob'];
        $enr_no = $_POST['enr_no'];
        $gender = $_POST['gender'];
        $dept_id = $_POST['dept_id'];
        $sem_id = $_POST['sem_id'];
        $shift = $_POST['shift'];

        $sql="INSERT INTO student(name,stud_id,password,email,mob,enr_no,gender,dept_id,sem_id,shift) VALUES('$name','$stud_id','$password','$email','$mob','$enr_no','$gender','$dept_id','$sem_id','$shift')";
        mysqli_query($conn,$sql);
        
        
        header("location:student.php");
    }



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
if( document.form.sem_id.value == "0" )
   {
     alert( "Please select Semester!" );
     return false;

   }
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
    
    <i class="fa fa-user-plus" style="font-size:30px;margin-left: 10px;margin-top: 15px; color: #373e4a<"></i>
    <span>Add Students</span>
    <button type="submit" name="login-btn"  
     class="btn-login1"><a href="student.php" style="text-decoration:none;color: white;">Back</a></button>
     <br><br>
    <hr style="color: #eeeeee; ">




    <div class="content4">
        


        <form action="add_student.php" method="POST"  name="form" onsubmit="return validate(this);">
<table>
    <tr>
        <td>Name</td>
        <td><input type="text" name="name" placeholder="Name" class="textinput1" required autofocus></td>
    </tr>
    <tr>
        <td>Student ID</td>
        <td><input type="text" name="stud_id" placeholder="Student ID" class="textinput1" onkeypress="return isNumber(event)"></td>
    </tr>
    <tr>
        <td>Password</td>
        <td><input type="password" name="password" placeholder="password" class="textinput1" required></td>
    </tr>
    <tr>
        <td>EMail</td>
        <td><input type="email" name="email" placeholder="Email" class="textinput1"></td>
    </tr>
    <tr>
        <td>Mobile No</td>
        <td><input type="text" minlength="10" maxlength="10" name="mob" placeholder="Mobile No" class="textinput1" onkeypress="return isNumber(event)"></td>
    </tr>
    <tr>
        <td>Enrol No</td>
        <td><input type="text" minlength="10" maxlength="10" name="enr_no" placeholder="Enrolment No" class="textinput1" required onkeypress="return isNumber(event)"></td>
    </tr>
    <tr>
        <td>
            Gender
        </td>
        <td>
        <input type="radio" name="gender" value="male" checked> Male
        <input type="radio" name="gender" value="female"> Female
        </td>
        </tr>
        <tr>
            <td>Department: </td>
            <td>
                <select name="dept_id" >

        <option value="0">Select Department</option>
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
        <td>Semester: </td>
            <td>
                <select name="sem_id" >
                <option value="0">Select Semester</option>
    
        <?php  while($row1 = mysqli_fetch_array($result1)){
        ?>
        <option value="<?php echo $row1['sem_id'];?>"><?php echo $row1['sem_name'];?>
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
                <option value="0">Select Shift</option>
                <option value="1">1</option> 
                <option value="2">2</option></select>
            </td>
        </tr>
    <tr>
    <br>
        <td><button class="btn-login6" type="submit" name="register-btn">Add</button></td>

    </tr>

    </table>
    </form>





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




