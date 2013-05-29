<?php
  $ibu=mysql_query("SELECT * FROM ibu WHERE id='$_GET[id]'");
  $r=mysql_fetch_array($ibu);
?>
<script type="text/javascript" src="modul/ibu/validasi.js"></script>
<div class="onecolumn">
  <div class="header">
    <span>Edit Data Ibu</span>
  </div>
  <br class="clear"/>
  <div class="content">
    <form method="post" action="modul/ibu/admin/aksi.php?act=edit" onSubmit="return validasi(this)" id="form_data">
    <input type="hidden" name="id" value="<?php echo $r[id]; ?>" readonly="readonly"/>
    <table class="data" cellpadding="0" cellspacing="0" width="100%">
      <tr>
        <th width="150px">Nama</th>
        <td><input type="text" name="nama" size="60" value="<?php echo $r[nama]; ?>" maxlength="50" onkeypress="return isAlfabetKey(event)"/></td>
      </tr>
      <tr>
        <th>Tempat Lahir</th>
        <td><input type="text" name="tmp_lahir" size="40" value="<?php echo $r[tmp_lahir]; ?>" maxlength="50" onkeypress="return isAlfabetKey(event)"/></td>
      </tr>
      <tr>
        <th>Tanggal Lahir</th>
        <td><input type="text" name="tgl_lahir" id="tgl_lahir" value="<?php echo $r[tgl_lahir]; ?>" size="10" maxlength="10" onkeypress="return isNonetKey(event)"/></td>
      </tr>
      <tr>
        <th>Telepon</th>
        <td><input type="text" name="telepon" value="<?php echo $r[telepon]; ?>" onkeypress="return isNumberKey(event)"/></td>
      </tr>
      <tr>
        <th>Alamat</th>
        <td><textarea name="alamat" cols="42" rows="5"><?php echo $r[alamat]; ?></textarea></td>
      </tr>
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