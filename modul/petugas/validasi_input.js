function validasi(form_data){
  var tanggal 		= /^[0-9]+\-[0-9]+\-[0-9]$/;
  var kodepos 		= /^[0-9]{5}$/;
  var email 		= /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
  var telp			= /^0[0-9]{8,12}$/;

  if (form_data.id.value == ""){
    alert("Anda belum mengisikan Username.");
    form_data.id.focus();
    return (false);
  }
          
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

  if (form_data.alamat.value == ""){
    alert("Anda belum mengisikan Alamat.");
    form_data.alamat.focus();
    return (false);
  }

  if (form_data.telepon.value == ""){
    alert("Anda belum mengisikan No. Telepon.");
    form_data.telepon.focus();
    return (false);
  }

  if (form_data.email.value == ""){
    alert("Anda belum mengisikan Email.");
    form_data.email.focus();
    return (false);
  }

  if (form_data.password.value == ""){
    alert("Anda belum mengisikan Password.");
    form_data.password.focus();
    return (false);
  }
   

   if(form_data.telepon.value.match(telp)){
   }else{
		alert("Penulisan Telepon/HP salah.");
	    form_data.telepon.focus();
		return false;
   }
  
   if(form_data.email.value.match(email)){
   }else{
		alert("Penulisan Email Salah.");
	    form_data.email.focus();
		return false;
   }
   
  return (true);
}

