onload = function() {
   header();

   function getCookie(name)
   {
      var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
      if(arr=document.cookie.match(reg))
         return unescape(arr[2]);
      else
         return null;
   }

   if(getCookie("UserPID")>0) {
      window.location.href = "../personal/index.html";
   }

   // if(getCookie("remember") == "yes") {
   //    $("#username").value = getCookie("UserUsername");
   //    $("#password").value = getCookie("UserPassword");
   // }
}