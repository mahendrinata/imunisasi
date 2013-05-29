function validasi(form_data){

  if (form_data.id_balita.value == ""){
    alert("Anda belum mengisikan ID Balita.");
    form_data.id_balita.focus();
    return (false);
  }

  if (form_data.tanggal.value == ""){
    alert("Anda belum mengisikan Tanggal.");
    form_data.tanggal.focus();
    return (false);
  }

  return (true);
}

