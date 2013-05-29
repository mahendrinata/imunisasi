<?php
require_once('../../../config/koneksi.php');

$acak =substr(md5($_POST[id]),0,5);
$pass=md5($acak.md5($_POST[password]).$acak);

if($_GET[act] == 'add'){
  $add=mysql_query("INSERT INTO petugas(id,
                               nama,
                               tgl_lahir,
                               tmp_lahir,
                               jenis_kelamin,
                               alamat,
                               telepon,
                               email,
                               role,
                               aktif,
                               password)
                      VALUES('$_POST[id]',
                             '$_POST[nama]',
                             '$_POST[tgl_lahir]',
                             '$_POST[tmp_lahir]',
                             '$_POST[jenis_kelamin]',
                             '$_POST[alamat]',
                             '$_POST[telepon]',
                             '$_POST[email]',
                             '$_POST[role]',
                             '$_POST[aktif]',
                             '$pass')");
  if($add){
    header("Location:../../../media.php?module=petugas");
  }
}elseif($_GET[act] == 'edit'){
  if($_POST[id] != admin){
    if(!empty($_POST[password])){
      $edit=mysql_query("UPDATE petugas SET nama='$_POST[nama]',
                                    tgl_lahir='$_POST[tgl_lahir]',
                                    tmp_lahir='$_POST[tmp_lahir]',
                                    jenis_kelamin='$_POST[jenis_kelamin]',
                                    alamat='$_POST[alamat]',
                                    telepon='$_POST[telepon]',
                                    email='$_POST[email]',
                                    role='$_POST[role]',
                                    aktif='$_POST[aktif]',
                                    password='$pass'
                                WHERE id='$_POST[id]'");
    }else{
      $edit=mysql_query("UPDATE petugas SET nama='$_POST[nama]',
                                    tgl_lahir='$_POST[tgl_lahir]',
                                    tmp_lahir='$_POST[tmp_lahir]',
                                    jenis_kelamin='$_POST[jenis_kelamin]',
                                    alamat='$_POST[alamat]',
                                    telepon='$_POST[telepon]',
                                    email='$_POST[email]',
                                    role='$_POST[role]',
                                    aktif='$_POST[aktif]'
                                WHERE id='$_POST[id]'");
    }
  }else{
    if(!empty($_POST[password])){
      $edit=mysql_query("UPDATE petugas SET nama='$_POST[nama]',
                                    tgl_lahir='$_POST[tgl_lahir]',
                                    tmp_lahir='$_POST[tmp_lahir]',
                                    jenis_kelamin='$_POST[jenis_kelamin]',
                                    alamat='$_POST[alamat]',
                                    telepon='$_POST[telepon]',
                                    email='$_POST[email]',
                                    password='$pass'
                                WHERE id='$_POST[id]'");
    }else{
      $edit=mysql_query("UPDATE petugas SET nama='$_POST[nama]',
                                    tgl_lahir='$_POST[tgl_lahir]',
                                    tmp_lahir='$_POST[tmp_lahir]',
                                    jenis_kelamin='$_POST[jenis_kelamin]',
                                    alamat='$_POST[alamat]',
                                    telepon='$_POST[telepon]',
                                    email='$_POST[email]'
                                WHERE id='$_POST[id]'");
    }
  }
  if($edit){
    header("Location:../../../media.php?module=petugas");
  }
}elseif ($_GET[act]=='delete'){
  $delete=mysql_query("DELETE FROM petugas WHERE id= '$_GET[id]'");
  if($delete){
    header("Location:../../../media.php?module=petugas");
  }
}
?>