<?php

function validar(&$msg) {
    $allowedExts = array(
        "jpg", "jpeg", "gif", "png", "JPG"
        );
    $allowedMimes = array("image/gif", "image/jpeg", "image/png", "image/pjpeg");

    if (!empty($_FILES)) {
        $parts = explode(".", $_FILES["file"]["name"]);
        $extension = end($parts);

        if ($_FILES["file"]["error"] > 0) {
            $msg = "Error: " . $_FILES["file"]["error"] . "<br>";
        } else if ($_FILES["file"]["size"] > (200 * 1024 * 1024)) {
            $msg = "El archivo subido es de tamaño no admitido";
        } else if (!in_array($_FILES["file"]["type"], $allowedMimes)) {
            $msg = "El archivo subido no es una imagen";
        } else if (!in_array($extension, $allowedExts)) {
            $msg = "El archivo que subiste no tiene una extensión admitida";
        } else {
            return true;
        }
    }
    return false;
}

class Image {
    public $name;
    public $type;
    public $size;
    
    public $file;
    public $file_s;

    public $hash;
    public $quality;
    
    public $width;
    public $height;

    public function save() {
        $this->hash = sha1(rand(0, 65535));
        move_uploaded_file($this->file, dirname(__FILE__) . '/tmp/' . $this->hash);
        $this->file = dirname(__FILE__) . '/tmp/' . $this->hash;
        $this->file_s = dirname(__FILE__) . '/tmp/' . $this->hash . '-trans.jpg';
    }

    function calidad() {
        $img = new Imagick($this->file);
        $quality = $img->getImageCompressionQuality();

        $size = $this->size;
        
        $img->setCompression(Imagick::COMPRESSION_JPEG);
        
        while($size >= 2097152) {
            $img->setImageCompressionQuality($quality--);
            $size = strlen($img->getImageBlob());
        }

        $this->quality = $quality;
    }

    public function write($quality) {
        $img = new Imagick($this->file);
        $img->setCompression(Imagick::COMPRESSION_JPEG);
        $res = $img->setImageCompressionQuality($quality);
        $img->stripImage();
        $img->writeImage($this->file_s);
        
        return $res;
    }
}

function image_info($image) {
    $img = new Imagick($image->file);
    $d = $img->getImageGeometry();
    $image->width = $d['width'];
    $image->height = $d['height'];
}


$step = 1;
$msg = '';
$image = new Image();

if (validar($msg)) {
    $step = 2;
    $image->name = $_FILES['file']['name'];
    $image->type = $_FILES['file']['type'];
    $image->size = $_FILES['file']['size'];
    $image->file = $_FILES['file']['tmp_name'];
    image_info($image);
    $image->save();
    $image->calidad();
    $image->write($image->quality);
}

$step1 = <<<EOL
<h2>Paso 1</h2>
$msg
<p>Sube tu foto aqui:</p>
<form method="post" enctype="multipart/form-data" action="">
    <input type="file" name="file" />
    <input type="submit" value="Subir" />
</form>
EOL;

$step2 = <<<EOL
<h2>Paso 2</h2>
Upload: {$image->name}<br/>
Type: {$image->type}<br/>
Size: {$image->size} Bytes<br/>
Stored in: {$image->file}<br/>
Width: {$image->width}<br/>
Height: {$image->height}<br/>
New quality: {$image->quality}<br/>
<img src="/tmp/{$image->hash}" alt="" title="" width="100" />
<form method="post" action="">
    Nuevo ancho: <input type="text" name="width" />
    Nuevo alto: <input type="text" name="height" />
</form>
EOL;
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <body>
        <h1>SOMBRA</h1>
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
