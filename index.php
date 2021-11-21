<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>게시판</title>
  </head>
  <body>
    <h1>게시판</h1>
    <h2>글 목록</h2>
    <ul>
    <?php
      //mysql 접속
      $conn = mysqli_connect("localhost","root","Yunhwan98!","php_board");

      if(!$conn){
          echo 'db에 연결되지 못했습니다.'.mysqli_connect_error();
      }else{
          echo 'db에 접속했습니다.';
      }
      //board table에서 글을 조회
      $sql = "SELECT * FROM board";
      $result = mysqli_query($conn,$sql);
      $list='';
      while($row = mysqli_fetch_array($result)){
          $list = $list."<li>{$row['number']}: <a href=\"view.php?number={$row['number']}\">{$row['name']}</a></li>";

      }
      echo $list;

    ?>
  </ul>

    <hr>
      <p><a href="write.php">글쓰기</a></p>
    <h2>글 검색</h2>
    <form action="search_result.php" method="post">
        <h3>검색할 키워드를 입력하세요.</h3>
        <p>
            <label for="search">키워드</label>
            <input type="text" id="search" name="skey">
        </p>
        <input type="submit" value="검색">
    </form>
    <hr>
    <h2>글 삭제</h2>
    <form action="delete.php" method="post">
        <p>
            <label for="msgdel">번호:</label>
            <input type="text" id="msgdel" name="delnum">
        </p>
        <input type="submit" value="삭제">
    </form>
  </body>
</html>
