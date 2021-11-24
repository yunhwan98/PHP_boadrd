<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>게시판</title>
  </head>
  <body>
    <?php
    //mysql 접속
    $conn = mysqli_connect("localhost","root","Yunhwan98!","php_board");

    if(!$conn){
        echo 'db에 연결되지 못했습니다.'.mysqli_connect_error();
    }else{
        echo 'db에 접속했습니다.';
    }

    $user_number=$_POST['number'];
    $user_name=$_POST['name'];
    $user_msg=$_POST['message'];

    $sql = "UPDATE board SET name = '$user_name', message='$user_msg' WHERE number = $user_number";//받은 정보로 수정
    $result = mysqli_query($conn,$sql);

    if($result === false){
        echo '수정하지 못했습니다';
        error_log(mysqli_error($conn)); //에러 로그 기족

    }else{
        echo '수정성공';
    }


    mysqli_close($conn);
    print "<hr/><a href='index.php'>메인화면으로 이동하기</a>";

    ?>
  </body>
</html>
