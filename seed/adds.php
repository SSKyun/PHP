<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/_inc/common.php"; ?>
<?php

  $subject = '제목';
  $writer = '작성자';
  $pwd = '1234';
  $content = '내용';

  $stmt = $db->
    prepare("INSERT INTO " .  $_board_options["tableName"] ." (subject, writer, pwd, content) VALUE (:subject,:writer, :pwd, :content)");
  // idx 는 자동으로 들어감 ';"); delete from board; -- 보드삭제 해커명령
  $stmt->bindParam(':subject',$subject);
  $stmt->bindParam(':writer', $writer);
  $stmt->bindParam(':pwd', $pwd);
  $stmt->bindParam(':content', $content);
  
  for($i = 1; $i < 567 ; $i++){
    $subject = '제목 ' . $i;
    $writer = '작성자 '. $i;
    $pwd = '1234';
    $content = '내용 '. $i;
    $stmt->execute();
  }
  
  $db = null;
?>

<script>
  location.href='<?=$_board_options["listPage"]?>';
</script>
