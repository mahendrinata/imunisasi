<div class="onecolumn">
  <div class="header">
    <span>Daftar Ibu</span>
  </div>
  <br class="clear"/>
  <div class="content">
    <form method="post" action="modul/ibu/admin/aksi.php?act=change" id="form_data">
    <table class="input" cellpadding="0" cellspacing="0" width="100%">
      <tbody>
        <tr align="center">
          <th width="20px" class="kiri"><input type="checkbox" id="check_all"/></th>
          <th width="40px">no</th>
          <th>Nama</th>
          <th>Tempat/Tanggal Lahir</th>
          <th>Telepon</th>
          <th>Alamat</th>
          <th>Status</th>
          <th class="kanan" width="70px">&nbsp;</th>
        </tr>
        <?php
          $ibu=mysql_query("SELECT * FROM ibu");
          while($r=mysql_fetch_array($ibu)){
    		$line =tabel_normal($no);
            $tgl=tgl_indo($r[tgl_lahir]);
            echo "$line
              <td><input type='checkbox' name='id[]' value='$r[id]'/></td>
              <td>$no</td>
              <td>$r[nama]</td>
              <td>$r[tmp_lahir], $tgl</td>
              <td>$r[telepon]</td>
              <td>$r[alamat]</td>
              <td align='center'>";
                if($r[aktif] == '1')
                    echo "<img src='template/images/icon_accept.png' alt='icon_accept'/>";
                else
                    echo "<img src='template/images/cancel.png' alt='cancel'/>";
              echo "</td>
              <td>
                <a href='?module=edit_ibu&id=$r[id]' title='Edit Data Ibu $r[nama]'><img src='template/images/icon_edit.png' /></a>
                <a href='modul/ibu/admin/aksi.php?act=delete&id=$r[id]' title='Delete Data Ibu $r[nama]' onClick=\"return confirm('Apakah Anda ingin mengahapus $r[nama]?')\"><img src='template/images/icon_delete.png'></a>
              </td>
            </tr>";
            $no++;
          }
        ?>
        <tr>
          <td colspan="9"><br /><input type="submit" value="Terima Data Ibu"/><br /><br /></td>
        </tr>
      </tbody>
    </table>
    <br/>
    <br/>
	<a href="?module=add_ibu" title="Tambah Data Ibu"><img src='template/images/add.png'> <b>Tambah</b></a>
  </div>
</div>