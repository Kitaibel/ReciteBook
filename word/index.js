var words_level = new Array(new Object(),new Object(),new Object(),new Object(),new Object(),new Object());

var word_recited = new Array(new Object(),new Object(),new Object(),new Object(),new Object(),new Object());

var word_num = new Array(0,0,0,0,0,0);

var vword;
var word_now = 0;



onload = function() {
    header();

    vword = new Vue({
        el: '#main',
        data: {
            word: null,
            mean: null,
            level: 1,
            right_result: "我答对了",
            wrong_result: "我记错了"
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
                words_level[1] = JSON.parse(data.wordlevel1);
                words_level[2] = JSON.parse(data.wordlevel2);
                words_level[3] = JSON.parse(data.wordlevel3);
                words_level[4] = JSON.parse(data.wordlevel4);
                words_level[5] = JSON.parse(data.wordlevel5);
                console.log("数据加载完成");
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){//请求失败时调用此函数  
                console.log(XMLHttpRequest.status);  
                console.log(XMLHttpRequest.readyState);  
                console.log(textStatus);    
                alert("出错了，请稍后再试，可以联系作者QQ386964993提交错误，万分感谢");                          
            }
        });

        //检测是否有单词
        if(words_level[1] == null) {
            vword.level++;
            if(words_level[2] == null) {
                vword.level++;
                if(words_level[3] == null) {
                    vword.level++;
                    if(words_level[4] == null) {
                        vword.level++;
                        if(words_level[5] == null) {
                            //自动跳转添加单词
                            window.location.href = "../addword/index.html";
                        }
                    }
                }
            }
        }

        //存入新对象
        for (var i in words_level[1]) {
            word_recited[1][word_num[1]] = {
                mean: decodeURI(words_level[1][i]),
                times: 1,
                word: i
            };
            word_num[1]++;
        }

        for (var i in words_level[2]) {
            word_recited[2][word_num[2]] = {
                mean: decodeURI(words_level[2][i]),
                times: 1,
                word: i
            };
            word_num[2]++;
        }

        for (var i in words_level[3]) {
            word_recited[3][word_num[3]] = {
                mean: decodeURI(words_level[3][i]),
                times: 1,
                word: i
            };
            word_num[3]++;
        }

        for (var i in words_level[4]) {
            word_recited[4][word_num[4]] = {
                mean: decodeURI(words_level[4][i]),
                times: 1,
                word: i
            };
            word_num[4]++;
        }

        for (var i in words_level[5]) {
            word_recited[5][word_num[5]] = {
                mean: decodeURI(words_level[5][i]),
                times: 1,
                word: i
            };
            word_num[5]++;
        }

        new_word();
    }
}

function new_word() {
    for(var i = 0; i<word_num[vword.level];i++ ) {
        if(word_recited[vword.level][i].times != 0) {
            while(1) {
                word_now = Math.floor(Math.random()*word_num[vword.level]);
                if(word_recited[vword.level][word_now].times != 0) {
                    vword.word = word_recited[vword.level][word_now].word;
                    vword.mean = word_recited[vword.level][word_now].mean;
                    return;
                }
            }
        }
    }
    alert("本等级单词已全部背完，请切换等级或退出");
    vword.word = "Finish";
    vword.mean = "结束";
}

function remember() {
    $(".question").css("display","none");
    $(".result").css("display","block");
    vword.right_result = "我答对了";
    vword.wrong_result = "我记错了";
    if(word_recited[vword.level][word_now].times > 0)
        word_recited[vword.level][word_now].times--;
    
}

function unremember() {
    $(".question").css("display","none");
    $(".result").css("display","block");
    vword.right_result = "下一个";
    vword.wrong_result = "下一个";
    if(word_recited[vword.level][word_now].times > 0)
        word_recited[vword.level][word_now].times = 2;
}

function next_word() {
    $(".question").css("display","block");
    $(".result").css("display","none");
    new_word();
}

function error_word() {
    $(".question").css("display","block");
    $(".result").css("display","none");
    if(word_recited[vword.level][word_now].times > 0)
        word_recited[vword.level][word_now].times = 2;
    new_word();
}

function changeLevel() {
    var new_level = prompt("请输入切换的等级，输入1~5之间的数字","");
    while(new_level != 1 && new_level != 2 && new_level != 3 && new_level != 4 && new_level != 5) {
        alert("输入错误，请输入1~5之间的数字");
        new_level = prompt("请输入切换的等级，输入1~5之间的数字","");
    }
    vword.level = new_level;
    new_word();
}

function changeMode() {
    if($(".word_mode1").css("display") == "none") {
        $(".word_mode1").css("display","block");
        $(".word_mode2").css("display","none"); 
    }
    else {
        $(".word_mode1").css("display","none");
        $(".word_mode2").css("display","block"); 
    }
    new_word();
}

function addword() {
    window.location.href = "../addword/index.html";
}