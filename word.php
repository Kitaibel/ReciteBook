 <?php 
 header('Content-Type: text/html; charset=UTF-8'); 
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
//$posttest = $_POST["userpid"];

$sql = "SELECT * FROM userwords where UserPID='" . $_POST["userpid"] . "'";
$result = $conn->query($sql);

$row = mysqli_fetch_assoc($result);

$userlevel1 = $row["UserLevel1"];
$userlevel2 = $row["UserLevel2"];
$userlevel3 = $row["UserLevel3"];
$userlevel4 = $row["UserLevel4"];
$userlevel5 = $row["UserLevel5"];

$ajax_result = json_encode(array('wordlevel1' => $userlevel1, 'wordlevel2' => $userlevel2, 'wordlevel3' => $userlevel3, 'wordlevel4' => $userlevel4, 'wordlevel5' => $userlevel5));

echo $ajax_result;
// echo 1;

?>