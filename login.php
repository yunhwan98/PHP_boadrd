<?php
      session_start();

      $title = 'Login';
      include('config.php');
      include('header.php');
      require_once('functions.php');

/*
      //관리자로 로그인되어있다면
      if(is_user_authenticated()){
          redirect('admin.php');
          die();
      }
*/
      //POST방식으로 넘어온 값중에 로그인 변수 값 존재할
      if(isset($_POST['login'])){
        //output($_POST);
        //이메일 형식인지 확인
        $email =filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL);
        $password = $_POST['password'];
        if($email == false){
            $status = '이메일 형식에 맞게 입력해주세요';

        }
        if(authenticate_user($email,$password)){
           $_SESSION['email'] = $email;
           redirect('admin.php');

       }else{
         $status ='비번이 맞지 않습니다.';
       }
      }

?>
<form action="" method="POST">
  <p>
      <label for="email">Email:</label>
      <input type="text" name="email" id="email">

  </p>
  <p>
      <label for="password">Password:</label>
      <input type="password" name="password" id="password">

  </p>
  <p>
      <input type="submit" name='login' value="Login">
  </p>
</form>
<div class='error'>
    <p>
    <?php
      if(isset($status)){
        echo $status;
      }
    ?>
    </p>
</div>


<?php
    include('footer.php');

 ?>
