<div class="onecolumn">
  <div class="header">
    <span>Daftar petugas</span>
  </div>
  <br class="clear"/>
  <div class="content">
    <table class="input" cellpadding="0" cellspacing="0" width="100%">
      <tbody>
        <tr align="center">
          <th width="40px" class="kiri">no</th>
          <th>Username</th>
          <th>Nama petugas</th>
          <th>Tempat/Tanggal Lahir</th>
          <th>Jenis Kelamin</th>
          <th>Alamat</th>
          <th>Telepon</th>
          <th>Email</th>
          <th>Role</th>
          <th>Status</th>
          <th class="kanan" width="40px">&nbsp;</th>
        </tr>
        <?php
          $petugas=mysql_query("SELECT * FROM petugas WHERE id <> 'ADMIN'");
          while($r=mysql_fetch_array($petugas)){
    		$line =tabel_normal($no);
            $jk=jk($r[jenis_kelamin]);
            $tgl=tgl_indo($r[tgl_lahir]);
            echo "$line
              <td>$no</td>
              <td>$r[id]</td>
              <td>$r[nama]</td>
              <td>$r[tmp_lahir], $tgl</td>
              <td>$jk</td>
              <td>$r[alamat]</td>
              <td>$r[telepon]</td>
              <td>$r[email]</td>
              <td>$r[role]</td>
              <td align='center'>";
                if($r[aktif] == '1')
                    echo "<img src='template/images/icon_accept.png' alt='icon_accept'/>";
                else
                    echo "<img src='template/images/cancel.png' alt='cancel'/>";
              echo "</td>
              <td>";
                if($_SESSION[id] == $r[id]){
                  echo "<a href='?module=edit_petugas&id=$r[id]' title='Edit Data petugas $r[nama]'><img src='template/images/icon_edit.png' /></a>";
                 }
              echo "</td>
            </tr>";
            $no++;
          }
        ?>
      </tbody>
    </table>
  </div>
</div>