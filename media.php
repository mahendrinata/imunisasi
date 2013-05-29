<?php 
  session_start();
  if(empty($_SESSION[id]) || empty($_SESSION[nama]) || empty($_SESSION[password]) || empty($_SESSION[role])){
    header('location:index.php');
  }
  require_once "config/koneksi.php"; 
  require_once "config/library.php"; 
  require_once "config/fungsi_indotgl.php"; 
  require_once "config/fungsi_tanggal.php"; 
  require_once "config/tabel.php"; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
 
<!-- Website Title --> 
<title>Sistem Administrasi Imunisasi</title>

<!-- Meta data for SEO -->
<meta name="description" content="Sistem Informasi Akademik (SIAKAD) Politeknik Negeri Malang">
<meta name="keywords" content="SIAKAD Politeknik Negeri Malang">

<link rel="shortcut icon" href="icon_logo.png" />

<!-- Template stylesheet -->
<link href="template/css/default/screen.css" rel="stylesheet" type="text/css" media="all">
<link href="template/css/default/datepicker.css" rel="stylesheet" type="text/css" media="all">
<!--<link href="template/css/default/tab.css" rel="stylesheet" type="text/css" media="all">-->
<link href="template/css/tipsy.css" rel="stylesheet" type="text/css" media="all">
<link href="template/js/visualize/visualize.css" rel="stylesheet" type="text/css" media="all">
<link href="template/js/jwysiwyg/jquery.wysiwyg.css" rel="stylesheet" type="text/css" media="all">
<link href="template/js/fancybox/jquery.fancybox-1.3.0.css" rel="stylesheet" type="text/css" media="all">
<link href="template/css/tipsy.css" rel="stylesheet" type="text/css" media="all">

<!--[if IE]>
	<link href="css/ie.css" rel="stylesheet" type="text/css" media="all">
	<script type="text/javascript" src="js/excanvas.js"></script>
<![endif]-->

<!-- Jquery and plugins -->
<script type="text/javascript" src="template/js/jquery.js"></script>
<script type="text/javascript" src="template/js/jquery-ui.js"></script>
<script type="text/javascript" src="template/js/jquery.img.preload.js"></script>
<script type="text/javascript" src="template/js/hint.js"></script>
<script type="text/javascript" src="template/js/visualize/jquery.visualize.js"></script>
<script type="text/javascript" src="template/js/jwysiwyg/jquery.wysiwyg.js"></script>
<script type="text/javascript" src="template/js/fancybox/jquery.fancybox-1.3.0.js"></script>
<script type="text/javascript" src="template/js/jquery.tipsy.js"></script>
<script type="text/javascript" src="template/js/custom_blue.js"></script>
<script type="text/javascript" src="template/js/validate.js"></script>
<!--<script type="text/javascript" src="template/js/tabber.js"></script>-->
<script type="text/javascript">
var xmlhttp = createRequestObject();

function createRequestObject() {
    var ro;
    var browser = navigator.appName;
    if(browser == 'Microsoft Internet Explorer'){
        ro = new ActiveXObject('Microsoft.XMLHTTP');
    }else{
        ro = new XMLHttpRequest();
    }
    return ro;
}

</script>
</head>
<body>
<div class="content_wrapper">

	<!-- Begin header -->
	<div id="header">
		<div id="logo"><img src="template/images/logo.png" alt="logopng"/></div>
		<div id="account_info">
			<img src="template/images/icon_online.png" alt="Online" class="mid_align"/>
			Selamat Datang <a href='#'><?php echo $_SESSION[nama]; ?></a> (<?php echo $_SESSION[id];?>)
							 | <a href="logout.php">Logout</a>
		</div>
	</div>
	<!-- End header -->
	<div id="menu">
    </div>
	
	<!-- Begin left panel -->
	<a href="javascript:;" id="show_menu">&raquo;</a>	
	<div id="left_menu">
		<a href="javascript:;" id="hide_menu">&laquo;</a>
		<ul id="main_menu">
		  <li><a href='?module=home'><img src='template/images/icon_home.png' alt='icon_home.png'/>Home</a></li>
		  <li><a href='?module=petugas'><img src='template/images/group.png' alt='group.png'/>Petugas</a></li>
		  <li><a href='?module=posyandu'><img src='template/images/icon_media.png' alt='icon_media.png'/>Posyandu</a></li>
		  <li><a href='?module=imunisasi'><img src='template/images/icon_online.png' alt='icon_online.png'/>Imunisasi</a></li>
		  <li><a href='?module=jadwal'><img src='template/images/icon_kalender.png' alt='icon_kalender.png'/>Jadwal</a></li>
		  <li><a href='?module=ibu'><img src='template/images/icon_student.png' alt='icon_student.png'/>Daftar Ibu</a></li>
		  <li><a href='?module=balita'><img src='template/images/icon_users.png' alt='icon_users.png'/>Daftar Balita</a></li>
		  <li><a href='?module=jadwal_imunisasi'><img src='template/images/icon_jadwal.png' alt='icon_jadwal.png'/>Jadwal Imunisasi</a></li>
		  <li><a href='?module=imunisasi_balita'><img src='template/images/icon_krs.png' alt='icon_krs.png'/>Imunisasi Balita</a></li>
		  <li><a href='?module=target'><img src='template/images/icon_pages.png' alt='icon_pages.png'/>Laporan Target</a></li>
          <?php if($_SESSION[role] == "admin" || $_SESSION[role] == "petugas"){?>
		  <li><a href='?module=analisis'><img src='template/images/chart_bar.png' alt='chart_bar.png'/>Analisis Data</a></li>
          <?php } ?>
		</ul>
		<br class="clear"/>
		
		<!-- Begin left panel calendar -->
		<div id="calendar"></div>
		<!-- End left panel calendar -->
		
	</div>
	<!-- End left panel -->
	
	
	<!-- Begin content -->
	<div id="content">
		<div class="inner">
		<?php require_once('content.php'); ?>
            <br class="clear"/>
	</div>
		
		<br class="clear"/><br class="clear"/>
		
		
		<!-- Begin footer -->
		<div id="footer">
			&copy; Copyright Puskesmas Bungursari, Purwakarta 2012
		</div>
		<!-- End footer -->
		
		
	</div>
<!-- End content --></div>
</body>
</html>
