<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>content_upldate_form</title>
  </head>
  <body>
  <?php
    require_once("contentDAO.php");
    require_once("tools.php");
    $uid = readSessionVar("uid");
    $id = requestValue("id");
    $title = requestValue("title");
    $contentdao = new contentDAO($uid);
    $result = $contentdao->contents2($id,$title);

  ?>
  <div class="">
    <div class="ui inverted segment">
      <form class="ui inverted form" action="contentUpdate.php" method="post" enctype="multipart/form-data">
        <div class="two fields">
          <div class="field">
            <label for="">num</label>
            <input type="text" name="num" value="<?=$result[0]['num']?>">
            <label>Title</label>
            <input placeholder="제목" type="text" name="title" value="<?=$result[0]['title']?>">
          </div>
        </div>

        <div class="two fields">
          <div class="field">
            <label>content</label>
            <textarea placeholder="소개글" name="content" rows="8" cols="80"><?=$result[0]['content']?></textarea>
          </div>
        </div>

        <div class="two fields">
          <div class="field">
            <label><i class="folder icon"></i>파일첨부</label>
              <input type="text" name="" value="<?=$result[0]['uploadFile']?>">
              <input type="file" name="uploadFile">
            <label><i class="folder icon"></i>이미지첨부</label>
              <input type="text" name="" value="<?=$result[0]['picture']?>">
              <input type="file" multiple accept="image/*" name="uploadPicture" value="<?=$result[0]['picture']?>">
          </div>
        </div>

        <input type="submit" class="ui inverted button"></input>

      </form>
    </div>
  </div>
  </body>
</html>
