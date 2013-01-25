<?php
require 'id3.php';
require 'libraries.php';

global $collection_directory;
$collection_directory = '/media/music/';
$url_directory = '/music/';

global $playlists_directory;
$playlists_directory = '/var/lib/mpd/playlists/';

$select_playlist = '';
$content = "";
$frontpage = true;

if (isset($_GET['playlist'])) {
    $select_playlist = $_GET['playlist'];
    $frontpage = false;

    foreach (getSongs($select_playlist) as $song) {
        $id3 = getID3($song);

        $cover = getcover($song);
        $title = getComponent($id3, 'TIT2');
        $artist = getComponent($id3, 'TPE1');
        $album = getComponent($id3, 'TALB');

        $content .= <<<EOL
<div class="item">
    <div class="cover">
        <img src="$cover" />
    </div>
    <div class="description">
    <p><strong class="color4">Título:</strong> $title</p>
    <p><strong class="color4">Artista:</strong> $artist</p>
    <p><strong class="color4">Album:</strong> $album</p>
    </div>
</div>
EOL;
    }
} else {
    foreach (getplaylists() as $playlist) {
        $content .= <<<EOL
<div class="item">
    <div class="cover"></div>
    <div class="description">
    <p><a href="episode6.php?playlist=$playlist">$playlist</a></p>
    </div>
</div>
EOL;
    }
}
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Awesong</title>
        <link media="screen" rel="stylesheet" type="text/css" href="style.css" />
        <link type="text/css" media="screen" rel="stylesheet" href="junk.css" />

	<script type="text/javascript" src="jquery.min.js"></script>
	<script type="text/javascript" src="speakker-big-1.2.13r171.min.js"></script>
	<script type="text/javascript">$(document).ready(function() {projekktor('.projekktor');});</script>
    </head>
    <body>
        <div id="menubar" class="bgcolor4">
            <ul class="left">
                <li><a class="color6" href="">Inicio</a></li>
                <li class="selected bgcolor6"><a class="color7" href="episode6.php">Musica</a></li>
            </ul>
            <div id="search" class="right">
                <form method="get" action="">
                    <input name="q" type="text" />
                </form>
            </div>
        </div>
        <div id="list">
            <ul>
            <?php foreach (getplaylists() as $playlist) { ?>
                <li<?php ($playlist == $select_playlist) ? ' class="selected"' : '' ?>>
                    <a class="<?php echo ($playlist == $select_playlist) ? 'color7' : 'color4' ?>"
                       href="episode6.php?playlist=<?php echo $playlist ?>"><?php echo $playlist ?></a>
                </li>
            <?php } ?>
            </ul>
        </div>
        <div id="content" class="bgcolor5">
            <?php echo $content ?>
        </div>
        <div id="player" class="bgcolor4">
            <audio class="projekktor speakker dark">
                <source src="playlist.json?playlist=<?php echo $_GET['playlist']?>" type="application/json"/>
            </audio>
        </div>
    </body>
</html>
