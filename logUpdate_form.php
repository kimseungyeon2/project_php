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
  <?php
  session_start();
  require_once("memberDAO.php");
  require_once("tools.php");

  $uid = $_SESSION["uid"];
  $mdao = new MemberDao();
  $member2 = $mdao->getMember($uid);
  ?>
  <h2 class="ui center aligned icon header">
    <i class="plug icon"></i>
    <font style="vertical-align: inherit;">
      <font style="vertical-align: inherit;">
      회원정보수정
      </font>
    </font>
  </h2>
  <hr>
  <form class="ui form" action="logUpdate.php" method="post">
    <div class="field">
      <label for="id">ID</label>
      <input type="text" name="id" placeholder="아이디" value="<?=$member2[0]['id']?>">
    </div>

    <div for="pw" class="field">
      <label>PassWord</label>
      <input type="password" name="pw" placeholder="패스워드" value="<?=$member2[0]['pw']?>">
    </div>

    <div for="pw" class="field">
      <label>Name</label>
      <input type="text" name="name" placeholder="Name" value="<?=$member2[0]['name']?>">
    </div>

    <div for="pw" class="field">
      <label>addresse</label>
      <input type="text" name="addr" placeholder="주소" value="<?=$member2[0]['addr']?>">
    </div>

    <button class="ui button" type="submit">회원정보수정</button>
  </form>
</body>
</html>
<!--회원수정 폼-->
