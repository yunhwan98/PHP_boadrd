<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>게시판</title>
  </head>
  <body>
    <h1>게시판</h1>
    <h2>검색 결과</h2>
    <ul>
    <?php
      //mysql 접속
      $conn = mysqli_connect("localhost","root","Yunhwan98!","php_board");

      if(!$conn){
          echo 'db에 연결되지 못했습니다.'.mysqli_connect_error();
      }else{
          echo 'db에 접속했습니다.';
      }

      $user_skey=$_POST['skey'];  //키워드 지정

      $sql = "SELECT * FROM board WHERE message LIKE '%$user_skey%'"; //키워드를 포함한 메시지를 모두 출력
      $result = mysqli_query($conn,$sql);
      $list='';

      while($row = mysqli_fetch_array($result)){
          $list = $list."<li>{$row['number']}: <a href=\"view.php?number={$row['number']}\">{$row['name']}</a></li>";

      }
      echo $list;
      mysqli_close($conn);
    ?>
  </ul>
  <p><a href="index.php">메인화면으로 돌아가기</a></p>
  </body>
</html>
