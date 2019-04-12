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

$sql = "SELECT * FROM userkey where UserUsername='" . $_POST["username"] . "'";
$result = $conn->query($sql);

$row = mysqli_fetch_assoc($result);

if($row["UserPID"] == 0) {   //用户不存在
    // if(array_key_exists("remember", $_POST) == true) {
    //     $remember = "yes";
    // }
    // else {
    //     $remember = "no";
    // }
    $sql_id = "SELECT max(UserPID) from userkey";
    $result_id = $conn->query($sql_id);
    $UIDs = $result_id->fetch_array()[0]+1;
    $sql2 = "INSERT INTO userkey (UserPID, UserUsername,UserPassword,UserTelephone, UserEmail) VALUES (". $UIDs . ",'" . $_POST["username"] ."', '". $_POST["password"] ."', '" . $_POST["telephone"] . "','" .$_POST["email"]. "') ";
    $result2 = $conn->query($sql2);
    $sql3 = "INSERT INTO userwords (UserPID, UserLevel1,UserLevel2,UserLevel3, UserLevel4, UserLevel5) VALUES(". $UIDs . ",null,null,null,null,null)";
    $result3 = $conn->query($sql3);
    if( $result2 == true){
        setcookie("UserPID",$row["UserPID"],time()+3600*24,"../");
        setcookie("UserUsername",$row["UserUsername"],time()+3600*24,"../");
        setcookie("UserPassword",$row["UserPassword"],time()+3600*24,"../");
        //setcookie("remember",$remember,time()+3600*24,"../");
        header('Location: index.html');
    }
    else {
        header('Location: signUp/index.html?UnknownError');
    }
}
else {
    header('Location: signUp/index.html?NameError');
}

?>



 </body>
 </html> 