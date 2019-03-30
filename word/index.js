var words_level = {
    words_level1: null,
    words_level2: null,
    words_level3: null,
    words_level4: null,
    words_level5: null,
}

var vword;

onload = function() {
    header();

    vword = new Vue({
        el: '#main',
        data: {
            word: null,
            mean: null,
            level: 1
        }
    });

    function getCookie(name)
    {
        var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
        if(arr=document.cookie.match(reg))
            return unescape(arr[2]);
        else
            return null;
    }

    if(getCookie("UserPID")==0 || getCookie("UserPID")==null) {
        window.location.href = "../login/index.html";
    }
    else {
        $.ajax({
            type: 'POST',
            url: '../word.php',
            async: false,
            data: {
                userpid: getCookie("UserPID")
            },
            dataType: "json",
            success: function(data) {
                words_level.words_level1 = JSON.parse(data.wordlevel1);
                words_level.words_level2 = JSON.parse(data.wordlevel2);
                words_level.words_level3 = JSON.parse(data.wordlevel3);
                words_level.words_level4 = JSON.parse(data.wordlevel4);
                words_level.words_level5 = JSON.parse(data.wordlevel5);
                console.log("数据加载完成");
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){//请求失败时调用此函数  
                console.log(XMLHttpRequest.status);  
                console.log(XMLHttpRequest.readyState);  
                console.log(textStatus);    
                alert("出错了，请稍后再试，可以联系作者QQ386964993提交错误，万分感谢");                          
            }
        });

        if(words_level.words_level1 == null) {
            vword.level++;
            if(words_level.words_level2 == null) {
                vword.level++;
                if(words_level.words_level3 == null) {
                    vword.level++;
                    if(words_level.words_level4 == null) {
                        vword.level++;
                        if(words_level.words_level5 == null) {
                            //自动跳转添加单词
                            window.location.href = "../addword/index.html";
                        }
                        else {
                            vword.word = Object.keys(words_level.words_level5)[0];
                            vword.mean = decodeURI(words_level.words_level5[vword.word]);
                        }
                    }
                    else {
                        vword.word = Object.keys(words_level.words_level4)[0];
                        vword.mean = decodeURI(words_level.words_level5[vword.word]);
                    }
                }
                else {
                    vword.word = Object.keys(words_level.words_level3)[0];
                    vword.mean = decodeURI(words_level.words_level3[vword.word]);
                }
            }
            else {
                vword.word = Object.keys(words_level.words_level2)[0];
                vword.mean = decodeURI(words_level.words_level2[vword.word]);
            }
        }
        else {
            vword.word = Object.keys(words_level.words_level1)[0];
            vword.mean = decodeURI(words_level.words_level1[vword.word]);
        }
    }
    
    
}


//decodeURI();