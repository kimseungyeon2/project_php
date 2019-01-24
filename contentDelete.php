<?php
  require_once("contentDAO.php");
  require_once("tools.php");

  $id = readSessionVar("uid");
  $idc =  requestValue('id');
  $titlec =  requestValue("title");
  $check = isset($_REQUEST['check'])?$_REQUEST['check']:false;
  if($id){//잘못된 권한 막음
    if($check==false){
?>
    <script type="text/javascript">
      var check = confirm('정말 삭제하시겠습니까?');//예를 누르면 true 아니오 를 누르면 false값이 감
      if(!check){//여기서 false일때 그게 아니면(!)이기 때문에
        alert('취소 되었습니다.');//이런 안내창 출력
        location.href="main.php";//다시 main.php로 돌아감
        exit();
      }else{
        location.href="contentDelete.php?id=<?=$idc?>&title=<?=$titlec?>&check=true";
        exit();
      }
      //최종적으로 삭제를 묻는 곳
    </script>
<?php
  }
  else{
    $contentdao = new contentDAO();

    if($idc==$id){//동일인이지 않은 사람 권한 막음
      $contentdao->contentDelete($idc,$titlec);
      okGo("삭제되었습니다.",MAIN_PAGE);
    }else{
      errorBack("권한이 없습니다.");
    }
  }
}else{
    errorBack("잘못된 접근 입니다.");
  }

 ?>
