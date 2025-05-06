<?= $this->session->flashdata('pesan'); ?>

<div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 text-primary font-weight-bold"></h5>
        <a href="<?= base_url('barang') ?>" class="btn btn-sm btn-secondary">
            <i class="fa fa-arrow-left mr-1"></i> Kembali
        </a>
    </div>
    <div class="card-body">
        <?php if ($barang) : ?>
            <?php foreach ($barang as $b) : ?>
                <div class="mb-4">
                    <h6 class="text-secondary font-weight-bold">ID Vendor: <?= $b['id_vendor']; ?></h6>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Nama Vendor</label>
                            <input type="text" class="form-control" value="<?= $b['nama_vendor']; ?>" disabled>
                        </div>

                        <?php if (is_admin()) : ?>
                            <div class="form-group col-md-4">
                                <label>Term Of Payment</label>
                                <input type="text" class="form-control" value="<?= $b['top']; ?>" disabled>
                            </div>
                        <?php endif; ?>


                        <div class="form-group col-md-4">
                            <label>Due Date</label>
                            <input type="text" class="form-control" value="<?= !empty($b['due_date']) ? date('d-m-Y', strtotime($b['due_date'])) : ''; ?>" disabled>
                        </div>


                        <div class="form-group col-md-4">
                            <label>Nomor Invoice</label>
                            <input type="text" class="form-control" value="<?= $b['no_invoice']; ?>" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Nilai Invoice / Kuitansi</label>
                            <input type="text" class="form-control" value="<?= $b['nilai_invoice']; ?>" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Tanggal Invoice</label>
                            <input type="text" class="form-control" value="<?= date('d-m-Y', strtotime($b['tgl_invoice'])); ?>" disabled>
                        </div>

                        <div class="form-group col-md-4">
                            <label>Nomor SPK / PO / SPPB / Kontrak</label>
                            <input type="text" class="form-control" value="<?= !empty($b['no_spk']) ? $b['no_spk'] : '-'; ?>" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Nomor LHP / LPB</label>
                            <input type="text" class="form-control" value="<?= !empty($b['no_lhp']) ? $b['no_lhp'] : '-'; ?>" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Nomor Faktur Pajak</label>
                            <input type="text" class="form-control" value="<?= !empty($b['no_faktur_pajak']) ? $b['no_faktur_pajak'] : '-'; ?>" disabled>
                        </div>

                        <div class="form-group col-md-4">
                            <label>Keterangan Invoice</label>
                            <input type="text" class="form-control" value="<?= $b['keterangan_invoice']; ?>" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Tanggal Diterima</label>
                            <input type="text" class="form-control" value="<?= !empty($b['tgl_diterima']) ? date('d-m-Y', strtotime($b['tgl_diterima'])) : '-'; ?>" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Status</label>
                            <input type="text" class="form-control" value="<?= !empty($b['status']) ? $b['status'] : '-'; ?>" disabled>
                        </div>

                        <div class="form-group col-md-4">
                            <label>Status Pembayaran</label>
                            <input type="text" class="form-control" value="<?= !empty($b['status_pembayaran']) ? $b['status_pembayaran'] : '-'; ?>" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Tanggal Dibayar</label>
                            <input type="text" class="form-control" value="<?= !empty($b['tanggal_dibayar']) ? date('d-m-Y', strtotime($b['tanggal_dibayar'])) : '-'; ?>" disabled>
                        </div>
                        <?php if (is_admin()) : ?>
                            <div class="form-group col-md-4">
                                <label>ID Pemilik</label>
                                <input type="text" class="form-control" value="<?= $b['id_user']; ?>" disabled>
                            </div>
                        <?php endif; ?>

                        <div class="form-group col-md-4">
                            <label>Invoice</label>
                            <?php if ($b['pdf_invoice']) : ?>
                                <a href="<?= base_url('uploads/' . $b['pdf_invoice']); ?>" target="_blank" class="btn btn-outline-primary btn-block">Open Invoice</a>
                            <?php else : ?>
                                <input type="text" class="form-control" value="No Invoice" disabled>
                            <?php endif; ?>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Faktur Pajak</label>
                            <?php if ($b['pdf_faktur_pajak']) : ?>
                                <a href="<?= base_url('uploads/' . $b['pdf_faktur_pajak']); ?>" target="_blank" class="btn btn-outline-primary btn-block">Open Faktur Pajak</a>
                            <?php else : ?>
                                <input type="text" class="form-control" value="No Faktur Pajak" disabled>
                            <?php endif; ?>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Bukti Pembayaran</label>
                            <?php if ($b['bukti_pembayaran']) : ?>
                                <a href="<?= base_url('uploads/' . $b['bukti_pembayaran']); ?>" target="_blank" class="btn btn-outline-success btn-block">Bukti Pembayaran</a>
                            <?php else : ?>
                                <input type="text" class="form-control" value="Bukti Belum Diunggah" disabled>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <hr>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="text-center text-danger">Data Kosong</div>
        <?php endif; ?>
    </div>
</div>

<!-- Optional: Custom style for better spacing and visual -->
<style>
    label {
        font-weight: 500;
    }
</style>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">