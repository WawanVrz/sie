<?php
include "../koneksi.php";
$id_user=$_GET['id_user'];
$id_peserta=$_GET['id_peserta'];
$sql="UPDATE tbpeserta set nama='$_POST[nama]', id_jurusan='$_POST[jurusan]',alamat='$_POST[alamat]', no_hp='$_POST[nohp]', jenis_kelamin='$_POST[jk]', email='$_POST[email]', thn_daftar='$_POST[tahun]' where id_peserta='$id_peserta'";
$simpan = mysqli_query($db,$sql);
if ($simpan){
    echo "<script>
				alert ('Data Berhasil Terupdate');
				location.href='../pages/tables/tbPeserta.php?id_user=$id_user';
				</script>";
}

?>