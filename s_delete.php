<?php
session_start();
include("db/dbh.php");

$sub_id=$_POST['sub_id'];
$sql = "DELETE FROM subject WHERE sub_id='$sub_id'";

//sends the query to delete the entry
$result=mysqli_query ($conn,$sql);

if ($result) { 
//if it updated

	header("location:subject.php");
}
?>