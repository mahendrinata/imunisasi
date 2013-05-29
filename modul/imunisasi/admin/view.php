<div class="onecolumn">
  <div class="header">
    <span>Imunisasi Wajib</span>
  </div>
  <br class="clear"/>
  <div class="content">
    <table class="input" cellpadding="0" cellspacing="0" width="100%">
      <tbody>
        <tr align="center">
          <th width="40px" class="kiri">no</th>
          <th>Nama</th>
          <th>Waktu</th>
          <th>Keterangan</th>
          <th class="kanan" width="70px">&nbsp;</th>
        </tr>
        <?php
          $imunisasi=mysql_query("SELECT * FROM imunisasi");
          while($r=mysql_fetch_array($imunisasi)){
    		$line =tabel_normal($no);
            $tgl=tgl_indo($r[tgl_lahir]);
            echo "$line
              <td>$no</td>
              <td>$r[nama]</td>
              <td>$r[waktu] Hari</td>
              <td>$r[keterangan]</td>
              <td>
                <a href='?module=edit_imunisasi&id=$r[id]' title='Edit Data imunisasi $r[nama]'><img src='template/images/icon_edit.png' /></a>
                <a href='modul/imunisasi/admin/aksi.php?act=delete&id=$r[id]' title='Delete Data imunisasi $r[nama]' onClick=\"return confirm('Apakah Anda ingin mengahapus $r[nama]?')\"><img src='template/images/icon_delete.png'></a>
              </td>
            </tr>";
            $no++;
          }
        ?>
      </tbody>
    </table>
    <br/>
    <br/>
	<a href="?module=add_imunisasi" title="Tambah Data imunisasi"><img src='template/images/add.png'> <b>Tambah</b></a>
  </div>
</div>