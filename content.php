<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      require_once("contentDAO.php");
      require_once("tools.php");

      $id = requestValue('id');

      $contentdao = new contentDAO();
      $result=$contentdao->contents($id);
     ?>
     <table class="ui fixed table">
       <thead>
        <tr>
         <th>사진</th>
         <th>제목</th>
         <th>내용</th>
         <th>삭제</th>
       </tr>
      </thead>
       <tbody>
         <?php
          for ($i=0; $i<count($result); $i++) {
            //$content = $result[$i]['content']; php html 태그 제거 이렇게 처야함
            ?>
            <tr>
              <td><a href="content_details.php?id=<?=$id?>&title=<?=$result[$i]['title']?>"><img src='files/<?=$result[$i]['picture']?>' width="100" height="100"></img></a></td>
              <td><?=$result[$i]['title']?></td>
              <td style="overflow:hidden;white-space:nowrap;text-overflow:ellipsis;table-layout:fixed"><?=$result[$i]['content']?></td>
              <!--글자수 제한 걸기style-->
              <td><button class="ui inverted basic button"><a href="contentDelete.php?id=<?=$id?>&title=<?=$result[$i]['title']?>">삭제하기</a></button></td>
            </tr>
            <?php
          }
          ?>
       </tbody>
     </table>
  </body>
</html>
