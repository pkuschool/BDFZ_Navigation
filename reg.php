<?php
//phpinfo();
$e=1;
$user=$_GET["user"];
$pwd=$_GET["pwd"];
$li=$_GET["li"];
$website=$_GET["website"];
if($user==null){
    echo "用户名不能为空";
    $e=0;
}
if($pwd==null){
    echo "密码不能为空";
    $e=0;
}
include_once "dbpwd.php";
$conn=mysqli_connect("114.115.146.81:3306","root", $dbpwd);
mysqli_query($conn,"use userinfo");
$sql="select * from info where user='$user'";
$res=mysqli_query($conn,$sql);
if(mysqli_num_rows($res)){
    echo "用户名已存在";
    $e=0;
}
$sql="insert into info(user,pwd,li,website) values('$user','$pwd','$li','$website')";
mysqli_query($conn,$sql);
if($e==1)echo "注册成功";
mysqli_close($conn);
?>
<!doctype html>
<html>
    <body>
    <form method="POST" style="display:none" action="index.php" id="f1" enctype="multipart/form-data">
        <input name="username" style="display:none" type="text" value="<?php echo $user;?>"/>
    </form> 
    <script>
        setTimeout("$('#f1').submit()",2000);
    </script>
</body>
    </html>
