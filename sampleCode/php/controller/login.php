<?php
require_once __DIR__.'/../model/user.php';

session_start();

$pid = $_POST['action'];
$userName = $_POST['userName'];
$passwd = $_POST['passwd'];

$user = new user($userName, $passwd);


if($pid === 'login'){
  if(! $user->passwdCheck()){
    header('Location: ../index.php?msg=えらー！：パスワードが違う');
    exit;
  }

    $_SESSION['userName'] = $user->userInfo['userName'];
    header('Location: ./main.php');
}elseif($pid === 'create'){
  if(! $user->registration()){
    header('Location: ../index.php?msg=えらー！：すでに同じユーザー名があるかも');
    exit;
  }else{
    $_SESSION['userName'] = $userName;
    header('Location: ./main.php');
  }

}
/**
 * リクエストを実行する 現状GETのみ
 * @param  string $url  リクエスト送信先
 * @return
 */
function doRequest($url,$httpMethod='GET', $parms=Null, $httpHeader=Null){
  $url = str_replace("\r\n", '', $url);
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

  if($httpMethod === 'GET'){
    curl_setopt($ch, CURLOPT_HTTPGET, true);
  }elseif($httpMethod === 'POST' ){
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $parms);
  }elseif($httpMethod === 'PUT'){
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($parms));
  }elseif($httpMethod === 'DELETE'){
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');

  }
  // header情報があれば追加する
  if( $httpHeader !== 'null' and !is_null($httpHeader)){
    var_dump($httpHeader);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $httpHeader);
  }



  $response = curl_exec($ch);
  return $response;
}
