function getCookie(name) {
    var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
    if(arr=document.cookie.match(reg))
        return unescape(arr[2]);
    else
        return null;
}

onload = function() {
    header();

    if(getCookie("UserPID") == false) {
        console.log(getCookie("UserPID"));
        //window.location.href = "../login/index.html";
    }

}

function exit_login() {
    window.location.href = "../login/index.html?exit";
}