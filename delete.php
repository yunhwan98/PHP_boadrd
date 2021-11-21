<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>게시판</title>
  </head>
  <body>
    <h1>게시판</h1>
    <h2>삭제 결과</h2>
    <ul>
    <?php
      //mysql 접속
      $conn = mysqli_connect("localhost","root","Yunhwan98!","php_board");

      if(!$conn){
          echo 'db에 연결되지 못했습니다.'.mysqli_connect_error();
      }else{
          echo 'db에 접속했습니다.';
      }

      $user_delnum=$_POST['delnum'];  //삭제할 num지정

      $sqlDEL = "DELETE FROM board WHERE number = $user_delnum"; //delnum에 해당하는 데이터 삭제
      mysqli_query($conn,$sqlDEL);

      $sql = "SELECT * FROM board"; //삭제 되었는지 확인
      $result=mysqli_query($conn,$sql);

      $list='';

      while($row = mysqli_fetch_array($result)){
          $list = $list."<li>{$row['number']}: <a href=\"view.php?number={$row['number']}\">{$row['name']}</a></li>";
      }
      echo $list;
      mysqli_close($conn);

    ?>

    </ul>
    <p>
    <?php
        echo $user_delnum . '번째 데이터가 삭제되었습니다.';

     ?>
    </p>
    <p><a href="index.php">메인화면으로 돌아가기</a></p>
  </body>
</html>
