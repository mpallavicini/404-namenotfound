function restrict(elem) {
	var tf = _(elem);
	var rx = new RegExp;
	if(elem == "email"){
		rx = /[' "]/gi;
	} else if(elem == "username"){
		rx = /[^a-z0-9]/gi;
	} else if(elem == "znumber") {
        rx = /[^0-9]/gi;
    }
	tf.value = tf.value.replace(rx, "");
}

function checkusername() {
	var u = _("username").value;
	if(u != ""){
		_("usernamestatus").innerHTML = 'Checking ...';
		var ajax = ajaxObj("POST", "../php/signup.php");
        ajax.onreadystatechange = function() {
	        if(ajaxReturn(ajax) == true) {
	            _("usernamestatus").innerHTML = ajax.responseText;
	        }
        }
        ajax.send("usernamecheck="+u);
	} else {
        _("usernamestatus").innerHTML = "Username required";
    }
}
function signup() {
    var z = _("znumber").value;
    var fn = _("firstname").value;
    var ln = _("lastname").value;
	var u = _("username").value;
	var e = _("email").value;
	var p1 = _("pass1").value;
	var p2 = _("pass2").value;
	var status = _("status");
    debugger;
	if(z == "" || fn == "" || ln == "" || u == "" || e == "" || p1 == "" || p2 == ""){
		status.innerHTML = "Fill out all of the form data";
	} else if(p1 != p2){
		status.innerHTML = "Your password fields do not match";
	} else {
        e += "@fau.edu";
		_("signupbtn").style.display = "none";
		status.innerHTML = 'Please wait ...';
		var ajax = ajaxObj("POST", "../php/signup.php");
        ajax.onreadystatechange = function() {
	        if(ajaxReturn(ajax) == true) {
	            if(ajax.responseText != "signup_success"){
					status.innerHTML = ajax.responseText;
					_("signupbtn").style.display = "block";
				} else {
					window.scrollTo(0,0);
					_("signupform").innerHTML = "OK "+fn+", check your email inbox and junk mail box at <u>"+e+"</u> in a moment to complete the sign up process by activating your account. You will not be able to do anything on the site until you successfully activate your account.";
				}
	        }
        }
        ajax.send("&z="+z+"&fn="+fn+"&ln="+ln+"&u="+u+"&e="+e+"&p="+p1);
	}
}