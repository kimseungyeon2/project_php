<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>writing_form</title>
  </head>
  <body>
  <div class="">
    <div class="ui inverted segment">
      <form class="ui inverted form" action="writing.php" method="post" enctype="multipart/form-data">

        <div class="two fields">
          <div class="field">
            <label>Title</label>
            <input placeholder="제목" type="text" name="title">
          </div>
        </div>

        <div class="two fields">
          <div class="field">
            <label>content</label>
            <textarea placeholder="소개글" name="content" rows="8" cols="80"></textarea>
          </div>
        </div>

        <div class="two fields">
          <div class="field">
            <label><i class="folder icon"></i>파일첨부</label>
              <input type="file" name="uploadFile" value="">
            <label><i class="folder icon"></i>이미지첨부</label>
              <input type="file" multiple accept="image/*" name="uploadPicture" value="">
          </div>
        </div>

        <input type="submit" class="ui inverted button"></input>

      </form>
    </div>
  </div>
  </body>
</html>
