<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>글 쓰기</title>
  </head>
  <body>
    <h1>글쓰기</h1>
    <form action="insert.php" method="post">
        <p>
            <label for="name">이름:</label>
            <input type="text" id="name" name="name">
        </p>
        <p>
            <label for="message">이름:</label>
            <textarea name="message" id="message" cols="30" rows="10"></textarea>

        </p>
        <input type="submit" value="글쓰기">
    </form>
  </body>
</html>
