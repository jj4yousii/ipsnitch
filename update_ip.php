<?php
include 'connect.php';

$id = $_GET['id'];
$sql = "SELECT * FROM malicious_ips_admin WHERE id = $id";

$result = mysqli_query($con, $sql);
$ipInfo = mysqli_fetch_assoc($result);

$ip_address = $ipInfo['ip_address'];
$severity = $ipInfo['severity'];
$country = $ipInfo['country'];

if(isset($_POST['updateIp'])){
    $ip_address = $_POST['ip_address'];
    $severity = $_POST['severity'];
    $country = $_POST['country'];

    $sql = "UPDATE malicious_ips_admin SET ip_address = '$ip_address', severity = '$severity', country = '$country' WHERE id=$id";
    $result = mysqli_query($con, $sql);

    if($result){
        echo "IP address updated successfully";
        header("Location: admin.php");
        exit();
    }else{
        echo "IP address did not get updated";
        mysqli_error($con);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update IP</title>
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
    <div class="text-center">
        <div class="mb-4">
            <button class="btn btn-primary">
                <a href="admin.php" class="text-light">View IP Management</a>
            </button>
        </div>

        <div class="card p-4">
            <h2 class="mb-4">Update IP</h2>

            <form method="post">
                <div class="mb-3">
                    <label for="ipAddress" class="form-label">IP Address</label>
                    <input type="text" class="form-control" name="ip_address" value="<?php echo $ip_address; ?>">
                </div>
                <div class="mb-3">
                    <label for="severity" class="form-label">Severity</label>
                    <input type="text" class="form-control" name="severity" value="<?php echo $severity; ?>">
                </div>
                <div class="mb-3">
                    <label for="country" class="form-label">Country</label>
                    <input type="text" class="form-control" name="country" value="<?php echo $country; ?>">
                </div>
                <button type="submit" class="btn btn-primary" name="updateIp">Update IP</button>
            </form>
        </div>
    </div>
</body>
</html>
