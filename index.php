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
    <body>
        <nav>
            <div class="nav-wrapper">
                <a href=".\" class="brand-logo">Movies</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href=".\logout.php">Logout</a></li>
                    <li><a href=".\addmovie.php">Add Movie</a></li>
                </ul>
            </div>
        </nav>

        <div class="row">
            <div class="col s4"></div>
            <form method="POST">
                <div class="input-field col s4">
                    <select name="dropdown" class="browser-default">
                        <option value="0" disabled selected>Choose your option</option>
                        <option value="1">Comedy</option>
                        <option value="2">Horror</option>
                        <option value="3">Sci-Fi</option>
                        <option value="4">Animation</option>
                    </select>
                </div>
            <div class="col s4"></div>
        </div>
            <div class="row">
                <div class="col s4"></div>
                <button class="btn waves-effect waves-light col s4" type="Submit" name="Submit">Submit<i class="material-icons right">send</i></button>
                <div class="col s4"></div>
            </form>
            <div class="col s4"></div>
        </div>
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
        <!--JavaScript at end of body for optimized loading-->
        <script type="text/javascript" src="./script.js"></script>
    </body>
</html>
