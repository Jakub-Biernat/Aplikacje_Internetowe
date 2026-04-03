function isWhiteSpaceOrEmpty(str) {
  return /^[\s\t\r\n]*$/.test(str);
}

function validate(formularz){
  if(!checkString(formularz.elements["f_imie"].value, "Podaj imię!")) return false;

  if(!checkString(formularz.elements["f_nazwisko"].value, "Podaj nazwisko!")) return false;

  if(!checkString(formularz.elements["f_kod"].value, "Podaj kod!")) return false;

  if(!checkString(formularz.elements["f_ulica"].value, "Podaj ulicę!")) return false;

  if(!checkString(formularz.elements["f_miasto"].value, "Podaj miasto!")) return false;

  if(!checkEmail(formularz.elements["f_email"].value)) return false;
}

function checkString(str, alertText){
  if(isWhiteSpaceOrEmpty(str)){
    alert(alertText);
    return false;
  }
  else return true;
}

function checkEmail(str) {
  let email = /^[a-zA-Z_0-9\.]+@[a-zA-Z_0-9\.]+\.[a-zA-Z][a-zA-Z]+$/;
  if (email.test(str))
    return true;
  else {
    alert("Podaj właściwy e-mail");
    return false;
  }
}
