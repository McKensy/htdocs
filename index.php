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
    <body style="background-color: grey;">
        <nav>
            <div class="nav-wrapper teal lighten-2">
                <a href=".\">  Logged in as <?php echo $name ?></a>
                <a href="#" class="brand-logo center">Movies</a>
                <ul id="nav-mobile" class="right">
                    <li><a href=".\logout.php">Logout</a></li>
                    <li><a href=".\addmovie.php">Add Movie</a></li>
                </ul>
            </div>
        </nav>
              <div class="row container">
                  <div class="card-panel col s12 m12 l3 center" style="margin: 1% 1% 1% 1%">
                    <div class="row">
                      <form method="POST">
                          <div class="input-field hoverable">
                              <select name="dropdown" class="browser-default">
                                  <option value="0" disabled selected>Choose your option</option>
                                  <option value="1">Comedy</option>
                                  <option value="2">Horror</option>
                                  <option value="3">Sci-Fi</option>
                                  <option value="4">Animation</option>
                              </select>
                            </div>
                        <button class="btn waves-effect waves-light" type="Submit" name="Submit">Submit<i class="material-icons right">send</i></button>
                      </form>
                    </div>
                  </div>
                    <div class="card-panel col s12 m12 l8 center" style="margin: 1% 1% 1% 1%">
                      <?php
                          if(isset($_POST["Submit"])) {
                              $mid = $_POST['dropdown'];
                              $_SESSION['saved'] = $mid;
                          }
                          function echomovie($mid) {
                              $pdo = new PDO('mysql:host=localhost;dbname=movie2k', 'moviesql', 'toor');
                              $sql = "SELECT m.name, m.subtitle, m.description, m.trailer, g.genre FROM movie as m, genre as g WHERE m.mid = $mid AND m.genrefk = g.gid";
                              foreach ($pdo->query($sql) as $row) {
                                  echo "<h2 class=\"center-align\">".$row['genre'].": ".$row['name']."</h2>";
                                  echo "<h5 class=\"center-align\">".$row['subtitle']."</h5>";
                                  echo "<blockquote>".$row['description']."</blockquote>";
                                  echo "<div class=\"video-container\" style=\"margin-bottom: 1%;\"><iframe src=\"".$row['trailer']."\"  width=\"853\" height=\"480\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe></div>";
                                  /*echo "<p>Date of refresh: ".date("d.m.Y H:i:s")."<p>";*/
                              }
                          }
                          if(isset($mid)){
                              echomovie($mid);
                          }
                      ?>
                    </div>
              </div>

        <!--JavaScript at end of body for optimized loading-->
        <script type="text/javascript" src="./script.js"></script>
        <script type="text/javascript">
            var elem = document.querySelector('.sidenav');
            var instance = M.Sidenav.init(elem, options);
        </script>
    </body>
</html>
