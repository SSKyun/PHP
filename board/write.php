<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/_inc/common.php"; ?>
<?php 
// 페이지별 고유한 작업 처리 영역
$page_title = '작성 페이지'; // 페이지 이름
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
      <div>
      <form class="px-5" action="<?=$_board_options["writeOkPage"]?>" method="post" onsubmit="return chkForm();"><!--get:편지봉투,post:편지지 -->
        <div class="col-12 mb-2">
          <label for="subject" class="form-label">제목</label>
          <input type="text" class="form-control" id="subject" name="subject" placeholder="제목을 입력하세요">
          <div class="invaild-feedback">
          </div>
        </div>
        <div class="col-12 mb-2">
          <label for="writer" class="form-label">작성자</label>
          <input type="text" class="form-control" id="writer" name="writer" placeholder="작성자를 입력하세요">
          <div class="invaild-feedback">
          </div>
        </div>
        <div class="form-floating mb-2">내용
          <textarea class="form-control" name="content" id="content" col="200" row="50" style="width: 90%; height:200px;"></textarea>
          <label for="floatingTextarea"></label>
        </div>

        <div class="col-md-12 mb-2">비밀번호
          <label for="pwd" class="form-label"></label><br/>
          <input type="password" class="form-control" id="pwd" name="pwd" value="" placeholder="비밀번호 입력">
        </div>
        <br/>
        <div>
          <button class="btn btn-secondary" onclick="history.back()">취소</button>
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
      function chkForm() {
        let options = []; 
        options.push({type: 'text',selector : '#subject',regex:/^\s*$/,errorMsg:'제목을 바르게 입력하세요.'});
        options.push({type: 'text',selector : '#writer',regex:/^\s*$/,errorMsg:'작성자를 바르게 입력하세요'});
        options.push({type: 'text',selector : '#content',regex:/^\s*$/,errorMsg:'내용을 바르게 입력하세요.'});
        options.push({type: 'text',selector : '#pwd',regex:/^\D*$/,errorMsg:'비밀번호는 숫자만 입력하세요.'});
        return kyunCheckForm(options);
      }
    </script>
  </body>
</html>













