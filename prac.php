<?php
session_start();  
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    if (empty($_SESSION['sname'])) {
       header("location:feedback.php");
    }

    ?>



<?php 

include('db/dbh.php') ;
$id=$_SESSION['id'];
$sub_id=$_SESSION['sname'];
$sql = "SELECT * FROM subject WHERE sub_id='$sub_id'";
$result = mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$sname=$row['sub_name'];
$s_techer=$row['t_id'];

$sql1 = "SELECT * FROM teacher WHERE t_id='$s_techer'";
$result1 = mysqli_query($conn,$sql1);
$row1=mysqli_fetch_assoc($result1);
$st_name=$row1['t_name'];
$flag=0;



//feedback submission

if (isset($_POST['submit_feed'])) {
$r1= $_POST['A'] + 1;
$r2= $_POST['B'] + 1;
$r3= $_POST['C'] + 1;
$r4= $_POST['D'] + 1;

$r6= $_POST['F'] + 1;
$r7= $_POST['G'] + 1;
$r8= $_POST['H'] + 1;

$r10= $_POST['J'] + 1;

$sql3="INSERT INTO rating(sub_id,t_id,r_1,r_2,r_3,r_4,r_6,r_7,r_8,r_10,flag,id) VALUES('$sub_id','$s_techer','$r1','$r2','$r3','$r4','$r6','$r7','$r8','$r10','$flag','$id')";
        
$result3 = mysqli_query($conn,$sql3);
if(!$result3){
die ("problem".mysqli_error());
}else{
    unset($_SESSION['sname']);
header("location:feedback.php");
}
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Student Portal</title>
    <link rel="stylesheet" type="text/css" 
    href="css/main1.css">
    <link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css">
    
<link rel="icon" href="img/favicon.ico" type="image/gif" sizes="16x16">
</head>
<body>
<div class="wrapper">
    
<div class="welcome">
    Welcome <?php echo $_SESSION['name'];  ?>
</div>
<div class="student">
    
    <h1>Student Portal</h1>

</div>
<div class="sidebar">
    
    <div class="link">

<i class="fa fa-user" aria-hidden="true" style="margin-bottom: -2px;margin-right: 10px;">
    
</i>
<a href="index3.php">
Profile
</a>
</div>

<div class="link">

<i class="fa fa-commenting-o" aria-hidden="true" style="margin-bottom: -2px;margin-right: 9px;"></i>
<a href="feedback.php">
Feedback
</a>
</div>

<div class="link">

<i class="fa fa-sign-out" aria-hidden="true" style="margin-bottom: -2px;margin-right: 9px;"></i>
<a href="logout.php">
Logout
</a>
</div>

</div>
<div class="status">
    
    <span><?php date_default_timezone_set("Asia/Kolkata"); echo(date("Y-m-d")); ?> </span><span style="margin-left: 120px;"> <?php date_default_timezone_set("Asia/Kolkata"); echo(date("h:i A ")); ?></span>

</div>
<div class="content">
    <i class="fa fa-commenting-o" style="font-size:30px;margin-left: 10px;margin-top: 15px; color: #373e4a"></i>
   
    <span>Feedback</span>
     <button type="submit" name="login-btn"  
     class="btn-login1"><a href="feedback.php" style="text-decoration:none;color: white;">Back</a></button><br><br>
    <hr style="color: #eeeeee; ">



        <div class="content2">

        <table>
    <tr>
        <th>Subject: </th>
    <td><?php echo $sname?></td>
    </tr>
    <tr>
        <th>Faculty: </th>
    <td><?php echo $st_name?></td>
    </tr>
</table>

<form action="feedback_now.php" method="POST">
<br>
<span>A. Was the full period utilised always?</span><br><br>
<table border="0" cellspacing="0" cellpadding="10">
<tr>
<div class="radio">
    <td colspan=2 align=left><input type=radio name="A" value="3" checked> Excellent </td>
    <td colspan=2 align=left><input type=radio name="A" value="2"> V. Good </td>
    <td colspan=2 align=left><input type=radio name="A" value="1"> Good </td>
    <td colspan=2 align=left><input type=radio name="A" value="0"> Fair </td>
</div>

</tr>
</table>
<br><br>
<span>B. Was the topic fully covered illustrated with example<br><br></span>
<table border="0" cellspacing="0" cellpadding=10>
<tr>
<div class="radio">
    <td colspan=2 align=left><input type=radio name="B" value="3" checked> Excellent </td>
    <td colspan=2 align=left><input type=radio name="B" value="2"> V. Good </td>
    <td colspan=2 align=left><input type=radio name="B" value="1"> Good </td>
    <td colspan=2 align=left><input type=radio name="B" value="0"> Fair </td>
</div>

</tr>
</table>
<br><br>
<span>C. Commumnication and effective  ness in delivery of lecturer?<br><br></span>
<table border="0" cellspacing="0" cellpadding=10>
<tr>
<div class="radio">
    <td colspan=2 align=left><input type=radio name="C" value="3" checked> Excellent </td>
    <td colspan=2 align=left><input type=radio name="C" value="2"> V. Good </td>
    <td colspan=2 align=left><input type=radio name="C" value="1"> Good </td>
    <td colspan=2 align=left><input type=radio name="C" value="0"> Fair </td>
</div>

</tr>
</table>
<br><br>
<span>D. Were the doubts/query and problems were solved</span><br><br>
<table border="0" cellspacing="0" cellpadding=10>
<tr>
<div class="radio">
    <td colspan=2 align=left><input type=radio name="D" value="3" checked> Excellent </td>
    <td colspan=2 align=left><input type=radio name="D" value="2"> V. Good </td>
    <td colspan=2 align=left><input type=radio name="D" value="1"> Good </td>
    <td colspan=2 align=left><input type=radio name="D" value="0"> Fair </td>
</div>

</tr>
</table>


<br><br>
<span>F. WaS the class discipline maintained<br><br></span>
<table border="0" cellspacing="0" cellpadding=10>
<tr>
<div class="radio">
    <td colspan=2 align=left><input type=radio name="F" value="3" checked> Always </td>
    <td colspan=2 align=left><input type=radio name="F" value="2"> Mostly </td>
    <td colspan=2 align=left><input type=radio name="F" value="1"> Sometimes </td>
    <td colspan=2 align=left><input type=radio name="F" value="0"> Never </td>
</div>

</tr>
</table>
<br><br>
<span>G. makes effective use of variety of available material and resources(projectors,board,sincere)<br><br></span>
<table border="0" cellspacing="0" cellpadding=10>
<tr>
<div class="radio">
    <td colspan=2 align=left><input type=radio name="G" value="3" checked> Always </td>
    <td colspan=2 align=left><input type=radio name="G" value="2"> Mostly </td>
    <td colspan=2 align=left><input type=radio name="G" value="1"> Sometimes </td>
    <td colspan=2 align=left><input type=radio name="G" value="0"> Never </td>
</div>

</tr>
</table>
<br><br>
<span>H. makes clears practicals demonstrations<br><br></span>
<table border="0" cellspacing="0" cellpadding=10>
<tr>
<div class="radio">
    <td colspan=2 align=left><input type=radio name="H" value="3" checked> Always </td>
    <td colspan=2 align=left><input type=radio name="H" value="2"> Mostly </td>
    <td colspan=2 align=left><input type=radio name="H" value="1"> Sometimes </td>
    <td colspan=2 align=left><input type=radio name="H" value="0"> Never </td>
</div>

</tr>
</table>
<br><br>


<span>J. Maintain student interest and attention<br><br></span>
<table border="0" cellspacing="0" cellpadding=10>
<tr>
<div class="radio">
    <td colspan=2 align=left><input type=radio name="J" value="3" checked> Always </td>
    <td colspan=2 align=left><input type=radio name="J" value="2"> Mostly </td>
    <td colspan=2 align=left><input type=radio name="J" value="1"> Sometimes </td>
    <td colspan=2 align=left><input type=radio name="J" value="0"> Never </td>
</div>

</tr>
</table>
<br>
    <div class="button">
    <td colspan=2 align=center><button type="reset" value="RESET" class="btn-login3">Reset</button></td>
    <td colspan=2 align=center><button type="submit" value="SUBMIT" name="submit_feed" class="btn-login3">Submit</button></td>
    </div>
</tr>
</table>
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
<button  class="btn-login" style="margin-left: 20px;"><a href="index.php" style="text-decoration:none;color: white;">Login</a></button>
</div>
</body>
</html>

<?php
}
?>