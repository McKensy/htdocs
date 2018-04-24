<?php
    session_start();
    $pdo = new PDO('mysql:host=localhost;dbname=movie2k', 'moviesql', 'toor');
    @$name = $_SESSION['username'];
    if(!isset($name)){
        header("location: ./login.php");
        die("kys");
    }
    if(isset($_POST["submit"])) {
        $insertmoviesql = "INSERT INTO `movie` (`name`, `subtitle`, `description`, `trailer`, `genrefk`, `entrycreatorfk`) VALUES (?, ?, ?, ?, ?, ?, ?);";
        $statement = $pdo->prepare($insertmoviesql);
        $statement->execute(array($_POST["moviename"], $_POST["subtitle"], $_POST["description"], $_POST["trailer"], $_POST["dropdown"], 6));
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
                <form action="./addmovie.php" method="post">
                    <p>Name:    <input type="text" name="moviename" placeholder="Movie name" maxlength="64" required/> </p>
                    <p>Subtitle:    <input type="text" name="subtitle" placeholder="Subtitle" maxlength="64" required/> </p>
                    <p>Description:    <input type="text" name="description" placeholder="Description" maxlength="512" required/> </p>
                    <p>Video-embed link:    <input type="text" name="trailer" placeholder="Trailer" maxlength="128" required/> </p>
                    <div class="select-style">
                        <select name="dropdown">
                            <option value="0" selected disabled hidden>Category</option>
                            <option value="1">Comedy</option>
                            <option value="2">Horror</option>
                            <option value="3">Sci-Fi</option>
                            <option value="4">Animation</option>
                        </select>
                    </div>
                    <button class="select-button" type="Submit" name="Submit">Submit</button>
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
