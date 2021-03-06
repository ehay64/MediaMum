<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Media Mum</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>
        <link rel="stylesheet" href="https://code.getmdl.io/1.2.1/material.red-lime.min.css" />
        <script defer src="https://code.getmdl.io/1.2.1/material.min.js"></script>

        <style>
            #main
            {
                padding: 15px;
            }

            div.film-card
            {
                margin: 0 auto;
                width: inherit;
                max-width: 512px;
                margin-bottom: 10px;
            }

            img.poster
            {
                max-width: 70%;
                height: auto;
                display: block;
                margin: 0 auto;
                padding: 5px 0 5px 0;
            }
        </style>

        <script
            type="text/javascript">

            function playFilm(film)
            {
                var url = "../control/play.php?film=" + film;
                var xmlHttp = new XMLHttpRequest();
                xmlHttp.onreadystatechange = function()
                {
                    if (xmlHttp.readyState == 4 && xmlHttp.status == 200)
                    {
                        var notification = document.querySelector('.mdl-js-snackbar');
                        notification.MaterialSnackbar.showSnackbar(
                            {
                                message: 'Playing ' + film
                            }
                        );
                    }
                }
                xmlHttp.open("GET", url, true);
                xmlHttp.send(null);
            }
        </script>
    </head>

    <body>
        <div id="main">

            <?php
                $mediaLocation = "../media/";
                $films = preg_grep('/^([^.])/', scandir($mediaLocation));

                foreach ($films as $film)
                {
                    echo("
                        <div class=\"film-card mdl-card mdl-shadow--2dp\">
                            <div class=\"mdl-card__title\" style=\"background-color: rgb(244,67,54);\">
                                <h2 class=\"mdl-card__title-text\" style=\"color: white;\">$film</h2>
                            </div>

                            <div class=\"mdl-card__media\" style=\"background: white;\">
                                <img class=\"poster\" src=\"../media/$film/image.jpg\">
                            </div>

                            <div class=\"mdl-card__actions mdl-card--border\">
                                <a class=\"mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect\" onclick=\"playFilm('$film')\">
                                    Play
                                </a>
                            </div>

                            <div class=\"mdl-card__menu\">
                            </div>
                        </div>
                    ");
                }
            ?>

            <div id="demo-toast-example" class="mdl-js-snackbar mdl-snackbar">
                <div class="mdl-snackbar__text"></div>
                <button class="mdl-snackbar__action" type="button"></button>
            </div>

        </div>
    </body>
</html>
