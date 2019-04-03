<?php
//phpinfo();
$user=$_GET["user"];
$pwd=$_GET["pwd"];
$conn=mysqli_connect("114.115.146.81:3306","root","subIT2019@");
mysqli_query($conn,"use userinfo");
$sql="select * from info where user='$user'";
$res=mysqli_query($conn,$sql);
if(mysqli_num_rows($res)){
    $row=mysqli_fetch_row($res);
    if($pwd!=$row[2]){
        echo "用户不存在或密码有误";
        exit;
    }
}
else{
    echo "用户不存在或密码有误";
    exit;
}
echo $user;
echo ":<br />";
print("id:");
print($row[0]);
echo "<br />";
print("\t网页列表:");
print($row[3]);
echo "<br />";
print("\t自定义网站:");
print($row[4]);
mysqli_close($conn);
?>