var dataIds = [];
var z = 0;
var imageTags;

var currentSearch = "...";
var locked = false;

function loadImages() {
    if (reload) {
        dataIds = [];
        z = 0;
        imageTags = "";
        return;
    }
    
    var ajax = ajaxObj("POST", "../php/search.php");
    ajax.onreadystatechange = function() {
        if (ajaxReturn(ajax) == true) {
            if (reload) {
                dataIds = [];
                z = 0;
                imageTags = "";
                return;
            }
            
            if (imageTags[z]) {
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
    }
    ajax.send("i="+dataIds[z]);
}

function searchKeyUp(event) {
    var key = event.keyCode || event.which;
    if (key == 13 && !locked) {
        search(_('search_field').value);
    }
}

function search(value) {
    if (locked || currentSearch == value) {
        return;
    }
    currentSearch = value;
    locked = true;
    
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
                feed.empty();
                
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
                    
                    //comments
                    var owners = data[11];
                    var comments = data[12];
                    var commentTimes = data[13];
                    var commentLikes = data[14];
                    
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

                        elements += "<button class= 'btn btn-warning btn-lg right' onclick='toggleComment(" + i + ")'>Comments</button>";

                    elements +="</div>";//Ending of voting div
                    
                elements +="</div>"; //Ending of align-right div
                    
                    elements += "<div class = 'panel-body'><br><div class='panel-footer'><div style='display: none' id='comments_" + i + "'><p><strong>Comments</strong><br></p>";
                    if (owners[i].length != 0) {
                        elements += "";
                        for (var j = 0; j < owners[i].length; j++) {
                            elements += "<p>" + comments[i][j] + "</p><strong class='sizes'>" + owners[i][j] + " / " + commentTimes[i][j] + " / Likes: " + commentLikes[i][j] + "</strong><br><hr>";   
                        }
                    } else {
                        elements += "<p>No comments.</p>";
                    }
                    elements += "</div></div></div>";
                    
                    elements+= "<textarea id='comment_box_" + i + "' cols='15' rows='4' placeholder= 'Comment here...' class='form-control message' required></textarea>";
                    elements += "<button class'btn btn-danger'  onclick='submitComment(" + id + ", " + i + ")'>Submit</button>";
                    
            elements += "</div>"; //Ending of panel-footer div
                    
        elements +="</div>";//Ending of col-md-8 div

                    
                    elements += ""
                    
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
                
                dataIds = data[3];
                imageTags = $('.max');
                
                commentTags = $('.comment_body');
                
                locked = false;
                reload = false;
                
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
