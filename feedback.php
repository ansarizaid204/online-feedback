<?php
session_start();  
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    ?>


<?php 

    include('db/dbh.php') ;
    $stud_id=$_SESSION['stud_id'];

    $sql = "SELECT * FROM student WHERE stud_id='$stud_id'";
    $result = mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);

    $dept_id=$row['dept_id'];
    $sem_id=$row['sem_id'];
    $id=$row['id'];

    $sql1 = "SELECT * FROM subject WHERE dept_id='$dept_id' AND sem_id='$sem_id'";
    $result1= mysqli_query($conn,$sql1);
   
    

    $rowcount=mysqli_num_rows($result1);

    
    if (isset($_POST['feed_now'])) {
            $sub_id=$_POST['sname'];
            $sql2 = "SELECT * FROM rating WHERE sub_id='$sub_id' AND id='$id'";
            $result2= mysqli_query($conn,$sql2);
            $rowcount=mysqli_num_rows($result2);
            $row1=mysqli_fetch_assoc($result2);
        
        if ($row1['flag']==0) {
            $_SESSION['err_submit']="Feedback is Already submitted ";
        }
        if($rowcount==0){
            $_SESSION['sname']=$_POST['sname'];
            $_SESSION['id']=$row['id'];

            $sql5 = "SELECT * FROM subject WHERE sub_id='$sub_id'";
            $result5= mysqli_query($conn,$sql5);
            $row5=mysqli_fetch_array($result5);
            if ($row5['c_id']==1) {
                header("location:feedback_now.php");
            }
            elseif ($row5['c_id']==2) {
                header("location:mcq_n_tw.php");
            }
            elseif ($row5['c_id']==3) {
                header("location:mcq_n_tw.php");
            }
            elseif ($row5['c_id']==4) {
                header("location:prac.php");
            }
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
<script type="text/JavaScript">  
function validate() 
{
if( document.form.sname.value == "0" )
   {
     alert( "Please select Subject!" );
     return false;

   }
   
   
}

</script>
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
     class="btn-login1"><a href="index3.php" style="text-decoration:none;color: white;">Back</a></button><br><br>
    <hr style="color: #eeeeee; ">

    <div class="status1">
    <table border="0">
        
        <tr>
            <td >
          <?php 
          $sql4 = "SELECT * FROM subject WHERE dept_id='$dept_id' AND sem_id='$sem_id'";
    $result4= mysqli_query($conn,$sql4);
    
          
            while($row4 = mysqli_fetch_array($result4)){
                echo $row4['sub_name'];
                echo "<br>";
                
        }
?> 
        </td>
            <td style="width: 50px; text-align:right;"  ><?php 

    while($row1 = mysqli_fetch_array($result1)){
        
                $temp=$row1['sub_id'];
                $sql3 = "SELECT * FROM rating WHERE sub_id='$temp' AND id='$id'";
                $result3= mysqli_query($conn,$sql3);
                $row3 = mysqli_fetch_array($result3);
                $rowcount1=mysqli_num_rows($result3);
               

                if ($rowcount1==1) {
                    if ($row3['flag']==0) {
                        echo "<i class='fa fa-check' style='color:green;'></i>";
                        echo "<br>";
                    }
                }
                if ($rowcount1==0) {

                    echo "<i class='fa fa-times' style='color:red;' ></i>";
                    echo "<br>";
                }
                
            }

    
    ?></td>
    </tr>

    </table>
    

</div>


    <?php  
    if (isset($_SESSION['err_submit'])) {
        
            echo "

<div class='msg1'><i class='fa fa-check'></i>   ".$_SESSION['err_submit']."</div>";
        
        unset($_SESSION['err_submit']);
    }
?>

    
        <div class="content1" >
        
            


        

    <form  name="form" method="POST" onsubmit="return validate(this);">
<br>
<select name="sname" size="1">
<option value="0">Select Subject</option>
    
        <?php  

        $sql7 = "SELECT * FROM subject WHERE dept_id='$dept_id' AND sem_id='$sem_id'";
    $result7= mysqli_query($conn,$sql7);
        while($row6 = mysqli_fetch_array($result7)){
        ?>
        <option value="<?php echo $row6['sub_id'];?>"><?php echo $row6['sub_name'];?>
        <?php }
    ?>
    </option>
    </select>

<br>

<button type="submit" name="feed_now" class="btn-login2">Feedback Now</button>
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