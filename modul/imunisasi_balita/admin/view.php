<div class="onecolumn">
  <div class="header">
    <span>Daftar imunisasi balita</span>
  </div>
  <br class="clear"/>
  <div class="content">
    <form method="post" action="modul/imunisasi_balita/admin/aksi.php?act=change" id="form_data">
    <table class="input" cellpadding="0" cellspacing="0" width="100%">
      <tbody>
        <tr align="center">
          <th width="20px" class="kiri"><input type="checkbox" id="check_all"/></th>
          <th width="40px">no</th>
          <th>Nama balita</th>
          <th>Nama Ibu</th>
          <th>Jenis Imunisasi</th>
          <th>Tanggal</th>
          <th>Posyandu</th>
          <th>Status</th>
          <th class="kanan" width="70px">&nbsp;</th>
        </tr>
        <?php
          $imunisasi_balita=mysql_query("SELECT imunisasi_balita.*,
                                   balita.nama AS nama_balita,
                                   ibu.nama AS nama_ibu,
                                   posyandu.nama AS nama_posyandu,
                                   imunisasi.nama AS nama_imunisasi
                            FROM imunisasi_balita
                                 LEFT JOIN imunisasi
                                   ON imunisasi_balita.id_imunisasi= imunisasi.id
                                 LEFT JOIN balita
                                   ON imunisasi_balita.id_balita = balita.id
                                 LEFT JOIN ibu 
                                   ON balita.id_ibu = ibu.id  
                                 LEFT JOIN posyandu 
                                   ON balita.id_posyandu = posyandu.id");
          while($r=mysql_fetch_array($imunisasi_balita)){
    		$line =tabel_normal($no);
            $jk=jk($r[jenis_kelamin]);
            $tgl=tgl_indo($r[tanggal]);
            echo "$line
              <td><input type='checkbox' name='id[]' value='$r[id]'/></td>
              <td>$no</td>
              <td>$r[nama_balita]</td>
              <td>$r[nama_ibu]</td>
              <td>$r[nama_imunisasi]</td>
              <td>$tgl</td>
              <td>$r[nama_posyandu]</td>
              <td align='center'>";
                if($r[aktif] == '1')
                    echo "<img src='template/images/icon_accept.png' alt='icon_accept'/>";
                else
                    echo "<img src='template/images/cancel.png' alt='cancel'/>";
              echo "</td>
              <td>
                <a href='?module=edit_imunisasi_balita&id=$r[id]' title='Edit Data imunisasi_balita $r[nama]'><img src='template/images/icon_edit.png' /></a>
                <a href='modul/imunisasi_balita/admin/aksi.php?act=delete&id=$r[id]' title='Delete Data imunisasi_balita $r[nama]' onClick=\"return confirm('Apakah Anda ingin mengahapus $r[nama]?')\"><img src='template/images/icon_delete.png'></a>
              </td>
            </tr>";
            $no++;
          }
        ?>
        <tr>
          <td colspan="9"><br /><input type="submit" value="Terima Data Imunisasi Balita"/><br /><br /></td>
        </tr>
      </tbody>
    </table>
    <br/>
    <br/>
	<a href="?module=add_imunisasi_balita" title="Tambah Data imunisasi_balita"><img src='template/images/add.png'> <b>Tambah</b></a>
  </div>
</div>