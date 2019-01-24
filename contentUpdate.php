<?php
require_once("contentDAO.php");
require_once("tools.php");

$id = readSessionVar("uid");
$title = isset($_REQUEST['title'])?$_REQUEST['title']:"";
$num = isset($_REQUEST['num'])?$_REQUEST['num']:"";
$content = isset($_REQUEST['content'])?$_REQUEST['content']:"";
$check = isset($_REQUEST['check'])?$_REQUEST['check']:false;
if($id){
  if($check == false){
?>
  <script type="text/javascript">
    var check = confirm("정말 작성하시겠습니까?");
    if(!check){
      alert('작성이 취소 되었습니다.');
      location.href="content_details.php?id=<?=$id?>&title=<?=$title?>";
      exit();
    }else{
      location.href="content_details.php?title=<?=$title?>&num=<?=$num?>&content<?=$content?>&check=true";
    }
  </script>
<?php
}else{
  if($title&&$content){
    if($_FILES["uploadFile"]["error"] == UPLOAD_ERR_OK&&$_FILES["uploadPicture"]["error"] == UPLOAD_ERR_OK){
      $tnameFile = $_FILES["uploadFile"]["tmp_name"];
      $fnameFile = $_FILES["uploadFile"]["name"];

      $tnamePicture = $_FILES["uploadPicture"]["tmp_name"];
      $fnamePicture = $_FILES["uploadPicture"]["name"];

      $save_nameFile = iconv("utf-8","cp949",$fnameFile);
      $save_namePicture = iconv("utf-8","cp949",$fnamePicture);

      if(move_uploaded_file($tnameFile,"files/$save_nameFile")&&move_uploaded_file($tnamePicture,"files/$save_namePicture")){
        $dao = new contentDAO();
        echo $num."<br>";
        echo $id."<br>";
        echo $title."<br>";
        echo $content."<br>";
        echo $save_namePicture."<br>";
        echo $save_nameFile."<br>";
        $dao->contentUpdate($title,$content,$save_namePicture,$save_nameFile,$num);
        okGo("작성되었습니다.","content_details.php?id=$id&title=$title");
      }else{
        errorBack("파일을 확인하세요");
      }
    }else{
      errorBack("파일을 확인해주세요");
    }
  }else{
    errorBack("작성글을 확인해 주세요");
  }
}
}else{
  errorBack("잘못된 접근입니다.");
}
?>
