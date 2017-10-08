<?php
include "../koneksi.php";
$id_cab=$_GET['id_cab'];
$sql="UPDATE tbcabang set nama_cab='$_POST[nama]', alamat='$_POST[alamat]', no_telp='$_POST[notlp]' where id_cab='$id_cab'";
$simpan = mysqli_query($db,$sql);
if ($simpan){
    echo "<script>
				alert ('Data Berhasil Terupdate');
				location.href='../pages/tables/tbCabang.php;
			</script>";
}

?>