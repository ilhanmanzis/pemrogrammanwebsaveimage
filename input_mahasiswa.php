<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>isi formulir</title>
    <style>
        .red{
            color: red;
        }
    </style>

</head>
<body>
    <h1 align="center">FORM INPUT DATA MAHASISWA</h1>
    <form method="post" action="simpan_mahasiswa.php"  enctype="multipart/form-data" autocomplete="off">
        <table width="35%" align="center">
            <tr>
                <td><label for="nama">Nama</label></td>
                <td>:</td>
                <td><input type="text" name="nama" id="nama"></td>
            </tr>
            <tr>
                <td><label for="nim">NIM</label></td>
                <td>:</td>
                <td><input type="text" name="nim" id="nim"></td>
            </tr>
            <tr>
                <td><label for="jkl">jenis kelamin</label></td>
                <td>:</td>
                <td>
                    <input type="radio" name="jkl" id="Laki-Laki" value="Laki-Laki">
                    <label for="Laki-Laki">Laki-Laki</label>
                    <input type="radio" name="jkl" id="Perempuan" value="Perempuan">
                    <label for="Perempuan">Perempuan</label>
                </td>
            </tr>
            <tr>
                <td><label for="prodi">prodi</label></td>
                <td>:</td>
                <td><input type="text" name="prodi" id="prodi"></td>
            </tr>
            <tr>
                <td><label for="foto">foto</label></td>
                <td>:</td>
                <td><input type="file" name="foto" id="foto" accept=".jpg, .jpeg, .png, .svg"></td>
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
</body>
</html>

