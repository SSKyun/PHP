<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/_inc/common.php"; ?>
<?php
  //전체 게시물 수 조회
  $stmt1 = $db-> prepare("SELECT COUNT(*) FROM " . $_board_options["tableName"] . ";");
  $stmt1->execute();
  $total_count = $stmt1->fetchColumn();
  
  $stmt2 = $db-> prepare("SELECT * FROM " . $_board_options["tableName"] . " ORDER BY idx DESC;");
  $stmt2->execute();
  $count = $stmt2->rowCount();

  $article_list = [];
  while($row=$stmt2->fetch(PDO::FETCH_BOTH)){
    $article_row = [
        "idx" => $row['idx'],
        "subject" => $row['subject'],
        "writer" => $row['writer'],
        "pwd" => $row['pwd'],
        "viewCount" => $row['viewCount'],
        "created_at" => $row['created_at'],
        "content" => $row['content'],
    ];
    $article_list[] = $article_row;
  }

  $db = null;
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Notice board</title>
  </head>
  <body>
    <h1><?= $_board_options["name"]?>(게시물수: <?= $count ?>/<?= $total_count ?> 건)</h1>
    <table>
      <thead>
        <tr>
          <th>#</th> 
          <th>제목</th> 
          <th>작성자</th> 
          <th>조회 수</th> 
          <th>등록 일시</th> 
        </tr>    
      </thead>
      <tbody>
        <?php
          for($i = 0; $i<count($article_list);$i++){

          
        ?>
        <tr>
          <td><?=($i+1)?></td> 
          <td><a href="<?=$_board_options["viewPage"]?>?idx=<?=$article_list[$i]["idx"]?>">
          <?=$article_list[$i]["subject"]?></a></td> 
          <td><?=$article_list[$i]["writer"]?></td> 
          <td><?=$article_list[$i]["viewCount"]?></td> 
          <td><?=$article_list[$i]["created_at"]?></td> 
          </tr>
        <?php
          }
        ?> 
      </tbody>
    </table>
    <div>
      <a href="<?= $_board_options["writePage"] ?>">new</a>
    </div>
  </body>
</html>