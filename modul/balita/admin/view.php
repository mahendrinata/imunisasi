<div class="onecolumn">
  <div class="header">
    <span>Daftar balita</span>
  </div>
  <br class="clear"/>
  <div class="content">
    <form method="post" action="modul/balita/admin/aksi.php?act=change" id="form_data">
    <table class="input" cellpadding="0" cellspacing="0" width="100%">
      <tbody>
        <tr align="center">
          <th width="20px" class="kiri"><input type="checkbox" id="check_all"/></th>
          <th width="40px">no</th>
          <th>Nama Balita</th>
          <th>Tempat/Tanggal Lahir</th>
          <th>Jenis Kelamin</th>
          <th>Nama Ibu</th>
          <th>Posyandu</th>
          <th>Status</th>
          <th class="kanan" width="120px">&nbsp;</th>
        </tr>
        <?php
          $balita=mysql_query("SELECT balita.*,
                                   ibu.nama AS nama_ibu,
                                   posyandu.nama AS nama_posyandu,
                                   (SELECT COUNT(*) 
                                     FROM jadwal_imunisasi 
                                     WHERE jadwal_imunisasi.id_balita=balita.id) AS jadwal
                            FROM balita 
                                 INNER JOIN ibu 
                                   ON balita.id_ibu = ibu.id  
                                 INNER JOIN posyandu 
                                   ON balita.id_posyandu = posyandu.id");
          while($r=mysql_fetch_array($balita)){
    		$line =tabel_normal($no);
            $jk=jk($r[jenis_kelamin]);
            $tgl=tgl_indo($r[tgl_lahir]);
            echo "$line
              <td><input type='checkbox' name='id[]' value='$r[id]'/></td>
              <td>$no</td>
              <td>$r[nama]</td>
              <td>$r[tmp_lahir], $tgl</td>
              <td>$jk</td>
              <td>$r[nama_ibu]</td>
              <td>$r[nama_posyandu]</td>
              <td align='center'>";
                if($r[aktif] == '1')
                    echo "<img src='template/images/icon_accept.png' alt='icon_accept'/>";
                else
                    echo "<img src='template/images/cancel.png' alt='cancel'/>";
              echo "</td>
              <td>
                <a href='?module=detail_balita&id=$r[id]' title='Jadwal Imunisasi $r[nama]'><img src='template/images/icon_calendar.png' /></a> 
                <a href='?module=edit_balita&id=$r[id]' title='Edit Data balita $r[nama]'><img src='template/images/icon_edit.png' /></a> 
                <a href='modul/balita/admin/aksi.php?act=delete&id=$r[id]' title='Delete Data balita $r[nama]' onClick=\"return confirm('Apakah Anda ingin mengahapus $r[nama]?')\"><img src='template/images/icon_delete.png'></a> ";
                if($r[jadwal] == 0){
                  echo "<a href='modul/balita/admin/aksi.php?act=create&id=$r[id]&tgl=$r[tgl_lahir]' title='Buat Jadwal Imunisasi $r[nama]' onClick=\"return confirm('Apakah Anda ingin Membuat Jadwal Imunisasi $r[nama]?')\"><img src='template/images/edit.png'></a>";
                 }
              echo "</td>
            </tr>";
            $no++;
          }
        ?>
        <tr>
          <td colspan="9"><br /><input type="submit" value="Terima Data Balita"/><br /><br /></td>
        </tr>
      </tbody>
    </table>
    </form>
    <br/>
    <br/>
	<a href="?module=add_balita" title="Tambah Data balita"><img src='template/images/add.png'> <b>Tambah</b></a>&nbsp;&nbsp;&nbsp;
	<a title="Cetak Data balita" onclick="PrintContent(document.getElementById('form_data'))"><img src='template/images/printer.png'> <b>Cetak</b></a>
  </div>
</div>