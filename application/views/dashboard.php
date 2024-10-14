<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo base_url('uploads/icon/evt.png'); ?>" rel="icon" type="image/x-icon">
    <link href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.min.css" rel="stylesheet">
    <link href="<?php echo base_url('bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="<?php echo base_url('bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.min.js"></script>

    <title>E Voting | Dashboard</title>
</head>
<body>
<!-- Flexbox container for aligning the toasts -->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card text-center">
                <div class="card-body">
                    <h2 class="card-title mb-4">Selamat Datang di Dashboard</h2>
                    <?php if ($this->session->userdata('user_id')) { ?>
                        <?php
                            if (!empty($pembelian)) {
                                ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Catatan:</strong> Jika Token anda sudah terisi tetapi tidak bisa melakukan voting harap <a href="<?php echo base_url('auth/logout'); ?>" class="btn btn-danger btn-sm">Logout</a> lalu login kembali.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                <?php
                            }
                        ?>
                        <p class="card-text">Halo, <?php echo $this->session->userdata('nama'); ?>!</p>
                        <a href="<?php echo base_url('auth/logout'); ?>" class="btn btn-danger mb-3">Logout</a>
                        <div class="mb-4">
                            <h3 class="mb-3">Jumlah Token Anda: <?php echo $jumlah_token; ?></h3>
                            <a href="<?php echo base_url('pembelian/beli_token'); ?>" class="btn btn-primary">Beli Token</a>
                        </div>
                    <?php } else { ?>
                        <a href="<?php echo base_url('auth/login'); ?>" class="btn btn-primary mb-3">Login</a>
                    <?php } ?>
                    <div class="mb-4">
                        <h3 class="mb-3">Vote Sekarang Juga</h3>
                        <a href="<?php echo base_url('voting/index')?>" class="btn btn-success">Vote</a>
                    </div>
                    <!-- <div>
                        <h3>Riwayat Vote</h3>
                        <ul class="list-group">
                            <?php foreach ($riwayat_vote as $vote) : ?>
                                <li class="list-group-item"><?php echo $vote['id_kandidat']; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <br><footer class="main-footer">
    <div class="float-right d-none d-sm-inline">
    </div>
    <br><strong>Copyright Bhayangkara University Surabaya | <a href="https://instagram.com/bianhp_" style="text-decoration: none;">M. Febryanysah H. P.</a> | <a href="https://instagram.com/jeabede" style="text-decoration: none;">Jaihan Abidin</a> | <a href="https://instagram.com/allfiann_" style="text-decoration: none;">Alfian Bahrul Alam</a> </strong>  All rights reserved.
</footer>
</div>


</body>
</html>