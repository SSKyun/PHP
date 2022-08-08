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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Notice board</title>
    <style>
      html, body { 
        height: 28%;
        background-color: mintcream;
      }
      a { text-decoration: none; color: #000;}
      th {text-align: center;}
      .td-no{width: 60px; text-align: center;}
      .td-subject{ }
      .td-writer{width: 120px; text-align: center;}
      .td-view-count{width: 100px; text-align: center;}
      .td-created-at{width: 200px; text-align: center;}

    </style>
  </head>
  <body>
    <div id="main" class="container-fluid bg-success bg-gradient h-100 bg-opacity-75 p-0">
    <header class="p-3 bg-dark text-white">
    <div class="container-fluid">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="#" class="nav-link px-2 text-secondary">Home</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Features</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
          <li><a href="<?=$_board_options['listPage']?>" class="nav-link px-2 text-white">공지사항</a></li>
          <li><a href="#" class="nav-link px-2 text-white">About</a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
        </form>

        <div class="text-end">
          <button type="button" class="btn btn-outline-light me-2">Login</button>
          <button type="button" class="btn btn-warning">Sign-up</button>
        </div>
      </div>
    </div>
  </header>
    </div>
    <div class="b-example-divider"></div>

    <!-- 이전 코드 -->
    <div class="px-5 pt-3">
      <header class="d-flex align-items-center pb-3 border-bottom">
      <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="32" class="me-2" viewBox="0 0 118 94" role="img"><title>Bootstrap</title><path fill-rule="evenodd" clip-rule="evenodd" d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z" fill="currentColor"></path></svg>
      <span class="fs-4"><?=$_board_options['name']?>(게시물수: <?=$count ?>/<?= $total_count?>건)</span>
    </a>
  </header>
    </div>
    <div class="w-100 px-3">
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th class="td-no">#</th> 
          <th class="td-subject">제목</th> 
          <th class="td-writer">작성자</th> 
          <th class="td-view-count">조회 수</th> 
          <th class="td-created-at">등록 일시</th> 
        </tr>    
      </thead>
      <tbody>
        <?php
          for($i = 0; $i<count($article_list);$i++){

          
        ?>
        <tr>
          <td class="td-no"><?=($i+1)?></td> 
          <td class="td-subject"><a href="<?=$_board_options["viewPage"]?>?idx=<?=$article_list[$i]["idx"]?>">
          <?=$article_list[$i]["subject"]?></a></td> 
          <td class="td-writer"><?=$article_list[$i]["writer"]?></td> 
          <td class="td-view-count"><?=$article_list[$i]["viewCount"]?></td> 
          <td class="td-created-at"><?=$article_list[$i]["created_at"]?></td> 
          </tr>
        <?php
          }
        ?> 
      </tbody>
    </table>
    <div>
      <a class="btn btn-outline-info" href="<?= $_board_options["writePage"] ?>">new</a>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


<div class="container-fluid">
  <footer class="py-5">
    <div class="row">
      <div class="col-2">
        <h5>Section</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
        </ul>
      </div>

      <div class="col-2">
        <h5>Section</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
        </ul>
      </div>

      <div class="col-2">
        <h5>Section</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
        </ul>
      </div>

      <div class="col-4 offset-1">
        <form>
          <h5>Subscribe to our newsletter</h5>
          <p>Monthly digest of whats new and exciting from us.</p>
          <div class="d-flex w-100 gap-2">
            <label for="newsletter1" class="visually-hidden">Email address</label>
            <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
            <button class="btn btn-primary" type="button">Subscribe</button>
          </div>
        </form>
      </div>
    </div>

    <div class="d-flex justify-content-between py-4 my-4 border-top">
      <p>&copy; 2022 Company, Inc. All rights reserved.</p>
      <ul class="list-unstyled d-flex">
        <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"/></svg></a></li>
        <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"/></svg></a></li>
        <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"/></svg></a></li>
      </ul>
    </div>
  </footer>
  </div>
  
  </body>
</html>