<script type="text/javascript" src="modul/imunisasi_balita/validasi.js"></script>
<div class="onecolumn">
  <div class="header">
    <span>Tambah Data imunisasi balita</span>
  </div>
  <br class="clear"/>
  <div class="content">
    <form method="post" action="modul/imunisasi_balita/petugas/aksi.php?act=add" onSubmit="return validasi(this)" id="form_data">
    <table class="data" cellpadding="0" cellspacing="0" width="100%">
      <tr>
        <th width="150px">ID Balita</th>
        <td><input type="text" name="id_balita" onkeypress="return isNumberKey(event)"/></td>
      </tr>
      <tr>
        <th>Jenis Imunisasi</th>
        <td><select name="id_imunisasi">
          <?php
            $imunisasi=mysql_query("SELECT * FROM imunisasi");
            while($l=mysql_fetch_array($imunisasi)){
              echo "<option value='$l[id]'>$l[nama]</option>";
            }
          ?>
        </select></td>
      </tr>
      <tr>
        <th>Tanggal</th>
        <td><input type="text" name="tanggal" id="datepicker" value="<?php echo date('Y-m-d'); ?>" onkeypress="return isNoneKey(event)"/></td>
      </tr>
      <tr>
        <th></th>
        <td><input type="submit" value="Simpan"/></td>
      </tr>
    </table>
    </form>
    <br/>
    <br/>
	<a href="?module=imunisasi_balita" title="Kembali"><img src='template/images/back.png'> <b>Kembali</b></a>
  </div>
</div>