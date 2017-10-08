<?php
include "../koneksi.php";
$id_user=$_GET['id_user'];
$string = "SELECT id_cab FROM tbuser WHERE id_user='$id_user'";
$result = mysqli_query($db,$string);
$check = mysqli_fetch_array($result);
            $sql="INSERT INTO tbpeserta (id_jurusan, id_cab, nama, alamat, no_hp, jenis_kelamin, email, thn_daftar) values
			(
				'$_POST[jurusan]',
				'$check[0]',
				'$_POST[nama]',
				'$_POST[alamat]',
				'$_POST[nohp]',
				'$_POST[jk]',
				'$_POST[email]',
				'$_POST[tahun]'
			)";
            $simpan = mysqli_query($db,$sql);
            if ($simpan){
                echo "<script>
				alert ('Data Berhasil Tersimpan');
				location.href='../pages/tables/tbPeserta.php?id_user=$id_user';
				</script>";
            }
?>