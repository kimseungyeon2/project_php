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
  <div class="ui center aligned container">
    <h2 class="ui icon header">
      <i class="settings icon"></i>
      <div class="content">
        회원가입창
        <div class="sub header">
          회원정보를 모두 입력해주세요
        </div>
      </div>
    </h2>
  </div>

  <form class="ui form" action="member_join.php" method="post">

    <div class="field">
      <label for="id">ID</label>
      <input type="text" name="id" placeholder="아이디">
    </div>

    <div for="pw" class="field">
      <label>password</label>
      <input type="text" name="pw" placeholder="패스워드">
    </div>

    <div for="name" class="field">
      <label>Name</label>
      <input type="text" name="name" placeholder="이름">
    </div>

    <div for="addr" class="field">
      <label>adress</label>
      <input type="text" name="addr" placeholder="주소(20자이내로작성하시오)">
    </div>

    <button class="ui button" type="submit">회원가입</button>
  </form>
</body>
</html>
<!--회원가입 폼-->
