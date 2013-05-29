<div class="onecolumn">
  <div class="header">
    <span>Daftar Jadwal Posyandu</span>
  </div>
  <br class="clear"/>
  <div class="content">
    <table class="input" cellpadding="0" cellspacing="0" width="100%">
      <tbody>
        <tr align="center">
          <th width="40px" class="kiri">no</th>
          <th>Nama Posyandu</th>
          <th>Nama Bidan</th>
          <th>Waktu</th>
          <th>Tempat</th>
          <th class="kanan" width="70px">&nbsp;</th>
        </tr>
        <?php
          $jadwal=mysql_query("SELECT jadwal.*,
                                   petugas.nama AS nama_petugas,
                                   posyandu.nama AS nama_posyandu,
                                   posyandu.tempat
                            FROM jadwal 
                                 LEFT JOIN posyandu 
                                   ON jadwal.id_posyandu = posyandu.id
                                 LEFT JOIN petugas 
                                   ON posyandu.id_petugas= petugas.id
                            ORDER BY waktu DESC");
          while($r=mysql_fetch_array($jadwal)){
    		$line =tabel_jadwal($r[waktu],$no);
            $tgl=tgl_indo($r[waktu]);
            echo "$line
              <td>$no</td>
              <td>$r[nama_posyandu]</td>
              <td>$r[nama_petugas]</td>
              <td>$tgl</td>
              <td>$r[tempat]</td>
              <td>
                <a href='?module=edit_jadwal&id=$r[id]' title='Edit Data jadwal $r[nama]'><img src='template/images/icon_edit.png' /></a>
                <a href='modul/jadwal/admin/aksi.php?act=delete&id=$r[id]' title='Delete Data jadwal $r[nama]' onClick=\"return confirm('Apakah Anda ingin mengahapus $r[nama]?')\"><img src='template/images/icon_delete.png'></a>
              </td>
            </tr>";
            $no++;
          }
        ?>
      </tbody>
    </table>
    <br/>
    <br/>
	<a href="?module=add_jadwal" title="Tambah Data jadwal"><img src='template/images/add.png'> <b>Tambah</b></a>
  </div>
</div>