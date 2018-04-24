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
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="style.css">
        <title>Movie2k</title>
    </head>
    <body>
        <div class="main">
            <h1>Login / Registration</h1>
            <div class="centerbox">
                <form action="./login.php" method="post">
                    <p>Username:    <input type="text" name="username" placeholder="Enter Username" maxlength="16" required/> </p>
                    <p>Password:    <input type="password" name="password" placeholder="Enter Password" maxlength="64" required/> </p>
                    <input class="select-button" name="login" type="submit" value="Login"/>
                    <input class="select-button" name="register" type="submit" value="Register"/>
                </form>
            </div>
        </div>
    </body>
</html>
