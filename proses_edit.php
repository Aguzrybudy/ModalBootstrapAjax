<?php
	include "koneksi.php";
	$modal_id=$_POST['modal_id'];
	$modal_name = $_POST['modal_name'];
	$description = $_POST['description'];
	$query=mysqli_query($koneksi,"UPDATE modal SET modal_name = '$modal_name',description = '$description' WHERE modal_id = '$modal_id'");
	
	if($query) // jika insert data berhasil
	{
		// fungsi untuk membuat format json
		header('Content-Type: application/json');
		// untuk load data yang sudah ada dari tabel
		$content = file_get_contents('http://localhost/php7/modalajax/ajax_data.php', true);
		$data = array('status'=>'success', 'data'=> $content);
		echo json_encode($data);
	}
	else // jika insert data gagal
	{
		$data = array('status'=>'failed', 'data'=> null);
		echo json_encode($data);
	}
?>