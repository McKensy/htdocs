<?php
    session_start();
    $pdo = new PDO('mysql:host=localhost;dbname=movie2k', 'moviesql', 'toor');

    if(isset($_POST["register"])) {
        $password = $_POST['password'];
        $username = $_POST['username'];
        $registersql = "insert into user (username, password) values (?, ?)";
        $statement = $pdo->prepare($registersql);
        $statement->execute(array($username, password_hash($password)));
        $_SESSION['username'] = $_POST['username'];
        header("location: ./index.php");
        die("Login successful.");
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
            <h1>Add a movie</h1>
            <div class="centerbox">
                <form action="./login.php" method="post">
                    <p>Name:    <input type="text" name="username" placeholder="Enter Username" maxlength="16" required/> </p>
                    <p>Subtitle:    <input type="password" name="password" placeholder="Enter Password" maxlength="64" required/> </p>
                    <p>Description:    <input type="password" name="password" placeholder="Enter Password" maxlength="64" required/> </p>
                    <p>Video-embed link:    <input type="password" name="password" placeholder="Enter Password" maxlength="64" required/> </p>
                    <div class="select-style">
                        <select name="dropdown">
                            <option value="" selected disabled hidden>Category</option>
                            <option value="1">Comedy</option>
                            <option value="2">Horror</option>
                            <option value="3">Sci-Fi</option>
                            <option value="4">Animation</option>
                        </select>
                    </div>
                    <input class="select-button" name="submit" type="submit" value="Submit"/>
                </form>
            </div>
        </div>
        <?php
        function alert($msg) {
            echo "<script type='text/javascript'>alert('$msg');</script>";
        }
        ?>
    </body>
</html>
