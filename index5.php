<!DOCTYPE html>
<html >
<head>
<style type="text/css">
.select-boxes{width: 280px;text-align: center;}
select {
    background-color: #F5F5F5;
    border: 1px double #FB4314;
    color: #55BB91;
    font-family: Georgia;
    font-weight: bold;
    font-size: 14px;
    height: 39px;
    padding: 7px 8px;
    width: 250px;
    outline: none;
    margin: 10px 0 10px 0;
}
select option{
    font-family: Georgia;
    font-size: 14px;
}
</style>
<script src="jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#dept_id').on('change',function(){
        var dept_id = $(this).val();
        if(dept_id){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'dept_id='+dept_id,
                success:function(html){
                    $('#sem_id').html(html);
                    $('#sub_id').html('<option value="">Select sem first</option>'); 
                }
            }); 
        }else{
            $('#sem_id').html('<option value="">Select department first</option>');
            $('#sub_id').html('<option value="">Select sem first</option>'); 
        }
    });
    
    $('#sem_id').on('change',function(){
        var sem_id = $(this).val();
        if(sem_id){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'sem_id='+sem_id,
                success:function(html){
                    $('#sub_id').html(html);
                }
            }); 
        }else{
            $('#sub_id').html('<option value="">Select sem first</option>'); 
        }
    });
});
</script>
</head>
<body>
    <div class="select-boxes">
    <?php
    //Include database configuration file
    include('db/dbh.php');
    
    //Get all country data
    $query = $conn->query("SELECT * FROM department");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    ?>
    <select name="dept_id" id="dept_id">
        <option value="">Select Department</option>
        <?php
        if($rowCount > 0){
            while($row = $query->fetch_assoc()){ 
                echo '<option value="'.$row['dept_id'].'">'.$row['dept_name'].'</option>';
            }
        }else{
            echo '<option value="">Country not available</option>';
        }
        ?>
    </select>
    
    <select name="sem_id" id="sem_id">
        <option value="">Select Semester first</option>
    </select>
    
    <select name="sub_id" id="sub_id">
        <option value="">Select Subject first</option>
    </select>
    </div>
</body>
</html>
