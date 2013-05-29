<div class="onecolumn">
  <div class="header">
    <span>Daftar jadwal imunisasi balita</span>
  </div>
  <br class="clear"/>
  <div class="content">
    <table class="input" cellpadding="0" cellspacing="0" width="100%">
      <tbody>
        <tr align="center">
          <th width="40px" class="kiri">no</th>
          <th>Nama Balita</th>
          <th>Jenis Imunisasi</th>
          <th>Waktu</th>
          <th class="kanan">Nama Posyandu</th>
        </tr>
        <?php
          $jadwal_imunisasi=mysql_query("SELECT jadwal_imunisasi.*,
                                   balita.nama AS nama_balita,
                                   imunisasi.nama AS nama_imunisasi,
                                   posyandu.nama AS nama_posyandu
                            FROM jadwal_imunisasi 
                                 LEFT JOIN imunisasi
                                   ON jadwal_imunisasi.id_imunisasi= imunisasi.id
                                 LEFT JOIN balita 
                                   ON jadwal_imunisasi.id_balita = balita.id
                                 INNER JOIN posyandu 
                                   ON balita.id_posyandu= posyandu.id
                            WHERE posyandu.id = '$_SESSION[id_posyandu]'
                            ORDER BY waktu ASC");
          while($r=mysql_fetch_array($jadwal_imunisasi)){
    		$line =tabel_jadwal($r[waktu],$no);
            $tgl=tgl_indo($r[waktu]);
            echo "$line
              <td>$no</td>
              <td>$r[nama_balita]</td>
              <td>$r[nama_imunisasi]</td>
              <td>$tgl</td>
              <td>$r[nama_posyandu]</td>
            </tr>";
            $no++;
          }
        ?>
      </tbody>
    </table>
  </div>
</div>