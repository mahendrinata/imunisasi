<script type="text/javascript" src="modul/jadwal/validasi.js"></script>
<div class="onecolumn">
  <div class="header">
    <span>Tambah Data jadwal</span>
  </div>
  <br class="clear"/>
  <div class="content">
    <form method="post" action="modul/jadwal/admin/aksi.php?act=add" onSubmit="return validasi(this)" id="form_data">
    <table class="data" cellpadding="0" cellspacing="0" width="100%">
      <tr>
        <th width="150px">Posyandu</th>
        <td><select name="id_posyandu">
          <?php
            $posyandu=mysql_query("SELECT * FROM posyandu");
            while($l=mysql_fetch_array($posyandu)){
              echo "<option value='$l[id]'>$l[nama]</option>";
            }
          ?>
        </select></td>
      </tr>
      <tr>
        <th>Waktu</th>
        <td><input type="text" name="waktu" id="datepicker" onkeypress="return isNoneKey(event)"/></td>
      </tr>
      <tr>
        <th></th>
        <td><input type="submit" value="Simpan"/></td>
      </tr>
    </table>
    </form>
    <br/>
    <br/>
	<a href="?module=jadwal" title="Kembali"><img src='template/images/back.png'> <b>Kembali</b></a>
  </div>
</div>