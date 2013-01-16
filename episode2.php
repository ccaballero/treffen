<?php

function validar(&$msg = null) {
    $allowedExts = array("flv");
    $allowedMimes = array("video/x-flv");

    if (!empty($_FILES)) {
        $parts = explode(".", $_FILES["file"]["name"]);
        $extension = end($parts);

        if ($_FILES["file"]["error"] > 0) {
            $msg = "Error: " . $_FILES["file"]["error"] . "<br>";
        } else if ($_FILES["file"]["size"] > (200 * 1024 * 1024)) {
            $msg = "El archivo subido es de tamaño no admitido";
        } else if (!in_array($_FILES["file"]["type"], $allowedMimes)) {
            $msg = "El archivo subido no es un video";
        } else if (!in_array($extension, $allowedExts)) {
            $msg = "El archivo que subiste no tiene una extensión admitida";
        } else {
            return true;
        }
    }
    return false;
}

function guardar_video($path, $name) {
    return move_uploaded_file($path, dirname(__FILE__) . '/videos/' . $name);
}

function obtener_videos() {
    $files = array();
    
    if ($handle = opendir('videos')) {
        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {
                $files[] = $entry;
            }
        }
    }

    closedir($handle);
    
    return $files;
}

$msg = '';
$name = '';

$step = 1;

if (isset($_GET['video'])) {
    $name = urldecode($_GET['video']);
    $step = 2;
} else if (validar($msg)) {
    $name = $_FILES['file']['name'];
    if (guardar_video($_FILES['file']['tmp_name'], $name)) {
        $step = 2;
    } else {
        $msg = 'No pudo subirse el video';
    }
}

$list = '<ul>';
foreach (obtener_videos() as $video) {
    $list .= '<li><a href=?video=' . urlencode($video) . '">' . $video . '</a></li>';
}
$list .= '</ul>';


$step1 = <<<EOL
<h2>Paso 1</h2>
$msg
<p>Sube tu video aqui:</p>
<div class="list">$list</div>
<form method="post" enctype="multipart/form-data" action="">
    <input type="file" name="file" />
    <input type="submit" value="Subir" />
</form>
EOL;

$step2 = <<<EOL
<h2>Paso 2</h2>
<div class="list">$list</div>
<object type="application/x-shockwave-flash"
        data="flvplayer.swf"
        width="600" height="450">
    <param name="movie" value="flvplayer.swf" />
    <param name="allowFullScreen" value="true" />
    <param name="FlashVars" value="autoplay=1&showstop=1&showvolume=1&showtime=1&showfullscreen=1&videobgcolor=000000&buffermessage=...&flv=/videos/$name" />
</object>
EOL;

?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <style type="text/css">
            .list { float: right; width: 350px; margin: 10px 10px; border: 1px dashed #666666; }
            .list ul { list-style-type: none; }
            .list ul li { margin: 10px 0px;  }
            .list ul li a { padding: 4px 10px; background-color: #cccccc; font-size: 10pt; }
        </style>
    </head>
    <body>
        <h1>PIZARRA</h1>
        <?php
        switch ($step) {
            case 1:
                echo $step1;
            break;
            case 2:
                echo $step2;
            break;
        }
        ?>
    </body>
</html>
