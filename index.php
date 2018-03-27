<?php
    session_start();
    @$mid = $_SESSION['saved'];
    @$name = $_SESSION['username'];
    if(!isset($name)){
        header("location: ./login.php");
        die("kys");
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
        <div class="moviebox">
            <h1>Movies</h1>
            <p><?php echo "Logged in as $name"?>
            <a class="select-button" href=".\logout.php">Logout</a>
            <a class="select-button" href=".\addmovie.php">Add Movie</a></p>
        </div>
        <div class="main">
            <form class="dropdown" method="POST">
                <div class="select-style">
                    <select name="dropdown">
                        <option value="1" selected disabled hidden>Category</option>
                        <option value="1">Comedy</option>
                        <option value="2">Horror</option>
                        <option value="3">Sci-Fi</option>
                        <option value="4">Animation</option>
                    </select>
                </div>
                <button class="select-button" type="Submit" name="Submit">Submit</button>
            </form>
            <?php
                if(isset($_POST["Submit"])) {
                    $mid = $_POST['dropdown'];
                    $_SESSION['saved'] = $mid;
                }
                function echomovie($mid) {
                    $pdo = new PDO('mysql:host=localhost;dbname=movie2k', 'moviesql', 'toor');
                    $sql = "SELECT m.name, m.subtitle, m.description, m.trailer, g.genre FROM movie as m, genre as g WHERE m.mid = $mid AND m.genrefk = g.gid";
                    foreach ($pdo->query($sql) as $row) {
                        echo "<h2>Category: ".$row['genre']."</h2>";
                        echo "<div class=\"moviebox\"><h2>".$row['name']."</h2>";
                        echo "<h5>".$row['subtitle']."</h5>";
                        echo "<p>".$row['description']."</p>";
                        echo "<iframe src=\"".$row['trailer']."\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe></div>";
                    }
                }
                if(isset($mid)){
                    echomovie($mid);
                }
                echo "<p>Date of refresh: ".date("d.m.Y H:i:s")."<p>";
            ?>
        </div>
    </body>
</html>
