<?php
include 'connect.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "DELETE FROM malicious_ips_admin WHERE id=$id";
    $result = mysqli_query($con, $sql);
    
    if($result){
        echo "IP address deleted successfully";
        header("Location: admin.php");
        exit(); 
    }else{
        echo "IP address did not get deleted "; 
         mysqli_error($con);
    }
}
?>
