<?php
$no =1;

//PRIVILEGE BIDAN
if($_SESSION[role] == 'bidan'){
  
  switch($_GET[module]){
    default: require_once('modul/home/bidan/view.php'); break; //Default Halaman (View Home)
    case "home": require_once('modul/home/bidan/view.php'); break; //View Home
    case "ibu": require_once('modul/ibu/bidan/view.php'); break; //View data Ibu
    case "add_ibu": require_once('modul/ibu/bidan/add.php'); break; //Add data Ibu
    case "edit_ibu": require_once('modul/ibu/bidan/edit.php'); break; //Edit data Ibu
    case "balita": require_once('modul/balita/bidan/view.php'); break; //View data Balita
    case "detail_balita": require_once('modul/balita/bidan/detail.php'); break; //Detail data Balita
    case "add_balita": require_once('modul/balita/bidan/add.php'); break; //View data Balita
    case "edit_balita": require_once('modul/balita/bidan/edit.php'); break; //Edit data Balita
    case "petugas": require_once('modul/petugas/bidan/view.php'); break; //View data Petugas
    case "edit_petugas": require_once('modul/petugas/bidan/edit.php'); break;  //Edit data Petugas
    case "jadwal": require_once('modul/jadwal/bidan/view.php'); break; //View data Jadwal Imunisasi
    case "jadwal_imunisasi": require_once('modul/jadwal_imunisasi/bidan/view.php'); break; //View data Jadwal Imunisasi
    case "imunisasi_balita": require_once('modul/imunisasi_balita/bidan/view.php'); break; //View data Imunisasi Balita
    case "add_imunisasi_balita": require_once('modul/imunisasi_balita/bidan/add.php'); break;  //Add data Imunisasi Balita
    case "edit_imunisasi_balita": require_once('modul/imunisasi_balita/bidan/edit.php'); break; //Edit data Imunisasi Balita
    case "posyandu": require_once('modul/posyandu/bidan/view.php'); break; //View data Posyandu
    case "imunisasi": require_once('modul/imunisasi/bidan/view.php'); break; //View data Imunisasi
    case "target": require_once('modul/target/bidan/view.php'); break; //View Target
  }

//PRIVILEGE PETUGAS
}elseif($_SESSION[role] == "petugas"){
  switch($_GET[module]){
    default: require_once('modul/home/petugas/view.php'); break; //Default Halaman (View Home)
    case "home": require_once('modul/home/petugas/view.php'); break; //View Home
    case "ibu": require_once('modul/ibu/petugas/view.php'); break; //View data Ibu
    case "add_ibu": require_once('modul/ibu/petugas/add.php'); break; //Add data Ibu
    case "edit_ibu": require_once('modul/ibu/petugas/edit.php'); break; //Edit data Ibu
    case "balita": require_once('modul/balita/petugas/view.php'); break; //View data Balita
    case "detail_balita": require_once('modul/balita/petugas/detail.php'); break; //Detail data Balita
    case "add_balita": require_once('modul/balita/petugas/add.php'); break; //View data Balita
    case "edit_balita": require_once('modul/balita/petugas/edit.php'); break; //Edit data Balita
    case "imunisasi_balita":  require_once('modul/imunisasi_balita/petugas/view.php'); break;//View data Imunisasi Balita
    case "add_imunisasi_balita": require_once('modul/imunisasi_balita/petugas/add.php'); break; //Add data Imunisasi Balita
    case "edit_imunisasi_balita": require_once('modul/imunisasi_balita/petugas/edit.php'); break;  //Edit data Imunisasi Balita
    case "imunisasi": require_once('modul/imunisasi/petugas/view.php'); break; //View data Imunisasi
    case "posyandu": require_once('modul/posyandu/petugas/view.php'); break; //View data Posyandu
    case "petugas": require_once('modul/petugas/petugas/view.php'); break; //View data Petugas
    case "edit_petugas": require_once('modul/petugas/petugas/edit.php'); break;  //Edit data Petugas
    case "jadwal": require_once('modul/jadwal/petugas/view.php'); break; //View data Jadwal Imunisasi
    case "add_jadwal": require_once('modul/jadwal/petugas/add.php'); break;  //Add data Jadwal Imunisasi
    case "edit_jadwal": require_once('modul/jadwal/petugas/edit.php'); break; //Edit data Jadwal Imunisasi
    case "jadwal_imunisasi": require_once('modul/jadwal_imunisasi/petugas/view.php'); break; //View data Jadwal Imunisasi
    case "target": require_once('modul/target/petugas/view.php'); break; //View Target
    case "detail_target": require_once('modul/target/petugas/detail.php'); break; //Detail Target
    case "analisis": require_once('modul/analisis/petugas/view.php'); break; //View Analisis
  }

//PRIVILEGE ADMIN
}elseif($_SESSION[role] == "admin"){
  switch($_GET[module]){
    default: require_once('modul/home/admin/view.php'); break; //Default Halaman (View Home)
    case "home": require_once('modul/home/admin/view.php'); break; //View Home
    case "ibu": require_once('modul/ibu/admin/view.php'); break; //View data Ibu
    case "add_ibu": require_once('modul/ibu/admin/add.php'); break; //Add data Ibu
    case "edit_ibu": require_once('modul/ibu/admin/edit.php'); break; //Edit data Ibu
    case "balita": require_once('modul/balita/admin/view.php'); break; //View data Balita
    case "detail_balita": require_once('modul/balita/admin/detail.php'); break; //Detail data Balita
    case "add_balita": require_once('modul/balita/admin/add.php'); break; //View data Balita
    case "edit_balita": require_once('modul/balita/admin/edit.php'); break; //Edit data Balita
    case "imunisasi_balita":  require_once('modul/imunisasi_balita/admin/view.php'); break;//View data Imunisasi Balita
    case "add_imunisasi_balita": require_once('modul/imunisasi_balita/admin/add.php'); break; //Add data Imunisasi Balita
    case "edit_imunisasi_balita": require_once('modul/imunisasi_balita/admin/edit.php'); break;  //Edit data Imunisasi Balita
    case "imunisasi": require_once('modul/imunisasi/admin/view.php'); break; //View data Imunisasi
    case "add_imunisasi": require_once('modul/imunisasi/admin/add.php'); break; //Add data Imunisasi
    case "edit_imunisasi": require_once('modul/imunisasi/admin/edit.php'); break; //Edit data Imunisasi
    case "posyandu": require_once('modul/posyandu/admin/view.php'); break; //View data Posyandu
    case "add_posyandu": require_once('modul/posyandu/admin/add.php'); break;  //Add data posyandu
    case "edit_posyandu": require_once('modul/posyandu/admin/edit.php'); break; //Edit data Posyandu
    case "petugas": require_once('modul/petugas/admin/view.php'); break; //View data Petugas
    case "add_petugas": require_once('modul/petugas/admin/add.php'); break;  //Add data Petugas
    case "edit_petugas": require_once('modul/petugas/admin/edit.php'); break;  //Edit data Petugas
    case "jadwal": require_once('modul/jadwal/admin/view.php'); break; //View data Jadwal Imunisasi
    case "add_jadwal": require_once('modul/jadwal/admin/add.php'); break;  //Add data Jadwal Imunisasi
    case "edit_jadwal": require_once('modul/jadwal/admin/edit.php'); break; //Edit data Jadwal Imunisasi
    case "jadwal_imunisasi": require_once('modul/jadwal_imunisasi/admin/view.php'); break; //View data Jadwal Imunisasi
    case "target": require_once('modul/target/admin/view.php'); break; //View Target
    case "detail_target": require_once('modul/target/admin/detail.php'); break; //Detail Target
    case "analisis": require_once('modul/analisis/admin/view.php'); break; //View Analisis
  }
}
?>