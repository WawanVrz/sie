
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
    <h3 align="center"> Table Data Pengeluaran Per Tahun - Monarch Bali </h3>
    <table border="1" align="center" bordercolor="#ccc" STYLE="BORDER-COLLAPSE:COLLAPSE;" width="50%">
    <tr>
        <td align="center" width="10%"><b>No</b></td>
        <td align="center" width="55%"><b>Tahun</b></td>
        <td align="center" width="40%"><b>Jumlah Pengeluaran</b></td>
    </tr>
     <?php
		define('HOST','localhost');
        define('USER','root');
        define('PASS','');
        define('DB','siedb');

        $db = mysqli_connect(HOST,USER,PASS,DB) or die ('Unable to Connect');
        $nomor = 0;
		$query="SELECT tahun, SUM(biaya) AS jumlah FROM `tbpengeluaran` GROUP BY `tahun` ORDER BY tahun ASC";
		$hasil = mysqli_query($db,$query);
		if($hasil === FALSE)
		{
			die(mysqli_error());
		}
		while ($data = mysqli_fetch_array ($hasil))
		{
			$thn=$data['tahun'];
			$jumlah=$data['jumlah'];
			$nomor++;
			echo "<tr>";
			echo "<td align='center'>".$nomor."</td>";
			echo "<td align='center'>".$thn."</td>";
			echo "<td align='center'>Rp ".$jumlah.",- </td>";
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
	$dompdf->stream('DataTable_Data_Pengeluran_Pertahun.pdf');
?>