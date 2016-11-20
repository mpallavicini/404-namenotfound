var dataIds = [];
var z = 0;
var imageTags;

function loadImages() {
    if (reload) {
        return;
    }
    
    var ajax = ajaxObj("POST", "../php/search.php");
    ajax.onreadystatechange = function() {
        if (ajaxReturn(ajax) == true) {
            if (reload) {
                return;
            }            
            
            imageTags[z].src = 'data:image/jpeg;base64,' + ajax.responseText;
            
            // Get the modal
            var modal = _('myModal');

            // Get the image and insert it inside the modal - use its "alt" text as a caption
            var img = imageTags[z];
            var modalImg = _("img01");
            var captionText = _("caption");
            img.onclick = function(){
                modal.style.display = "block";
                modalImg.src = this.src;
                captionText.innerHTML = this.alt;
            }

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
              modal.style.display = "none";
            }
            
            if (z < imageTags.length - 1) {
                z++;
                loadImages();
            } else {
                dataIds = [];
                z = 0;
                imageTags = "";
            }
        }
    }
    ajax.send("i="+dataIds[z]);
}

function searchKeyUp(event) {
    var key = event.keyCode || event.which;
    if (key == 13) {
        search(_('search_field').value);
    }
}

function search(value) {
    reload = true;
    
    $('#feed').empty();
    _('loader').style.display = "block";
    
    z = 0;
    dataIds = [];
    imageTags = [];
    
    var ajax = ajaxObj("POST", "../php/search.php");
    ajax.onreadystatechange = function() {
        if (ajaxReturn(ajax) == true) {
            var data = JSON.parse(ajax.responseText);

            if (data[0] == "success") {
                var feed = $('#feed');
                
                var elements = "";
                
                for (var i = 0; i < data[1]; i++) {
                    var id = data[3][i];
                    var name = data[4][i];
                    var message = data[5][i];
                    var time = data[6][i];
                    var location = data[7][i];
                    var likes = data[8][i];
                    
                    elements += '<div class="row"><div class="col-md-9"><div class="panel-heading">';
                    if (data[2]) {
                        elements += "<input type='checkbox' name='checkbox' value='" + id + "'> ";
                    }
                    elements += "<strong>" + name + "</strong></div>";
                    
                    elements += "<div class='panel-body'>" + message + "</div>";
                    
                    elements += "</div><div class='col-md-2'>";
                    
                    elements += '<img class="max image_popup" alt="' + name + '" id="image_' + i + '" src="../img/Loading_icon.gif" />';
                    
                    elements += "</div></div>";
                    
                    elements += "<div class='panel-footer'><strong>Posted: </strong>" + time + "<strong> <div class='align-right'>Issue(s) reported at: </strong>" + location + "</div></div>";
                    
                    elements += "<button class= 'panel-body' onclick='toggleComment(`comment_" + i + "`)' id='comment_" + i + "'>Comment</button>";
                    
                    elements += "<div class='container'><div class='row'>";
                    elements += "<div class='col-sm-4'>";
                    elements += "<span class='panel-body' id='vote_" + i + "'>" + likes + "</span></div>";
                    elements += "<div class='col-sm-4'>";
                    elements += "<button class='block btn btn-lg' onclick='vote(" + i + ", " + id + ", 1)'><i class='fa fa-thumbs-up' aria-hidden='true'></i></button>";
                    elements += "<button class='btn btn-lg' onclick='vote(" + i + ", " + id + ", 0)'><i class='fa fa-thumbs-down' aria-hidden='true'></i></button>";
                    elements += "</div></div></div>";
                     
                    elements += "<span class='panel-body' id='status_" + i + "'></span>";
                    
                    elements += "<hr>";
                }
                
                feed.append(elements);
                _('loader').style.display = 'none';

                reload = false;
                
                dataIds = data[3];
                imageTags = $('.max');
                loadImages();
            } else {
                alert(ajax.responseText);
            }
        }
    }
    ajax.send("s="+value);
}

function setPopupImg(index) {
    _('image_popup').src = _('image_' + index).src;
}