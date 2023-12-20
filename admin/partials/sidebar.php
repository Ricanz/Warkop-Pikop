<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Warkop <sup>Pikop</sup></div>
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
            Landing Page
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
                <i class="fas fa-fw fa-user"></i>
                <span>Founders</span>
            </a>
            <div id="collapseStudio" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Menu:</h6>
                    <a class="collapse-item" href="founder.php">Daftar Founder</a>
                    <!-- <a class="collapse-item" href="add-founder.php">Tambah Founder</a> -->
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="tentang.php">
                <i class="fas fa-fw fa-table"></i>
                <span>Tentang</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="kontak.php">
                <i class="fas fa-fw fa-phone"></i>
                <span>Kontak</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="products.php">
                <i class="fas fa-fw fa-chair"></i>
                <span>Franchise</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBerita" aria-expanded="true" aria-controls="collapseBerita">
                <i class="fas fa-fw fa-film"></i>
                <span>Berita</span>
            </a>
            <div id="collapseBerita" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Menu:</h6>
                    <a class="collapse-item" href="berita.php">Daftar Berita</a>
                    <a class="collapse-item" href="add-berita.php">Tambah Berita</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKarir" aria-expanded="true" aria-controls="collapseKarir">
                <i class="fas fa-fw fa-film"></i>
                <span>Karir</span>
            </a>
            <div id="collapseKarir" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Menu:</h6>
                    <a class="collapse-item" href="karir.php">Daftar Karir</a>
                    <a class="collapse-item" href="add-karir.php">Tambah Karir</a>
                </div>
            </div>
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