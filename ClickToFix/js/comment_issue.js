function submitComment(issue_id, index) {
    var commentBox = _('comment_box_' + index);
    var msg = commentBox.value;

    var ajax = ajaxObj("POST", "../php/comment_issue.php");
    ajax.onreadystatechange = function() {
        if (ajaxReturn(ajax) == true) {
            var data = JSON.parse(ajax.responseText);
            
            if (data[0] == "success") {
                var comments = _('comments_' + index);
                var element = "<p>" + data[2] + "</p><strong class='sizes'>" + data[1] + " / " + data[3] + " / Likes: " + data[4] + "</strong><br><hr>";
                
                comments.innerHTML = element + comments.innerHTML;
                
                commentBox.value = "";
            } else {
                alert(ajax.responseText);
            }
         }
     }
    ajax.send("i="+issue_id+"&msg="+msg);
}

function toggleComment(index) {
    var comments = _('comments_' + index);
    comments.style.display = comments.style.display == 'none' ? 'block':'none';
}