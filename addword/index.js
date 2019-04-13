function getCookie(name) {
    var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
    if(arr=document.cookie.match(reg))
        return unescape(arr[2]);
    else
        return null;
}

onload = function() {
    header();

    if(getCookie("UserPID")==0 || getCookie("UserPID")==null) {
        window.location.href = "../login/index.html";
    }
}

function baidu() {
    window.open('http://fanyi.baidu.com/?aldtype=16047#auto/zh');
}

function addword_ajax() {
    if($("#word").val() == null || $("#mean").val() == null) {
        $(".error_text").css("display","block");
        $(".success_text").css("display","none");
        $(".position_air").css("display","none");
    }

    else {
        $.ajax({
            type: 'POST',
            url: '../addword.php',
            async: false,
            data: {
                userpid: getCookie("UserPID"),
                newword: $("#word").val(),
                newmean: encodeURI($("#mean").val()),
                level: $('input:radio[name="level"]:checked').val()
            },
            dataType: "json",
            success: function(data) {
                //$(".error_text").css("display","none");
                //$(".success_text").css("display","block");
                //$(".position_air").css("display","none"); 
                console.log(data);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){//请求失败时调用此函数  
                // console.log(XMLHttpRequest.status);  
                // console.log(XMLHttpRequest.readyState);  
                // console.log(textStatus);    
                // alert("出错了，请稍后再试，可以联系作者QQ386964993提交错误，万分感谢");     
                $(".error_text").css("display","none");
                $(".success_text").css("display","block");
                $(".position_air").css("display","none");                     
            }
        });
    }
} 

