<?php
require_once "koneksi.php";

if($_GET['nim']!=null){
    $nim = $_GET['nim'];
    if($koneksi->connect_error){
        echo "gagal koneksi : ".$koneksi->connect_error;
    }
    $query = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim=$nim");
}

if(mysqli_num_rows($query)<=0){
    echo "Data tidak ditemukan";
}else{
    while($data = mysqli_fetch_assoc($query) ){
        
   
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 align="center">FORM EDIT DATA MAHASISWA</h1>
    <form method="post" action="simpan_edit_mahasiswa.php"  enctype="multipart/form-data" autocomplete="off">
        <table width="35%" align="center">
            <tr>
                <td><label for="nama">Nama</label></td>
                <td>:</td>
                <td><input type="text" name="nama" id="nama" value="<?=$data['nama']?>"></td>
            </tr>
            <tr>
                <td><label for="nim">NIM</label></td>
                <td>:</td>
                <td><input type="text" name="nim" id="nim" value="<?=$data['nim']?>"></td>
            </tr>
            <tr>
                <td><label for="jkl" >jenis kelamin</label></td>
                <td>:</td>
                <td>
                    <input type="radio" name="jkl" id="Laki-Laki" value="Laki-Laki" 
                    <?php 
                        if($data['jkl'] == 'Laki-Laki') echo 'checked'; 
                    ?>
                    >
                    <label for="Laki-Laki">Laki-Laki</label>
                    <input type="radio" name="jkl" id="Perempuan" value="Perempuan"
                    <?php 
                        if($data['jkl'] == 'Perempuan') echo 'checked'; 
                    ?>>
                    <label for="Perempuan">Perempuan</label>
                </td>
            </tr>
            <tr>
                <td><label for="prodi">prodi</label></td>
                <td>:</td>
                <td><input type="text" name="prodi" id="prodi" value="<?=$data['prodi']?>"></td>
            </tr>
            <tr>
                <td><label for="foto">foto</label></td>
                <td>:</td>
                <td><input type="file" name="foto" id="foto" accept=".jpg, .jpeg, .png, .gif"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><img src="./src/img/<?=$data['foto']?>" alt="" width="80px"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><span class="red">ektensi yang diperbolehkan .png | .jpg | .jpeg | .gif</span></td>
            </tr>
            <tr><td colspan="3">
                <button type="submit">Simpan</button>
                <button type="reset">Reset</button>
            </td></tr>
        </table>
    </form>

<?php

}
}
?>
</body>
</html>