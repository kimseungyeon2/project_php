<?php
/**
 *
 */
class contentDAO
{
  private $db;

  function __construct()
  {
    try {
      $this->db=new PDO("mysql:host=localhost;port=-;dbname=-","-id","-password");

      $this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      exit($e->getMessage());
    }

  }
  public function contents($id){
    try {
      $sql = "select * from content where id = :id";
      $pstmt=$this->db->prepare($sql);
      $pstmt->bindValue(":id",$id,PDO::PARAM_STR);
      $pstmt->execute();
      $result = $pstmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      exit($e->getMessage());
    }
    return $result;
  }

  public function contents2($id,$title){
    try {
      $sql = "select * from content where id = :id and title = :title";
      $pstmt=$this->db->prepare($sql);
      $pstmt->bindValue(":id",$id,PDO::PARAM_STR);
      $pstmt->bindValue(":title",$title,PDO::PARAM_STR);
      $pstmt->execute();
      $result = $pstmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      exit($e->getMessage());
    }
    return $result;
  }


  public function contentSelect(){

  }

  public function contentInsert($id,$title,$content,$uploadPicture,$uploadFile){
    try {
      $sql = "insert into content(id,title,content,contentTime,picture,uploadFile) values(:id,:title,:content,:contentTime,:uploadPicture,:uploadFile)";
      $pstmt=$this->db->prepare($sql);

      $pstmt->bindValue(":id",$id,PDO::PARAM_STR);
      $pstmt->bindValue(":title",$title,PDO::PARAM_STR);
      $pstmt->bindValue(":content",$content,PDO::PARAM_STR);
      $pstmt->bindValue(":contentTime",date("Y-m-d H:i:s"),PDO::PARAM_STR);
      $pstmt->bindValue(":uploadPicture",$uploadPicture,PDO::PARAM_STR);
      $pstmt->bindValue(":uploadFile",$uploadFile,PDO::PARAM_STR);

      $pstmt->execute();

    } catch (PDOException $e) {
      exit($e->getMessage());
    }
  }

  public function contentDelete($id,$title){
    try {
      $sql = "delete from content where id=:id and title=:title";
      $pstmt = $this->db->prepare($sql);
      $pstmt->bindValue(":id",$id,PDO::PARAM_STR);
      $pstmt->bindValue(":title",$title,PDO::PARAM_STR);
      $pstmt->execute();
    } catch (PDOException $e) {
      exit($e->getMessage());
    }
  }

  public function contentUpdate($title,$content,$uploadPicture,$uploadFile,$num){
    try {
      $sql = "update content set title=:title,content=:content,picture=:uploadPicture,uploadFile=:uploadFile where num=:num";
      $pstmt = $this->db->prepare($sql);
      $pstmt->bindValue(":title",$title,PDO::PARAM_STR);
      $pstmt->bindValue(":content",$content,PDO::PARAM_STR);
      $pstmt->bindValue(":uploadPicture",$uploadPicture,PDO::PARAM_STR);
      $pstmt->bindValue(":uploadFile",$uploadFile,PDO::PARAM_STR);
      $pstmt->bindValue(":num",$num,PDO::PARAM_STR);

      $pstmt->execute();
    } catch (PDOException $e) {
      exit($e->getMessage());
    }

  }

}


 ?>
