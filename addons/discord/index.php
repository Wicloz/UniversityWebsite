<?php
require 'connection.php';

if (isset($_POST['action']) && !empty($_POST['action'])) {
    if (in_array($_POST['action'], $allowedCommands)) {
        $command = '!'.$_POST['action'];
        if (isset($_POST['info']) && !empty($_POST['info'])) {
            $command .= ' '.$_POST['info'];
        }
        postCommand($command);
    }
}
?>

<head>
    <title>W.M.B.W.I.</title>
    <meta charset="utf-8">
    <meta name="description" content="Wheatley Music Bot Web Interface, for lazy people."/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script>
        $(function(){
            var selectedVolume = $('#selectedVolume');
            $('#volumeSlider').change(function(){
                selectedVolume.html(this.value);
                setVolume(false);
            });
            $('#volumeSlider').change();
        });
    </script>
    <script src="scripts/setVolume.js"></script>
</head>
<body>
    <div id="content" class="container-fluid">
        <div class="jumbotron">
            <h1>Wheatley Music Bot Web Interface <span style="font-size:22">(V1.9)</span></h1>
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
                        <input type="hidden" name="info" value="15">
                        <div class="col-sm-1">
                            <input id="resetVolume" class="button" type="submit" value="Reset Volume">
                        </div>
                    </form>
                    <form action="" method="POST">
                        <input type="hidden" name="action" value="volume">
                        <div class="col-sm-1">
                            <input class="button" type="submit" value="Submit Volume">
                        </div>
                        <div class="col-sm-3">
                            <input id="volumeSlider" type="range" name="info" min="1" max="100" value="<?php echo(getVolume()); ?>" step="1">
                        </div>
                        <div class="col-sm-3">
                            <span class="bare-text">Selected Volume: <span id="selectedVolume">15</span>%</span>
                            <span class="bare-text"> - </span>
                            <span class="bare-text">Current Volume: <span id="currentVolume"><?php echo(getVolume()); ?></span>%</span>
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
                <!--Skip current song-->
                <div class="row">
                    <div class="col-sm-2">
                        <form action="" method="POST">
                            <input type="hidden" name="action" value="skip">
                            <input class="button" type="submit" value="Skip Song">
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
                <!--Random debug stuff-->
                <div class="row">
                    <div class="col-sm-2">
                        <span style="color:red">
                            <?php
                            ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

