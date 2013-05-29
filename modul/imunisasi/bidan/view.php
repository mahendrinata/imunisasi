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
          <th class="kanan">Keterangan</th>
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
            </tr>";
            $no++;
          }
        ?>
      </tbody>
    </table>
  </div>
</div>