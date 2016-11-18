function _(x) {
	return document.getElementById(x);
}
function emptyElement(x) {
	_(x).innerHTML = "";
}
function toggleCheckboxes(source) {
    var checkboxes = document.getElementsByName('checkbox');
    for (var i = 0, n = checkboxes.length; i < n; i++) {
        checkboxes[i].checked = source.checked;
    }
}