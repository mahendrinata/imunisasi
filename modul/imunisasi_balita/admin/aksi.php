<?php
require_once('../../../config/koneksi.php');

if($_GET[act] == 'add'){
  $add=mysql_query("INSERT INTO imunisasi_balita(id_balita,
                               id_imunisasi,
                               tanggal)
                      VALUES('$_POST[id_balita]',
                             '$_POST[id_imunisasi]',
                             '$_POST[tanggal]')");
  if($add){
    header("Location:../../../media.php?module=imunisasi_balita");
  }
}elseif($_GET[act] == 'edit'){
  $edit=mysql_query("UPDATE imunisasi_balita SET id_balita='$_POST[id_balita]',
                                    id_imunisasi='$_POST[id_imunisasi]',
                                    tanggal='$_POST[tanggal]'
                                WHERE id='$_POST[id]'");
  if($edit){
    header("Location:../../../media.php?module=imunisasi_balita");
  }
}elseif ($_GET[act]=='delete'){
  $delete=mysql_query("DELETE FROM imunisasi_balita WHERE id= '$_GET[id]'");
  if($delete){
    header("Location:../../../media.php?module=imunisasi_balita");
  }
}elseif($_GET[act]=='change'){
  $data=$_POST[id];
  foreach($data as $id){
    mysql_query("UPDATE imunisasi_balita SET aktif='1' WHERE id='$id'");
  }
  header("Location:../../../media.php?module=imunisasi_balita");
}
?>