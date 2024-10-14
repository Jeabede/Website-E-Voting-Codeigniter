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

    <title>E Voting | Vote</title>
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title mb-4">Voting</h2>
                    <?php if(validation_errors() == TRUE): ?>
                        <div class="alert alert-danger" role="alert"><?php echo validation_errors(); ?></div>
                    <?php endif; ?>
                    <?php if(isset($error)): ?>
                        <div class="alert alert-danger" role="alert"> <?php echo $error; ?> </div>
                    <?php endif; ?>
                    <?php echo form_open('voting/proses_vote'); ?>
                        <div class="mb-3">
                            <label for="id_event_vote" class="form-label">Event Vote:</label>
                            <select class="form-select" name="id_event_vote" id="id_event_vote">
                                <option value="">Pilih Event Vote</option>
                                <?php foreach ($EventVote as $event) : ?>
                                    <option value="<?php echo $event['id']; ?>"><?php echo $event['nama_event']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <h3>Pilih Kandidat:</h3>
                            <?php
                                echo '<div class="mb-3 kandidat-container" id="kandidat-container" hidden>';
                                foreach ($kandidat as $item) {
                                    echo '<div class="form-check kandidat-item mb-5" data-id-kategori-event-vote="' . $item['id_kategori_event_vote'] . '">';
                                    echo '<input class="form-check-input" type="radio" name="id_kandidat" value="' . $item['id'] . '" id="kandidat' . $item['id'] . '">';
                                    echo '<p>' . $item['nama'] . '</p>';
                                    echo '<img src="../foto_kandidat/' . $item['foto_kandidat'] . '" width="250" height="300" alt="' . $item['nama'] . '">';
                                    echo '<p>Visi Misi: ' . $item['visi_misi'] . '</p>';
                                    echo '</div>';
                                }
                                echo '</div>';
                            ?>
                        <div class="mt-4">
                            <a href="<?php echo base_url('dashboard'); ?>" class="btn btn-danger">Kembali</a>
                            <button type="submit" class="btn btn-primary">Vote</button>
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('id_event_vote').addEventListener('change', function () {
    var kandidatContainer = document.getElementById('kandidat-container');

    var selectedValue = this.value;
    var kandidatItems = document.querySelectorAll('.kandidat-item');
    
    if(selectedValue === '') {
        kandidatContainer.setAttribute('hidden', true);
    } else {
        kandidatContainer.removeAttribute('hidden');
        kandidatItems.forEach(function (item) {
            var idKategoriEventVote = item.dataset.idKategoriEventVote;
            if (idKategoriEventVote !== selectedValue) {
                item.style.display = 'none';
            } else {
                item.style.display = 'block';
            }
        });
    }
});

</script>


</body>
</html>