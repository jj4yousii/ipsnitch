<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="home.css">
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

    <main class="container">
        <div class="about-content">
            <h1>About Us</h1>
            <p>IPsnitch aims to show the number of malicious IP addresses existing in countries, so the user can see the top 5 countries with the greatest number of malicious IP addresses so he can be cautioned to investigate cybercrimes, track down malicious IP addresses, and protect network security.</p>
        </div>
        <div class="logo-next">
            <img src="logo2.png" alt="logo">
        </div>
    </main>
    
    <div class="footer">
        <span>21110125@htu.edu.jo</span> |
        <span>+962 7 9683 8808</span>
    </div>

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
