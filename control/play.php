<?php
    $film = $_GET["film"];
    $command = "killall omxplayer.bin >/dev/null 2>/dev/null; nohup omxplayer -b --no-keys '../media/$film/film.mp4' >/dev/null 2>/dev/null &";

    $output = shell_exec($command);
    echo $output;
?>
