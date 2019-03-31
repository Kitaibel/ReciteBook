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

//$sql = "UPDATE userwords SET UserLevel" . $_POST["level"] . " = json_set(UserLevel" . $_POST["level"] . ",'". $_POST["newword"] ."','". $_POST["newmean"]. "') where UserPID='" . $_POST["userpid"] . "'";
switch ($_POST["level"])
{
    case 1:
        $sql = "UPDATE userwords SET UserLevel1 = json_remove(UserLevel1,'$.". $_POST["removeword"] . "') where UserPID='" . $_POST["userpid"] . "'";
        break;
    case 2:
        $sql = "UPDATE userwords SET UserLevel2 = json_remove(UserLevel2,'$.". $_POST["removeword"] . "') where UserPID='" . $_POST["userpid"] . "'";
        break;
    case 3:
        $sql = "UPDATE userwords SET UserLevel3 = json_remove(UserLevel3,'$.". $_POST["removeword"] . "') where UserPID='" . $_POST["userpid"] . "'";
        break;
    case 4:
        $sql = "UPDATE userwords SET UserLevel4 = json_remove(UserLevel4,'$.". $_POST["removeword"] . "') where UserPID='" . $_POST["userpid"] . "'";
        break;
    case 5:
        $sql = "UPDATE userwords SET UserLevel5 = json_remove(UserLevel5,'$.". $_POST["removeword"] . "') where UserPID='" . $_POST["userpid"] . "'";
        break;
} 

//UPDATE 'userwords' SET 'UserLevel2'=json_set(UserLevel2,"$.dull","%E6%9E%AF%E7%87%A5%E7%9A%84") WHERE 'UserPID' = 1
$retval = $conn->query($sql);
//$retval = mysql_query( $sql, $conn );

// if(! $retval ) {
//     die('Could not update data: ' . mysql_error());
// }
// else {
echo "success";
//}

// echo 1;

?>