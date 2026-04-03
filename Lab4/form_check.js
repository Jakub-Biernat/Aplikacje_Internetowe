function isWhiteSpaceOrEmpty(str) {
  return /^[\s\t\r\n]*$/.test(str);
}

function validate(formularz){
  if(!checkStringAndFocus(formularz.elements["f_imie"], "Podaj imię!")) return false;

  if(!checkStringAndFocus(formularz.elements["f_nazwisko"], "Podaj nazwisko!")) return false;

  if(!checkStringAndFocus(formularz.elements["f_kod"], "Podaj kod!")) return false;

  if(!checkStringAndFocus(formularz.elements["f_ulica"], "Podaj ulicę!")) return false;

  if(!checkStringAndFocus(formularz.elements["f_miasto"], "Podaj miasto!")) return false;

  if(!checkEmailAndFocus(formularz.elements["f_email"], "Podaj właściwy e-mail")) return false;
}

function checkStringAndFocus(obj, msg) {
  let str = obj.value;
  let errorFieldName = "e_" + obj.name.substr(2, obj.name.length);
  if (isWhiteSpaceOrEmpty(str)) {
    document.getElementById(errorFieldName).innerHTML = msg;
    obj.focus();
    return false;
  }
  else {
    document.getElementById(errorFieldName).innerHTML = "";
    return true;
  }
}

function checkEmailAndFocus(obj, msg) {
  let str = obj.value;
  let email = /^[a-zA-Z_0-9\.]+@[a-zA-Z_0-9\.]+\.[a-zA-Z][a-zA-Z]+$/;
  let errorFieldName = "e_" + obj.name.substr(2, obj.name.length);
  if (!email.test(str)) {
    document.getElementById(errorFieldName).innerHTML = msg;
    obj.focus();
    return false;
  }
  else {
    document.getElementById(errorFieldName).innerHTML = "";
    return true;
  }
}
