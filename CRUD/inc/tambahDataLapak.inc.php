<?php

session_start();

$fullnameS = $_SESSION['fullnames'];
$id_tb_user = $_SESSION['ids'];

require '../../inc/conn.inc.php';

if(isset($_POST['submit'])){

    $merk = $_POST['merk'];
        if(!preg_match("/^[a-zA-Z\d]*$/", $merk)){
            header("Location: gagal.inc.php");
            exit();
        }else{
            $sub_merk = $_POST['sub_merk'];
                if(!preg_match("/^[-a-zA-Z\d\s]*$/", $sub_merk)){
                    header("Location:../gagalPrompt.php");
                    exit();
                }else{
                    $tipe_mobil = $_POST['tipe_mobil'];
                        if(!preg_match("/^[a-zA-Z]*$/", $tipe_mobil)){
                            header("Location:../gagalPrompt.php");
                            exit();
                        }else{
                            $no_polisi = $_POST['no_polisi'];
                                if(!preg_match("/^[a-zA-Z\d\s]*$/", $no_polisi)){
                                    header("Location:../gagalPrompt.php");
                                    exit();
                                }else{
                                    $warna = $_POST['warna'];
                                        if(!preg_match("/^[a-zA-Z\s]*$/", $warna)){
                                            header("Location:../gagalPrompt.php");
                                            exit();
                                        }else{
                                            $harga = $_POST['harga'];
                                                if(!preg_match("/^[\d]*$/", $harga)){
                                                    header("Location:../gagalPrompt.php");
                                                    exit();
                                                }else{
                                                    $deskripsi = $_POST['deskripsi'];
                                                    $insertData = mysqli_query($conn, 
                                                    "INSERT INTO tb_lapak (id_tb_user, merk, sub_merk, tipe_mobil, no_polisi, warna, harga, submit_with, deskripsi) 
                                                    VALUES ('$id_tb_user' ,'$merk','$sub_merk','$tipe_mobil','$no_polisi','$warna','$harga','$fullnameS','$deskripsi');
                                                    ");
                                                    header("Location: ../suksesPrompt.php");
                                                    exit();
                                                }
                                        }
                                }
                        }
                }
        }
}