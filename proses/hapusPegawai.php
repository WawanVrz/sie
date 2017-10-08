<?php
include "../koneksi.php";

$id_cab=$_GET['id_cab'];
$sql="DELETE from tbuser where id_user='$_GET[id_pegawai]'";
$check = mysqli_query($db,$sql);

if($check)
{
    echo "<script>
				alert ('Data Berhasil Terhapus');
				location.href='../pages/tables/tbPegawai.php?id_cab=$id_cab';
				</script>";
}
else
{
    echo "<script>
				alert ('Data Gagal Terhapus');
				location.href='../pages/tables/tbPegawai.php?id_cab=$id_cab';
				</script>";
}

?>