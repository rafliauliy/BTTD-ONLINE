<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<body>
    <div id="preloader">
        <div class="spinner"></div>
    </div>

    <div id="content" class="content">
        <?= $this->session->flashdata('pesan'); ?>
        <div class="card shadow-sm border-bottom-primary blurred">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col-auto">
                        <a href="<?= base_url('barang/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
                            <span class="icon">
                                <i class="fa fa-plus"></i>
                            </span>
                            <span class="text">Tambah BTTD</span>
                        </a>


                        <a href="<?= base_url('barang/excel') ?>" class="btn btn-sm btn-success btn-icon-split">
                            <span class="icon">
                                <i class="fa fa-file-excel"></i>
                            </span>
                            <span class="text">Export Excel</span>
                        </a>

                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive" style="overflow-x: auto; white-space: nowrap; max-width: 100%;">
                    <table class="table table-striped table-bordered" id="dataTable" style="width: 100%; table-layout: auto;">
                        <thead>
                            <tr>
                                <th style="width: 5%;">No.</th>
                                <th style="width: 15%;">No BTTD</th>
                                <th style="width: 15%;">No Faktur Pajak</th>
                                <th style="width: 20%;">Nama Vendor</th>
                                <th style="width: 10%;">Nomor Invoice</th>
                                <th style="width: 10%;">Tanggal Invoice</th>
                                <th style="width: 10%;">Tanggal Diterima</th>
                                <th style="width: 5%;">Status</th>
                                <th style="width: 5%;">Due Date</th>
                                <th style="width: 5%;">Status Pembayaran</th>
                                <th style="width: 5%;">Tanggal Dibayar</th>
                                <th style="width: 5%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($barang) :
                                $no = 1;
                                foreach ($barang as $b) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $b['id_vendor']; ?></td>
                                        <td><?= $b['no_faktur_pajak']; ?></td>
                                        <td><?= $b['nama_vendor']; ?></td>
                                        <td><?= $b['no_invoice']; ?></td>
                                        <td><?= date('d-m-Y', strtotime($b['tgl_invoice'])); ?></td>
                                        <td>
                                            <?php if (!empty($b['tgl_diterima'])) : ?>
                                                <?= date('d-m-Y', strtotime($b['tgl_diterima'])); ?>
                                            <?php else : ?>
                                                -
                                            <?php endif; ?>
                                        </td>
                                        <td><?= !empty($b['status']) ? $b['status'] : '-'; ?></td>
                                        <td><?= !empty($b['due_date']) ? date('d-m-Y', strtotime($b['due_date'])) : ''; ?></td>
                                        <td><?= !empty($b['status_pembayaran']) ? $b['status_pembayaran'] : '-'; ?></td>
                                        <td>
                                            <?php if (!empty($b['tanggal_dibayar'])) : ?>
                                                <?= date('d-m-Y', strtotime($b['tanggal_dibayar'])); ?>
                                            <?php else : ?>
                                                -
                                            <?php endif; ?>
                                        </td>
                                        <style>
                                            .btn-group .btn {
                                                margin-right: -1px;
                                                /* Menghapus margin antar tombol */
                                            }
                                        </style>
                                        <td colspan="3">
                                            <div class="btn-group" role="group">
                                                <a href="<?= base_url('barang/data_detail/') . $b['id_vendor'] ?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                                                <a href="<?= base_url('barang/edit/') . $b['id_vendor'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                <a href="<?= base_url('barang/printData/' . $b['id_vendor']) ?>" target="_blank" class="btn btn-info btn-sm" onclick="window.open(this.href,'_blank');return false;"><i class="fa fa-print"></i></a>
                                                <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('barang/delete/') . $b['id_vendor'] ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach;
                            else : ?>
                                <tr>
                                    <td colspan="15" class="text-center">Data Kosong</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var preloader = document.getElementById("preloader");
            var content = document.getElementById("content");
            var cards = document.querySelectorAll('.card');

            if (preloader && content) {
                // Menghapus preloader setelah konten dimuat
                setTimeout(function() {
                    preloader.style.display = "none";
                    // Menghapus blur dari konten dan card setelah preloader dihapus
                    content.classList.remove("blurred");
                    cards.forEach(function(card) {
                        card.classList.remove("blurred");
                    });
                }, 500); // Menunggu 500ms untuk transisi
            }
        });
    </script>
</body>

</html>