function deleteIssue(issueId) {
    var ajax = ajaxObj("POST", "../php/delete.php");
    ajax.onreadystatechange = function() {
        if (ajaxReturn(ajax) == true) {
            if (ajax.responseText == "success") {
                window.location = "../pages/issueStatusTest.php";
            } else {
                _("status").innerHTML = ajax.responseText;
            }
        }
    }
    ajax.send("i="+issueId);
}