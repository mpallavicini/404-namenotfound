function login() {
    var e = _("email").value;
    var p = _("password").value;
    var r = _("remember").checked;
    if (e == "" || p == "")
        _("status").innerHTML = "No username or password entered.";
    else {
        _("loginbtn").style.display = "none";
        _("status").innerHTML = "Please wait...";
        var ajax = ajaxObj("POST", "../php/login.php");
        ajax.onreadystatechange = function() {
            if(ajaxReturn(ajax) == true) {
                if (ajax.responseText == "login_failed") {
                    _("status").innerHTML = "Wrong email or password";
                    _("loginbtn").style.display = "inline-block";
                } else {
                    window.location = "../pages/ClickToFix.php";
                }
            }
        }
        if (r == true) {
            ajax.send("e="+e+"&p="+p+"&r="+r);
        } else {
            ajax.send("e="+e+"&p="+p);
        }
    }
}