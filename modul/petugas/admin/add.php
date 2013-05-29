<script type="text/javascript" src="modul/petugas/validasi_input.js"></script>
<div class="onecolumn">
  <div class="header">
    <span>Tambah Data petugas</span>
  </div>
  <br class="clear"/>
  <div class="content">
    <form method="post" action="modul/petugas/admin/aksi.php?act=add" onSubmit="return validasi(this)" id="form_data">
    <table class="data" cellpadding="0" cellspacing="0" width="100%">
      <tr>
        <th width="150px">Username</th>
        <td><input type="text" name="id" maxlength="20"/></td>
      </tr>
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
          <input type="radio" name="jenis_kelamin" id="laki" value="L"/><label for="laki">Laki -laki</label>
          <input type="radio" name="jenis_kelamin" id="perempuan" value="P" checked="checked"/><label for="perempuan">Perempuan</label>
        </td>
      </tr>
      <tr>
        <th>Alamat</th>
        <td><textarea name="alamat" rows="5" cols="42"></textarea></td>
      </tr>
      <tr>
        <th>Telepon</th>
        <td><input type="text" name="telepon" onkeypress="return isNumberKey(event)"/></td>
      </tr>
      <tr>
        <th>Email</th>
        <td><input type="text" name="email" size="60" size="50" maxlength="50"/></td>
      </tr>
      <tr>
        <th>Role</th>
        <td>
          <input type="radio" name="role" id="petugas" value="petugas"/><label for="petugas">Petugas</label>
          <input type="radio" name="role" id="bidan" value="bidan" checked="checked"/><label for="bidan">Bidan</label>
        </td>
      </tr>
      <tr>
        <th>Status</th>
        <td>
          <input type="radio" name="aktif" id="aktif" value="1" checked="checked"/><label for="aktif">Aktif</label>
          <input type="radio" name="aktif" id="nonaktif" value="0"/><label for="nonaktif">Non Aktif</label>
        </td>
      </tr>
      <tr>
        <th>Password</th>
        <td><input type="password" name="password" size="60" maxlength="50"/></td>
      </tr>
      <tr>
        <th></th>
        <td><input type="submit" value="Simpan"/></td>
      </tr>
    </table>
    </form>
    <br/>
    <br/>
	<a href="?module=petugas" title="Kembali"><img src='template/images/back.png'> <b>Kembali</b></a>
  </div>
</div>