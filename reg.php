<!doctype html>
<html>
<?php
//phpinfo();
$e=1;
$user=$_POST["user"];
$pwd=$_POST["pwd"];
$li=$_POST["li"];
$website=$_POST["website"];
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
    $msg="用户名已存在";
    $e=0;
}
$sql="insert into info(user,pwd,li,website) values('$user','$pwd','$li','$website')";
if($e==1)mysqli_query($conn,$sql);
if($e==1) $msg="注册成功";
mysqli_close($conn);
?>
<head>
    <meta charset="utf-8">
    <!--<meta http-equiv="refresh" content='1;url=./index.php' />-->
    <script src="./js/jquery.js"></script>
    <script src="./js/jquery.form.js"></script>
    <link rel="stylesheet" href="./css/materialize.css">
</head>
<body class="blue-grey">
    <div class="container center center-align center-block centered">
        <h1 class="white-text" style="margin-top: 150px; text-shadow: 1px 1px light-grey"><?php echo $msg;?></h1>
    </div>
    <form method="POST" style="display:none" action="index.php" id="f1" enctype="multipart/form-data">
        <input name="username" style="display:none" type="text" value="<?php echo $user;?>"/>
    </form> 
    <script>
        <?php
        $str="window.location.href='reg.html'";
        if($e==0) echo "setTimeout($str,2000);";
        else echo 'setTimeout("$("#f1").submit()",50000);';
        ?>
    </script>
</body>
</html>