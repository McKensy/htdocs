<?php
    session_start();
    if(isset($_POST["Submit"])) {
        $name = $_POST['name'];
        $_SESSION['username'] = $name;
    }
    if(!isset($name) OR empty($name)) {
       $name = "Gast";
    }
    header("Location: ./index.php");
    die("Login successful.");
?>
<html>
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="style.css">
        <title>Movie2k</title>
    </head>
    <body>
        <div class="main">
            <h1>User</h1>
            <h2>Please log in:</h2>
            <div class="centerbox">
                <form action="./login.php" method="post">
                    <p>Username:    <input type="Text" name="name" maxlength="16"/> </p>
                    <p>E-Mail:      <input type="Text" name="email" maxlength="64"/> </p>
                    <p>Password:    <input type="Text" name="password" maxlength="64"/> </p>
                    <input class="select-button" type="Submit" />
                </form>
            </div>
        </div>
    </body>
</html>
