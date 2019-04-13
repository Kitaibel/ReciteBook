function getCookie(name) {
    var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
    if(arr=document.cookie.match(reg))
        return unescape(arr[2]);
    else
        return null;
}

function setCookie(c_name,value,expiredays) {
   var exdate=new Date();
   exdate.setDate(exdate.getDate()+expiredays);
   document.cookie=c_name+ "=" +escape(value)+
   ((expiredays==null) ? "" : ";expires="+exdate.toGMTString());
}

onload = function() {
   header();


   if(getCookie("UserPID") == true) {
      window.location.href = "../personal/index.html";
   }

   // if(getCookie("remember") == "yes") {
   //    $("#username").value = getCookie("UserUsername");
   //    $("#password").value = getCookie("UserPassword");
   // }
}