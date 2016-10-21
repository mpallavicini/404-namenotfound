function login() {
    var u = _("username").value;
    var p = _("password").value;
    if (u == "" || p == "")
        _("status").innerHTML = "No username or password entered.";
    else {
        _("loginbtn").style.display = "none";
        _("status").innerHTML = "Please wait...";
        var ajax = ajaxObj("POST", "../php/login.php");
        ajax.onreadystatechange = function() {
            if (ajax.responseText == "login_failed") {
                _("status").innerHTML = "Wrong username or password";
                _("loginbtn").style.display = "inline-block";
            } else {
                window.location = "../pages/ClickToFix.php";
            }
        }
        ajax.send("u="+u+"&p="+p);
    }
}