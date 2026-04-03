function isWhiteSpaceOrEmpty(str) {
  return /^[\s\t\r\n]*$/.test(str);
}

function validate(formularz){
  if(isWhiteSpaceOrEmpty(formularz.elements["f_imie"].value)){
    alert("Podaj imię!");
    return false;
  }
  else return true;

}