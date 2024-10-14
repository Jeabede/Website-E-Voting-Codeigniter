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

    <title>E Voting | Hasil Voting</title>
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Hasil Voting</h2>
    <table class="table table-responsive" id=table_hsl>
        <thead>
            <tr>
                <th scope="col">ID Kandidat</th>
                <th scope="col">Foto Kandidat</th>
                <th scope="col">Nama Kadidat</th>
                <th scope="col">Kategori</th>
                <th scope="col">Jumlah Suara</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($votes as $vote): ?>
                <tr>
                    <td><?php echo $vote['id_kandidat']; ?></td>
                    
                        <?php foreach($kandidat as $k): ?>
                            <?php if ($vote['id_kandidat'] == $k['id']): ?>
                                <td><img src="../foto_kandidat/<?php echo $k['foto_kandidat']?>" style="width: 50px;" alt=""></td>
                                <td><?php echo $k['nama'] ?></td>
                                <td><?php echo $k['nama_event'] ?></td>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <td><?php echo $vote['total_suara']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br><a href="<?php echo base_url('admin/dashboard'); ?>" class="btn btn-danger mb-3">Kembali</a>
    <script>
        $(document).ready(function() {
            $('#table_hsl').DataTable();
        });
    </script>
    <br><footer class="main-footer">
    <div class="float-right d-none d-sm-inline">
    </div>
    <br><strong>Copyright Bhayangkara University Surabaya | <a href="https://instagram.com/bianhp_" style="text-decoration: none;">M. Febryanysah H. P.</a> | <a href="https://instagram.com/jeabede" style="text-decoration: none;">Jaihan Abidin</a> | <a href="https://instagram.com/allfiann_" style="text-decoration: none;">Alfian Bahrul Alam</a> </strong>  All rights reserved.
</footer>
</div>
</body>
</html>