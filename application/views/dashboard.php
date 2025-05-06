<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Import font Poppins dari Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
        <style>
            .welcome-box {
                background-color: #d0e7ff;
                font-family: 'Poppins', sans-serif;
                padding: 20px;
                border-radius: 10px;
                display: flex;
                align-items: center;
                justify-content: space-between;
            }

            .welcome-text h5 {
                font-size: 2rem;
                margin-bottom: 1rem;
                font-weight: 600;
            }

            .welcome-text p {
                font-size: 1.2rem;
                font-weight: 400;
                margin: 0;
            }

            .welcome-img img {
                max-width: 400px;
                height: auto;
            }

            @media (max-width: 768px) {
                .welcome-box {
                    flex-direction: column;
                    text-align: center;
                }

                .welcome-img {
                    margin-top: 20px;
                }
            }

            /* Animasi FadeInLeft */
            .leFadeInLeft span {
                display: inline-block;
                opacity: 0;
                animation-name: leFadeInLeft;
                animation-duration: 1s;
                animation-fill-mode: forwards;
                animation-delay: 0.2s;
            }

            @keyframes leFadeInLeft {
                from {
                    opacity: 0;
                    transform: translateX(-60px);
                }

                to {
                    opacity: 1;
                    transform: translateX(0);
                }
            }

            /* Animasi Gambar Naik Turun */
            .hu__hu__ {
                animation: hu__hu__ infinite 2s ease-in-out;
            }

            @keyframes hu__hu__ {
                50% {
                    transform: translateY(30px);
                }
            }
        </style>

        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="welcome-box">
                    <div class="welcome-text">
                        <h5 class="leFadeInLeft">
                            <span>Welcome to <b>BTTD Online</b> PT Krakatau Jasa Samudera</span>
                        </h5>
                        <p>Selamat datang di sistem Bukti Tanda Terima Dokumen (BTTD) Online. Silakan gunakan sistem ini untuk mempermudah pengelolaan dokumen Anda.</p>
                    </div>

                </div>
            </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>


<hr>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<hr>

<?php if (is_admin()) : ?>
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4" style="margin-left: 200px;">
            <a class="nav-link pb-0" href="<?= base_url('barang'); ?>">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Data BTTD</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($barang); ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-folder fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <a class="nav-link" href="<?= base_url('user'); ?>">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total User</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $user; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-plus fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <?php
        // Ensure $barang is an array before using foreach
        $totalDataBelumDiterima = 0;
        if (is_array($barang)) {
            foreach ($barang as $b) {
                if (empty($b['tgl_diterima'])) {
                    $totalDataBelumDiterima++;
                }
            }
        }
        ?>
        <div class="col-xl-3 col-md-6 mb-4">
            <a class="nav-link" href="<?= base_url('barang'); ?>">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">BTTD Belum Diproses</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalDataBelumDiterima; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-bell fa-2x text-danger"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

    <?php endif; ?>


    </div>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">