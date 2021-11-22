<?php
   //pre태그를 이용해 고유형식 유지
    function output($value){
      echo '<pre>';
      print_r($value);
      echo '</pre>';

    }
    //관리자의 email,pw인지 확인
    function authenticate_user($email, $password){
        if($email == USER_NAME && $password == PASSWORD){
              return true;
        }

    }
    //url접속하고 종료
    function redirect($url){
      header("Location:$url");
      die();
    }

    //관리자로 로그인했는지 여부
    function is_user_authenticated(){
        return isset($_SESSION['email']);

    }
    //로그
    function ensure_user_is_authenticated(){
        if(!is_user_authenticated()){
          redirect('login.php');
          die();
        }

    }

?>
