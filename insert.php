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


    $user_name=$_POST['name'];
    $user_msg=$_POST['message'];

    $sql = "INSERT into board(name,message) VALUES ('$user_name','$user_msg')";//받은 정보 table에 삽입
    $result = mysqli_query($conn,$sql);

    if($result === false){
        echo '저장하지 못했습니다';
        error_log(mysqli_error($conn)); //에러 로그 기족

    }else{
        echo '저장성공';
    }


    mysqli_close($conn);
    print "<hr/><a href='index.php'>메인화면으로 이동하기</a>";

    ?>
  </body>
</html>
