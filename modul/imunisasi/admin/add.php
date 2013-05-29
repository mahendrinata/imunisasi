<script type="text/javascript" src="modul/imunisasi/validasi.js"></script>
<div class="onecolumn">
  <div class="header">
    <span>Tambah Data imunisasi</span>
  </div>
  <br class="clear"/>
  <div class="content">
    <form method="post" action="modul/imunisasi/admin/aksi.php?act=add" onSubmit="return validasi(this)" id="form_data">
    <table class="data" cellpadding="0" cellspacing="0" width="100%">
      <tr>
        <th width="150px">Nama</th>
        <td><input type="text" name="nama" size="60" maxlength="50" onkeypress="return isAlfabetKey(event)"/></td>
      </tr>
      <tr>
        <th>Waktu</th>
        <td><input type="text" maxlength="5" name="waktu" size="5" onkeypress="return isNumberKey(event)"/></td>
      </tr>
      <tr>
        <th>Keterangan</th>
        <td><textarea name="keterangan" cols="80" rows="8"></textarea></td>
      </tr>
      <tr>
        <th></th>
        <td><input type="submit" value="Simpan"/></td>
      </tr>
    </table>
    </form>
    <br/>
    <br/>
	<a href="?module=imunisasi" title="Kembali"><img src='template/images/back.png'> <b>Kembali</b></a>
  </div>
</div>