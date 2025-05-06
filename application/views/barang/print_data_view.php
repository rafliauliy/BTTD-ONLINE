<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print BTTD</title>
</head>

<body style="margin: -20; padding: 20px;">

    <div style="display: flex;">
        <!-- Gambar/Logo -->
        <div style="position: relative;">
            <img src="<?= base_url('assets/img/logo-kjs.png') ?>" style="width: 150px; height: 40px;">
        </div>



        <div style="text-align: center; margin-top: -10px;">
            <h3 style="font-size: 18px; font-weight: bold; text-decoration: underline;">BUKTI TANDA TERIMA DOKUMEN</h3>
            <p style="font-size: 12px; margin-top: -10px;">BTTD - KJS/<?php echo $barang->id_vendor; ?></p>
        </div>

        <!-- Data Table -->

        <style>
            table {
                margin-top: 10px;
                /* Atur jarak ke bawah sebesar 20px */
            }
        </style>

        <!-- Data Table -->
        <table style="width: 100%; margin: 0 auto; border-collapse: collapse; border: 1px solid #000; font-size: 13px;">
            <!-- Isi tabel -->
            <tr>
                <td style="padding: 5px; text-align: left; border: 1px solid #000; width: 50%;">Nama vendor</td>
                <td style="padding: 5px; text-align: left; border: 1px solid #000; width: 50%;"><?php echo $barang->nama_vendor; ?></td>
                <!-- Add checkbox input field in each row on the right -->
                <td style="padding: 5px; text-align: center; border: 1px solid #000; width: 50%; border-bottom: none; font-size: 10px;">Stempel Verifikasi *
                </td>
            </tr>
            <tr>
                <td style="padding: 5px; text-align: left; border: 1px solid #000;">Nomor Invoice</td>
                <td style="padding: 5px; text-align: left; border: 1px solid #000;"><?php echo $barang->no_invoice; ?></td>
                <!-- Add checkbox input field in each row on the right -->
                <td style="padding: 5px; text-align: center; border: 1px solid #000; border-top: none; border-bottom: none;">
                </td>
            </tr>
            <tr>
                <td style="padding: 5px; text-align: left; border: 1px solid #000;">Nilai Invoice</td>
                <td style="padding: 5px; text-align: left; border: 1px solid #000;"><?php echo $barang->nilai_invoice; ?></td>
                <!-- Add checkbox input field in each row on the right -->
                <td style="padding: 5px; text-align: center; border: 1px solid #000; border-bottom: none; border-top: none;">
                </td>
            </tr>
            <tr>
                <td style="padding: 5px; text-align: left; border: 1px solid #000;">Tanggal Invoice</td>
                <td style="padding: 5px; text-align: left; border: 1px solid #000;"><?php echo date('d-m-Y', strtotime($barang->tgl_invoice)); ?></td>
                <!-- Add checkbox input field in each row on the right -->
                <td style="padding: 5px; text-align: center; border: 1px solid #000; border-top: none; border-bottom: none;">
                </td>
            </tr>
            <tr>
                <td style="padding: 5px; text-align: left; border: 1px solid #000;">Nomor SPK</td>
                <td style="padding: 5px; text-align: left; border: 1px solid #000;"><?php echo $barang->no_spk; ?></td>
                <!-- Add checkbox input field in each row on the right -->
                <td style="padding: 5px; text-align: center; border: 1px solid #000; border-top: none; border-bottom: none; font-size: 10px;">
                </td>
            </tr>
            <tr>
                <td style="padding: 5px; text-align: left; border: 1px solid #000;">Nomor LHP</td>
                <td style="padding: 5px; text-align: left; border: 1px solid #000;"><?php echo $barang->no_lhp; ?></td>
                <!-- Add checkbox input field in each row on the right -->
                <td style="padding: 5px; text-align: center; border: 1px solid #000; font-size: 10px; border-bottom: none;">Checked by *
                </td>
            </tr>
            <tr>
                <td style="padding: 5px; text-align: left; border: 1px solid #000;">Nomor Faktur Pajak</td>
                <td style="padding: 5px; text-align: left; border: 1px solid #000;"><?php echo $barang->no_faktur_pajak; ?></td>
                <!-- Add checkbox input field in each row on the right -->
                <td style="padding: 5px; text-align: center; border: 1px solid #000; border-bottom: none; border-top: none; font-size: 10px;">
                </td>
            </tr>
            <tr>
                <td style="padding: 5px; text-align: left; border: 1px solid #000;">Keterangan Invoice</td>
                <td style="padding: 5px; text-align: left; border: 1px solid #000;"><?php echo $barang->keterangan_invoice; ?></td>
                <!-- Add checkbox input field in each row on the right -->
                <td style="padding: 5px; text-align: center; border: 1px solid #000; border-top: none; border-bottom: none;">
                </td>
            </tr>
            <tr>
                <td style="padding: 5px; text-align: left; border: 1px solid #000;">Nomor Purchase Invoice</td>
                <td style="padding: 5px; text-align: left; border: 1px solid #000;"></td>
                <!-- Add checkbox input field in each row on the right -->
                <td style="padding: 5px; text-align: center; border: 1px solid #000; border-top: none; border-bottom: none;">
                </td>
            </tr>
            <tr>
                <td style="padding: 5px; text-align: left; border: 1px solid #000;">Nomor Bank Transfer</td>
                <td style="padding: 5px; text-align: left; border: 1px solid #000;"></td>
                <!-- Add checkbox input field in each row on the right -->
                <td style="padding: 5px; text-align: center; border: 1px solid #000; border-top: none; border-bottom: none; font-size: 10px;">
                </td>
            </tr>

            <!-- Add other rows with checkboxes as needed -->
        </table>

        <div style="display: flex; align-items: center; font-size: 10px;">
            <div style="flex: 1;">
                <p>Notes: Form BTTD ini hanya berlaku jika sudah di stempel oleh Divisi Finance PT. KJS</p>
            </div>
            <div style="margin-left: 477px;">
                <!-- Kotak tanda tangan untuk pengirim -->
                <div style="border: 1px solid #000; width: 23,75px; height: 100px; text-align: center; font-size: 10px; position: relative; overflow: hidden; margin-top: -32px; border-top: none; border-bottom: none; border-left: none; border-right: none;">
                    <div style="position: absolute; bottom: 80px; width: 100%; font-weight: bold;">TTD Pengirim *</div>
                </div>
            </div>
        </div>

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Dotted Line</title>
            <style>
                .dotted-line {
                    border-top: 1px dotted #000;
                    margin: 20px 0;
                    margin-top: -40px;
                }
            </style>
        </head>

        <body>

            <div class="dotted-line"></div>

        </body>

        <div style="display: flex;">
            <!-- Gambar/Logo -->
            <div style="position: relative;">
                <img src="<?= base_url('assets/img/logo-kjs.png') ?>" style="width: 150px; height: 40px;">
            </div>



            <div style="text-align: center; margin-top: -10px;">
                <h3 style="font-size: 18px; font-weight: bold; text-decoration: underline;">BUKTI TANDA TERIMA DOKUMEN</h3>
                <p style="font-size: 12px; margin-top: -10px;">BTTD - KJS/<?php echo $barang->id_vendor; ?></p>
            </div>

            <!-- Data Table -->

            <style>
                table {
                    margin-top: 10px;
                    /* Atur jarak ke bawah sebesar 20px */
                }
            </style>

            <!-- Data Table -->
            <table style="width: 100%; margin: 0 auto; border-collapse: collapse; border: 1px solid #000; font-size: 13px;">
                <!-- Isi tabel -->
                <tr>
                    <td style="padding: 5px; text-align: left; border: 1px solid #000; width: 50%;">Nama vendor</td>
                    <td style="padding: 5px; text-align: left; border: 1px solid #000; width: 50%;"><?php echo $barang->nama_vendor; ?></td>
                    <!-- Add checkbox input field in each row on the right -->
                    <td style="padding: 5px; text-align: center; border: 1px solid #000; width: 50%; border-bottom: none; font-size: 10px;">Stempel Verifikasi *
                    </td>
                </tr>
                <tr>
                    <td style="padding: 5px; text-align: left; border: 1px solid #000;">Nomor Invoice</td>
                    <td style="padding: 5px; text-align: left; border: 1px solid #000;"><?php echo $barang->no_invoice; ?></td>
                    <!-- Add checkbox input field in each row on the right -->
                    <td style="padding: 5px; text-align: center; border: 1px solid #000; border-top: none; border-bottom: none;">
                    </td>
                </tr>
                <tr>
                    <td style="padding: 5px; text-align: left; border: 1px solid #000;">Nilai Invoice</td>
                    <td style="padding: 5px; text-align: left; border: 1px solid #000;"><?php echo $barang->nilai_invoice; ?></td>
                    <!-- Add checkbox input field in each row on the right -->
                    <td style="padding: 5px; text-align: center; border: 1px solid #000; border-bottom: none; border-top: none;">
                    </td>
                </tr>
                <tr>
                    <td style="padding: 5px; text-align: left; border: 1px solid #000;">Tanggal Invoice</td>
                    <td style="padding: 5px; text-align: left; border: 1px solid #000;"><?php echo date('d-m-Y', strtotime($barang->tgl_invoice)); ?></td>
                    <!-- Add checkbox input field in each row on the right -->
                    <td style="padding: 5px; text-align: center; border: 1px solid #000; border-top: none; border-bottom: none;">
                    </td>
                </tr>
                <tr>
                    <td style="padding: 5px; text-align: left; border: 1px solid #000;">Nomor SPK</td>
                    <td style="padding: 5px; text-align: left; border: 1px solid #000;"><?php echo $barang->no_spk; ?></td>
                    <!-- Add checkbox input field in each row on the right -->
                    <td style="padding: 5px; text-align: center; border: 1px solid #000; border-top: none; border-bottom: none; font-size: 10px;">
                    </td>
                </tr>
                <tr>
                    <td style="padding: 5px; text-align: left; border: 1px solid #000;">Nomor LHP</td>
                    <td style="padding: 5px; text-align: left; border: 1px solid #000;"><?php echo $barang->no_lhp; ?></td>
                    <!-- Add checkbox input field in each row on the right -->
                    <td style="padding: 5px; text-align: center; border: 1px solid #000; font-size: 10px; border-bottom: none;">Checked by *
                    </td>
                </tr>
                <tr>
                    <td style="padding: 5px; text-align: left; border: 1px solid #000;">Nomor Faktur Pajak</td>
                    <td style="padding: 5px; text-align: left; border: 1px solid #000;"><?php echo $barang->no_faktur_pajak; ?></td>
                    <!-- Add checkbox input field in each row on the right -->
                    <td style="padding: 5px; text-align: center; border: 1px solid #000; border-bottom: none; border-top: none; font-size: 10px;">
                    </td>
                </tr>
                <tr>
                    <td style="padding: 5px; text-align: left; border: 1px solid #000;">Keterangan Invoice</td>
                    <td style="padding: 5px; text-align: left; border: 1px solid #000;"><?php echo $barang->keterangan_invoice; ?></td>
                    <!-- Add checkbox input field in each row on the right -->
                    <td style="padding: 5px; text-align: center; border: 1px solid #000; border-top: none; border-bottom: none;">
                    </td>
                </tr>
                <tr>
                    <td style="padding: 5px; text-align: left; border: 1px solid #000;">Nomor Purchase Invoice</td>
                    <td style="padding: 5px; text-align: left; border: 1px solid #000;"></td>
                    <!-- Add checkbox input field in each row on the right -->
                    <td style="padding: 5px; text-align: center; border: 1px solid #000; border-top: none; border-bottom: none;">
                    </td>
                </tr>
                <tr>
                    <td style="padding: 5px; text-align: left; border: 1px solid #000;">Nomor Bank Transfer</td>
                    <td style="padding: 5px; text-align: left; border: 1px solid #000;"></td>
                    <!-- Add checkbox input field in each row on the right -->
                    <td style="padding: 5px; text-align: center; border: 1px solid #000; border-top: none; border-bottom: none; font-size: 10px;">
                    </td>
                </tr>

                <!-- Add other rows with checkboxes as needed -->
            </table>

            <div style="display: flex; align-items: center; font-size: 10px;">
                <div style="flex: 1;">
                    <p>Notes: Form BTTD ini hanya berlaku jika sudah di stempel oleh Divisi Finance PT. KJS</p>
                </div>
                <div style="margin-left: 477px;">
                    <!-- Kotak tanda tangan untuk pengirim -->
                    <div style="border: 1px solid #000; width: 23,75px; height: 100px; text-align: center; font-size: 10px; position: relative; overflow: hidden; margin-top: -32px; border-top: none; border-bottom: none; border-left: none; border-right: none;">
                        <div style="position: absolute; bottom: 80px; width: 100%; font-weight: bold;">TTD Pengirim *</div>
                    </div>
                </div>
            </div>

            <script>
                // Function to trigger print dialog when the page loads
                window.onload = function() {
                    window.print();
                };
            </script>
</body>

</html>