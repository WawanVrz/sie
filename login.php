<?php
include "koneksi.php";
								$username = $_POST['username'];
								$password = $_POST['password'];
								//echo $substr;
								
								$string = "SELECT level, id_user FROM tbuser WHERE username='$username' and password='$password'";
									
									//echo $string;
									//$cek	= mysql_query($string);
									//$num	= mysql_num_rows($cek);
									$result = mysqli_query($db,$string);
 									//fetching result
									 $check = mysqli_fetch_array($result);
									
									if(isset($check)){
										//$data = mysql_fetch_array($cek);
										if	($check[0] == 1){
											echo "<script>
												alert ('Selamat Datang..');
												location.href = 'home.php';
												</script>";	
										}else if($check[0] == 2){
											echo "<script>
												alert ('Selamat Datang..');
												location.href = 'homepetugas.php?id_user=$check[1]';
												</script>";
										}
										/*if($level == "superadmin"){
											$status = $data['id_user'];
										} elseif($level == "admin") {
											$status1 = $data['id_user'];
										} elseif($level == "kadis") {
											$status1 = $data['id_user'];
										}*/		
										//$_SESSION['Id_SuperAdmin'] = $status;
										//$_SESSION['Id_Admin'] = $status1;
										//$_SESSION['Id_KepalaDinas'] = $status2;
										//echo $_SESSION['Id_Admin'];
										
										//if($level == "superadmin"){
											//echo "Mau";
											/*echo "<script>
												alert ('Selamat Datang..');
												location.href = 'pages/index-admin.php';
												</script>";*/
										//		header ("Location: index-sp.php ");
											
										//} elseif($level == "admin") {
											/*echo "<script>
												alert ('Selamat Datang..');
												location.href ='eksekutif/index-eksekutif.php';
												</script>";*/
										//	header ("Location: index-admin.php");
										//} elseif($level == "kadis") {
											/*echo "<script>
												alert ('Selamat Datang..');
												location.href ='eksekutif/index-eksekutif.php';
												</script>";*/
										//	header ("Location: index-kepala.php"); 
										//} else {
											
										/*	echo "<script>
											alert ('Gagal Login, Silahkan Coba Lagi...');
											location.href='index.php';
											</script>";*/
										//}
									
									} else {
											
											echo "<script>
											alert ('Gagal Login, Silahkan Coba Lagi...').mysqli_error();
											location.href='index.php';
											</script>";
											
									}
?>