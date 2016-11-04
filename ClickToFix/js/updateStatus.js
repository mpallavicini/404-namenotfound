function updateStatus(issueId, issueStatus) {
    if (issueStatus == "") {
        _("status").innerHTML = "Select a status.";
    } else {
        var ajax = ajaxObj("POST", "../php/updateStatus.php");
        ajax.onreadystatechange = function() {
            if (ajax.responseText == "success") {
                _("issueStatus").innerHTML = "Status: " + _(issueStatus).innerHTML;
                _("status").innerHTML = "Status changed to " + _(issueStatus).innerHTML;
            } else {
                _("status").innerHTML = ajax.responseText;
            }
        }
        ajax.send("s="+issueStatus+"&i="+issueId);
    }
}