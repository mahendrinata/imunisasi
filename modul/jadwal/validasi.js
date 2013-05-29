function validasi(form_data){

  if (form_data.waktu.value == ""){
    alert("Anda belum mengisikan Waktu.");
    form_data.waktu.focus();
    return (false);
  }
  return (true);
}

