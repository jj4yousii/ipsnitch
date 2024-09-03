<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dash.css">
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

    <main>
        <p>Tracked IP'S: 170891</p>
        <table>
            <thead>
                <tr>
                    <th>IP Range</th>
                    <th>Severity</th>
                    <th>Top 5 Countries</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1.0.0.0 - 1.255.255.255</td>
                    <td>High</td>
                    <td>China: 29965</td>
                </tr>
                <tr>
                    <td>1.1.0.0 - 1.1.255.255</td>
                    <td>High</td>
                    <td>India: 27495</td>
                </tr>
                <tr>
                    <td>3.0.0.0 - 3.255.255.255</td>
                    <td>High</td>
                    <td>United States: 27184</td>
                </tr>
                <tr>
                    <td>5.8.0.0 - 5.8.255.255</td>
                    <td>Medium</td>
                    <td>Russia: 8178</td>
                </tr>
                <tr>
                    <td>13.32.0.0 - 13.32.255.255</td>
                    <td>Medium</td>
                    <td>Singapore: 6698</td>
                </tr>
            </tbody>
        </table>
        <p>Last updated: <span id="Last updated"></span></p>
    </main>

    <footer class="footer">
        <span>21110125@htu.edu.jo</span> |
        <span>+962 7 9683 8808</span>
    </footer>

    <script>
        const animatedBoxesContainer = document.querySelector('.animated-boxes');
        const boxCount = 2000;

        for (let i = 0; i < boxCount; i++) {
            const box = document.createElement('span');
            box.classList.add('animated-box');
            animatedBoxesContainer.appendChild(box);
        }

        const today = new Date();
        const formattedDate = today.getDate() + '/' + (today.getMonth() + 1) + '/' + today.getFullYear();
        document.getElementById('Last updated').textContent = formattedDate;

        function toggleSidebar() {
            const sidebar = document.getElementById("sidebar");
            sidebar.classList.toggle("active");
        }
    </script>
</body>

</html>
