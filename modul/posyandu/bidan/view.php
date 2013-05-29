<div class="onecolumn">
  <div class="header">
    <span>Posyandu</span>
  </div>
  <br class="clear"/>
  <div class="content">
    <table class="input" cellpadding="0" cellspacing="0" width="100%">
      <tbody>
        <tr align="center">
          <th width="40px" class="kiri">no</th>
          <th>Nama</th>
          <th>Tempat</th>
          <th class="kanan">Nama Bidan</th>
        </tr>
        <?php
          $posyandu=mysql_query("SELECT posyandu.*,petugas.nama AS nama_petugas FROM posyandu LEFT JOIN petugas ON petugas.id = posyandu.id_petugas");
          while($r=mysql_fetch_array($posyandu)){
    		$line =tabel_normal($no);
            $tgl=tgl_indo($r[tgl_lahir]);
            echo "$line
              <td>$no</td>
              <td>$r[nama]</td>
              <td>$r[tempat]</td>
              <td>$r[nama_petugas]</td>
            </tr>";
            $no++;
          }
        ?>
      </tbody>
    </table>
  </div>
</div>