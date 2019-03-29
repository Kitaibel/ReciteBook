 <html>
 <body>

<br>

 <?php 
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
//echo "Connected successfully<br>";

$sql = "SELECT * FROM userkey where UserUsername='" . $_POST["username"] . "' and UserPassword='" . $_POST["password"] . "'";
$result = $conn->query($sql);

$row = mysqli_fetch_assoc($result);

if($row["UserPID"] != 0) {   //登录成功
    if(array_key_exists("remember", $_POST) == true) {
        $remember = "yes";
    }
    else {
        $remember = "no";
    }
    setcookie("UserPID",$row["UserPID"],time()+3600*24,"../");
    setcookie("UserUsername",$row["UserUsername"],time()+3600*24,"../");
    setcookie("UserPassword",$row["UserPassword"],time()+3600*24,"../");
    setcookie("remember",$remember,time()+3600*24,"../");
    header('Location: index.html');
}
else {
    header('Location: login/index.html?error');
}

?>



 </body>
 </html> 