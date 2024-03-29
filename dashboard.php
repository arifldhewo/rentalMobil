<?php include_once 'HPheader.php'; ?>

<?php

    if (isset($_SESSION['fullnames'])) :

?>

<?php include_once 'navbar.php'; ?>

    <div class="container">
        <div class="">
            <div id="carouselMainImg" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img style="max-width: 1280px; max-height: 600px;" src="https://via.placeholder.com/1200x400" class="d-block w-100" alt="...">
                    </div>
                    <div  class="carousel-item">
                        <img style="max-width: 1280px; max-height: 600px;" src="https://via.placeholder.com/1200x500" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img style="max-width: 1280px; max-height: 600px;" src="https://via.placeholder.com/1200x600" class="d-block w-100" alt="...">
                    </div>
                </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselMainImg" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselMainImg" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
            </div>
        </div>
        <hr>
    </div>
        
        <?php

        require 'inc/dashboard.inc.php';

        ?>
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-3 row-cols-xxl-4">
            <?php foreach($fetch_tb_lapak_assoc as $tb_lapak): ?>
                <div class="">
                    <div class="col">
                        <div class="card mx-md-3 mx-lg-auto mb-3" style="width: 18.5rem;">
                            <img style="max-width: 300px; max-height: 150px;" src="img/uploadsInsert/<?=$tb_lapak['img_url'];?>" class="card-img-top img-thumbnail" alt="...">
                                <div class="card-body shadow-lg bg-body rounded p-4">
                                    <h3 class="card-title"> <?= htmlspecialchars($tb_lapak['merk']); ?> </h3>
                                    <h5 class="card-title"> <?= htmlspecialchars($tb_lapak['sub_merk']); ?> </h5>
                                    <p class="card-text" style="text-align: center;"> Harga Sewa Perhari</p>
                                    <p class="card-text" style="text-align: center;">Rp<?=htmlspecialchars($tb_lapak['harga']);?></p>
                                    <div class="d-grid gap-1">
                                        <a class="btn btn-primary" href="CRUD/detail.php?id=<?=$tb_lapak['id'];?>" > Detail</a>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

<?php include_once 'HPfooter.php'; ?>

<?php else :
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit();
?>
<?php endif; ?>