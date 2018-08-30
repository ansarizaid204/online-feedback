<?php
    session_start();
    include("db/dbh.php");
    
    $sql="SELECT * FROM question";
    $result=mysqli_query($conn,$sql);
    
    
    
?>





<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<form method="POST" action="index2.php">
<table>
    <?php
    while ($row=mysqli_fetch_array($result)) {
        
    ?>
    <tr>
        <td><?php echo $row['q_name']; ?></td>
    </tr>
    <tr>
        <td><input type="text" name="per"></td>
    </tr>
    <?php }?>
    </table>
</form>
</body>
</html>