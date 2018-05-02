<?php
    session_start();
    include './pdo.php';
    @$name = $_SESSION['username'];
    $activenav = 'addmovie';
    if(!isset($name)){
        header("location: ./login.php");
        die("kys");
    }
    if(isset($_POST["Submit"])) {
        $insertmoviesql = "INSERT INTO `movie` (`mid`, `name`, `subtitle`, `description`, `trailer`, `genrefk`, `entrycreatorfk`) VALUES (NULL, ?, ?, ?, ?, ?, ?);";
        $statement = $pdo->prepare($insertmoviesql);
        $statement->execute(array($_POST["moviename"], $_POST["subtitle"], $_POST["description"], $_POST["trailer"], $_POST["dropdown"], '11'));
        header("location: ./index.php");
        die("Login successful.");
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
        <?php include './nav.php'; ?>
        <div class="container">
          <div class="card-panel" style="margin: 1% 1% 1% 1%">
            <h3 class="center">Add a movie</h3>
              <form action="./addmovie.php" method="post">
                  <p>Name:    <input type="text" name="moviename" class="validate" placeholder="The name of the Movie" maxlength="64" required/> </p>
                  <p>Subtitle:    <input type="text" name="subtitle" placeholder="Example: 7.7/10 Stars | 1h 44min | Horror, Mystery, Thriller | 24 February 2017 (USA)" maxlength="64" required/> </p>
                  <p>Description:    <input type="text" name="description" placeholder="A little description of the movie." maxlength="512" required/> </p>
                  <p>Video-embed link:    <input type="text" name="trailer" placeholder="Example: https://www.youtube.com/embed/watch?v=-40fLtf9Hio" maxlength="128" required/> </p>
                  <div class="input-field hoverable">
                      <select name="dropdown" class="browser-default" required>
                          <option value="0" selected disabled>Category</option>
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
        function alert($msg) {
            echo "<script type='text/javascript'>alert('$msg');</script>";
        }
        ?>
    </body>
</html>
