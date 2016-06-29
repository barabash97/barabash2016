var url_base = document.URL;
var count = {};
var last_update = {};
$(document).ready(function () {
    var min=1, max=999999999;
    var random_string = randomString(10);
    var random_number = Math.floor(Math.random() * (max - min + 1)) + min;
    var id = random_string + "-" + random_number; //ID univoco della sessione

    last_update.id = 0;
    count.id = 0;
    pullDataComments(id, id_article);
    $(document).keyup(function (e) {
        if (e.keyCode == 13) {

        }
    });
});


function addComment() {
    var text_comment = $("#text_comment").val();
    if (text_comment == "")
        return false;
    $.get(url_base + "/saveComment", {text_comment: text_comment}, function (data) {
        if (data == 1) {
            $("#text_comment").val('');

        }
    });
}

function pullDataComments(id, id_article) { //Pool to load messages every 2 sec
    getComments(id, id_article);
    setTimeout(pullDataComments, 10000);
}

function getComments() { //Load messages
    $.get(url_base + "/getComments", {}, function (data)
    {
        if (data.length > 0) {
            for (var i = 0; i < data.length; i++) {
                var str = "";
                if (last_update.id == 0) {
                    str += setDivComment(data[i].text_comment, data[i].firstname, data[i].lastname, data[i].created_at, data[i].path_image);
                    last_update.id = data[i].timestamp;
                } else {
                    if (last_update.id < data[i].timestamp) {
                        str += setDivComment(data[i].text_comment, data[i].firstname, data[i].lastname, data[i].created_at, data[i].path_image);
                        last_update.id = data[i].timestamp;
                    }
                }
                if (str != "") {
                    $('#comments-box').prepend(str);
                    count.id = count.id + 1;
                    document.getElementById('count-comments').innerHTML = count.id;
                }
            }
        }
    });
}

function setDivComment(text_comment, firstname, lastname, date, image) {
    var text = "";
    var fullname = firstname + " " + lastname;
    text += "<li class='comment'>";
    text += "<div class='own-comment common-border'>";
    text += "<div class='col-lg-2 post-author-left no-padding'>";
    text += "<img class='shadow' src='/user_images/"+ image +"' alt='' width='100' height='100'>";
    text += "</div>";
    text += "<div class='col-lg-10 post-author-right no-padding'>";
    text += "<h4>" + fullname + " <span class='date'>" + date + "</span></h4>";
    text += "<p>" + text_comment + "</p>";
    text += "</div>";
    text += "  </div><!-- End Own Comment -->";
    text += "</li><!-- End Column -->";
    return text;
}

function randomString(len, charSet) {
    charSet = charSet || 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var randomString = '';
    for (var i = 0; i < len; i++) {
    	var randomPoz = Math.floor(Math.random() * charSet.length);
    	randomString += charSet.substring(randomPoz,randomPoz+1);
    }
    return randomString;
}


function updateLastDateComments(newtime) {
    document.cookie = "last_date_update_comments=" + newtime;
}

function getCookie(name) {
    var cookie = " " + document.cookie;
    var search = " " + name + "=";
    var setStr = null;
    var offset = 0;
    var end = 0;
    if (cookie.length > 0) {
        offset = cookie.indexOf(search);
        if (offset != -1) {
            offset += search.length;
            end = cookie.indexOf(";", offset)
            if (end == -1) {
                end = cookie.length;
            }
            setStr = unescape(cookie.substring(offset, end));
        }
    }
    return(setStr);
}


