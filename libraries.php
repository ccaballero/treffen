<?php

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

function getElements($song, $url_directory, $collection_directory) {
    $song = substr($song, strlen($collection_directory));
    
    $regex = '/(?<artist>.*)\/(?<year>[0-9]{4}) - (?<album>.*)\/(?<track>[0-9]{2}) - (?<song>.*)\.mp3/';
    $matches = array();
    
    preg_match($regex, $song, $matches);
    $matches['url'] = $url_directory . $song;
    
    $basedir = dirname($matches['url']);
    $cover = "/{$matches['artist']} - {$matches['album']} - frontal.jpg";
    $matches['cover'] = $basedir . $cover;

    return $matches;
}

function getcover($song) {
    global $collection_directory;
    global $url_directory;

    $matches = getElements($song, $url_directory, $collection_directory);   
    return str_replace(' ', '%20', $matches['cover']);
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
