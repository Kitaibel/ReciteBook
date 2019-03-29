<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Word Book</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="../background/background.css">
    <link rel="stylesheet" href="../header/header.css">
    <link rel="stylesheet" href="../footer/footer.css">
</head>
<body>
    <!-- 导航栏 -->
    <div class="header_container" id="header_container"></div>

    <!--页面主体 -->
    <canvas id="cas"></canvas>
    <div class="container">

        <div class="main">
            <div class="showpage">Broaden the Horizon</div>
            <div class="loginpage">
                <form id="loginform" name="loginform" action="index.php" method="post">
                    <div class="username_text login_text">Username</div>
                    <input type="text" name="username" class="username login_input" id="username" placeholder="Please input username">
                    <div class="password_text login_text">Password</div>
                    <input type="password" name="password" class="password login_input" id="password" placeholder="Please input password">
                    <div class="checkbox mg-b25">
                        <label>
                             <input type="checkbox"><span class="remember_password">Remember Password</span>
                        </label>
                        <p id="error" class="error_text"></p>
                    </div>
                    <p>
                        <button id="login" type="submit" style="submit" class="login_btn">Sign in</button>
                        <a href="../signUp/index.html"><button id="login" type="submit" style="submit" class="login_btn">Sign up</button></a>
                    </p>
                </form>
            </div>
        </div>


        <!-- 页脚 -->
        <div class="footer">
            <p class="footerText">Copyright © 2019-2020 版权所有：Meitnerium</p>
            <a href="http://www.miitbeian.gov.cn/" class="footerText icp">蜀ICP备18036997号-1</a>
        </div>
    </div>
    

    

    <!-- 脚本 -->
    <script src="http://libs.baidu.com/jquery/1.10.2/jquery.min.js"></script>
    <script src="index.js"></script>
    <script src="../background/background.js"></script>
    <script src="../header/header.js"></script>

<?php 
function judge() {
    $servername = "localhost"; 
    $username = "ReciteBook"; 
    $password = "uestcXA#3008"; 
    $dbname = "userinfo";
    $port = 3306;

    $conn = mysqli_connect($servername, $username, $password, $dbname,$port); 


    // 检测连接 
    if ($conn->connect_error) { 
        die("Connection failed: " . $conn->connect_error); 
    } 
    echo "Connected successfully<br>";

    $sql = "SELECT * FROM userkey where UserUsername='" . $_POST["username"] . "' and UserPassword='" . $_POST["password"] . "'";
    $result = $conn->query($sql);

    $row=mysqli_fetch_assoc($result);
    printf ("%d",$row["UserPID"]);

    if($row["UserPID"] != 0) {   //登录成功
        header('Location: http://www.liuzhiyuan.online/');
    }
    else {
        header('Location: http://www.liuzhiyuan.online/login');
    }
}
    

?>

</body>
</html>