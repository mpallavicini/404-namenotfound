function toggleComment(id) {
    var commentBox = document.getElementById(id).innerHTML;

        var ajax = ajaxObj("POST", "../php/comment_issue.php");
        ajax.onreadystatechange = function() {
            if (ajaxReturn(ajax)==true)
        {
            if (ajax.responseText == "login_failed") {
                
            } else {
                document.getElementById("msg2").innerHTML = ajax.responseText;
            }
         }
     }
        ajax.send("msg="+commentBox);
}