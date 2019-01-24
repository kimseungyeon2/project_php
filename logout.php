<?php
  session_start();
  require_once("tools.php");//한번만 실행

  //setcookie("uid");//쿠키 삭제 (보다는 비우기)
  //setcookie("uname");//쿠키 삭제 (보다는 비우기)
  unset($_SESSION['uid']);
  unset($_SESSION['uname']);
  goNow(MAIN_PAGE);



 ?>
<!--로그아웃을 체크 해주는 곳-->
