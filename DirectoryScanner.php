<?php

class Babel_Utils_DirectoryScanner
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
