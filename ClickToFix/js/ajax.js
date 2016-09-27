function ajaxObj(meth, url) {   //Make a request to the server (Send POST call for example)
	var x = new XMLHttpRequest();
	x.open(meth, url, true);
	x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	return x;
}
function ajaxReturn(x) {  //Check if request was successful
	if(x.readyState == 4 && x.status == 200){
	    return true;
	}
}