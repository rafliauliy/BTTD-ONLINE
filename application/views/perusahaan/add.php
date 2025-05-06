<?php if (is_admin()) : ?>
<?= $this->session->flashdata('pesan'); ?>
<div class="container mt-4">
    <div class="card shadow-sm mb-4 border-bottom-primary">
        <div class="card-header bg-white py-3">
            <div class="row">
                <div class="col">
                    <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                        Form Tambah PPH
                    </h4>
                </div>
                <div class="col-auto">
                    <a href="<?= base_url('perusahaan') ?>" class="btn btn-sm btn-secondary btn-icon-split">
                        <span class="icon">
                            <i class="fa fa-arrow-left"></i>
                        </span>
                        <span class="text">
                            Kembali
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form id="pphForm" action="<?= base_url('perusahaan/add'); ?>" method="post" enctype="multipart/form-data">
                <!-- CSRF token -->
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />

                <div id="formContainer">
                    <div class="form-entry">
                        <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="id_user"><strong>Nama Perusahaan <span style="color: red;">*</span></strong></label>
                            <select name="id_user[]" class="form-control selectpicker" data-live-search="true">
                                <option value="">Pilih User</option>
                                <?php foreach ($user_ids as $user) : ?>
                                    <option value="<?= $user['id_user']; ?>|<?= $user['nama_perusahaan']; ?>" <?= set_select('id_user', $user['id_user']); ?>>
                                        <?= $user['nama_perusahaan']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('id_user[]', '<small class="text-danger">', '</small>'); ?>
                        </div>
                            <div class="form-group col-md-6">
                                <label for="file_pph"><strong>File PPH <span style="color: red;">*</span></strong></label>
                                <input type="file" name="file_pph[]" class="form-control">
                                <?= form_error('file_pph[]', '<small class="text-danger">', '</small>'); ?>
                                <small class="form-text text-muted">Only PDF & ZIP files are supported.</small>
                            </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="bulan"><strong>Bulan</strong></label>
                            <select name="bulan[]" class="form-control">
                                <?php
                                $months = [
                                    'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                                    'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                                ];

                                foreach ($months as $month) {
                                    echo '<option value="' . $month . '">' . $month . '</option>';
                                }
                                ?>
                            </select>
                            <?= form_error('bulan[]', '<small class="text-danger">', '</small>'); ?>
                        </div>

                            <div class="form-group col-md-6">
                                <label for="periode"><strong>Periode</strong></label>
                                <select name="periode[]" class="form-control">
                                    <?php
                                    for ($i = 2020; $i <= 2030; $i++) {
                                        echo '<option value="' . $i . '">' . $i . '</option>';
                                    }
                                    ?>
                                </select>
                                <?= form_error('periode[]', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <hr>
                    </div> <!-- .form-entry -->
                </div> <!-- #formContainer -->
                <div class="form-row">
                    <div class="col">
                        <button type="submit" class="btn btn-primary">Save Data</button>
                        <button type="reset" class="btn btn-secondary">Reset Data</button>
                    </div>
                    <div class="col-auto">
                    <button type="button" class="btn btn-success" id="addForm" disabled>Add Others PPH</button>
                    <button type="button" class="btn btn-danger deleteRow" disabled>Delete Row</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function () {
        $('#addForm').on('click', function () {
            var newFormEntry = $('.form-entry:first').clone();
            newFormEntry.find('input').val(''); // Reset all input fields
            newFormEntry.find('select').val(''); // Reset all select fields
            newFormEntry.appendTo('#formContainer');
        });

        $(document).on('click', '.deleteRow', function () {
            if ($('.form-entry').length > 1) {
                $('.form-entry:last').remove();
            } else {
                alert('You need at least one entry.');
            }
        });
        $(document).ready(function(){
            $('.selectpicker').selectpicker();
        });

        $(document).ready(function() {
            $('.selectpicker').selectpicker();
        });

    });
</script>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- Bootstrap-Select CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Bootstrap-Select JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<?php endif; ?>