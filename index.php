<?php
  session_start();
  if(!empty($_SESSION[id]) && !empty($_SESSION[nama]) && !empty($_SESSION[password]) && !empty($_SESSION[role])){
    header('location:media.php');
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sistem Administrai Imunisasi</title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />

<link rel="shortcut icon" href="icon_logo.png" />

<link href="template/css/login.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function validasi(form_data){

  if (form_data.username.value == ""){
    alert("Anda belum mengisikan Usernama.");
    form_data.username.focus();
    return (false);
  }

  if (form_data.password.value == ""){
    alert("Anda belum mengisikan Password.");
    form_data.password.focus();
    return (false);
  }

  return (true);
}

</script>
</head>
<body>
<div id="logo">
	<img src="template/images/logo.png" alt="logopng"/> <!--//  Logo on upper corner -->
</div>
<div class="box">
	<div class="welcome" id="welcometitle"><!--//  Welcome message --> Selamat Datang di Administrasi Imunisasi</div>
  <div id="fields">
	<form action="validatelogin.php" method="post" onsubmit="return validasi(this)" id="form_data">   
    <table width="333">
      <tr>
        <td width="79" height="35"><span class="login">USERNAME</span></td>
        <td width="244" height="35"><label>
          <input name="username" type="text" class="fields" id="username" size="30" />  <!--//  Username field  -->
        </label></td>
      </tr>
      
      
      <tr>
        <td height="35"><span class="login">PASSWORD</span></td>
        <td height="35"><input name="password" type="password" class="fields" id="password" size="30" /></td> <!--//  Password field -->
      </tr>
      
      
      <tr>
        <td height="65">&nbsp;</td>
        <td height="65" valign="middle"><label>
          <input name="button" type="submit" class="button" id="button" value="LOGIN" />
          <!--//  login button -->
        </label></td>
      </tr>
    </table>
    </form>
  </div>
  <div class="copyright" id="copyright">Copyright &copy; Puskesmas Bungursari, Purwakarta 2012.</div>
</div>


</body>
</html>
<?php
if($_GET[id] == 'gagal'){
?>
<script type="text/javascript">
	alert("Login Gagal, Username dan Password tidak sesuai");
</script>
<?php
}
?>
