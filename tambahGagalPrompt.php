<?php include_once 'HPheader.php'; ?>

<?php

if ($_SESSION['fullnames'] == true) :

?>

    <?php include_once 'navbar.php'; ?>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5> Profile Tidak Dapat Diperbarui! </h5>
            </div>
            <div class="card-body">
                <h5 class="card-title">Alasan: Tidak sesuai syarat</h5>
                <p class="card-text">File yang anda upload lebih dari 4MB atau file yang anda upload bukan gambar.
                </p>
                <a href="profile.php" class="btn btn-primary"> Kembali ke profile anda</a>
            </div>
        </div>
    </div>

    <?php include_once 'HPfooter.php'; ?>

<?php

else :
    session_unset();
    session_destroy();
    header("Location:dashboard.php");
    exit();


?>
<?php endif; ?>