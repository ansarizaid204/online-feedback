<?php  
	session_start();
	include("db/dbh.php");

	if (!empty($_POST['dept_id'])) {
		$dept_id=$_POST['dept_id'];
		
		$sem_id=$_POST['sem_id'];
		$query="SELECT * FROM subject WHERE dept_id='$dept_id' AND sem_id='$sem_id'";
		$result=mysqli_query($conn,$query);
		echo "<option value='0'>Select Subject</option>";
		 while($row = mysqli_fetch_array($result)){
		?>
		<option value="<?php echo $row['sub_id'];?>"><?php echo $row['sub_name'];?>
		<?php }
	
	}



?>