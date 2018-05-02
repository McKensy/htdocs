<?php
    session_start();
    include './pdo.php';
    /*if ($pdo->connect_error) {
        die("Connection failed: " . $pdo->connect_error);
    }*/
    if(isset($_POST["register"])) {
        $proof = "SELECT * FROM user WHERE username=?";
        $proofstatement = $pdo->prepare($proof);
        $proofstatement->execute(array($_POST['username']));
        if ($proofstatement->fetch() > 0) {
            $_SESSION['errormessage'] = "Username already exists!";
            header("location: ./login.php");
        }else{
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $registersql = "insert into user (username, password) values (?, ?)";
            $statement = $pdo->prepare($registersql);
            $statement->execute(array($_POST['username'], $password));
            $_SESSION['username'] = $_POST['username'];
            header("location: ./index.php");
            die("Login successful.");
        }
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
            }else {
                $_SESSION['errormessage'] = "Wrong Username or Password!";
                header("location: ./login.php");
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
                      <div class="col m2 l3 left"></div>
                    <div class="input-field col s12 m4 l3">
                      <input placeholder="Username" type="text" name="username" class="validate" maxlength="16" required>
                    </div>
                    <div class="input-field col s12 m4 l3">
                      <input placeholder="Enter Password" type="password" name="password" class="validate"  maxlength="64" required>
                    </div>
                     <div class="col m2 l3 right"></div>
                  </div>
                  <div class="center">
                    <button class="btn waves-effect waves-light" type="Submit" name="login" value="Login">Login</button>
                    <button class="btn waves-effect waves-light" type="Submit" name="register" value="Register">Register</button>
                  </div>
              </form>
              <?php
                if(isset($_SESSION['errormessage'])){
                    echo "<p class=\"center\" style=\"font-size: 1.3em;\">".$_SESSION['errormessage']."</p>";
                }
              ?>
          </div>
        </div>
    </body>
</html>
