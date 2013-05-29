function validasi(form_data){

  if (form_data.nama.value == ""){
    alert("Anda belum mengisikan Nama Posyandu.");
    form_data.nama.focus();
    return (false);
  }

  if (form_data.tempat.value == ""){
    alert("Anda belum mengisikan Tempat Posyandu.");
    form_data.tempat.focus();
    return (false);
  }
  return (true);
}

