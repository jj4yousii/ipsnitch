<?php
include 'connect.php';
if(isset($_POST['add-ip'])){
    $ip = $_POST['ip_address'];
    $severity = $_POST ['severity'];
    $country = $_POST ['country'];

    $sql = "INSERT INTO malicious_ips_admin (ip_address, severity, country) VALUES ('$ip', '$severity' , '$country')";

    $result = mysqli_query($con,$sql);
    if($result){
        echo "IP address inserted successfully";
        header("Location:admin.php");
    }else{
        echo "IP address did not get inserted";
        mysqli_error($con);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New IP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #000;
        }
        .card {
            background-color: #222;
            color: #fff;
            width: 500px;
            
        }
        
    </style>
</head>

<body>
    <div class="animated-boxes"></div>
    <div class="text-center">
        <div class="mb-4">
            <button class="btn btn-primary">
                <a href="admin.php" class="text-light">View IP Management</a>
            </button>
        </div>

        <div class="card p-4" style="max-width: 500px; margin: auto;">
            <h2 class="mb-4">Add New IP</h2>

            <form method="post">
                <div class="mb-3">
                    <label for="ipAddress" class="form-label">IP Address</label>
                    <input type="text" class="form-control" name="ip_address" placeholder="Enter IP Address">
                </div>
                <div class="mb-3">
                    <label for="severity" class="form-label">Severity</label>
                    <select class="form-select" name="severity">
                        <option value="Low">low</option>
                        <option value="Medium">medium</option>
                        <option value="High">high</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="country" class="form-label">Country</label>
                    <input type="text" class="form-control" name="country" placeholder="Enter Country">
                </div>
                <button type="submit" name="add-ip" class="btn btn-primary">Add IP</button>
            </form>
        </div>
    </div>    
</body>

</html>
