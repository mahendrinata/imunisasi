<?php
require_once('../../../config/koneksi.php');

if($_GET[act] == 'add'){
  $add=mysql_query("INSERT INTO jadwal(id_posyandu,
                               waktu)
                      VALUES('$_POST[id_posyandu]',
                             '$_POST[waktu]')");
  if($add){
    header("Location:../../../media.php?module=jadwal");
  }
}elseif($_GET[act] == 'edit'){
  $edit=mysql_query("UPDATE jadwal SET waktu='$_POST[waktu]',
                                    id_posyandu='$_POST[id_posyandu]'
                                WHERE id='$_POST[id]'");
  if($edit){
    header("Location:../../../media.php?module=jadwal");
  }
}elseif ($_GET[act]=='delete'){
  $delete=mysql_query("DELETE FROM jadwal WHERE id= '$_GET[id]'");
  if($delete){
    header("Location:../../../media.php?module=jadwal");
  }
}
?>