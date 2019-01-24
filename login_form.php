<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>로그인</title>
    <link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
    <script
      src="https://code.jquery.com/jquery-3.1.1.min.js"
      integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
      crossorigin="anonymous"></script>
    <script src="semantic/dist/semantic.min.js"></script>
  </head>
  <body class="ui container">
    <h2 class="ui center aligned icon header">
      <i class="plug icon"></i>
      <font style="vertical-align: inherit;">
        <font style="vertical-align: inherit;">
        로그인
        </font>
      </font>
    </h2>
    <hr>
    </form>
    <form class="ui form" action="login.php" method="post">
      <div class="field">
        <label for="id">ID</label>
        <input type="text" name="id" placeholder="아이디">
      </div>

      <div for="pw" class="field">
        <label>password</label>
        <input type="text" name="pw" placeholder="패스워드">
      </div>

      <button class="ui button" type="submit">로그인</button>
    </form>
  </body>
</html>
<!--로그인 form 이 있는 곳 -->
