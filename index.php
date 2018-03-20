<?php
    session_start();
    $genre = $_SESSION['saved'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style.css">
    <title>Movie8k</title>
</head>
<body>
    <div class="main">
        <h1>Movies</h1>
        <form class="dropdown" action="/" method="POST">
            <div class="select-style">
                <select name="dropdown">
                    <option value="default" selected disabled hidden>Category</option>
                    <option value="kom">Comedy</option>
                    <option value="hor">Horror</option>
                    <option value="sci">Sci-Fi</option>
                    <option value="ani">Animation</option>
                </select>
            </div>
            <button class="select-button" type="Submit" name="Submit">Submit</button>
        </form>
        <?php
            if(isset($_POST["Submit"])) {
                $genre=$_POST['dropdown'];
                $_SESSION['saved'] = $genre;
            }
            function echomovie($hia) {
                switch ($hia) {
                    case "kom":
                        echo "<h2>Category: Comedy</h2>";
                        echo "<div class=\"moviebox\"><h2>Deadpool</h2>";
                        echo "<h5>8/10 Stars | 1h 48min | Action, Adventure, Comedy | 12 February 2016 (USA) </h5>";
                        echo "<p>A fast-talking mercenary with a morbid sense of humor is subjected to a rogue experiment that leaves him with accelerated healing powers and a quest for revenge.</p>";
                        echo "<iframe src=\"https://www.youtube-nocookie.com/embed/_Dc1JcdJl1Q?rel=0\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe></div>";
                        break;
                    case "hor":
                        echo "<h2>Category: Horror</h2>";
                        echo "<div class=\"moviebox\"><h2>Get Out</h2>";
                        echo "<h5>7.7/10 Stars | 1h 44min | Horror, Mystery, Thriller | 24 February 2017 (USA)</h5>";
                        echo "<p>A young African-American visits his white girlfriend's parents for the weekend, where his simmering uneasiness about their reception of him eventually reaches a boiling point.</p>";
                        echo "<iframe src=\"https://www.youtube-nocookie.com/embed/prscAXjME94?rel=0\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe></div>";
                        break;
                    case "sci":
                        echo "<h2>Category: Sci&ndash;Fi</h2>";
                        echo "<div class=\"moviebox\"><h2>Star Wars: Episode VIII - The Last Jedi</h2>";
                        echo "<h5>7.4/10 Stars | 2h 32min | Action, Adventure, Fantasy | 15 December 2017 (USA)</h5>";
                        echo "<p>Rey develops her newly discovered abilities with the guidance of Luke Skywalker, who is unsettled by the strength of her powers. Meanwhile, the Resistance prepares for battle with the First Order.</p>";
                        echo "<iframe src=\"https://www.youtube-nocookie.com/embed/Q0CbN8sfihY?rel=0\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe></div>";
                        break;
                    case "ani":
                        echo "<h2>Category: Animation</h2>";
                        echo "<div class=\"moviebox\"><h2>Spirited Away</h2>";
                        echo "<h5>8.6/10 Stars | 2h 5min | Animation, Adventure, Family | 20 July 2001 (Japan)</h5>";
                        echo "<p>During her family's move to the suburbs, a sullen 10-year-old girl wanders into a world ruled by gods, witches, and spirits, and where humans are changed into beasts.</p>";
                        echo "<iframe src=\"https://www.youtube-nocookie.com/embed/gOSP8sm_NoQ?rel=0\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe></div>";
                        break;
                    default:
                        echo "<h1>Error: Please select a genre</h1>";
                        break;
                }
            }
            if(isset($genre)){
                echomovie($genre);
            }
            echo "<p>Date of refresh: "; echo date("d.m.Y H:i:s");
            echo "<p>";
        ?>
    </div>
</body>
</html>
