function validate(formularz){
  if(!checkStringAndFocus(formularz.elements["f_imie"], "Podaj imię!", isWhiteSpaceOrEmpty)) return false;

  if(!checkStringAndFocus(formularz.elements["f_nazwisko"], "Podaj nazwisko!", isWhiteSpaceOrEmpty)) return false;

  if(!checkStringAndFocus(formularz.elements["f_kod"], "Podaj kod!", isWhiteSpaceOrEmpty)) return false;

  if(!checkStringAndFocus(formularz.elements["f_ulica"], "Podaj ulicę!", isWhiteSpaceOrEmpty)) return false;

  if(!checkStringAndFocus(formularz.elements["f_miasto"], "Podaj miasto!", isWhiteSpaceOrEmpty)) return false;

  if(!checkStringAndFocus(formularz.elements["f_email"], "Podaj właściwy e-mail", isEmailInvalid)) return false;
}

function isWhiteSpaceOrEmpty(str) {
  return /^[\s\t\r\n]*$/.test(str);
}

function isEmailInvalid(str) {
  let email = /^[a-zA-Z_0-9\.]+@[a-zA-Z_0-9\.]+\.[a-zA-Z][a-zA-Z]+$/;
  if (email.test(str))
    return false;
  else {
    return true;
  }
}


function checkStringAndFocus(obj, msg, func) {
  let str = obj.value;
  let errorFieldName = "e_" + obj.name.substr(2, obj.name.length);
  if (func(str)) {
    document.getElementById(errorFieldName).innerHTML = msg;
    obj.focus();
    return false;
  }
  else {
    document.getElementById(errorFieldName).innerHTML = "";
    return true;
  }
}

function showElement(e) {
  document.getElementById(e).style.visibility = 'visible';
}

function hideElement(e) {
  document.getElementById(e).style.visibility = 'hidden';
}
