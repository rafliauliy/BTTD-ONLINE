<?php if (is_admin()) : ?>
<?= $this->session->flashdata('pesan'); ?>
<div class="container mt-4">
    <div class="card shadow-sm mb-4 border-bottom-primary">
        <div class="card-header bg-white py-3">
            <div class="row">
                <div class="col">
                    <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                        Form Edit PPH
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
            <?= form_open_multipart('perusahaan/edit/'.$perusahaan['id']); ?>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="id_user"><strong>Nama Perusahaan *</strong></label>
                    <select name="id_user" class="form-control">
                        <option value="">Pilih User</option>
                        <?php foreach ($user_ids as $user) : ?>
                            <option value="<?= $user['id_user']; ?>|<?= $user['nama_perusahaan']; ?>" <?= set_select('id_user', $user['id_user'] . '|' . $user['nama_perusahaan'], $user['id_user'] . '|' . $user['nama_perusahaan'] == $perusahaan['id_user'] . '|' . $perusahaan['nama_perusahaan']); ?>>
                                <?= $user['nama_perusahaan']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('id_user', '<small class="text-danger">', '</small>'); ?>
                </div>

                <div class="form-group col-md-6">
                    <label for="file_pph"><strong>File PPH *</strong></label>
                    <input type="file" name="file_pph" class="form-control">
                    <?= form_error('file_pph', '<small class="text-danger">', '</small>'); ?>
                    <?php if ($perusahaan['file_pph']) : 
                        $file_url = base_url('uploads/pph/' . $perusahaan['file_pph']); ?>
                        <small class="form-text text-muted">
                            Current file: 
                            <a href="<?= $file_url; ?>" target="_blank" style="color: blue;">
                                <?= $perusahaan['file_pph']; ?>
                            </a>
                        </small>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="bulan"><strong>Bulan</strong></label>
                    <select class="form-control" name="bulan" id="bulan">
                        <option value="Januari" <?= set_select('bulan', 'Januari', $perusahaan['bulan'] == 'Januari'); ?>>Januari</option>
                        <option value="Februari" <?= set_select('bulan', 'Februari', $perusahaan['bulan'] == 'Februari'); ?>>Februari</option>
                        <option value="Maret" <?= set_select('bulan', 'Maret', $perusahaan['bulan'] == 'Maret'); ?>>Maret</option>
                        <option value="April" <?= set_select('bulan', 'April', $perusahaan['bulan'] == 'April'); ?>>April</option>
                        <option value="Mei" <?= set_select('bulan', 'Mei', $perusahaan['bulan'] == 'Mei'); ?>>Mei</option>
                        <option value="Juni" <?= set_select('bulan', 'Juni', $perusahaan['bulan'] == 'Juni'); ?>>Juni</option>
                        <option value="Juli" <?= set_select('bulan', 'Juli', $perusahaan['bulan'] == 'Juli'); ?>>Juli</option>
                        <option value="Agustus" <?= set_select('bulan', 'Agustus', $perusahaan['bulan'] == 'Agustus'); ?>>Agustus</option>
                        <option value="September" <?= set_select('bulan', 'September', $perusahaan['bulan'] == 'September'); ?>>September</option>
                        <option value="Oktober" <?= set_select('bulan', 'Oktober', $perusahaan['bulan'] == 'Oktober'); ?>>Oktober</option>
                        <option value="November" <?= set_select('bulan', 'November', $perusahaan['bulan'] == 'November'); ?>>November</option>
                        <option value="Desember" <?= set_select('bulan', 'Desember', $perusahaan['bulan'] == 'Desember'); ?>>Desember</option>
                    </select>
                    <?= form_error('bulan', '<small class="text-danger">', '</small>'); ?>
                </div>

                <div class="form-group col-md-6">
                    <label for="periode"><strong>Periode</strong></label>
                    <input type="number" name="periode" class="form-control" value="<?= set_value('periode', $perusahaan['periode']); ?>">
                    <?= form_error('periode', '<small class="text-danger">', '</small>'); ?>
                </div>
            </div>
            <hr>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<?php endif; ?>
