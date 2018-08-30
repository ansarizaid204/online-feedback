<?php
session_start();  
if (isset($_SESSION['admin_loggedin']) && $_SESSION['admin_loggedin'] == true) {
    ?>




<?php  

    include('db/dbh.php') ;
    $sql= "SELECT * FROM department";
    $result = mysqli_query($conn,$sql);

    $sql1= "SELECT * FROM semester";
    $result1 = mysqli_query($conn,$sql1);

    if(isset($_POST['s_select-btn'])){
        $_SESSION['dept_id1']=$_POST['dept_id'];
        $_SESSION['sem_id1']=$_POST['sem_id'];        
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
    
    <i class="fa fa-users" style="font-size:30px;margin-left: 10px;margin-top: 15px; color: #373e4a<"></i>
    <span>Subjects</span>
    
     <br><br>
    <hr style="color: #eeeeee; ">

    <div class="content5" >
        

        <form action="subject_sel.php" method="POST" name="form" onsubmit="return validate(this);" >
    
    <br>
            
                <select name="dept_id" >
                    <option value="0">Select Department</option>
    
        <?php  while($row = mysqli_fetch_array($result)){
        ?>
        <option value="<?php echo $row['dept_id'];?>"><?php echo $row['dept_name'];?>
        <?php }
    ?>
    </option>
    </select>
    <br>
    <select name="sem_id"  style="margin-top: 30px;">
                    <option value="0">Select Semester</option>
    
        <?php  while($row1 = mysqli_fetch_array($result1)){
        ?>
        <option value="<?php echo $row1['sem_id'];?>"><?php echo $row1['sem_name'];?>
        <?php }
    ?>
    </option>
    </select>

            
            <br>
        
                
            <button type="submit" name="s_select-btn" class="btn-login2" id="btn_1">view</button>
    
</form>


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


