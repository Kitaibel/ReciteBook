 <html>
 <body>

 Welcome <?php echo $_POST["username"]; ?>!

<br>

 <?php 
$servername = "localhost"; 
$username = "ReciteBook"; 
$password = "uestcXA#3008"; 
$dbname = "ReciteBook";

// 创建连接 
//$conn = new mysqli($servername, $username, $password, $dbname); 

$conn = mysqli_connect($servername, $username, $password, $dbname); 


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

?>



 </body>
 </html> 