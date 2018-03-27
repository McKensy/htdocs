<?php
    session_start();
    session_unset();

    $pdo = new PDO('mysql:host=localhost;dbname=movie2k', 'moviesql', 'toor');
    if(isset($_POST["register"])) {
        $password = $_POST['password'] /*password_hash($_POST['password'], PASSWORD_BCRYPT)*/;
        $registersql = "insert into user (username, password) values (?, ?)";
        $statement = $pdo->prepare($registersql);
        $statement->execute(array($_POST['username'], $password));
        $_SESSION['username'] = $_POST['username'];
        header("location: ./index.php");
        die("Login successful.");
    }
    if(isset($_POST["login"])) {
        $password = $_POST['password'] /*password_hash($_POST['password'], PASSWORD_BCRYPT)*/;
        $loginsql = "select username, password from user where username = ? and password = ?";
        $statement = $pdo->prepare($loginsql);
        $statement->execute(array($_POST['username'], $password));
        while($row = $statement->fetch()) {
            if($row['username'] == NULL){
                echo "Wrong Login.";
            } else {
                $_SESSION['username'] = $_POST['username'];
                header("location: ./index.php");
                die("Login successful.");
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
