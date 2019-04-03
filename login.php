
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <?php
    //phpinfo();
    $user=$_POST["user"];
    $pwd=$_POST["pwd"];
    include_once "dbpwd.php";
    $conn=mysqli_connect("114.115.146.81:3306","root",$dbpwd);
    mysqli_query($conn,"use userinfo");
    $sql="select * from info where user='$user'";
    $res=mysqli_query($conn,$sql);
    mysqli_close($conn);
?>
    <meta http-equiv="refresh" content='2;url=./index.php?username=<?php echo "$user";?>' />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>正在登录...</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="./css/materialize.css">
    <script src="./js/materialize.js"></script>
</head>
<body>
    <div class="container">
        <p class="centered">
    
    <?php
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
    echo "登录成功！<br />";
    echo $user; 

    ?></p></div>
</body>
</html>