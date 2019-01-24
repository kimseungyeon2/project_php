<?php
  session_start();
  require_once("tools.php");//require_once는 해당 tools.php파일을 부르는 함수임 require과 require_once차이점은 require은 이 페이지가 불러질때마다 계속 실행 require_once는 한번 부르면 계속 실행 하지 않아도 된다는 차이점입니다.
  require_once("memberDao.php");//memberDao.php를 부르는 것

  $id = requestValue("id");//tools의 함수 isset
  $pw = requestValue("pw");//tools의 함수 isset

  $mdao = new MemberDao();
  $member = $mdao->getMember($id);//getMember메소드는 member테이블안의 자료를 해당 id에 맞는 자료를 가지고 옴
  if($member&&$member[0]['pw']==$pw){
    $_SESSION['uid'] =  $member[0]['id'];
    $_SESSION['uname'] = $member[0]['name'];
    //setcookie("uid",$member[0]['id']);
    //setcookie("uname",$member[0]['name']);
    //4번 문제의 쿠키로 로그인 기능 구현하기
    goNow(MAIN_PAGE);//MAIN_PAGE는 main.php를 가리키는 것 tools.php안에 서로 같은 의미라고 정의 해둠
  }else{
    errorBack("로그인 실패");
  }
 ?>
<!--로그인을 체크 해주는 곳 -->
