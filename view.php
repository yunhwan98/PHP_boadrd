<?php
  //mysql 접속
  $conn = mysqli_connect("localhost","root","Yunhwan98!","php_board");

  if(!$conn){
      echo 'db에 연결되지 못했습니다.'.mysqli_connect_error();
  }else{
      echo 'db에 접속했습니다.';
  }

  $view_num = $_GET['number'];
  $sql = "SELECT * FROM board WHERE number= $view_num"; //view_num과 같은 데이터들을 찾기
  $result = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>view 게시판</title>
  </head>
  <body>
    <h1>게시판</h1>
    <h2>글 내용</h2>
    <?php
      if($row = mysqli_fetch_array($result)){
    ?>
    <h3>글번호: <?=$row['number']?>/ 글쓴이: <?=$row['name']?></h3>
    <div>
        <?=$row['message']?>
    </div>
    <?php
    }
    ?>
    <p><a href="index.php">메인화면으로 돌아가기</a></p>

  </body>
</html>
