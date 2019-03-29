//名称、一级菜单的个数(上限10个)、二级菜单的个数(上限10个)、内容和链接可以在js文件顶部修改
var classes = new Array();
var s_classes = new Array();
for(var k=1;k<=10;k++)
{
    s_classes[k] = new Array();
}
//顶部标题
var header_tips = "Meitnerium's English Word Book";
//一级菜单内容和链接
classes[1] = new first_class("首页","http://liuzhiyuan.online");
classes[2] = new first_class("单词","http://liuzhiyuan.online/word/index.html");
classes[3] = new first_class("读书","#");
classes[4] = new first_class("个人中心","http://liuzhiyuan.online/personal/index.html");
//二级菜单内容和链接(编号与一级对应)
//无二级菜单

function first_class(name,href) {
    this.name = name;
    this.href = href;
}
function second_class(name,href) {
    this.name = name;
    this.href = href;
}

function header() {
    var i=1;
    var j;
    var header_first_div = new Array();
    var header_first_a = new Array();
    var header_second_a = new Array();
    for(var k=1;k<=10;k++)
    {
        header_second_a[k] = new Array();
    }
    while(i<=10 && classes[i]!=undefined && classes[i].name!=undefined && classes[i].href!=undefined && classes[i].name!=null && classes[i].href!=null) {
        header_first_div[i] = document.createElement("div");
        header_first_div[i].classList.add("header_first_class_div");
        header_first_a[i] = document.createElement("a");
        header_first_a[i].classList.add("header_first_class_a");
        header_first_a[i].setAttribute("href",classes[i].href);
        header_first_a[i].innerHTML = classes[i].name;
        document.getElementById("header_container").appendChild(header_first_div[i]);
        header_first_div[i].appendChild(header_first_a[i]);
        j=1;
        while(j<=10 && s_classes[i][j]!=undefined && s_classes[i][j].name!=undefined && s_classes[i][j].href!=undefined && s_classes[i][j].name!=null && s_classes[i][j].href!=null) {
            header_second_a[i][j] = document.createElement("a");
            header_second_a[i][j].classList.add("header_second_class_a");
            header_second_a[i][j].setAttribute("href",s_classes[i][j].href);
            header_second_a[i][j].innerHTML = s_classes[i][j].name;
            header_first_div[i].appendChild(header_second_a[i][j]);
            j++;
        }
        i++;
    }
    var header_tips_div = document.createElement("div");
    header_tips_div.classList.add("header_tips");
    header_tips_div.innerHTML = header_tips;
    document.getElementById("header_container").appendChild(header_tips_div);
}