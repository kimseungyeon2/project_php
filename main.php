<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>MainPage</title>
    <link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
    <script
      src="https://code.jquery.com/jquery-3.1.1.min.js"
      integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
      crossorigin="anonymous"></script>
    <script src="semantic/dist/semantic.min.js"></script>
  </head>
  <body class="ui container">
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
      require_once("memberDAO.php");//memberDAO.php파일 불러옴
    //3번문제
      require_once("tools.php");//tools.php를 불러옴
      $name = readSessionVar("uname");//tools.php의 readSessionVar()함수를 불러와서 $name변수에 session["uname"]값을 줌

    //$name = isset($_COOKIE["uname"])?$_COOKIE["uname"]:"";//쿠키값을 가져와서 비교
    ?>
      <h2 class="ui center aligned icon header">
        <i class="circular users icon"></i>
        <font style="vertical-align: inherit;">
          <font style="vertical-align: inherit;">
            <?=isset($name)?$name:""?>
          </font>
        </font>
      </h2>

    <?php
      if($name){//쿠키값이 있을때에 true->if문으로 없을때에 false->else문으로
    ?>
      <div class="ui center aligned container">
        <button  class="ui inverted blue button" type="submit" onclick="button('logout.php')">로그아웃</button>
        <button  class="ui inverted blue button" type="submit" onclick="button('logUpdate_form.php')">회원정보수정</button>
        <button  class="ui inverted blue button" type="submit" onclick="button('logDelete_form.php')">회원정보삭제</button>
      </div>
    <?php
      }
      else{
    ?>
      <div class="ui center aligned container">
        <button  class="ui inverted blue button" type="submit" onclick="button('login_form.php')">로그인</button>
        <button  class="ui inverted blue button" type="button" onclick="button('member_join_form.php')">회원가입</button>
      </div>
    <?php
      }
     ?>
     <div class="ui modal" id="container">
     </div>
<hr>

<!-- 회원정보 보여주기-->
        <div class="ui grid">
         <?php
            $modao = new memberDAO();
            $result = $modao->selectMember();
            for ($i=0; $i < count($result) ; $i++) {
            ?>
            <div class="four wide column">
              <div class="ui link cards">
                <div class="card">

                  <div class="image">
                    <img src="files/다운로드.jpg" width="200" height="300">
                  </div>

                  <div class="content">
                    <div class="header"><?=$result[$i]['name']?></div>
                      <div class="meta">
                        <a onclick="button('content.php?id=<?=$result[$i]['id']?>')">작성글 보기</a>
                      </div>

                      <div class="description">
                        주소:<?=$result[$i]['addr']?>
                      </div>

                  </div>
                  <div class="extra content">
                    <span class="left floated">
                      생성일:<?=$result[$i]['createTime']?>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <?php
            }
          ?>
        </div>
        <hr>
        <button  class="ui inverted blue button" type="button" name="button" onclick="button('writing_form.php')">글쓰기</button>
  </body>
</html>
<!--main 폼-->
