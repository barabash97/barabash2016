var url_base = document.URL;
$(document).load(function() {
    $('#chat-window').scrollTop("1500");
});
$(document).ready(function () {
    updateLastDateUpdate(0);
    pullData();
    
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
    if(text_message == "") return false;
    $.get(url_base + "/sendMessage", {text_message: text_message, id_dialog: id_dialog}, function (data) {
        if (data == 1) {
            $("#text_message").val('');
            
        }
    });
}

function pullData() { //Pool to load messages every 2 sec
    getMessages();
    setTimeout(pullData, 2000);
}

function getMessages() { //Load messages

    var id_dialog = $("#id_dialog").val();
    $.get(url_base + "/receiveMessage", {id_dialog: id_dialog}, function (data)
    {
        if (data.length > 0) {
            for (var i = 0; i < data.length; i++) {
                var str = "";
                if (getCookie('last_date_update') == 0) {
                    str += setDivChat(data[i].sender_id, data[i].text, data[i].created_at);
                    updateLastDateUpdate(new Date(data[i].created_at).getTime());
                } else {
                    if (getCookie('last_date_update') < new Date(data[i].created_at).getTime()) {
                        str += setDivChat(data[i].sender_id, data[i].text, data[i].created_at);
                        updateLastDateUpdate(new Date(data[i].created_at).getTime());
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
        div_text += "<br><div class='pull-right'>" + text + " "+date+"</div></br>";
    } else {
        div_text += "<br><div>" + text + " "+date+"</div></br>";
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



