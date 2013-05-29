function validasi(form_data){
  var telp			= /^0[0-9]{8,12}$/;

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

  if (form_data.telepon.value == ""){
    alert("Anda belum mengisikan No. Telepon.");
    form_data.telepon.focus();
    return (false);
  }

  if (form_data.alamat.value == ""){
    alert("Anda belum mengisikan Alamat.");
    form_data.alamat.focus();
    return (false);
  }


   if(form_data.telepon.value.match(telp)){
   }else{
		alert("Penulisan Telepon/HP salah.");
	    form_data.telepon.focus();
		return false;
   }
  
  return (true);
}

