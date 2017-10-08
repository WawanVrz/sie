<?php
include "../koneksi.php";
$id_user=$_GET['id_pegawai'];
$sql="UPDATE tbuser set nama='$_POST[nama]',alamat='$_POST[alamat]', no_hp='$_POST[nohp]', jenis_kelamin='$_POST[jk]', email='$_POST[email]', username='$_POST[username]', password='$_POST[password]' where id_user='$id_user'";
$simpan = mysqli_query($db,$sql);
if ($simpan){
    echo "<script>
				alert ('Data Berhasil Terupdate');
				location.href='../pages/tables/tbCabang.php';
				</script>";
}

?>