<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Bioskop <sup>Isma</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard <?php echo ucwords($_SESSION['role']) ?></span></a>
    </li>


    <?php
    if ($_SESSION['role'] === 'admin') {
    ?>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Master Data
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-tv"></i>
                <span>Banners</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Menu:</h6>
                    <a class="collapse-item" href="banner.php">Daftar Banner</a>
                    <a class="collapse-item" href="add-banner.php">Tambah Banner</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseStudio" aria-expanded="true" aria-controls="collapseStudio">
                <i class="fas fa-fw fa-film"></i>
                <span>Founders</span>
            </a>
            <div id="collapseStudio" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Menu:</h6>
                    <a class="collapse-item" href="founder.php">Daftar Founder</a>
                    <a class="collapse-item" href="add-founder.php">Tambah Founder</a>
                </div>
            </div>
        </li>
    <?php
    }
    ?>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Aktivitas
    </div>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="playing.php">
            <i class="fas fa-fw fa-chair"></i>
            <span>Pemutaran Film</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="transaction.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Transaksi</span></a>
    </li>
    <?php
    if ($_SESSION['role'] === 'admin') {
    ?>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser" aria-expanded="true" aria-controls="collapseUser">
                <i class="fas fa-fw fa-user"></i>
                <span>Pengguna</span>
            </a>
            <div id="collapseUser" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Menu:</h6>
                    <a class="collapse-item" href="user.php?type=cashier">Daftar Kasir</a>
                    <a class="collapse-item" href="add-user.php?type=cashier">Tambah Kasir</a>
                    <a class="collapse-item" href="user.php?type=user">Daftar Pengguna</a>
                    <a class="collapse-item" href="add-user.php?type=user">Tambah Pengguna</a>
                </div>
            </div>
        </li>
    <?php } ?>

    <?php
    if ($_SESSION['role'] === 'admin') {
    ?>

        <div class="sidebar-heading">
            Laporan
        </div>

        <li class="nav-item">
            <a class="nav-link" href="report-total.php">
                <i class="fas fa-fw fa-file"></i>
                <span>Total Pendapatan</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="report-film.php">
                <i class="fas fa-fw fa-file"></i>
                <span>Transaksi Per Film</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="report-studio.php">
                <i class="fas fa-fw fa-file"></i>
                <span>Transaksi Per Studio</span></a>
        </li>
    <?php
    }
    ?>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>