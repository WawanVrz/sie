
<html>
 <body>
    <h2 style="padding-left:0px; font-size:22px; text-align:center;"><b> Monarch Cruise Line and Hospitality Training Center </b></h2>
    <p style="padding-left:0px; margin-top:-15px; text-align:center;">Dalung, Kuta Utara, Kabupaten Badung, Bali</p>
    <p style="padding-left:0px; margin-top:-15px; text-align:center;"> Telp. (0361) 9003675 </p>
    <hr>
    <h3 align="center"> Table Data Mahasiswa Per Tahun - Monarch Bali </h3>
    <table border="1" align="center" bordercolor="#ccc" STYLE="BORDER-COLLAPSE:COLLAPSE;" width="50%">
    <tr>
        <td align="center" width="10%"><b>No</b></td>
        <td align="center" width="55%"><b>Tahun Masuk</b></td>
        <td align="center" width="40%"><b>Jumlah</b></td>
    </tr>
     <?php
		define('HOST','localhost');
        define('USER','root');
        define('PASS','');
        define('DB','siedb');

        $db = mysqli_connect(HOST,USER,PASS,DB) or die ('Unable to Connect');
        $nomor = 0;
		$query="select count(*) as jumlah,thn_daftar FROM tbpeserta GROUP BY `thn_daftar` ORDER BY thn_daftar ASC";
		$hasil = mysqli_query($db,$query);
		if($hasil === FALSE)
		{
			die(mysqli_error());
		}
		while ($data = mysqli_fetch_array ($hasil))
		{
			$thn=$data['thn_daftar'];
			$jumlah=$data['jumlah'];
			$nomor++;
			echo "<tr>";
			echo "<td align='center'>".$nomor."</td>";
			echo "<td align='center'>".$thn."</td>";
			echo "<td align='center'>".$jumlah." Orang</td>";
			echo "</tr>";
		}
	 ?>
    </table>
 </body>
</html>