<?php
include "../koneksi.php";
            $sql="INSERT INTO tbcabang (nama_cab, alamat, no_telp) values
			(
				'$_POST[nama]',
				'$_POST[alamat]',
				'$_POST[notlp]'
			)";
            $simpan = mysqli_query($db,$sql);
            if ($simpan){
                echo "<script>
				alert ('Data Berhasil Tersimpan');
				location.href='../pages/tables/tbCabang.php';
				</script>";
            }
?>