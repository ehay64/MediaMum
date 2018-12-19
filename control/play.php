<?php
    $film = $_GET["film"];
    $command = "vlc --fullscreen --one-instance --play-and-stop '../media/$film' >/dev/null 2>/dev/null &";

    shell_exec($command);
?>
