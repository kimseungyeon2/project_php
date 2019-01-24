<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>로그인삭제</title>
    <link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
    <script
      src="https://code.jquery.com/jquery-3.1.1.min.js"
      integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
      crossorigin="anonymous"></script>
    <script src="semantic/dist/semantic.min.js"></script>
  </head>
  <body class="ui container">
    <?php
      session_start();
      $uid = $_SESSION["uid"];
     ?>
    <h2 class="ui center aligned icon header">
      <i class="plug icon"></i>
      <font style="vertical-align: inherit;">
        <font style="vertical-align: inherit;">
        삭제
        </font>
      </font>
    </h2>
    <hr>
    </form>
    <form class="ui form" action="logDelete.php" method="post">
      <div class="field">
        <label for="id">ID</label>
        <input type="text" name="id" placeholder="아이디"  value="<?=$uid?>">
      </div>

      <div for="pw" class="field">
        <label>password</label>
        <input type="text" name="pw" placeholder="패스워드">
      </div>

      <button class="ui button" type="submit">삭제</button>
    </form>
  </body>
</html>
<!--로그인삭제 form 이 있는 곳 -->
