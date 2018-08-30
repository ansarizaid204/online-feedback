<?php  
session_start();
include('db/dbh.php') ;

$dept_id=$_POST['dept_id'];
$sem_id=$_POST['sem_id'];
$t_id=$_POST['t_id'];

$result = mysqli_query("SELECT count(*) as maxnum FROM rating where t_id=".$_POST['t_id']);
	$row = mysqli_fetch_array($result);
	$numrec1 = $row['maxnum'];
	
	$rate1 = 0;
	$rate2 = 0;
	$rate3 = 0;
	$rate4 = 0;
	$rate5 = 0;
	$rate6 = 0;
	$rate7 = 0;
	$rate8 = 0;
	$rate9 = 0;
	$rate10 = 0;
	$avg = 0;
	$result = mysqli_query("SELECT *  FROM rating where t_id=".$_POST['t_id']);?>
	
	
	<?php while($row = mysqli_fetch_array($result)){
	$rate1=$rate1 + $row['r_1'];	
	$rate2=$rate2 + $row['r_2'];	
	$rate3=$rate3 + $row['r_3'];	
	$rate4=$rate4 + $row['r_4'];
	$rate5=$rate5 + $row['r_5'];	
	$rate6=$rate6 + $row['r_6'];	
	$rate7=$rate7 + $row['r_7'];	
	$rate8=$rate8 + $row['r_8'];
	$rate9=$rate9 + $row['r_9'];	
	$rate10=$rate10 + $row['r_10'];	

	}


	$result = mysqli_query("SELECT * FROM teacher where t_id=".$_POST['t_id']);
	$row = mysqli_fetch_array($result);
	$name = $row['t_name'];
	if ($rate1 > 0){
	$rate1=(($rate1/$numrec1)*100)/4;	
	}
	if ($rate2 > 0)
	$rate2=(($rate2/$numrec1)*100)/4;
	if ($rate3 > 0)
	$rate3=(($rate3/$numrec1)*100)/4;
	if ($rate4 > 0)
	$rate4=(($rate4/$numrec1)*100)/4;
	if ($rate5 > 0)
	$rate5=(($rate5/$numrec1)*100)/4;
	if ($rate6 > 0)
	$rate6=(($rate6/$numrec1)*100)/4;
	if ($rate7 > 0)
	$rate7=(($rate7/$numrec1)*100)/4;
	if ($rate8 > 0)
	$rate8=(($rate8/$numrec1)*100)/4;
	if ($rate9 > 0)
	$rate9=(($rate9/$numrec1)*100)/4;
	if ($rate10 > 0)
	$rate10=(($rate10/$numrec1)*100)/4;
	$avg=$rate1+$rate2+$rate3+$rate4+$rate5+$rate6+$rate7+$rate8+$rate9+$rate10;
	if ($avg > 0)
	$avg=$avg/10;


?>



<!DOCTYPE html>
<html>
<head>
	<title>generated report</title>
<link rel="icon" href="img/favicon.ico" type="image/gif" sizes="16x16">
</head>
<body>

<center>
<table border="1" cellspacing="2" cellpadding=4 bgcolor=pink>
	</select></th>

<tr>
<td colspan=2 align=CENTER> <h2><?php echo $name ?> </td>
</tr>

<tr>
<td> <h4> Questions </td><td> <h4> Remark</td>
</tr>
<tr>
<TD> A. Was the full period utilised always?</td>
<td> <?php echo $rate1 ?>% </td>
</tr>
<tr>
<td>B. Was the topic fully covered illustrated with example</td>
<td><?php echo $rate2 ?>% </td>
</tr>
<tr>
<TD>C. Commumnication and effective  ness in delivery of lecturer?</td>
<td> <?php echo $rate3 ?>% </td>
</tr>
<tr>
<TD>D. Were the doubts/query and problems were solved</td>
<td> <?php echo $rate4 ?>% </td>
</tr>
<tr>
<TD>E. Were the msbte question paper were discussed</td>
<td> <?php echo $rate5 ?>% </td>
</tr>
<tr>
<TD>F. WaS the class discipline maintained</td>
<td> <?php echo $rate6 ?>% </td>
</tr>
<tr>
<TD>G. makes effective use of variety of available material and resources(projectors,board,sincere)</td>
<td> <?php echo $rate7 ?>% </td>
</tr>

<tr>
<TD>H. makes clears practicals demonstrations</td>
<td> <?php echo $rate8 ?>% </td>
</tr>
<tr>
<TD>I. Guide for extra curricular activities(Paper presentation/innovative technique)</td>
<td> <?php echo $rate9 ?>% </td>
</tr>
<tr>
<TD>J. Maintain student interest and attention</td>
<td> <?php echo $rate10 ?>% </td>
</tr>


<tr>
<td><h3>OverAll Percentage</td>
<td><h3><?php echo $avg ?>% </td>
</tr>

</table> 
	<br>
<center><A href="index.html"><h5> Back to Home Page</a>
</body>
</html>