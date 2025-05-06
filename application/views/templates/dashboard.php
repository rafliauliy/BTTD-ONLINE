<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?= $title; ?></title>
    <link rel="icon" href="<?php echo base_url('assets/img/LOGO.png'); ?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo base_url('assets/img/LOGO.png'); ?>" type="image/x-icon">
    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url(); ?>assets/css/fonts.min.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Datepicker -->
    <link href="<?= base_url(); ?>assets/vendor/daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- DataTables -->
    <link href="<?= base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/datatables/buttons/css/buttons.bootstrap4.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/datatables/responsive/css/responsive.bootstrap4.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/gijgo/css/gijgo.min.css" rel="stylesheet">

    <style>
        #accordionSidebar,
        .topbar {
            z-index: 1;
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <style>
            /* Latar belakang sidebar */
            .sidebar {
                background: linear-gradient(145deg, #102E50, #1b3a66);
                /* Gradasi biru dongker */
                color: white;
                box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.3);
            }

            /* Warna teks pada sidebar */
            .sidebar-brand-text,
            .nav-link span {
                color: white !important;
            }

            /* Warna ikon pada sidebar */
            .sidebar-brand-icon i,
            .nav-link i {
                color: white !important;
            }

            .sidebar-brand-text {
                font-family: 'Times New Roman', Times, serif, sans-serif;
                font-weight: bold;
            }

            /* Warna dropdown teks */
            #userDropdown .mr-2 {
                color: white !important;
            }

            /* Efek hover untuk item sidebar */
            .nav-link:hover {
                background-color: #1e4066;
                /* Biru lebih terang saat hover */
                color: #f1f1f1 !important;
                border-radius: 5px;
                transition: background-color 0.3s ease-in-out;
            }

            /* Efek hover untuk ikon */
            .nav-link i:hover {
                color: #f1f1f1 !important;
            }

            /* Efek aktif pada item sidebar */
            .nav-item.active .nav-link {
                background-color: #0b1e33;
                /* Biru dongker sangat gelap untuk aktif */
                color: #f1f1f1 !important;
            }

            /* Membuat logo lebih menarik */
            .sidebar-brand {
                background-color: #1b3a66;
                color: white;
                transition: background-color 0.3s ease;
            }

            .sidebar-brand:hover {
                background-color: #1b3a66;
                transform: scale(1.05);
            }

            /* Menambah efek hover pada gambar logo */
            .sidebar-brand img {
                transition: transform 0.3s ease;
            }

            .sidebar-brand:hover img {
                transform: scale(1.1);
            }

            /* Menambah efek transisi pada sidebar */
            .sidebar {
                transition: all 0.3s ease-in-out;
            }

            /* Efek border pada item sidebar */
            .nav-link {
                position: relative;
                transition: background-color 0.3s ease;
            }

            .nav-link::before {
                content: '';
                position: absolute;
                left: 0;
                right: 0;
                bottom: 0;
                height: 2px;
                background-color: transparent;
                transition: background-color 0.3s ease;
            }

            .nav-link:hover::before {
                background-color: #1e4066;
            }

            /* Efek hover pada item yang lebih besar */
            .nav-item:hover .nav-link {
                padding-left: 10px;
            }
        </style>


        <!-- Sidebar -->
        <ul class="navbar-nav bg-secondary sidebar sidebar-light accordion shadow-sm" id="accordionSidebar">

            <a class="sidebar-brand d-flex text-white align-items-center justify-content-center" href="">
                <img src="<?= base_url('assets/img/new_logo_kjs.png') ?>" alt="Logo" class="img-fluid" style="max-height: 45px;">
            </a>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('dashboard'); ?>">
                    <i class="fas fa-chart-line"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Data Master
            </div>


            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('barang'); ?>">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>BTTD</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('perusahaan'); ?>">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Bukti Potong</span>
                </a>
            </li>


            <?php if (is_admin()) : ?>
                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Settings
                </div>

                <!-- Nav Item -->
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('user'); ?>">
                        <i class="fas fa-fw fa-user-plus"></i>
                        <span>User Management</span>
                    </a>
                </li>
            <?php endif; ?>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Nav Item - Sign Out -->
            <li class="nav-item">
                <a class="nav-link text-danger" href="<?= base_url('auth/logout'); ?>">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Sign Out</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->





        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">


            <style>
                /* Latar belakang topbar */
                .topbar {
                    background: linear-gradient(145deg, #102E50, #102E50);
                    /* Warna biru gelap solid */
                    color: white;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                    /* Menambah bayangan halus pada topbar */
                }

                /* Logo/Branding di topbar */
                .navbar-brand {
                    color: white;
                    font-family: 'Arial', sans-serif;
                    font-weight: bold;
                }

                /* Tombol toggle sidebar */
                #sidebarToggleTop {
                    background-color: transparent;
                    border: none;
                    color: white;
                    font-size: 20px;
                    transition: color 0.3s ease;
                }

                #sidebarToggleTop:hover {
                    color: #f1f1f1;
                    /* Warna putih saat hover */
                }

                /* Navbar items di topbar */
                .navbar-nav {
                    font-size: 16px;
                }

                /* Dropdown item di topbar */
                .dropdown-menu {
                    background-color: #102E50;
                    border-radius: 5px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                }

                .dropdown-item {
                    color: white;
                    transition: background-color 0.3s ease;
                }

                .dropdown-item:hover {
                    background-color: #0d243f;
                    /* Efek hover pada item dropdown */
                    color: #f1f1f1;
                }

                .dropdown-divider {
                    background-color: #0d243f;
                    /* Ganti warna divider */
                }

                /* Gambar profil di dropdown */
                .img-profile {
                    width: 35px;
                    height: 35px;
                    object-fit: cover;
                    border: 2px solid #fff;
                }

                .text-capitalize {
                    font-size: 16px;
                    font-weight: 600;
                }
            </style>

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-dark topbar mb-4 static-top shadow-sm">

                    <a class="navbar-brand" href="<?= base_url('barang') ?>">
                        <!-- Logo / Branding -->
                    </a>

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link bg-transparent d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars text-white"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline small text-capitalize" style="font-size: 15px; color: white;">
                                    <?= userdata('nama'); ?>
                                </span>
                                <img class="img-profile rounded-circle" src="<?= base_url() ?>assets/img/avatar/<?= userdata('foto'); ?>">
                            </a>

                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= base_url('profile'); ?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-black-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="<?= base_url('profile/setting'); ?>">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-black-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="<?= base_url('profile/ubahpassword'); ?>">
                                    <i class="fas fa-lock fa-sm fa-fw mr-2 text-black-400"></i>
                                    Change Password
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-black-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                    <?= $contents; ?>

                </div>
                <!-- /.container-fluid -->


                <!-- Footer -->
                <footer class="sticky-footer bg-light">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; PT Krakatau Jasa Samudera <?= date('Y'); ?> &bull; All Rights Reserved</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Yakin ingin logout?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Klik "Logout" dibawah ini jika anda yakin ingin logout.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batalkan</button>
                        <a class="btn btn-primary" href="<?= base_url('logout'); ?>">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
        <script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="<?= base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="<?= base_url(); ?>assets/js/sb-admin-2.min.js"></script>

        <!-- Datepicker -->
        <script src="<?= base_url(); ?>assets/vendor/daterangepicker/moment.min.js"></script>
        <script src="<?= base_url(); ?>assets/vendor/daterangepicker/daterangepicker.min.js"></script>

        <!-- Page level plugins -->
        <script src="<?= base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="<?= base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="<?= base_url(); ?>assets/vendor/datatables/buttons/js/dataTables.buttons.min.js"></script>
        <script src="<?= base_url(); ?>assets/vendor/datatables/buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="<?= base_url(); ?>assets/vendor/datatables/jszip/jszip.min.js"></script>
        <script src="<?= base_url(); ?>assets/vendor/datatables/pdfmake/pdfmake.min.js"></script>
        <script src="<?= base_url(); ?>assets/vendor/datatables/pdfmake/vfs_fonts.js"></script>
        <script src="<?= base_url(); ?>assets/vendor/datatables/buttons/js/buttons.html5.min.js"></script>
        <script src="<?= base_url(); ?>assets/vendor/datatables/buttons/js/buttons.print.min.js"></script>
        <script src="<?= base_url(); ?>assets/vendor/datatables/buttons/js/buttons.colVis.min.js"></script>
        <script src="<?= base_url(); ?>assets/vendor/datatables/responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?= base_url(); ?>assets/vendor/datatables/responsive/js/responsive.bootstrap4.min.js"></script>

        <script src="<?= base_url(); ?>assets/vendor/gijgo/js/gijgo.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                var buttons = ['copy', 'csv', 'excel'];

                var table = $('#dataTable').DataTable({
                    buttons: buttons,
                    dom: "<'row px-2 px-md-4 pt-2'<'col-md-3'l><'col-md-5 text-center'B><'col-md-4'f>>" +
                        "<'row'<'col-md-12'tr>>" +
                        "<'row px-2 px-md-4 py-3'<'col-md-5'i><'col-md-7'p>>",
                    lengthMenu: [
                        [5, 10, 25, 50, 100, -1],
                        [5, 10, 25, 50, 100, "All"]
                    ],
                    columnDefs: [{
                        targets: -1,
                        orderable: false,
                        searchable: false
                    }]
                });

                table.buttons().container().appendTo('#dataTable_wrapper .col-md-5:eq(0)');
            });
        </script>


</body>

</html>