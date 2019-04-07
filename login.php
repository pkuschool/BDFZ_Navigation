
<?php
    $e=1;
    $user=$_POST["user"];
    $pwd=$_POST["pwd"];
    $msg = "";
    include_once "dbpwd.php";
    $conn=mysqli_connect("114.115.146.81:3306","root",$dbpwd);
    mysqli_query($conn,"use userinfo");
    $sql="select * from info where user='$user'";
    $res=mysqli_query($conn,$sql);
        if(mysqli_num_rows($res)){
            $row=mysqli_fetch_row($res);
            if($pwd!=$row[2]){
                $msg="用户不存在或密码有误";
                $e=0;
            }
        }
        else{
            $msg="用户不存在或密码有误";
            $e=0;
        }
    if($e==1)$msg= "欢迎 $user 登录!";
    mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
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
    <script>
        $.post("./index.php",(username:<?php if($e==1)echo $user;?>),function(data,textStatus){});
        
    </script>
    
</body>
</html>
  