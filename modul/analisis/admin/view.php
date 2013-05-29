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
              echo "<th>$pyd[nama]</th>";
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
              $datatarget[]=$trg[target];
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
              $datapencapaian[]=$pcp[pencapaian];
            }
          ?>
        </tr>
      </tbody>
    </table>
    <div id="chart_wrapper" class="chart_wrapper"></div>
    <br class="clear"/>
    <br class="clear"/>
    <table class="data" cellpadding="0" cellpadding="0" width="100%">
      <tr>
        <th width="200px">H0 (Hipotesis Nol)</th>
        <td>Distribusi Imunisasi pada balita pada tiap posyandu tidak merata</td>
      </tr>
      <tr>
        <th>H1 (Hipotesis Alternatif)</th>
        <td>Distribusi Imunisasi pada balita pada tiap posyandu merata</td>
      </tr>
    </table>  
    <br class="clear"/>
    <br class="clear"/>
    <?php
      for($i=0;$i<=count($datatarget);$i++){
        $jumlah[$i] = pow(($datapencapaian[$i] - $datatarget[$i]),2);
      }
      $ei = array_sum($datatarget);
      $kuadrat = array_sum($jumlah);
      $chi = round($kuadrat/$ei,2);
      $v = count($datatarget)-1;
      $a=0.95;
      $chi_table=array(3.81,5.99,7.81,9.49,11.1,12.6,14.1,15.5,16.9,18.3,19.7,21.0,22.4,23.7,25.0,26.3,27.6,28.9,30.1,31.4,32.7,33.9,35.2,36.4,37.7,38.9,40.1,41.3,42.6,43.8);
      $chi_limit=$chi_table[($v-1)];
    ?>
    <table cellpadding="0" cellspacing="0" width="50%" class="input">
      <tr align="center">
        <th class="kiri">Rumus</th>
        <th>Penghitungan</th>
        <th class="kanan">Hasil</th>
      </tr>
      <tr>
        <td rowspan="2" width="200px"><img src="template/images/chi.jpg" alt="Chi Kuadrat"/></td>
        <td><?php echo $kuadrat; ?></td>
        <td rowspan="2"><?php echo $chi; ?></td>
      </tr>
      <tr>
        <td><?php echo $ei; ?></td>
      </tr>
      <tr>
        <td colspan="3">Oi : Frekuensi Observasi</td>
      </tr>
      <tr>
        <td colspan="3">Ei : Frekuensi Harapan</td>
      </tr>
      <tr>
        <td colspan="3">m  : Banyaknya kategori/kelas(x) &alpha;</td>
      </tr>
      <tr>
        <td colspan="3">&alpha;&nbsp;&nbsp;: Taraf (Standard 5%)</td>
      </tr>
      <tr>
        <td colspan="3">v  : Derajad Kebebasan (m-k-1)</td>
      </tr>
      <tr>
        <td colspan="3">Nilai Kritis <?php echo "(v = ".$v.", &alpha; = ".(1-$a).") = <strong>".$chi_limit."</strong>"; ?></td>
      </tr>
    </table>
    <br class="clear"/>
    <br class="clear"/>
    <table class="data" cellpadding="0" cellpadding="0" width="100%">
      <tr>
        <th width="200px">Nilai Kritis</th>
        <td><?php echo $chi_limit; ?></td>
      </tr>
      <tr>
        <th>Nilai Hitung</th>
        <td><?php echo $chi; ?></td>
      </tr>
      <tr>
        <th>Kesimpulan</th>
        <td>
          <?php 
            if($chi<=$chi_limit){ 
              echo "Distribusi Imunisasi pada balita pada tiap posyandu tidak merata";
            }else{
              echo "Distribusi Imunisasi pada balita pada tiap posyandu merata";
            }
          ?>
        </td>
      </tr>
    </table>  
  </div>
</div>
