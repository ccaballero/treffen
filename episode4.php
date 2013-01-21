<?php

require 'id3.php';

class DirectoryScanner
{
    public function scan_files($directory) {
        $files = array();

        $subdirectories = @scandir($directory);
        if ($subdirectories) {
            foreach ($subdirectories as $file) {
                if (($file <> '.') && ($file <> '..') && ($file <> 'lost+found')) {
                    $path = "$directory/$file";
                    if (is_dir($path)) {
                        $files = @array_merge($files, $this->scan_files($path));
                    } else if (is_file($path)) {
                        if (substr(strtolower($file), -3) == 'mp3') {
                            $files[] = array(
                                'directory' => $directory,
                                'file' => $file,
                            );
                        }
                    }
                }
            }
        }

        return $files;
    }
}

function getcover($id3) {
    $cover = $id3["Attached picture"];
    $res = file_put_contents(dirname(__FILE__) . '/tmp/asdf.jpg', $cover);
    return '/tmp/asdf.jpg';
}

$genders = array(
    'Rock', 'Alternativo', 'Reggae', 'Punk Rock', 'Indie Rock',
    'Hard Rock', 'Metal', 'Hip hop', 'Funk', 'Pop', 'Blues', 'Jazz',
);
$select_gender = 'Rock';

$dir = '/home/jacobian/Música/Muse/2003 - Absolution';

$scanner = new DirectoryScanner();
$files = $scanner->scan_files($dir);

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
            <?php foreach ($genders as $gender) { ?>
                <li<?php echo ($gender == $select_gender) ? ' class="selected"':'' ?>>
                    <a class="<?php echo ($gender == $select_gender) ? 'color7':'color4' ?>" href="#"><?php echo $gender ?></a>
                </li>
            <?php } ?>
            </ul>
        </div>
        <div id="content" class="bgcolor5">
        <?php foreach ($files as $file) { ?>
            <?php $id3 = getID3($file['directory'] . '/'. $file['file']) ?>
            <div class="item">
                <div class="cover"><img src="cover.jpg" /></div>
                <div class="description">
                    <p><strong class="color4">Título:</strong> <?php echo $id3['TIT2'] ?></p>
                    <p><strong class="color4">Artista:</strong> <?php echo $id3['TPE1'] ?></p>
                    <p><strong class="color4">Album:</strong> <?php echo $id3['TALB'] ?></p>
                </div>
            </div>
        <?php } ?>
        </div>
        <div id="player" class="bgcolor4"></div>
    </body>
</html>