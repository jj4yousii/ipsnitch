<?php
include 'connect.php';

session_start();

if(isset($_POST['login'])){
  $username = $_POST['username'];
  $password = $_POST['password'];


  if($username == 'admin'){

    $sql = "SELECT * FROM users WHERE username = 'admin'";
    $result = mysqli_query($con, $sql);
    $adminDetails = mysqli_fetch_assoc($result);


    if($adminDetails && $adminDetails['password'] === $password){
      $_SESSION['account'] = $username;
      header("Location:admin.php");
      exit();
    } else {
      echo "<script>alert('Invalid username or password');</script>";
    }
  } else {

    $sql = "SELECT * FROM users WHERE username ='$username' AND password = '$password'";
    $result = mysqli_query($con, $sql);
    $userDetails = mysqli_fetch_assoc($result);

    if($userDetails){
      $_SESSION['account'] = $username;
      header("Location:home.php"); 
      exit();
    } else {
      echo "<script>alert('Invalid username or password');</script>";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="login.css">
</head>

<body>
  <div class="animated-boxes"></div>
  <header class="header">
    <img src="logo.png" alt="IP Snitch Logo" class="logo">
    <p>Your defense against malicious IP addresses</p>
  </header>
  <main class="container">
    <div class="login-form">
      <form action = "" method ="POST">
      <input type="text" placeholder="Enter Username" name="username" required>
      <input type="password" placeholder="Enter Password" name="password" required>
        <div class="remember-me">
          <input type="checkbox" id="rememberMe" name="rememberMe">
          <label for="rememberMe">Remember me</label>
        </div>
        <button type="submit" name = "login" >Sign in</button>
        <p>Dont have an account? <a href="signup.php">Signup here</a></p>
      </form>
    </div>
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
  </script>
</body>
