<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/_inc/common.php"; ?>
<?php
  $idx = get('idx', '0');
  if($idx == '0'){
    ?>
    <script>alert("잘못된 접근 입니다.");location.href='<?=$_board_options["listPage"] ?>';</script>
  <?php
    return;
  }
  //게시물 삭제하기
  $stmt = $db-> prepare("DELETE FROM ". $_board_options["tableName"] .  " WHERE idx=:idx;");
  $stmt->bindValue(':idx', $idx);
  $stmt->execute();
  ?>
<script>alert("게시물이 삭제되었습니다.");location.href='<?=$_board_options["listPage"] ?>';</script>

  <?php
  $db = null;
?>
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