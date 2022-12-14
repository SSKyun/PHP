<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/_inc/login_user.php"; ?>
<?php 
// 페이지별 고유한 작업 처리 영역
$page_title = '페이지명'; // 페이지 이름
?>
<!DOCTYPE html>
<html>
  <head>
  <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/_inc/_inc_page_head.php"; ?>
    <!-- 페이지별 헤더 작성 영역 -->
  </head>
  <body>
    <div id="main" class="container-fluid h-100 p-0">
      <!-- start : global navigation barr --> 
      <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/_inc/_inc_page_gnb.php"; ?>
      <!-- end : global navigation barr --> 
      <!-- start : 페이지별 콘텐츠 영역 -->

      <div>
        <form id="form" class="px-5" action="user_update2.php" method="post" onsubmit="return chkForm();">
        <input type="hidden" name="idx" value="<?=$idx?>" />
        <div class="col-md-12 mb-2">비밀번호 재확인
          <label for="pwd" class="form-label"></label><br/>
          <input type="password" class="form-control" id="pwd" name="pwd" value="" placeholder="비밀번호 입력">
        </div>
        <br/>
        <div>
          <button class="btn btn-secondary" onclick="history.back();">취소</button>
          <input class="btn btn-success" type="submit" value="비밀번호 확인">
          <a href="#" type="submit" class="btn btn-danger" onclick="goOut();return false;">탈퇴신청</a>
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
      function goOut(){
        $('#form').attr('action','/user_out.php');
        if($('#pwd').val()==''){
          alert('비밀번호를 입력하세요');
          return;
        }
        if(confirm('탈퇴하시면 동일한 이메일로 가입이 불가능합니다. 정말 탈퇴하시겠습니가?')){
          
          $('#form').submit();
        }
      }
    </script>
  </body>
</html>













