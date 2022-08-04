<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/_inc/common.php"; ?>
<?php
  $idx = get('idx', '0');
  if($idx == '0'){
    ?>
    <script>alert("잘못된 접근 입니다.");location.href='/board/';</script>
  <?php
    return;
  }
  //게시물 가져오기
  $stmt = $db-> prepare("SELECT * FROM " . $_board_options["tableName"] . " WHERE idx=:idx;");
  $stmt->bindValue(':idx', $idx);
  $stmt->execute();

  $error = 0;
  $listTag = '<ul>';
  if($row=$stmt->fetch(PDO::FETCH_BOTH)){
    $listTag .= '<li>idx: ' .$row['idx'] . ' </li>';
    $listTag .= '<li>subject: ' .$row['subject'] . '</li>';
    $listTag .= '<li>writer: ' .$row['writer'] . '</li>';
  }else{
    $error += 1;
    $listTag .= '<li>게시글이 삭제되었거나 이동되었을 수 있습니다.</li>';
  }

  $listTag .= '</ul>';
  
  $db = null;
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title><?= $_board_options["name"] ?> 상세보기</title>
    <script>
      function del() {
        if(confirm('정말 삭제하시겠습니다?')){
          location.href="<?= $_board_options['delPage']?>?idx=<?=$idx?>";
        }
      }

    </script>
  </head>
  <body>
    <h1><?= $_board_options["name"] ?> 상세보기</h1>
    <?= $listTag ?>
    <div>
      <button onclick="document.location.href='/board'">목록</button>
      <?php if($error == 0){?>
        <a href="<?=$_board_options["modifyPage"]?>?idx=<?=$idx?>">수정</a>
        <a href="#" onclick="del();return false;" >삭제</a>
      <?php } ?>
    </div>
  </body>
</html>