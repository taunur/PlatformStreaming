<?php  
// MEMBUAT SESSION LOGIN
	session_start();

// JIKA SUDAH LOGIN MASUKKAN KEDALAM SHOWDATA
	if ( !isset($_SESSION["sign-in"]) ) {
	 	header('location: user_login.php');
	 	exit;
	}
?>

<?php
// MENGHUBUNGKAN KONEKSI DATABASE
	require "koneksi.php";

// AMBIL DATA DARI URL 
	$id_film = $_GET["id_film"];

	if ( hapus($id_film) > 0 ) {
		echo " 
			<script>
				alert ('data berhasil dihapus !');
				document.location.href = 'developer_list.php';
			</script>
		";
	} else {
		echo " 
			<script>
				alert ('data gagal dihapus !');
				document.location.href = 'developer_list.php';
			</script>
		";
	}
?>