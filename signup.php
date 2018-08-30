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
    session_start();
    include("db/dbh.php");
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

        $sql2="SELECT * FROM student WHERE stud_id='$stud_id'";
        $result2=mysqli_query($conn,$sql2);
        $rowcount=mysqli_num_rows($result2);
        if ($rowcount==0) {
            # code...
        


        $sql3="INSERT INTO student(name,stud_id,password,email,mob,enr_no,gender,dept_id,sem_id,shift) VALUES('$name','$stud_id','$password','$email','$mob','$enr_no','$gender','$dept_id','$sem_id','$shift')";
        mysqli_query($conn,$sql3);
        
        $_SESSION['name']=$name;
        header("location:index.php");

        }
        else{
            $_SESSION['checking']="Student ID Already Taken.Please Try Another";
        }


    }
?>




<!DOCTYPE html>
<html>
<head>
    <title>Sign Up-Feedback System</title>
        <link rel="stylesheet" type="text/css" href="css/main1.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        
<link rel="icon" href="img/favicon.ico" type="image/gif" sizes="16x16">
</head>
<body>
<div class="header">
    <img src="img/logo.png">
    <h2>FeedBack Management System</h2>
</div>

<?php  
    if (isset($_SESSION['errMsg'])) {
        
            echo "<div class='errMsg'>
<div class='invalid'>Invalid Login</div>
<div class='msg' style='padding-top: 5px;'>".$_SESSION['errMsg']."</div></div>";
        
        unset($_SESSION['errMsg']);
    }
?>
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

<?php  
    if (isset($_SESSION['checking'])) {
        
            echo "

<div class='msg2'><i class='fa fa-check'></i>   ".$_SESSION['checking']."</div>";
        
        unset($_SESSION['checking']);
    }
?>

<div class="login1">
    
        <form action="signup.php" method="POST" name="form" onsubmit="return validate(this);">
            <div class="input">
            
            <input type="text" name="name" id="username" placeholder=" Name" required class="form-input" autofocus></input>
            <input type="text" name="stud_id" id="textbox" placeholder=" Student ID" required class="form-input" onkeypress="return isNumber(event)" ></input>

           <!-- <div class="checking">
            <button id="sub" >submit</submit>
           <script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  ></script>
  <script type="text/javascript">
  $(document).ready(function(){
    $('#sub').click(function(){
        $.POST("checking.php",
            {stud_id: $('#textbox').val()},
            function(data){
                $('#data').html(data);
            }
            );
    });
  });
</script>
<div id="data"></div>
            </div>-->


            <input type="email" name="email" id="username" placeholder=" Email" required class="form-input" ></input>
            <input type="text" name="mob" id="username" placeholder=" Mobile No" required class="form-input" minlength="10" maxlength="10" onkeypress="return isNumber(event)" ></input>
            <input type="text" name="enr_no" id="username" placeholder=" Enrolment No" required class="form-input" minlength="10" maxlength="10" onkeypress="return isNumber(event)" ></input>
        
        
            <input type="password" name="password" id="password" placeholder="Password" required class="form-input"></input><br>
            <div class="radio">
            <input type="radio" name="gender" value="male" checked  > Male
        <input type="radio" name="gender" value="female" style="margin-left: 50px;"> Female
            </div>
            <br>
            <div class="select-field">
            <select name="dept_id" >

        <option value="0">select department</option>
        <?php  while($row = mysqli_fetch_array($result)){
        ?>
        <option value="<?php echo $row['dept_id'];?>"><?php echo $row['dept_name'];?>
        <?php }
    ?>
    </option>
    </select>
    </div>
    <br>
    <div>
    <select name="sem_id" class="required">
        <option value="0" selected>select Semester</option>
    
        <?php  while($row1 = mysqli_fetch_array($result1)){
        ?>
        <option value="<?php echo $row1['sem_id'];?>"><?php echo $row1['sem_name'];?>
        <?php }
    ?>
    </option>
    </select>
    </div>
            <br>
            <div class="select-field">
            <select name="shift">
            <option value="0">select Shift</option>
                <option value="1">1</option> 
                <option value="2">2</option></select>
                </div>
            <br>
        <button type="submit" name="register-btn"   class="btn-login">Sign Up</button>
        <button  class="btn-login" style="margin-left: 20px;"><a href="index.php" style="text-decoration:none;color: white;">Back</a></button>
            
            </div>
        


    </form>
    
    
</div>








<!--moel box-->



</body>
</html>