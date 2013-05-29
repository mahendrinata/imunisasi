<?php
  $petugas=mysql_query("SELECT * FROM petugas WHERE id='$_GET[id]'");
  $r=mysql_fetch_array($petugas);
?>
<script type="text/javascript" src="modul/petugas/validasi_edit.js"></script>
<div class="onecolumn">
  <div class="header">
    <span>Tambah Data petugas</span>
  </div>
  <br class="clear"/>
  <div class="content">
    <form method="post" action="modul/petugas/admin/aksi.php?act=edit" onSubmit="return validasi(this)" id="form_data">
    <input type="hidden" name="id" value="<?php echo $r[id]; ?>"/>
    <table class="data" cellpadding="0" cellspacing="0" width="100%">
      <tr>
        <th width="150px">Username</th>
        <td><input type="text" name="id" maxlength="20" value="<?php echo $r[id]; ?>" readonly="readonly"/></td>
      </tr>
      <tr>
        <th width="150px">Nama</th>
        <td><input type="text" name="nama" size="60"  value="<?php echo $r[nama]; ?>" maxlength="50" onkeypress="return isAlfabetKey(event)"/></td>
      </tr>
      <tr>
        <th>Tempat Lahir</th>
        <td><input type="text" name="tmp_lahir" size="40"  value="<?php echo $r[tmp_lahir]; ?>" maxlength="50" onkeypress="return isAlfabetKey(event)"/></td>
      </tr>
      <tr>
        <th>Tanggal Lahir</th>
        <td><input type="text" name="tgl_lahir" id="tgl_lahir"  value="<?php echo $r[tgl_lahir]; ?>" size="10" maxlength="10" onkeypress="return isNoneKey(event)"/></td>
      </tr>
      <tr>
        <th>Jenis Kelamin</th>
        <td>
          <?php if($r[jenis_kelamin] == 'L'){?>
          <input type="radio" name="jenis_kelamin" id="laki" value="L" checked="checked"/><label for="laki">Laki -laki</label>
          <input type="radio" name="jenis_kelamin" id="perempuan" value="P"/><label for="perempuan">Perempuan</label>
          <?php }else{?>
          <input type="radio" name="jenis_kelamin" id="laki" value="L"/><label for="laki">Laki -laki</label>
          <input type="radio" name="jenis_kelamin" id="perempuan" value="P" checked="checked"/><label for="perempuan">Perempuan</label>
          <?php }?>
        </td>
      </tr>
      <tr>
        <th>Alamat</th>
        <td><textarea name="alamat" rows="5" cols="42"><?php echo $r[alamat]; ?></textarea></td>
      </tr>
      <tr>
        <th>Telepon</th>
        <td><input type="text" name="telepon" value="<?php echo $r[telepon]; ?>" onkeypress="return isNumberKey(event)"/></td>
      </tr>
      <tr>
        <th>Email</th>
        <td><input type="text" name="email" size="60" value="<?php echo $r[email]; ?>" maxlength="50"/></td>
      </tr>
      <?php
        if($r[id] != 'ADMIN'){
      ?>
      <tr>
        <th>Role</th>
        <td>
          <?php if($r[role] == 'petugas'){?>
          <input type="radio" name="role" id="petugas" value="petugas" checked="checked"/><label for="petugas">Petugas</label>
          <input type="radio" name="role" id="bidan" value="bidan"/><label for="bidan">Bidan</label>
          <?php }else{?>
          <input type="radio" name="role" id="petugas" value="petugas"/><label for="petugas">Petugas</label>
          <input type="radio" name="role" id="bidan" value="bidan" checked="checked"/><label for="bidan">Bidan</label>
          <?php }?>
        </td>
      </tr>
      <tr>
        <th>Status</th>
        <td>
          <?php if($r[aktif] == '1'){?>
          <input type="radio" name="aktif" id="aktif" value="1" checked="checked"/><label for="aktif">Aktif</label>
          <input type="radio" name="aktif" id="nonaktif" value="0"/><label for="nonaktif">Non Aktif</label>
          <?php }else{?>
          <input type="radio" name="aktif" id="aktif" value="1"/><label for="aktif">Aktif</label>
          <input type="radio" name="aktif" id="nonaktif" value="0" checked="checked"/><label for="nonaktif">Non Aktif</label>
          <?php }?>
        </td>
      </tr>
      <?php
        }
      ?>
      <tr>
        <th>Password</th>
        <td><input type="password" name="password" size="60" maxlength="50"/> *Tidak perlu diisi jika password tidak dirubah</td>
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