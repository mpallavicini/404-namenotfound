function deleteIssue() {
    var ids = [];
    var checkboxes = document.getElementsByName("checkbox");
    for (var i = 0, n = checkboxes.length; i < n; i++) {
        if (checkboxes[i].checked) {
            ids.push(checkboxes[i].value);
        }
    }
    
    if (ids.length == 0) {
        _("status").innerHTML = "No issues selected.";
        return;
    }

    var ajax = ajaxObj("POST", "../php/delete.php");
    ajax.onreadystatechange = function() {
        if (ajaxReturn(ajax) == true) {
            if (ajax.responseText == "success") {
                window.location = "../pages/admin.php";
            } else {
                _("status").innerHTML = ajax.responseText;
            }
        }
    }
    ajax.send("i="+JSON.stringify(ids));
}