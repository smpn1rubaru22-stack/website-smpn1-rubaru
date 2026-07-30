<?php
include "../config/koneksi.php";

$nama = mysqli_real_escape_string($conn,$_POST['nama']);
$jabatan = mysqli_real_escape_string($conn,$_POST['jabatan']);
$sambutan = mysqli_real_escape_string($conn,$_POST['sambutan']);

$foto = "";

if(!empty($_FILES['foto']['name'])){

    $foto = time()."_".$_FILES['foto']['name'];

    move_uploaded_file(
        $_FILES['foto']['tmp_name'],
        "../upload/kepsek/".$foto
    );
}

$cek = mysqli_query($conn,"SELECT * FROM kepala_sekolah LIMIT 1");

if(mysqli_num_rows($cek)==0){

    $sql = "INSERT INTO kepala_sekolah
            (nama,jabatan,foto,sambutan)
            VALUES
            ('$nama','$jabatan','$foto','$sambutan')";

}else{

    $data = mysqli_fetch_assoc($cek);

    if($foto==""){
        $foto = $data['foto'];
    }

    $sql = "UPDATE kepala_sekolah SET
            nama='$nama',
            jabatan='$jabatan',
            foto='$foto',
            sambutan='$sambutan'
            WHERE id='".$data['id']."'";
}

if(mysqli_query($conn,$sql)){

    header("Location: profil_kepsek.php?status=sukses");
    exit;

}else{

    header("Location: profil_kepsek.php?status=gagal");
    exit;

}
?>