<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/_inc/common.php"; ?>
<?php
$idx = get('idx', '0');
if($idx == '0') {
?>
<script>alert('잘못된 접근 입니다.');location.href='/board/';</script>
<?php
return;
}
// 게시물 가져오기
$stmt = $db->prepare("SELECT * FROM " . $_board_options["tableName"] . " WHERE idx=:idx;");
$stmt->bindValue(':idx', $idx);
$stmt->execute();

if($row = $stmt->fetch(PDO::FETCH_BOTH)) {
    //게시물이 있을때는 할일 없음...
} else {
    $error += 1;
?>
    <script>alert('잘못된 접근 입니다.');history.back();</script>
<?php
    return;
}

$db = null;
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?=$_board_options["name"]?> 삭제확인</title>
    <script>
      function chkInputTypeText(selector,regex,errorMsg){
        let element = document.querySelector(selector);
        let value = element.value;
        if(regex.test(value)){
          alert(errorMsg);
          element.focus();
          return false;
        }
        return true;
      }
      function chkForm() {
        //제목 체크
        if(!chkInputTypeText('#subject',/^\s*$/,'제목을 바르게 입력하세요.')){
          return false;
        }
        //작성자 체크
        if(!chkInputTypeText('#writer',/^\s*$/,'작성자를 바르게 입력하세요.')){
          return false;
        }
        //내용 체크
        if(!chkInputTypeText('#content',/^\s*$/,'내용을 바르게 입력하세요.')){
          return false;
        }
        //비밀번호 체크
        if(!chkInputTypeText('#pwd',/^\D*$/,'비밀번호는 숫자만 입력하세요.')){
          return false;
        }
        return true;
      }
      </script>
    </head>
    <body>
        <h1><?=$_board_options["name"]?>삭제확인</h1>
        <div>
            <form action="modify_ok.php?idx=<?=$idx?>" method="post" onsubmit="return chkForm();">
                <input type="hidden" name="idx" value="<?=$idx?>" />
            <div>제목</div>
            <div>
                <input type="text" id="subject" name="subject" value="<?=$subject?>" placeholder="제목을 입력하세요" maxlength='5' required>
            </div>
                <div>작성자</div>
            <div>
                <input type="text" id="writer" name="writer" value="<?=$writer?>" placeholder="작성자 이름" >
            </div>
                <div>내용</div>
            <div>
                <textarea name="content" id="content" col="200" row="50" style="width: 90%; height:200px;"><?=$content?></textarea>
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