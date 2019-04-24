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

            #searchBar
            {
                background: rgb(244,67,54);
                padding: 10px;
            }

            div.film-card
            {
                margin: 0 auto;
                width: inherit;
                max-width: 512px;
                margin-bottom: 10px;
            }

            img.thumbnail
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

            function getKey()
            {
                var xmlHttp = new XMLHttpRequest();
                xmlHttp.open("GET", "../apiKey", false);
                xmlHttp.send(null);
                return xmlHttp.responseText;
            }

            function search()
            {
                var key = getKey();
                var query = document.getElementById("query").value;

                var url = "https://www.googleapis.com/youtube/v3/search?part=snippet&maxResults=10&q=" + query + "&key=" + key;

                var xmlHttp = new XMLHttpRequest();
                xmlHttp.onreadystatechange = function()
                {
                    if (xmlHttp.readyState == 4 && xmlHttp.status == 200)
                        displayVideos(xmlHttp.responseText);
                }
                xmlHttp.open("GET", url, true);
                xmlHttp.send(null);
            }

            function displayVideos(text)
            {
                console.log(text);
                var videos = JSON.parse(text).items;

                for (var i = 0; i < videos.length; i++)
                {
                    var title = videos[i].snippet.title;
                    var image = videos[i].snippet.thumbnails.medium.url;
                    var id = videos[i].id.videoId;

                    var video = `
                        <div class="film-card mdl-card mdl-shadow--2dp">
                            <div class="mdl-card__title" style="background-color: rgb(244,67,54);">
                                <h2 class="mdl-card__title-text" style="color: white;">` + title + `</h2>
                            </div>

                            <div class="mdl-card__media" style="background: white;">
                                <img class="thumbnail" src="` + image + `">
                            </div>

                            <div class="mdl-card__actions mdl-card--border">
                                <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" onclick="playVideo('` + id + `')">
                                    Play
                                </a>
                            </div>

                            <div class="mdl-card__menu">
                            </div>
                        </div>
                        `;

                    document.getElementById("main").innerHTML += video;
                }
            }

        </script>
    </head>

    <body>
        <div id="searchBar">
            <input id="query" type="text">
            <button id="searchButton" class="mdl-button mdl-js-button mdl-button--raised" onclick="search()">
                Search
            </button>
        </div>

        <div id="main">

            <div id="demo-toast-example" class="mdl-js-snackbar mdl-snackbar">
                <div class="mdl-snackbar__text"></div>
                <button class="mdl-snackbar__action" type="button"></button>
            </div>

        </div>
    </body>
</html>
