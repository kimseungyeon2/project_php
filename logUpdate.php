<?php
  /*
    request 정보에서 id,pw,name 추출
    데이터베이스에서 저장된 회원정보 수정
    main 페이지로 이동
  */
  //로그인 한 사람인지 자기정보 인지 확인후 바꿔줘야함 해킹을 막으려면
  //세션에 정보가 있는지 확인한후에만 되도록 하기

  require_once("tools.php");
  require_once("MemberDao.php");
  session_start();

  $id = requestValue("id");
  $pw = requestValue("pw");
  $name = requestValue("name");
  $addr = requestValue("addr");
  /*
    1.로그인 한 사용자인지 checkdate
    2.로그인한 사용자 본인의 회원정보를 수정하려는 것인지 check
  */
  if($_SESSION['uid']==$id){
    if($id&&$pw&&$name&&$addr){
      $mdao = new MemberDao();
      $mdao->updateMember($id,$pw,$name,$addr);
      $_SESSION["uname"] = $name;//메인페이지 가기 전에 세션수정하는 것//logUpdate에서 받은 값임

      okGo("회원정보가 수정되었습니다.",MAIN_PAGE);
    }
    else{
      errorBack("모든 입력란을 채워주세요...");//exit();
    }
  }
  else{
    errorBack("잘못된 접근입니다...");
  }
 ?>
<!--회원수정 을 체크 해주는 곳-->
