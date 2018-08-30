<?php
session_start();
include("db/dbh.php");

$t_id=$_POST['t_id'];
$sql = "DELETE FROM teacher WHERE t_id='$t_id'";

//sends the query to delete the entry
$result=mysqli_query ($conn,$sql);

if ($result) { 
	$sql1="DELETE FROM rating WHERE t_id='$t_id'";
	
	$sql2="UPDATE subject SET t_id=0 WHERE t_id='$t_id'";
	$result1=mysqli_query ($conn,$sql1);
	$result2=mysqli_query ($conn,$sql2);

	if($result1){
		header("location:teacher.php");
	}
}
?>