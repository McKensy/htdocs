<nav>
    <div class="nav-wrapper teal lighten-2">
        <a href="./" class="brand-logo center">Movie2k</a>
        <ul id="nav-mobile">
            <li class="<?php if ($activenav == "index") { echo "active"; } ?>"><a href=".\index.php">Select Movie</a></li>
            <li class="<?php if ($activenav == "addmovie") { echo "active"; } ?>"><a href=".\addmovie.php">Add Movie</a></li>
            <li class="<?php if ($activenav == "showmovie") { echo "active"; } ?>"><a href=".\showmovie.php">All Movies</a></li>
        </ul>
        <ul id="nav-mobile" class="right">
            <li><a href=".\logout.php">Logout</a></li>
            <li><a href="#"><?php echo $name ?></a></li>
        </ul>
    </div>
</nav>
