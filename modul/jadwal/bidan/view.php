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
          <th class="kanan">Tempat</th>
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
                            WHERE petugas.id = '$_SESSION[id]'
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
            </tr>";
            $no++;
          }
        ?>
      </tbody>
    </table>
  </div>
</div>