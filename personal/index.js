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

   if(getCookie("UserPID") == 0 || getCookie("UserPID") == null) {
      window.location.href = "../login/index.html";
   }
}