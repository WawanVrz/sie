
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
    <h3 align="center"> Table Data Pendapatan Per Cabang Per Tahun - Monarch Bali </h3>
    <table border="1" align="center" bordercolor="#ccc" STYLE="BORDER-COLLAPSE:COLLAPSE;" width="100%">
    <tr>
        <td align="center" width="10%"><b>No</b></td>
        <td align="center" width="55%"><b>Nama Cabang</b></td>
        <td align="center" width="55%"><b>Nama Jurusan</b></td>
        <td align="center" width="55%"><b>Range Tahun</b></td>
        <td align="center" width="40%"><b>Jumlah Pendapatan</b></td>
        <td align="center" width="55%"><b>Tahun Dana Didapat</b></td>
    </tr>
     <?php
		define('HOST','localhost');
        define('USER','root');
        define('PASS','');
        define('DB','siedb');

        session_start();
        
        $tahn1 = $_SESSION['tahunset1'];
        $tahn2 = $_SESSION['tahunset2'];
        $cab = $_SESSION['cabangset'];

        $db = mysqli_connect(HOST,USER,PASS,DB) or die ('Unable to Connect');
        $nomor = 0;
		$query="SELECT tp.id_jurusan, tj.nama_jurusan, tj.biaya, sum(tj.biaya) as totalbiaya, tp.thn_daftar as tahun, tc.nama_cab from tbpeserta tp JOIN tbjurusan tj ON tj.id_jurusan = tp.id_jurusan JOIN tbcabang tc ON tc.id_cab = tp.id_cab WHERE tp.id_cab = $cab AND tp.thn_daftar BETWEEN $tahn1 AND $tahn2 GROUP by tp.thn_daftar";
		$hasil = mysqli_query($db,$query);
		if($hasil === FALSE)
		{
			die(mysqli_error());
		}
		while ($data = mysqli_fetch_array ($hasil))
		{
			$tahun=$data['tahun'];
            $jumlah=$data['totalbiaya'];
            $cbang=$data['nama_cab'];
            $jur=$data['nama_jurusan'];
			$nomor++;
			echo "<tr>";
            echo "<td align='center'>".$nomor."</td>";
            echo "<td align='center'>".$cbang."</td>";
            echo "<td align='center'>".$jur."</td>";
			echo "<td align='center'>".$tahn1." - ".$tahn2."</td>";
            echo "<td align='center'>Rp ".$jumlah.",- </td>";
            echo "<td align='center'>".$tahun."</td>";
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
	$dompdf->stream('DataTable_Data_Pendapatan_Percabang_Pertahun.pdf');
?>