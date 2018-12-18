<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Media Mum</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>
        <link rel="stylesheet" href="https://code.getmdl.io/1.2.1/material.red-lime.min.css" />
        <script defer src="https://code.getmdl.io/1.2.1/material.min.js"></script>

        <script
            type="text/javascript">

            function loadFunction(func)
            {
                //Set the iframe
                document.getElementById("content").innerHTML = "<iframe id=\"frame\" style=\"height: inherit;\" src=\"\"></iframe>";
                //Clear the options bar
                document.getElementById("options").innerHTML = "";

                switch (func)
                {
                    case "films":
                        //Set the title of the page
                        document.getElementById("title").innerHTML = "Films";
                        //Set the actual content of the page
                        document.getElementById('frame').src = "ui/films.php";
                        break;
                }

                return false;
            }
        </script>
    </head>

    <body>
        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">

            <header class="mdl-layout__header">
                <div class="mdl-layout__header-row">
                    <div class="mdl-layout-spacer" id="title">
                        Media Mum
                    </div>
                    <nav class="mdl-navigation" id="options">
                        <!-- this is where options go -->
                    </nav>
                </div>
            </header>

            <div class="mdl-layout__drawer">
                <span class="mdl-layout-title">Media Mum</span>
                <nav class="mdl-navigation" id="function">

                    <a class="mdl-navigation__link" onclick="loadFunction('films')">Films</a>

                </nav>
            </div>

            <main class="mdl-layout__content">
                <div class="page-content" style="height: 90vh;" id="content">
                    <!-- Your content goes here -->
                </div>
            </main>

        </div>
    </body>
</html>
