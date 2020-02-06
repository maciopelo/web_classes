<?php

$dirname = "maciej/";

if (is_dir($dirname)){
        $dir_handle = opendir($dirname);
        echo "jestem";
}

while($file = readdir($dir_handle)) {
        echo $file;
if ($file != "." && $file != "..") {
    if (!is_dir($dirname."/".$file))
            unlink($dirname."/".$file);
    else
            delete_directory($dirname.'/'.$file);
}
}
closedir($dir_handle);
rmdir($dirname);
return true;

?>