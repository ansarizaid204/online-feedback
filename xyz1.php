<?php
session_start();  
if (isset($_SESSION['admin_loggedin']) && $_SESSION['admin_loggedin'] == true) {
    if (empty($_SESSION['sub_id'])) {
        header("location:report.php");
    }
    ?>




<?php  

include('db/dbh.php') ;
$sub_id=$_SESSION['sub_id'];
//$sem_id=$_POST['sem_id'];



$sql3="SELECT * FROM rating WHERE sub_id='$sub_id'";
$result3 = mysqli_query($conn,$sql3);
$rowcount=mysqli_num_rows($result3);
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
    <script type="text/javascript">
    function printContent(el){
    var restorepage = document.body.innerHTML;
    var printcontent = document.getElementById(el).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;
}
</script>
    <style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 80%;
    background-color: white;
    margin-top: 10px;
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
    
    <i class="fa fa-id-card-o" style="font-size:30px;margin-left: 10px;margin-top: 15px; color: #373e4a<"></i>
    <span>Report </span>
    <button type="submit" name="login-btn"  
     class="btn-login1" onclick="printContent('content3')" style="left: 870px;">Print</button>
    <button type="submit" name="login-btn"  
     class="btn-login1"><a href="report.php" style="text-decoration:none;color: white;">Back</a></button>
     <br><br>
    <hr style="color: #eeeeee; ">

    
    <div class="content3" id="content3">
        
      <?php 

      if ($rowcount>0) {
    



$sql = "SELECT * FROM subject WHERE sub_id='$sub_id'";
$result = mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$sub_name=$row['sub_name'];
$t_id=$row['t_id'];


$sql5 = "SELECT * FROM teacher WHERE t_id='$t_id'";
$result5 = mysqli_query($conn,$sql5);
$row5=mysqli_fetch_assoc($result5);
$t_name=$row5['t_name'];

    $rate1 = 0;
    $rate2 = 0;
    $rate3 = 0;
    $rate4 = 0;
    
    $rate6 = 0;
    $rate7 = 0;
    
    $rate9 = 0;
    $rate10 = 0;
    $avg = 0;

$sql1= "SELECT * FROM rating WHERE sub_id='$sub_id'";
$result1= mysqli_query($conn,$sql1);


$sql2="SELECT COUNT(sub_id) AS maxnum FROM rating WHERE sub_id='$sub_id'";
$result2= mysqli_query($conn,$sql2);
$row2=mysqli_fetch_assoc($result2);
$numrec1= $row2['maxnum'];



while($row1=mysqli_fetch_assoc($result1)){
    $rate1=$rate1 + $row1['r_1'];   
    $rate2=$rate2 + $row1['r_2'];   
    $rate3=$rate3 + $row1['r_3'];   
    $rate4=$rate4 + $row1['r_4'];
      
    $rate6=$rate6 + $row1['r_6'];   
    $rate7=$rate7 + $row1['r_7'];   
    
    $rate9=$rate9 + $row1['r_9'];   
    $rate10=$rate10 + $row1['r_10'];    

    }

$f_rate1=(($rate1/$numrec1)*100)/4;
$f_rate2=(($rate2/$numrec1)*100)/4;
$f_rate3=(($rate3/$numrec1)*100)/4;
$f_rate4=(($rate4/$numrec1)*100)/4;

$f_rate6=(($rate6/$numrec1)*100)/4;
$f_rate7=(($rate7/$numrec1)*100)/4;

$f_rate9=(($rate9/$numrec1)*100)/4;
$f_rate10=(($rate10/$numrec1)*100)/4;
$avg=$f_rate1+$f_rate2+$f_rate3+$f_rate4+$f_rate6+$f_rate7+$f_rate9+$f_rate10;
$f_avg=$avg/8;


?>



<center>
<table border="1" cellspacing="2" cellpadding=4 >
    </select></th>

<tr>
<th  align=CENTER> <h2><?php echo $t_name ?> </th>
<th colspan=2 align=CENTER> <h2><?php echo $sub_name ?> </th>
</tr>

<tr>
<td> <h4> Questions </td><td> <h4> Remark</td>
</tr>
<tr >
<TD> A. Was the full period utilised always?</td>
<td  <?php if($f_rate1 <60): ?> style="background-color:#E57373;" <?php elseif($f_rate1>=90): ?> style="background-color:#81C784;"<?php endif; ?>> <?php echo number_format((float)$f_rate1, 2, '.', ''); ?>% </td>
</tr>
<tr >
<td>B. Was the topic fully covered illustrated with example</td>
<td<?php if($f_rate2 <60): ?> style="background-color:#E57373;" <?php elseif($f_rate2>=90): ?> style="background-color:#81C784;" <?php endif; ?>><?php echo number_format((float)$f_rate2, 2, '.', ''); ?>% </td>
</tr>
<tr>
<TD>C. Commumnication and effective  ness in delivery of lecturer?</td>
<td<?php if($f_rate3 <60): ?> style="background-color:#E57373;" <?php elseif($f_rate3>=90): ?> style="background-color:#81C784;" <?php endif; ?>> <?php echo number_format((float)$f_rate3, 2, '.', ''); ?>% </td>
</tr>
<tr>
<TD>D. Were the doubts/query and problems were solved</td>
<td<?php if($f_rate4 <60): ?> style="background-color:#E57373;" <?php elseif($f_rate4>=90): ?> style="background-color:#81C784;"<?php endif; ?>> <?php echo number_format((float)$f_rate4, 2, '.', ''); ?>% </td>
</tr>

<!--
<tr>
<TD>E. Were the msbte question paper were discussed</td>
<td<?php if($f_rate5 <60): ?> style="background-color:#E57373;" <?php elseif($f_rate5>=90): ?> style="background-color:#81C784;"<?php endif; ?>> <?php echo $f_rate5 ?>% </td>
</tr>
-->


<tr>
<TD>F. WaS the class discipline maintained</td>
<td<?php if($f_rate6 <60): ?> style="background-color:#E57373;" <?php elseif($f_rate6>=90): ?> style="background-color:#81C784;"<?php endif; ?>> <?php echo number_format((float)$f_rate6, 2, '.', ''); ?>% </td>
</tr>
<tr>
<TD>G. makes effective use of variety of available material and resources(projectors,board,sincere)</td>
<td<?php if($f_rate7 <60): ?> style="background-color:#E57373;" <?php elseif($f_rate7>=90): ?> style="background-color:#81C784;"<?php endif; ?>> <?php echo number_format((float)$f_rate7, 2, '.', ''); ?>% </td>
</tr>



<!--
<tr>
<TD>H. makes clears practicals demonstrations</td>
<td<?php if($f_rate8 <60): ?> style="background-color:#E57373;" <?php elseif($f_rate8>=90): ?> style="background-color:#81C784;"<?php endif; ?>> <?php echo $f_rate8 ?>% </td>
</tr>
-->



<tr >
<TD>I. Guide for extra curricular activities(Paper presentation/innovative technique)</td>
<td<?php if($f_rate9 <60): ?> style="background-color:#E57373;" <?php elseif($f_rate9>=90): ?> style="background-color:#81C784;"<?php endif; ?>> <?php echo number_format((float)$f_rate9, 2, '.', ''); ?>% </td>
</tr>
<tr >
<TD>J. Maintain student interest and attention</td>
<td<?php if($f_rate10 <60): ?> style="background-color:#E57373;" <?php elseif($f_rate10>=90): ?> style="background-color:#81C784;"<?php endif; ?>> <?php echo number_format((float)$f_rate10, 2, '.', ''); ?>% </td>
</tr>


<tr >
<td><h3>OverAll Percentage</td>
<td<?php if($f_avg <60): ?> style="background-color:#E57373;" <?php elseif($f_avg>=90): ?> style="background-color:#81C784;"<?php endif; ?>><h3><?php echo number_format((float)$f_avg, 2, '.', ''); ?>% </td>
</tr>

</table> 
<?php unset($_SESSION['sub_id']);?>
 </center>
    <br>
<?php } 

else{
    ?>
    <center style="margin-top: 70px;">
        <i class="fa fa-exclamation-triangle" style="font-size:70px; color: red;" aria-hidden="true"></i>
        <br>
        <h1 style="color:#373e4a; font-family: verdana; ">Report Not Found</h1>
    </center>
<?php
}


?>


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

