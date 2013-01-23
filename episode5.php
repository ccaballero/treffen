<?php

require 'id3.php';

global $collection_directory;
$collection_directory = '/media/music/';

global $playlists_directory;
$playlists_directory = '/var/lib/mpd/playlists/';

function getplaylists() {
    global $playlists_directory;
    $files = array();

    if ($handle = opendir($playlists_directory)) {
        while (false !== ($entry = readdir($handle))) {
            if (substr($entry, 0, 1) <> '.') {
                $files[] = substr($entry, 0, -13);
            }
        }
    }

    closedir($handle);
    sort($files);
    
    return $files;
}

$select_playlist = $_GET['playlist'];

function getSongs($playlist) {
    global $collection_directory;
    global $playlists_directory;

    $songs = array();

    foreach (file($playlists_directory . $playlist . ' playlist.m3u') as $song) {
        $dirs = explode('/', $song);
        $songs[] = trim($collection_directory . $song);
    }

    return $songs;
}

function getcover($song) {
    global $collection_directory;

    $song = substr($song, strlen($collection_directory));
    
    $regex = '/(?<artist>.*)\/(?<year>[0-9]{4}) - (?<album>.*)\/(?<track>[0-9]{2}) - (?<song>.*)\.mp3/';
    $matches = array();
    
    preg_match($regex, $song, $matches);
    
    $basedir = dirname($song);
    $url = "/music/{$matches['artist']}/{$matches['year']} - {$matches['album']}/{$matches['artist']} - {$matches['album']} - frontal.jpg";
    
    return str_replace(' ', '%20', $url);
}

function getComponent($id3, $tag) {
    $return = null;
    if (isset($id3[$tag])) {
        $return = $id3[$tag];
    }
    return none($return);
}

function none($string) {
    if (!empty($string)) {
        return $string;
    }
    return '';
}

?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Awesong</title>
        <link href="style.css" media="screen" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div id="menubar" class="bgcolor4">
            <ul class="left">
                <li><a class="color6" href="">Inicio</a></li>
                <li class="selected bgcolor6"><a class="color7" href="">Musica</a></li>
                <li><a class="color6" href="">Video</a></li>
                <li><a class="color6" href="">Pronosticos</a></li>
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
                <li<?php echo ($playlist == $select_playlist) ? ' class="selected"':'' ?>>
                    <a class="<?php echo ($playlist == $select_playlist) ? 'color7':'color4' ?>"
                       href="episode5.php?playlist=<?php echo $playlist ?>"><?php echo $playlist ?></a>
                </li>
            <?php } ?>
            </ul>
        </div>
        <div id="content" class="bgcolor5">
        <?php foreach (getSongs($select_playlist) as $song) { ?>
            <?php $id3 = getID3($song) ?>
            <div class="item">
                <div class="cover"><img src="<?php echo getcover($song) ?>" /></div>
                <div class="description">
                    <p><strong class="color4">Título:</strong> <?php echo getComponent($id3, 'TIT2') ?></p>
                    <p><strong class="color4">Artista:</strong> <?php echo getComponent($id3, 'TPE1') ?></p>
                    <p><strong class="color4">Album:</strong> <?php echo getComponent($id3, 'TALB') ?></p>
                </div>
            </div>
        <?php } ?>
        </div>
        <div id="player" class="bgcolor4"></div>
    </body>
</html>