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

    <title>E Voting | Finish Vote</title>
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 mx-auto text-center">
            <h3>Terima Kasih Telah Melakukan Voting</h3>
            <a href="<?php echo base_url('voting/index'); ?>" class="btn btn-success">Voting Lagi</a>
            <a href="<?php echo base_url('dashboard'); ?>" class="btn btn-primary">Beranda</a>
        </div>
    </div>
</div>
</body>
</html>