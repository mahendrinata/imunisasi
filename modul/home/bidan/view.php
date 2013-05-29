			<h1>Dashboard</h1>
			
			<!-- Begin shortcut menu -->
			<ul id="shortcut">
    			<li>
    			  <a href="?module=petugas" title="Petugas">
				    <img src="template/images/shortcut/Group3-Rescuers-Light-48.png" alt="Petugas"/><br/>
				    <strong>Petugas</strong>
				  </a>
				</li>
    			<li>
    			  <a href="?module=ibu" title="Daftar Ibu" id="ibu">
				    <img src="template/images/shortcut/Accept-female-user-48.png" alt="Daftar Ibu"/><br/>
				    <strong>Ibu</strong>
				  </a>
				</li>
    			<li>
    			  <a href="?module=balita" title="Daftar Balita" id="balita">
				    <img src="template/images/shortcut/Baby-48.png" alt="Daftar Bayi"/><br/>
				    <strong>Balita</strong>
				  </a>
				</li>
				<li>
    			  <a href="?module=imunisasi_balita" title="Imunisasi Balita" id="imunisasi">
				    <img src="template/images/shortcut/Immunizations-48.png" alt="Imunisasi Balita"/><br/>
				    <strong>Imunisasi</strong>
				  </a>
				</li>
				<li>
    			  <a href="?module=target" title="Laporan Target">
				    <img src="template/images/shortcut/Target-48.png" alt="Laporan Target"/><br/>
				    <strong>Target</strong>
				  </a>
				</li>
				<li>
    			  <a href="?module=analisis" title="Analisis Data">
				    <img src="template/images/shortcut/Chart Bar_48.png" alt="Analisis Data"/><br/>
				    <strong>Analisis</strong>
				  </a>
				</li>
  			</ul>
			<!-- End shortcut menu -->
			
			<!-- Begin shortcut notification -->
			<div id="shortcut_notifications">
				<?php
					$ibu =mysql_num_rows(mysql_query("SELECT * FROM ibu WHERE aktif='0'"));
					$balita =mysql_num_rows(mysql_query("SELECT * FROM balita WHERE aktif='0'"));
					$imunisasi =mysql_num_rows(mysql_query("SELECT * FROM imunisasi_balita WHERE aktif='0'"));
				?>
				<span class="notification" rel="ibu"><?php echo $ibu;?></span>
				<span class="notification" rel="balita"><?php echo $balita;?></span>
				<span class="notification" rel="imunisasi"><?php echo $imunisasi;?></span>
			</div>
			<!-- End shortcut noficaton -->
			
			
			<br class="clear"/>
			<!-- Begin graph window -->
<?php
 $akhir = date('Y-m')."-31";
 $awal = date('Y-m')."-01";
?>
<div class="onecolumn">
  <div class="header">
    <span><a href="?module=target">Target Posyandu <?php echo $_SESSION[nama_posyandu]?></a></span>
  </div>
  <br class="clear"/>
  <div class="content">
  <br class="clear"/>
  <div id="chart_wrapper" class="chart_wrapper"></div>
    <br class="clear"/>
    <table id="graph_data" class="data" rel="bar" cellpadding="0" cellspacing="0" width="100%">
	  <caption>Target Posyandu <?php echo $_SESSION[nama_posyandu]?></caption>
      <thead>
        <tr>
          <td class="no_input">&nbsp;</td>
          <?php
            $imunisasi=mysql_query("SELECT * FROM imunisasi");
            while($ims=mysql_fetch_array($imunisasi)){
              echo "<th>$ims[nama]</th>";
            }
          ?>
        </tr>
      </thead>	
      <tbody>
        <tr>
          <th>Target</th>
          <?php
            $target=mysql_query("SELECT imunisasi.id,
                                        (SELECT COUNT(jadwal_imunisasi.id)
                                         FROM jadwal_imunisasi 
                                           INNER JOIN balita
                                             ON balita.id = jadwal_imunisasi.id_balita
                                             AND balita.id_posyandu = '$_SESSION[id_posyandu]' 
                                         WHERE jadwal_imunisasi.id_imunisasi =imunisasi.id
                                           AND jadwal_imunisasi.waktu >= '$awal'
                                           AND jadwal_imunisasi.waktu <= '$akhir') AS target
                                 FROM imunisasi
                                 ORDER BY imunisasi.id ASC");
            while($trg=mysql_fetch_array($target)){
              echo "<td>$trg[target]</td>";
            }
          ?>
        </tr>
        <tr>
          <th>Tercapai</th>
          <?php
            $pencapaian=mysql_query("SELECT imunisasi.id,
                                        (SELECT COUNT(imunisasi_balita.id) 
                                         FROM imunisasi_balita
                                           INNER JOIN balita
                                             ON balita.id = imunisasi_balita.id_balita
                                             AND balita.id_posyandu = '$_SESSION[id_posyandu]' 
                                         WHERE imunisasi_balita.id_imunisasi =imunisasi.id
                                           AND imunisasi_balita.tanggal >= '$awal'
                                           AND imunisasi_balita.tanggal <= '$akhir'
                                           AND imunisasi_balita.aktif= '1') AS pencapaian
                                FROM imunisasi
                                ORDER BY imunisasi.id ASC
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
