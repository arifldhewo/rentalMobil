<?php include_once '../HPheader.php'; ?>

<?php

if ($_SESSION['fullnames'] == true) :

?>

<?php include_once 'navbar.php'; ?>

<?php require '../inc/dashboard.inc.php' ?>

        <?php 
            $id = $_GET['id'];
            $detail_query = mysqli_query($conn, "SELECT * FROM tb_lapak WHERE id='$id';");
            $detail_fetch_assoc = mysqli_fetch_all($detail_query, MYSQLI_ASSOC);
            
        ?>
    <?php foreach($detail_fetch_assoc as $detail_tb_lapak): ?>
        <?php  
        
        $alamat = $detail_tb_lapak['alamat_tb_user'];
        $seperate = explode(" " ,$alamat);
            
                
                
        ?>
        <div class="container">
            <div class="">
                <div id="carouselMainImg" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img style="max-width: 1280px; max-height: 600px;" src="../img/uploadsInsert/<?=$detail_tb_lapak['img_url']?>"class="d-block w-100" alt="...">
                        </div>
                        <div  class="carousel-item">
                            <img style="max-width: 1280px; max-height: 600px;" src="../img/uploadsInsert/<?=$detail_tb_lapak['img_url_1']?>" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img style="max-width: 1280px; max-height: 600px;" src="../img/uploadsInsert/<?=$detail_tb_lapak['img_url_2']?>" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img style="max-width: 1280px; max-height: 600px;" src="../img/uploadsInsert/<?=$detail_tb_lapak['img_url_3']?>" class="d-block w-100" alt="...">
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

        <div class="container-xxl mb-5">
            <div class="float-none">
                <div class="card">
                    <div class="card-body">
                        <h3 class="ms-3 card-title"> <?= htmlspecialchars($detail_tb_lapak['merk']); ?> </h3>
                        <h5 class="ms-3 card-title"> <?= htmlspecialchars($detail_tb_lapak['sub_merk']); ?> </h5>

                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Deskripsi Barang
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <?= htmlspecialchars($detail_tb_lapak['deskripsi']); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="list-group list-group-flush">
                        <form action="inc/edit.inc.php" method="POST"></form>
                        <li class="ms-3 list-group-item">Tipe Mobil : <?=htmlspecialchars($detail_tb_lapak['tipe_mobil']);?></li>
                        <li class="ms-3 list-group-item">No Polisi : <?=htmlspecialchars($detail_tb_lapak['no_polisi']);?></li>
                        <li class="ms-3 list-group-item">Warna Mobil : <?=htmlspecialchars($detail_tb_lapak['warna']);?></li>
                        <li class="ms-3 list-group-item">Harga Sewa Mobil Perhari : Rp<?=htmlspecialchars($detail_tb_lapak['harga']);?></li>
                        <li class="ms-3 list-group-item">Pemilik : <?=htmlspecialchars($detail_tb_lapak['fullname_tb_user']);?></li>
                        <li class="ms-3 list-group-item">No Telephone : 0<?=htmlspecialchars($detail_tb_lapak['no_telp_tb_user']);?></li>
                        <li class="ms-3 list-group-item">Alamat : <a title="Cari alamat ke google maps" target="_blank" href="https://www.google.com/maps/search/?api=1&query=<?php for($i=0; $i < count($seperate); $i++){ echo $seperate[$i]."+";}?>"><?=$detail_tb_lapak['alamat_tb_user'];?></a></li>
                        <li class="ms-3 list-group-item">Tanggal Postingan : <?=htmlspecialchars($detail_tb_lapak['created_at']);?></li>
                    </ul>
                    <div class="card-body text-center">
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4">
                            <div class="col">
                                <div class="d-grid gap-1">
                                    <a class="btn btn-primary" href="../dashboard.php" class="card-link">Kembali</a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-grid gap-1 mt-3 mt-sm-0 mt-md-0">
                                    <a class="btn btn-success" target="_blank" href="https://wa.me/62<?=htmlspecialchars($detail_tb_lapak['no_telp_tb_user']);?>">Chat via Whatsapp</a>
                                </div>
                            </div>
                            <?php if($_SESSION['ids'] == $detail_tb_lapak['id_tb_user']): ?>
                            <div class="col">
                                <div class="d-grid gap-1 mt-3 mt-sm-3 mt-lg-0 mt-xl-0">
                                    <a class="btn btn-warning" href="edit.php?id=<?=$_GET['id'];?>" >Edit Post</a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-grid gap-1 mt-3 mt-sm-9 mt-lg-0">
                                    <a class="btn btn-danger" href="hapusPrompt.php?id=<?=$id=$_GET['id'];?>" >Hapus Post</a>
                                </div>
                            </div>
                        </div>
                                <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

<?php include_once '../HPfooter.php'; ?>

<?php

else :
    session_unset();
    session_destroy();
    header("Location: landingpage.php");
    exit();


?>
<?php endif; ?>