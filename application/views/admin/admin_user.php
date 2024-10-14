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

    <title>E Voting | User Admin</title>
</head>
<body>

<div class="container mt-5">
    <h2>Kelola Pengguna Admin</h2>
    <a href="<?php echo base_url('admin_user/tambah'); ?>" class="btn btn-success mb-3">Tambah Pengguna Admin</a>
    <table id="admin_user_table" class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Username</th>
                <th scope="col">Password</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($admin_users as $admin_user): ?>
                <tr>
                    <td><?php echo $admin_user['id_admin']; ?></td>
                    <td><?php echo $admin_user['username_adm']; ?></td>
                    <td><?php echo $admin_user['password']; ?></td>
                    <td>
                        <a href="<?php echo base_url('admin_user/hapus/'.$admin_user['id_admin']); ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br><a href="<?php echo base_url('admin/dashboard'); ?>" class="btn btn-danger mb-3">Kembali</a>
    <br><footer class="main-footer">
    <div class="float-right d-none d-sm-inline">
    </div>
    <br><strong>Copyright Bhayangkara University Surabaya | <a href="https://instagram.com/bianhp_" style="text-decoration: none;">M. Febryanysah H. P.</a> | <a href="https://instagram.com/jeabede" style="text-decoration: none;">Jaihan Abidin</a> | <a href="https://instagram.com/allfiann_" style="text-decoration: none;">Alfian Bahrul Alam</a> </strong>  All rights reserved.
</footer>
</div>
<script>
    $(document).ready(function() {
        $('#admin_user_table').DataTable();
    });
</script>
</body>
</html>