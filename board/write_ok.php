<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/_inc/common.php"; ?>
<?php

  $subject = post('subject', '제목없음');
  $writer = post('writer', '작성자 없음');
  $pwd = post('pwd');
  $content = post('content');

  $stmt = $db->
    prepare("INSERT INTO " .  $_board_options["tableName"] ." (subject, writer, pwd, content) VALUE (:subject,:writer, :pwd, :content)");
  // idx 는 자동으로 들어감 ';"); delete from board; -- 보드삭제 해커명령
  $stmt->bindValue(':subject',$subject);
  $stmt->bindValue(':writer', $writer);
  $stmt->bindValue(':pwd', $pwd);
  $stmt->bindValue(':content', $content);
  $stmt->execute();
  
  $db = null;
?>

<script>
  location.href='<?=$_board_options["listPage"]?>';
</script>
