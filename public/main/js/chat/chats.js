var url_base = document.URL;
var last_update = {};
console.log(last_update);
$(document).load(function () {

    $('#chat-window').scrollTop("1500");
});


$(document).ready(function () {
    console.log(last_update);
    (function () {
        var dialog = dialog_id;
        last_update.dialog = 0;
        pullData(dialog);
    })();

    $(document).keyup(function (e) {
        if (e.keyCode == 13) {
            sendMessage();
            $('#chat-window').scrollTop("6000");
        }
    });
});



function sendMessage() {
    var text_message = $("#text_message").val();
    var id_dialog = $("#id_dialog").val();
    if (text_message == "")
        return false;
    $.get(url_base + "/sendMessage", {text_message: text_message, id_dialog: id_dialog}, function (data) {
        if (data == 1) {
            $("#text_message").val('');

        }
    });
}

function pullData(dialog) { //Pool to load messages every 2 sec
    getMessages(dialog);
    setTimeout(pullData, 2000, dialog);
}

function getMessages(dialog) { //Load messages

    var id_dialog = $("#id_dialog").val();
    $.get(url_base + "/receiveMessage", {id_dialog: id_dialog}, function (data)
    {
        if (data.length > 0) {
            for (var i = 0; i < data.length; i++) {
                var str = "";
                if (last_update.dialog == 0) {
                    str += setDivChat(data[i].sender_id, data[i].text, data[i].created_at);
                    last_update.dialog = data[i].timestamp;
                } else {
                    if (last_update.dialog < data[i].timestamp) {
                        str += setDivChat(data[i].sender_id, data[i].text, data[i].created_at);
                        last_update.dialog = data[i].timestamp;
                    }
                }
                if (str != "") {
                    $('#chat-window').append(str);
                }
            }


        }
    });
}

function setDivChat(id, text, date) {
    var div_text = "";
    if (id == user_id) {
        div_text += "<br><div class='pull-right'>" + text + " " + date + "</div></br>";
    } else {
        div_text += "<br><div>" + text + " " + date + "</div></br>";
    }
    return div_text;
}

function updateLastDateUpdate(newtime) {
    document.cookie = "last_date_update=" + newtime;
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



