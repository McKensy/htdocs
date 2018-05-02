<?php
    session_start();
    @$mid = $_SESSION['saved'];
    @$name = $_SESSION['username'];
    $activenav = 'index';
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
    <body style="background-color: #555555;">
        <?php include './nav.php'; ?>
              <div class="row container">
                  <div class="card-panel col s12 m12 l3 center" style="margin: 1%">
                    <div class="row center">
                      <form method="POST">
                          <div class="input-field hoverable" style="margin: 7%">
                              <select name="dropdown" class="browser-default">
                                  <option value="" disabled selected>Choose your option</option>
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
                      <?php
                          if(isset($_POST["Submit"])) {
                              if(!isset($_POST["dropdown"])) {
                                  unset($mid);
                                  echo "<div class=\"card-panel col s12 m12 l8 right\" style=\"margin: 1%\">";
                                  echo "<h3 class=\"center-align\">Bitte wählen sie einen Film aus!</h3></div>";
                              }
                              else {
                                  $mid = $_POST['dropdown'];
                                  $_SESSION['saved'] = $mid;
                              }
                          }
                          function echomovie($mid) {
                          include './pdo.php';
                              $sql = "SELECT m.name, m.subtitle, m.description, m.trailer, g.genre FROM movie as m, genre as g WHERE g.gid = $mid AND m.genrefk = g.gid";
                              foreach ($pdo->query($sql) as $row) {
                                  echo "<div class=\"card-panel col s12 m12 l8 right\" style=\"margin: 1%\">";
                                  echo "<h3 class=\"center-align\">".$row['genre'].": ".$row['name']."</h3>";
                                  echo "<h5 class=\"center-align\">".$row['subtitle']."</h5>";
                                  echo "<blockquote>".$row['description']."</blockquote>";
                                  echo "<div class=\"video-container\" style=\"margin-bottom: 1%;\"><iframe src=\"".$row['trailer']."\"  width=\"853\" height=\"480\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe></div>";
                                  /*echo "<p>Date of refresh: ".date("d.m.Y H:i:s")."<p>";*/
                                  echo "</div>";
                              }
                          }
                          if(isset($mid)){
                              echomovie($mid);
                          }
                      ?>
              </div>

        <!--JavaScript at end of body for optimized loading-->
        <script type="text/javascript" src="./script.js"></script>
        <script type="text/javascript">
            var elem = document.querySelector('.sidenav');
            var instance = M.Sidenav.init(elem, options);
        </script>
    </body>
</html>
