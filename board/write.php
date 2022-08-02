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
      <form action="write_ok.php" method="post"><!--get:편지봉투,post:편지지 -->
        <div>공지글</div>
        <div>
          <input type="checkbox" id="isNotice" name="isNotice" value="y">
        </div>
        <div>제목</div>
        <div>
          <input type="text" id="subject" name="subject" value="" placeholder="제목 입력">
        </div>
        <div>작성자</div>
        <div>
          <input type="text" id="writer" name="writer" value="" placeholder="작성자 이름" >
        </div>
        <div>옵션</div>
        <div>
          <input type="checkbox" id="options_1" name="options[]" value="제목굵게"> 제목굵게
          <br>
          <input type="checkbox" id="options_2" name="options[]" value="제목옵션2"> 제목옵션2
          <br>
          <input type="checkbox" id="options_3" name="options[]" value="제목옵션3"> 제목옵션3
          <br>
        </div>
        <div>
          <input type="submit" value="전송">
        </div>
      </form>
    </div>
  </body>
</html>