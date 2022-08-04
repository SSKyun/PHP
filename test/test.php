<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <h1>회원가입 폼</h1>
  <form action="text1.php">
    <div>아이디</div>
    <input type="text" id="id" name="id" placeholder="아이디 입력하세요">
    <div>이름</div>
    <input type="text" id="name" name="name" placeholder="이름 입력하세요">
    <div>비밀번호</div>
    <input type="password" id="password" name="password" placeholder="비밀번호 입력하세요">
    <div>이메일</div>
    <input type="text" id="email" name="email" placeholder="이메일 입력하세요">@
    <select name="email2">
      <option value="" disabled selected="selected">선택하세요</option>
      <option value="naver.com">naver.com</option>
      <option value="gmail.com">gmail.com</option>
      <option value="daum.net">daum.net</option>
      <option value="nate.com">nate.com</option>
      <option value="in">직접입력</option>
    </select>
    <div>생일</div>
    <input type="date">
    <div>자기소개</div>
    <textarea name="profile" cols="50" rows="5" placeholder="자기소개를 300자 이내로 작성하세요."></textarea>
    <br>
    <input type="submit">
  </form>
</body>
</html>