<?php

require_once "koneksi.php";

$nim = $_POST['nim'];
$name = $_POST['nama'];
$jkl = $_POST['jkl'];
$prodi = $_POST['prodi'];

if($nim =='' || $name =='' || $jkl =='' || $prodi ==''){
    echo "<script>
    alert('Gagal update, pastikan semua kolom pada from telah terisi');
    window.location.href = 'tampil_mahasiswa.php';</script>";
}else{
    if($_FILES['foto']['error'] === UPLOAD_ERR_NO_FILE){
        $query = "UPDATE mahasiswa SET nama='$name', jkl='$jkl', prodi='$prodi' WHERE nim='$nim'";
        $result = mysqli_query($koneksi, $query);
        if($result){
            echo "<script>
            alert('Data mahasiswa berhasil diupdate.');
            window.location.href = 'tampil_mahasiswa.php';</script>";
        } else {
            echo "<script>
            alert('Gagal mengupdate data mahasiswa.');
            window.location.href = 'tampil_mahasiswa.php';</script>";
        }
    }else{
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
                $newImageName = $rand."." .$imageExtension;
                move_uploaded_file($tmpName, 'src/img/'. $newImageName);
                $oldImageQuery = "SELECT foto FROM mahasiswa WHERE nim='$nim'";
                $oldImageResult = mysqli_query($koneksi, $oldImageQuery);
                $oldImageFile = '';
                if($oldImageResult){
                    $data = mysqli_fetch_assoc($oldImageResult);
                    $oldImageFile = $data['foto'];
                }
                $query = "UPDATE mahasiswa SET nama='$name', jkl='$jkl', prodi='$prodi', foto='$newImageName' WHERE nim='$nim'";
                $result = mysqli_query($koneksi, $query);
                if($result){
                    if($oldImageFile && file_exists('src/img/' . $oldImageFile)){
                        unlink('src/img/' . $oldImageFile);
                    }
                    echo "<script>
                    alert('Data mahasiswa berhasil diupdate.');
                    window.location.href = 'tampil_mahasiswa.php';</script>";
                } else {
                    echo "<script>
                    alert('Gagal mengupdate data mahasiswa.');
                    window.location.href = 'tampil_mahasiswa.php';</script>";
                }
            }else{
                echo "<script>alert('size terlalu besar');
                    window.location.href = 'input_mahasiswa.php';</script>";
            }
        }
       
    }
   
}
?>