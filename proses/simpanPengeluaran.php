<?php
include "../koneksi.php";
$id_user=$_GET['id_user'];
$string = "SELECT id_cab FROM tbuser WHERE id_user='$id_user'";
$result = mysqli_query($db,$string);
$check = mysqli_fetch_array($result);
$sql="INSERT INTO tbpengeluaran (id_jenis, id_cab, deskripsi, biaya, tahun) values
			(
				'$_POST[jenis]',
				'$check[0]',
				'$_POST[deskripsi]',
				'$_POST[biaya]',
				'$_POST[tahun]'
			)";
$simpan = mysqli_query($db,$sql);
if ($simpan){
    echo "<script>
				alert ('Data Berhasil Tersimpan');
				location.href='../pages/tables/tbPengeluaran.php?id_user=$id_user';
				</script>";
}
?>