<?php
  /**
   *
   */
  class memberDAO
  {
    private $db;
    function __construct(){
      try {
        $this->db = new PDO("mysql:host=localhost;port=3307;dbname=test","root","0000");
        $this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
        exit($e->getMessage());
      }
    }//생성자 메소드, 데이터베이스에 연결하는 목적의 메소드

    public function getMember($id){
      try {
        $sql="select * from member2 where id= :id";
        $pstmt=$this->db->prepare($sql);
        /*준비하다. 실행준비,DB서버가..prepare()를 하면
          1.문법검사
          2.유효성검사(member라는 테이블이 있나 여기에 무슨 컬럼등이 있나 권한이 있나 등의 정보들)
          3.실행계획 수립
          이 되었다는 뜻
          prepare를 해주는 이유는 보통의 qury를 넘겨주면 처음부터 계속 실행되지만 prepare를 해주면 준비상태에서 대기하다가 qury문만 넘겨주면 되기때문에
        */
        $pstmt->bindValue(":id",$id,PDO::PARAM_STR);
        //$id를 넣어준다는 뜻 string형태로
        $pstmt->execute();
        $result = $pstmt->fetchAll(PDO::FETCH_ASSOC);
        //PDO::FETCH_ASSOC keyWord로 던져준다는 뜻
      } catch (PDOException $e) {
        exit($e->getMessage());
      }
      return $result;
    }//아이디를 기준으로 모든 정보를 가져옴

    public function loginInsert($id,$pw,$name,$addr){
      try {
        $sql = "insert into member2(id,pw,name,addr,createTime) values(:id,:pw,:name,:addr,:date)";
        $pstmt=$this->db->prepare($sql);
        $pstmt->bindValue(":id",$id,PDO::PARAM_STR);
        $pstmt->bindValue(":pw",$id,PDO::PARAM_STR);
        $pstmt->bindValue(":name",$id,PDO::PARAM_STR);
        $pstmt->bindValue(":addr",$addr,PDO::PARAM_STR);
        //받은 매개변수 $id,$pw,$name,$addr를 넣어줌
        $pstmt->bindValue(":date",date("Y-m-d H:i:s"),PDO::PARAM_STR);//현재시각을 넣어줌
        $pstmt->execute();
      } catch (PDOException $e) {
        exit($e->getMessage());
      }
    }//매개변수 $id,$pw,$name,$addr를 받아서를 받아서 디비에 넣어줌

    public function updateMember($id,$pw,$name,$addr){
      try {
        $sql = "update member2 set pw=:pw,name=:name,addr=:addr where id=:id";
        $pstmt = $this->db->prepare($sql);
        $pstmt->bindValue(":pw",$pw,PDO::PARAM_STR);
        $pstmt->bindValue(":name",$name,PDO::PARAM_STR);
        $pstmt->bindValue(":addr",$addr,PDO::PARAM_STR);
        $pstmt->bindValue(":id",$id,PDO::PARAM_STR);
        $pstmt->execute();
      } catch (PDOException $e) {
        exit($e->getMessage());
      }
      //시간 정보를 뺌(이유 만든 이 계정을 만든 시각이기때문에 update했을시 시각은 등록할 필요가 없다고 생각)
    }//매개변수 $id,$pw,$name,$addr를 받아서 $id 변수에 해당하는 정보를 수정

    public function deleteMember($id){
      try {
        $sql = "delete from member2 where id=:id";
        $pstmt = $this->db->prepare($sql);
        $pstmt->bindValue(":id",$id,PDO::PARAM_STR);
        $pstmt->execute();
      } catch (PDOException $e) {
        exit($e->getMessage());
      }
    }//데이터 삭제하기

    public function selectMember(){
      try {
        $sql = "select * from member2";
        $pstmt = $this->db->prepare($sql);
        $pstmt->execute();
        $result = $pstmt->fetchAll(PDO::FETCH_ASSOC);
      } catch (PDOException $e) {
        exit($e->getMessage());
      }
      return $result;
    }
  }//모든 데이터 불러오기
 ?>
 <!--데이터베이스의 정보를 가져오는 곳-->
