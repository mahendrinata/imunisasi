<?php
require_once('../../../config/koneksi.php');

if($_GET[act] == 'add'){
  $add=mysql_query("INSERT INTO imunisasi(nama,
                               waktu,
                               keterangan)
                      VALUES('$_POST[nama]',
                             '$_POST[waktu]',
                             '$_POST[keterangan]')");
  if($add){
    header("Location:../../../media.php?module=imunisasi");
  }
}elseif($_GET[act] == 'edit'){
  $edit=mysql_query("UPDATE imunisasi SET nama='$_POST[nama]',
                                    waktu='$_POST[waktu]',
                                    keterangan='$_POST[keterangan]'
                                WHERE id='$_POST[id]'");
  if($edit){
    header("Location:../../../media.php?module=imunisasi");
  }
}elseif ($_GET[act]=='delete'){
  $delete=mysql_query("DELETE FROM imunisasi WHERE id= '$_GET[id]'");
  if($delete){
    header("Location:../../../media.php?module=imunisasi");
  }
}
?>