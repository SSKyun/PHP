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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
<div id="main" class="container-fluid bg-success bg-gradient h-100 bg-opacity-75 p-0">
    <header class="p-3 bg-dark text-white">
    <div class="container-fluid">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="#" class="nav-link px-2 text-red">Home</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Features</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
          <li><a href="<?=$_board_options['listPage']?>" class="nav-link px-2 text-white">자유게시판</a></li>
          <li><a href="#" class="nav-link px-2 text-white">About</a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
        </form>

        <div class="text-end">
          <button type="button" class="btn btn-outline-light me-2">Login</button>
          <button type="button" class="btn btn-warning">삭제 확인</button>
        </div>
      </div>
    </div>
    <div>
        <form class="px-5" action="modify_ok.php?idx=<?=$idx?>" method="post" onsubmit="return chkForm();">
        <input type="hidden" name="idx" value="<?=$idx?>" />
        <div class="col-md-12 mb-2">비밀번호
          <label for="pwd" class="form-label"></label><br/>
          <input type="password" class="form-control" id="pwd" name="pwd" value="" placeholder="비밀번호 입력">
        </div>
        <br/>
        <div>
          <button class="btn btn-secondary" onclick="history.back">취소</button>
          <input class="btn btn-success" type="submit" value="전송">
        </div>
            </form>
        </div>
  </body>
</html>