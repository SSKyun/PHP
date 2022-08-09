<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/_inc/common.php"; ?>
<?php 
// 페이지별 고유한 작업 처리 영역
$page_title = '삭제 페이지';
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
    // 게시물이 있을때는 할일 없음.....
} else {
?>
    <script>alert('잘못된 접근 입니다.');history.back();</script>
<?php
    return;
}

$q = get('q');
$db = null;
?>
<!DOCTYPE html>
<html>
  <head>
  <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/_inc/_inc_page_head.php"; ?>
    <!-- 페이지별 헤더 작성 영역 -->
  </head>
  <body>
    <div id="main" class="container-fluid h-100 bg-opacity-75 p-0">
      <!-- start : global navigation barr --> 
      <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/_inc/_inc_page_gnb.php"; ?>
      <!-- end : global navigation barr --> 
      <!-- start : 페이지별 콘텐츠 영역 -->
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
        <form class="px-5" action="modify_ok.php?idx=<?=$idx?>$q=<?=$q?>" method="post" onsubmit="return chkForm();">
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
      <!-- end : 페이지별 콘텐츠 영역 -->
    
    <!-- start : footer -->
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/_inc/_inc_page_footer.php"; ?>
    <!-- end : footer -->
    </div>
    <!-- 부트스트랩 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
      // 페이지별 스크립트 작성영역  
      function chkInputTypeText(selector, regex, errorMsg) {
                let ele = document.querySelector(selector);
                let value = ele.value;
                if(regex.test(value)) {
                    alert(errorMsg);
                    ele.focus();
                    return false;
                }
                return true;
            }
            function chkForm() {
                // 비밀번호 체크
                if(!chkInputTypeText('#pwd', /^\D*$/, '비밀번호는 숫자만 입력하세요.')) {
                    return false;
                }
                return true;
            }
    </script>
  </body>
</html>













