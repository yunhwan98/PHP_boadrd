<?php
    session_start();
    session_unset();  //세션 비우기
    session_destroy();  //세션 파괴

    require_once('functions.php');
    redirect('login.php');  //login페이지로 이동
    die();
 ?>
