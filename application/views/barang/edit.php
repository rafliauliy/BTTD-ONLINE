<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form Edit BTTD
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('barang') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
            <?= form_open_multipart('', [], ['id_vendor' => $barang['id_vendor']]); ?>
            <div class="card-body">
                <?= $this->session->flashdata('pesan'); ?>
                <?= form_open('', [], ['id_vendor' => $barang['id_vendor']]); ?>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="nama_vendor">Nama Vendor</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('nama_vendor', $barang['nama_vendor']); ?>" name="nama_vendor" id="nama_vendor" type="text" class="form-control" autocomplete="off" placeholder="Nama Vendor..." readonly>
                        <?= form_error('nama_vendor', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="no_invoice">Nomor Invoice</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('no_invoice', $barang['no_invoice']); ?>" name="no_invoice" id="no_invoice" type="text" autocomplete="off" class="form-control">
                        <?= form_error('no_invoice', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="nilai_invoice">Nilai Invoice / Kwitansi</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('nilai_invoice', $barang['nilai_invoice']); ?>" name="nilai_invoice" id="nilai_invoice" type="text" autocomplete="off" class="form-control">
                        <?= form_error('nilai_invoice', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <script>
                    document.getElementById('nilai_invoice').addEventListener('input', function(e) {
                        var rp = document.getElementById('rp');
                        var inputValue = e.target.value.replace(/[^\d]/g, ''); // Hanya ambil angka

                        // Cek apakah nilai yang dimasukkan valid
                        if (!isNaN(inputValue)) {
                            var formattedValue = addThousandSeparator(inputValue); // Tambahkan pemisah ribuan
                            e.target.value = "Rp." + formattedValue;
                        }
                    });

                    function addThousandSeparator(value) {
                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                    }
                </script>

                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="tgl_invoice">Tanggal Invoice</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('tgl_invoice', $barang['tgl_invoice']); ?>" name="tgl_invoice" id="tgl_invoice" type="date" autocomplete="off" class="form-control">
                        <?= form_error('tgl_invoice', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="no_spk">Nomor SPK / PO / SPPB / Kontrak</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('no_spk', $barang['no_spk']); ?>" name="no_spk" id="no_spk" type="text" autocomplete="off" class="form-control">
                        <?= form_error('no_spk', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="no_lhp">Nomor LHP / LPB </label>
                    <div class="col-md-9">
                        <input value="<?= set_value('no_lhp', $barang['no_lhp']); ?>" name="no_lhp" id="no_lhp" type="text" autocomplete="off" class="form-control">
                        <?= form_error('no_lhp', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="no_faktur_pajak">Nomor Faktur Pajak</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('no_faktur_pajak', $barang['no_faktur_pajak']); ?>" name="no_faktur_pajak" autocomplete="off" id="no_faktur_pajak" type="text" class="form-control" maxlength="17">
                        <?= form_error('no_faktur_pajak', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>


                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="keterangan_invoice">Keterangan Invoice</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('keterangan_invoice', $barang['keterangan_invoice']); ?>" name="keterangan_invoice" id="keterangan_invoice" autocomplete="off" type="text" class="form-control" maxlength="100">
                        <?= form_error('keterangan_invoice', '<small class="text-danger">', '</small>'); ?>
                        <small id="charCount" class="text-muted">0/50 karakter</small>
                    </div>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const input = document.getElementById('keterangan_invoice');
                        const charCount = document.getElementById('charCount');

                        // Update character count on page load if there is already some value
                        charCount.textContent = `${input.value.length}/100 karakter`;

                        input.addEventListener('input', function() {
                            const currentLength = input.value.length;
                            charCount.textContent = `${currentLength}/100 karakter`;
                        });
                    });
                </script>

                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="pdf_invoice">Invoice & Lampiran!</label>
                    <div class="col-md-9">
                        <input name="pdf_invoice" id="pdf_invoice" type="file" class="form-control">
                        <?php
                        if (!empty($barang['pdf_invoice'])) {
                            echo '<p class="text-info mt-2">File already uploaded: ' . $barang['pdf_invoice'] . '</p>';
                        }
                        ?>
                        <?= form_error('pdf_invoice', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <!-- File upload for PDF Faktur Pajak -->
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="pdf_faktur_pajak">PDF Faktur Pajak</label>
                    <div class="col-md-9">
                        <input name="pdf_faktur_pajak" id="pdf_faktur_pajak" type="file" class="form-control">
                        <?php
                        if (!empty($barang['pdf_faktur_pajak'])) {
                            echo '<p class="text-info mt-2">File already uploaded: ' . $barang['pdf_faktur_pajak'] . '</p>';
                        }
                        ?>
                        <?= form_error('pdf_faktur_pajak', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <?php if (is_admin()) : ?>
                    <h2 class="card-title mb-4 text-center small">Admin Wajib Isi !</h2>
                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="tgl_diterima">Tanggal Diterima</label>
                        <div class="col-md-9">
                            <input value="<?= set_value('tgl_diterima', $barang['tgl_diterima']); ?>" name="tgl_diterima" id="tgl_diterima" type="date" class="form-control">
                            <?= form_error('tgl_diterima', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="status">Status</label>
                        <div class="col-md-9">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="complete" value="complete" <?= set_radio('status', 'complete', ($barang['status'] == 'complete')); ?>>
                                <label class="form-check-label" for="complete">Complete <i class="fas fa-check"></i></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="pending" value="pending" <?= set_radio('status', 'pending', ($barang['status'] == 'pending')); ?>>
                                <label class="form-check-label" for="pending">Pending <i class="fas fa-hourglass-half"></i></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="canceled" value="canceled" <?= set_radio('status', 'canceled', ($barang['status'] == 'canceled')); ?>>
                                <label class="form-check-label" for="canceled">Canceled <i class="fas fa-times"></i></label>
                            </div>
                            <?= form_error('status', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="top">Term Of Payment</label>
                        <div class="col-md-9">
                            <select name="top" id="top" class="form-control">
                                <?php
                                $selectedTop = set_value('top', $barang['top']);
                                $options = ['Cash', '14 hari', '30 hari', '60 hari', '90 hari'];

                                // Jika nilai yang tersimpan tidak ada di list, tampilkan sebagai opsi pertama
                                if (!in_array($selectedTop, $options)) {
                                    echo "<option selected>$selectedTop</option>";
                                }

                                foreach ($options as $option) {
                                    $selected = ($selectedTop == $option) ? 'selected' : '';
                                    echo "<option value=\"$option\" $selected>$option</option>";
                                }
                                ?>
                            </select>
                            <?= form_error('top', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>




                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="catatan">Notes</label>
                        <div class="col-md-9">
                            <input value="<?= set_value('catatan', $barang['catatan']); ?>" name="catatan" id="catatan" type="text" autocomplete="off" class="form-control">
                            <?= form_error('catatan', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="status_pembayaran">Status Pembayaran</label>
                        <div class="col-md-9">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status_pembayaran" id="on-schedule-payment" value="On Schedule" <?= set_radio('status_pembayaran', 'On Schedule', ($barang['status_pembayaran'] == 'On Schedule')); ?>>
                                <label class="form-check-label" for="on-schedule-payment">On Schedule <i class="fas fa-calendar"></i></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status_pembayaran" id="paid" value="Sudah Dibayar" <?= set_radio('status_pembayaran', 'Sudah Dibayar', ($barang['status_pembayaran'] == 'Sudah Dibayar')); ?>>
                                <label class="form-check-label" for="paid">Sudah Dibayar <i class="fas fa-money-check-alt"></i></label>
                            </div>
                            <?= form_error('status_pembayaran', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="tanggal_dibayar">Tanggal Bayar</label>
                        <div class="col-md-9">
                            <input value="<?= set_value('tanggal_dibayar', $barang['tanggal_dibayar']); ?>" name="tanggal_dibayar" id="tanggal_dibayar" type="date" class="form-control">
                            <?= form_error('tanggal_dibayar', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="bukti_pembayaran">Bukti Pembayaran</label>
                        <div class="col-md-9">
                            <input name="bukti_pembayaran" id="bukti_pembayaran" type="file" class="form-control">
                            <?php
                            if (!empty($barang['bukti_pembayaran'])) {
                                echo '<p class="text-info mt-2">File already uploaded: ' . $barang['bukti_pembayaran'] . '</p>';
                            }
                            ?>
                            <?= form_error('bukti_pembayaran', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                <?php endif; ?>
                <!-- Add this inside the form -->

                <div class="row form-group">
                    <div class="col-md-10 offset-md-9">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-secondary">Reset</bu>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">