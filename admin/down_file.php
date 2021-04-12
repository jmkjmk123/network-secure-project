<?php
    $name = $_GET['name'];
    $name = str_replace("../", "", $name);//directory traversal

    Header("Content-Type: application/octet-stream");
    Header("Content-Disposition: attachment; filename=$name");
    Header("Content-Transfer-Encoding: binary");
    Header("Content-Length: ".filesize("./upload/$name"));

    $fd = fopen("./upload/$name", "rb");
    echo fread($fd, filesize("./upload/$name"));

?>