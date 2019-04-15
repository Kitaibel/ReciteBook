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
    $sql3 = "INSERT INTO userwords (UserPID, UserLevel1,UserLevel2,UserLevel3, UserLevel4, UserLevel5) VALUES(". $UIDs . ",JSON_OBJECT('v','v'),JSON_OBJECT('v','v'),JSON_OBJECT('v','v'),JSON_OBJECT('v','v'),JSON_OBJECT('v','v'))";
    $result3 = $conn->query($sql3);
    $sql_ex = "UPDATE userwords SET UserLevel1 = json_remove(UserLevel1,'$.v'), UserLevel2 = json_remove(UserLevel2,'$.v'), UserLevel3 = json_remove(UserLevel3,'$.v'), UserLevel4 = json_remove(UserLevel4,'$.v'), UserLevel5 = json_remove(UserLevel5,'$.v') where UserPID='" . $UIDs . "'";
    $result_ex = $conn->query($sql_ex);
    // $sql4 = "UPDATE userwords SET UserLevel1 = json_remove(UserLevel1,'$.1'), UserLevel2 = json_remove(UserLevel2,'$.1'),UserLevel3 = json_remove(UserLevel3,'$.1'),UserLevel4 = json_remove(UserLevel4,'$.1'),UserLevel5 = json_remove(UserLevel5,'$.1'), where UserPID=" . $UIDs . "";
    // $result4 = $conn->query($sql4);
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