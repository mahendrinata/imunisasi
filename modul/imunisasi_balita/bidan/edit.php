<?php
  $imunisasi_balita=mysql_query("SELECT * FROM imunisasi_balita WHERE id='$_GET[id]'");
  $r=mysql_fetch_array($imunisasi_balita);
?>
<script type="text/javascript" src="modul/imunisasi_balita/validasi.js"></script>
<div class="onecolumn">
  <div class="header">
    <span>Edit Data imunisasi balita</span>
  </div>
  <br class="clear"/>
  <div class="content">
    <form method="post" action="modul/imunisasi_balita/bidan/aksi.php?act=edit" onSubmit="return validasi(this)" id="form_data">
    <input type="hidden" name="id" value="<?php echo $r[id]; ?>" readonly="readonly"/>
    <table class="data" cellpadding="0" cellspacing="0" width="100%">
      <tr>
        <th width="150px">ID Balita</th>
        <td><input type="text" name="id_balita" value="<?php echo $r[id_balita]; ?>" onkeypress="return isNumberKey(event)"/></td>
      </tr>
      <tr>
        <th>Jenis Imunisasi</th>
        <td><select name="id_imunisasi">
          <?php
            $imunisasi=mysql_query("SELECT * FROM imunisasi");
            while($l=mysql_fetch_array($imunisasi)){
              if($r[id_imunisasi] == $l[id]){
                echo "<option value='$l[id]' selected='selected'>$l[nama]</option>";
              }else{
                echo "<option value='$l[id]'>$l[nama]</option>";
              }
            }
          ?>
        </select></td>
      </tr>
      <tr>
        <th>Tanggal</th>
        <td><input type="text" name="tanggal" id="datepicker" value="<?php echo $r[tanggal]; ?>" onkeypress="return isNoneKey(event)"/></td>
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