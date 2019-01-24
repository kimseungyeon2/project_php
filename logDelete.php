<?php
  session_start();
  require_once("tools.php");
  require_once("memberDAO.php");
  $id = requestValue("id");
  $pw = requestValue("pw");
  $mdao = new memberDAO();
  $check = isset($_REQUEST['check'])?$_REQUEST['check']:false;
  if($_SESSION['uid']==$id){//세션에 정보가 있을시 로그인 했을시
    //$modao = $member->deleteMember($id);
    if($check==false){
  ?>
    <script type="text/javascript">
      var check = confirm("정말 삭제하시겠습니까?");//예를 누르면 true 아니오 를 누르면 false값이 감
      if(!check){//여기서 false일때 그게 아니면(!)이기 때문에
        alert('삭제가 취소 되었습니다.');//이런 안내창 출력
        location.href="main.php";//다시 main.php로 돌아감
        exit();
      }else{
        location.href="logDelete.php?id=<?=$id?>&pw=<?=$pw?>&check=true";
        exit();
        //처음에 적은 값들을 넘기는 칸 이기 때문에 상관 없음
      }
      //최종적으로 삭제를 묻는 곳
    </script>
  <?php
    }else{
      if($id&&$pw){//$id&&$pw를 모두 받았을시 삭제 되도록 구성
        echo $check;
        $mdao = new MemberDao();
        $checkPw = $mdao-> getMember($id);
        if($pw ==$checkPw[0]["pw"]){
          $mdao->deleteMember($id);


          unset($_SESSION['uid']);//다시 main.php로 갔을시 세션이 남아있으면 보여지기 때문에 없앰
          unset($_SESSION['uname']);//다시 main.php로 갔을시 세션이 남아있으면 보여지기 때문에 없앰
          okGo("회원정보가 삭제되었습니다.",MAIN_PAGE);//삭제후 다시 가기
        }else{
          errorBack("비밀번호가 틀렸습니다.");//에러 메시지
        }
      }
      else{
        errorBack("모든 입력란을 채워주세요...");//에러 메시지
      }
    }
  }else{
    //errorBack("잘못된 접근입니다...");//에러 메시지
  }

 ?>
