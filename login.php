<?php
    session_start();
    session_unset();

    $pdo = new PDO('mysql:host=localhost;dbname=movie2k', 'moviesql', 'toor');
    if(isset($_POST["register"])) {
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $registersql = "insert ignore into user (username, password) values (?, ?)";
        $statement = $pdo->prepare($registersql);
        $statement->execute(array($_POST['username'], $password));
        /*if ($pdo->query($registersql) === TRUE){
            $_SESSION['username'] = $_POST['username'];
            header("location: ./index.php");
            die("Login successful.");
        } else {
            echo 'Error while connection to database...<br>';
        }*/
        $_SESSION['username'] = $_POST['username'];
        header("location: ./index.php");
        die("Login successful.");
    }
    if(isset($_POST["login"])) {
        $username = $_POST['username'];
        $verifylogin = "select * from user where username = '$username'";
        $result = $pdo->query($verifylogin);
        $statement = $pdo->prepare($verifylogin);
        $statement->execute();
        while($row = $statement->fetch()) {
            if(password_verify($_POST['password'], $row['password'])){
                $_SESSION['username'] = $_POST['username'];
                header("location: ./index.php");
                die("Login successful.");
            } else {
                echo "<h2>User or Password wrong. Try again.</h2>";
            }
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
      <!-- Compiled and minified CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Font awesome link-->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
      <title>Movie2k</title>
    </head>
    <body style="background-color: #555555">
      <nav>
        <div class="nav-wrapper teal lighten-2">
          <a href=".\" class="brand-logo center">Movie2k</a>
        </div>
      </nav>
        <div class="container">
          <div class="card-panel" style="margin: 1% 1% 1% 1%">
            <h3 class="center">Login / Registration</h3>
              <form action="./login.php" method="post">
                  <div class="row">
                    <div class="input-field col s12 m6 l6">
                      <input placeholder="Username" type="text" name="username" class="validate" maxlength="16" required>
                    </div>
                    <div class="input-field col s12 m6 l6">
                      <input placeholder="Enter Password" type="password" name="password" class="validate"  maxlength="64" required>
                    </div>
                  </div>
                  <div class="center">
                    <button class="btn waves-effect waves-light" type="Submit" name="login" value="Login">Login</button>
                    <button class="btn waves-effect waves-light" type="Submit" name="register" value="Register">Register</button>
                  </div>
              </form>
          </div>
        </div>
    </body>
</html>
