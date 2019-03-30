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

$sql = "INSERT * FROM userwords where UserPID='" . $_POST["userpid"] . "'";
//UPDATE 'userwords' SET 'UserLevel2'=json_set(UserLevel2,"$.dull","%E6%9E%AF%E7%87%A5%E7%9A%84") WHERE 'UserPID' = 1
$result = $conn->query($sql);

$row = mysqli_fetch_assoc($result);

$ajax_result = json_encode(array('wordlevel1' => $userlevel1, 'wordlevel2' => $userlevel2, 'wordlevel3' => $userlevel3, 'wordlevel4' => $userlevel4, 'wordlevel5' => $userlevel5));

echo "success";
// echo 1;

?>