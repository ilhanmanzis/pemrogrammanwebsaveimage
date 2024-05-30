<?php
require_once "koneksi.php";

$query = mysqli_query($koneksi, "SELECT * FROM mahasiswa ORDER BY nim ASC");


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>data mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <table class="table w-75 table-striped table-hover table-bordered m-auto align-middle text-center">
        <thead class="fw-bold">
            <td>No</td>
            <td>Nim</td>
            <td>Nama</td>
            <td>Jenis kelamin</td>
            <td>Prodi</td>
            <td>Foto</td>
            <td>Action</td>
        </thead>
        
        <?php
        $i=1; 
        while ($data = mysqli_fetch_assoc($query)){ ?>
            <tr>
                <td><?=$i++?></td>
                <td><?=$data['nim']?></td>
                <td><?=$data['nama']?></td>
                <td><?=$data['jkl']?></td>
                <td><?=$data['prodi']?></td>
                <td><img src="src/img/<?=$data['foto'];?>" alt="" width="100px"></td>
                <td>
                    <a href="mahasiswa_detail.php?nim=<?=$data['nim']?>" target="blank" class="btn-sm btn-primary text-decoration-none">Detail</a>
                    <a href="mahasiswa_edit.php?nim=<?=$data['nim']?>" class="btn-sm btn-warning text-decoration-none">Edit</a>
                    <a href="mahasiswa_hapus.php?nim=<?=$data['nim']?>" class="btn-sm btn-danger text-decoration-none">Hapus</a>
                </td>
            </tr>
        <?php }; ?>
    </table>
    <div class="container d-flex justify-content-center mt-3">

        <a href="input_mahasiswa.php" type="button" class="btn btn-primary">Tambah Data Mahasiswa</a>
    </div>
</body>
</html>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>