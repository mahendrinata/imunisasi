<script type="text/javascript" src="modul/ibu/validasi.js"></script>
<div class="onecolumn">
  <div class="header">
    <span>Tambah Data Ibu</span>
  </div>
  <br class="clear"/>
  <div class="content">
    <form method="post" action="modul/ibu/bidan/aksi.php?act=add" onSubmit="return validasi(this)" id="form_data">
    <table class="data" cellpadding="0" cellspacing="0" width="100%">
      <tr>
        <th width="150px">Nama</th>
        <td><input type="text" name="nama" size="60" maxlength="50" onkeypress="return isAlfabetKey(event)"/></td>
      </tr>
      <tr>
        <th>Tempat Lahir</th>
        <td><input type="text" name="tmp_lahir" size="40" maxlength="50" onkeypress="return isAlfabetKey(event)"/></td>
      </tr>
      <tr>
        <th>Tanggal Lahir</th>
        <td><input type="text" name="tgl_lahir" id="tgl_lahir" size="10" maxlength="10" onkeypress="return isNonetKey(event)"/></td>
      </tr>
      <tr>
        <th>Telepon</th>
        <td><input type="text" name="telepon" onkeypress="return isNumberKey(event)"/></td>
      </tr>
      <tr>
        <th>Alamat</th>
        <td><textarea name="alamat" cols="42" rows="5"></textarea></td>
      </tr>
      <tr>
        <th></th>
        <td><input type="submit" value="Simpan"/></td>
      </tr>
    </table>
    </form>
    <br/>
    <br/>
	<a href="?module=ibu" title="Kembali"><img src='template/images/back.png'> <b>Kembali</b></a>
  </div>
</div>