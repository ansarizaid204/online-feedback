<?php
session_start();
include("db/dbh.php");

if (isset($_POST['q_id'])) {
	$q_id=$_POST['q_id'];
	$sql1 = "DELETE FROM question WHERE q_id='$q_id'";

//sends the query to delete the entry
$result1=mysqli_query ($conn,$sql1);

if ($result1) { 
//if it updated

	header("location:question.php");
}
}


if (isset($_POST['stud_id'])) {
	$stud_id=$_POST['stud_id'];
$sql = "DELETE FROM Student WHERE stud_id='$stud_id'";

//sends the query to delete the entry
$result=mysqli_query ($conn,$sql);

if ($result) { 
//if it updated

	header("location:student.php");
}
}








?>