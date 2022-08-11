<?php 
  //database 연결
  const DB_DRIVER = 'mysql';
  const DB_HOST = 'localhost';
  const DB_NAME = 'myhome';
  const DB_LOGIN_ID = 'myhome';
  const DB_LOGIN_PWD = 'myhome1234';

  $dbConnectionString = 
    DB_DRIVER . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8';
  $db = new PDO($dbConnectionString,DB_LOGIN_ID,DB_LOGIN_PWD);

  $_site_options = [
    "board" => [
      "name" => "자유게시판",
      "tableName" => "board",
      "writePage" => "/board/write.php",
      "writeOkPage" => "/board/write_ok.php",
      "listPage" => "/board/index.php",
      "viewPage" => "/board/view.php",
      "modifyPage" => "/board/modify.php",
      "modifyOkPage" => "/board/modify_ok.php",
      "delPage" => "/board/del.php",
    ],
    "faq" => [
      "name" => "자주하는 질문",
      "tableName" => "faq1",
    ],
    "user" => [
      "name" => "회원정보",
      "tableName" => "users",
      "joinPage" => "/join.php",
      "loginPage" => "/login.php",
      "logoutPage" => "/logout.php",
      "insert_columns" => ['email','pwd','user_name','hp'],
    ],
  ];
  $_board_options = $_site_options['board'];
  $_user_options = $_site_options['user'];
?>