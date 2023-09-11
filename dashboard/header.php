<?php session_start();

if(isset($_SESSION['admin'])){
    $role = "1";
}
if(isset($_SESSION['pelanggan'])){
    $role = "2";
}
if(isset($_SESSION['anggota'])){
    $role = "3";
}

?>
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - Dogscumentary</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="">Dogscumentary</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="../controller/logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <!-- LOGIN ADMIN -->

        <?php
        if($role=='1'){
        ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="home.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            
                            <a class="nav-link" href="../views/order_diterima.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Order Diterima
                            </a>

                          
                            <!-- <a class="nav-link" href="../views/penugasan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Penugasan
                            </a> -->

                            <a class="nav-link" href="anggota.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Setup Anggota
                            </a>

                            <a class="nav-link" href="../views/riwayat_order.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Riwayat Order
                            </a>

                        </div>
                    </div>
                </nav>
            </div>
            <?php } ?>

            <!-- LOGIN PELANGGAN -->

            <?php
        if($role=='2'){
        ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="home_pelanggan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Status Order
                            </a>
                            
                            <a class="nav-link" href="../views/riwayat_order.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Riwayat Order
                            </a>
                            
                        </div>
                    </div>
                </nav>
            </div>
            <?php } ?>

<!-- LOGIN ANGGOTA -->
            <?php
        if($role=='3'){
        ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="home_anggota.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            
                            <a class="nav-link" href="../views/order_dikerjakan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Order Dikerjakan
                            </a>
                            <a class="nav-link" href="../views/riwayat_order.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Riwayat Order
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <?php } ?>