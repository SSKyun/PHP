
//input type="text"의 필드 값 유효성을 체크 함(write,modify)
function chkInputTypeText(selector,regex,errorMsg){
    let element = document.querySelector(selector);
    let value = element.value;
    if(regex.test(value)){
      alert(errorMsg);
      element.focus();
      return false;
    }
    return true;
  }
  
//form 체크 도우미
function kyunCheckForm(options){
    for(let i=0;i<options.length;i++){
      //항목 체크
      if(options[i].type == 'text'){
        if(!chkInputTypeText(options[i].selector,options[i].regex,options[i].errorMsg)){
          return false;
        }
    }
  }
      return true;
}
  