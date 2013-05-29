<?php
  $balita=mysql_query("SELECT * FROM balita WHERE id='$_GET[id]'");
  $r=mysql_fetch_array($balita);
?>
<script type="text/javascript" src="modul/balita/validasi.js"></script>
<div class="onecolumn">
  <div class="header">
    <span>Edit Data Balita</span>
  </div>
  <br class="clear"/>
  <div class="content">
    <form method="post" action="modul/balita/admin/aksi.php?act=edit" onSubmit="return validasi(this)" id="form_data">
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
        <td><input type="text" name="tgl_lahir" id="tgl_lahir" value="<?php echo $r[tgl_lahir]; ?>" size="10" maxlength="10" onkeypress="return isNoneKey(event)"/></td>
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
        <th>ID Ibu</th>
        <td><input type="text" name="id_ibu" value="<?php echo $r[id_ibu]; ?>" onkeypress="return isNumberKey(event)"/></td>
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
	<a href="?module=balita" title="Kembali"><img src='template/images/back.png'> <b>Kembali</b></a>
  </div>
</div>