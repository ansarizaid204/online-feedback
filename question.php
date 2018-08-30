<?php
session_start();  
if (isset($_SESSION['admin_loggedin']) && $_SESSION['admin_loggedin'] == true) {
    ?>



<?php  
    
    include("db/dbh.php");
    
    $sql="SELECT * FROM question ";
    $record=mysqli_query($conn,$sql);
    $rowcount=mysqli_num_rows($record);

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
    
    <i class="fa fa-question-circle-o" style="font-size:30px;margin-left: 10px;margin-top: 15px; color: #373e4a<"></i>
    <span>Questions</span>
    
     <br><br>
    <hr style="color: #eeeeee; ">

    
    
    <div class="add_button">
    <button class="btn-login4"><a href="add_question.php" style="color: white;"> Add Question</a></button>
    </div>
    <?php if($rowcount>0){
    ?>
    <div class="content3">
        <center>
        <table border="1" style="width: 900px;" >
<tr>
    <th >Question</th>
    <th style="width: 100px;">Category</th>
    <th style="width: 100px;">Action</th>
</tr>

<?php  
    while ($ques=mysqli_fetch_assoc($record)) {
        ?>
        <tr>
        <td><?php echo $ques['q_name'] ?></td>
        
        	<?php 
        		$c_id=$ques['c_id'];
        		$query="SELECT * FROM category WHERE c_id='$c_id'";
        		$record2=mysqli_query($conn,$query);
        		while ($row3=mysqli_fetch_array($record2)) {
        			?>
        		<td><?php echo $row3['c_name']; ?></td>	
        		<?php }
        	?>
        
        <td >
    <form action='delete.php?q_id="<?php echo $ques['q_id']; ?>"' method="POST">
        <input type="hidden" name="q_id" value="<?php echo $ques['q_id']; ?>">
        <button class="btn-login5" type="submit" name="submit" >Delete </button>
    </form>

    <?php  
    echo "<button class='btn-login5' style='margin-top:10px;''><a style='color:#373e4a; ' href='q_edit.php?q_id=".$ques['q_id']."'>Update</a></button>";
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
        <h1 style="color:#373e4a; font-family: verdana; ">Questions Not Found</h1>
    </center> 
 </center>
 <?php }?>
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


