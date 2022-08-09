<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/_inc/common.php"; ?>
<?php 
// 페이지별 고유한 작업 처리 영역
$page_title = '페이지명'; // 페이지 이름
?>
<!DOCTYPE html>
<html>
  <head>
  <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/_inc/_inc_page_head.php"; ?>
    <!-- 페이지별 헤더 작성 영역 -->
    <style>
      html,
      body {
        height: 100%;
      }

      body {
        display: flex;
        align-items: center;
        background-color: #f5f5f5;
      }

      .form-signin {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: auto;
      }

      .form-signin .checkbox {
        font-weight: 400;
      }

      .form-signin .form-floating:focus-within {
        z-index: 2;
      }

      .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
      }

      .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
      }
    </style>
  </head>
  <body>
    <div id="main" class="container-fluid h-100 bg-opacity-75 p-0">
      <!-- start : global navigation barr --> 
      <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/_inc/_inc_page_gnb.php"; ?>
      <!-- end : global navigation barr --> 
      <!-- start : 페이지별 콘텐츠 영역 -->
      <div class="form-signin">
        <form action="login_ok.php" method="post" onsubmit="return chkForm();" >
          <h1 class="h3 mb-3 fw-normal">LOGIN</h1>

          <div class="form-floating">
            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
            <label for="email">Email address</label>
          </div>
          <div class="form-floating">
            <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password">
            <label for="pwd">Password</label>
          </div>

          <button class="w-100 btn btn-lg btn-primary" type="submit"  >LOGIN</button>
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
        options.push({type: 'text',selector : '#email',regex:/^\s*$/,errorMsg:'아이디를 바르게 입력하세요.'});
        options.push({type: 'text',selector : '#pwd',regex:/^$/,errorMsg:'비밀번호를 바르게 입력하세요'});
        return kyunCheckForm(options);
      }
    </script>
  </body>
</html>













