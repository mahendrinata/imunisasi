// JavaScript Document

function isNumberKey(evt){
  var charCode = (evt.which) ? evt.which : event.keyCode
  if (charCode > 31 && (charCode < 48 || charCode > 57)){
    return false;
  }
  return true;
}

function isAlfabetKey(evt){
  var charCode = (evt.which) ? evt.which : event.keyCode
  if (charCode > 32 && (charCode < 65 || charCode > 91) && (charCode < 97 || charCode > 122)){
    return false;
  }
  return true;
}

function isNoneKey(evt){
  var charCode = (evt.which) ? evt.which : event.keyCode
  if (charCode > 0){
    return false;
  }
  return true;
}

