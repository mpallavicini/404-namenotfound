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
                    var anonymity = data[9][i];
                    var user = data[10][i];
                    
            elements +="<div class='row'>";
                elements +="<div class='col-md-8'>";
                    elements +="<div class='panel-heading'>";
                    if (data[2]) {
                        elements += "<input type='checkbox' name='checkbox' value='" + id + "'> ";
                    }
                        elements += "<strong>" + name + "</strong>";
                    elements +="</div>";//Ending of panel-heading div

                    elements += "<div class='panel-body'>" + message + "</div>";

                elements += "</div>";//Ending of col-md-12 div

                elements += "<div class='panel-body col-md-4'>";

                    elements += '<img class="max image_popup" alt="' + name + '" id="image_' + i + '" src="../img/Loading_icon.gif" />';

                elements += "</div>";//Ending of Panel-body div
             elements +="</div>";//Ending of row div
                    
        elements += "<div class='col-md-8'>";
            elements += "<div class='panel-footer'><strong>Posted by: </strong>" + user + "<strong></strong> " + time + "<strong>";
                elements +="<div class='align-right'>Issue(s) reported at: </strong>" + location ;
                    elements += "<div class= 'voting'>";
                        elements +="<button class='btn btn-success btn-lg' onclick='vote(" + i + ", " + id + ", 1)'> <i class='fa fa-thumbs-up' aria-hidden='true'> </i> </button>";

                        elements += "<span class='block' id='vote_" + i + "'>" + likes + "</span>";

                        elements +="<button class='btn btn-danger btn-lg' onclick='vote(" + i + ", " + id + ", 0)'> <i class='fa fa-thumbs-down' aria-hidden='true'></i></button>";

                        elements += "<button class= 'btn btn-warning btn-lg right' onclick='toggleComment(`comment_" + i + "`)' id='comment_" + i + "'>Comments</button>";

                    elements +="</div>";//Ending of voting div
                    
                elements +="</div>"; //Ending of align-right div
                    elements += "<div class = 'panel-body'><br><div class='panel-footer'><p><strong>Comments</strong><br></p> <p>Great find <strong>Marco</strong>!  I thought I saw that this morning when I walked passed it, but I was not able to stop and snap a picture since I was in a hurry.</p><strong class='sizes'>Brandon Kelm</strong><br></div></div>"
                    elements+= "<textarea cols='15' rows='4' placeholder= 'Comment here...' class='form-control message' required></textarea>"
            elements += "</div>"; //Ending of panel-footer div
                    
        elements +="</div>";//Ending of col-md-8 div

                    
                    
                    
                elements += "<div class='container'>";
                     elements +="<div class='row'>";
                        elements += "<div class='col-sm-4'>";
                    
                    //elements += "<div class='col-sm-4'>";
                   // elements += "<button class='block btn btn-lg' onclick='vote(" + i + ", " + id + ", 1)'><i class='fa fa-thumbs-up' aria-hidden='true'></i></button>";
                    //elements += "<button class='btn btn-lg' onclick='vote(" + i + ", " + id + ", 0)'><i class='fa fa-thumbs-down' aria-hidden='true'></i></button>";
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
