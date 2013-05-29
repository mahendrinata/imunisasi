<?php
  if($_POST[bulan] != "" && $_POST[tahun]){
    $tmpAkhir = date_create($_POST[tahun]."-".$_POST[bulan]."-31");
    $tmpAwal = date_create($_POST[tahun]."-".$_POST[bulan]."-01");
    $akhir = date_format($tmpAkhir, 'Y-m-d');
    $awal = date_format($tmpAwal, 'Y-m-d');
    $bln_select = abs(substr($akhir,5,2));
  }else{
    $akhir = date('Y-m')."-31";
    $awal = date('Y-m')."-01";
    $bln_select = date('n');
  }
?>
<div class="onecolumn">
  <div class="header">
    <span>Target Puskesmas Bungursari</span>
  </div>
  <br class="clear"/>
  <div class="content">
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
      <label for="bulan">Bulan</label>
      <select name="bulan" id="bulan">
        <?php
          $bln=1;
          foreach($nama_bln as $bulan){
            if($bln_select == $bln){
              echo "<option value='$bln' selected='selected'>$bulan</option>";
            }else{
              echo "<option value='$bln'>$bulan</option>";
            }
            $bln++;
          }
        ?>
      </select>
      <label for="tahun">Tahun</label>
      <input type="text" name="tahun" id="tahun" size="4" maxlength="4" value="<?php echo date('Y') ?>"/>
      <input type="submit" value="Tampil"/>
    </form>
  <br class="clear"/>
  <div id="chart_wrapper" class="chart_wrapper"></div>
    <br class="clear"/>
    <table id="graph_data" class="data" rel="bar" cellpadding="0" cellspacing="0" width="100%">
	  <caption>Target Puskesmas Bungursari</caption>
      <thead>
        <tr>
          <td class="no_input">&nbsp;</td>
          <?php
            $posyandu=mysql_query("SELECT * FROM posyandu");
            while($pyd=mysql_fetch_array($posyandu)){
              echo "<th><a href='?module=detail_target&id=$pyd[id]&nama=$pyd[nama]&awal=$awal&akhir=$akhir' title='Detail Posyandu $pyd[nama]'>$pyd[nama]</a></th>";
            }
          ?>
        </tr>
      </thead>	
      <tbody>
        <tr>
          <th>Target</th>
          <?php
            $target=mysql_query("SELECT posyandu.id,
                                        (SELECT COUNT(jadwal_imunisasi.id)
                                         FROM jadwal_imunisasi 
                                           INNER JOIN balita
                                             ON balita.id = jadwal_imunisasi.id_balita 
                                         WHERE balita.id_posyandu =posyandu.id
                                           AND jadwal_imunisasi.waktu >= '$awal'
                                           AND jadwal_imunisasi.waktu <= '$akhir') AS target
                                 FROM posyandu
                                 ORDER BY posyandu.id ASC");
            while($trg=mysql_fetch_array($target)){
              echo "<td>$trg[target]</td>";
            }
          ?>
        </tr>
        <tr>
          <th>Tercapai</th>
          <?php
            $pencapaian=mysql_query("SELECT posyandu.id,
                                        (SELECT COUNT(imunisasi_balita.id) 
                                         FROM imunisasi_balita 
                                           INNER JOIN balita 
                                             ON balita.id = imunisasi_balita.id_balita 
                                         WHERE balita.id_posyandu =posyandu.id
                                           AND imunisasi_balita.tanggal >= '$awal'
                                           AND imunisasi_balita.tanggal <= '$akhir'
                                           AND imunisasi_balita.aktif= '1') AS pencapaian
                                FROM posyandu
                                ORDER BY posyandu.id ASC
");
            while($pcp=mysql_fetch_array($pencapaian)){
              echo "<td>$pcp[pencapaian]</td>";
            }
          ?>
        </tr>
      </tbody>
    </table>
    <div id="chart_wrapper" class="chart_wrapper"></div>
  </div>
</div>
