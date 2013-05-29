<?php
require_once('../../../config/koneksi.php');

$acak =substr(md5($_POST[id]),0,5);
$pass=md5($acak.md5($_POST[password]).$acak);

if($_GET[act] == 'edit'){
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
  if($edit){
    header("Location:../../../media.php?module=petugas");
  }
}
?>