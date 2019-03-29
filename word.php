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

$sql = "SELECT * FROM userwords where UserPID='" . $_POST["userpid"] . "'";
$result = $conn->query($sql);

$row = mysqli_fetch_assoc($result);

echo "<div>111111</div>";

?>



 </body>
 </html> 