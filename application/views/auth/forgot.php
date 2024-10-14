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

    <title>E Voting | Email Reset</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Email</h2>
                        <?php if(validation_errors() == TRUE): ?>
                            <div class="alert alert-danger" role="alert"><?php echo validation_errors(); ?></div>
                        <?php endif; ?>
                        <?php if(isset($error)): ?>
                            <div class="alert alert-danger" role="alert"> <?php echo $error; ?> </div>
                        <?php endif; ?>
                        <?php echo form_open('auth/confirmuser'); ?>
                            <div class="mb-3">
                                <label for="email" class="form-label">Masukkan Email anda :</label>
                                <input type="text" name="email" class="form-control" value="<?php echo set_value('email'); ?>">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary btn-block">Konfirmasi</button>
                            </div>

                        <?php echo form_close(); ?>
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