<?php
    include_once("../php/vote.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>ClickToFix</title>

        <script src="../js/ajax.js"></script>
        <script src="../js/vote.js"></script>    
    </head>
    
    <body>
        <p>Testing...</p>
        <p>Likes: <span id="likes"><?php echo $likes; ?></span></p><br>
        <form name="vote-form" id="vote-form" onsubmit="return false;">
            <button id="upvote-btn" onclick="upvote()">Upvote</button>
            <button id="downvote-btn" onclick="downvote()">Downvote</button>
        </form>
    </body>
</html>