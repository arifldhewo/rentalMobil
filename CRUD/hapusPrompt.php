<?php include_once '../HPheader.php'; ?>

<?php

if ($_SESSION['fullnames'] == true) :

?>
    <?php include_once 'navbar.php'; ?>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5> Hapus Post! </h5>
            </div>
            <div class="card-body">
                <h5 class="card-title">Apakah anda yakin untuk menghapus post ini?</h5>
                <p class="card-text">Post yang sudah di hapus tidak dapat dikembalikan.</p>
                <a href="inc/hapusSistem.inc.php?id=<?=$id=$_GET['id'];?>" class="btn btn-danger">Hapus Post</a>
                <a href="detail.php?id=<?=$id=$_GET['id'];?>" class="btn btn-primary"> Kembali </a>
            </div>
        </div>
    </div>

    <?php include_once '../HPfooter.php'; ?>

<?php

else :
    session_unset();
    session_destroy();
    header("Location: ../index.php");
    exit();


?>
<?php endif; ?>