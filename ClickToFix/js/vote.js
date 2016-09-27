function upvote() {    
    var ajax = ajaxObj("POST", "TestVote.php");  //Make a POST call to TestVote.php
    ajax.onreadystatechange = function() {
        if (ajaxReturn(ajax) == true) {
            document.getElementById("likes").innerHTML = ajax.responseText; //Update value of likes
        }
    }
    ajax.send("v=1");   //Send v with value 1
}
function downvote() {
    var ajax = ajaxObj("POST", "TestVote.php");
    ajax.onreadystatechange = function() {
        if (ajaxReturn(ajax) == true) {
            document.getElementById("likes").innerHTML = ajax.responseText;
        }
    }
    ajax.send("v=0");  //Value 0 means downvote
}