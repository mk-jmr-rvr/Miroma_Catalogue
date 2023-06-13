<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/signup_design.css"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <title>Create an Account</title>
</head>
<body>
  <div class="login-card-container">
    <div class="login-card">
      <div class="login-card-logo">
        <img src="images/logo.png" alt="logo">
      </div>
      <?php 
          if(isset($_GET["error"])){
            if($_GET["error"] == "emptyinput"){
              echo "<p style='text-align: center; color: white;'>Fill in all fields!</p>";
            } else if($_GET["error"] == "invaliduid"){
              echo "<p style='text-align: center; color: white;'>Choose a proper username!</p>";
            }else if($_GET["error"] == "passwordsdontmatch"){
              echo "<p style='text-align: center; color: white;'>Password doesn't match!</p>";
            }else if($_GET["error"] == "stmtfailed"){
              echo "<p style='text-align: center; color: white;'>Something went wrong, Try again!</p>";
            }else if($_GET["error"] == "usernametaken"){
              echo "<p style='text-align: center; color: white;'>Username is taken!</p>";
            }
          }
       ?>
      <form class="login-card-form" action="php/signup.inc.php" method="post">
        <div class="form-row">
          <div class="form-item">
            <span class="form-item-icon material-symbols-outlined">sports_esports</span>
            <input type="text" placeholder="First Name" name="Fname">
          </div>
          <div class="form-item">
            <span class="form-item-icon material-symbols-outlined">sports_esports</span>
            <input type="text" placeholder="Last Name" name="Lname">
          </div>
          <div class="form-item">
            <span class="form-item-icon material-symbols-outlined">sports_esports</span>
            <input type="text" placeholder="Username" name="username">
          </div>
        </div>
        <div class="form-row">
            <div class="form-item">
                <span class="form-item-icon material-symbols-outlined">sports_esports</span>
                <input type="password" placeholder="Password" name="password">
              </div>
          <div class="form-item">
            <span class="form-item-icon material-symbols-outlined">sports_esports</span>
            <input type="password" placeholder="Confirm Password" name="repeatpass">
          </div>
        </div>
        <button type="submit" name ="submit">CREATE ACCOUNT</button>
      </form>
      <div class="login-card-footer">
      Not ready to create an account yet? <a href="login.php" name = "cancel">Go back</a>
    </div>
    </div>
    </div>
    </body>
    </html>
      