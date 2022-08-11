<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/_inc/common.php"; ?>
<?php
// 페이지별 고유한 작업 처리 영역
$page_title = '회원가입';
?>

<!doctype html>
<html>
    <head>
        <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/_inc/_inc_page_head.php"; ?>
        <!-- 페이지별 헤더 작성 영역 -->
    </head>
    <body>
        <div id="main" class="container-fluid h-100 px-0">
            <!-- start: global navigation bar -->
            <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/_inc/_inc_page_gnb.php"; ?>
            <!-- end: global navigation bar -->

            <!-- start: 페이지별 콘텐츠 영역 -->
            <div class="py-3 px-5 col-4 offset-4">
                <header class="d-flex align-items-center pb-3 mb-1">
                    <a href="#" class="d-flex align-items-center text-dark text-decoration-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="32" class="me-2" viewBox="0 0 118 94" role="img"><title>Bootstrap</title><path fill-rule="evenodd" clip-rule="evenodd" d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z" fill="currentColor"></path></svg>
                    <span class="fs-4">회원가입작성</span>
                    </a>
                </header>
                <form action="/join_ok.php" method="post" onsubmit="return chkForm();">
                    <input type="hidden" id="checkDualEmail" value="false">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>                        
                        <div class="input-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" onchange="changeEmailValue();" onkeyup="emailValueUpdated();">
                            <button class="btn btn-outline-secondary" type="button" onclick="chkDualEmail();return false;">중복확인</button>
                        </div>
                        <div id="email-comment" class="m-2"></div>                        
                    </div>

                    <div class="mb-3">
                        <label for="pwd" class="form-label">Password</label>
                        <input type="password" class="form-control" id="pwd" placeholder="비밀번호" onchange="chkPwdLv();" onkeyup="chkPwdLv();">
                        <div id="pwd-comment" class="m-2">비밀번호 보안성 체크</div> 
                    </div>

                    <div class="mb-3">
                        <label for="pwd2" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="pwd2" placeholder="비밀번호 확인" onchange="confirmPwd();" onkeyup="confirmPwd();">
                        <div id="pwd2-comment" class="m-2">비밀번호 확인 체크</div> 
                    </div>

                    <div class="mb-3">
                        <label for="user-name" class="form-label">User Name</label>
                        <input type="text" class="form-control" id="user-name" name="user_name" placeholder="이름" onchange="chkUserName();" onkeyup="chkUserName();">
                        <div id="user-name-comment" class="m-2">이름 입력 체크</div>
                    </div>

                    <div class="mb-3">
                        <label for="hp" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="hp" name="hp" placeholder="휴대전화번호" onchange="chkHp();" onkeyup="chkHp();">
                        <div id="hp-comment" class="m-2">전화번호 체크</div>
                    </div>

                    <div class="mb-3 text-center">
                        <a href="#" class="btn btn-secondary" onclick="history.back();">취소</a>
                        <input type="submit" class="btn btn-primary" value="전송">
                    </div>
                </form>
            </div>
            <!-- end: 페이지별 콘텐츠 영역 -->

            <!-- start: footer -->
            <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/_inc/_inc_page_footer.php"; ?>
            <!-- end: footer -->
            <script>
            // 페이지별 스크립트 작성 영역
            function chkHp(){//전화번호 체크
                let hp = $('#hp').val();
                if(!/^01[016789]-?[0-9]{4}-?[0-9]{4}$/.test(hp)){
                    $('#hp-comment').html('전화번호 바르게 입력하세요.');
                    return;
                }else{
                    $('#hp-comment').html('등록 가능한 번호 입니다.');
                    return;
                }         
            }
            function chkUserName(){ //이름 입력확인
                let userName = $('#user-name').val();
                if(!/^[가-힣]{1,2}[ ]?[가-힣]{1,}$/.test(userName)){
                    $('#user-name-comment').html('이름은 한글로 2글자 이상 띄워쓰기 없이 입력');
                    return;
                }else{
                    $('#user-name-comment').html('등록 가능한 이름입니다.');
                    return;
                }          
            }
            function confirmPwd(){ //비밀번호 확인 체크
                let pwd = $('#pwd').val();
                let pwd2 = $('#pwd2').val();
                if(pwd == ''){
                    $('#pwd2-comment').html('비밀번호를 먼저 입력하세요.');
                    return;       
                }
                if(pwd == pwd2){
                    $('#pwd2-comment').html('비밀번호와 일치합니다.');
                    return;
                }else{
                    $('#pwd2-comment').html('비밀번호와 일치하지않습니다.');
                    return;
                }
                console.log(`${pwd} : ${pwd2}`)
            }
            function chkPwdLv(){ //비밀번호 보안레벨 체크 함수
                $('#pwd2-comment').html('비밀번호 확인 체크');
                let pwd = $('#pwd').val();
                let level = 1;
                if(/[0-9]{1,}/.test(pwd) && /[a-z]{1,}/.test(pwd) && /[A-Z]{1,}/.test(pwd) && pwd.length < 8){
                    level = 2;
                }
                if(/[0-9]{1,}/.test(pwd) && /[a-z]{1,}/.test(pwd) && /[A-Z]{1,}/.test(pwd) && pwd.length >= 8){
                    level = 3;
                }
                if(/[0-9]{1,}/.test(pwd) && /[a-z]{1,}/.test(pwd) && /[A-Z]{1,}/.test(pwd) && /[~!@#$%^&*()-_=+[]{};:'",.<>]{1,}/.test(pwd)  && pwd.length >= 8){
                    level = 4;
                }
                switch(level){
                    case 4:
                        $('#pwd-comment').html('<span class="level-4 text-danger">매우 높음</span>');
                        break;
                    case 3:
                        $('#pwd-comment').html('<span class="level-3 text-warning">높음</span>');
                        break;
                    case 2:
                        $('#pwd-comment').html('<span class="level-2 text-success">중간</span>');
                        break;
                    case 1:
                        $('#pwd-comment').html('<span class="level-1 text-secondary">취약</span>');
                        break;
                }
                console.log(level);
            }
            function emailValueUpdated() {
                let email = $('#email').val();
                if(!/^[a-zA-Z0-9._-]{1,}@[0-9a-zA-Z-]{3,}([.][a-zA-Z]{2,3}){1,2}$/.test(email)) {
                    $('#checkDualEmail').val('false');
                    $('#email-comment').html('이메일 값이 올바르지 않습니다.');
                    return false;
                }
                $.get( `/chkDualEmail.php?email=${encodeURIComponent(email)}`, function( data ) {
                    $('#checkDualEmail').val(data);
                    $('#email-comment').html(data.trim() == 'true' ? '가입 가능한 이메일 입니다.' : '이미 등록된 이메일 입니다.');
                });
            }
            function changeEmailValue() {
                $('#checkDualEmail').val('false');
            }
            function chkDualEmail() {
                let email = $('#email').val();
                // id@domain.com
                if(!/^[a-zA-Z0-9._-]{1,}@[0-9a-zA-Z-]{3,}([.][a-zA-Z]{2,3}){1,2}$/.test(email)) {
                    $('#checkDualEmail').val('false');
                    alert('이메일을 바르게 입력하세요.');
                    return false;
                }
                $.get( `/chkDualEmail.php?email=${encodeURIComponent(email)}`, function( data ) {
                    $('#checkDualEmail').val(data);
                    alert(data.trim() == 'true' ? '가입 가능한 이메일 입니다.' : '이미 가입된 이메일 입니다.');
                });
            }
            function chkForm() {
                let checkDualEmail = $('#checkDualEmail').val();
                if(checkDualEmail != 'true') {
                    alert('이메일 중복 체크를 해주세요.');
                    return false;
                }
                return true;
            }
            </script>
        </div>
    </body>
</html>