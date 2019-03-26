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

$sql = "SELECT * FROM userPID";
$result = $conn->query($sql);

$row=mysqli_fetch_assoc($result);
printf ("%d : %d",$row["UID"],$row["UID2"]);

?>



 </body>
 </html> 