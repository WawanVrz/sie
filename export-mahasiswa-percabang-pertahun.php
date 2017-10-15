
<?php
    require_once 'dompdf/autoload.inc.php';
    ob_start();
?>
<!DOCTYPE html>
 <body>
    <h2 style="padding-left:0px; font-size:22px; text-align:center;"><b> Monarch Cruise Line and Hospitality Training Center </b></h2>
    <p style="padding-left:0px; margin-top:-15px; text-align:center;">Dalung, Kuta Utara, Kabupaten Badung, Bali</p>
    <p style="padding-left:0px; margin-top:-15px; text-align:center;"> Telp. (0361) 9003675 </p>
    <hr>
    <h3 align="center"> Table Data Mahasiswa Per Cabang Per Tahun - Monarch Bali </h3>
    <table border="1" align="center" bordercolor="#ccc" STYLE="BORDER-COLLAPSE:COLLAPSE;" width="100%">
    <tr>
        <td align="center" width="10%"><b>No</b></td>
        <td align="center" width="55%"><b>Nama Cabang</b></td>
        <td align="center" width="55%"><b>Tahun</b></td>
        <td align="center" width="40%"><b>Jumlah</b></td>
    </tr>
     <?php
		define('HOST','localhost');
        define('USER','root');
        define('PASS','');
        define('DB','siedb');

        session_start();
        
        $tahn = $_SESSION['tahunset'];
        $cab = $_SESSION['cabangset'];

        $db = mysqli_connect(HOST,USER,PASS,DB) or die ('Unable to Connect');
        $nomor = 0;
		$query="SELECT count(*) as jumlah, tp.thn_daftar, tb.nama_cab FROM tbpeserta tp JOIN tbcabang tb ON tp.id_cab = tb.id_cab where tp.id_cab = $cab AND tp.thn_daftar = $tahn GROUP BY tp.`thn_daftar` ORDER BY tp.thn_daftar ASC";
		$hasil = mysqli_query($db,$query);
		if($hasil === FALSE)
		{
			die(mysqli_error());
		}
		while ($data = mysqli_fetch_array ($hasil))
		{
			$thn=$data['thn_daftar'];
            $jumlah=$data['jumlah'];
            $cbang=$data['nama_cab'];
			$nomor++;
			echo "<tr>";
            echo "<td align='center'>".$nomor."</td>";
            echo "<td align='center'>".$cbang."</td>";
			echo "<td align='center'>".$thn."</td>";
			echo "<td align='center'>".$jumlah." Orang</td>";
			echo "</tr>";
		}
	 ?>
    </table>
 </body>
</html>
<?php
	use Dompdf\Dompdf;
	use Dompdf\Options;
	$html = ob_get_clean();
	$options = new Options();
	$options->set('isJavascriptEnabled', TRUE);
	$dompdf = new Dompdf($options);
	$dompdf->load_html($html);
	$dompdf->setPaper('A4', 'portrait');
	$dompdf->render();
	$dompdf->stream('DataTable_Mahasiswa_Percabang_Pertahun.pdf');
?>