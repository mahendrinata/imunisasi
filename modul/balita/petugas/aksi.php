<?php
require_once('../../../config/koneksi.php');
require_once('../../../config/date_calculate.php');

if($_GET[act] == 'add'){
  $add=mysql_query("INSERT INTO balita(nama,
                               tgl_lahir,
                               tmp_lahir,
                               jenis_kelamin,
                               id_ibu,
                               id_posyandu)
                      VALUES('$_POST[nama]',
                             '$_POST[tgl_lahir]',
                             '$_POST[tmp_lahir]',
                             '$_POST[jenis_kelamin]',
                             '$_POST[id_ibu]',
                             '$_POST[id_posyandu]')");
  if($add){
    header("Location:../../../media.php?module=balita");
  }
}elseif($_GET[act] == 'edit'){
  $edit=mysql_query("UPDATE balita SET nama='$_POST[nama]',
                                    tgl_lahir='$_POST[tgl_lahir]',
                                    tmp_lahir='$_POST[tmp_lahir]',
                                    jenis_kelamin='$_POST[jenis_kelamin]',
                                    id_ibu='$_POST[id_ibu]',
                                    id_posyandu='$_POST[id_posyandu]'
                                WHERE id='$_POST[id]'");
  if($edit){
    header("Location:../../../media.php?module=balita");
  }
}elseif ($_GET[act]=='delete'){
  $delete=mysql_query("DELETE FROM balita WHERE id= '$_GET[id]'");
  if($delete){
    header("Location:../../../media.php?module=balita");
  }
}elseif($_GET[act]=='create'){
  $imunisasi = mysql_query("SELECT id,waktu FROM imunisasi");
  while($r=mysql_fetch_array($imunisasi)){
    $waktu = dateCalculate($_GET[tgl],$r[waktu]);
    mysql_query("INSERT INTO jadwal_imunisasi(id_balita,
                                                id_imunisasi,
                                                waktu)
                          VALUES('$_GET[id]',
                                 '$r[id]',
                                 '$waktu')");
  }
  header("Location:../../../media.php?module=balita");
}elseif($_GET[act]=='change'){
  $data=$_POST[id];
  foreach($data as $id){
    mysql_query("UPDATE balita SET aktif='1' WHERE id='$id'");
  }
  header("Location:../../../media.php?module=balita");
}
?>