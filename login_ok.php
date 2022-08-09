<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/_inc/common.php"; ?>
<?php
$email = post('email');
$pwd = post('pwd');
if($email == '' || $pwd == '') {
?>
<script>alert('잘못된 접근 입니다.');location.href='<?=$_board_options["listPage"]?>';</script>
<?php
return;
}

/* // 비밀번호확인을 위해 게시물 가져오기
$stmt = $db->prepare("SELECT * FROM " . $_board_options["tableName"] . " WHERE idx=:idx;");
$stmt->bindValue(':idx', $idx);
$stmt->execute();
if($row = $stmt->fetch(PDO::FETCH_BOTH)) {
    if($row['pwd'] != $pwd) {
        ?>
        <script>alert('비밀번호가 일치하지 않습니다.');history.back();</script>
        <?php
        return;
    }
} else {
    ?>
    <script>alert('잘못된 접근 입니다.');location.href='/board/';</script>
    <?php
    return;
} */
//로그인 성공
$_SESSION['login_email'] = $email;

?>
<script>location.href='<?=$_board_options["listPage"]?>';</script>
<?php
$db = null;
?>