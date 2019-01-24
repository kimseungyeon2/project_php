<?php
require("tools.php");
require("memberDAO.php");

$id = requestValue("id");

$pw = requestValue("pw");

$name = requestValue("name");

$addr = requestValue("addr");


if($id && $pw && $name && $addr){
  $mdao = new memberDAO();
  if($mdao->getMember($id)){
    errorBack('이미 사용중인 아이디 입니다.');
  }
  else{
    $a = $mdao->loginInsert($id,$pw,$name,$addr);
    okGo("가입이 완료 되었습니다.", MAIN_PAGE);

  }
}else{
  errorBack('빈칸을 모두 입력하시오');
}
?>
<!--회원가입정보를 체크해주는 곳-->
