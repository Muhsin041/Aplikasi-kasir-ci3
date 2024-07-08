<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Mukayah Store</title>
    <link rel="icon" type="image/x-icon" href="<?= base_url() ?>assets/img/icon.png">


    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/modules/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/modules/izitoast/css/iziToast.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/modules/datatables/datatables.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/modules/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/modules/weather-icon/css/weather-icons.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/modules/weather-icon/css/weather-icons-wind.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/modules/summernote/summernote-bs4.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/components.css">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                        <!-- <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li> -->
                    </ul>
                    <!-- <div class="search-element">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
                        <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                        <div class="search-backdrop"></div>
                    </div> -->
                </form>
                <!-- navbar -->
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right">
                            <div class="dropdown-header">Notifications
                                <div class="float-right">
                                    <a href="#">Mark All As Read</a>
                                </div>
                            </div>
                            <div class="dropdown-list-content dropdown-list-icons">
                                <a href="#" class="dropdown-item dropdown-item-unread">
                                    <div class="dropdown-item-icon bg-primary text-white">
                                        <i class="fas fa-code"></i>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        Template update is available now!
                                        <div class="time text-primary">2 Min Ago</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="<?= base_url('./upload/user/' . $this->fungsi->user_login()->gambar) ?>" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block"><span><?= $this->fungsi->user_login()->name ?></span></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="features-profile.html" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="<?= site_url('auth/logout') ?>" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- sidebar -->
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="index.html"><img src="<?= base_url() ?>assets/img/icon.png" width="40px" height="40px" alt=""> Mukayah</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="index.html"><img src="<?= base_url() ?>assets/img/icon2.png" width="40px" height="40px"></a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">MENU</li>
                        <li <?= $this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'class=active' : '' ?>>
                            <a href="<?= base_url('dashboard') ?>" class="nav-link "><i class="fas fa-fire"></i><span>Dashboard</span></a>
                        </li>
                        <li <?= $this->uri->segment(1) == 'supplier' ? 'class=active' : '' ?>>
                            <a href="<?= base_url('supplier') ?>" class="nav-link "><i class="fas fa-truck"></i><span>Supplier</span></a>
                        </li>
                        <li <?= $this->uri->segment(1) == 'pelanggan' ? 'class=active' : '' ?>>
                            <a href="<?= base_url('customer') ?>" class="nav-link "><i class="fas fa-address-book"></i><span>Pelanggan</span></a>
                        </li>
                        <li class="dropdown <?= $this->uri->segment(1) == 'category' || $this->uri->segment(1) == 'unit' || $this->uri->segment(1) == 'produk' ? 'active' : '' ?>">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-boxes"></i> <span>Produk</span></a>
                            <ul class="dropdown-menu">
                                <li <?= $this->uri->segment(1) == 'category' ? 'class=active' : '' ?>><a class="nav-link" href="<?= base_url('category') ?>">Kategori</a></li>
                                <li <?= $this->uri->segment(1) == 'unit' ? 'class=active' : '' ?>><a class="nav-link" href="<?= base_url('unit') ?>">Satuan</a></li>
                                <li <?= $this->uri->segment(1) == 'produk' ? 'class=active' : '' ?>><a class="nav-link" href="<?= base_url('produk') ?>">Barang</a></li>
                            </ul>
                        </li>
                        <li class="dropdown <?= $this->uri->segment(1) == 'stock' || $this->uri->segment(1) == 'in'  || $this->uri->segment(1) == 'out' ? 'active' : '' ?>">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-exchange-alt"></i> <span>Stock</span></a>
                            <ul class="dropdown-menu">
                                <li <?= $this->uri->segment(1) == 'stock_masuk' ? 'class=active' : '' ?>><a class="nav-link" href="<?= base_url('stock/in') ?>">Stock Masuk</a></li>
                                <li <?= $this->uri->segment(1) == 'stock_keluar' ? 'class=active' : '' ?>><a class="nav-link" href="<?= base_url('stock/out') ?>">Stock Keluar</a></li>
                            </ul>
                        </li>
                        <li class="dropdown <?= $this->uri->segment(1) == 'transaksi' || $this->uri->segment(1) == 'sale' || $this->uri->segment(1) == 'pre-order' ? 'active' : '' ?>">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-shopping-cart"></i> <span>Transaksi</span></a>
                            <ul class="dropdown-menu">
                                <li <?= $this->uri->segment(1) == 'sale' ? 'class=active' : '' ?>><a class="nav-link" href="<?= base_url('sale') ?>">Transaksi</a></li>
                                <li <?= $this->uri->segment(1) == 'pre-order' ? 'class=active' : '' ?>><a class="nav-link" href="#">Pre-Order</a></li>

                            </ul>
                        </li>
                        <li <?= $this->uri->segment(1) == 'laporan' || $this->uri->segment(1) == ''  ? 'class=active' : '' ?>>
                            <a class="nav-link" href="#"><i class="fas fa-chart-bar"></i><span>Laporan</span> </a>
                        </li>
                        <?php if ($this->fungsi->user_login()->akses == 1) { ?>
                            <li class="menu-header">Setting</li>
                            <li <?= $this->uri->segment(1) == 'users' ? 'class=active' : '' ?>>
                                <a href="<?= base_url('users') ?>" class="nav-link "><i class="fas fa-users"></i><span>Pengguna</span></a>
                            </li>
                        <?php } ?>
                        <li class="menu-header">Log Out</li>
                        <li <?= $this->uri->segment(1) == 'log-out' ? 'class=active' : '' ?>><a href="<?= site_url('auth/logout') ?>" class="nav-link "><i class="fas fa-sign-out-alt"></i><span>Log Out</span></a></li>
                </aside>
            </div>
            <?= $contents ?>
            <!-- main content -->


        </div>
    </div>

    <footer class="main-footer">
        <div class="footer-left">
            Copyright &copy; 2024 <div class="bullet"></div> Design By <a href="#">Ahmad Muhsin</a>
        </div>
        <div class="footer-right">

        </div>
    </footer>
    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="<?= base_url() ?>assets/modules/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/modules/popper.js"></script>
    <script src="<?= base_url() ?>assets/modules/tooltip.js"></script>
    <script src="<?= base_url() ?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="<?= base_url() ?>assets/modules/moment.min.js"></script>
    <script src="<?= base_url() ?>assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="<?= base_url() ?>assets/modules/simple-weather/jquery.simpleWeather.min.js"></script>
    <script src="<?= base_url() ?>assets/modules/chart.min.js"></script>
    <script src="<?= base_url() ?>assets/modules/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="<?= base_url() ?>assets/modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="<?= base_url() ?>assets/modules/summernote/summernote-bs4.js"></script>
    <script src="<?= base_url() ?>assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

    <!-- Page Specific JS File -->
    <script src="assets/modules/sweetalert/sweetalert.min.js"></script>

    <script src="<?= base_url() ?>assets/js/page/index-0.js"></script>\
    <!-- Tampilan destop -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                var viewport = document.querySelector("meta[name=viewport]");
                if (viewport) {
                    viewport.parentNode.removeChild(viewport);
                }
                var newViewport = document.createElement('meta');
                newViewport.name = "viewport";
                newViewport.content = "width=1024"; // Atur lebar sesuai kebutuhan
                document.getElementsByTagName('head')[0].appendChild(newViewport);
            }
        });
    </script>
    <!-- Template JS File -->
    <script src="<?= base_url() ?>assets/modules/izitoast/js/iziToast.min.js"></script>
    <script src="<?= base_url() ?>assets/modules/jquery.sparkline.min.js"></script>
    <script src="<?= base_url() ?>assets/js/scripts.js"></script>
    <script src="<?= base_url() ?>assets/js/custom.js"></script>

    <script src="<?= base_url() ?>assets/modules/datatables/datatables.min.js"></script>
    <script src="<?= base_url() ?>assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table-1').DataTable()
        })
        $(document).ready(function() {
            $('#table-2').DataTable()
        })
    </script>
</body>

</html>