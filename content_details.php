<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
    <script
      src="https://code.jquery.com/jquery-3.1.1.min.js"
      integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
      crossorigin="anonymous"></script>
    <script src="semantic/dist/semantic.min.js"></script>
  </head>
  <body class="ui container">
    <h2 class="ui center aligned icon header">
      <i class="book icon"></i>
      <font style="vertical-align: inherit;">
        <font style="vertical-align: inherit;">
        작성글 보기
        </font>
      </font>
    </h2>
    <script type="text/javascript">
        function button(name){
          $.ajax({
              async : false,//비동기화 방식 동기화시 오류가 나옴(모달창을 껐다 또 실행 하는데 그때에 오류가 걸리는 것 같음);
              type: "post",
              url:name,//가져오는 파일
              success:function(data) {//가져오는 데이터 data임
              $('#container').html(data);}//#container에 html코드로 넣기
            });
          $('.ui.modal').modal('show');
        };
    </script>
    <?php
      require_once("contentDAO.php");
      require_once("tools.php");
      $contentdao = new contentDAO();
      $uid = readSessionVar('uid');
      $id = requestValue('id');
      $title = requestValue('title');
      $contentdao = new contentDAO();
      $result = $contentdao->contents($id);
      $result2 = $contentdao->contents2($id,$title);
     ?>
    <div class="ui secondary pointing menu">
      <a class="active item">
        <?=$result2[0]['title']?>
      </a>
      <?php
      for ($i=0; $i <count($result); $i++) {
        if($result[$i]['title'] == $result2[0]['title']){

        }
        else{
      ?>
        <a class="item" href="content_details.php?id=<?=$id?>&title=<?=$result[$i]['title']?>"><?=$result[$i]['title']?></a>
      <?php
        }
      }
      ?>
      <div class="right menu">
        <a class="" href="main.php">
          <i class="reply icon"></i>
          나가기
        </a>
      </div>
    </div>
    <div class="ui segment">

      <div class="ui internally celled grid">
        <div class="row">
          <div class="three wide column">
            <img src="files/<?=$result2[0]['picture']?>" alt="" width='500' height='300'>
          </div>
          <div class="ten wide column">
            <p><?=$result2[0]['content']?></p>
          </div>
        </div>
      </div>
      <div class="">
        <h3>
          <a href="http://localhost/school/과제/files/<?=$result2[0]['uploadFile']?>" download><i i class="upload icon"></i>첨부파일다운로드</a>
        </h3>
      </div>
    </div>
    <?php
      if($id == $uid){
    ?>
    <button class="ui primary basic button" type="button" name="button" onclick='button("contentUpdate_form.php?id=<?=$id?>&title=<?=$result2[0]['title']?>")'>수정하기</button>
    <?php
    }
     ?>
    <div class="ui modal" id="container">
    </div>
  </body>
</html>
