<?php
require_once('../../../config/koneksi.php');

if($_GET[act] == 'add'){
  $add=mysql_query("INSERT INTO ibu(nama,
                               tgl_lahir,
                               tmp_lahir,
                               telepon,
                               alamat,
                               id_posyandu)
                      VALUES('$_POST[nama]',
                             '$_POST[tgl_lahir]',
                             '$_POST[tmp_lahir]',
                             '$_POST[telepon]',
                             '$_POST[alamat]',
                             '$_POST[id_posyandu]')");
  if($add){
    header("Location:../../../media.php?module=ibu");
  }
}elseif($_GET[act] == 'edit'){
  $edit=mysql_query("UPDATE ibu SET nama='$_POST[nama]',
                                    tgl_lahir='$_POST[tgl_lahir]',
                                    tmp_lahir='$_POST[tmp_lahir]',
                                    telepon='$_POST[telepon]',
                                    alamat='$_POST[alamat]',
                                    id_posyandu='$_POST[id_posyandu]'
                                WHERE id='$_POST[id]'");
  if($edit){
    header("Location:../../../media.php?module=ibu");
  }
}elseif ($_GET[act]=='delete'){
  $delete=mysql_query("DELETE FROM ibu WHERE id= '$_GET[id]'");
  if($delete){
    header("Location:../../../media.php?module=ibu");
  }
}elseif($_GET[act]=='change'){
  $data=$_POST[id];
  foreach($data as $id){
    mysql_query("UPDATE ibu SET aktif='1' WHERE id='$id'");
  }
  header("Location:../../../media.php?module=ibu");
}
?>