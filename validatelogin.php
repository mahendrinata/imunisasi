<?php
require_once "config/koneksi.php";
function anti_injection($data){
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}

$username = anti_injection($_POST['username']);
$acak =substr(md5($username),0,5);
$pass=anti_injection(md5($acak.md5($_POST[password]).$acak));

// pastikan username dan password adalah berupa huruf atau angka.
if (!ctype_alnum($username) OR !ctype_alnum($pass)){
  echo "Inputan anda tidak diperkenankan";
}
else{
$login=mysql_query("SELECT petugas.*,
                           posyandu.id AS id_posyandu, 
                           posyandu.nama AS nama_posyandu 
                    FROM petugas 
                      LEFT JOIN posyandu 
                        ON posyandu.id_petugas = petugas.id 
                    WHERE petugas.id='$username' 
                      AND petugas.password='$pass' 
                      AND aktif='1'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);
// Apabila username dan password ditemukan
if ($ketemu > 0){

  session_start();
  session_register(id);
  session_register(nama);
  session_register(password);
  session_register(role);
  session_register(id_posyandu);
  session_register(nama_posyandu);
  
  $_SESSION[id]           = $r[id];
  $_SESSION[nama]         = $r[nama];
  $_SESSION[password]     = $r[password];
  $_SESSION[role]         = $r[role];
  $_SESSION[id_posyandu]  = $r[id_posyandu];
  $_SESSION[nama_posyandu]= $r[nama_posyandu];
  
  header('location:media.php?module=home');
}
else{
  header('location:index.php?id=gagal');	
}
}
?>
