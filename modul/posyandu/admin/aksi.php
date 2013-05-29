<?php
require_once('../../../config/koneksi.php');

if($_GET[act] == 'add'){
  $add=mysql_query("INSERT INTO posyandu(nama,
                                tempat,
                                id_petugas)
                      VALUES('$_POST[nama]',
                             '$_POST[tempat]',
                             '$_POST[id_petugas]')");
  if($add){
    header("Location:../../../media.php?module=posyandu");
  }
}elseif($_GET[act] == 'edit'){
  $edit=mysql_query("UPDATE posyandu SET nama='$_POST[nama]',
                                    tempat='$_POST[tempat]',
                                    id_petugas='$_POST[id_petugas]'
                                WHERE id='$_POST[id]'");
  if($edit){
    header("Location:../../../media.php?module=posyandu");
  }
}elseif ($_GET[act]=='delete'){
  $delete=mysql_query("DELETE FROM posyandu WHERE id= '$_GET[id]'");
  if($delete){
    header("Location:../../../media.php?module=posyandu");
  }
}
?>