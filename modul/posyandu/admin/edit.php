<?php
  $posyandu=mysql_query("SELECT * FROM posyandu WHERE id='$_GET[id]'");
  $r=mysql_fetch_array($posyandu);
?>
<script type="text/javascript" src="modul/posyandu/validasi.js"></script>
<div class="onecolumn">
  <div class="header">
    <span>Edit Data posyandu</span>
  </div>
  <br class="clear"/>
  <div class="content">
    <form method="post" action="modul/posyandu/admin/aksi.php?act=edit" onSubmit="return validasi(this)" id="form_data">
    <input type="hidden" name="id" value="<?php echo $r[id]; ?>" readonly="readonly"/>
    <table class="data" cellpadding="0" cellspacing="0" width="100%">
      <tr>
        <th width="150px">Nama</th>
        <td><input type="text" name="nama" size="60" value="<?php echo $r[nama]; ?>" maxlength="50" onkeypress="return isAlfabetKey(event)"/></td>
      </tr>
      <tr>
        <th>Tempat</th>
        <td><textarea name="tempat" cols="42" rows="2"><?php echo $r[tempat]; ?></textarea></td>
      </tr>
      <tr>
        <th>Nama Bidan</th>
        <td><select name="id_petugas">
          <?php
            $petugas=mysql_query("SELECT * FROM petugas WHERE role='bidan'");
            while($l=mysql_fetch_array($petugas)){
              if($r[id_petugas] == $l[id]){
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
	<a href="?module=posyandu" title="Kembali"><img src='template/images/back.png'> <b>Kembali</b></a>
  </div>
</div>