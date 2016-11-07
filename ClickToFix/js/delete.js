function deleteIssue(issueId) {
    var ajax = ajaxObj("POST", "../php/delete.php");
    ajax.onreadystatechange = function() {
        if (ajaxReturn(ajax) == true) {
            if (ajax.responseText == "success") {
                window.location = "../pages/issueStatusTest.php";
            } else {
                alert("Failure deleting issue #"+issueId);
            }
        }
    }
    ajax.send("i="+issueId);
}