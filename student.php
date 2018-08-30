<?php
session_start();  
if (isset($_SESSION['admin_loggedin']) && $_SESSION['admin_loggedin'] == true) {
    ?>



<?php  
    
    include("db/dbh.php");
    $dept_id1=$_SESSION['dept_id'];
    $sem_id1=$_SESSION['sem_id'];
    $sql= "SELECT * FROM Student WHERE dept_id='$dept_id1' AND sem_id='$sem_id1'";
    $record=mysqli_query($conn,$sql);
    $rowcount=mysqli_num_rows($record);
    
    //$dept_id=$student['dept_id'];
    //$sql1= "SELECT * FROM department WHERE dept_id='$dept_id'";
    //$record1=mysqli_query($conn,$sql1);
    //$sql2= "SELECT * FROM semester";
    //$record2=mysqli_query($conn,$sql2);



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
    <style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 96%;
    
    border-radius: 10px;
}

td, th {
    border: 1px solid #373e4a;

    text-align: left;
    padding: 8px;
}
th{
    color: #373e4a;
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
    
    <i class="fa fa-graduation-cap" style="font-size:30px;margin-left: 10px;margin-top: 15px; color: #373e4a<"></i>
    <span>Students</span>
    <button type="submit" name="login-btn"  
     class="btn-login1"><a href="student_sel.php" style="text-decoration:none;color: white;">Back</a></button>
     <br><br>
    <hr style="color: #eeeeee; ">


    <?php if($rowcount>0){
    ?>
    <div class="add_button">
    <button class="btn-login4"><a href="add_student.php" style="color: white;"> Add Student</a></button>
    </div>
    
    <div class="content3">
        
        <table border="1" >
<tr>
    <th>Name</th>
    <th>Student ID</th>
    <th>Email</th>
    <th>Mobile No</th>
    <th>Enrolment No</th>
    <th>Gender</th>
    <th>Department</th>
    <th>Semester</th>
    <th>Status</th>
    <th>Action</th>
</tr>

<?php  
    while ($student=mysqli_fetch_array($record)) {
        ?>
        <tr>
        <td><?php echo $student['name'] ?></td>
        <td><?php echo $student['stud_id']?></td>
        <td><?php echo $student['email']?></td>
        <td><?php echo $student['mob']?></td>
        <td><?php echo $student['enr_no']?></td>
        <td><?php echo $student['gender']?></td>
<?php

        $dept_id=$student['dept_id'];
    $sql1= "SELECT * FROM department WHERE dept_id='$dept_id'";
    $record1=mysqli_query($conn,$sql1);
        while ($student1=mysqli_fetch_assoc($record1)) {
            ?>
                
                <td><?php echo $student1['dept_name']?></td>
            <?php } ?>
            <?php
            $sem_id=$student['sem_id'];
    $sql2= "SELECT * FROM semester WHERE sem_id='$sem_id'";
    $record2=mysqli_query($conn,$sql2);
        while ($student2=mysqli_fetch_assoc($record2)) {
            ?>
                
                <td><?php echo $student2['sem_name']?></td>
            <?php } ?>

            <?php
            $s_id=$student['s_id'];
    $sql3= "SELECT * FROM status WHERE s_id='$s_id'";
    $record3=mysqli_query($conn,$sql3);
        while ($student3=mysqli_fetch_assoc($record3)) {
            ?>
                
                <td><?php echo $student3['s_name']?></td>
            <?php } ?>
        <td >
    <form action='delete.php?name="<?php echo $student['stud_id']; ?>"' method="POST">
        <input type="hidden" name="stud_id" value="<?php echo $student['stud_id']; ?>">
        <button class="btn-login5" type="submit" name="submit" >Delete </button>
    </form>

    <?php  
    echo "<button class='btn-login5' style='margin-top:10px;''><a style='color:#373e4a; ' href='edit.php?id=".$student['id']."'>Update</a></button>";
    ?>
    
</td>
        

            </tr>

            
        
    <?php } ?>
    
    

    



 </table>
<?php  }
else{
    ?>
    <center style="margin-top: 70px;">
    <br><br><br>
        <i class="fa fa-exclamation-triangle" style="font-size:70px; color: red;" aria-hidden="true"></i>
        <br>
        <h1 style="color:#373e4a; font-family: verdana; ">Data Not Found</h1>
    </center> <?php }?>
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


