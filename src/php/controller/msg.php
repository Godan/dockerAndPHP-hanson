<?php
require_once __DIR__.'/../model/msg.php';

session_start();
$pid = $_GET['pid'];
$id = $_SESSION['userId'];
$userName = $_SESSION['userName'];
$msg = new msg();
//
if($pid === 'json'){
  $msgList = $msg->getMsgList();

  header('Content-type: application/json');
  echo json_encode($msgList);
}elseif($pid === 'post'){
  $msgText = $_GET['msg'];
  $msg->setMsg($userName, $msgText);
}
