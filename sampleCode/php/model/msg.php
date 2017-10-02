<?php

class msg
{
  private $db;

  public function __construct(){
    try{
      // DB接続
      $this->db = new PDO('mysql:host=db;dbname=ymic','ymic','ymic');
    } catch (PDOException $e) {
     echo('データベース接続失敗。'.$e->getMessage());
    }
  }

  /**
   * 投稿されたmessageを連想配列で返す
   * @param  int  $limit  取得するmessage数を制限する
   * @param  itn $offset Limitがある場合どこから取得するかのoffsetが使用できる
   * @return Array          messageの連想配列
   */
  public function getMsgList($limit = null, $offset=0){
    if(is_null($limit)){
      $stmt = $this->db->prepare("SELECT * FROM main;");
      $stmt->execute();
    }else{
      $stmt = $this->db->prepare("SELECT * FROM main limit ? offset ?;");
      $stmt->execute(array($limit, $offset));
    }

    return  $stmt->fetchall();
  }

  public function setMsg($userName, $msg){
    $stmt = $this->db->prepare("INSERT INTO main (`userName`, `text`) VALUES ( ? , ? );");
    return $stmt->execute(array($userName, $msg));

  }
}
