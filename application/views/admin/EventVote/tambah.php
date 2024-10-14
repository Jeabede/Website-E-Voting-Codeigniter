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

    <title>E Voting | Tambah Event Vote</title>
</head>
<body>
<div class="container mt-5">
    <h2>Tambah Event Vote</h2>
    <?php if(validation_errors() == TRUE): ?>
        <div class="alert alert-danger" role="alert"><?php echo validation_errors(); ?></div>
    <?php endif; ?>
    <?php if(isset($error)): ?>
        <div class="alert alert-danger" role="alert"> <?php echo $error; ?> </div>
    <?php endif; ?>
    <?php echo form_open('admin/tambahEventVote'); ?>
        <div class="mb-3">
            <label for="nama_EventVote" class="form-label">Nama Event Vote:</label>
            <input type="text" class="form-control" name="nama_EventVote" value="<?php echo set_value('nama_EventVote'); ?>">
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi:</label>
            <input type="text" class="form-control" name="deskripsi" value="<?php echo set_value('deskripsi'); ?>">
        </div>

        <!-- Anda bisa tambahkan form untuk upload foto kandidat di sini -->
        <button type="submit" class="btn btn-primary">Tambah</button>
        <a href="<?php echo base_url('admin/EventVote'); ?>" class="btn btn-danger">Kembali</a>
    <?php echo form_close(); ?>
    <br><footer class="main-footer">
    <div class="float-right d-none d-sm-inline">
    </div>
    <br><strong>Copyright Bhayangkara University Surabaya | <a href="https://instagram.com/bianhp_" style="text-decoration: none;">M. Febryanysah H. P.</a> | <a href="https://instagram.com/jeabede" style="text-decoration: none;">Jaihan Abidin</a> | <a href="https://instagram.com/allfiann_" style="text-decoration: none;">Alfian Bahrul Alam</a> </strong>  All rights reserved.
</footer>
</div>
</body>
</html>