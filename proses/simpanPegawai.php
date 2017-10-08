<?php
include "../koneksi.php";
$id_cab=$_GET['id_cab'];
            $sql="INSERT INTO tbuser (id_cab, nama, alamat, no_hp, email, jenis_kelamin, username, password,level) values
			(
				'$id_cab',
				'$_POST[nama]',
				'$_POST[alamat]',
				'$_POST[nohp]',
				'$_POST[email]',
				'$_POST[jk]',
				'$_POST[username]',
				'$_POST[password]',
				'2'
			)";
            $simpan = mysqli_query($db,$sql);
            if ($simpan){
                echo "<script>
				alert ('Data Berhasil Tersimpan');
				location.href='../pages/tables/tbPegawai.php?id_cab=$id_cab';
				</script>";
            }
?>