<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login_design.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Login to Miroma!</title>
</head>

<body>
    <div class="login-card-container">
        <div class="login-card">
            <div class="login-card-logo">
                <img src="images/logo.png" alt="logo">
            </div>
            <div class="login-card-header">
                <h1>MIROMA CATALOGUE</h1>
                <div>
                Please enter login details.</div>
                <?php 
                    if(isset($_GET["error"])){
                      if($_GET["error"] == "emptyinput"){
                        echo "<p>Fill in all fields!</p>";
                      } else if($_GET["error"] == "wronglogin"){
                        echo "<p>Incorrect Username or Password, try again!</p>";
                      }
                    }
                 ?>
            </div>
            <form class="login-card-form" action="php/login.inc.php" method="post">
                <div class="form-item">
                  <span class="form-item-icon material-symbols-outlined">sports_esports</span>
                    <input type="text" placeholder="Enter Username" name = "Username">
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-outlined">sports_esports</span>
                    <input type="password" placeholder="Enter Password" name = "Password">
                </div>
                <button type="submit" name="submit">LOGIN</button>
            </form>
            <div class="login-card-footer">
                Don't have an account? <a href="signup.php"  name="signin">Create an account.</a>
            </div>
        </div>
    </div>
</body>

</html>