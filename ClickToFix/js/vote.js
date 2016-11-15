function vote(elementId, issueId, vote) {    
    emptyElement("status_" + elementId);
    var ajax = ajaxObj("POST", "../php/vote.php");
    ajax.onreadystatechange = function() {
        if (ajaxReturn(ajax) == true) {
            let [ success, response ] = ajax.responseText.split("<br>");
            if (success != "success") {
                _("status_" + elementId).innerHTML = ajax.responseText;
            } else {
                _("vote_" + elementId).innerHTML = "Likes: " + response;
            }
        }
    }
    ajax.send("i="+issueId+"&v="+vote);
}