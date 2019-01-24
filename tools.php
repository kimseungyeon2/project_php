<?php
  define("MAIN_PAGE","main.php");//MAIN_PAGE와 main.php는 서로 같다는 의미를 정의해둔것

  function requestValue($name){
    return isset($_REQUEST[$name])?$_REQUEST[$name]:"";
  }//해당 매개변수의 값이 있으면 그 값을 return 없으면 아무것도 리턴 안함 을 위해 만든 메소드

  function errorBack($msg){
    ?>
      <script type="text/javascript">
        alert('<?=$msg?>');
        location.href="main.php";
        exit();
      </script>
    <?php
    exit();
  }//에러가 나왔을시 다시 main.php로 돌아가게 해주기 위해 만든 것 메세지와 함께 main으로 돌아감

  function okGo($msg,$url){
  ?>
    <script type="text/javascript">
      alert('<?= $msg ?>');
      location.href = '<?=$url?>';
      exit();
    </script>
  <?php
}//로그인 성공등의 상황일때 성공 메세지와 함께 다시 돌아가기

  function goNow($url){
  ?>
    <script type="text/javascript">
      location.href = '<?=$url?>';
    </script>
  <?php
}//그냥 바로 main.php로 돌아가기
  function readSessionVar($name){
    if(session_status() == PHP_SESSION_NONE){//세션이 실행되있는지 아닌지 확인 이건 아닐때 true값 반환
      session_start();//세션 시작

    }
    $result = isset($_SESSION[$name])?$_SESSION[$name]:"";//세션 값이 있으면 세션값을 없으면 ""을 넣어주기

    return $result;//넣은 세션값 return 하기
  }//3번 문제 - session_start()가 실행되 있으면 그냥 세션 값만 꺼내서 반환 아니면 실행시키고 반환
?>
<!--각종 편리를 위해 만든 메소드가 있는 곳-->
