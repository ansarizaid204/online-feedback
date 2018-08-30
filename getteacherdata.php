<?php  
	session_start();
	include("db/dbh.php");

	if (!empty($_POST['dept_id'])) {
		$dept_id=$_POST['dept_id'];
		
		
		$query="SELECT * FROM teacher WHERE dept_id='$dept_id'";
		$result=mysqli_query($conn,$query);
		echo "<option value='0'>Select Teacher</option>";
		 while($row = mysqli_fetch_array($result)){
		?>
		<option value="<?php echo $row['t_id'];?>"><?php echo $row['t_name'];?>
		<?php }
	
	}



?>