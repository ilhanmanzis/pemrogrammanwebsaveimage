<?php

require "koneksi.php";

$nim = $_POST['nim'];
$nama = $_POST['nama'];
$jkl = $_POST['jkl'];
$prodi = $_POST['prodi'];
// $foto = $_POST['foto'];
if($_FILES['foto']['error']===4){
    echo "<script>
    alert('image tidak ada');
    window.location.href = 'input_mahasiswa.php';</script>";
}else{
    // cara pertama
    $fileName=$_FILES['foto']['name'];
    $fileSize=$_FILES['foto']['size'];
    $tmpName=$_FILES['foto']['tmp_name'];
    $rand=rand();
    $extension = ['jpg','jpeg','png','gif'];
    $imageExtension = pathinfo($fileName, PATHINFO_EXTENSION);

    if(!in_array($imageExtension,$extension)){
        echo "<script>alert('extension file tidak valid');
                window.location.href = 'input_mahasiswa.php';</script>";
    }else{
        if($fileSize < 5000000){
        $newImageName = $rand.".".$imageExtension;
        move_uploaded_file($tmpName, 'src/img/'. $newImageName);
        $query = "INSERT INTO mahasiswa (nim, nama, jkl, prodi, foto) VALUES ('$nim', '$nama', '$jkl', '$prodi', '$newImageName')";
        mysqli_query($koneksi, $query);
        echo "<script>
                alert('Data mahasiswa sudah masuk kedalam database.');
                window.location.href = 'tampil_mahasiswa.php';</script>";
        }else{
            echo "<script>alert('size terlalu besar');
                window.location.href = 'input_mahasiswa.php';</script>";
        }


    }


    // cara lain

    // $fileName=$_FILES['foto']['name'];
    // $fileSize=$_FILES['foto']['size'];
    // $tmpName=$_FILES['foto']['tmp_name'];

    // // validasi extensions gambar
    // $validImageExtension = ['jpg','jpeg','png','gif'];
    // $imageExtension = explode('.', $fileName);
    // $imageExtension = strtolower(end($imageExtension));

    // if(!in_array($imageExtension, $validImageExtension)){
    //     echo "<script>alert('extension file tidak valid');</script>";
    // }else if ($fileSize>1000000){
    //     echo "<script>alert('size terlalu besar');</script>";
    // }else{
    //     $newImageName = uniqid();
    //     $newImageName .= '.' . $imageExtension;
    //     move_uploaded_file($tmpName, 'src/img/'. $newImageName);
    //     $query = "INSERT INTO mahasiswa (nim, nama, jkl, prodi, foto) VALUES ('$nim', '$nama', '$jkl', '$prodi', '$newImageName')";
    //     mysqli_query($koneksi, $query);
    //     echo "<script>
    //          alert('Data mahasiswa sudah masuk kedalam database.');
    //          window.location.href = 'tampil_mahasiswa.php';</script>";
        
    // }
}






?>


