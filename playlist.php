<?php 

header("Content-Type: text/javascript; charset=UTF-8");

require 'libraries.php';

global $collection_directory;
$collection_directory = '/media/music/';
$url_directory = '/music/';

global $playlists_directory;
$playlists_directory = '/var/lib/mpd/playlists/';

$playlist = $_GET['playlist'];
$songs = getSongs($playlist);
$items = array();

foreach ($songs as $song) {
    $matches = getElements($song, $url_directory, $collection_directory);

    $element = new StdClass();
    $element->src = str_replace(' ', '%20', $matches['url']);
    $element->type = 'audio/mp3';

    $item = array();
    $item[] = $element;

    $config = new StdClass();
    $config->title = $matches['song'];
    $config->poster = str_replace(' ', '%20', $matches['cover']);

    $_item = (object)$item;
    $_item->config = $config;
    
    $items[] = $_item;
}

$container = new StdClass();
$container->playlist = $items;

echo json_encode($container, JSON_PRETTY_PRINT);
