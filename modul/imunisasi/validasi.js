function validasi(form_data){

  if (form_data.nama.value == ""){
    alert("Anda belum mengisikan Nama.");
    form_data.nama.focus();
    return (false);
  }

  if (form_data.waktu.value == ""){
    alert("Anda belum mengisikan Waktu.");
    form_data.waktu.focus();
    return (false);
  }

  if (form_data.keterangan.value == ""){
    alert("Anda belum mengisikan Keterangan.");
    form_data.waktu.focus();
    return (false);
  }

  return (true);
}

