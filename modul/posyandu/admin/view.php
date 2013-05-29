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
          <th>Nama Bidan</th>
          <th class="kanan" width="70px">&nbsp;</th>
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
              <td>
                <a href='?module=edit_posyandu&id=$r[id]' title='Edit Data posyandu $r[nama]'><img src='template/images/icon_edit.png' /></a>
                <a href='modul/posyandu/admin/aksi.php?act=delete&id=$r[id]' title='Delete Data posyandu $r[nama]' onClick=\"return confirm('Apakah Anda ingin mengahapus $r[nama]?')\"><img src='template/images/icon_delete.png'></a>
              </td>
            </tr>";
            $no++;
          }
        ?>
      </tbody>
    </table>
    <br/>
    <br/>
	<a href="?module=add_posyandu" title="Tambah Data posyandu"><img src='template/images/add.png'> <b>Tambah</b></a>
  </div>
</div>