<?php

include("Config.php");

//cek apakah tombol simpan sudah diklik atau blum?
iff(isset($_POST['simpan'])){
	
	//ambil data dari formulir
	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$jk = $_POST['jenis_kelamin'];
	$agama = $_POST['agama'];
	$sekolah = $_POST['sekolah_asal'];

    // buat query update
    $sql = "UPDATE calon_siswa SET nama='$nama', alamat='$alamat', jenis_kelamin='$jk',
    agama='$agama', sekolah_asal='$sekolah' WHERE id=$id";
    $query = mysqli_query($koneksi, $sql);

    // apakah query update berhasil
    if(  $query ) {
        // kalau  berhasil alihkan ke halaman list-siswa.php
        header('Location:  list_calon_siswa.php');
    } else {
        // kalauu gagal tampilkan pesan
        die("Gagal Menyimpan Perubahan...");
    }
} else {
    die("Akses dilarang...");
}
?>