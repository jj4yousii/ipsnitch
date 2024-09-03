<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="admin.css">
</head>

<body>
    <div class="animated-boxes"></div>
    <div class="header">
        <button class="menu-toggle" onclick="toggleSidebar()">☰</button>
        <img src="logo.png" class="logo" alt="Logo">
        <div class="nav-links">
            <a href="home.php">Home</a>
            <a href="dash.php">Dashboard</a>
            <a href="threatmap.php">Threat map</a>
        </div>
        <div class="user-menu">
            <button class="user-button">
                <img src="user.png" alt="User Icon">
                Admin
            </button>
            <div class="dropdown-content">
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </div>

    <div id="sidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="toggleSidebar()">×</a>
        <a href="home.php">Home</a>
        <a href="dash.php">Dashboard</a>
        <a href="threatmap.php">Threat map</a>
    </div>

    <main class="container">
        <div class="tables-wrapper row">
            <div class="table-left col-md-6">
                <h3 class="text-light">IP Management</h3>
                <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">IP Address</th>
                            <th scope="col">Severity</th>
                            <th scope="col">Country</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM malicious_ips_admin;";
                        $result = mysqli_query($con, $sql);
                        if ($result) {
                            $selectedips = mysqli_fetch_all($result, MYSQLI_ASSOC);
                            foreach($selectedips as $row){
                             $id = $row['id'];
                             $ip_address = $row['ip_address'];
                             $severity = $row['severity'];
                             $country = $row['country'];
 
                             echo "<tr>
                            <td>{$id}</td>
                            <td>{$ip_address}</td>
                            <td>{$severity}</td>
                            <td>{$country}</td>
                            <td>
                            <a href='update_ip.php?id={$id}' class='btn btn-warning action-button update-button'>Update</a>
                            <a href='delete_ip.php?id={$id}' class='btn action-button delete-button' style='background-color: red; '>Delete</a>

                            </td>
                            </tr>";

                            }
                        } else {
                            echo "Problem in getting IP's";
                        }             
                        ?>       
                    </tbody>
                </table>
                <a href="add_ip.php" class="btn btn-primary add-ip-button mt-3">Add New IP</a>
            </div>
        </div>
    </main>

    <script>
        const animatedBoxesContainer = document.querySelector('.animated-boxes');
        const boxCount = 2000;

        for (let i = 0; i < boxCount; i++) {
            const box = document.createElement('span');
            box.classList.add('animated-box');
            animatedBoxesContainer.appendChild(box);
        }

        function toggleSidebar() {
            const sidebar = document.getElementById("sidebar");
            sidebar.classList.toggle("active");
        }
    </script>
</body>

</html>
