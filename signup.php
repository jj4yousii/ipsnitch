<?php
    include 'connect.php';
    if(isset($_POST['register'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm-password'];

        if ($password !== $confirm_password) {
            echo "<script>alert('Passwords do not match. Please try again.');</script>";
        } else {
            $check_user = "SELECT * FROM users WHERE username = '$username'";
            $result = mysqli_query($con, $check_user);
            if($row = mysqli_fetch_assoc($result)) {

                echo "<script>alert('Username is taken, please pick another one.');</script>";

            } else {

                $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
                $result = mysqli_query($con, $sql);

                if($result){
                    header("Location:login.php");
                } else {
                    mysqli_query($con);
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <link rel="stylesheet" href="signup.css">
</head>

<body>
    <div class="animated-boxes"> </div>

    <header class="header">
        <img src="logo.png" alt="Logo" class="logo">
        <p>Your defense against malicious IP addresses</p>
    </header>

    <main class="container">
        <div class="signup-form">
            <form method = "POST">
                <input type="text" placeholder="Enter Username" name="username" required>
                <input type="text" placeholder="Enter Email" name="email" required>
                <input type="password" placeholder="Enter Password" name="password" required>
                <input type="password" placeholder="Confirm Password" name="confirm-password" required>
                <button type="submit" name ="register" >Sign Up</button>
            </form>
            <p>Already have an account? <a href="login.php">Login here</a></p>
        </div>
    </main>
    <footer class="footer">
        <span> 21110125@htu.edu.jo </span> |
        <span> +962 7 9683 8808 </span>
    </footer>
    <script>
        const animatedBoxesContainer = document.querySelector('.animated-boxes');
        const boxCount = 2000; 

        for (let i = 0; i < boxCount; i++) {
            const box = document.createElement('span');
            box.classList.add('animated-box');
            animatedBoxesContainer.appendChild(box);
        }
        
    </script>
</body>

</html>