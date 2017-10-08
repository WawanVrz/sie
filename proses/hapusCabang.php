<?php
include "../koneksi.php";

$id_cab=$_GET['id_cab'];
$sql="DELETE from tbcabang where id_cab='$_GET[id_cab]'";
$check = mysqli_query($db,$sql);

if($check)
{
    echo "<script>
				alert ('Data Berhasil Terhapus');
				location.href='../pages/tables/tbCabang.php';
				</script>";
}
else
{
    echo "<script>
				alert ('Data Gagal Terhapus');
				location.href='../pages/tables/tbCabang.php';
				</script>";
}

?>