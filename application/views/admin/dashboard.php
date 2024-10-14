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

    <title>E Voting | Admin Dashboard</title>
</head>
<body>

    <div class="container mt-5">
        <h2 class="mb-4">Admin Dashboard</h2>
        <p class="card-text">Halo Admin, <?php echo $this->session->userdata('username_adm'); ?>!</p>
        <br><a href="<?php echo base_url('auth/logoutadm'); ?>" class="btn btn-danger mb-3">Logout</a>
        <ul class="list-group">
            <li class="list-group-item"><a href="<?php echo base_url('admin/EventVote'); ?>">Kelola Event Vote</a></li>
            <li class="list-group-item"><a href="<?php echo base_url('admin/pembelian'); ?>">Kelola Pembelian</a></li>
            <li class="list-group-item"><a href="<?php echo base_url('admin/admin_user'); ?>">Kelola Pengguna</a></li>
            <li class="list-group-item"><a href="<?php echo base_url('admin/admin_voters'); ?>">Kelola Voters</a></li>
            <li class="list-group-item"><a href="<?php echo base_url('admin/hasil_voting'); ?>">Lihat Hasil Voting</a></li>
        </ul>
        <br><footer class="main-footer">
    <div class="float-right d-none d-sm-inline">
    </div>
    <br><strong>Copyright Bhayangkara University Surabaya | <a href="https://instagram.com/bianhp_" style="text-decoration: none;">M. Febryanysah H. P.</a> | <a href="https://instagram.com/jeabede" style="text-decoration: none;">Jaihan Abidin</a> | <a href="https://instagram.com/allfiann_" style="text-decoration: none;">Alfian Bahrul Alam</a> </strong>  All rights reserved.
</footer>
    </div>
</body>
</html>