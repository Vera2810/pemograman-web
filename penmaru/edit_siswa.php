<?php

include("Config.php");

//kalau tidak ada id di query string
if( !isset($_GET['id']) ){
	header('Location: List_Calon Siswa.php');
}

//ambil id dari query string
$id = $_GET['id'];

//buat query untuk ambil data dari database
$sql = "SELECT * FROM calon_siswa WHERE id=$id";
$query = mysqli_query($koneksi, $sql);
$siswa = mysqli_fetch_assoc($query);

//jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
	die("data tidak ditemukan...");
}

?>

<!DOCTYPE  html>
<html>
<head>
    <title>Formulir Edit Siswa</title>
</head>

<body>
    <header>
        <h3>Formulir Edit Data Calon Siswa Baru</h3>
    </header>

    <form action="proses-edit.php" method="POST">
        <fieldshet>
            <input type="hidden" name="id" value="<?php echo $siswa['id'] ?>" />
        <p>
            <label for="nama">Nama: </label>
            <input type="text" name="nama" placeholder="nama lengkap"
            value="<?php echo $siswa['nama'] ?>" />
        </p>
        <p>
            <label for="alamat">Alamat: </label>
            <textarea name="alamat"><?php echo $siswa['alamat'] ?></textarea>
        </p>
        <p>
            <label for="jenis_kelamin">jenis Kelamin: </label>
            <?php $jk = $siswa['jenis_kelamin']; ?>
            <label><input type="radio" name="jenis_kelamin"
            value="laki-laki" <?php echo ($jk == 'laki-laki') ? "checked": "" ?>>
            laki-laki</label>

            <label><input type="radio" name="jenis_kelamin" value="perempuan"
            <?php echo ($jk == "" 'perempuan') ? "checked": ""  ?>> perempuan</label>
        </p>
        <p>
            <label for="agama">Agama: </label>
            <?php $agama = $siswa['agama']; ?>
            <select name="agama">
                <option <?php echo ($agama == 'Islam') ? "selected": "" ?>>Islam</option>
                <option <?php echo ($agama == 'Kristen') ? "selected": "" ?>>Kristen</option>
                <option <?php echo ($agama == 'Hindu') ? "selected": "" ?>>Hindu</option>
                <option <?php echo ($agama == 'Budha') ? "selected": "" ?>>Budha</option>
                <option <?php echo ($agama == 'Konghucu') ? "selected": "" ?>>Konghucu</option>
            </select>
        </p>
        <p>
            <label for="sekolah_asal">Sekolah Asal: </label>
            <input type="text" name="sekolah_asal" placeholder="nama sekolah"
            value="<?php echo $siswa['sekolah_asal'] ?>" />
        </p>
        <p>
            <input type="submit" value="Simpan" name="simpan" />
        </p>
        </fieldset>
    </form>
    </body>
</html>                