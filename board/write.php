<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/_inc/common.php"; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>New Write</title>
  </head>
  <body>
    <h1>Notice new Write</h1>
    <div>
      <form action="<?=$_board_options["writeOkPage"]?>" method="post"><!--get:편지봉투,post:편지지 -->
        <div>제목</div>
        <div>
          <input type="text" id="subject" name="subject" value="" placeholder="제목 입력">
        </div>
        <div>작성자</div>
        <div>
          <input type="text" id="writer" name="writer" value="" placeholder="작성자 이름" >
        </div>
        <div>내용</div>
        <div>
          <textarea name="content" col="200" row="50" style="width: 90%; height:200px;"></textarea>
        </div>
        <div>비밀번호</div>
        <div>
          <input type="password" id="pwd" name="pwd" value="" placeholder="비밀번호 입력" >
        </div>
        <br/>
        <div>
          <input type="submit" value="전송">
        </div>
      </form>
    </div>
  </body>
</html>