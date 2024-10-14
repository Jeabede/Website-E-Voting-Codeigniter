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

    <title>E Voting | Register</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Register</h2>
                        <?php if(validation_errors() == TRUE): ?>
                            <div class="alert alert-danger" role="alert"><?php echo validation_errors(); ?></div>
                        <?php endif; ?>
                        <?php if(isset($error)): ?>
                            <div class="alert alert-danger" role="alert"> <?php echo $error; ?> </div>
                        <?php endif; ?>
                        <?php echo form_open('auth/register'); ?>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username:</label>
                                <input type="text" name="username" class="form-control" value="<?php echo set_value('username'); ?>">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" name="email" class="form-control" value="<?php echo set_value('email'); ?>">
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama:</label>
                                <input type="text" name="nama" class="form-control" value="<?php echo set_value('nama'); ?>">
                            </div>
                            <div class="mb-3">
                                <label for="no_hp" class="form-label">No Handphone:</label>
                                <input type="text" name="no_hp" class="form-control" value="<?php echo set_value('no_hp'); ?>">
                            </div>
                            <div class="mb-3">
                                <label for="tgl_lahir" class="form-label">Tanggal Lahir:</label>
                                <input type="date" name="tgl_lahir" class="form-control" value="<?php echo set_value('tgl_lahir'); ?>">
                            </div>
                            <div class="mb-3">
                                <label for="pertanyaan" class="form-label">Pertanyaan Konfirmasi Keamanan:</label>
                                <select name="pertanyaan" class="form-control" id="pertanyaan">
                                    <option value="">-- Pilih Jawaban --</option>
                                    <option value="Apa nama hewan peliharaan pertama Anda?" <?php echo set_value('pertanyaan') == 'Apa nama hewan peliharaan pertama Anda?' ? 'selected' : ''; ?>>Apa nama hewan peliharaan pertama Anda?</option>
                                    <option value="Apa makanan favorit Anda?" <?php echo set_value('pertanyaan') == 'Apa makanan favorit Anda?' ? 'selected' : ''; ?>>Apa makanan favorit Anda?</option>
                                    <option value="Apa warna favorit Anda?" <?php echo set_value('pertanyaan') == 'Apa warna favorit Anda?' ? 'selected' : ''; ?>>Apa warna favorit Anda?</option>
                                    <option value="Apa warna favorit Anda?" <?php echo set_value('pertanyaan') == 'Apa warna favorit Anda?' ? 'selected' : ''; ?>>Apa warna favorit Anda?</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="jawaban" class="form-label">Jawaban Konfirmasi Keamanan:</label>
                                <input type="text" name="jawaban" class="form-control" value="<?php echo set_value('jawaban'); ?>">
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary btn-block">Register</button>
                                <a href="<?php echo base_url('auth/login'); ?>" class="btn btn-success">Login</a>
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