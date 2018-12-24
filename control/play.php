<?php
    $film = $_GET["film"];
    $command = "killall omxplayer.bin >/dev/null 2>&1; nohup omxplayer --no-keys '../media/$film/film.mp4' >/dev/null 2>&1 &";

    shell_exec($command);
?>
