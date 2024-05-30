<?php
require_once "koneksi.php";
$nim = $_REQUEST['nim'];
$dataMahasiswa = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim='$nim'");
$data = mysqli_fetch_assoc($dataMahasiswa);
if(mysqli_num_rows($dataMahasiswa) == 0){
    echo "<script>
    alert('Data mahasiswa tidak ditemukan');
    window.location.href = 'tampil_mahasiswa.php';</script>";
}else{
    $query = "DELETE FROM mahasiswa WHERE nim='$nim'";
    $deleteResult = mysqli_query($koneksi, $query);
    if($deleteResult){
        if($data['foto'] && file_exists('src/img/' . $data['foto'])){
            unlink('src/img/' . $data['foto']);
        }
        echo "<script>
                alert('Data mahasiswa berhasil dihapus');
                window.location.href = 'tampil_mahasiswa.php';</script>";
    }else{
        echo "<script>
                alert('Data mahasiswa gagal dihapus');
                window.location.href = 'tampil_mahasiswa.php';</script>";
    }
}

?>