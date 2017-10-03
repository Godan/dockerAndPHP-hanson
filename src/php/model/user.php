<?php

class user
{
  private $userName;
  private $passwd;
  private $db;
  public $userInfo;

  public function __construct($userName, $passwd=null){
    $this->userName = $userName;
    $this->passwd = $passwd;
    try{
      $this->db = new PDO('mysql:host=db;dbname=ymic','ymic','ymic');
      // var_dump($this->db->query("INSERT INTO `ymic`.`user` (`userName`, `passwd`) VALUES('a', 'a')"));
    } catch (PDOException $e) {
     echo('データベース接続失敗。'.$e->getMessage());
    }
  }


  // 課題0 ユーザー登録をしよう
  public function registration(){

  }

  public function passwdCheck(){
    $stmt = $this->db->prepare("select * from user where userName= ? limit 1;");
    $stmt->execute(array($this->userName));
    $userInfo = $stmt->fetch();
    if(password_verify($this->passwd, $userInfo['passwd'])){
      $this->userInfo = $userInfo;
      return true;
    }

    return false;
  }
}
