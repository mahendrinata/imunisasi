<script type="text/javascript" src="modul/balita/validasi.js"></script>
<div class="onecolumn">
  <div class="header">
    <span>Tambah Data Balita</span>
  </div>
  <br class="clear"/>
  <div class="content">
    <form method="post" action="modul/balita/bidan/aksi.php?act=add" onSubmit="return validasi(this)" id="form_data">
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
        <td><input type="text" name="tgl_lahir" id="tgl_lahir" size="10" maxlength="10" onkeypress="return isNoneKey(event)"/></td>
      </tr>
      <tr>
        <th>Jenis Kelamin</th>
        <td>
          <input type="radio" name="jenis_kelamin" id="laki" value="L" checked="checked"/><label for="laki">Laki -laki</label>
          <input type="radio" name="jenis_kelamin" id="perempuan" value="P"/><label for="perempuan">Perempuan</label>
        </td>
      </tr>
      <tr>
        <th>ID Ibu</th>
        <td><input type="text" name="id_ibu" onkeypress="return isNumberKey(event)"/></td>
      </tr>
      <tr>
        <th></th>
        <td><input type="submit" value="Simpan"/></td>
      </tr>
    </table>
    </form>
    <br/>
    <br/>
	<a href="?module=balita" title="Kembali"><img src='template/images/back.png'> <b>Kembali</b></a>
  </div>
</div>