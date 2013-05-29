function validasi(form_data){

  if (form_data.nama.value == ""){
    alert("Anda belum mengisikan Nama.");
    form_data.nama.focus();
    return (false);
  }

  if (form_data.tmp_lahir.value == ""){
    alert("Anda belum mengisikan Tempat Lahir.");
    form_data.tmp_lahir.focus();
    return (false);
  }

  if (form_data.tgl_lahir.value == ""){
    alert("Anda belum mengisikan Tanggal Lahir.");
    form_data.tgl_lahir.focus();
    return (false);
  }

  if (form_data.id_ibu.value == ""){
    alert("Anda belum mengisikan ID Ibu.");
    form_data.id_ibu.focus();
    return (false);
  }

  return (true);
}

