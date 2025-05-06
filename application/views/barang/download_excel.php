<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col-auto">
                <div class="col-auto">
                    <a href="<?= base_url('barang') ?>" class="btn btn-sm btn-success btn-icon-split">
                        <span class="icon">
                            <i class="fas fa-chevron-left"></i>
                        </span>
                        <span class="text">
                            Kembali Ke BTTD
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
       <div class="table-responsive" style="overflow-x: auto; white-space: nowrap; max-width: 100%;">
            <table class="table table-striped table-bordered" id="dataTable" style="width: 100%; table-layout: auto;">
                <thead>
                    <tr>
                        <th style="width: 5%;">No. </th>
                        <th style="width: 15%;">No BTTD</th>
                        <th style="width: 20%;">Nama Vendor</th>
                        <th style="width: 10%;">Nomor Invoice</th>
                        <th style="width: 10%;">Nilai Invoice</th>
                        <th style="width: 10%;">Tanggal Invoice</th>
                        <th style="width: 10%;">No SPK</th>
                        <th style="width: 10%;">No LHP</th>
                        <th style="width: 10%;">No Faktur Pajak</th>
                        <th style="width: 10%;">Tanggal Diterima</th>
                        <th style="width: 5%;">Keterangan Invoice</th>
                        <th style="width: 10%;">PDF Invoice</th>
                        <th style="width: 10%;">PDF Faktur Pajak</th>
                        <th style="width: 5%;">Status</th>
                        <th style="width: 5%;">Catatan</th>
                        <th style="width: 5%;">Status Pembayaran</th>
                        <th style="width: 5%;">Tanggal Pembayaran</th>
                        <th style="width: 5%;">Bukti Pembayaran</th>
                        <th style="width: 5%;">ID User</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($barang) :
                        $no = 1;
                        foreach ($barang as $b) :
                    ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $b['id_vendor']; ?></td>
                                <td><?= $b['nama_vendor']; ?></td>
                                <td><?= $b['no_invoice']; ?></td>
                                <td><?= $b['nilai_invoice']; ?></td>
                                <td><?= date('d-m-Y', strtotime($b['tgl_invoice'])); ?></td>
                                <td><?= $b['no_spk']; ?></td>
                                <td><?= $b['no_lhp']; ?></td>
                                <td><?= $b['no_faktur_pajak']; ?></td>
                                <td><?= date('d-m-Y', strtotime($b['tgl_diterima'])); ?></td>
                                <td><?= $b['keterangan_invoice']; ?></td>
                                <td style="white-space: nowrap;">
                                    <?php if ($b['pdf_invoice']) : ?>
                                        <a href="<?= base_url('uploads/' . $b['pdf_invoice']); ?>" target="_blank">PDF Invoice</a>
                                    <?php else : ?>
                                        Invoice Belum Di Upload
                                    <?php endif; ?>
                                </td>
                                <td style="white-space: nowrap;">
                                    <?php if ($b['pdf_faktur_pajak']) : ?>
                                        <a href="<?= base_url('uploads/' . $b['pdf_faktur_pajak']); ?>" target="_blank">PDF Faktur Pajak</a>
                                    <?php else : ?>
                                        Faktur Pajak Belum Di Upload
                                    <?php endif; ?>
                                </td>
                                <td><?= $b['status']; ?></td>
                                <td><?= $b['catatan']; ?></td>
                                <td><?= $b['status_pembayaran']; ?></td>
                                <td><?= $b['tanggal_dibayar']; ?></td>
                                <td style="white-space: nowrap;">
                                    <?php if ($b['bukti_pembayaran']) : ?>
                                        <a href="<?= base_url('uploads/' . $b['bukti_pembayaran']); ?>" target="_blank">Bukti Pembayaran</a>
                                    <?php else : ?>
                                        Bukti Pembayaran Belum Di Upload
                                    <?php endif; ?>
                                </td>
                                <td><?= $b['id_user']; ?></td>
                            </tr>
                        <?php endforeach;
                    else : ?>
                        <tr>
                            <td colspan="15" class="text-center">
                                Data Kosong
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">