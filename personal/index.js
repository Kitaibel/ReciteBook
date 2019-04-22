function getCookie(name) {
    var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
    if(arr=document.cookie.match(reg))
        return unescape(arr[2]);
    else
        return null;
}

onload = function() {
    header();

    if(getCookie("UserPID") == null) {
        window.location.href = "../login/index.html";
    }

    $(".username").text( "Hello, " + getCookie("UserUsername"));
}

function exit_login() {
    window.location.href = "../login/index.html?exit";
}