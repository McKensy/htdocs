<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style.css">
    <title>Filmauswahl</title>
</head>
<body>
    <div>
        <h1>Movies</h1>
        <p>Here you can choose the genre of movie you'd like to see:</p>
        <form action="filmauswahl.php" method="POST">
            <select name="dropdown">
                <option value="" selected disabled hidden>Select your genre</option>
                <option value="kom">Comedy</option>
                <option value="hor">Horror</option>
                <option value="sci">Sci-Fi</option>
                <option value="ani">Animation</option>
            </select>
            <button type="Submit" name="Submit">Best&auml;tigen</button>
        </form>
        <?php
        if(isset($_POST["Submit"])) {
        	$genre=$_POST['dropdown'];
        	  switch ($genre) {
        		  case "kom":
        			echo "<h1>Comedy</h1>";
        			echo "<h2>Deadpool (2016)</h2>";
        			echo "<h5>8/10 Stars | 1h 48min | Action, Adventure, Comedy | 12 February 2016 (USA) </h5>";
        			echo "<p>A fast-talking mercenary with a morbid sense of humor is subjected to a rogue experiment that leaves him with accelerated healing powers and a quest for revenge.</p>";
        			echo "<iframe width=\"853\" height=\"480\" src=\"https://www.youtube-nocookie.com/embed/_Dc1JcdJl1Q?rel=0\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>";
        			break;
        		  case "hor":
        			echo "<h1>Horror</h1>";
        			echo "<h2>Get Out (2017)</h2>";
        			echo "<h5>7.7/10 Stars | 1h 44min | Horror, Mystery, Thriller | 24 February 2017 (USA)</h5>";
        			echo "<p>A young African-American visits his white girlfriend's parents for the weekend, where his simmering uneasiness about their reception of him eventually reaches a boiling point.</p>";
        			echo "<iframe width=\"853\" height=\"480\" src=\"https://www.youtube-nocookie.com/embed/prscAXjME94?rel=0\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>";
                    break;
        		  case "sci":
        			echo "<h1>Sci-Fi</h1>";
                    echo "<h2>Star Wars: Episode VIII - The Last Jedi (2017)</h2>";
        			echo "<h5>7.4/10 Stars | 2h 32min | Action, Adventure, Fantasy | 15 December 2017 (USA)</h5>";
        			echo "<p>Rey develops her newly discovered abilities with the guidance of Luke Skywalker, who is unsettled by the strength of her powers. Meanwhile, the Resistance prepares for battle with the First Order.</p>";
        			echo "<iframe width=\"853\" height=\"480\" src=\"https://www.youtube-nocookie.com/embed/Q0CbN8sfihY?rel=0\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>";
        			break;
        		  case "ani":
        			echo "<h1>Animation</h1>";
                    echo "<h2>Spirited Away (2017)</h2>";
        			echo "<h5>8.6/10 Stars | 2h 5min | Animation, Adventure, Family | 20 July 2001 (Japan)</h5>";
        			echo "<p>During her family's move to the suburbs, a sullen 10-year-old girl wanders into a world ruled by gods, witches, and spirits, and where humans are changed into beasts.</p>";
        			echo "<iframe width=\"853\" height=\"480\" src=\"https://www.youtube-nocookie.com/embed/gOSP8sm_NoQ?rel=0\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>";
        			break;
        			}
        		}
        ?>
    </div>
    <p id="footer">Date of refresh: <?php echo date("d.m.Y H:i:s");?></p>
</body>
</html>
