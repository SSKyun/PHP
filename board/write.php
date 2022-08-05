<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/_inc/common.php"; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>New Write</title>
    <script src="/js/func.js"></script>
    <script>
      function chkForm() {
        let options = []; 
        options.push({type: 'text',selector : '#subject',regex:/^\s*$/,errorMsg:'제목을 바르게 입력하세요.'});
        options.push({type: 'text',selector : '#writer',regex:/^\s*$/,errorMsg:'작성자를 바르게 입력하세요'});
        options.push({type: 'text',selector : '#content',regex:/^\s*$/,errorMsg:'내용을 바르게 입력하세요.'});
        options.push({type: 'text',selector : '#pwd',regex:/^\D*$/,errorMsg:'비밀번호는 숫자만 입력하세요.'});
        return kyunCheckForm(options);
      }
      </script>
  </head>
  <body>
    <h1>Notice new Write</h1>
    <div>
      <form action="<?=$_board_options["writeOkPage"]?>" method="post" onsubmit="return chkForm();"><!--get:편지봉투,post:편지지 -->
        <div>제목</div>
        <div>
          <input type="text" id="subject" name="subject" value="" placeholder="제목을 입력하세요" maxlength='5' required>
        </div>
        <div>작성자</div>
        <div>
          <input type="text" id="writer" name="writer" value="" placeholder="작성자 이름" >
        </div>
        <div>내용</div>
        <div>
          <textarea name="content" id="content" col="200" row="50" style="width: 90%; height:200px;"></textarea>
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