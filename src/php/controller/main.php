<?php
require_once __DIR__.'/../model/user.php';

// ログインがされているか確認を行う
session_start();
if (!isset($_SESSION['userId'])) {
  header('Location: ../index.php?msg=ログインしてください');
  exit;
}

$id = $_SESSION['userId'];
$userName = $_SESSION['userName'];
include('../view/topbar.php');
include('../view/main.php');
