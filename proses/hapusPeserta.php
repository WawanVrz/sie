<?php
include "../koneksi.php";

$id_user=$_GET['id_user'];
$sql="DELETE from tbpeserta where id_peserta='$_GET[id_peserta]'";
$check = mysqli_query($db,$sql);

if($check)
{
    echo "<script>
				alert ('Data Berhasil Terhapus');
				location.href='../pages/tables/tbPeserta.php?id_user=$id_user';
				</script>";
}
else
{
    echo "<script>
				alert ('Data Gagal Terhapus');
				location.href='../pages/tables/tbPeserta.php?id_user=$id_user';
				</script>";
}

?>