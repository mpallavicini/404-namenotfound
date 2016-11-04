function logout() {
    var ajax = ajaxObj("POST", "../php/logout.php");
    ajax.onreadystatechange = function() {
        location.reload();
    }
    ajax.send();
}