<head>
    <title>W.M.B.W.I.</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
    <div id="content" class="container-fluid">
        <div class="jumbotron">
            <h1>Wheatley Music Bot Web Interface <span style="font-size:22">(V1.2)</span></h1>
            <p>For people too lazy to type the commands, or for people that just love buttons.</p>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <!--Play a song or playlist-->
                <div class="row">
                    <form action="" method="POST">
                        <div class="col-sm-1">
                            <input type="hidden" name="action" value="play">
                            <input class="button" type="submit" value="Play">
                        </div>
                        <div class="col-sm-9">
                            <input class="field" type="text" name="info" placeholder="Enter a song to be played ...">
                        </div>
                    </form>
                </div>
                <!--Search a song-->
                <div class="row">
                    <form action="" method="POST">
                        <div class="col-sm-1">
                            <input type="hidden" name="action" value="search">
                            <input class="button" type="submit" value="Search">
                        </div>
                        <div class="col-sm-9">
                            <input class="field" type="text" name="info" placeholder="Enter a max of 5 keywords ...">
                        </div>
                    </form>
                </div>
                <!--Volume settings-->
                <div class="row">
                    <form action="" method="POST">
                        <input type="hidden" name="action" value="volume">
                        <div class="col-sm-1">
                            <input class="button" type="submit" value="Submit Volume">
                        </div>
                        <div class="col-sm-11">
                              <input type="radio" name="info" value="5"> <span>5%</span>
                              <input type="radio" name="info" value="10"> <span class="bare-text">10%</span>
                              <input type="radio" name="info" value="15" checked> <span class="bare-text">15%</span>
                              <input type="radio" name="info" value="20"> <span class="bare-text">20%</span>
                              <input type="radio" name="info" value="25"> <span class="bare-text">25%</span>
                              <input type="radio" name="info" value="30"> <span class="bare-text">30%</span>
                              <input type="radio" name="info" value="35"> <span class="bare-text">35%</span>
                              <input type="radio" name="info" value="40"> <span class="bare-text">40%</span>
                              <input type="radio" name="info" value="45"> <span class="bare-text">45%</span>
                              <input type="radio" name="info" value="50"> <span class="bare-text">50%</span>
                              <input type="radio" name="info" value="55"> <span class="bare-text">55%</span>
                              <input type="radio" name="info" value="60"> <span class="bare-text">60%</span>
                              <input type="radio" name="info" value="65"> <span class="bare-text">65%</span>
                              <input type="radio" name="info" value="70"> <span class="bare-text">70%</span>
                              <input type="radio" name="info" value="75"> <span class="bare-text">75%</span>
                              <input type="radio" name="info" value="80"> <span class="bare-text">80%</span>
                              <input type="radio" name="info" value="85"> <span class="bare-text">85%</span>
                              <input type="radio" name="info" value="90"> <span class="bare-text">90%</span>
                              <input type="radio" name="info" value="95"> <span class="bare-text">95%</span>
                              <input type="radio" name="info" value="100"> <span class="bare-text">100%</span>
                        </div>
                    </form>
                </div>
                <!--Pause and Resume-->
                <div class="row">
                    <div class="col-sm-1">
                        <form action="" method="POST">
                            <input type="hidden" name="action" value="pause">
                            <input class="button" type="submit" value="Pause Song">
                        </form>
                    </div>
                    <div class="col-sm-1">
                        <form action="" method="POST">
                            <input type="hidden" name="action" value="resume">
                            <input class="button" type="submit" value="Resume Song">
                        </form>
                    </div>
                </div>
                <!--Check the queue-->
                <div class="row">
                    <div class="col-sm-2">
                        <form action="" method="POST">
                            <input type="hidden" name="action" value="queue">
                            <input class="button" type="submit" value="Check Queue">
                        </form>
                    </div>
                </div>
                <!--Shuffle the queue-->
                <div class="row">
                    <div class="col-sm-2">
                        <form action="" method="POST">
                            <input type="hidden" name="action" value="shuffle">
                            <input class="button" type="submit" value="Shuffle Queue">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<?php
require 'connection.php';

if (isset($_POST['action']) && !empty($_POST['action'])) {
    $command = '!'.$_POST['action'];
    if (isset($_POST['info']) && !empty($_POST['info'])) {
        $command .= ' '.$_POST['info'];
    }
    postCommand($command);
}
?>