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
        
        $dept_id = $_POST['dept_id'];
        $sem_id = $_POST['sem_id'];
        
        $sem_id1 = $_POST['sem_id1'];
        

        $sql4="INSERT INTO subject(sub_name,sem_id,dept_id,t_id) VALUES('$name','$sem_id','$dept_id','$sem_id1')";
        mysqli_query($conn,$sql4);
        
        
        header("location:subject.php");
    }



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
    <span>Add Subjects</span>
    <button type="submit" name="login-btn"  
     class="btn-login1"><a href="student.php" style="text-decoration:none;color: white;">Back</a></button>
     <br><br>
    <hr style="color: #eeeeee; ">




    <div class="content4">
        


        <form action="add_subject.php" method="POST"  name="form" onsubmit="return validate(this);">
<table>
    <tr>
        <td style="font-size: 24px; color: #373e4a;">Select Subject :</td>
        
    </tr>
    <tr>
        <td>Subject Name</td>
        <td><input type="text" name="name" placeholder="Name" class="textinput1" required autofocus></td>
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
        <td style="font-size: 24px; color: #373e4a;">Select Teacher :</td>
        
    </tr>
    
   
        <tr>
            <td>Department: </td>
            <td>
                <select name="dept_id1" id="dept_id" onchange="getid(this.value);" >

        <option value="0">Select Department</option>

        <?php  
$sql3= "SELECT * FROM department";
    $result3 = mysqli_query($conn,$sql3);
        while($row3 = mysqli_fetch_array($result3)){
        ?>
        <option value="<?php echo $row3['dept_id'];?>"><?php echo $row3['dept_name'];?>
        <?php }
    ?>
    </option>
    </select>
            </td>

        </tr>
        <tr>
        <td>Semester: </td>
            <td>
                <select name="sem_id1" id="sem_id" >
                <option value="0">Select Teacher</option>
                <option value=""></option>
        
    
    </select>
            </td>
        </tr>








        

    <tr>
    <br>
    <td></td>
        <td><button class="btn-login6" type="submit" name="register-btn">Add</button></td>

    </tr>

    </table>
    </form>

<script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  ></script>
    <script type="text/javascript">
    
        function getid(val){
            $.ajax({
                type:"POST",
                url:"getdata1.php",
                data: {
                dept_id: $("#dept_id").val()
            },
                success: function(data){
                    $("#sem_id").html(data);
                }
            });
        }
   
    </script>



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




