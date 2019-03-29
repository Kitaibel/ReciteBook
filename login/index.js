onload = function() {
   header();
<<<<<<< HEAD

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
=======
>>>>>>> 9e59999907a9d547606f7c7df7a4202863ec32f2
}