<?php
  $jadwal=mysql_query("SELECT * FROM jadwal WHERE id='$_GET[id]'");
  $r=mysql_fetch_array($jadwal);
?>
<script type="text/javascript" src="modul/jadwal/validasi.js"></script>
<div class="onecolumn">
  <div class="header">
    <span>Edit Data jadwal</span>
  </div>
  <br class="clear"/>
  <div class="content">
    <form method="post" action="modul/jadwal/petugas/aksi.php?act=edit" onSubmit="return validasi(this)" id="form_data">
    <input type="hidden" name="id" value="<?php echo $r[id]; ?>" readonly="readonly"/>
    <table class="data" cellpadding="0" cellspacing="0" width="100%">
      <tr>
        <th>Posyandu</th>
        <td><select name="id_posyandu">
          <?php
            $posyandu=mysql_query("SELECT * FROM posyandu");
            while($l=mysql_fetch_array($posyandu)){
              if($r[id_posyandu] == $l[id]){
                echo "<option value='$l[id]' selected='selected'>$l[nama]</option>";
              }else{
                echo "<option value='$l[id]'>$l[nama]</option>";
              }
            }
          ?>
        </select></td>
      </tr>
      <tr>
        <th>Waktu</th>
        <td><input type="text" name="waktu" id="datepicker" value="<?php echo $r[waktu]; ?>" onkeypress="return isNoneKey(event)"/></td>
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