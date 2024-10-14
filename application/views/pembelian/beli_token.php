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

    <title>E Voting | Beli Token</title>
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title mb-4">Beli Token</h2>
                    <?php if(validation_errors() == TRUE): ?>
                        <div class="alert alert-danger" role="alert"><?php echo validation_errors(); ?></div>
                    <?php endif; ?>
                    <?php if(isset($error)): ?>
                        <div class="alert alert-danger" role="alert"> <?php echo $error; ?> </div>
                    <?php endif; ?>
                    <?php if(isset($success)): ?>
                        <div class="alert alert-success" role="alert"> <?php echo $success; ?> </div>
                    <?php endif; ?>
                    <form action="<?php echo base_url('pembelian/beli_token'); ?>" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nominal_uang" class="form-label">Nominal Uang (Rp):</label>
                            <input type="number" class="form-control" name="nominal_uang" id="nominal_uang" value="<?php echo set_value('nominal_uang'); ?>">
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_token" class="form-label">Jumlah Token:</label>
                            <input type="number" class="form-control" name="jumlah_token1" id="jumlah_token1" value="<?php echo set_value('jumlah_token1'); ?>" disabled>
                            <input type="number" class="form-control" name="jumlah_token" id="jumlah_token" value="<?php echo set_value('jumlah_token'); ?>" hidden>
                        </div>
                        <div class="mb-3">
                            <label for="no_inv" class="form-label">Nomor Invoice:</label>
                            <input type="text" class="form-control" name="no_inv" id="no_inv" value="<?php echo set_value('no_inv'); ?>">
                        </div>
                        <div class="mb-3">
                            <label for="bukti_bayar" class="form-label">Upload Bukti Pembayaran:</label>
                            <input type="file" name="bukti_pembayaran" class="form-control">
                        </div>
                        <div>
                            <a href="<?php echo base_url('dashboard'); ?>" class="btn btn-danger">Kembali</a>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </form>
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

<script>
    $(document).ready(function() {
        $('#nominal_uang').on('input', function() {
            var nominalUang = parseInt($(this).val(), 10);
            
            if (nominalUang < 1000) {
                $('#jumlah_token1').val(0);
                $('#jumlah_token').val(0);
            } else {
                var jumlahToken = Math.floor((nominalUang - 1000) / 1000) + 1;
                if (nominalUang % 1000 >= 500) {
                    jumlahToken += 1;
                }
                
                $('#jumlah_token1').val(jumlahToken);
                $('#jumlah_token').val(jumlahToken);
            }
        });
    });
</script>



</body>
</html>