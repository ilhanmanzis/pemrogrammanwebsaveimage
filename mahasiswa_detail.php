<?php

require_once "koneksi.php";


if(isset($_GET['nim'])){
    $nim=$_GET['nim'];
    $query = "SELECT * FROM mahasiswa WHERE nim=$nim";
    $result = mysqli_query($koneksi, $query);
    if(mysqli_num_rows($result)>0){
        $data = mysqli_fetch_assoc($result);
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        </head>
        <body>
            <div class="d-flex justify-content-center">

                <div class="card " style="width: 18rem;">
                    <img src="src/img/<?=$data['foto'];?>" class="w-100scard-img-top" alt="...">
                    <div class="card-body">
                        <table>
                            <tr>
                                <td>Nama</td>
                                <td> :</td>
                                <td><?=$data['nama']?></td>
                            </tr>
                            <tr>
                                <td>Nim</td>
                                <td> :</td>
                                <td><?=$data['nim']?></td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td> :</td>
                                <td><?=$data['jkl']?></td>
                            </tr>
                            <tr>
                                <td>Prodi</td>
                                <td> :</td>
                                <td><?=$data['prodi']?></td>
                            </tr>
                        </table>
                        
                    </div>
                </div>
            </div>
        </body>
        </html>
        
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

        <?php
    }
}else{
    echo "<script>
    alert('Data mahasiswa tidak ditemukan');
    window.location.href = 'tampil_mahasiswa.php';</script>";
        
}



?>

